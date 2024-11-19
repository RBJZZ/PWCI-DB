<?php

class Productos{
    private $id;
    private $seller;
    private $title;
    private $desc;
    private $price;
    private $stock;
    private $category;
    private $status;
    private $rating;
    private $publishdate;
    private $thumbnail;
    private $videourl;
    private $quotable;
    private $verified;
    private $conexion;

    public function __construct($conexion){
        $this->conexion=$conexion;
    }

    public function obtenerProductos() {
        $productos = [];
        $precios = ['precio_minimo' => null, 'precio_maximo' => null];

        $stmt = $this->conexion->prepare("CALL sp_FetchProductos()");
        
        if ($stmt) {
            $stmt->execute();
            
            
            $result = $stmt->get_result();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $productos[] = $row;
                }
                $result->free();
            } else {
                echo "Error al obtener resultados: " . $this->conexion->error;
            }

            if ($stmt->next_result()) {
                $result = $stmt->get_result();
                if ($result) {
                    $precios = $result->fetch_assoc();
                    $result->free();
                }
            }

            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $this->conexion->error;
        }

        return ['productos' => $productos, 'precios' => $precios];
    }

    public function previewProductos($id){

        $stmt = $this->conexion->prepare("CALL sp_productopreview(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto['dt']= $result->fetch_assoc();
        $result->free();
        $stmt->close();
        $this->conexion->next_result();

        $stmt=$this->conexion->prepare("CALL sp_previewimgs(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto['imgs']= $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $stmt->close();
        $this->conexion->next_result();

        $stmt=$this->conexion->prepare("CALL sp_previewmp(?)");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto['mp']= $result->fetch_all(MYSQLI_ASSOC);
        $result->free();
        $stmt->close();


        return $producto;
    }

    public function registroProductos($additionalImages, $paymentMethods){
        if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'seller') {
            return "Error: Acceso no autorizado. Solo los vendedores pueden registrar productos.";
        }
    
        
        $stmt = $this->conexion->prepare("CALL sp_insertar_producto(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param(
            "issdiissss", 
            $this->seller, 
            $this->title, 
            $this->desc, 
            $this->price, 
            $this->stock, 
            $this->category, 
            $this->status, 
            $this->quotable, 
            $this->videourl, 
            $this->thumbnail
        );
    
        if ($stmt->execute()) {
            $result = $this->conexion->query("SELECT LAST_INSERT_ID() AS last_id");
            $row = $result->fetch_assoc();
            $productId = $row['last_id'];
            $stmt->close();
    
            if ($productId > 0) {
                
                if ($additionalImages && is_array($additionalImages['tmp_name'])) {
                    foreach ($additionalImages['tmp_name'] as $key => $tmpName) {
                        if ($additionalImages['error'][$key] == UPLOAD_ERR_OK) {
                            $imageExt = pathinfo($additionalImages['name'][$key], PATHINFO_EXTENSION);
                            $imagePath = "../Views/uploads/" . uniqid() . "." . $imageExt;
                            move_uploaded_file($tmpName, $imagePath);
    
                            
                            $imageQuery = $this->conexion->prepare("INSERT INTO PRODUCTOS_IMG (prod_ID, img_path) VALUES (?, ?)");
                            $imageQuery->bind_param("is", $productId, $imagePath);
                            $imageQuery->execute();
                            $imageQuery->close();
                        }
                    }
                }
    

                if ($paymentMethods && is_array($paymentMethods)) {
                    foreach ($paymentMethods as $method) {
                        $paymentQuery = $this->conexion->prepare("INSERT INTO PRODUCTOS_METODOSPAGO (prod_ID, method_type) VALUES (?, ?)");
                        $paymentQuery->bind_param("is", $productId, $method);
                        $paymentQuery->execute();
    
                        if ($paymentQuery->error) {
                            return "Error al insertar método de pago $method: " . $paymentQuery->error;
                        }
    
                        $paymentQuery->close();
                    }
                }
    
                return "Producto registrado con éxito. ID: " . $productId;
            } else {
                return "Error al obtener el ID del producto.";
            }
        } else {
            $error = "Error al registrar el producto: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }

    public function getProductosPorVendedor($seller) {
        $stmt = $this->conexion->prepare("CALL sp_fetch_posts(?)");
        $stmt->bind_param("i", $seller);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }

        $stmt->close();
        return $productos;
    }
    public function buscarProductos($keyword){
        $productos = [];
        $precios = ['precio_minimo' => null, 'precio_maximo' => null];
    
        $stmt = $this->conexion->prepare("CALL sp_buscar_productos(?)");
        $stmt->bind_param("s", $keyword);
    
        if ($stmt) {
            $stmt->execute();
    
          
            $result = $stmt->get_result();
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $productos[] = $row;
                }
                $result->free();
            }
    
            
            if ($stmt->next_result()) {
                $result = $stmt->get_result();
                if ($result) {
                    $precios = $result->fetch_assoc();
                    $result->free();
                }
            }
    
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $this->conexion->error;
        }
    
        return ['productos' => $productos, 'precios' => $precios];
    }

    public function buscarAvanzado($keyword, $category, $minPrice, $maxPrice, $rating){

        $productos=[];
        $catSQL = $category ? implode(',', $category) : null;
        $stmt=$this->conexion->prepare("CALL sp_buscar_avanzado(?,?,?,?,?)");
        $stmt->bind_param("ssddi", 
        $keyword,
        $catSQL,
        $minPrice,
        $maxPrice,
        $rating
        );

        if($stmt){
            $stmt->execute();
            $result = $stmt->get_result();

            while( $row = $result->fetch_assoc() ) {
                $productos[] = $row;
            }

            $stmt->close();

        }
        return $productos;
    }

    public function editarProducto($paymentMethods) {
        $stmt = $this->conexion->prepare(
            "CALL sp_update_product(?, ?, ?, ?, ?, ?, ?, ?, ?)"
        );
        $stmt->bind_param(
            "issdiisss",
            $this->id,
            $this->title,
            $this->desc,
            $this->price,
            $this->stock,
            $this->category,
            $this->quotable,
            $this->videourl,
            $this->thumbnail
        );
    
        if ($stmt->execute()) {
            if ($paymentMethods && is_array($paymentMethods)) {
                $this->conexion->query("DELETE FROM PRODUCTOS_METODOSPAGO WHERE prod_ID = {$this->id}");
    
                foreach ($paymentMethods as $method) {
                    $paymentQuery = $this->conexion->prepare("INSERT INTO PRODUCTOS_METODOSPAGO (prod_ID, method_type) VALUES (?, ?)");
                    $paymentQuery->bind_param("is", $this->id, $method);
                    $paymentQuery->execute();
                    $paymentQuery->close();
                }
            }
    
            return true;
        } else {
            return false;
        }
    }
    
    
    public function insertarImagen($productId, $imagePath) {
        try {
            $query = $this->conexion->prepare("INSERT INTO PRODUCTOS_IMG (prod_ID, img_path) VALUES (?, ?)");
            $query->bind_param("is", $productId, $imagePath);
            if (!$query->execute()) {
                error_log("Error al insertar imagen en la base de datos: " . $query->error);
                throw new Exception("Error al insertar imagen en la base de datos.");
            }
        } catch (Exception $e) {
            error_log("Error al insertar imagen: " . $e->getMessage());
            throw new Exception("Error al insertar imagen.");
        }
    }
   
    public function actualizarImagenes($additionalImages) {
        $this->conexion->begin_transaction();
    
        try {
           
            $deleteQuery = $this->conexion->prepare("DELETE FROM PRODUCTOS_IMG WHERE prod_ID = ?");
            $deleteQuery->bind_param("i", $this->id);
            $deleteQuery->execute();
    
            foreach ($additionalImages['tmp_name'] as $key => $tmpName) {
                if ($additionalImages['error'][$key] == UPLOAD_ERR_OK) {
                    $imageExt = pathinfo($additionalImages['name'][$key], PATHINFO_EXTENSION);
                    $imagePath = "../Views/uploads/" . uniqid() . "." . $imageExt;
    
                    if (!move_uploaded_file($tmpName, $imagePath)) {
                        throw new Exception("Error al mover el archivo: $tmpName");
                    }
    
                    $insertQuery = $this->conexion->prepare("INSERT INTO PRODUCTOS_IMG (prod_ID, img_path) VALUES (?, ?)");
                    $insertQuery->bind_param("is", $this->id, $imagePath);
                    $insertQuery->execute();
                }
            }
    
            $this->conexion->commit();
        } catch (Exception $e) {
            $this->conexion->rollback();
            error_log("Error en actualizarImagenes: " . $e->getMessage());
            throw new Exception("Error al actualizar imágenes: " . $e->getMessage());
        }
    }
    
    
     public function eliminarImagenes($productId) {
        try {
            
            $query = $this->conexion->prepare("SELECT img_path FROM PRODUCTOS_IMG WHERE prod_ID = ?");
            $query->bind_param("i", $productId);
            $query->execute();
            $result = $query->get_result();
    
            while ($row = $result->fetch_assoc()) {
                $imagePath = $row['img_path'];
                if (file_exists($imagePath)) {
                    unlink($imagePath); 
                }
            }
    
            
            $deleteQuery = $this->conexion->prepare("DELETE FROM PRODUCTOS_IMG WHERE prod_ID = ?");
            $deleteQuery->bind_param("i", $productId);
            $deleteQuery->execute();
        } catch (Exception $e) {
            error_log("Error al eliminar imágenes: " . $e->getMessage());
            throw new Exception("Error al eliminar imágenes.");
        }
    }
    

    private function actualizarMetodosPago($paymentMethods) {
       
        $this->conexion->query("DELETE FROM PRODUCTOS_METODOSPAGO WHERE prod_ID = $this->id");
    
        foreach ($paymentMethods as $method) {
            $paymentQuery = $this->conexion->prepare("INSERT INTO PRODUCTOS_METODOSPAGO (prod_ID, method_type) VALUES (?, ?)");
            $paymentQuery->bind_param("is", $this->id, $method);
            $paymentQuery->execute();
            $paymentQuery->close();
        }
    }
    
    public function obtenerProductoID($id, $seller){
        try {
            $stmt = $this->conexion->prepare("CALL sp_fetch_productdata(?, ?)");
            $stmt->bind_param("ii", $id, $seller);
            $stmt->execute();
    
            $result = [];
            
            $mainResult = $stmt->get_result();
            $result['main'] = $mainResult->fetch_assoc();
            $mainResult->close();
    
            $stmt->next_result();
            $imagesResult = $stmt->get_result();
            $result['images'] = $imagesResult->fetch_all(MYSQLI_ASSOC);
            $imagesResult->close();
    
            $stmt->next_result();
            $methodsResult = $stmt->get_result();
            $result['methods'] = $methodsResult->fetch_all(MYSQLI_ASSOC);
            $methodsResult->close();
    
            $stmt->close();
            return $result;
        } catch (Exception $e) {
            error_log('Error al obtener detalles del producto: ' . $e->getMessage());
            return false;
        }
    }

    /////////////////////////////////////////////////////////// MÉTODOS SETTERS
    public function setProductId($id){
        $this->id = $id;
    }
    public function setSeller($seller){
        $this->seller= $seller;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function setDesc($desc){
        $this->desc = $desc;
    }
    public function setPrice($price){
        $this->price = $price;  
    }

    public function setCat($category){
        $this->category = $category;
    }
    public function setStock($stock){
        $this->stock = $stock;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function setRating($rating){
        $this->rating = $rating;
    }
    public function setPublishDate($publishdate){
        $this->publishdate = $publishdate;
    }
    public function setThumbnail($thumbnail){
        $this->thumbnail = $thumbnail;
    }
    public function setVideoUrl($videourl){
        $this->videourl = $videourl;
    }
    public function setQuotable($quotable)
    {
        $this->quotable = $quotable;
    }
    public function setVerified($verified){
        $this->verified = $verified;
    }

    /////////////////////////////////////////////////////////// MÉTODOS GETTERS
    public function getProductId(){
        return $this->id;
    }
    public function getSeller(){
        return $this->seller;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDesc(){
        return $this->desc;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getCat(){
        return $this->category;
    }
    public function getRating(){
        return $this->rating;
    }
    public function getPublishDate(){
        return $this->publishdate;
    }
    public function getThumbnail(){
        return $this->thumbnail;
    }
    public function getVideoUrl()
    {
        return $this->videourl;
    }
    public function getQuotable(){
        return $this->quotable;
    }
    public function getVerified(){
        return $this->verified;
    }



}


?>
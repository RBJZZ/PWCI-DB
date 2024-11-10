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
    
            $stmt->close();
        } else {
            echo "Error en la preparación de la consulta: " . $this->conexion->error;
        }
    
        return $productos;
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

    /////////////////////////////////////////////////////////// MÉTODOS SETTERS
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
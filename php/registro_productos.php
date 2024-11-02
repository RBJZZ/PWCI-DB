<?php

session_start();
include 'Conexion.php';

if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'seller') {
    echo "Error: Acceso no autorizado. Solo los vendedores pueden registrar productos.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $db = new Conexion();

    if (isset($_SESSION['user_id'])) {
        $sellerId = $_SESSION['user_id']; 
    } else {
        echo "Error: Usuario no autenticado.";
        exit;
    }

    // Variables del formulario
    $productName = $_POST['product-name'];
    $productDesc = $_POST['product-desc'];
    $productPrice = $_POST['product-price'];
    $productStock = $_POST['product-stock'];
    $quotable = isset($_POST['quotable']) ? 1 : 0;
    $category = $_POST['category-select'];
    $videoLink = $_POST['product-video'];
    

    // Subir y asignar ruta de miniatura
    $thumbnailPath = "";
    if (isset($_FILES['thumbnail-upload']) && $_FILES['thumbnail-upload']['error'] == UPLOAD_ERR_OK) {
        $thumbnailTmpPath = $_FILES['thumbnail-upload']['tmp_name'];
        $thumbnailExt = pathinfo($_FILES['thumbnail-upload']['name'], PATHINFO_EXTENSION);
        $thumbnailPath = "../uploads/" . uniqid() . "." . $thumbnailExt;
        move_uploaded_file($thumbnailTmpPath, $thumbnailPath);
    }

    // Insertar el producto
    $query = $db->conn->prepare("CALL sp_insertar_producto(?, ?, ?, ?, ?, ?, 'Disponible', ?, ?, ?)");
    $query->bind_param("issdiisss", 
    $sellerId, 
    $productName, 
    $productDesc, 
    $productPrice, 
    $productStock, 
    $category, 
    $quotable, 
    $videoLink, 
    $thumbnailPath);

    if ($query->execute()) {

        $result = $db->conn->query("SELECT LAST_INSERT_ID() AS last_id");
        $row = $result->fetch_assoc();
        $productId = $row['last_id'];

        echo "Producto registrado con éxito.";
        if ($productId > 0) {
            echo "Producto registrado con éxito. ID: " . $productId;
            }else{
                echo "No se obtuvo el ID";
            }

    } else {
        echo "Error al registrar el producto.";
        exit;
    }

    // Subir imágenes adicionales
    if (isset($productId) && $productId > 0) {
        if (isset($_FILES['multiple-pic-input'])) {
            foreach ($_FILES['multiple-pic-input']['tmp_name'] as $key => $tmpName) {
                if ($_FILES['multiple-pic-input']['error'][$key] == UPLOAD_ERR_OK) {
                    $imageExt = pathinfo($_FILES['multiple-pic-input']['name'][$key], PATHINFO_EXTENSION);
                    $imagePath = "../uploads/" . uniqid() . "." . $imageExt;
                    move_uploaded_file($tmpName, $imagePath);
    
                    
                    $imageQuery = $db->conn->prepare("INSERT INTO PRODUCTOS_IMG (prod_ID, img_path) VALUES (?, ?)");
                    $imageQuery->bind_param("is", $productId, $imagePath);
                    $imageQuery->execute();
                }
            }
        }
    
    } else {
        echo "ERROR: Las fotos adicionales no se cargaron";
    }

    print_r($_POST['payment_methods']); 

    if (isset($_POST['payment_methods']) && is_array($_POST['payment_methods'])) {
        foreach ($_POST['payment_methods'] as $method) {
            $paymentQuery = $db->conn->prepare("INSERT INTO PRODUCTOS_METODOSPAGO (prod_ID, method_type) VALUES (?, ?)");
            $paymentQuery->bind_param("is", $productId, $method);
            $paymentQuery->execute();
            
            // Agrega una verificación de éxito o error para la inserción
            if ($paymentQuery->error) {
                echo "Error al insertar método de pago $method: " . $paymentQuery->error;
            }
        }
    } else {
        echo "No se seleccionaron métodos de pago.";
    }
    

    
} else {
    echo "Error: Formulario no enviado correctamente.";
}
?>

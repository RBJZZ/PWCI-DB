<?php
include 'Conexion.php';

$db = new Conexion();
$query = "CALL sp_obtener_categorias()";
$result = $db->conn->query($query);

$categorias = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
}
$db->conn->close();
?>

<?php

include 'Conexion.php';


    $db=new Conexion;

    $prod= $db->conn->prepare(query: "CALL sp_FetchProductos()");
    $prod->execute();

    $result = $prod->get_result();
   
    while($row=$result->fetch_assoc()){
        $products[]=$row;
    }

    $result->free();
    $prod->close();

    $db->conn->close();




?>
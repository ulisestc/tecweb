<?php
    include_once __DIR__.'/database.php';

    // SE OBTIENE LA INFORMACIÓN DEL PRODUCTO ENVIADA POR EL CLIENTE
    $producto = file_get_contents('php://input');
    if(!empty($producto)) {
        // SE TRANSFORMA EL STRING DEL JASON A OBJETO
        $jsonOBJ = json_decode($producto);

        @$link = new mysqli('localhost', 'root', 'ContrasenaSegura', 'marketzone');
        if ($link->connect_errno) 
        {
            die(json_encode(['error' => 'Falló la conexión: '.$link->connect_error]));
        }
        $sql = "INSERT INTO productos(nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('{$jsonOBJ->nombre}' , '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', '{$jsonOBJ->precio}', '{$jsonOBJ->detalles}', '{$jsonOBJ->unidades}', '{$jsonOBJ->imagen}')";
        
        if ( $link->query($sql) ) 
        {
            echo json_encode(['success' => 'Producto insertado']);
        }
        else
        {
            echo json_encode(['error' => 'El Producto no pudo ser insertado =(']);
        }
    
        $link->close();
    }
?>
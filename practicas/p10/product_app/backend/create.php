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

        //validación
        $valid = true;
        $validation = "SELECT * FROM productos WHERE ( nombre = '{$jsonOBJ->nombre}' AND marca = '{$jsonOBJ->marca}') OR  ( marca = '{$jsonOBJ->marca}' AND modelo = '{$jsonOBJ->modelo}') AND eliminado = 0";
        $result = $link->query($validation);

        if ($result->num_rows > 0) 
        {
            echo json_encode(['error' => 'Error, el producto ya existe']);
            $valid = false;
        }

        if ($valid) {
            $sql = "INSERT INTO productos(nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('{$jsonOBJ->nombre}' , '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', '{$jsonOBJ->precio}', '{$jsonOBJ->detalles}', '{$jsonOBJ->unidades}', '{$jsonOBJ->imagen}')";
            
            if ($link->query($sql) === TRUE) {
                echo json_encode(['success' => 'El producto fue insertado con éxito. Nombre: ' . $jsonOBJ->nombre . ', Marca: ' . $jsonOBJ->marca . ', Modelo: ' . $jsonOBJ->modelo . ', Precio: ' . $jsonOBJ->precio . ', Detalles: ' . $jsonOBJ->detalles . ', Unidades: ' . $jsonOBJ->unidades . ', Imagen: ' . $jsonOBJ->imagen]);
            } else {
                echo json_encode(['error' => 'Error, el producto no pudo ser insertado']);
            }
        }
    
        $link->close();
    }
?>
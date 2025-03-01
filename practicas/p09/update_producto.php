<?php
    /* MySQL Conexion*/
    @$link = new mysqli("localhost", "root", "ContrasenaSegura", "marketzone");
    // Chequea coneccion
    if($link ->connect_errno){
        die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
    }
    // Se actualiza el campo 'email' de la tabla 'personas' donde el 'id' es 3
    $sql = "UPDATE productos SET nombre='".$_POST['nombre']."'
                                , marca='".$_POST['marca']."'
                                , modelo='".$_POST['modelo']."'
                                , precio='".$_POST['precio']."'
                                , detalles='".$_POST['detalles']."'
                                , unidades='".$_POST['unidades']."'
                                , imagen='".$_POST['imagen']."'
                                , eliminado='".$_POST['eliminado']."'
                                WHERE id='".$_POST['id']."'";

    if ( $link->query($sql) ) 
    {
        echo '<h1>Producto actualizado con éxito</h1>';
        echo '<br><br><br>
        ';
        echo '<button><a href="get_productos_vigentes_v2.php">Ver productos vigentes</a></button>';
        echo '<br><br>';

        echo '<form action="get_productos_xhtml_v2.php" method="get">';
        echo '  <label for="tope">Especificar tope:</label>';
        echo '  <input type="number" id="tope" name="tope">';
        echo '  <input type="submit" value="Ver productos con el tope dado">';
        echo '</form>';
    }
    else
    {
        echo 'El Producto no pudo ser actualizado =(';
    }
    
    $link->close();
?>
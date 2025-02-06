<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>
    <!-- <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p> -->
    <?php
        echo '<h2>Ejercicio 1</h2><p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>';
        require_once 'src/funciones.php';
        // EJERCICIO 1 => url...?numero=X
        comprobar_divisibilidad(5,7);
        
        echo '<hr><h2>Ejercicio 2</h2><p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por: impar, par, impar</p>';
        // EJERCICIO 2
        secuencia_aleatoria();

        echo '<hr><h2>Ejercicio 3</h2><p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>';
    ?>

</body>
</html>
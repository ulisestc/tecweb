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
        require_once 'src/funciones.php';

        // EJERCICIO 1 => url...?numero=X
        echo '<h2>Ejercicio 1</h2><p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>';
        comprobar_divisibilidad(5,7);
        
        // EJERCICIO 2
        echo '<hr><h2>Ejercicio 2</h2><p>Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una secuencia compuesta por: impar, par, impar</p>';
        secuencia_aleatoria();

        // EJERCICIO 3
        echo '<hr><h2>Ejercicio 3</h2><p>Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente, pero que además sea múltiplo de un número dado.</p>';
        numero_aleatorio_multiplicable();
        
        // EJERCICIO 4
        echo '<hr><h2>Ejercicio 4</h2><p>Crear un arreglo cuyos índices van de 97 a 122 y cuyos valores son las letras de la ‘a’ a la ‘z’. Usa la función chr(n) que devuelve el caracter cuyo código ASCII es n para poner el valor en cada índice.</p>';
        arreglo_a_z();

        // EJERCICIO 5
        echo '<hr><h2>Ejercicio 5</h2><p></p>';
        comprobar_edad_sexo();
        
        // EJERCICIO 6
        echo '<hr><h2>Ejercicio 6</h2><p></p>';
        ?>

</body>
</html>
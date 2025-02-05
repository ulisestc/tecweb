<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <p>$_myvar,  $_7var,  myvar,  $myvar,  $var7,  $_element1, $house*5</p>
    <?php
        //AQUI VA MI CÓDIGO PHP
        $_myvar;
        $_7var;
        //myvar;       // Inválida
        $myvar;
        $var7;
        $_element1;
        //$house*5;     // Invalida
        
        echo '<h4>Respuesta:</h4>';   
    
        echo '<ul>';
        echo '<li>Como sabemos, para declarar una variable necesitamos: <br> 1. Representar con un $. <br> 2. Iniciar el nombre con una letra o guión bajo (seguido de cualquier # de letra, número o guión bajo) <br> <br>';
        echo '<li>$_myvar es válida porque inicia con guión bajo.</li>';
        echo '<li>$_7var es válida porque inicia con guión bajo.</li>';
        echo '<li>myvar es inválida porque no esta representada con un ($).</li>';
        echo '<li>$myvar es válida porque inicia con una letra.</li>';
        echo '<li>$var7 es válida porque inicia con una letra.</li>';
        echo '<li>$_element1 es válida porque inicia con guión bajo.</li>';
        echo '<li>$house*5 es inválida porque el símbolo * no está permitido.</li>';
        echo '</ul>';

        echo '<hr><h2> Ejercicio 2 </h2>';
        echo 'Se crean e inicializan variables a, b y c mediante:<br> <br>';
        echo '$a = "ManejadorSQL"<br>';
        echo '$b = "MySQL"<br>';
        echo '$c = &$a;<br><br>';
        
        //primera inicialización
        $a = "ManejadorSQL";
        $b = 'MySQL';
        $c = &$a;
        echo '$a: ', $a , '<br>', '$b: ', $b, '<br>','$c: ', $c, '<br><br>';
        
        //segunda asignación
        echo '$a = "PHP server"<br>';
        echo '$b = &$a<br><br>';
        $a = "PHP server";
        $b = &$a;
        echo '$a: ', $a , '<br>', '$b: ', $b, '<br>','$c: ', $c, '<br>';
        
        echo '<h4>¿Qué pasó en el segundo bloque de asignaciones?</h4>';
        echo 'Respuesta: <br><br>  Se cambió el valor de $a, por lo que, toda variable apuntando a esta, se cambió igualmente. Además, se cambió el valor de $b, para que ahora apuntara a $a, por lo tanto: <br><br> $a es la variable original, y tanto $b como $c apuntan a ella';
        
        unset($a);
        unset($b);
        unset($c);
    ?>
</body>
</html>
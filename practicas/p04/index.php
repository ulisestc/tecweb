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
        error_reporting(0);
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

        //SEGUNDO EJERCICIO -----------------------------------
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
        
        //unset variables
        unset($a);
        unset($b);
        unset($c);

        //TERCER EJERCICIO -------------------------------------
        echo '<hr><h2>Ejercicio 3 y 4</h2>';

        echo '$a = "PHP5";<br>';
        $a = "PHP5";
        echo $a;
        echo '<br>// Se asigna "PHP5" a $a<br><br>';

        echo '$z[] = &$a;<br>';
        $z[] = &$a;
        var_dump($z);
        echo '<br>// La primera casilla del arreglo apunta a $a<br><br>';

        echo '$b = "5a version de PHP";<br>';
        $b = "5a version de PHP";
        echo $b;
        echo '<br>// Se asigna "5ta version de PHP" a $b<br><br>';

        echo '$c = $b*10;<br>';
        $c = $b*10;
        echo $c;
        echo '<br>// Se multiplica $b (5ta version de PHP) * 10 (PHP intenta multiplicarlo) y se almacena en $c<br><br>';

        echo '$a .= $b;<br>';
        $a .= $b;
        echo $a;
        echo '<br>// Se concatena $b a $a<br><br>';

        echo '$b *= $c;<br>';
        $b *= $c;
        echo $b;
        echo '<br>// multiplica el valor de $b (5ta version de PHP) por $c (50)<br><br>';

        echo '$z[0] = "MySQL";<br>';
        $z[0] = "MySQL";
        var_dump($z);
        echo '<br>// Reemplaza la primera casilla del arreglo con "MySQL"<br><br><br>';

        //CUARTO EJERCICIO -------------------------------------
        
        //echo con $GLOBALS
        echo 'Variables usando $GLOBALS: <br><br>';
        echo '$a: ', $GLOBALS['a'], '<br>';
        echo '$b: ', $GLOBALS['b'], '<br>';
        echo '$c: ', $GLOBALS['c'], '<br>';
        echo '$z[]: ', var_dump($GLOBALS['z']), '<br><hr>';
        
        //unset variables
        unset($a);
        unset($b);
        unset($c);
        unset($z);

        //QUINTO EJERCICIO -------------------------------------
        echo '<h2>Ejercicio 5</h2>';
        echo '$a = “7 personas”;<br>
                $b = (integer) $a;<br>
                $a = “9E3”;<br>
                $c = (double) $a;<br><br>';

        $a = "7 personas";
        $b = (integer) $a;
        $a = "9E3";
        $c = (double) $a;

        //explicación
        echo '$a: ', $a , '<br>', '$b: ', $b, '<br>','$c: ', $c, '<br><br> 1. se le asigna un string a $a<br> 2. se intenta convertir a entero $a, como empieza con 7, se le asigna ese<br>3. Se le asigna un número en notación científica a $a<br> 4. Se convierte a double $a, PHP reconoce automáticamente la notación científica <br><hr> ';

        unset($a);
        unset($b);
        unset($c);

        //SEXTO EJERCICIO -------------------------------------
        echo '<h2>Ejercicio 6</h2>$a = “0”;<br>
                $b = “TRUE”;<br>
                $c = FALSE;<br>
                $d = ($a OR $b);<br>
                $e = ($a AND $c);<br>
                $f = ($a XOR $b);<br><br>';
        
        $a = "0";
        $b = "TRUE";
        $c = FALSE;
        $d = ($a OR $b);
        $e = ($a AND $c);
        $f = ($a XOR $b);
        
        //var_dump($X)
        echo '<br><h4>var_dump($X)</h4>// Muestra datos ingresados a la variable <br> $a: ';
        var_dump($a);
        echo '<br> $b: ';
        var_dump($b);
        echo '<br> $c: ';
        var_dump($c);
        echo '<br> $d: ';
        var_dump($d);
        echo '<br> $e: ';
        var_dump($e);
        echo '<br> $f: ';
        var_dump($f);

        //es variable booleana?
        echo '<h4>is_bool()?</h4> // Muestra si la variable es booleana <br> $a: ';
        var_dump(is_bool($a));
        echo '<br> $b: ';
        var_dump(is_bool($b));
        echo '<br> $c: ';
        var_dump(is_bool($c));
        echo '<br> $d: ';
        var_dump(is_bool($d));
        echo '<br> $e: ';
        var_dump(is_bool($e));
        echo '<br> $f: ';
        var_dump(is_bool($f));

        //valor booleano dentro de la variable
        echo '<br><h4>var_dump((bool)$X)</h4> // Convierte a booleano las variables <br> $a: ';
        var_dump((bool)$a);
        echo '<br> $b: ';
        var_dump((bool)$b);
        echo '<br> $c: ';
        var_dump((bool)$c);
        echo '<br> $d: ';
        var_dump((bool)$d);
        echo '<br> $e: ';
        var_dump((bool)$e);
        echo '<br> $f: ';
        var_dump((bool)$f);

        //Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
        // en uno que se pueda mostrar con un echo:
        echo '<br><br><h4>Mostrando valores booleanos como texto: (var_export($X, true)) </h4>';
        echo "\$c: " . var_export($c, true) . "<br>";
        echo "\$e: " . var_export($e, true) . "<br><hr>";

        unset($a);
        unset($b);
        unset($c);
        unset($d);
        unset($e);
        unset($f);

        //SEXTO EJERCICIO -------------------------------------
        echo '<h2>Ejercicio 7</h2>';
        echo '<b>Versión de Apache, Sistema Operativo del Servidor, y versión de  PHP: </b>', $_SERVER['SERVER_SOFTWARE'], '<br>';
        // echo 'Sistema Operativo del servidor: ', $_SERVER['SERVER_SOFTWARE'], '<br>';
        echo '<b>Idioma del navegador: </b>', $_SERVER['HTTP_ACCEPT_LANGUAGE'], '<br>';
    ?>
</body>
</html>
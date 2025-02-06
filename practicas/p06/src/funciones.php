<?php
    function comprobar_divisibilidad($a , $b){
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];

            if(($num % $a) == 0 && ($num % $b) == 0){
                echo '<br> El número '. $num . ' <b>SI</b> es múltiplo de ' . $a . ' y ' . $b . ' <br> ';
            }
            else
            {
                echo '<br> El número '. $num . ' <b>NO</b> es múltiplo de ' . $a . ' y ' . $b . ' <br> ';
            }
        }
    }
?>

<!-- <?php
        // if(isset($_GET['numero']))
        // {
        //     $num = $_GET['numero'];
        //     if ($num%5==0 && $num%7==0)
        //     {
        //         echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
        //     }
        //     else
        //     {
        //         echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
        //     }
        // }
    ?> -->
<?php
    function comprobar_divisibilidad($a , $b){
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            
            if(($num % $a) == 0 && ($num % $b) == 0){
                echo 'El número '. $num . ' <b>SI</b> es múltiplo de ' . $a . ' y ' . $b . ' <br> ';
            }
            else
            {
                echo 'El número '. $num . ' <b>NO</b> es múltiplo de ' . $a . ' y ' . $b . ' <br> ';
            }
        }
        else{
            echo 'para comenzar, teclea "?numero=X en la barra de direcciones!"';
        }
        unset($num);
        unset($a);
        unset($b);
    }
    
    function secuencia_aleatoria(){
        // Inciar variables
        $matriz = [];
        $iteraciones = 0;
        $numeros_generados = 0;
        
        do{
            // Generación de los num aleatorios
            $_1 = rand(0,10);
            $_2 = rand(0,10);
            $_3 = rand(0,10);
            // Ingresar números a matríz
            $matriz[] = [$_1, $_2, $_3];
            $iteraciones++;
            $numeros_generados += 3;
        }
        while(!((($_1 % 2) != 0) && (($_2 % 2) == 0) && (($_3 % 2) != 0)));
        
        // print_r($matriz);
        for ($i = 0; $i < $iteraciones; $i++){
            echo '<br>' . $matriz[$i][0] . ' ' . $matriz[$i][1] . ' ' . $matriz[$i][2];
        }
        
        echo '<br><br>' . $numeros_generados . ' numeros generados en ' . $iteraciones . ' iteraciones.<br>';
        
        // unsets
        unset($_1);
        unset($_2);
        unset($_3);
        unset($matriz);
        unset($iteraciones);
        unset($numeros_generados);
    }

    function numero_aleatorio_multiplicable(){
        if(isset($_GET['numero'])){
            $num = $_GET['numero'];
            $num_aleatorio = NULL;

            do{
                $num_aleatorio = rand(0,100);
            }
            while (($num_aleatorio % $num) != 0);

            echo $num . ' es multiplo de ' . $num_aleatorio;
        }
        else{
            echo 'para comenzar, teclea "?numero=X en la barra de direcciones!"';
        }

        unset($num);
        unset($num_aleatorio);
    }

    function arreglo_a_z(){

        $arreglo = [];
        
        for($i = 97; $i <= 122; $i++){
            $arreglo[$i] = chr($i);
        }

        // foreach($arreglo as $index => $value){
        //     echo $index . ': ' . $value . '<br>';
        // }
        echo '<table border = 1>';
        echo '<tr><th>Índice</th><th>Valor</th></tr>';
        foreach ($arreglo as $index => $value) {
            echo "<tr><td>$index</td><td>$value</td></tr>";
        }
        echo '</table>';

        unset($arreglo);
        // var_dump($arreglo);
    }

    function comprobar_edad_sexo(){
        echo '<form action="" method="POST">
                Sexo: 
                <select name="sexo">
                    <option value="">Selecciona</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Otro">Otro</option>
                </select>
                <br>

                Edad: <input type="number" name="edad" min="0" max="120"><br>
                <br>
                <input type="submit" value="Enviar">
            </form>
            <br>
            ';
        if(isset($_POST["sexo"]) && isset($_POST["edad"])){            
            if ($_POST["sexo"] == "Femenino" && $_POST["edad"] >= 18 && $_POST["edad"] <= 35) {
                echo 'Bienvenida, usted está en el rango de edad permitido.';
            }   
            else{
                echo 'Error edad y/o sexo no permitido(s)';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/Pagina.php';

        $pag1 = new Pagina('El Ático del Programador','El Sótano del Programador');
        
        for ($i = 0; $i < 15 ; $i++){
            $pag1->insertar_cuerpo('Este es el párrafo número '.($i+1). ' que debe aparecer en la página.');
        }

        $pag1->graficar();
    ?>
</body>
</html>
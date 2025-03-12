<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once __DIR__.'/Tabla.php';

        $tab1 = new Tabla(2, 3, 'border: 1px solid');
        $tab1->cargar(0, 0, '1');
        $tab1->cargar(0, 1, '2');
        $tab1->cargar(0, 2, '3');

        $tab1->cargar(1, 0, '4');
        $tab1->cargar(1, 1, '5');
        $tab1->cargar(1, 2, '6');

        $tab1->graficar();
    ?>
</body>
</html>
<?php
    $id = $_GET['id'];

    use TECWEB\MYAPI\Products as Products;
    require_once __DIR__ . '/myapi/Products.php';

    $prodObj = new Products();
    $prodObj->get($id);
    echo $prodObj->getData();
?>
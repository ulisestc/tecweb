<?php
    $search = $_POST['search'];
    use TECWEB\MYAPI\Products as Products;
    require_once __DIR__ . '/myapi/Products.php';

    $prodObj = new Products();
    $prodObj->search($search);
    echo $prodObj->getData();
?>
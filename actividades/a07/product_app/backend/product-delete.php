<?php
    use TECWEB\MYAPI\Products as Products;
    require_once __DIR__ . '/myapi/Products.php';

    if( isset($_GET['id']) ) {
        $id = $_GET['id'];
    }
    
    $prodObj = new Products();
    $prodObj->delete($id);
    echo $prodObj->getData();
?>
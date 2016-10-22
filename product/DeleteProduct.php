<?php
//Make connection to database
include 'Products.php';
// Store ID to be deleted
$id = $_GET['id'];
// create query and delete record

$product = new Products();

$product->setProductId($id);
$product->deleteProduct();


?>

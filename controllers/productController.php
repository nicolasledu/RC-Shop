<?php

if(!isset($_GET['product_id']) || !ctype_digit($_GET['product_id'])){
  header('Location:index.php');
  exit;
}

require_once 'models/Product.php';

$product = getProduct($_GET['product_id']);
$quantity = getQuantity($_GET['product_id']);
$images = getImages($_GET['product_id']);
if($product == false){
  header('Location:index.php');
  exit;
}

include 'views/product.php';

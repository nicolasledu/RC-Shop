<?php
require_once './models/Shop.php';
$products = getAllProducts();
include './views/shop.php';
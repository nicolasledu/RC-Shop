<?php
function getAllProducts(){


$db = dbConnect();

$query = $db->prepare('SELECT * FROM shop ORDER BY order_id DESC');
$result = $query->execute();

$products= $query->fetchAll();


return $products;
}
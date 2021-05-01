<?php
function getQuantityForSize($id, $size){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM stock WHERE product_id = ? AND size = ?');

    $result = $query->execute( [$id,$size] );

    if($result){
        return $query-> fetchAll();
    }

    else{
        return false;
    }

}

function display($productId){


    $db = dbConnect();
      $query = $db->prepare('SELECT * FROM shop WHERE id= ?');
      $result = $query->execute([
       
        $productId
      ]
      );

      $displayProduct = $query->fetch();
      $displayProduct ['quantity'] = $_SESSION['cart'][$productId]['quantity'];
      $displayProduct ['size'] = $_SESSION['cart'][$productId]['size'];
      
          return $displayProduct;
        
}

function insertOrder($user)
{
  
	$db = dbConnect();
	$query = $db->prepare("INSERT INTO orders (first_name, last_name, email, adress, city, zip, country, payment) VALUES( :first_name, :last_name, :email, :adress, :city, :zip, :country, :payment)");
	$result = $query->execute([
    'first_name' => $user['first_name'],
    'last_name' => $user['last_name'],
    'email' => $user['email'],
    'adress' => $user['adress'],
    'city' => $user['city'],
    'zip' => $user['zip'],
    'country' => $user['country'],
    'payment' => 0,

    ]);	
	return $result;
}
function orderDetails($product, $order, $price, $qty){
  $db = dbConnect();
  
	$query = $db->prepare("INSERT INTO order_products (name, quantity, price, order_id) VALUES( :name, :quantity, :price, :order_id)");
	$result = $query->execute([
    'name' => $product['name'],
    'quantity' => $qty,
    'price' => $price,
    'order_id' => $order['id'],

    ]);	
	return $result;

}
function lastInsertOrderId($email){
  $db = dbConnect();
  $query = $db->prepare('SELECT id FROM orders WHERE email = ? ORDER BY id DESC');
  $result = $query->execute([
   $email,

  ]
  );

  $displayProduct = $query->fetch();
  
      return $displayProduct;
}
function updateQty($quantity, $id, $size){
  $db = dbConnect();
  $query = $db->prepare('UPDATE stock SET quantity = ? WHERE product_id = ? AND size = ?');
  $updatequantity = $query->execute([
   $quantity,
   $id,
   $size

  ]
  );
  
      return $updatequantity;
}
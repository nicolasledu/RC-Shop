<?php

function getAllProducts()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM shop');
    $products=  $query->fetchAll();

    return $products;
}


function getProduct($id)
{
	$db = dbConnect();
	
	$query = $db->prepare("SELECT * FROM shop WHERE id = ?");
	$query->execute([
		$id
	]);
	
	$result = $query->fetch();
	
	return $result;
}
function updateProduct($id, $informations)
{
	$db = dbConnect();
	
	$query = $db->prepare('UPDATE shop SET name = ?, image = ?, price = ?, order_id = ?  WHERE id = ?');
	
	$result = $query->execute(
		[
			htmlspecialchars($informations['name']),
            $informations['image'],
            $informations['price'],
			$informations['order_id'],
			$id,
		]
	);
	
	return $result;
}
function updateStock($id, $informations)
{
	$db = dbConnect();
	
	$query = $db->prepare('UPDATE stock SET size = ?, quantity = ? WHERE id = ?');
	
	$result = $query->execute(
		[
            $informations['size'],
            $informations['quantity'],
			$id,
		]
	);
	
	return $result;
}
function addProduct($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO shop (name, image, price, order_id) VALUES( :name, :image, :price, :order_id)");
	$result = $query->execute([
        'name' => htmlspecialchars($informations['name']),
        'image' => $informations['image'],
		'price' => $informations['price'],
		'order_id' => $informations['order_id'],
	]);
	if($result && !empty($_FILES['image']['tmp_name'])){
		$Id = $db->lastInsertId();
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $Id . '.' . $my_file_extension ;
			$destination = '../assets/images/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			
			$db->query("UPDATE shop SET image = '$new_file_name' WHERE id = $Id");
		}
	}
	return $result;
}
function addStock($informations, $id)
{
    $db = dbConnect();
    
    $query = $db->prepare("INSERT INTO stock (size, quantity, product_id) VALUES( :size, :quantity, :product_id)");
    $result = $query->execute([

        'size' => $informations['size'],
        'quantity' => $informations['quantity'],
        'product_id' => $id,
    ]);
    return $result;
}
function getQuantity($id){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM stock WHERE product_id = ?');

    $result = $query->execute( [$id] );

    if($result){
        return $query-> fetchAll();
    }

    else{
        return false;
    }

}
function deleteProduct($id)
{
	$db = dbConnect();
	
	$query = $db->prepare('DELETE FROM shop WHERE id = ?');
	$result = $query->execute([$id]);
	return $result;
}
function deleteStock($id)
{
	$db = dbConnect();
	
	$query = $db->prepare('DELETE FROM stock WHERE id = ?');
	$result = $query->execute([$id]);
	return $result;
}
<?php

function getAllArchives()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM archives');
    $archives=  $query->fetchAll();

    return $archives;
}

function addArchive($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare("INSERT INTO archives (image) VALUES(:image)");
	$result = $query->execute([
        'image' => $informations['image'],
	]);
	if($result && !empty($_FILES['image']['tmp_name'])){
		$Id = $db->lastInsertId();
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $Id . '.' . $my_file_extension ;
			$destination = '../assets/images/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			
			$db->query("UPDATE archives SET image = '$new_file_name' WHERE id = $Id");
		}
	}
	return $result;
}
function deleteArchive($id)
{
	$db = dbConnect();
	
	$query = $db->prepare('DELETE FROM archives WHERE id = ?');
	$result = $query->execute([$id]);
	return $result;
}
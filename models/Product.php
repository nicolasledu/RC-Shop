<?php
function getProduct($id){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM shop WHERE id = ?');

    $result = $query->execute( [$id] );

    if($result){
        return $query-> fetchAll();
    }

    else{
        return false;
    }

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

function getImages($id){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM images WHERE product_id = ?');

    $result = $query->execute( [$id] );

    if($result){
        return $query-> fetchAll();
    }

    else{
        return false;
    }
}
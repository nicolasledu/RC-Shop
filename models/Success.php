<?php 

function updatePayment($email)
{
  
    $db = dbConnect();
    $query = $db->prepare("UPDATE orders SET payment = 1 WHERE email = ? AND payment = ?");
    $result = $query->execute([
    $email,
    0
  ]);    
    return $result;
}
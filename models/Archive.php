<?php
function getAllArchives(){


$db = dbConnect();

$query = $db->prepare('SELECT * FROM archives ORDER BY id DESC');
$result = $query->execute();

$archives= $query->fetchAll();


return $archives;
}
<?php

include './API/classes/Db.php';
include './API/classes/Person.php';

$database = new DataBase();
$db = $database->connect();

$id = 4;

$user = new Person($db);
$results = $user->getData($id);

print_r($results);


//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
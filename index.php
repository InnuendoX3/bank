<?php

include './API/classes/db.php';

$database = new DataBase();
$db = $database->connect();

$sql = ("SELECT * FROM users");
$stmt =  $db->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

print_r($results);

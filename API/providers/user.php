<?php

include '../classes/Db.php';
include '../classes/User.php';
header('Content-Type: application/json');

// Get id from URL ?id=
$id = isset($_GET['id']) ? $_GET['id'] : die();

$db = new DataBase();
$user = new User($db);
$result = $user->getUser($id);

echo json_encode($result);

<?php

/* session_start();

if (isset($_POST['send'])) {
    $bigUserId = $_SESSION['id'];
    $subUserId = $_POST['subUserId'];
    $amount = $_POST['amount'];

    //echo $selected_user_id;
}

    echo $bigUserId;
    echo $subUserId;
    echo $amount;

require_once '../vendor/autoload.php';
include '../API/classes/Db.php';
include '../API/classes/User.php';
include '../API/classes/Account.php';
include '../API/classes/Transfer.php';
header('Content-Type: application/json');

$db = new DataBase();
$bigUser = new User($db);
$bigUser->constructUser($bigUserId);
$bigUserAccount = new Account($bigUser);

$subUser = new User($db);
$subUser->constructUser($subUserId);
$subUserAccount = new Account($subUser);
echo $bigUserAccount->getUserId() . PHP_EOL;
echo $bigUserAccount->getBalance() . $bigUserAccount->getCurrency() . PHP_EOL;
echo $subUserAccount->getUserId() . PHP_EOL;
echo $subUserAccount->getBalance() . $subUserAccount->getCurrency() . PHP_EOL;

$transferencia = new Transfer($bigUserAccount, $subUserAccount, 50099, $db);
if ($transferencia->isSaldoEnough()) {
    $transferencia->makeTransfer();
    echo "Es suficiente";
} else {
    echo "No es suficiente";
} */


?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "./partials/head_jquery.php"; ?>

<body>
<!--     <h1 id="name"></h1>
    <h2>Saldo: <span id="saldo"></span></h2>
    <h3><a href="">Make a transfer</a></h3>
    <h3><a href="">Logout</a></h3>


    <script src=""></script> -->
</body>
</html>
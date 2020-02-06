<?php

session_start();

if (isset($_POST['send'])) {
    $bigUserId = $_SESSION['id'];
    $subUserId = $_POST['subUserId'];
    $amount = $_POST['amount'];
}

echo $bigUserId;
echo $subUserId;
echo $amount;

include '../classes/Db.php';
include '../classes/User.php';
include '../classes/Account.php';
include '../classes/Transfer.php';
//header('Content-Type: application/json');

$db = new DataBase();
$bigUser = new User($db);
$bigUser->constructUser($bigUserId);
$bigUserAccount = new Account($bigUser);

$message = '';

$subUser = new User($db);
$subUser->constructUser($subUserId);
$subUserAccount = new Account($subUser);
echo $bigUserAccount->getUserId() . PHP_EOL;
echo $bigUserAccount->getBalance() . $bigUserAccount->getCurrency() . PHP_EOL;
echo $subUserAccount->getUserId() . PHP_EOL;
echo $subUserAccount->getBalance() . $subUserAccount->getCurrency() . PHP_EOL;

$transferencia = new Transfer($bigUserAccount, $subUserAccount, $amount, $db);

$currency = $bigUserAccount->getCurrency();
$toAccountId = $subUserAccount->getAccountId();
$balance = $bigUserAccount->getBalance();

if ($transferencia->isSaldoEnough()) {
    $transferencia->makeTransfer();

    $message = "You transfered $amount $currency to 
                account nr. $toAccountId";
} else {
    $message = "You cannot transfer $amount $currency. Your balance is: $balance $currency";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer</title>
</head>
<body>
    <p><?php echo $message ?></p>
    <a href="/bank/app/userPage.php">Go back</a>
    
</body>
</html>


<?php

session_start();

if (isset($_POST['send'])) {
    $bigUserId = $_SESSION['id'];
    $subUserId = $_POST['subUserId'];
    $amount = $_POST['amount'];

    //echo $selected_user_id;
}

    echo $bigUserId;
    echo $subUserId;
    echo $amount;

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
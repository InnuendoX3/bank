<?php

session_start();

if (isset($_POST['send'])) {
    $selected_user_id = $_POST['userId']; 
    //echo $selected_user_id;
}

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "./partials/head_jquery.php"; ?>

<body>
    <h1>Aqui va el nombre del usuario</h1>
    <h2><?php echo $selected_user_id ?></h2>
    <h2>Saldo</h2>
</body>
</html>
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
    <h1 id="name"></h1>
    <h2><?php echo $selected_user_id ?></h2>
    <h2 id="saldo">Saldo</h2>

    <script>
        // Saves the PHP ID variable to  a JS variable for AJAX function
        let id = <?php echo $selected_user_id ?>
    </script>
    <script src="./scripts/userPage.js"></script>
</body>
</html>
<?php

session_start();
/* if (!isset($_SESSION['login'])) {
    header("location: userPage.php");
} */

if (isset($_REQUEST['q'])) {
    session_destroy();
    $message = "You logged out (In DEV terms: Session destroyed)";
    //header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once "./partials/head_jquery.php"; ?>

<body class="row d-flex justify-content-center text-center">
    <div class="mt-5">
        <h3>Login as</h3>
        <form action="/bank/app/userPage.php" method="POST">
            <select name="userId" id="usersDropdown" class="form-control">
                <option value="" disabled selected>Choose an user</option>
                <!-- Here AJAX gets the users -->
            </select>
            <input type="submit" id="botoncito" value="Login" name="send" class="form-control btn btn-primary">   
        </form>
        <?php if (isset($message)) { ?>
            <p> <?php echo $message; ?> </p>
        <?php } ?>
    </div>
    
    <script src="./scripts/login.js"></script>

    <?php require_once "./partials/scripts_jqueryB.php "; ?>
</body>
</html>

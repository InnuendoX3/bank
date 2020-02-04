<!DOCTYPE html>
<html lang="en">

<?php require_once "./partials/head_jquery.php"; ?>

<body>
    <h3>Login as</h3>
    <form action="/bank/app/userPage.php" method="post">
        <select name="userId" id="usersDropdown">
            <option value="" disabled selected>Choose an user</option>
            <!-- Here AJAX gets the users -->
        </select>
        <input type="submit" id="botoncito" value="Login" name="send">   
    </form>
    
    <script src="./scripts/login.js"></script>
</body>
</html>

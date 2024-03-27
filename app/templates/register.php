<?php ob_start() ?>

    <form action="register_handler.php" method="POST">
        <div><label for="username">Username</label></div>
        <div><input type="text" name="username" id="username"></div>
        <div><label for="passowrd">Password</label></div>
        <div><input type="password" name="password" id="password"></div>
        <div><input type="submit" value="Create Account"></div>
    </form>

<?php $content = ob_get_clean() ?>

<?php include '_layout.php' ?>
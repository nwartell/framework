<?php ob_start() ?>

    <form id="login_form" method="POST" action="handlers/signin_handler">
        <div id="message"><?php if (isset($_SESSION['message'])) {echo $_SESSION['message'];} ?></div>
        <div><label for="username">Username</label></div>
        <div><input type="text" name="username" id="username" required></div>
        <div><label for="password">Password</label></div>
        <div><input type="password" name="password" id="password" required></div>
        <div><input type="submit" value="Sign In"></div>
        <div>Don't have an account? <a href="register">Create an account</a></div>
    </form>

<?php $content = ob_get_clean() ?>

<?php include '_layout.php' ?>
<?php ob_start() ?>

    <form id="register_form">
        <div id="message"></div>
        <div><label for="username">Username</label></div>
        <div><input type="text" name="username" id="username" required></div>
        <div><label for="password">Password</label></div>
        <div><input type="password" name="password" id="password" required></div>
        <div><label for="passoword_ver">Re-enter Password</label></div>
        <div><input type="password" name="password_ver" id="password_ver" required></div>
        <div><input type="submit" value="Create Account"></div>
        <div>Already have an account? <a href="signin">Sign in</a></div>
    </form>

<?php $content = ob_get_clean() ?>

<?php include '_layout.php' ?>
<script src="js/register.js"></script>
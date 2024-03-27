<?php

$title = setTitle('Sign In');

if ($_SESSION['AUTH_STATE'] === false) {
    require PATH_PREPEND.'templates/signin.php';
} else {
    header('Location: index'); // Already signed in.
}

?>
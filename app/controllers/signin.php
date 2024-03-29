<?php

$title = Page::setTitle('Sign In');

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}

if ($_SESSION['AUTH_STATE'] === false) {
    require PATH_PREPEND.'templates/signin.php';
    unset($message);
    unset($_SESSION['message']);
} else {
    header('Location: index'); // Already signed in.
}

?>
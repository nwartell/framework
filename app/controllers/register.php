<?php

$title = setTitle('Register');

if ($_SESSION['AUTH_STATE'] === false) {
    require PATH_PREPEND.'templates/register.php';
} else {
    header('Location: index'); // User already registered and signed in.
}

?>
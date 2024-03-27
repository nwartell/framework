<?php
session_start();
unset($_SERVER['HTTP_AUTHORIZATION']);
session_destroy();
header("location: index.php");
?>
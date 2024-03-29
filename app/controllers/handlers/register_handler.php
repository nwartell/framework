<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password_ver'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password_ver = $_POST['password_ver'];

    $result = User::register($username, $password, $password_ver);
    echo $result;

} else {
    exit('POST Error.');
}

?>
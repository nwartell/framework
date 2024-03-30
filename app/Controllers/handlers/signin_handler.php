<?php
if (Http::issetPost('username', 'password')) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = AuthService::signIn($username, $password);

    if ($result === true) {
        header('Location: ../index');
        exit();
    } else {
        $_SESSION['message'] = $result;
        header('Location: ../signin');
    }

} else {
    exit('POST Error.');
}

?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = User::signIn($username, $password);

    if ($result === true) {
        header('Location: index');
        exit();
    } else {
        $_SESSION['message'] = $result;
        header('Location: signin');
    }

} else {
    exit('POST Error.');
}

?>
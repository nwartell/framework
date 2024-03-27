<?php
use Firebase\JWT\JWT;
function handleSignIn() {

    if (!isset($_POST['username']) && !isset($_POST['password'])) {
        exit('Enter both a username and password before submitting.');
    } else {

        $username = $_POST['username'];
        $password = $_POST['password'];

        try {

            $pdo = pdo_open();

            $stmt = $pdo->prepare('SELECT UUID_UNBIN(uuid) as uuid, username, password FROM users WHERE username = ?');
            $stmt->bindValue(1, $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {

                $iat = time();
                $nbf = $iat;
                $exp = $iat + (24 * 60 * 60); // Token valid for 24 hours

                $tokenPayload = array(
                    'iat' => $iat, // Time of issuance
                    'iss' => 'wartell', // Issuer identification
                    'nbf' => $nbf, // Start time for token validity
                    'exp' => $exp, // Token expiration
                    'uuid' => $user['uuid'], // User's UUID
                    'username' => $user['username'] // User's username
                );
                $jwtToken = JWT::encode($tokenPayload, $_ENV['APP_JWT'], 'HS256');
                //$_SERVER['HTTP_AUTHORIZATION'] = $jwtToken;
                $_SESSION['TOKEN'] = $jwtToken;

                echo 'Success';
            } else {
                echo 'Username or password incorrect.';
            }

        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        } finally {
            pdo_close($pdo);
        }

    }
}

handleSignIn();

?>
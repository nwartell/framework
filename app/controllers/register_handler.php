<?php

function handleRegister() {

    if (!isset($_POST['username']) && !isset($_POST['passowrd'])) {
        exit('Fill out all fields before submitting.');
    } else {

        $username = htmlspecialchars($_POST['username']);
        $password = $_POST['password'];

        try {

            $pdo = pdo_open();

            $stmt = $pdo->prepare('SELECT username FROM users WHERE username = ?');
            $stmt->bindValue(1, $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {

                $password_hash = password_hash($password, PASSWORD_ARGON2ID);
                
                $stmt = $pdo->prepare("INSERT INTO users (id, uuid, username, password, fname, lname)
                    VALUES (NULL, UNHEX(REPLACE(UUID(),'-','')), ?, ?, NULL, NULL)"
                );
                $stmt->bindValue(1, $username);
                $stmt->bindValue(2, $password_hash);
                $stmt->execute();

                echo 'Registration successful.';
                
            } else {
                echo 'An account already exists with this username.';
            }

        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        } finally {
            pdo_close($pdo);
        }

    }
}

handleRegister();

?>
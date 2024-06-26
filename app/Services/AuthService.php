<?php
class AuthService {

    // Sign in the user
    public static function signIn($username, $password) {
        try {
            $pdo = pdo_open();

            $stmt = $pdo->prepare('SELECT UUID_UNBIN(uuid) as uuid, username, password FROM users WHERE username = ?');
            $stmt->bindValue(1, htmlspecialchars($username));
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {

                $payload = array(
                    'uuid' => $user['uuid'], // User's UUID
                    'username' => $user['username'] // User's username
                );

                $_SESSION['TOKEN'] = $payload;

                return true;

            } else {
                return 'Username or password incorrect.';
            }
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        } finally {
            pdo_close($pdo);
        }
    }

    // Register user
    public static function registerUser($username, $password, $password_ver) {
        try {
            $pdo = pdo_open();

            $username = htmlspecialchars($username);

            $stmt = $pdo->prepare('SELECT username FROM users WHERE username = ?');
            $stmt->bindValue(1, $username);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {

                if (!preg_match('/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z])[a-zA-Z0-9_.]{3,36}$/', $username)) {
                    return 'Invalid username. A valid username has at least 3 letters and no more than 36 characters total. Underscores and periods are allowed.';
                }

                if (!preg_match(
                        '/^' .             // Start of string
                        '(?=.*[0-9])' .    // One digit (0-9)
                        '(?=.*[A-Z])' .    // One uppercase letter
                        '(?=.*[!@#$%^&*(),.?":{}|<>])' . // One special character
                        '.{8,}' .          // At least 8 characters
                        '$/',             // End of string
                        $password
                )) {
                    return 'Password does not meet the minimum criteria.';
                }

                if ($password !== $password_ver) {
                    return 'Passwords do not match';
                }

                $password_hash = password_hash($password, PASSWORD_ARGON2ID);
                
                $stmt = $pdo->prepare("INSERT INTO users (id, uuid, username, password, fname, lname, permissions)
                    VALUES (NULL, UNHEX(REPLACE(UUID(),'-','')), ?, ?, NULL, NULL, 0)"
                );
                $stmt->bindValue(1, $username);
                $stmt->bindValue(2, $password_hash);
                $stmt->execute();

                return 'Your account has been created. You may now sign in';
                
            } else {
                return 'An account already exists with this username';
            }

        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        } finally {
            pdo_close($pdo);
        }
    }

}
?>
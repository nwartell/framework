<?php

class User {

    /* To be implemented
    private $uuid;
    private $username;

    public function __construct($uuid, $username) {
        $this->uuid = $uuid;
        $this->username = $username;
    }*/

    public static function getInfo() {
        try {
            $pdo = pdo_open();

            $stmt = $pdo->prepare("SELECT fname, lname, username
                FROM users WHERE uuid = UNHEX(REPLACE(?,'-',''));");
            $stmt->bindValue(1, $_SESSION['UUID']);
            $stmt->execute();

            if ($stmt->rowCount() === 1) {
                $info = $stmt->fetch(PDO::FETCH_ASSOC);
                return array(
                    'fname' => htmlspecialchars($info['fname']),
                    'lname' => htmlspecialchars($info['lname']),
                    'username' => htmlspecialchars($info['username'])
                );
            }

        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
        } finally {
            pdo_close($pdo);
        }
    }

}

?>
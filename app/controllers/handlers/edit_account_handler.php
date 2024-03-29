<?php

if (Http::issetPost('fname', 'lname', 'username')) {
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];

    try {

        $pdo = pdo_open();

        $stmt = $pdo->prepare("UPDATE users SET fname = ?, lname = ?, username = ? WHERE uuid = UNHEX(REPLACE(?,'-',''));");
        $stmt->bindValue(1, $fname);
        $stmt->bindValue(2, $lname);
        $stmt->bindValue(3, $username);
        $stmt->bindValue(4, $_SESSION['UUID']);
        $stmt->execute();

        header('Location: ../account'); // There is no "if ($stmt->rowCount() > 0)" because errors/success msg are not sent back.

    } catch (PDOException $e) {

    } finally {
        pdo_close($pdo);
    }

} else {
    echo 'POST error.';
}

?>
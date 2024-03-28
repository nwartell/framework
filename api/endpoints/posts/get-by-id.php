<?php

API::requireKey();

if(isset($_GET['id']) && ctype_digit($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    try {
        $pdo = pdo_open();
    
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?;");
        $stmt->bindValue(1, $id);
        $stmt->execute();
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
    
        if (!$data) {
            echo json_encode(array('error' => 'No matching ID found'));
        } else {
            echo json_encode($data);
        }
    
    } catch (PDOException $e) {
        echo $e->getMessage();
        echo json_encode(array('error' => 'Internal database error. Contact administrator.'));
    } finally {
        pdo_close($pdo);
    }
} else {
    echo json_encode(array(('error') => 'ID invalid or not set'));
    exit;
}

?>
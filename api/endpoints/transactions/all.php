<?php
// Endpoint: transactions/all

if(isset($_GET['order'])) {
    $order = strtoupper($_GET['order']);
    if ($order !== 'ASC' && $order !== 'DESC') {
        echo json_encode(array('error' => 'Invalid order parameter value'));
        exit;
    }
} else {
    $order = 'ASC';
}

try {
    $pdo = pdo_open();

    $sql = "SELECT * FROM investments_import ORDER BY open_date ";
    if ($order === 'ASC' || $order === 'DESC') {
        $sql .= $order;
    } else {
        $sql .= 'ASC';
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    $json = json_encode($data);
    echo $json;

} catch (PDOException $e) {
    echo json_encode(array('error' => 'Internal database error. Contact administrator.'));
} finally {
    pdo_close($pdo);
}

?>
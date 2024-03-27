<?php

requireAuth();

$id = extract_param('id');

function get_post_by_id($id)
{
    $pdo = pdo_open();

    $query = 'SELECT title, content FROM posts WHERE id=:id';
    $statement = $pdo->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    pdo_close($pdo);

    return $row;
}

$post = get_post_by_id($id);
require PATH_PREPEND.'templates/show.php';
?>
<?php

Auth::require();

$title = setTitle('All Posts');

function get_all_posts()
{
    $pdo = pdo_open();

    $result = $pdo->query('SELECT id, title FROM posts');

    $posts = [];
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
    pdo_close($pdo);

    return $posts;
}

$posts = get_all_posts();
require PATH_PREPEND.'templates/list.php';
//require PATH_PREPEND.'templates/main.php';
?>
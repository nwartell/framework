<?php

$title = set_title('All Posts');

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
require PATH_PREPEND.'templates/list.php'
?>
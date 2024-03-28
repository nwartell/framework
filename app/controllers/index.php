<?php

Auth::require();

$title = Page::setTitle('All Posts');

$posts = Endpoint::get('posts','id','title', 'date_created');

require PATH_PREPEND.'templates/list.php';
//require PATH_PREPEND.'templates/main.php';
?>
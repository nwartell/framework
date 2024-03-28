<?php

Auth::require();

$id = Router::extractParam('id');

$post = Endpoint::getById('posts',$id);

require PATH_PREPEND.'templates/show.php';
?>
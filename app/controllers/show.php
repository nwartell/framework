<?php

Auth::require();

$id = Url::extractParam('id');

$post = Endpoint::getById('posts',$id);

require PATH_PREPEND.'templates/show.php';
?>
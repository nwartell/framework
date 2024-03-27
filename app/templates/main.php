<?php ob_start(); ?>
<div>Hello World</div>
<?php $main = ob_get_clean(); ?>
<?php include '_scaffold.php'; ?>
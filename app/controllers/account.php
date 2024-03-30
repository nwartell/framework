<?php

$userInfo = User::getInfo();

if (Url::extractParam('view') === 'edit') {
    require PATH_PREPEND.'templates/account_edit.php';
} else {
    require PATH_PREPEND.'templates/account.php';
}
?>
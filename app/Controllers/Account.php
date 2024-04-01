<?php

$title = Page::setTitle('Account');

$userInfo = User::getInfo();

if (Url::extractParam('view') === 'edit') {
    require PATH_PREPEND.'templates/account_edit.php';
} else if (Url::extractParam('setting') === 'pwdc') {
    require PATH_PREPEND.'templates/account_change_password.php';
} else {
    require PATH_PREPEND.'templates/account.php';
}
?>
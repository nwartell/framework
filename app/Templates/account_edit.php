<?php ob_start() ?>
<h2>Your Account</h2>
<div>
    <h4>Profile</h4>
    <form id="account_info_form" method="POST" action="handlers/edit_account_handler.php">
        <div id="message"></div>
        <div>
            <label for="fname">First Name: </label>
            <input type="text" name="fname" id="fname" value="<?= $userInfo['fname']; ?>">
        </div>
        <div>
            <label for="lname">Last Name: </label>
            <input type="text" name="lname" id="lname" value="<?= $userInfo['lname']; ?>">
        </div>
        <div>
            <label for="lname">Username: </label>
            <input type="text" name="username" id="username" value="<?= $userInfo['username']; ?>">
        </div>

        <a href="account">Discard Changes</a> <input type="submit" value="Save Changes">
    </form>
</div>
<!--<div> TO BE IMPLEMENTED
    <h4>Account Settings</h4>
    <form id="account-settings">
        <input type="checkbox" id="mfa" name="mfa"><label for="mfa">Use two-factor authentication</label>
        <div>
            <input type="submit" id="save-settings" value="Save Changes">
        </div>
    </form>
</div>-->
<?php $main = ob_get_clean(); ?>
<?php include '_scaffold.php'; ?>
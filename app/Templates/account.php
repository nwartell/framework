<?php ob_start() ?>
<h2>Your Account</h2>
<div>
    <h4>Profile</h4>
    <div>First Name: <?= $userInfo['fname']; ?></div>
    <div>Last Name: <?= $userInfo['lname']; ?></div>
    <div>Username: <?= $userInfo['username']; ?></div>
    <a href="account?view=edit">Edit Profile</a>
</div>
<div>
    <h4>Account Settings</h4>
    <!--<form id="account-settings">
        <input type="checkbox" id="mfa" name="mfa"><label for="mfa">Use two-factor authentication</label>
        <div>
            <input type="submit" id="save-settings" value="Save Changes">
        </div>
    </form>-->
    <a href="?setting=pwdc">Change Password</a>
</div>
<?php $main = ob_get_clean(); ?>
<?php include '_scaffold.php'; ?>
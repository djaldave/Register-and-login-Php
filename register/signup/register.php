<?php
require 'header.php';
?>

<fieldset>
    <legend>SignUp to get Access</legend>

<form action="register.php" method="post">

    <table cellpadding="0" cellspacing="0" width="100%">

        <tr>
            <td width="30%"><label for="fn">Name</label></td>
            <td width="70%"><input type="text" id="fn"></td>
        </tr>

        <tr>
            <td width="30%"><label for="email">Email</label></td>
            <td width="70%"><input type="email" id="email"></td>
        </tr>

        <tr>
            <td width="30%"><label for="password">Password</label></td>
            <td width="70%"><input type="password" id="password"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="SignUp"></td>
        </tr>

    </table>

    </fieldset>
</form>
<?php
require 'footer.php';
?>

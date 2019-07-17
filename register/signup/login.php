<?php
include 'header.php';
include 'includes/config.php';
session_start();

$errors='';
$success ='';




if(isset($_REQUEST['loginBtn'])){

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];


    if(empty($email)){
        $errors .= "Please fill in your email<br>";
    }
    if(empty($password)){
        $errors .= "Please fill in your password<br>";
    }
    if(!empty($email) and !empty($password)){
        $check =mysqli_query($connection,"select * from members where email='$email' and password='$password' and activated='1'");
        if(mysqli_num_rows($check)>0){
//            $errors .= 'Please enter a different email address';
            $rs =mysqli_fetch_array($check);
            $_SESSION['member_id']= $rs['id'];
            header("Location: index.php");
        }else{
            $errors .="Credentials not match! or please verify your email";
        }
    }
}
?>

<fieldset>
    <legend>SignUp to get Access</legend>

    <?php
    print $errors;
    print $success;
    ?>
    <form action="login.php" method="post">

        <table cellpadding="0" cellspacing="0" width="100%">

            <tr>
                <td width="30%"><label for="email">Email</label></td>
                <td width="70%"><input type="email" id="email" name="email" value="<?=((isset($email))?$email:'')?>"></td>
            </tr>

            <tr>
                <td width="30%"><label for="password">Password</label></td>
                <td width="70%"><input type="password" id="password" name="password" value="<?=((isset($password))?$password:'')?>"></td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" value="Login" name="loginBtn"></td>
            </tr>

        </table>

</fieldset>
</form>
<?php
include 'footer.php';
?>

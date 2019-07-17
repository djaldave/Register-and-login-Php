<?php
include 'header.php';
include 'includes/config.php';
$errors='';
$success ='';




if(isset($_REQUEST['signUp'])){
    $name = $_REQUEST['fn'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if(empty($name)){
        $errors .= "Please fill in your name<br>";
    }
    if(empty($email)){
        $errors .= "Please fill in your email<br>";
    }
    if(empty($password)){
        $errors .= "Please fill in your password<br>";
    }
    if(!empty($name) and !empty($email) and !empty($password)){
        $check =mysqli_query($connection,"select * from members where email='$email'");
        if(mysqli_num_rows($check)>0){
            $errors .= 'Please enter a different email address';
        }else{
            $query ="insert into members set
                id='',
                name='$name',
                email='$email',
                password='$password',
                date = NOW()";
            if(mysqli_query($connection,$query)){
                $name='';
                $email='';
                $password='';
                $success = "Successfully Created";
            }
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
<form action="register.php" method="post">

    <table cellpadding="0" cellspacing="0" width="100%">

        <tr>
            <td width="30%"><label for="fn">Name</label></td>
            <td width="70%"><input type="text" id="fn" name="fn" value="<?=((isset($name))?$name:'')?>"></td>
        </tr>

        <tr>
            <td width="30%"><label for="email">Email</label></td>
            <td width="70%"><input type="email" id="email" name="email" value="<?=((isset($email))?$email:'')?>"></td>
        </tr>

        <tr>
            <td width="30%"><label for="password">Password</label></td>
            <td width="70%"><input type="password" id="password" name="password" value="<?=((isset($password))?$password:'')?>"></td>
        </tr>

        <tr>
            <td colspan="2"><input type="submit" value="SignUp" name="signUp"></td>
        </tr>

    </table>

    </fieldset>
</form>
<?php
include 'footer.php';
?>

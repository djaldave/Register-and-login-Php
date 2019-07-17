<?php
session_start();
if(isset($_SESSION['member_id'])){
    echo "Current logged in user id is : ".$_SESSION['member_id'];
    print  "<br>
<a href=\"logout.php\">Logout</a>";
}else{
    header("Location: login.php");
}
?>


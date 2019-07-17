<?php
include 'includes/config.php';
$token = $_REQUEST['token'];
$query ="update members set activated='1' where token='".$token."'";
if($run_query = mysqli_query($connection ,$query)){
    print "you have been verified";
    exit;
}


?>
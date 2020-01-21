<?php
include('../db/user-class.php');
$pk=new User;
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$upass=md5($upass);
$pk->login($uname,$upass);
?>

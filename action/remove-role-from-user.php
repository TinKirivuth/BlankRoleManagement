<?php
	include('../db/user-class.php');
	$pk=new User;	
	$rid=$_POST['rid'];
	$uid=$_POST['uid'];
	$pk->remove_role_from_user($rid,$uid);
?>
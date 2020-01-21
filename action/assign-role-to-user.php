<?php
	include('../db/user-class.php');
	$pk=new User;	
	$rid=$_POST['rid'];
	$uid=$_POST['uid'];
	$pk->assign_role_to_user($rid,$uid);
?>
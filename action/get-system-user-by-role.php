<?php
	include('../db/user-class.php');
	$pk=new User;	
	$rid=$_POST['rid'];
	$pk->get_system_user_by_role($rid);
?>
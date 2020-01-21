<?php
	include('../db/user-class.php');
	$pk=new User;	
	$rid=$_POST['rid'];
	$pk->get_role_permission($rid);
?>
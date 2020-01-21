<?php
	include('../db/user-class.php');
	$pk=new User;	
	$roleId=$_POST['roleId'];
	$menuId=$_POST['menuId'];

	$pk->remove_permission($roleId,$menuId);
?>
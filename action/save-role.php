<?php
	include('../db/user-class.php');
	$pk=new User;	
	$rname=$_POST['rname'];
	$note=$_POST['note'];
	$pk->save_role($rname,$note);
?>
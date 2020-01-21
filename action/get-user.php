<?php
	include('../db/user-class.php');
	$pk = new User;

	$con=$_POST['con'];
	$opt=$_POST['opt'];
	$s=$_POST['s'];
	$show_record=$_POST['show_record'];
	$limit="$s,$show_record";
?>
	<tr>
        <th class="text-center" style="width: 40px;">ID</th>
		<th>Last Name</th>
		<th>First Name</th>
        <th>Login Name</th>
		<th>Photo</th>
        <th class="text-center" style="width: 150px;">Action</th>
    </tr>
<?php
	$pk->get_user($opt,$con,$limit);
?>
 
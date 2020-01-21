<?php
	session_start();
	include('database.php');
	class User extends Db{
		//opent conntection
		function __construct(){
			$this->connect();
		}

		// get user login
		function login($uname,$upass){
		    $sql="SELECT * FROM users WHERE lgname='".$uname."' AND password='".$upass."' AND status=1 AND rid<>0";
		    $result=$this->cn->query($sql);
		    $num=$result->num_rows;
		    if($num>0){
				$row=$result->fetch_array();
		      	$msg['login']='1';
				$_SESSION['userID']=$row['uid'];
				$_SESSION['loginName']=$row['lgname'];
				$_SESSION['userPhoto']=$row['photo'];
				$_SESSION['userRole']=$row['rid'];
				$_SESSION['userStatus']=$row['status'];
		    }else{
		      $msg['login']='0';
		    }
		    echo json_encode($msg);
		}

		//get menu permision
		function get_role_permission($rid){
			$post_data=$this->select_data("menuroles","rid=".$rid."","rid","0,100");
			if($post_data !=0){
				foreach($post_data as $val){
					?>
						<li data-opt="<?php echo $val['mid']; ?>" data-mid="<?php echo $val['main_id']; ?>"><a href="#"><i class="fa fa-circle-o"></i> <?php echo $val['mname']; ?></a></li>
					<?php
				}
			}
		}

		//get user to select for assign permission
		function get_role_to_select(){
			$post_data=$this->select_data("roles","status=1 AND rid>=0","rid","0,100");
			if($post_data !=0){?>
				<option value="0">--- Select One Role To Assign ---</option>
				<?php
				foreach($post_data as $val){
					?>
						<option value="<?php echo $val['rid'] ?>"><?php echo $val['rname']; ?></option>
					<?php
				}
			}
		}

		//assign menu permission to role
		function assign_permission($roleId,$menuId,$menuName,$mainId,$main){
			$this->insert_data($this->tbl[2],"'".$menuId."','".$roleId."','".$menuName."',0,'".$main."','".$mainId."'");
		}

		// remove permission
		function remove_permission($roleId,$menuId){
			$this->delete_data($this->tbl[2],"rid='".$roleId."' AND mid='".$menuId."'");
		}

		// Save Role
		function save_role($rname,$note){
			// if($id==0){	
				$dpl=$this->dpl($this->tbl[1],"rname='".$rname."'");
				if($dpl==1){
					$status['dpl']="1";	
				}else{
					$this->insert_data($this->tbl[1],"NULL,'".$rname."','".$note."',1");
					$status['dpl']="0";
				}
			// }else{
			// 	// update
			// }	
			$status['message'] = 'Successfully.';
			echo json_encode($status);
		}

		// get system user by role
		function get_system_user_by_role($rid){
			$post_data=$this->select_data($this->tbl[0],"rid=".$rid." AND status=1","rid","0,200");
			if($post_data !=0){
				foreach($post_data as $val){
					?>
						<li data-uid="<?php echo $val['uid'];?>"><a href="#"><i class="fa fa-circle-o"></i> <?php echo $val['lgname']; ?></a></li>
					<?php
				}
			}
		}

		// get system user (free user not yet assign role)
		function get_system_user(){
			$post_data=$this->select_data($this->tbl[0],"rid=0 AND status=1","rid","0,200");
			if($post_data !=0){
				foreach($post_data as $val){
					?>
						<li data-uid="<?php echo $val['uid'];?>"><a href="#"><i class="fa fa-circle-o"></i> <?php echo $val['lgname']; ?></a></li>
					<?php
				}
			}
		}

		// assign role to user
		function assign_role_to_user($rid,$uid){
			$this->update_data($this->tbl[0],"rid='".$rid."'","uid='".$uid."'");
		}

		// remove role from user
		function remove_role_from_user($rid,$uid){
			$this->update_data($this->tbl[0],"rid=0","uid='".$uid."'");
		}

		// get user for listing page
		// Get News Listing Page
		function get_user($opt,$con,$limit){
		    $od="uid DESC";
		    $post_data=$this->select_data($this->tbl[$opt],$con,$od,$limit);
		    if($post_data!=0){
			    foreach ($post_data as $row) {
			?>
			    	<tr>
				        <td class="text-center"><?php echo $row['uid']; ?></td>
						<td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lgname']; ?></td>
						<td><?php echo $row['photo']; ?></td>
				        <td class="text-center">
							<a href="#" class="btn-edit" title="View" style="color: white;font-size: 20px;"><i class="fas fa-eye"></i></a> &nbsp;&nbsp;
							<a href="#" class="btn-disable" title="Disable" style="color: white;font-size: 18px;"><i class="fas fa-trash-alt"></i></a>
				        </td>
			      </tr>       
			<?php
			    }
			}
        }
}
?>
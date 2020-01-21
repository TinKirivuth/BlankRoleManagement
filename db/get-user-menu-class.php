<?php
include('database.php');
class MenuUser extends Db{
	//opent conntection
	function __construct(){
		$this->connect();
	}

	// get menu user by role after you are login
	function get_menu_user($userRole){
		$post_data=$this->select_data("menuroles","rid=".$userRole." AND is_main=1","mid","0,200");
		if($post_data !=0){
			foreach($post_data as $val){ ?>
				<li class="treeview" data-mid="<?php echo $val['main_id'];?>">
		          <a href="#">
		            <i class="fa fa-dashboard"></i> <span><?php echo $val['mname'];?></span>
		            <span class="pull-right-container">
		              <i class="fa fa-angle-left pull-right"></i>
		            </span>
		          </a>
		          <?php
		          $post_data1=$this->select_data("menuroles","main_id=".$val['mid']." AND rid=".$val['rid']."","mid","0,200");
					if($post_data1 !=0){ ?>
						<ul class="treeview-menu">
						<?php
						foreach($post_data1 as $row){ ?>
				            <li data-opt="<?php echo $row['mid'];?>" data-mid="<?php echo $row['main_id'];?>" data-main="<?php echo $row['is_main'];?>"><a href="#"><i class="fa fa-circle-o"></i> <?php echo $row['mname'];?></a></li>
			          	<?php
			      		} 
			      		?>
			      		</ul>
			      	<?php
			      	}
			        ?>
		        </li>
			<?php
			}
		}
	}
}
?>
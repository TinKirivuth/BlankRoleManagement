<?php
	class Db{
		public $cn;
		private $dbHost="localhost";
		private $dbUser="root";
		private $dbPass="123abc+-*/";
		private $dbName="inventory";
		
		protected $tbl=array("users","roles","menuroles","","","","","","","","","","","","");
		protected $last_id;

		// Connection
		protected function connect(){
			$this->cn=new MySQLi($this->dbHost,$this->dbUser,$this->dbPass,$this->dbName);
      		$this->cn->set_charset('utf8');
		}

		// Insert Data
		protected function insert_data($tbl,$field){
			$sql="INSERT INTO ".$tbl." VALUES(".$field.")";
			$this->cn->query($sql);
			// get insert_id
			$this->last_id=$this->cn->insert_id;
		}

		// Update Data
		protected function update_data($tbl,$field,$con){
			$sql="UPDATE ".$tbl." SET ".$field." WHERE ".$con."";
			$this->cn->query($sql);
		}

		// Delete Data
		protected function delete_data($tbl,$con){
			$sql="DELETE FROM ".$tbl." WHERE ".$con."";
			$this->cn->query($sql);
		}

		// Disable Status
		protected function disable_data($tbl,$field,$con){
			$sql="UPDATE ".$tbl." SET ".$field." WHERE ".$con."";
			$this->cn->query($sql);
		}

		// Check Douplicated Data
		protected function dpl($tbl,$con){
			$sql="SELECT * FROM ".$tbl." WHERE ".$con."";
			$result=$this->cn->query($sql);
			$num=$result->num_rows;
			if($num>0){
				return 1;
			}else{
				return 0;
			}
		}

		//Select Data
		protected function select_data($tbl,$con,$od,$limit){
			$data=array();
			$sql="SELECT * FROM ".$tbl." WHERE ".$con." ORDER BY ".$od." LIMIT ".$limit."";
			$result=$this->cn->query($sql);
			if($result->num_rows>0){
				while($row=$result->fetch_array()){
					$data[]=$row;
				}
				return $data;
			}else{
				return 0;
			}
		}

		// Select Current Data
		protected function select_current_data($tbl,$con){
			$data=array();
			$sql="SELECT * FROM ".$tbl." WHERE ".$con."";
			$result=$this->cn->query($sql);
			if($result->num_rows>0){
				$row=$result->fetch_array();
				return $row;
			}else{
				return 0;
			}
		}

		// Count Data
		public function count_data($opt,$con){
    		$this->connect();
    		$sql="SELECT COUNT(*) AS total FROM ".$this->tbl[$opt]." WHERE ".$con."";
			$result=$this->cn->query($sql);

			if($result->num_rows>0){
				$row=$result->fetch_array();
    			$status['total']=$row[0];
			}else{
				$status['total']=0;
			}
    		echo json_encode($status);
		}

		// Get Auto ID
		public function get_auto_id($opt){
			$this->connect();
			$sql="SELECT id FROM ".$this->tbl[$opt]." ORDER BY id DESC";
			$result=$this->cn->query($sql);
			$row=$result->fetch_array();
			return $row[0]+1;
		}

		// binding data to combobox
		public function get_data_to_select($opt,$con,$od,$limit,$d){
			$this->connect();
			$post_data=$this->select_data($this->tbl[$opt],$con,$od,$limit);
			if($post_data!=0){
				?>
				<option value="-1">------Please Select------</option>
				<?php
				foreach ($post_data as $val) {
					?>
					<option value="<?php echo $val[0]; ?>"><?php echo $val[$d]; ?></option>
					<?php
				}
			}
		}

		// Get Type Menu
		public function get_type_menu_to_select(){
			$this->connect();
			$sql="SELECT * FROM tbl_type WHERE id>0";
			$result=$this->cn->query($sql);
			if($result->num_rows>0){?>
				<option value="-1">------Please Select------</option>
				<?php while($row=$result->fetch_array()){?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['name_en']; ?></option>
				<?php
				}
			}else{
				return 0;
			}
		}

		// Get Content type Menu
		public function get_content_menu_to_select(){
			$this->connect();
			// $sql="SELECT ps.id,ps.name_en FROM tbl_product_service ps UNION SELECT mi.id,mi.title_en FROM tbl_menu_item mi UNION SELECT t.id,t.name_en FROM tbl_type t WHERE t.id=16 ORDER BY id";
			$sql="SELECT mi.id,mi.title_kh,mi.title_en,mi.name_link_kh,mi.name_link_en FROM tbl_menu_item mi UNION SELECT ps.id,ps.name_kh,ps.name_en,ps.name_link_kh,ps.name_link_en FROM tbl_product_service ps UNION SELECT t.id,t.name_kh,t.name_en,t.name_link_kh,t.name_link_en FROM tbl_type t WHERE t.id=16 ORDER BY id";

			$result=$this->cn->query($sql);
			if($result->num_rows>0){?>
				<option value="-1">------Please Select------</option>
				<?php while($row=$result->fetch_array()){?>
					<option value="<?php echo $row['id']; ?>"><?php echo $row['title_en']; ?></option>
				<?php
				}
			}else{
				return 0;
			}
		}

		// get post date
	  	public function get_post_date($time,$date){
			$previousTimeStamp = strtotime($time." ".$date);
			$lastTimeStamp = strtotime(date("Y-m-d h:i:sa"));
			$menos=$lastTimeStamp-$previousTimeStamp;
			$mins=$menos/60;
			if($mins<1){
			$showing= "ទើបបញ្ចូល";
			}
			else{
			$minsfinal=floor($mins);
			$secondsfinal=$menos-($minsfinal*60);
			$hours=$minsfinal/60;
			if($hours<1){
			$showing= $minsfinal . " នាទីមុន";
			}
			else{
			$hoursfinal=floor($hours);
			$minssuperfinal=$minsfinal-($hoursfinal*60);
			$days=$hoursfinal/24;
			if($days<1){
			$showing= $hoursfinal . " ម៉ោងមុន";
			}
			else if($days<2)
			{
			$showing=" ម្សិលមិញ ម៉ោង ".$time;
			}
			else{
			$d=date("d",strtotime($date));
			$m=date("m",strtotime($date));
			$y=date("Y",strtotime($date));
			if($m==1)
			{
				$m='មករា';
			}
			else if($m==2)
			{
				$m='កុម្ភៈ';
			}
			else if($m==3)
			{
				$m='មីនា';
			}
			else if($m==4)
			{
				$m='មេសា';
			}
			else if($m==5)
			{
			$m='ឧសភា';
			}
			else if($m==6)
			{
			$m='មិថុនា';
			}
			else if($m==7)
			{
			$m='កក្តដា';
			}
			else if($m==8)
			{
			$m='សីហា';
			}
			else if($m==9)
			{
			$m='កញ្ញា';
			}
			else if($m==10)
			{
			$m='តុលា';
			}
			else if($m==11)
			{
			$m='វិច្ឆិកា';
			}
			else if($m==12)
			{
			$m='ធ្នូ';
			}

			$showing=$d."-".$m."-".$y ." - ម៉ោង ". $time;
			}}}
			echo $showing;
		}

		// Count news
			// public function count_news($con){
			// 	$sql="SELECT COUNT(*) AS total FROM ".$this->tbl[1]." WHERE ".$con."";
			// 	$result=$this->cn->query($sql);
			// 	$row=$result->fetch_array();
			// 	return $row[0];
			// }

		//format slug
		protected function php_slug($string){
			$slug=trim($string);
			$slug=preg_replace("#(\p{P}|\p{C}|\p{S}|\p{Z})+#u","-",$string);
			return $slug;
		}

	}
?>

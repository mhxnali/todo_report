

<?php 

	require_once 'conn.php';
	$conn=mysqli_connect(DB_LINK,DB_USER,DB_PASS,DB_DB);

	function sqlconnection(){
		global $conn;		
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
		echo "Connected successfully";  
		}

	function my_table_row_count($sql){
		global $conn;		
		$result=mysqli_query($conn,$sql);
		return mysqli_num_rows($result);  
		}


	function fetch_data($sql){	
		global $conn;
		$result=mysqli_query($conn,$sql);			
				while($row=mysqli_fetch_assoc($result)){
					   	  $items[] = $row; 
					   }return $items;
					}  

	function one_fetch_data($sql){	
		global $conn;
		$result=mysqli_query($conn,$sql);			
		$row=mysqli_fetch_assoc($result);
			return $row; 
					}

	function fetch_name($table,$id){
		global $conn;
		$sql="SELECT `name` FROM `".$table."` WHERE id='".$id."'";
		$result=mysqli_query($conn,$sql);			
		$row=mysqli_fetch_assoc($result);
			return $row;
	}				

	function db_query_run($sql){	
		global $conn;
		if(mysqli_query($conn,$sql)){
			return "1";			 
			}else{
				return "0";
			}
		}

	function get_last_id(){	
		global $conn;
		 $last_id = $conn->insert_id;
		 return $last_id;
		
		}

	function get_last_list($sql){
		global $conn;
		$result = mysqli_query($conn,$sql);
		$row=mysqli_fetch_assoc($result);
		return $row;

	}

	function chech_email_phone_no($email,$mobile){
		global $conn;
		$sql="select * from user where mobile='".$mobile."' || email='".$email."'";


	}

function sumofallquote($id){

		global $conn;
		$sql="SELECT  SUM(product_price * quantity) as total FROM `quote_list` WHERE `quote_id`='{$id}'";
		$result=mysqli_query($conn,$sql);			
		$row=mysqli_fetch_assoc($result);
		return $row['total'];

	}


	function sumofallsale($id){

		global $conn;
		$sql="SELECT SUM(product_price * quantity) as total FROM `sale_list` WHERE `sale_id`='{$id}'";
		$result=mysqli_query($conn,$sql);			
		$row=mysqli_fetch_assoc($result);
		return $row['total'];

	}

	function sumofallpurchase($id){

		global $conn;
		$sql="SELECT SUM(product_price * quantity) as total FROM `purchaselist` WHERE `purchase_id`='{$id}'";

		$result=mysqli_query($conn,$sql);			
		$row=mysqli_fetch_assoc($result);
		return $row['total'];

	}


	function balanceSum($id, $type){
		global $conn;
		$sql="SELECT SUM(amount) as total  FROM `transaction` WHERE `account`='{$id}' && type='{$type}'";
		$result=mysqli_query($conn,$sql);			
		$row=mysqli_fetch_assoc($result);
		return $row['total'];

	}


	function array_search_by_id($id, $array) {
   foreach ($array as $key => $val) {

	     if ($val["id"] === $id) {
	           return $key;
	       }
	   }
	   return null;
	}


	function salebillsum($id, $type){
		global $conn;
		$sql="SELECT SUM(amount) as total  FROM `transaction` WHERE `sale_id`='{$id}' && type='{$type}'";
		echo $sql;
		$result=mysqli_query($conn,$sql);			
		$row=mysqli_fetch_assoc($result);
		return $row['total'];

	}

	function purchasebillsum($id, $type){
		global $conn;
		$sql="SELECT SUM(amount) as total  FROM `transaction` WHERE `purchase_id`='{$id}' && type='{$type}'";
		echo $sql;
		$result=mysqli_query($conn,$sql);			
		$row=mysqli_fetch_assoc($result);
		return $row['total'];

	}





 ?>
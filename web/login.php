

<?php
	$Email=$_POST['Email'];
	$Password = $_POST['Password'];
	

	//DATABASE CONNECTION
	$con = new mysqli('localhost','root','','cakeshop');
	if($con->connect_error){
		die('Connection Faild :' .$conn->connect_error);
	}else{
		$stmt = $con->prepare("select*from signup where Email = ? ");
		$stmt->bind_param("s",$Email);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0) {
			$data = $stmt_result ->fetch_assoc();
			if($data['Password'] === $Password) {
			echo "LOGIN Successfully....";
			}else{
				echo "Invalid Email Or Password";
			}
		}else{
			echo "Invalid Email Or Password";
		}
		
	}

?>
<?php
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Password=$_POST['Password'];
$Address=$_POST['Address'];
$PhoneNumber=$_POST['PhoneNumber'];

//Database Connection
$con=new mysqli('localhost','root','','cakeshop');
if($con->connect_error){
	die('Connection Failed : ' .$con->connect_error);	
}else{
	$stmt = $con->prepare("insert into signup(Name,Email,Password,Address,PhoneNumber) values(?,?,?,?,?)");
	$stmt->bind_param("ssssi",$Name,$Email,$Password,$Address,$PhoneNumber);
	$stmt->execute();
	echo"Signup successfully...";
	$stmt->close();
	$con->close();
}

?>
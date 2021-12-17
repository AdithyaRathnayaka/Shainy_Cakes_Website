<?php
require('db.php');

echo '<b>Transaction In Process, Please do not reload</b>';
$pay_id=$_POST['mihpayid'];
$status=$_POST["status"];
$txnid=$_POST["txnid"];

mysqli_query($con,"update `order` set payment_status='$status', mihpayid='$pay_id' where txnid='$txnid'");	
?>
<script>
	window.location.href='index.php';
</script>
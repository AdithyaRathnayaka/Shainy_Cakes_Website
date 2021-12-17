<?php

require('db.php');
require('functions.php');
echo '<b>Transaction In Process, Please do not reload</b>';

$payment_mode=$_POST['mode'];
$pay_id=$_POST['mihpayid'];
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$MERCHANT_KEY = "gtKFFx"; 
$SALT = "wia56q6O";
$udf5='';
$keyString 	= $MERCHANT_KEY .'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|||||'.$udf5.'|||||';
$keyArray 	= explode("|",$keyString);
$reverseKeyArray = array_reverse($keyArray);
$reverseKeyString =	implode("|",$reverseKeyArray);
$saltString     = $SALT.'|'.$status.'|'.$reverseKeyString;
$sentHashString = strtolower(hash('sha512', $saltString));


if($sentHashString != $posted_hash){
	mysqli_query($con,"update `order` set payment_status='$status', mihpayid='$pay_id' where txnid='$txnid'");	
	?>
	<script>
		window.location.href='payment_fail.php';
	</script>
	<?php	
}else{
	mysqli_query($con,"update `order` set payment_status='$status', mihpayid='$pay_id' where txnid='$txnid'");
	$order_detail=mysqli_fetch_assoc(mysqli_query($con,"select id from `order` where txnid='$txnid'"));
	$userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$productinfo'"));
	$_SESSION['USER_LOGIN']='yes';
                    $_SESSION['USER_ID']=$productinfo;
                    $_SESSION['USER_NAME']=$fetch['name'];
                    if(isset($_SESSION['WISHLIST_ID']) && $_SESSION['WISHLIST_ID']!=''){
                        wishlist_add($con,$_SESSION['USER_ID'],$_SESSION['WISHLIST_ID']);
                        unset($_SESSION['WISHLIST_ID']);
                    }
	
	?>
	<script>
		window.location.href='thank_you.php';
	</script>
	<?php	
}
?>
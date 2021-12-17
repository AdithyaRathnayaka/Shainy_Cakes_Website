<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin_users where username='$username'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
      $row=mysqli_fetch_assoc($res);
      $enc_pass = $row['password'];
      if(password_verify($password, $enc_pass)){
         $status = "Active now";
         $sql2 = mysqli_query($con, "UPDATE admin_users SET status = '{$status}' WHERE id = '{$row['id']}'");
         mysqli_query($con, "UPDATE users SET status = '{$status}' WHERE unique_id = '1'");
         $_SESSION['ADMIN_LOGIN']='yes';
         $_SESSION['ADMIN_USERNAME']=$username;
         $_SESSION['admin_unique_id'] = '1';
         header('location:categories.php');
         die();
	}else{
		$msg="Please enter correct login details";	
	}
   }else{
		$msg="Please enter correct login details";	   
}
}

?>
<!doctype html>
<html class ="no-js" lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="./images/tabicon.png" type="image/x-icon" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Shainy Cake | Admin Login</title>
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
      <link rel="stylesheet" href="./css/loginstyle.css">   
   </head>
   <body>
      <div class="login-card-wrp">
         <div class="login-card">
            <form method="post">
               <center><p style="color:white;">Shainy Cake</br>ADMIN PANEL</p></center><br>
               <div class="form-group">
                  <input type="text" name="username" class="form-control" placeholder="Username" required>
               </div><br>
               <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
               </div>
               <button type="submit" name="submit" class="btn-submit">Log in</button>
            </form>
            <div class="field_error"><?php echo $msg?></div>
         </div>
      </div>
   </body>
</html>
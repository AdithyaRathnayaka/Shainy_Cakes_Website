<!--author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->



<?php require('db.php');
require('controller.php');


if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
   
?>
<!DOCTYPE html>
<html>
<head>
<title>Shainey-Cakes</title>
<!-- metatags-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="food court login form a Flat Responsive Widget,Login form widgets, Sign up Web 	forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<link href="web/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--online fonts-->
<link href="//fonts.googleapis.com/css?family=Lobster&amp;subset=cyrillic,latin-ext,vietnamese" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Righteous&amp;subset=latin-ext" rel="stylesheet">
<!--//online fonts-->
</head>
<body>
<br><br><br>
	<h1>Shainy<span>Cakes</span>Login<span>.</span></h1>
	<div class="wthree-form">
	<h2></h2>
			<h2><p style="color:#FFFFFF";>Fill Out The Form Below To Login</p></h2>

			<?php
								if(count($errors) > 0){
									?>
									<div class="alert alert-danger text-center">
										<?php
										foreach($errors as $showerror){
											echo $showerror;
										}
										?>
									</div>
									<?php
								}
							?>
		<div class="w3l-login form">
			<form action="login-user.php" method="post">
				<div class="form-sub-w3">
					<input type="text" name="email" placeholder="Email" required="Email"/>
				</div>
				<div class="form-sub-w3">
					<input type="password" name="password" placeholder="Password" required="Password"/>
				</div>
				<div class="submit-agileits">
					<input type="submit" name="login" value="Login">
				</div>
				<h2></h2>
					<h2><a href="forgot-password.php"><p style="color:#FFFF00";>Forgot Password ?</p></a></h2>
					
					<h2><a href="signup-user.php">Create New Account</a></h2>
			 </form>
		</div>
	</div>
		<!-- <div class="footer-agileits">
			<p>&copy; food court login Form. All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a></p>
		</div -->
</body>
</html>
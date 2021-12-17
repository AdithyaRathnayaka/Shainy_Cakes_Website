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
	<h1>Cake<span>Shop</span>Signup</h1>
	<div class="wthree-form">
	<h2></h2>
			<h2><p style="color:#FFFFFF";>Fill Out The Form Below Signup</p></h2>
			<?php
                    		if(count($errors) == 1){
							?>
							<div class="alert alert-danger text-center">
								<?php
								foreach($errors as $showerror){
									echo $showerror;
								}
								?>
							</div>
							<?php
						}elseif(count($errors) > 1){
							?>
							<div class="alert alert-danger">
								<?php
								foreach($errors as $showerror){
									?>
									<li><?php echo $showerror; ?></li>
									<?php
								}
								?>
							</div>
							<?php
						}?>
		<div class="w3l-login form">
			<form action="signup-user.php" method="post">
				<div class="form-sub-w3">
					<input type="text" name="name" placeholder="Name" required/>
				</div>
				<div class="form-sub-w3">
					<input type="text" name="email" placeholder="Email" required/>
				</div>
				<div class="form-sub-w3">
					<input type="Password" name="password" placeholder="Password" required/>
				</div>
				<div class="form-sub-w3">
					<input type="Password" name="cpassword" placeholder="Confrim Password" required/>
				</div>
				<div class="form-sub-w3">
					<input type="text" name="address" placeholder="Address" required/>
				</div>
				<div class="form-sub-w3">
					<input type="text" name="mobile" placeholder="PhoneNumber" required/>
				</div>
				
				
				
				
				
				
				
				
				
				<!-- <label class="anim">
					<input type="checkbox" class="checkbox">
					<span>Remember Me</span> 
				</label> -->
				<div class="submit-agileits">
					<input type="submit" name="signup" value="Signup">
				</div><h2></h2>
					<h2><a href="login-user.php">You Already have an account</a></h2>
					
			 </form>
		</div>
	</div>
		<!-- <div class="footer-agileits">
			<p>&copy; food court login Form. All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a></p>
		</div -->
</body>
</html>
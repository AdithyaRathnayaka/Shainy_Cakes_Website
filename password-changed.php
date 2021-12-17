<?php 
require('db.php');  
require_once "controller.php";

if($_SESSION['info'] == false){
    ?>
	<script>
	window.location.href='login-user.php';
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
	<h1>Cake<span>Shop</span>Login</h1>
	<div class="wthree-form">
			<h2><p style="color:#FFFFFF";>Welcome</p></h2>

			<?php 
                if(isset($_SESSION['info'])){
                    ?>
                    <div class="alert alert-success text-center">
                    <?php echo $_SESSION['info']; ?>
                    </div>
                    <?php
                }
                ?>
		<div class="w3l-login form">
			<form action="login-user.php" method="post">
            <div class="form-group">
                        <center><input class="form-control button" type="submit" name="login-now" value="Login Now"></center>
                    </div>
			 </form>
		</div>
	</div>
		<!-- <div class="footer-agileits">
			<p>&copy; food court login Form. All Rights Reserved | Design by <a href="http://w3layouts.com/"> W3layouts</a></p>
		</div -->>
</body>
</html>
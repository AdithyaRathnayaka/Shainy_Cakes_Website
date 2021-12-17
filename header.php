<?php require('db.php');
require('functions.php');
require('add_to_cart.inc.php');

$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();
$wishlist_count=0;
if(isset($_SESSION['USER_LOGIN'])){
	$uid=$_SESSION['USER_ID'];
	
	if(isset($_GET['wishlist_id'])){
		$wid=get_safe_value($con,$_GET['wishlist_id']);
		mysqli_query($con,"delete from wishlist where id='$wid' and user_id='$uid'");
	}

	$wishlist_count=mysqli_num_rows(mysqli_query($con,"select product.name,product.image,product.price,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'"));
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Shainey-Cakes</title>

        <!-- Icon css link -->
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="vendors/linearicons/style.css" rel="stylesheet">
        <link href="vendors/flat-icon/flaticon.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        
        <!-- Rev slider css -->
        <link href="vendors/revolution/css/settings.css" rel="stylesheet">
        <link href="vendors/revolution/css/layers.css" rel="stylesheet">
        <link href="vendors/revolution/css/navigation.css" rel="stylesheet">
        <link href="vendors/animate-css/animate.css" rel="stylesheet">
        
        <!-- Extra plugin css -->
        <link href="vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">
        <link href="vendors/magnifc-popup/magnific-popup.css" rel="stylesheet">
        <link href="vendors/nice-select/css/nice-select.css" rel="stylesheet">
        
        <link href="css/style.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
       <!--  ================Main Header Area ================= -->
	<header class="main_header_area five_header">
			<div class="top_header_area row m0">
				<div class="container">
					<div class="float-left">
						<a href="tell:+94757182568"><i class="fa fa-phone" aria-hidden="true"></i> + (94) 757182568</a>
						<a href="mainto:info@shaineycakes.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@shaineycakes.com</a>
					</div>
					<div class="float-right">
						<ul class="h_social list_style">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						</ul>
						<ul class="h_search list_style">
							<li class=""><?php echo $totalProduct?><a href="cart.php"><i class="lnr lnr-cart"></i></a></li>
							<li><a class="popup-with-zoom-anim" href="#test-search"><i class="fa fa-search"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="main_menu_two">
				<div class="container">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<a class="navbar-brand" href="index.php"><img src="img/logo-2.png" alt=""></a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="my_toggle_menu">
                            	<span></span>
                            	<span></span>
                            	<span></span>
                            </span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav justify-content-end">
								
									 <a class="" data-toggle="" href="#" role="" aria-haspopup="true" aria-expanded="false"></a> 
									
									<li><a href="index.php">Home</a></li>
								<li><a href="cake.php">New Arrivals</a></li>
								
								
								<li class="dropdown submenu">
									<a class="" data-toggle="" href="about-us.php" role="button" aria-haspopup="true" aria-expanded="false">About Us</a>
									
								</li>
								<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Our Cakes</a>
									<ul class="dropdown-menu">
										<li><a href="service.php">Services</a></li>
										<li><a href="menu.php">Menu</a></li>
										
												<li><a href="portfolio.php">Gallery </a></li>
												
										</li>
										
										<li><a href="special.php">Special Recipe</a></li>
										
									</ul>
								
								
							<li class="dropdown submenu">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
									<ul class="dropdown-menu">
										

										<li><a href="wishlist.php">Wishlist
										<?php
										if(isset($_SESSION['USER_ID'])){
										?>
										<span class="htc__wishlist"><?php echo $wishlist_count?></span>
										<?php } ?>
										</a></li>
										<li><a href="product-details.php">Product Details</a></li>
										<li><a href="cart.php">Cart <span class="htc__qua"><?php echo $totalProduct?></span></a></li>
										<li><a href="checkout.php">Checkout Page</a></li>
									</ul>
								</li>

								<?php if(isset($_SESSION['USER_LOGIN'])){
											?>   
								<li><a href="logout-user.php">Logout</a></li>
								<?php
										}else{
											echo '<li><a href="login-user.php">Login | Register</a></li>';
										}
										?>
								<li><a href="my_order.php">My Orders</a></li>
								<li><a href="contact.php">Contact Us</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</header>
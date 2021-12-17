<?php require('header.php'); 

?>
        <!--================Main Header Area =================-->
	
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>New Arrivals</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="cakes.html">Services</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Blog Main Area =================-->
        <section class="our_cakes_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Our Cakes</h2>
        			<h5>Cakes are an essential part of every occasion that takes the celebration to another level and makes them extra special. With their sweet and creamy flavor, they help express love and warm wishes for your dear ones in the best manner. Choose from our delectable range of chocolate truffle cake, caramel cake, honey cake, and red velvet cake.</h5>
        		</div>
				

        		<div class="cake_feature_row row">
				<?php
					$get_product = get_product($con,'','','','','','','');
					foreach($get_product as $list){
				?>
					<div class="col-lg-3 col-md-4 col-6">
						<div class="cake_feature_item">
							<div class="cake_img">
								<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="">
							</div>
							<div class="cake_text">
							<h4><b>Rs.<?php echo $list['price']?></b></h4><br>
								<a href="product-details.php"><h2><b><p style="color:#FF00FF"><?php echo $list['name']?></b></p></h2></a>
								<input id="qty" type="hidden" value ="1">
										<a class="pest_btn" href="javascript:void(0)" onclick="manage_cart('<?php echo $list['id']?>','add')">Add to cart</a>
										<?php if(isset($_SESSION['USER_LOGIN'])){?>
	
										<a class="pest_btn" href="javascript:void(0)" onclick="wishlist_manage('<?php echo $list['id']?>','add')">Add Wishlist</a>
											<?php }else{?>
												<a class="pest_btn" href="wishlist.php" >Add Wishlist</a><br>
												<?php }?>
							</div>
						</div>
					</div>

					<?php } ?>
				</div>
        	</div>
        </section>
        <!--================End Blog Main Area =================-->
        
        <!--================Special Recipe Area =================-->
        <section class="special_recipe_area">
        	<div class="container">
        		<div class="special_recipe_slider owl-carousel">
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="img/recipe/recipe-1.png" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Special Recipe</h4>
        						<p>Whether you have a birthday, anniversary, holiday, dinner party, or major sweet tooth to curb, these are our best cake recipes to make from scratch.</p>
        						<a class="w_view_btn" href="#">View Details</a>
        					</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="img/recipe/recipe-1.png" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Special Recipe</h4>
        						<p>Whether you have a birthday, anniversary, holiday, dinner party, or major sweet tooth to curb, these are our best cake recipes to make from scratch.</p>
        						<a class="w_view_btn" href="#">View Details</a>
        					</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="img/recipe/recipe-1.png" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Special Recipe</h4>
        						<p>Whether you have a birthday, anniversary, holiday, dinner party, or major sweet tooth to curb, these are our best cake recipes to make from scratch.</p>
        						<a class="w_view_btn" href="#">View Details</a>
        					</div>
        				</div>
        			</div>
        			<div class="item">
        				<div class="media">
        					<div class="d-flex">
        						<img src="img/recipe/recipe-1.png" alt="">
        					</div>
        					<div class="media-body">
        						<h4>Special Recipe</h4>
        						<p>Whether you have a birthday, anniversary, holiday, dinner party, or major sweet tooth to curb, these are our best cake recipes to make from scratch.</p>
        						<a class="w_view_btn" href="#">View Details</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Special Recipe Area =================-->
        
        <!--================Newsletter Area =================-->
        <section class="newsletter_area">
        	<div class="container">
        		<div class="row newsletter_inner">
        			<div class="col-lg-6">
        				<div class="news_left_text">
        					<h4>Join our Newsletter list to get all the latest offers, discounts and other benefits</h4>
        				</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="newsletter_form">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Enter your email address">
								<div class="input-group-append">
									<button class="btn btn-outline-secondary" type="button">Subscribe Now</button>
								</div>
							</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Newsletter Area =================-->
        
		<?php require('footer.php'); ?>
        
        
        

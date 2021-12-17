<?php require('header.php'); 

?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Product Details</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="product-details.html">Product Details</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Product Details Area =================-->
                <section class="our_cakes_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>New Arrivals</h2>
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
								<h2><b><p style="color:#FF00FF"><?php echo $list['name']?></b></p></h2>
								<h5><b><p style="color:#50C878";>Available:<?php echo $list['qty']?></b></p></h5>
								<h6><p><?php echo $list['description']?></p></h6>
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
        <!--================End Product Details Area =================-->
        
        <!--================Similar Product Area =================-->
        <section class="similar_product_area p_100">
        	<div class="container">
        		<div class="main_title">
        			<h2>Similar Products</h2>
        		</div>
        		<div class="row similar_product_inner">
        			<div class="col-lg-3 col-md-4 col-6">
        				<div class="cake_feature_item">
							<div class="cake_img">
								<img src="img/cake-feature/c-feature-1.jpg" alt="">
							</div>
							<div class="cake_text">
								<h4>Rs;600</h4>
								<h3>Strawberry Cake</h3>
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
        			<div class="col-lg-3 col-md-4 col-6">
        				<div class="cake_feature_item">
							<div class="cake_img">
								<img src="img/cake-feature/c-feature-2.jpg" alt="">
							</div>
							<div class="cake_text">
								<h4>Rs.500</h4>
								<h3>Green Garden Cup Cake</h3>
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
        			<div class="col-lg-3 col-md-4 col-6">
        				<div class="cake_feature_item">
							<div class="cake_img">
								<img src="img/cake-feature/c-feature-3.jpg" alt="">
							</div>
							<div class="cake_text">
								<h4>Rs.1000</h4>
								<h3>Chocolate Cake</h3>
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
        			<div class="col-lg-3 col-md-4 col-6">
        				<div class="cake_feature_item">
							<div class="cake_img">
								<img src="img/cake-feature/c-feature-4.jpg" alt="">
							</div>
							<div class="cake_text">
								<h4>Rs.890</h4>
								<h3>Sandwitch Cup Cake</h3>
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
        		</div>
        	</div>
        </section>
        <!--================End Similar Product Area =================-->
        
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
        
        <!--================Footer Area =================-->
        <footer class="footer_area">
        	<div class="footer_widgets">
        		<div class="container">
        			<div class="row footer_wd_inner">
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_about_widget">
        						<img src="img/footer-logo.png" alt="">
        						<p>Cakes are an essential part of every occasion that takes the celebration to another level and makes them extra special.</p>
        						<ul class="nav">
        							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
        							<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
        							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_link_widget">
        						<div class="f_title">
        							<h3>Quick links</h3>
        						</div>
        						<ul class="list_style">
        							<li><a href="#">Your Account</a></li>
        							<li><a href="#">View Order</a></li>
        							<li><a href="#">Privacy Policy</a></li>
        							<li><a href="#">Terms & Conditionis</a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_link_widget">
        						<div class="f_title">
        							<h3>Work Times</h3>
        						</div>
        						<ul class="list_style">
        							<li><a href="#">Mon. :  Fri.: 8 am - 8 pm</a></li>
        							<li><a href="#">Sat. : 9am - 4pm</a></li>
        							<li><a href="#">Sun. : Closed</a></li>
        						</ul>
        					</aside>
        				</div>
        				<div class="col-lg-3 col-6">
        					<aside class="f_widget f_contact_widget">
        						<div class="f_title">
        							<h3>Contact Info</h3>
        						</div>
        						<h4>(+94) 757182568 </h4>
        						<p>Mrs.Sanjana Rajapaksha <br />256, Kandy Street, Peradeniya,</p>
        						<h5>shaineycakes@contact.com</h5>
        					</aside>
        				</div>
        			</div>
        		</div>
        	</div>
       <!--  	<div class="footer_copyright">
        		<div class="container">
        			<div class="copyright_inner">
        				<div class="float-left">
        					<h5><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></h5>
        				</div>
        				<div class="float-right">
        					<a href="#">Purchase Now</a>
        				</div>
        			</div>
        		</div>
        	</div> -->
        </footer>
        <!--================End Footer Area =================-->
        
        
        <!--================Search Box Area =================-->
        <div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
            <div class="search_box_inner">
                <h3>Search</h3>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="icon icon-Search"></i></button>
                    </span>
                </div>
            </div>
        </div>
        <!--================End Search Box Area =================-->
        
        
        
        
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Rev slider js -->
        <script src="vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <!-- Extra plugin js -->
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="vendors/magnifc-popup/jquery.magnific-popup.min.js"></script>
        <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
        <script src="vendors/isotope/isotope.pkgd.min.js"></script>
        <script src="vendors/datetime-picker/js/moment.min.js"></script>
        <script src="vendors/datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
        <script src="vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        
        <script src="js/theme.js"></script>
    </body>

</html>
<?php 
require('header.php');
?>
        <!--================End Main Header Area =================-->
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Cart</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="cart.html">Cart</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Cart Table Area =================-->
        <section class="cart_table_area p_100">
        	<div class="container">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Preview</th>
								<th scope="col">Product</th>
								<th scope="col">Price</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
						<?php
								$cart_total=0;
								if(isset($_SESSION['cart'])){
								foreach($_SESSION['cart'] as $key=>$val){
								$productArr=get_product($con,'','',$key);
								$pname=$productArr[0]['name'];
								$price=$productArr[0]['price'];
								$image=$productArr[0]['image'];
								$qty=$val['qty'];
								$cart_total=$cart_total+((float)$price*(int)$qty);
								?>
							<tr>
								<td>
									<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>" alt="">
								</td>
								<td><?php echo $pname?></</td>
								<td>Rs. <?php echo number_format($price)?></td>
								<td>
									<input min="1" type="number" id="<?php echo $key?>qty" value="<?php echo $qty?>">
									<br>
									<a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','update')">update</a>
								</td>
								<td>Rs. <?php echo number_format((int)$qty*(float)$price)?></td>
								<td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')">X</a></td>
							</tr>
							<?php } } ?>
							<tr>
								<td>
									<form class="form-inline"> 
										<div class="form-group"> 
											<input type="text" class="form-control" placeholder="Coupon code">
										</div>
										<button type="submit" class="btn">Apply Coupon</button>
									</form>
								</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td>
									<a class="pest_btn" href="#">Add To Cart</a>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
       			<div class="row cart_total_inner">
        			<div class="col-lg-7"></div>
        			<div class="col-lg-5">
        				<div class="cart_total_text">
        					<div class="cart_head">
        						Cart Total
        					</div>
        					<div class="total">
        						<h4>Total <span><?php echo number_format($cart_total)?></span></h4>
        					</div>
        					<div class="cart_footer">
        						<a class="pest_btn" href="checkout.php">Proceed to Checkout</a>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
        <!--================End Cart Table Area =================-->
        
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
        
<?php require('footer.php')?>   
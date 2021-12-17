<?php 
require('header.php');
if(!isset($_SESSION['USER_LOGIN'])){
	?>
	<script>
	window.location.href='login-user.php';
	</script>
	<?php
}
$uid=$_SESSION['USER_ID'];

$res=mysqli_query($con,"select product.name,product.image,product.price,product.id as pid,wishlist.id from product,wishlist where wishlist.product_id=product.id and wishlist.user_id='$uid'");
?>
   <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Cart</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="cart.html">Wishlist</a></li>
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
								<th scope="col"></th>
								<th scope="col">Total</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
						<?php
							while($row=mysqli_fetch_assoc($res)){
                                ?>
							<tr>
								<td>
									<img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>" alt="">
								</td>
								<td><?php echo $row['name']?></</td>
								<td>Rs. <?php echo number_format($row['price'])?></td>
								<td><a href="javascript:void(0)" onclick="manage_cart('<?php echo $row['pid']?>','add')">Add to cart</a></td>
								
								<td><a href="wishlist.php?wishlist_id=<?php echo $row['id']?>">X</a></td>
							</tr>
							<?php }  ?>
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
        					<div class="sub_total">
        						<h5>Sub Total <span>Rs.5000</span></h5>
        					</div>
        					<div class="total">
        						<h4>Total <span>Rs.5000</span></h4>
        					</div>
        					<div class="cart_footer">
        						<a class="pest_btn" href="#">Proceed to Checkout</a>
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
<input type="hidden" id="qty" value="1"/>						
<?php require('footer.php')?>        
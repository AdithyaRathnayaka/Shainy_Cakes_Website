<?php require('header.php'); 

if(!isset($_SESSION['cart']) || count($_SESSION['cart'])==0){
	?>
	<script>
		window.location.href='index.php';
	</script>
	<?php
}



$cart_total=0;

if(isset($_POST['submit'])){
	$address=get_safe_value($con,$_POST['address']);
	$city=get_safe_value($con,$_POST['city']);
	$pincode=get_safe_value($con,$_POST['pincode']);
	$payment_type=get_safe_value($con,$_POST['payment_type']);
	$user_id=$_SESSION['USER_ID'];
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		$cart_total=$cart_total+($price*$qty);
		
	}
	$total_price=$cart_total;
	$payment_status='pending';
	if($payment_type=='cod'){
		$payment_status='success';
	}
	$order_status='1';
	$added_on=date('Y-m-d h:i:s');
	
	$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
		
	
	mysqli_query($con,"insert into `order`(user_id,address,city,pincode,payment_type,payment_status,order_status,added_on,total_price,txnid) values('$user_id','$address','$city','$pincode','$payment_type','$payment_status','$order_status','$added_on','$total_price','$txnid')");
	
	$order_id=mysqli_insert_id($con);
	
	foreach($_SESSION['cart'] as $key=>$val){
		$productArr=get_product($con,'','',$key);
		$price=$productArr[0]['price'];
		$qty=$val['qty'];
		
		mysqli_query($con,"insert into `order_detail`(order_id,product_id,qty,price) values('$order_id','$key','$qty','$price')");
	}
	
	unset($_SESSION['cart']);
	
	if($payment_type=='payu'){
		$MERCHANT_KEY = "gtKFFx"; 
		$SALT = "wia56q6O";
		$hash_string = '';
		$PAYU_BASE_URL = "https://test.payu.in";
		$action = '';
		$posted = array();
		if(!empty($_POST)) {
		  foreach($_POST as $key => $value) {    
			$posted[$key] = $value; 
		  }
		}
		
		$userArr=mysqli_fetch_assoc(mysqli_query($con,"select * from users where id='$user_id'"));
		
		$formError = 0;
		$posted['txnid']=$txnid;
		$posted['amount']=$total_price;
		$posted['firstname']=$userArr['name'];
		$posted['email']=$userArr['email'];
		$posted['phone']=$userArr['mobile'];
		$posted['productinfo']=$user_id;
		$posted['key']=$MERCHANT_KEY ;
		$hash = '';
		$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
		if(empty($posted['hash']) && sizeof($posted) > 0) {
		  if(
				  empty($posted['key'])
				  || empty($posted['txnid'])
				  || empty($posted['amount'])
				  || empty($posted['firstname'])
				  || empty($posted['email'])
				  || empty($posted['phone'])
				  || empty($posted['productinfo'])
				 
		  ) {
			$formError = 1;
		  } else {    
			$hashVarsSeq = explode('|', $hashSequence);
			foreach($hashVarsSeq as $hash_var) {
			  $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
			  $hash_string .= '|';
			}
			$hash_string .= $SALT;
			$hash = strtolower(hash('sha512', $hash_string));
			$action = $PAYU_BASE_URL . '/_payment';
		  }
		} elseif(!empty($posted['hash'])) {
		  $hash = $posted['hash'];
		  $action = $PAYU_BASE_URL . '/_payment';
		}


		$formHtml ='<form method="post" name="payuForm" id="payuForm" action="'.$action.'"><input type="hidden" name="key" value="'.$MERCHANT_KEY.'" /><input type="hidden" name="hash" value="'.$hash.'"/><input type="hidden" name="txnid" value="'.$posted['txnid'].'" /><input name="amount" type="hidden" value="'.$posted['amount'].'" /><input type="hidden" name="firstname" id="firstname" value="'.$posted['firstname'].'" /><input type="hidden" name="email" id="email" value="'.$posted['email'].'" /><input type="hidden" name="phone" value="'.$posted['phone'].'" /><textarea name="productinfo" style="display:none;">'.$posted['productinfo'].'</textarea><input type="hidden" name="surl" value="'.SITE_PATH.'payment_complete.php" /><input type="hidden" name="furl" value="'.SITE_PATH.'payment_fail.php"/><input type="submit" style="display:none;"/></form>';
		echo $formHtml;
		echo '<script>document.getElementById("payuForm").submit();</script>';
	}else{	
		?>
		<script>
			window.location.href='thank_you.php';
		</script>
		<?php
	}	
	
}

?>

<style>
	.field_error{color:red;}
.accordion .accordion__hide {
    background: #f4f4f4;
    height: 65px;
    line-height: 65px;
    display: flex;
    align-items: center;
    padding: 0 30px;
    position: relative;
    font-size: 16px;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 10px;
    font-family: "Poppins";
    cursor: pointer;
}



.order-details{
    background: #c99494;
    background-color: #000;
	width: 100%;
}
.order-details .order-details__title{
    padding: 30px 0;
    margin: 0 15px;
    border-bottom: 1px solid #414141;
    text-transform: uppercase;
    text-align: center;
    letter-spacing: 1px;
    font-family: "poppins";
    font-size: 16px;
    font-weight: 600;
    color: #d6d6d6;
}
.order-details .order-details__item{
    padding: 15px 0;
    margin: 0 30px;
    border-bottom: 1px solid #414141;
    background: #000;

}
.order-details .order-details__item .single-item{
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
    -ms-align-items: center;
    align-items: center;
    padding: 5px;
}
.order-details .order-details__item .single-item .single-item__content{
    flex-grow: 2;
}
.order-details .order-details__item .single-item .single-item__content a{
    font-size: 16px;
    font-family: "Poppins";
    letter-spacing: 1px;
    color: #d6d6d6;
    transition: all 0.3s ease-in-out 0s;
}

.order-details .order-details__item .single-item .single-item__content a:hover{
	color:blue;
}

.order-details .order-details__item .single-item .single-item__content span{
    font-family: "Poppins";
    display: block;
	color: #d6d6d6;
	font-weight:normal;
}
.order-details .order-details__item .single-item .single-item__thumb{
    text-align: center;
    width: 60px;
    overflow: hidden;
    margin-right: 20px;
}
.order-details .order-details__item .single-item .single-item__remove{
    width: 35px;
    text-align: center;
    font-size: 22px;
    color: #212121;
}
.order-details .order-details__item .single-item .single-item__remove a:hover{
    color: #f10;
}
.order-details .order-details__count{
    margin: 0 30px;
    padding: 15px 0;
    border-bottom: 1px solid #ebebeb;
}
.order-details .order-details__count .order-details__count__single{
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    justify-content: space-between;
    -ms-align-items: center;
    align-items: center;
    padding: 5px 0;
}
.order-details .order-details__count .order-details__count__single h5{
    color: #d6d6d6;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1px;
    font-weight: 600;
}
.order-details .order-details__count .order-details__count__single span.price{
    width: 30%;
    text-align: left;
    font-weight: 600;
    font-family: "Poppins";
    
}
.order-details .ordre-details__total{
    margin: 0 30px;
    padding: 30px 0;
    display: -moz-flex;
    display: -ms-flex;
    display: -o-flex;
    display: flex;
    -ms-align-items: center;
    align-items: center;
    justify-content: space-between;
}
.order-details .ordre-details__total h5{
    color: #d6d6d6;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1px;
    font-weight: 700;
}
.order-details .ordre-details__total span.price{
    width: 30%;
    text-align: left;
    font-weight: 700;
    font-family: "Poppins";
    letter-spacing: 1px;
	color: #d6d6d6;
}

</style>
        
        <!--================End Main Header Area =================-->
        <section class="banner_area">
        	<div class="container">
        		<div class="banner_text">
        			<h3>Chekout</h3>
        			<ul>
        				<li><a href="index.html">Home</a></li>
        				<li><a href="checkout.html">Chekout</a></li>
        			</ul>
        		</div>
        	</div>
        </section>
        <!--================End Main Header Area =================-->
        
        <!--================Billing Details Area =================-->    
        <section class="billing_details_area p_100">
            <div class="container">
                <div class="return_option">
                	<h4>Returning customer? <a href="#">Click here to login</a></h4>
                </div>
                <div class="row">
                	<div class="col-lg-7">
               	    	<div class="main_title">
               	    		<h2>Billing Details</h2>
               	    	</div>
                		<div class="billing_form_area">
                			<form class="billing_form row" method="post">
								
								<div class="form-group col-md-12">
								    <label for="address">Address *</label>
									<input type="text" class="form-control" id="address" name="address" placeholder="Street Address">
									</div>
								<div class="form-group col-md-12">
								    <label for="city">Town / City *</label>
									<input type="text" class="form-control" id="city" name="city" placeholder="Town /City">
								</div>
								<div class="form-group col-md-6">
								    <label for="zip">Postcode / Zip *</label>
									<input type="text" class="form-control" id="zip" name="pincode" placeholder="Postcode / Zip">
								</div>
								<div class="form-group col-md-12">
								COD <input type="radio" name="payment_type" value="COD" required/>
													&nbsp;&nbsp;PayU <input type="radio" name="payment_type" value="payu" required/>
								</div>
								<div class="form-group col-md-6">
								<input type="submit" name="submit" class="btn btn-primary"/>
							</div>
							</form>
                		</div>
                	</div>
                	<div class="col-lg-5">
                		<div class="order_box_price">
                			<div class="main_title">
                				<h2>Your Order</h2>
                			</div>
							<div style = "background:#000;" class="col-md-12">
                        <div style = "background:#000;"  class="order-details">
                            <h5 class="order-details__title">Your Order</h5>
                            <div class="order-details__item">
                                <?php
								$cart_total=0;
								foreach($_SESSION['cart'] as $key=>$val){
								$productArr=get_product($con,'','',$key);
								$pname=$productArr[0]['name'];
								$price=$productArr[0]['price'];
								$image=$productArr[0]['image'];
								$qty=$val['qty'];
								$cart_total=$cart_total+($price*$qty);
								?>
								<div class="single-item">
                                    <div class="single-item__thumb">
                                        <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$image?>"  />
                                    </div>
                                    <div class="single-item__content">
                                        <a href="#"><?php echo $pname?></a>
                                        <span class="price"><?php echo number_format($price*$qty)?></span>
                                    </div>
                                    <div class="single-item__remove">
                                        <a href="javascript:void(0)" onclick="manage_cart('<?php echo $key?>','remove')"><i class="far fa-trash-alt"></i></a>
                                    </div>
                                </div>
								<?php } ?>
                            </div>
                            <div class="ordre-details__total">
                                <h5>Order total</h5>
                                <span class="price"><?php echo number_format($cart_total)?>.00</span>
                            </div>
                        </div>
                    </div>
						</div>
                	</div>
                </div>
            </div>
        </section>
        <!--================End Billing Details Area =================-->   
        
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
        						<h5>shaineycakes@contact.co.in</h5>
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
<?php
require('top.inc.php');
$sql="select * from users order by id desc";
$res=mysqli_query($con,$sql);
?>
<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>

<style>
table td p{
        margin-top:10px;
    }
.cafa{
	display: grid;
	width:100%;
	grid-template-columns:repeat(3,1fr);
	text-align:center;
	gap:40px;
	margin-top:40px;
	align-items:center;
}
.cafa a{
	text-decoration:none;
	padding:10px;
	color:#fff;
	background:rgb(80,80,80,0.5);
	width:200px;
}
</style>
<div class="content pb-0">
	<div class="orders">
	   <div class="row">
		  <div class="col-xl-12">
			 <div class="card">
				<div class="card-body">
				   <h4 class="box-title">Home</h4>
				   		<div style="display:flex;justify-content:center;align-items:center;" class="adfaf">
						   <div class="cafa">
								<a href="product.php">Add Products</a>
								<a href="categories.php">Add Categories</a>
								<a href="sub_categories.php">Add Sub Categories</a>
								<a href="users.php">Users</a>
								<a href="order_master.php">Orders</a>
				
								
								<!-- <a href="">Add Banners</a>
								<a href="">Add Admins</a>
								<a href="">Chat</a> -->
								
							</div>
						</div>
					<h4 style="margin-top:50px;" class="box-title">Recent Orders</h4>

					<div class="table-responsive">
                        <table id ="example" class="table table-dark table-hover">
                        <thead>
                                <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Address</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Order Status</th>
                                <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $res=mysqli_query($con,"select `order`.*,order_status.name as order_status_str from `order`,order_status where order_status.id=`order`.order_status");
                            while($row=mysqli_fetch_assoc($res)){
                            ?>
                                <tr>
                                <td><a href="order_master_detail.php?id=<?php echo $row['id']?>"><?php echo $row['id']?></a><br/><br/><br/><br/>
									<a style="background:blue;color:#fff;padding:2px 5px;top:5px;border-radius:5px;" href="../order_pdf.php?id=<?php echo $row['id']?>">PDF</a></td>
                                <td><?php echo $row['added_on']?></td>
                                <td>
                                <?php echo $row['address']?><br/>
                                <p><?php echo $row['city']?></p><br/>
                                <?php echo $row['pincode']?>
                                </td>
                                <td><?php echo $row['payment_type']?></td>
                                <td><?php echo $row['payment_status']?></td>
                                <td><?php echo $row['order_status_str']?></td>
                                <td>Rs. <?php echo number_format($row['total_price'])?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
				</div>
			</div>
		  </div>
	   </div>
	</div>
</div>
<?php
require('top.inc.php');
$categories_id='';
$name='';
$price='';
$qty='';
$image='';
$description='';
$meta_title	='';
$sub_categories_id='';
$best_seller='';

$msg='';
$image_required='required';
if(isset($_GET['id']) && $_GET['id']!=''){
	$image_required='';
	$id=get_safe_value($con,$_GET['id']);
	$res=mysqli_query($con,"select * from product where id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories_id=$row['categories_id'];
		$sub_categories_id=$row['sub_categories_id'];
		$name=$row['name'];
		$price=$row['price'];
		$qty=$row['qty'];
		$description=$row['description'];
		$meta_title=$row['meta_title'];
		$best_seller=$row['best_seller'];
	}else{
		header('location:product.php');
		die();
	}
}

if(isset($_POST['submit'])){
	$categories_id=get_safe_value($con,$_POST['categories_id']);
	$sub_categories_id=get_safe_value($con,$_POST['sub_categories_id']);
	$name=get_safe_value($con,$_POST['name']);
	$price=get_safe_value($con,$_POST['price']);
	$qty=get_safe_value($con,$_POST['qty']);
	$description=get_safe_value($con,$_POST['description']);
	$meta_title=get_safe_value($con,$_POST['meta_title']);
	$best_seller=get_safe_value($con,$_POST['best_seller']);
	
	$res=mysqli_query($con,"select * from product where name='$name'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id']) && $_GET['id']!=''){
			$getData=mysqli_fetch_assoc($res);
			if($id==$getData['id']){
			
			}else{
				$msg="Product already exist";
			}
		}else{
			$msg="Product already exist";
		}
	}
	
	
	if($_GET['id']==0){
		if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg' && $_FILES['image2']['type']!='image/png' && $_FILES['image2']['type']!='image/jpg' && $_FILES['image2']['type']!='image/jpeg'){
			$msg="Please select only png,jpg and jpeg image formate";
		}
	}elseif($_FILES['image']['type']!=''){
				if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
				$msg="Please select only png,jpg and jpeg image formate";
			}
		}
	
	
	if($msg==''){
		if(isset($_GET['id']) && $_GET['id']!=''){
			if($_FILES['image']['name']!=''){
				$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
				$update_sql="update product set categories_id='$categories_id',name='$name',price='$price',qty='$qty',description='$description',meta_title='$meta_title',image='$image',best_seller='$best_seller', sub_categories_id='$sub_categories_id' where id='$id'";
			}
			else{
				$update_sql="update product set categories_id='$categories_id',name='$name',price='$price',qty='$qty',description='$description',meta_title='$meta_title',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
			}
			mysqli_query($con,$update_sql);
		}else{
			$image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
			move_uploaded_file($_FILES['image']['tmp_name'],PRODUCT_IMAGE_SERVER_PATH.$image);
			mysqli_query($con,"insert into product(categories_id,name,price,qty,description,meta_title,status,image,best_seller,sub_categories_id) values('$categories_id','$name','$price','$qty','$description','$meta_title',1,'$image','$best_seller','$sub_categories_id')");
		}
		?>
		<script>
			window.location.href='product.php';
		</script>
		<?php
		die();
	}
}
?>

<script
  src="http://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous">
</script>


<div id ="frmcntnt" class="content pb-0">
	<div class="card">
		<div class="card-header"><strong>Add</strong> Products</div>
			<form method="post" enctype="multipart/form-data">
				<div class="card-body card-block">
					<div class="mb-3">
						<label for="categories" class="form-label">Category Name</label>
						<select class="form-select" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
							<option selected>Select Category</option>

							<?php
							$res=mysqli_query($con,"select id,categories from categories order by categories asc");
							while($row=mysqli_fetch_assoc($res)){
								if($row['id']==$categories_id){
									echo "<option selected value=".$row['id'].">".$row['categories']."</option>";
								}else{
									echo "<option value=".$row['id'].">".$row['categories']."</option>";
								}
								
							}
							?>
						</select>
					</div>
					<div class="mb-3">
						<label for="categories" class="form-label">Sub Category Name</label>
						<select class="form-select" name="sub_categories_id" id="sub_categories_id">
							<option selected>Select Sub Category</option>
						</select>
					</div>

					<div class="mb-3">
						<label for="categories" class="form-label">Product Name</label>
						<input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
					</div>

					<div class="mb-3">
						<label for="categories" class="form-label">Best Seller</label>
						<select class="form-select" name="best_seller" required>
							<option selected>Select</option>
							<?php
							if($best_seller==1){
								echo '<option value="1" selected>Yes</option>
									<option value="0">No</option>';
							}elseif($best_seller==0){
								echo '<option value="1">Yes</option>
									<option value="0" selected>No</option>';
							}else{
								echo '<option value="1">Yes</option>
									<option value="0">No</option>';
							}
							?>
						</select>
					</div>
					
					
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Price</label>
						<input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Qty</label>
						<input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Image</label>
						<input type="file" name="image" class="form-control" <?php echo  $image_required?>>
					</div>
					
					
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Description</label>
						<textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
					</div>
					
					<div class="mb-3">
						<label for="categories" class=" form-label">Meta Title</label>
						<textarea name="meta_title" placeholder="Enter product meta title" class="form-control"><?php echo $meta_title?></textarea>
					</div>
					
				
					
					<div style="margin:15px;" class="field_error"><?php echo $msg?></div>
					<div class="modal-footer">
						<button class='btn btn-secondary btn-sm'><a style="color:white;text-decoration:none;" href='product.php'>Close</a></button>
						<button type="submit" name="submit" class="btn btn-primary btn-sm">Save</button>
					</div>
					
				</div>
			</form>
		</div>
	</div>
</div>
<script>
function get_sub_cat(sub_cat_id){
var categories_id=jQuery('#categories_id').val();
jQuery.ajax({
	url:'get_sub_cat.php',
	type:'post',
	data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
	success:function(result){
		jQuery('#sub_categories_id').html(result);
	}
});
}
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.nav_btn').click(function(){
            $('.mobile_nav_items').toggleClass('active');
        });

        $('#frmcntnt').click(function(){
            $('.check1').prop('checked', true);
        });
});

      
</script>



<script>
	<?php
if(isset($_GET['id'])){
?>
get_sub_cat('<?php echo $sub_categories_id?>');
<?php } ?>
</script>
            
         

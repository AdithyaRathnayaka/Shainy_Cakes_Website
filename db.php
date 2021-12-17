<?php
session_start();
$con=mysqli_connect("localhost","root","","shainy_cake");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/Shainy_Cakes/');
define('SITE_PATH','http://localhost/Shainy_Cakes/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');

define('CATEGORY_IMAGE_SERVER_PATH',SERVER_PATH.'media/category/');
define('CATEGORY_IMAGE_SITE_PATH',SITE_PATH.'media/category/');

define('BANNER_IMAGE_SERVER_PATH',SERVER_PATH.'media/banner/');
define('BANNER_IMAGE_SITE_PATH',SITE_PATH.'media/banner/');
?>
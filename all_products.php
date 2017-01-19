<?php
include("includes/db_content.php");
include("functions/functions.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dhoni and sachin Shop</title>
<link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
<!--Main container-->
<div class="main_wrapper"><!--parent tag-->
<!--Header starts-->
<div class="header_wrapper"><!--child tag-->
<a href="index.php"><img src="images/example_large_icon.png" style="float:left;"/></a>
<img src="images/bg_1.png"/>
<img src="images/facebook.png" style="float:right;"/>
<img src="images/ecommercepk.gif"/>
<img src="images/bg_1.png"/>
<img src="images/bg_1.png"/>
<img src="images/ecommercepk.gif"/>
</div>
<!--header ends-->
<div id="navbar">
<ul id="menu">
<li><a href="index.php">Home</a></li>
<li><a href="all_products.php">All products</a></li>
<li><a href="my_account.php">My Accounts</a></li>
<li><a href="registered.php">Sign up</a></li>
<li><a href="cart.php">Shopping cart</a></li>
<li><a href="contactus.php">Contact us</a></li>
<div id="form">
<form method="get" action="results.php" enctype="multipart/form-data">
<input type="text" name="user_query" placeholder="Search a product"/>
<input type="submit" name="search" value="Search"/>

</form>
</div>
</div>
<div class="content_wrapper">

<div id="left_sidebar">
<div id="sidebar_title">Categories</div>
<ul id="cats">
<?php getCat();

 ?>
</ul>
<div id="sidebar_title">Brands</div>
<ul id="cats">
<?php  getBrands(); 

?>
</ul>


</div>
<div id="right_area">
<div id="headerline">
<div id="headline_content">
<b style="color:yellow;">Welcome customer@</b>
<b>Shopping cart</b>
<span>-Items: -Price:
</div>

</div>

<div id="products_box">
<?php 
$get_products="select * from products";
$run_products=mysqli_query($con,$get_products);
while($row_products=mysqli_fetch_array($run_products)){
	$pro_id=$row_products['product_id'];
	$pro_title=$row_products['product_title'];
	$pro_cat=$row_products['cat_id'];
	$pro_brand=$row_products['brand_id'];
	$pro_desc=$row_products['product_desc'];
	$pro_price=$row_products['product_price'];
	$pro_image=$row_products['product_img1'];
echo"
<div id='single_product'>
<h3>$pro_title
</h3>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
<p>Price:$<b>$pro_price</b></p>
<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
<a href='index.php?add_cart='$pro_id'><button style='float:right;'>Add to cart</button></a>

</div>





";
	}





	
		
 ?>
</div>
</div>
</div>
</div>
</body>
</html>

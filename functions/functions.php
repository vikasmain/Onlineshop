<?php
$db=mysqli_connect("localhost","root","","myshop");


function getPro()
{//if categories not set(click) then home page will show
	if(!isset($_GET['cat'])){
		
		if(!isset($_GET['brand'])){
	global $db;//now variable db is global.
	$get_products="select * from products order by rand() LIMIT 0,6";
$run_products=mysqli_query($db,$get_products);
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





	
		}
}
}

function getCatPro(){
	if(isset($_GET['cat'])){//if clicks on category then this will run
		$cat_id=$_GET['cat'];
		
	global $db;//now variable db is global.
	$get_cat_pro="select * from products where cat_id='$cat_id'";
$run_cat_pro=mysqli_query($db,$get_cat_pro);
$count=mysqli_num_rows($run_cat_pro);
if($count==0){
	echo "<h2 style='color:blue;'>No Products found in this category</h2>";
	
}
while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
	$pro_id=$row_cat_pro['product_id'];
	$pro_title=$row_cat_pro['product_title'];
	$pro_cat=$row_cat_pro['cat_id'];
	$pro_brand=$row_cat_pro['brand_id'];
	$pro_desc=$row_cat_pro['product_desc'];
	$pro_price=$row_cat_pro['product_price'];
	$pro_image=$row_cat_pro['product_img1'];
echo"
<div id='single_productpro'>
<h3>$pro_title</h3>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
<p>Price:$<b>$pro_price</b></p>
<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
<a href='index.php?add_cart='$pro_id'><button style='float:right;'>Add to cart</button></a>

</div>





";
	}





	
		}
}


function getBrands(){
	
	global $db;
	
$get_brands="select * from brands";
$get_runs=mysqli_query($db,$get_brands);
while($row_brands=mysqli_fetch_array($get_runs)){
	$cat_id=$row_brands['brand_id'];
	$cat_title=$row_brands['brand_title'];
	echo "<li><a href='index.php?brand=$cat_id'>$cat_title</a></li>";
}
	
}
function getBrandPro(){
	if(isset($_GET['brand'])){//if clicks on category then this will run
		$brand_id=$_GET['brand'];
		
	global $db;//now variable db is global.
	$get_brand_pro="select * from products where brand_id='$brand_id'";
$run_brand_pro=mysqli_query($db,$get_brand_pro);
$count=mysqli_num_rows($run_brand_pro);
if($count==0){
	echo "<h2 style='color:blue;'>No Products found in this Brand</h2>";
	
}
while($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
	$pro_id=$row_brand_pro['product_id'];
	$pro_title=$row_brand_pro['product_title'];
	$pro_cat=$row_brand_pro['cat_id'];
	$pro_brand=$row_brand_pro['brand_id'];
	$pro_desc=$row_brand_pro['product_desc'];
	$pro_price=$row_brand_pro['product_price'];
	$pro_image=$row_brand_pro['product_img1'];
echo"
<div id='single_productpro'>
<h3>$pro_title</h3>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/><br>
<p>Price:$<b>$pro_price</b></p>
<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
<a href='index.php?add_cart='$pro_id'><button style='float:right;'>Add to cart</button></a>

</div>





";
	}





	
		}
}


function getCat(){
	global $db;
$get_cats="select * from categories";
$get_runs=mysqli_query($db,$get_cats);
while($row_cats=mysqli_fetch_array($get_runs)){
	$cat_id=$row_cats['cat_id'];
	$cat_title=$row_cats['cat_title'];
	echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
}
	
	
	
}

?>

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
<li><a href="#">My Accounts</a></li>
<li><a href="#">Sign up</a></li>
<li><a href="#">Shopping cart</a></li>
<li><a href="contacts.html">Contact us</a></li>
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
<?php getPro();
getCatPro();
getBrandPro();

 ?>
</div>
</div>
</div>
</div>
</body>
</html>

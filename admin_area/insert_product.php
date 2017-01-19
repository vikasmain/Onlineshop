<?php
include("includes/db_content.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
 <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body bgcolor="red">
<form method="post" action="insert_product.php" enctype="multipart/form-data">
<table width="700" align="center" border="1" bgcolor="blue">
<tr align="center">
<td colspan="2"><h2>Insert new product:</h2></td>
</tr>
<tr>
<td align="right"><b>Product title</td>
<td><input type="text" name="product_title" size="50"/></td>
</tr>
<tr>
<td  align="right">Product Category</td>
<td>
<select name="product_cat">
<option>select a category</option>
<?php
$get_cats="select * from categories";
$get_runs=mysqli_query($con,$get_cats);
while($row_cats=mysqli_fetch_array($get_runs)){
	$cat_id=$row_cats['cat_id'];
	$cat_title=$row_cats['cat_title'];
	echo "<option value='$cat_id'>$cat_title</option>";
}
	?>

</select>
</td>
</tr>
<tr>
<td align="right">Product brand</td>
<td>
<select name="product_brand">
<option>select a brand</option>
<?php
$get_brands="select * from brands";
$get_runs=mysqli_query($con,$get_brands);
while($row_brands=mysqli_fetch_array($get_runs)){
	$brand_id=$row_brands['brand_id'];
	$brand_title=$row_brands['brand_title'];
	echo "<option value='$brand_id'>$brand_title</option>";
}
	?>

</select>


</td>
</tr>
<tr>
<td align="right">Product image 1</td>
<td><input type="file" name="product_img1"/></td>
</tr>
<tr>
<td align="right">Product image 2</td>
<td><input type="file" name="product_img2"/></td>
</tr>
<tr>
<td align="right">Product image 3</td>
<td><input type="file" name="product_img3"/></td>
</tr>
<tr>
<td align="right">Product price</td>
<td><input type="text" name="product_price"/></td>
</tr>
<tr>
<td align="right">Product description</td>
<td><textarea name="product_desc" cols="30" rows="10"></textarea></td>
</tr>
<tr>
<td align="right">Product keywords</td>
<td><input type="text" name="product_keywords"/></td>
</tr>
<tr align="center">
<td colspan="2"><input type="submit" name="Insert_product" value="insert product"/></td>
</tr>
</table>
</body>
</html>
<?php
if(isset($_POST['Insert_product'])){//if insert_product button pressed what will happen
	//text data variables
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$status='on';
	$product_keywords=$_POST['product_keywords'];
	//image names
	$product_img1=$_FILES['product_img1']['name'];//FILES method is used for fetching graphics data
	$product_img2=$_FILES['product_img2']['name'];
	$product_img3=$_FILES['product_img3']['name'];
//images temperary names becz file servers need those
$temp_name1=$_FILES['product_img1']['tmp_name'];
$temp_name2=$_FILES['product_img2']['tmp_name'];
$temp_name3=$_FILES['product_img3']['tmp_name'];
if($product_title=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' OR $product_keywords=='' OR $product_img1==''){
	echo "<script>alert('please fill all the fields!')</script>";
	exit();
}


else {
	//uploading images
	move_uploaded_file($temp_name1,"product_images/$product_img1");
		move_uploaded_file($temp_name2,"product_images/$product_img2");
			move_uploaded_file($temp_name3,"product_images/$product_img3");
	$insert_product="insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status) values ('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','product_img2','product_img3','$product_price','$product_desc','$status')";
$run_product=mysqli_query($con,$insert_product);
if($run_product){
	echo "<script>alert('Product inserted succesfully')</script>";
}
	}


}
?>
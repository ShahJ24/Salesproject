<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PRODUCT-NW</title>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}


/* Add a black background color to the top navigation */
.topnav {
  background-color: #383e56;
  overflow: hidden;
}
	
img{
	
	max-height: 150px;
	max-width: 150px;
		
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #faf3e0;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  margin:0;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ffcc29;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #6f9eaf;
  color: white;
}

		
</style>	
</head>
<body>
	<div class="topnav">
	  <a class="active" href="#home">Products</a>
	  <a href="#news">Checkout</a>
	  <a href="#about">About</a>
	</div>
	
	
</body>
</html>



<?php

	require('mysqli_connect.php');

	
	$sqlimage = "SELECT * FROM product";
	$result = mysqli_query($dbnw,$sqlimage);

	if(!$result){
		echo "Error: ". mysqli_error($dbnw);
	}

	
	while($rows = mysqli_fetch_array($result))
	{       
		echo "<p><strong> ProductName: </strong> <a href = 'details.php?id={$rows['product_id']}'>{$rows['product_name']} </a></p>";
		echo "<p><strong> Product Category: </strong> {$rows['product_category']}</p>";
		echo "<p><strong> Product Quantity: </strong> {$rows['product_qty']} </p>";
		//echo "<strong>Image: </strong> <img src='images/".$rows['image']."' alt = 'ImageNotLoaded'>";
		echo '<img src="data:image/jpeg;base64,'.base64_encode( $rows['image'] ).'" alt = "ImageNotLoaded"/>';
		
	}

?>
<?php

	if(isset($_GET['ID'])){
			session_start();
			$_SESSION["ID"]=$_GET['ID'];

			$_SESSION['NAME']=$_GET['NAME'];
			$_SESSION['CATEGORY']=$_GET['CATEGORY'];
			$_SESSION['quantity']=$_GET['QUANTITY'];
			$_SESSION['price']=$_GET['PRICE'];

		header("Location: checkout.php");
			
	}
?>

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
	
	max-height: 300px;
	max-width: 300px;
		
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

	
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 300px;
  height:300px;
  margin: 0 0 10px 0;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.detailcontainer {
  padding: 10px 0px;
  margin: 10px 0px;
}
		
</style>

</head>
<body>
	<div class="topnav">
	  <a class="active" href="#home">Products</a>
	  <a href="#news">Checkout</a>
	  <a href="#about">About</a>
	</div>
	
	<div class="container" style="width:700px;">
		<h3 align="center">Northern Wear Shopping Mart</h3><br/>
	
	<?php
		

		require('mysqli_connect.php');

		$sql = "SELECT * FROM product";
		$result = mysqli_query($dbnw,$sql);

		if(!$result){
			echo "Error: ". mysqli_error($dbnw);
		}

		while($rows = mysqli_fetch_array($result))
		{ 
			
			$colValues[] = $rows['product_id'];
			foreach($colValues as $key=>$value) {

				$$key = $value;

				while ($rows = $result->fetch_assoc()) {

						echo '<div class="card"><img src="data:image/jpeg;base64,'.base64_encode( $rows['image'] ).'" alt="ImageNotLoaded"/>';


						echo "<div class='detailcontainer'><a href = 'details.php?id={$rows['product_id']}'>{$rows['product_name']}</a>";

						echo "<div class='detailcontainer'><strong>Category: ".$rows['product_category']."</strong></div>";

						echo "<div class='detailcontainer'><strong>Price: $".$rows['product_price']."</strong></div>";
						
						echo '<form action="" method="post">
								<label for="value">Quantity</label>
								<select name="quantity" id="quantity" onchange="this.form.submit()">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</form>';
						echo "</div>";
						
						echo "<a href = 'product.php?ID={$rows['product_id']}&NAME={$rows['product_name']}&CATEGORY={$rows['product_category']}&QUANTITY={$_POST['quantity']}&PRICE={$rows['product_price']}'>Buy Now</a>";
							//echo '<a href="product.php" name="buy">Buy Now</a>';

								
							
				}
			}
		}
		
?>
</div>    
	
</body>
</html>

<?php
	
//	 // session start
//
//	require('mysqli_connect.php');
//	//require 'item.php';
//
//	
//	$sqlimage = "SELECT * FROM product";
//	$result = mysqli_query($dbnw,$sqlimage);
//
//	if(!$result){
//		echo "Error: ". mysqli_error($dbnw);
//	}
////
////	if(isset($_POST["buy"])) {
////		
////		
////		
////	}
//	
//	
//	
//	while($rows = mysqli_fetch_array($result))
//	{ 
//		
//		
//		if(isset($_GET['ID'])){
//			session_start();
//			echo "ho       ".$_GET['ID'];	
//			$_SESSION["ID"]=$_GET['ID'];
//			//header("Location:details.php");
//			exit();
//					  $_SESSION['NAME']=mysqli_real_escape_string($dbnw,$rows['product_name']);
//					  $_SESSION['CATEGORY']=mysqli_real_escape_string($dbnw,$rows['product_category']);
////					  $_SESSION['IMAGE']=mysqli_real_escape_string($dbnw,$rows['image']); 
//					  $_SESSION['ORDERED']=mysqli_real_escape_string($dbnw,$value);
//			
//		}
//		
//		$columnValues[] = $rows['product_id'];
//		
//		
//		foreach($columnValues as $key=>$value) {
//			
//			$$key = $value;
//			
//			while ($rows = $result->fetch_assoc()) {
//				
//					echo '<div class="card"><img src="data:image/jpeg;base64,'.base64_encode( $rows['image'] ).'" alt="ImageNotLoaded"/></div>';
//					
//				
//					echo "<div class='detailcontainer'><a href = 'details.php?id={$rows['product_id']}'>{$rows['product_name']}</a></div>";
//					
//				
//					//echo "<p><a href = 'details.php?id={$rows['product_id']}'>{$rows['product_name']}</a></p>";                
//					//echo "<tr>\n"."<br>";
//					//echo "<td>".$rows['product_category']."</td>\n";
//				
//					echo "<div class='detailcontainer'><strong>Category: ".$rows['product_category']."</strong></div>";
//					
//					echo "<div class='detailcontainer'><strong>Price: $".$rows['product_price']."</strong></div>";
//				
//					//echo "<tr>\n". "<br>";
//					//echo "<td>".'<img src="data:image/jpeg;base64,'.base64_encode( $rows['image'] ).'" alt="ImageNotLoaded"/>'."</td>\n";
//				
//					//echo "<tr>\n". "<br>";
//					//echo "<td>\n";                              
//					
//					echo "<select id='$value' name='dropdown'>\n";
//					echo "<option value='1'>1</option>\n";
//					echo "<option valu
//					e='2'>2</option>\n";
//					echo "<option value='3'>3</option>\n";
//					echo "<option value='4'>4</option>\n";
//					echo "<option value='5'>5</option>\n";
//					echo "<option value='6'>6</option>\n";
//					echo "</select>\n";
//					echo "</td>\n" . "<br>";
//				
//					echo "<td>"."<a href = 'product.php?ID={$rows['product_id']}NAME={$rows['product_name']}CATEGORY={$rows['product_category']}QUANTITY=$value'>".'<input type="submit" name="buy" value="Buy Now" />'."</a>"."</td>"."<br/>";
//						
//					
//					//echo "</tr>\n";
//					//echo "<tr>\n". "<br>";
//				
//					
//					
//
//					
//					
//			}
//		}
//		
//		//echo "<p><strong> ProductName: </strong> <a href = 'details.php?id={$rows['product_id']}'>{$rows['product_name']} </a></p>";
//		//echo "<p><strong> Product Category: </strong> {$rows['product_category']}</p>";
//		//echo "<p><strong> Product Quantity: </strong> {$rows['product_qty']} </p>";
//		//echo "<strong>Image: </strong> <img src='images/".$rows['image']."' alt = 'ImageNotLoaded'>";
//		//echo '<img src="data:image/jpeg;base64,'.base64_encode( $rows['image'] ).'" alt = "ImageNotLoaded"/>';
//		//echo "<select id=$value>\n";
////		echo "<option value='1'>1</option>\n";
////		echo "<option value='2'>2</option>\n";
////		echo "<option value='3'>3</option>\n";
////		echo "<option value='4'>4</option>\n";
////		echo "<option value='5'>5</option>\n";
////		echo "<option value='6'>6</option>\n";
////		echo "</select>\n";
//		
//	}

?>
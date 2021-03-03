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
	  <a href="#home">Products</a>
	  <a class="active" href="#news">Details</a>
	  <a href="#about">Checkout</a>
	</div>
	
	<div id="container">
		<h1>The New Winter Collection </h1>
		
		<content>
			
			<?php
			
				session_start(); // session start
			
				require('mysqli_connect.php');

				$getid = $_SESSION['ID']; // session get
				$getname = $_SESSION['NAME']; // session get
				$getcategory = $_SESSION['CATEGORY']; // session get
				$getQuantity = $_SESSION['quantity'];

				//echo $getid;
				echo "<br>";
				echo $getname; 
				echo "<br>";
				echo $getcategory;
				echo "<br>";
				echo $getQuantity;
				echo "<br>";
//				print_r($_SESSION);

				## Connection Part
//				   if(isset($_POST['dropdown'])) {
//					   
//					   require('mysqli_connect.php');
//
//						echo("You order was completed" . "<br>");           
//						$sql = "INSERT INTO orders (prod_orders,ordered_name,item_purchased) VALUES ('$getid', '$getname','$getOrder')";
//
//
//
//						if (mysqli_query($dbnw, $sql)) 
//							{ echo "New record created successfully"; }     
//
//						else 
//							{ echo "Error: " . $sql . "<br>" . mysqli_error($dbnw); }
//						mysqli_close($dbnw);
//					}
//
//				else {
//				echo "dhur";
//				}

//				if(isset($_GET['ID'])) {
//
//					require('mysqli_connect.php');
//
//					$ID = mysqli_real_escape_string($dbnw, $_GET['ID']);
//
//					$querry = "SELECT * FROM product WHERE product_id= '$ID' ";
//
//					$result = mysqli_query($dbnw, $querry) OR die('Could not connect to MySQL: ' . mysqli_connect_error());
//
//					$row =  mysqli_fetch_array($result);
//
//					while ($row =  mysqli_fetch_array($result)){
//				
//						echo $row['product_name'];
//					}
//				}

			?>
			
		</content>
		
	
	</div>
</body>
</html>


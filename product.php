<?php
//
//	if(isset($_GET['ID'])){
//			session_start();
//			$_SESSION["ID"]=$_GET['ID'];
//			$_SESSION['NAME']=$_GET['NAME'];
//			$_SESSION['CATEGORY']=$_GET['CATEGORY'];	
//			$_SESSION['QUANTITY']=$_POST['QUANTITY'];
//			$_SESSION['price']=$_GET['PRICE'];
//
//		header("Location: checkout.php");
//			
//	}
//	if(isset($_POST['quantity'])){
//		$_SESSION['quantity']=$_POST['quantity'];
//	}
//	

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
<html>
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Northern Wear Products</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<style>
		#images{
			width: 250px;
			height: 250px;
			opacity: 0.8;
		}
		
		#logo{
			
			width: 60%;
			opacity: 0.5;
		}
	
	</style>
</head>
<body> 
	<div class="container">
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="images/main.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img id="logo" src="images/main.jpg" alt="not_loaded"/>
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">Nothern Wear</h1>
								<h6 class="tm-site-description">new clothing style for winters</h6>	
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Home</a></li>
								<li class="tm-nav-li"><a href="product.php" class="tm-nav-link active">Products</a></li>
								<li class="tm-nav-li"><a href="checkout.php" class="tm-nav-link">Check Out</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Northern Wear Shopping Mart</h2>
				<div class="container">
					
					
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

								echo '<div class="tm-container-inner tm-persons">';
								echo '<div class="row">';
								echo '<article class="col-lg-2">';
								echo '<figure class="tm-person">';
								echo '<img id="images" src="data:image/jpeg;base64,'.base64_encode( $rows['image'] ).'" 						alt="ImageNotLoaded"/>';
								echo '<figcaption class="tm-person-description">';
								echo '<h4 class="tm-person-name">'.$rows['product_name'].'</h4>';
								echo '<h4 class="tm-person-title">Category: '.$rows['product_category'].'</h4>';
								echo '<h4 class="tm-person-about">Price: $'.$rows['product_price'].'</h4>';
								echo '<form class="tm-person-title" action="" method="post">
										<label for="quantity">Quantity</label>
										<select name="quantity" id="quantity" onchange="this.form.submit()">
											<option value="select">Please Select</option>
											<option value=1>1</option>
											<option value=2>2</option>
											<option value=3>3</option>
											<option value=4>4</option>
										</select>
										</form>';
								echo "<a class='tm-person-name' href = 'product.php?ID={$rows['product_id']}&NAME={$rows['product_name']}&CATEGORY={$rows['product_category']}&QUANTITY={$_POST['quantity']}&PRICE={$rows['product_price']}'>Buy Now</a>";
								echo "</figcaption>";
								echo "</figure>";
								echo "</article>";
								echo "</div>";
								echo "</div>";

		//						
		//						
		//					
		//					
		//
		//						echo '<div class="card"><img src="data:image/jpeg;base64,'.base64_encode( $rows['image'] ).'" alt="ImageNotLoaded"/>';
		//
		//
		//						echo "<div class='detailcontainer'><a href = 'details.php?id={$rows['product_id']}'>{$rows['product_name']}</a>";
		//
		//						echo "<div class='detailcontainer'><strong>Category: ".$rows['product_category']."</strong></div>";
		//
		//						echo "<div class='detailcontainer'><strong>Price: $".$rows['product_price']."</strong></div>";
		//						
		//						echo '<form action="" method="post">
		//								<label for="value">Quantity</label>
		//								<select name="quantity" id="quantity" onchange="this.form.submit()">
		//									<option>1</option>
		//									<option>2</option>
		//									<option>3</option>
		//									<option>4</option>
		//								</select>
		//								</form>';
		//						echo "</div>";

		//						echo "<a href = 'product.php?ID={$rows['product_id']}&NAME={$rows['product_name']}&CATEGORY={$rows['product_category']}&QUANTITY={$_POST['quantity']}&PRICE={$rows['product_price']}'>Buy Now</a>";
									//echo '<a href="product.php" name="buy">Buy Now</a>';



						}
					}
				}

		?>



						</div>
					</header>
				</main>
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
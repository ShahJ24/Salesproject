<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Northern Wear Products</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="css/templatemo-style.css" rel="stylesheet" />
	<style type="text/css"></style>
	<link rel="stylesheet" href="style.css">
	
	<style>
		img{
			width: 250px;
			opacity: 0.8;
		}
		
		#logo{
			
			width: 60%;
			opacity: 0.5;
		}
	
		* {
		  box-sizing: border-box;
		}

		.error{
				color: red;
		}

		#row {
		  display: -ms-flexbox;
		  display: flex;
		  -ms-flex-wrap: wrap;
		  flex-wrap: wrap;
		  margin: 0 -15px;
		}

		.col-25 {
		  -ms-flex: 25%;
		  flex: 25%;
		}

		.col-50 {
		  -ms-flex: 50%;
		  flex: 50%;
		}

		.col-75 {
		  -ms-flex: 75%;
		  flex: 75%;
		}

		.col-25,
		.col-50,
		.col-75 {
		  padding: 0 15px;
		}

		#container {
		  background-color: #f2f2f2;
		  padding: 10px 20px 15px 20px;
		  margin: 0 15px;
		  border: 1px solid lightgrey;
		  border-radius: 3px;
		}
		
		#container_cart{
			
		  background-color: #f2f2f2;
		  padding: 15px 10px;
		  margin: 0 15px 0 0;
		  border: 1px solid lightgrey;
		  border-radius: 3px;
			
		}

		input[type=text] {
		  width: 100%;
		  margin-bottom: 20px;
		  padding: 12px;
		  border: 1px solid #ccc;
		  border-radius: 3px;
		}

		label {
		  margin-bottom: 10px;
		  display: block;
		}

		.icon-container {
		  margin-bottom: 20px;
		  padding: 7px 0;
		  font-size: 24px;
		}

		.btn {
		  background-color: #4CAF50;
		  color: white;
		  padding: 12px;
		  margin: 5px 0;
		  border: none;
		  width: 10%;
		  border-radius: 3px;
		  cursor: pointer;
		  font-size: 17px;
		}

		select{
			 margin-bottom: 20px;
			 padding: 11px;	
			 border: 1px solid #ccc;
			 border-radius: 3px;
		}


		.btn:hover {
		  background-color: #45a049;
		}

		a {
		  color: #2196F3;
		}

		hr {
		  border: 1px solid lightgrey;
		}

		span.price {
		  float: right;  
		  color: grey;
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
								<li class="tm-nav-li"><a href="product.php" class="tm-nav-link">Products</a></li>
								<li class="tm-nav-li"><a href="checkout.php" class="tm-nav-link active">Check Out</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>
		<br/>
		<?php 

			session_start();
			require('mysqli_connect.php');
			if(!empty($_SESSION['ID'])){
				$get_productid = $_SESSION['ID'];
				$get_productname = $_SESSION['NAME'];
				$get_productcategory = $_SESSION['CATEGORY']; 
				$get_productquantity = $_SESSION['quantity'];
				$get_productprice = $_SESSION['price'];
			echo $get_productquantity;
				$total = $get_productprice * $get_productquantity;


			$select = "SELECT * FROM product WHERE product_id=$get_productid";
				$result = mysqli_query($dbnw,$select);
				if(!$result){
					echo "Error: ". mysqli_error($dbnw);
				}
				while($rows = mysqli_fetch_array($result))
				{
					$total_available_quantity = $rows['product_qty'];
				
				}

			$remaining_quantity = $total_available_quantity - $get_productquantity;
				

		}
				
					
					
					
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {


				//customer
				$fname = filter_var($_POST['fname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$lname = filter_var($_POST['lname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$phone = filter_var($_POST['phone'],FILTER_SANITIZE_NUMBER_INT);
				$street_address = filter_var($_POST['street_address'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$city = filter_var($_POST['city'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$state = filter_var($_POST['state'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$postal_code = filter_var($_POST['postal_code'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);

				//payment
				$cardname = filter_var($_POST['cardname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$cardnumber = filter_var($_POST['cardnumber'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		//		$expyear = filter_var($_POST['expyear'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				$cvv = filter_var($_POST['cvv'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
				
				

				$errors = []; // Initialize an error array.
				$error = true;


				///////////////////first name
				if(empty($_POST['fname'])){
					$errors[] = '<p class="error">You forgot to enter your first name.</p>';
				} else{
					$fn = $fname;
				}

				///////////////////last name
				if(empty($_POST['lname'])){
					$errors[] = '<p class="error">You forgot to enter your last name.</p>';
				} else{
					$ln = $lname;
				}

				///////////////////phone number
				$pattern = preg_match('/^[0-9]{10}$/', $phone);


				if(!empty($_POST['phone'])){
					if($pattern){
							$ph = $phone;		
					}
					else {
						unset($_POST['phone']);
						$errors[] = '<p class="error">phone number should be of 10 digits.</p>';
					}	
				} else{
					$phone = NULL;
					$errors[] = '<p class="error">You forgot to enter your phone number.</p>';
				}


				/////////////////////Street Address
				if(empty($_POST['street_address'])){
					$errors[] = '<p class="error">You forgot to enter your Address.</p>';
				} else{
					$sa = $street_address;
				}


				///////////////////city
				if(empty($_POST['city'])){
					$errors[] = '<p class="error">You forgot to enter your City.</p>';
				} else{
					$cty = $city;	
				}

				////////////////////state
				if(empty($_POST['state'])){
					$errors[] = '<p class="error">You forgot to enter your state.</p>';
				} else{
					$st = $state;
				}

				//////////////////postal code
				if(empty($_POST['postal_code'])){
					$errors[] = '<p class="error">You forgot to enter your postal_code.</p>';
				} else{
					$pc = $postal_code;
				}



				///////////////////Payment

				if (isset($_REQUEST['card'])) {  
						 $card = $_REQUEST['card'];   
							if ($card == 'credit') {
								$pay = 'Credit Card';
							} elseif ($card == 'debit') {
								$pay = 'Debit Card';
							} else { // Unacceptable value.
								$card = NULL;
								$errors[] = '<p class="error">*Make a proper Selection from "Credit" or "Debit".
							   </p>';
							}

				} else { 
						$card = NULL;
						  $errors[] = '<p class="error">You forgot to make a selection from credit and debit card.
							   </p>';
				}	  


				//////////////////Name on Card
				if(empty($_POST['cardname'])){
					$errors[] = '<p class="error">You forgot to enter your name on Card.</p>';
				} else{
					$card = $cardname;	
				}

				/////////////////Credit Card number

				$cnpattern = preg_match('/^([0-9]{4}+[\-]{1})+([0-9]{4}+[\-]{1})+([0-9]{4}+[\-]{1})+([0-9]{4})$/', $cardnumber);


				if(!empty($_POST['cardnumber'])){
					if($cnpattern){
							$cardnum = $cardnumber;		
					}
					else {
						unset($_POST['cardnumber']);
						$errors[] = '<p class="error">Card number should be of 16 digits seperated by -';
					}	
				} else{
					$cardnumber = NULL;
					$errors[] = '<p class="error">You forgot to enter your number on Card.</p>';
				}
				
				/////////////////expiry year

				 if(isset($_REQUEST['year']) && $_REQUEST['year'] == '00') 
				 {
					$errors[] = '<p class="error">You didnot select any year!</p>';
				 } 
				 else 
				 {
					$ey = $_REQUEST['year'];
				 }


				  /////////////////expiry month

				  if(isset($_REQUEST['month']) && $_REQUEST['month'] == '00') 
				  {
					$errors[] = '<p class="error">You didnot select any month!</p>';
				  } 
				  else 
				  {
					$em = $_REQUEST['month'];
				  }



				///////////////cvv
				$cvvpattern = preg_match('/^[0-9]{3}$/', $cvv);


				if(!empty($_POST['cardnumber'])){
					if($cvvpattern){
							$cv = $cvv;		
					}
					else {
						unset($_POST['cvv']);
						$errors[] = '<p class="error">cvv should be of 3 digits.';
					}	
				} else{
					$cvv = NULL;
					$errors[] = '<p class="error">You forgot to enter your CVV.</p>';
				}
				
				////////////////////No errors
				if (empty($errors)){

					$cust_details = "INSERT INTO northernwear.customer(fname, lname, phone, street_address, city, state, postal_code)
							VALUES('$fn','$ln','$ph','$sa','$cty','$st','$pc')" ;

					$result = mysqli_query($dbnw,$cust_details) or die(mysqli_error($dbnw));

					$customer_id = mysqli_insert_id($dbnw);
					
					
					$order = "INSERT INTO northernwear.orders(payment_type, card_number, card_holder_name, expiry_year, expiry_month, cvv)
							VALUES('$pay','$cardnum','$card','$ey','$em','$cv')" ;

					$result_1 = mysqli_query($dbnw,$order) or die(mysqli_error($dbnw));

					$order_id = mysqli_insert_id($dbnw);
					
					$update_quantity = "UPDATE product SET product_qty='$remaining_quantity' WHERE product_id='$get_productid'";
					mysqli_query($dbnw,$update_quantity);

					
					header("Location: redirect.php");



				}
				else {


					foreach ($errors as $msg) { 	
						echo $msg;		
					}
					echo '</p><p>Please try again.</p><p><br></p>';
				}

			}	
?>

		<h2 class="text-center cm-welcome-section">Checkout Form</h2><br/>
			<div id="row">
				  <div class="col-75">
					<div id="container">
					  <form action="checkout.php" method="post">

							<div id="row">
							  <div class="col-50">
								<h3>Address</h3>

								<label for="fname"><i class="fa fa-user"></i> First Name</label>
								<input type="text" name="fname" placeholder="Jeenal" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">


								<label for="lname"><i class="fa fa-user"></i> Last Name</label>
								<input type="text" name="lname" placeholder="Shah" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>">

								<label for="phone"><i class="fa fa-phone"></i> Phone Number</label>
								<input type="text" name="phone" placeholder="0000000000" max="10" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">

								<label for="street_address"><i class="fa fa-address-card-o"></i> Address</label>
								<input type="text" name="street_address" placeholder="12 Duke Street" value="<?php if (isset($_POST['street_address'])) echo $_POST['street_address']; ?>">

								<label for="city"><i class="fa fa-institution"></i> City</label>
								<input type="text" name="city" placeholder="Kitchener" value="<?php if (isset($_POST['city'])) echo $_POST['city']; ?>">

								<div class="row">
								  <div class="col-50">
									<label for="state">State</label>
									<input type="text" name="state" placeholder="ON" value="<?php if (isset($_POST['state'])) echo $_POST['state']; ?>">
								  </div>
								  <div class="col-50">
									<label for="postal_code">Postal Code</label>
									<input type="text" name="postal_code" placeholder="A1P1J1" value="<?php if (isset($_POST['postal_code'])) echo $_POST['postal_code']; ?>">
								  </div>
								</div>
							  </div>

							  <div class="col-50">
								<h3>Payment</h3>
								<div class="icon-container">
								  <i class="fa fa-cc-visa" style="color:navy;"></i>
								  <i class="fa fa-cc-mastercard" style="color:red;"></i>
								</div>



								<input type="radio" name="card"
									<?php if (isset($card) && $card=="credit") echo "checked";?>
									value="credit">Credit
								<input type="radio" name="card"
									<?php if (isset($card) && $card=="debit") echo "checked";?>
									value="debit">Debit 

								<br/>
								<br/>

								<label for="cardname">Name on Card</label>
								<input type="text" name="cardname" placeholder="Jeenal Shah" value="<?php if (isset($_POST['cardname'])) echo $_POST['cardname']; ?>">
								<label for="cardnumber">Credit card number</label>
								<input type="text" name="cardnumber" placeholder="1111-1111-1111-1111" value="<?php if (isset($_POST['cardnumber'])) echo $_POST['cardnumber']; ?>">
								<div class="form-group">
									<label>Expiration Date</label>
									<select name="month">
										<option value="00">Please Select</option>
										<option value="January">January</option>
										<option value="February">February </option>
										<option value="March">March</option>
										<option value="April">April</option>
										<option value="May">May</option>
										<option value="June">June</option>
										<option value="July">July</option>
										<option value="August">August</option>
										<option value="September">September</option>
										<option value="October">October</option>
										<option value="November">November</option>
										<option value="December">December</option>
									</select>
									<select name="year">
										<option value="00">Please Select</option>
										<option value="2016"> 2016</option>
										<option value="2017"> 2017</option>
										<option value="2018"> 2018</option>
										<option value="2019"> 2019</option>
										<option value="2020"> 2020</option>
										<option value="2021"> 2021</option>
									</select>
								</div>
								<div id="row">
								  <div class="col-50">
									<label for="cvv">CVV</label>
									<input type="text" name="cvv" placeholder="000" value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>">
								  </div>
								</div>
							  </div>

							</div>
							<input type="submit" name="submit" value="Submit" class="btn">
						  </form>
						</div>
					  </div>
					  <div class="col-25">
						<div id="container_cart">
						  <h3>Cart<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h3>
						  <h4>Name <span class="price"><?php echo $get_productname ?></span></h4>
						  <h4>Category <span class="price"><?php echo $get_productcategory ?></span></h4>
						  <h4>Quantity <span class="price"><?php echo $get_productquantity ?></span></h4>
						  <h4>Price <span class="price"><?php echo "$".$get_productprice ?></span></h4>
						  <hr>
						  <p>Total <span class="price" style="color:black"><?php echo $total ?></span></p>
						</div>
					  </div>
					</div>
					
				</div>	
	
</body>
</html>

					
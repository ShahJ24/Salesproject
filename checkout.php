
<?php 
	
	session_start();
	require('mysqli_connect.php');

	
		$total = 0.00;

		$get_productid = $_SESSION['ID'];
		$get_productname = $_SESSION['NAME'];
		$get_productcategory = $_SESSION['CATEGORY']; 
		$get_productquantity = $_SESSION['quantity'];
		$get_productprice = $_SESSION['price'];
		

		$total = $get_productprice * $get_productquantity;
		
		


	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		
		//customer
		$fname = filter_var($_POST['fname'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		$lname = filter_var($_POST['lname'],FILTER_SANITIZE_NUMBER_INT);
		$phone = filter_var($_POST['phone'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
		

		//first name
		if(empty($_POST['fname'])){
			$errors[] = '<p class="error">You forgot to enter your first name.</p>';
		} else{
			$fn = $fname;
		}
		
		
		
		//last name
		if(empty($_POST['lname'])){
			$errors[] = '<p class="error">You forgot to enter your last name.</p>';
		} else{
			$ln = $lname;
		}
		
		
		//phone number
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
	

		//Street Address
		if(empty($_POST['street_address'])){
			$errors[] = '<p class="error">You forgot to enter your Address.</p>';
		} else{
			$sa = $street_address;
		}
		
		
		//city
		if(empty($_POST['city'])){
			$errors[] = '<p class="error">You forgot to enter your City.</p>';
		} else{
			$cty = $city;	
		}

		//state
		if(empty($_POST['state'])){
			$errors[] = '<p class="error">You forgot to enter your state.</p>';
		} else{
			$st = $state;
		}
		
		//postal code
		if(empty($_POST['postal_code'])){
			$errors[] = '<p class="error">You forgot to enter your postal_code.</p>';
		} else{
			$pc = $postal_code;
		}
		
		
		
		//Payment
		
		if (isset($_REQUEST['card'])) {  
				 $card = $_REQUEST['card'];   
					if ($card == 'credit') {
						$pay = '<p>Credit Card</p>';
					} elseif ($card == 'debit') {
						$pay = '<p>Debit Card</p>';
					} else { // Unacceptable value.
						$card = NULL;
						echo '<p class="error">*Make a proper Selection from "Credit" or "Debit".
					   </p>';
					}

			   } else { 
				$card = NULL;
				  echo '<p class="error">You forgot to make a selection from credit and debit card.
					   </p>';
			}	  
		
		
		//Name on Card
		if(empty($_POST['cardname'])){
			$errors[] = '<p class="error">You forgot to enter your name on Card.</p>';
		} else{
			$card = $cardname;	
		}
		
		//Credit Card number
		
		$cnpattern = preg_match('/^[0-9]{16}$/', $cardnumber);

		
		if(!empty($_POST['cardnumber'])){
			if($cnpattern){
					$cardnum = $cardnumber;		
			}
			else {
				unset($_POST['cardnumber']);
				$errors[] = '<p class="error">Card number should be of 16 digits';
			}	
		} else{
			$cardnumber = NULL;
			$errors[] = '<p class="error">You forgot to enter your number on Card.</p>';
		}
	
// 		if(empty($_POST['cardnumber'])){
//			$errors[] = '<p class="error">You forgot to enter your number on Card.</p>';
//		} else{
//			$cardnum = $cardnumber;	
//		}
//		
		
		//expiry year
//		if(empty($_POST['expyear'])){
//			$errors[] = '<p class="error">You forgot to enter expiry year on Card.</p>';
//		} else{
//			$ex = $expyear;	
//		}
//
//		
		
		//cvv
		
		
		$cvvpattern = preg_match('/^[0-9]{3}$/', $cvv);

		
		if(!empty($_POST['cardnumber'])){
			if($cvv){
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
		
//		if(empty($_POST['cvv'])){
//			$errors[] = '<p class="error">You forgot to enter your CVV.</p>';
//		} else{
//			$cv = $cvv;
//		}


		
		if (empty($errors) && !empty($card)){
			
			echo '<h1>Success!</h1>';
	
			echo $fn."</br>";
			echo $ln."</br>";
			echo $ph."</br>";
			echo $sa."</br>";
			echo $cty."</br>";
			echo $st."</br>";
			echo $pc."</br>";
			echo $pay."</br>";
			echo $card."</br>";
			echo $cardnum."</br>";
			echo $cv."</br>";
			
			
		}
		else {
			
		
			foreach ($errors as $msg) { 
				
				echo '<h5>Error!</h5>'.$msg;
				
			}
			echo '</p><p>Please try again.</p><p><br></p>';
		}
		
		
		
	}	
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 15px;
  padding: 5px;
}

* {
  box-sizing: border-box;
}
	
.error{
		color: red;
}

.row {
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

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
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

<h2>Check Out Form</h2>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="checkout.php" method="post">
      
        <div class="row">
          <div class="col-50">
            <h3>Address</h3>
			  
            <label for="fname"><i class="fa fa-user"></i> First Name</label>
            <input type="text" name="fname" placeholder="Jeenal" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
			  
			  
			<label for="lname"><i class="fa fa-user"></i> Last Name</label>
            <input type="text" name="lname" placeholder="Shah" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>">
			  
			<label for="phone"><i class="fa fa-phone"></i> Phone Number</label>
            <input type="text" name="phone" placeholder="0000000000" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
			  
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
                <select>
                    <option value="01">January</option>
                    <option value="02">February </option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
                <select>
                    <option value="16"> 2016</option>
                    <option value="17"> 2017</option>
                    <option value="18"> 2018</option>
                    <option value="19"> 2019</option>
                    <option value="20"> 2020</option>
                    <option value="21"> 2021</option>
                </select>
            </div>
            <div class="row">
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" placeholder="000">
              </div>
            </div>
          </div>
          
        </div>
        <input type="submit" name="submit" value="Submit" class="btn">
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h3>Cart<span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h3>
      <h4>Product Name: <span class="price"><?php echo $get_productname ?></span></h4>
      <h4>Product Category: <span class="price"><?php echo $get_productcategory ?></span></h4>
      <h4>Product Quantity: <span class="price"><?php echo $get_productquantity ?></span></h4>
      <h4>Product Price: <span class="price"><?php echo "$".$get_productprice ?></span></h4>
      <hr>
      <p>Total <span class="price" style="color:black"><?php echo $total ?></span></p>
    </div>
  </div>
</div>


</body>
</html>

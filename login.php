<?php
	//session start
	session_start();
 
	//require database connection
	require('mysqli_connect.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		
	//Array to store validation errors
	$errors = [];
//	$err = false;

 
	//Sanitize the POST values username and password
	$username = mysqli_real_escape_string($dbnw, trim($_POST['username']));
	$password = mysqli_real_escape_string($dbnw, trim($_POST['password']));
	$username = filter_var($_POST['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
 	$password = filter_var($_POST['password'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		
		
		
	//Input Validations

	if(empty($_POST['username'])){
			$errors[] = 'You forgot to enter your Username.';
	} else{
			$un = $username;
	}
		
		
	
	if(empty($_POST['password'])){
			$errors[] = 'You forgot to enter your Password.';
	} else{
			$pw = $password;
	}
	

//	if(empty($_POST['password'])){
//			$errors[] = 'You forgot to enter your Password.';
//			$err = true;
//	}

	
	//If there are input validations, redirect back to the login form
	if($err) {
		
		$_SESSION['ERRORS'] = $errors;
		session_write_close();
		header("location: login.php");
		exit();
	}

	//Create query
	$q="SELECT username, password FROM login 
							WHERE username='{$username}' AND password='{$password}'";

	$result = mysqli_query($dbnw,$q) or die(mysqli_error($dbnw));

	//Check whether the query was successful or not
	if($result) {
		if(mysqli_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$login = mysqli_fetch_assoc($result);
			
			$_SESSION['SESS_USER_ID'] = $login['login_id'];
			$_SESSION['SESS_NAME'] = $login['username'];
			$_SESSION['SESS_PASSWORD'] = $login['password'];

			session_write_close();
			header("location: product.php");
			exit();
		} else {
			//Login failed
			$errors[] = 'user name and password not found';
			$err = true;
			if($err) {
			$_SESSION['ERRORS'] = $errors;
			session_write_close();
			header("location: main.php");
			exit();
			}
		}
	} else {
	die("Query failed");
	}
		
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login-NW</title>
<style type="text/css">
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 100vh;
	margin: -20px 0 50px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 10px 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	height:50%;
	width: 30%;
	z-index: 2;
	
}
		
</style>	
</head>
<body>
	<h2>NorthernWear Login Form</h2>
	<div class="form-container sign-in-container">
		<form action="login.php" method="post">
			<h1>Sign in</h1>
			<input type="text" size="30" maxlength="100" name="username" placeholder="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"/>
			<input type="password" size="30" maxlength="100" name="password" placeholder="Password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"/>
			<button name="loginbtn" type="submit">Sign In</button>
		</form>
	</div>
</body>
</html>

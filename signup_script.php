<?php 
require('includes/common.php'); 
if(@$_SESSION['email']){
	header("Location:home.php");
}

$error = false;

if(isset($_POST['submit'])){
	
	//collect form value
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$contact = $_POST['contact'];
	$city = $_POST['city'];
	$address = $_POST['address']; 
	
	
	$name = mysqli_real_escape_string($con, $name);
	$email = mysqli_real_escape_string($con, $email);
	$password = mysqli_real_escape_string($con, $password);
	$contact = mysqli_real_escape_string($con, $contact);
	$city = mysqli_real_escape_string($con, $city);
	$address = mysqli_real_escape_string($con, $address);
	
	$hash = password_hash($password, PASSWORD_BCRYPT);
	
	
	//email validation
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = true;
		header('location: signup.php?email_error=enter correct email');
	}
	else{
		//check if email already exist
		$query = "select email from users where email='$email'";
		$run = mysqli_query($con, $query);
		$result = mysqli_num_rows($run);
		if($result!=0){
			$error = true;
			header('location: signup.php?email_error=email already exists');
		}
	}
	
	//password validation
	
    if(strlen($password) < 8) {
        $error = true;
        header('location: signup.php?password_error=at least 8 char required');
    }
	if(strlen($contact) < 10) {
        $error = true;
        header('location: signup.php?mobile_error=Invalid mobile number');
    }else if(!preg_match("/^[789][0-9]{9}$/", $contact)){
		$error = true;
		header('location: signup.php?mobile_error=Invalid mobile number');
	}
	
	
	if(!$error){
	$query = "INSERT INTO users (name, email, password, contact, city, address) VALUES ('$name', '$email', '$hash', '$contact', '$city', '$address')";
    $result = mysqli_query($con, $query);
    if(!$result){
		header('location: signup.php?signup_error=failed to signinig up, try again.');
        
    }
    else{
		$_SESSION['id'] = mysqli_insert_id($con);
		$_SESSION['email'] = $email;
		
	    header ("location:home.php");
    }
}
}
?>
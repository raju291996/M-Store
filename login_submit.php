<?php
require('includes/common.php');
if(isset($_SESSION['email'])){
	header("Location:home.php");
    exit();
}

if(isset($_POST['submit'])){
	$email = $_POST['email'];
	$password = $_POST['password'];
	$email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);
	
	    $query = "SELECT id, email, password FROM users WHERE email = '$email'";
	    $result = mysqli_query($con, $query);
	    $rows = mysqli_num_rows($result);
	    if($rows > 0){
	        $data = mysqli_fetch_array($result);
	        $verify_pass = $data['password'];
			$id = $data['id'];
			$email = $data['email'];
	        if(password_verify($password, $verify_pass)){
				$_SESSION['email'] = $email;
				$_SESSION['id'] = $id;
				header("Location:home.php");
		    }
	        else {
		        echo "Invalid email or password";
            }
	    }
	    else{
		    echo "Unregistered email address";
	    }
}

?>
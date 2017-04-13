<?php
require('includes/common.php'); 
if(!$_SESSION['email']){
	header("Location:index.php");
} 
    $email = $_SESSION['email'];
    $query = "SELECT * FROM users WHERE email = '$email'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) > 0){
		$data = mysqli_fetch_array($result);
		$verify_pass = $data['password'];
	}
    $error = false;
    if(isset($_POST['submit'])){
		$s1 = mysqli_real_escape_string($con, $_POST['pass']);
		$s2 = mysqli_real_escape_string($con, $_POST['new_pass']);
		$s3 = mysqli_real_escape_string($con, $_POST['con_pass']);
		
	    if(strlen($s2) < 8) {
            $error = true;
            header('location: settings.php?pass_error=minimum 8 char required');
			exit();
        }
		if($s2 != $s3){
		    $error = true;
			header('location: settings.php?cnf_error=confirm password not match');
			exit();
		}
		if(!$error){
			if(password_verify($s1, $verify_pass)){
				$query2 = "UPDATE users SET password = '$s2' WHERE email = '$email'";
				if(!mysqli_query($con, $query2)){
                    header('location: settings.php?update_error=some error occured, try again');
					exit();
                }
		        else{
				    header('location: settings.php?success_msg=password successfully updated'); 
			    }
			}
			else{
				header('location: settings.php?cur_error=invalid current password');
			}  
	    }
	}
?>
<?php
require ('includes/common.php');
if (!$_SESSION['email']) { 
    header('location: index.php');
	exit();
}
if(isset($_GET['remove_id'])){
	$remove_id = $_GET['remove_id'];
	$user_id = $_SESSION['id'];
	$query = "DELETE FROM user_items WHERE id = '$remove_id' AND user_id = '$user_id'";
	if(mysqli_query($con, $query)){
		header('Location:cart.php');
	}
	else{
		header('Location:cart.php?error_msg=Error occured while removing item from cart');
    }
}
?>
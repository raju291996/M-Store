<?php
require ('includes/common.php');
if (!$_SESSION['email']) { 
    header('location: index.php');
	exit();
}
if(isset($_GET['add_id'])){
	$add_id = $_GET['add_id'];
	$user_id = $_SESSION['id'];
	$query = "INSERT INTO user_items (user_id, item_id, status) VALUES('$user_id', '$add_id', 'Added to cart')";
	if(mysqli_query($con, $query)){
		header('Location:home.php');
	}
	else{
		header('Location:cart.php?error_msg = Error in adding item into the cart');
    }
}
?>
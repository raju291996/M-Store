<?php
require ('includes/common.php');
if (!$_SESSION['email']) { 
    header('location: index.php');
	exit();
}
if(isset($_GET['p_id'])){
	$p_id = mysqli_real_escape_string($con, $_GET['p_id']);
	$user_id = $_SESSION['id'];
	$query = "UPDATE user_items SET status = 'Confirmed' WHERE user_id = '$user_id'";
	$run = mysqli_query($con, $query);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>E-Store-Order Confirmation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/index.css" rel="stylesheet" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

        <?php include ('includes/header.php'); ?>   
		
<div class="col-lg-4 col-lg-offset-4" style="margin-top:80px;margin-bottom:10px;">
			<h5 align="center">Thank you for ordering from E-Store.
			The order shall be delivered to you shortly.</h5><hr>
			<p align="center">Order some more electronic items <a href="home.php" style="color:#0000f5";>here.</a></p>
		</div>


</body>
</html>
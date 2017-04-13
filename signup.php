<?php
require ('includes/common.php');
if (@$_SESSION['email']) { 
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>E-store-Signup</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/index.css" type="text/css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="container-fluid decor_bg">
		    <?php include ('includes/header.php'); ?>
			<div class="row decor_row">
				<div class="container">
				    <div style="margin:60px 100px 10px;color:red;"><?php echo @$_GET['signup_error']; ?></div>
					<div class="col-lg-8">
						<img class="img-responsive" src="images/yess.jpg"/>
					</div>
					<div class="col-lg-4">
						<h2 style="color:#000;">SIGN UP</h2>
						<form  action="signup_script.php" method="POST">
							<div class="form-group">
								<input class="form-control" placeholder="Name" name="name" required = "true">
							</div>
							<div class="form-group">
								<input type="email" class="form-control"  placeholder="Email"  name="email" required = "true">
                                <div style="color:red"><?php echo @$_GET['email_error']; ?></div>								
								</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Password" name="password" required = "true">
								<div style="color:red"><?php echo @$_GET['password_error']; ?></div>
							</div>
							<div class="form-group">
								<input type="number" class="form-control"  placeholder="Contact" name="contact" required = "true">
								<div style="color:red"><?php echo @$_GET['mobile_error']; ?></div>
								</div>
							<div class="form-group">
								<input class="form-control"  placeholder="City" name="city" required = "true">
							</div>
							<div class="form-group">
								<input class="form-control"  placeholder="Address" name="address" required = "true">
							</div>
						  <button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php include ('includes/footer.php'); ?>
        <?php include ('includes/modal.php'); ?>
	</body>
</html>
<?php
require ("includes/common.php");
if (isset($_SESSION['email'])) { 
    header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>E-store-Contact</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/index.css" type="text/css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="container-fluid">
		    <?php include ('includes/header.php'); ?>
			<div class="row" style="margin-top:80px;">
				<div class="container text-justify">
					<div class="col-lg-10">
						<h2>LIVE SUPPORT</h2>
						<h4>24 hours | 7 days a week | 365 days a year    Live Technical Support</h4>
						<p>This is a demo information. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
					</div>
					<div class="col-lg-2">
						<center><img src="images/contact.png" alt="Contact Us"/></center>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="container">
					<div class="col-lg-8" style="margin-bottom:10px;">
						<h2>CONTACT US</h2>
						<form role="form" action="contact_script.php" method="POST">
							<div class="form-group">
								<label>Name</label>
								<input class="form-control" name="name" required = "true">
							</div>
							<div class="form-group">
								<label>Email:</label>
								<input class="form-control" name="e-mail" required = "true">
															</div>
							<div class="form-group">
								<label>Message:</label>
								<textarea class="form-control" rows="5" name="message" required = "true"></textarea>
							</div>
						  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
					<div class="col-lg-4">
						<h2>Company Information :</h2>
						<p>500 Lorem Ipsum Dolor Sit, </p>
						<p>22-56-2-9 Sit Amet, Lorem,</p>
						<p>USA</p>
						<p>Phone:(00) 222 666 444</p>
						<p>Fax: (000) 000 00 00 0</p>
						<p>Email: info@mycompany.com</p>
						<p>Follow on: Facebook, Twitter<p>
					</div>
				</div>
			</div>
		</div>
		<?php include ('includes/footer.php'); ?>
        <?php include ('includes/modal.php'); ?>
	</body>
</html>
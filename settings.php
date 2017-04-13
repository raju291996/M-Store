<?php
require ('includes/common.php');
if (!$_SESSION['email']) { 
    header('location: index.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>E-Store-Change Password</title>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/index.css" type="text/css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		</script>
	</head>
	<body>
		<div class="container-fluid">
			<?php include ('includes/header.php'); ?>   
			<div class="row">
			    <div style="margin:50px 100px 0px;"><?php echo @$_GET['success_msg'].@$_GET['update_error']; ?></div>
				<div class="col-lg-4 col-lg-offset-4" style="margin-top:80px;margin-bottom:10px;">
					<h4>Change Password</h4>
					<form action="settings_script.php" method="POST">
						<div class="form-group">
                        <input type="password" class="form-control" placeholder="Old Password" id="old_password" name="pass" required="true"/>
						<?php echo @$_GET['cur_error']; ?>
                    </div>
					<div class="form-group">
                        <input type="password" class="form-control" placeholder="New Password" id="new_password" name="new_pass" required="true"/>
						<?php echo @$_GET['pass_error']; ?>
                    </div>
					<div class="form-group">
                        <input type="password" class="form-control" placeholder="Re-type New Password" id="cpassword" name="con_pass" required="true"/>
						<?php echo @$_GET['cnf_error']; ?>
                    </div>
					    <button type="submit" name="submit" class="btn btn-primary">Change</button>					
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
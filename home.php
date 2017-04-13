<?php
require ("includes/common.php");
include ('check-if-added.php');
if (!$_SESSION['email']) { 
    header('location: index.php');
}
$query = "SELECT * FROM products ORDER BY pid ASC";
$run =  mysqli_query($con, $query);
$mobile_number =0;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>E-Store</title>
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
			<div class="row" style="margin-top:80px;">
                <?php
                    while($items = mysqli_fetch_array($run)){
                ?>
				<div class="col-lg-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title"><?php echo $items['name'];?></div>
						</div>
						<div class="panel-body">
						    <center><img src="images/<?php echo $items['img_name']; ?>1.jpeg" alt="Item"/></center>
							<p> Rs <?php echo $items['price']; ?>.</p>
							<?php 
			                    if (check_if_added_to_cart($items['pid'])) { 
				                    echo '<button class="btn btn-block btn-success" disabled>Already in cart</button>';
			                    } else { 
							?>
							<div class="col-xs-6"><a href="product-view.php?p_id=<?php echo $items['pid']; ?>" role="button" data-toggle="modal" class="btn btn-primary btn-block">View Product</a></div>
				            <div class="col-xs-6"><a href="cart-add.php?add_id=<?php echo $items['pid']; ?>" class="btn btn-block btn-primary">Add to cart</a></div>
		                     <?php }  ?>
						</div>
					</div>
				</div>
					<?php } ?>
			</div>
		</div>
	</body>
</html>
<?php
require ("includes/common.php");
if (isset($_SESSION['email'])) { 
    header('location: home.php');
}
$query = "SELECT * FROM products ORDER BY pid ASC";
$run =  mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>E-Store</title>
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
			    <div class="col-lg-4 col-md-4 col-sm-6">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title"><?php echo $items['name'];?></div>
						</div>
						<div class="panel-body">
							<center><img src="images/<?php echo $items['img_name']; ?>1.jpeg" alt="Item" height="300px"/></center>
							<p style="margin-top:10px;text-align:center;"> <b>Rs <?php echo $items['price']; ?></b>.</p>
							<a href="product-view.php?p_id=<?php echo $items['pid']; ?>" role="button" data-toggle="modal" class="btn btn-primary btn-block">View Product</a>
						</div>
					</div>
				</div>
				<?php }  ?>
			</div>		
        </div>
        <?php include ('includes/footer.php'); ?>
        <?php include ('includes/modal.php'); ?>
	</body>
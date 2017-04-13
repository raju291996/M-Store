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
  <title>E-Store-Cart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="css/index.css" rel="stylesheet" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

    <?php include ('includes/header.php'); ?>    
	
	<div style="margin:70px;margin-bottom:-20px;color:red;"><?php echo @$_GET['error_msg']; ?></div>
		
	<div class="row" style="margin-top:80px;">
        <?php 
	        $user_id = $_SESSION['id'];
			$query = "SELECT products.name, products.price, products.pid, user_items.id FROM user_items INNER JOIN products ON user_items.item_id = products.pid where user_id = '$user_id' AND status='Added to cart'";
			$run = mysqli_query($con, $query);
			if(mysqli_num_rows($run) == 0){ ?>
				<center><div style="color:#333;">Add items to the cart first</div></center>
				<?php } else { ?>
				<div class="col-lg-4 col-lg-offset-4">
	                <table class="table table-striped">
	                    <thead><tr><th>Item Number</th><th>Price</th><th></th></tr></thead>
		            <?php 
		                $z =0;
			            $total_price = 0;
			            while ($data = mysqli_fetch_array($run)){
			                $total_price += $data['price'];
			                $cart_ids[] = $data['id'];
		            ?>
		                <tr><td>#<?php echo ++$z; ?></td><td>Rs <?php echo $data['price']; ?>/-</td><td><a href="cart-remove.php?remove_id=<?php echo $data['id']; ?>" style='color:#0000ff;'> Remove</a></td></tr>
		            <?php } ?>
		                <tr><td><b>Total</b></td><td><b>Rs <?php echo $total_price; ?>/-</b></td><td><a class="btn btn-primary" href="success.php?p_id=<?php echo implode(',', $cart_ids); ?>">Confirm Order</a></td></tr>
	                </table>
		        <?php } ?>
                </div>
    </div>
</body>
</html>

<?php
require ("includes/common.php");
include ('check-if-added.php');
if(isset($_GET['p_id'])){
	$p_id = mysqli_real_escape_string($con, $_GET['p_id']);
	$query = "SELECT * FROM products WHERE pid = '$p_id'";
	$run = mysqli_query($con, $query);
	$item = mysqli_fetch_array($run);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Store - Product Detail</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="css/p-detail.css" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css" type="text/css"/>
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
		<?php include ('includes/header.php'); ?>
	  <div class="container" style="margin:50px auto">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="images/<?php echo $item['img_name']; ?>1.jpeg"/></div>
						  <div class="tab-pane" id="pic-2"><img src="images/<?php echo $item['img_name']; ?>2.jpeg" /></div>
						  <div class="tab-pane" id="pic-3"><img src="images/<?php echo $item['img_name']; ?>3.jpeg" /></div>
						  <div class="tab-pane" id="pic-4"><img src="images/<?php echo $item['img_name']; ?>4.jpeg" /></div>
						  <div class="tab-pane" id="pic-5"><img src="images/<?php echo $item['img_name']; ?>5.jpeg" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="images/<?php echo $item['img_name']; ?>1.jpeg" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="images/<?php echo $item['img_name']; ?>2.jpeg" height="100%"/></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="images/<?php echo $item['img_name']; ?>3.jpeg" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="images/<?php echo $item['img_name']; ?>4.jpeg" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="images/<?php echo $item['img_name']; ?>5.jpeg" /></a></li>
						</ul>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $item['name']; ?></h3>
						<div class="rating">
							<span class="total-rat">Rating : <b><?php echo $item['rating']; ?>/5</b></span><br>
							<span class="review-no">Reviews : <b><?php echo $item['review']; ?> </b></span>
						</div>
						<p class="product-description"><?php echo $item['name']; ?> with | <?php echo $item['RAM']; ?> RAM | <?php echo $item['Internal Storage']; ?> Internal Storage | <?php echo $item['Primary Camera'];?> Primary Camera | <?php echo $item['Secondary Camera'];?> Secondary Camera</p>
						<h4 class="price">Current price: <span>Rs <?php echo $item['price']; ?>.00</span></h4>
						<div class="action">
						<?php if (!@$_SESSION['email']) { ?> <p><a href="#myModal" role="button" data-toggle="modal" class="add-to-cart btn btn-primary">Buy Now</a></p>
		                <?php } else { 
			                 if (@check_if_added_to_cart($items['pid'])) { 
				                echo '<button class="btn btn-block btn-success" disabled>Added to cart</button>';
			                 } else { ?>
				            <a href="cart-add.php?add_id=<?php echo @$items['pid']; ?>" class="btn btn-block btn-primary">Add to cart</a>
		                <?php } } ?>
							
						</div>
						<h3  style="color:#333;font-size:28px;margin:30px 0px;font-weight:400;"><b>Specifications</b></h3>
						<ul class="spec">
						<li style="color:#555;font-size:22px;margin:20px auto 0px;border:1px solid #f2f2f2;padding:20px 10px;">General</li>
						<div style="border:1px solid #f2f2f2;padding: 10px">
						<li><div class="div1">Sales Package</div> <div class="div2"><?php echo $item['Sales Package'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Model Number</div> <div class="div2"><?php echo $item['Model Number'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Model Name</div> <div class="div2"><?php echo $item['Model Name'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Color</div> <div class="div2"><?php echo $item['Color'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">SIM Type</div> <div class="div2"><?php echo $item['SIM Type'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">SIM Size</div> <div class="div2"><?php echo $item['SIM Size'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Touchscreen</div> <div class="div2"><?php echo $item['Touchscreen'];?></div><div style="clear:both;"></div></li></div>
						<li style="color:#555;font-size:22px;margin:20px auto 0px;border:1px solid #f2f2f2;padding:20px 10px;">Display Features</li>
						<div style="border:1px solid #f2f2f2;padding: 10px">
						<li><div class="div1">Display Size</div> <div class="div2"><?php echo @$item['Display Size'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Resolution</div> <div class="div2"><?php echo $item['Resolution'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Resolution Type</div> <div class="div2"><?php echo $item['Resolution Type'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Disply Colors</div> <div class="div2"><?php echo $item['Display Colors'];?></div><div style="clear:both;"></div></li></div>
						<li style="color:#555;font-size:22px;margin:20px auto 0px;border:1px solid #f2f2f2;padding:20px 10px;">Os & Processor Features</li>
						<div style="border:1px solid #f2f2f2;padding: 10px">						
						<li><div class="div1">Operating System</div> <div class="div2"><?php echo $item['Operating System'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Processor Type</div> <div class="div2"><?php echo $item['Processor Type'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Processor Core</div> <div class="div2"><?php echo $item['Processor Core'];?></div><div style="clear:both;"></div></li></div>
						<li style="color:#555;font-size:22px;margin:20px auto 0px;border:1px solid #f2f2f2;padding:20px 10px;">Memory & Storage Features</li>
						<div style="border:1px solid #f2f2f2;padding: 10px">
						<li><div class="div1">Internal Storage</div> <div class="div2"><?php echo $item['Internal Storage'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">RAM</div> <div class="div2"><?php echo $item['RAM'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Expandable Storage</div> <div class="div2"><?php echo $item['Expandable Storage'];?></div><div style="clear:both;"></div></div>
						<li style="color:#555;font-size:22px;margin:20px auto 0px;border:1px solid #f2f2f2;padding:20px 10px;">Camera Features </li>
						<div style="border:1px solid #f2f2f2;padding: 10px">
						<li><div class="div1">Primary Camera</div> <div class="div2"><?php echo $item['Primary Camera'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Primary Camera Features</div> <div class="div2"><?php echo $item['Primary Camera Features'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Secondary Camera</div> <div class="div2"><?php echo $item['Secondary Camera'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Secondary Camera Features</div> <div class="div2"><?php echo $item['Secondary Camera Features'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Full HD Recording</div> <div class="div2"><?php echo $item['Full HD Recording'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Video Recording Resolution</div> <div class="div2"><?php echo $item['Video Recording Resolution'];?></div><div style="clear:both;"></div></li></div>
						<li style="color:#555;font-size:22px;margin:20px auto 0px;border:1px solid #f2f2f2;padding:20px 10px;">Connectivity Features</li>
						<div style="border:1px solid #f2f2f2;padding: 10px">
						<li><div class="div1">Network Type</div> <div class="div2"><?php echo $item['Network Type'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Supported Networks</div> <div class="div2"><?php echo $item['Supported Networks'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Internet Connectivity</div> <div class="div2"><?php echo $item['Internet Connectivity'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Micro USB Version</div> <div class="div2"><?php echo $item['Micro USB Version'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Bluetooth Version</div> <div class="div2"><?php echo $item['Bluetooth Version'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Wi-Fi Version</div> <div class="div2"><?php echo $item['Wi-Fi Version'];?></div><div style="clear:both;"></div></li>
						<li><div class="div1">Audio Jack</div> <div class="div2"><?php echo $item['Audio Jack'];?></div><div style="clear:both;"></div></li></div>
						</ul>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>
	<?php
	    if (!@$_SESSION['email']) { 
           include ('includes/footer.php');
           include ('includes/modal.php');	   
        }
	?>
  </body>
</html>

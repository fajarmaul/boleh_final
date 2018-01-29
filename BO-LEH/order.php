<?php
include "dbconnect.php";
session_start();
$iditem = $_POST['iditem'];
$sql = "SELECT * FROM items WHERE id_item = '$iditem' ";
$qry= mysqli_query($newconn ,$sql);
$items = mysqli_fetch_array($qry);
$total = $items['price']*$_POST['quantity'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Order | BO-LEH</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href=""><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href=""><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="home.php"><img src="images/logo4.png" alt="" /></a>
						</div>

					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">

                <?php
                      if ( isset($_SESSION['user'])!="" ) {
                        if ( $_SESSION['type']=="1" ){
                ?>
                <li><a href="dashboard/src/seller.php"><i class="fa fa-user"></i> <?php echo $_SESSION['type'];  ?></a></li>
                <li><a href="dashboard/src/seller.php"><i class="fa fa-user"></i> <?php echo $_SESSION['name'];  ?></a></li>
                <li><a href="logout.php?logout"> Logout </a></li>

                <?php
              }else if($_SESSION['type']=="0"){
                ?>
                <li><a href="dashboard/src/user.php"><i class="fa fa-user"></i> <?php echo $_SESSION['type'];  ?></a></li>
                <li><a href="dashboard/src/user.php"><i class="fa fa-user"></i> <?php echo $_SESSION['name'];  ?></a></li>
                <li><a href="logout.php?logout"> Logout </a></li>
                <?php
              }else{
                 ?>
                 <li><a href="dashboard/src/superadmin.php"><i class="fa fa-user"></i> <?php echo $_SESSION['type'];  ?></a></li>
                 <li><a href="dashboard/src/superadmin.php"><i class="fa fa-user"></i> <?php echo $_SESSION['name'];  ?></a></li>
                 <li><a href="logout.php?logout"> Logout </a></li>
                 <?php
               }
                  ?>
                <?php } else {
                ?>
                <li><a href="signin.php" class="active"><i class="fa fa-lock"></i> Login </a></li>
                <?php
              }
                 ?>
              </ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="home.php">Home</a></li>
								<li class="dropdown"><a href="#">Kategori<i class="fa fa-angle-down"></i></a>
                  <ul role="menu" class="sub-menu">
                      <li><a href="makanan.php">Makanan</a></li>
	                    <li><a href="cinderamata.php">Cinderamata</a></li>
                  </ul>
              </li>
							</ul>
						</div>
					</div>


					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->


	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="home.php">Home</a></li>
				  <li class="active">Order</li>
				</ol>
			</div>
      <h3 class="text-center">Total Harga Pembelian</h3>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="cart_product">
								<a href=""><img src="dashboard/src/images/<?php echo $items['pic']; ?>" width="150" height="150"/></a>
							</td>
							<td class="cart_description">
								<h4><a href=""><?php echo $items['item_name']; ?></a></h4>
							</td>
							<td class="cart_price">
								<p>RP <?php echo $items['price']; ?></p>
							</td>
							<td>
								<p><?php echo $_POST['quantity']; ?></p>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">RP <?php echo $total; ?></p>
							</td>
							<td>
								<a href="prod-detail.php?id=<?php echo $iditem; ?>" class="btn btn-default cart">Edit</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
      <div class="col-md-12 col-md-push-10">
        <a href="prod-detail.php?id=<?php echo $iditem; ?>" class="btn btn-default cart">Cancel</a>
        <form class="" action="order-info.php" method="post">
          <input type="hidden" name="iditem" value="<?php echo $iditem; ?>">
          <input type="hidden" name="quantity" value="<?php echo $_POST['quantity']; ?>">
          <input type="hidden" name="total" value="<?php echo $total; ?>">
          <button type="submit" class="btn btn-default cart">Next</button>
        </form>
      </div>
		</div>
	</section> <!--/#cart_items-->





	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
		</div>
	</section><!--/#do_action-->













	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2>bo<span>-leh</span></h2>
							<p>Bogor Oleh-oleh</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Service</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="">Online Help</a></li>
								<li><a href="">Contact Us</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Policies</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="404_edit.html">Terms of Use</a></li>
								<li><a href="404_edit.html">Privecy Policy</a></li>
								<li><a href="404_edit.html">Refund Policy</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 BO-LEH Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->


    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

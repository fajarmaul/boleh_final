<?php
include "dbconnect.php";
session_start();
$id = $_SESSION['user'];
$iditem = $_POST['iditem'];
$sql = "SELECT * FROM items WHERE id_item = '$iditem' ";
$sql2 = "SELECT item_name, name, address, phone, email, quantity FROM users JOIN has_item JOIN items WHERE has_item.id_item = items.id_item AND users.id_user = '$id' AND items.id_item = '$iditem' ";
$qry = mysqli_query($newconn ,$sql);
$qry2=mysqli_query($newconn, $sql2);
$items = mysqli_fetch_array($qry);
$items2 = mysqli_fetch_array($qry2);
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
        <div class="row">
          <div class="col-sm-6">

              <div class="shopper-info">
                <p>Detail Produk</p>
                <form>
                  <input type="text" name="item_name" placeholder="Nama Produk" value="<?php echo $items2['item_name']; ?> " readonly="readonly">
                  <label>Total Harga </label>
                  <input type="text" name="total" placeholder="Harga Total" value="<?php echo $_POST['total']; ?> " readonly="readonly">
                  <label>Jumlah:</label>
                  <input type="text"  name="quantity" placeholder="Jumlah" value="<?php echo $_POST['quantity']; ?> " readonly="readonly">
                </form>
              </div>
          </div>


            <div class="col-sm-6 clearfix">
              <div class="shopper-info">
                <p>Data Penerima</p>
                 <form class="" action="order-info-process.php" method="post">
                    <input type="hidden" name="quantitylama" value="<?php echo $items2['quantity']; ?> ">
                    <input type="hidden" name="iditem" value="<?php echo $iditem ?> ">
                    <input type="hidden" name="user" value="<?php echo $id ?> ">
                    <input type="hidden" name="item_name" placeholder="Nama Produk" value="<?php echo $items2['item_name']; ?> " readonly="readonly">
                    <input type="hidden" name="total" placeholder="Harga Total" value="<?php echo $_POST['total']; ?> " readonly="readonly">
                    <input type="hidden"  name="quantity" placeholder="Jumlah" value="<?php echo $_POST['quantity']; ?> " readonly="readonly">
                    <input type="text" placeholder="Nama" name="user_name" value="<?php echo $items2['name']; ?>">
                    <input type="number" min=0 onkeypress="return event.charCode >=48" maxlength="12" placeholder="No HP" name="phone" value="<?php echo $items2['phone']; ?>">
                    <input type="text" placeholder="Alamat" name="address" value="<?php echo $items2['address']; ?>">
                    <input type="email" placeholder="email" name="email" value="<?php echo $items2['email']; ?>">
                    <div class="col-md-12 col-md-push-10">
                      <button type="submit" name="button" class="btn btn-default cart">Submit</button>
                    </div>
                  </form>
              </div>
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

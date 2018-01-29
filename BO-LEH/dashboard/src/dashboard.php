<?php
include "config.php";
session_start();
$id = $_SESSION['user'];
$type = $_SESSION['type'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id_user = $id" );
$result = mysqli_fetch_array($query);
$queryuser = mysqli_query($conn, "SELECT * FROM orders JOIN has_item ON has_item.id_item = orders.id_item WHERE orders.id_user = $id ");
$queryseller = mysqli_query($conn, "SELECT * FROM orders JOIN has_item ON has_item.id_item = orders.id_item WHERE has_item.id_user = $id ");
$resultuser = mysqli_fetch_array($queryuser);
$resultseller = mysqli_fetch_array($queryseller);
$counttuser = mysqli_query($conn, "SELECT COUNT(id_order) FROM orders WHERE id_user = $id");
$countrevenue = mysqli_query($conn, "SELECT SUM(price_total) FROM orders JOIN has_item ON has_item.id_item = orders.id_item WHERE has_item.id_user = $id");
$countseller =  mysqli_query($conn, "SELECT COUNT(id_order) FROM orders JOIN has_item ON has_item.id_item = orders.id_item WHERE has_item.id_user = $id");
$resultcountseller = mysqli_fetch_row($countseller);
$resultrevenue = mysqli_fetch_row($countrevenue);
// $resultcount1 = mysqli_fetch($countseller);
// $resultcount2 = mysqli_fetch($counttuser);
  if (isset($_SESSION['user'])=="") {
      header("Location: ../../signin.php");
      exit;

    ?>


<?php

  }else{
    ?>
    <!doctype html>
    <html lang="en">
    <head>
    	<meta charset="utf-8" />
    	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    	<title>Boleh Dashboard </title>

    	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!--  Material Dashboard CSS    -->
        <link href="../assets/css/material-dashboard.css" rel="stylesheet"/>

        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="../assets/css/demo.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    </head>

    <body>

    	<div class="wrapper">

    	    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
    			<!--
    		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    		        Tip 2: you can also add an image using data-image tag
    		    -->

    			<div class="logo">
    				<a href="..\..\home.php" class="simple-text">
    					BOLEH
    				</a>
    			</div>

    	    	<div class="sidebar-wrapper">
    	            <ul class="nav">
    	                <li class="active">
    	                    <a href="dashboard.php">
    	                        <i class="material-icons">dashboard</i>
    	                        <p>Dashboard</p>
    	                    </a>
    	                </li>
    									<?php
    									if ($_SESSION['type'] == 1 ){
    									 echo
    	                '<li>
    	                    <a href="seller.php">
    	                        <i class="material-icons">person</i>
    	                        <p>User Profile</p>
    	                    </a>
    	                </li>';
    								}else{
    									echo
    									'<li>
    	                    <a href="user.php">
    	                        <i class="material-icons">person</i>
    	                        <p>User Profile</p>
    	                    </a>
    	                </li>';
    								}
    									 ?>

    									<?php
    									if ($_SESSION['type'] == 1 ){
    									 echo
    	                '<li>
    	                    <a href="table.php">
    	                        <i class="material-icons">content_paste</i>
    	                        <p>Barang</p>
    	                    </a>
    	                </li>';
    								}else{
    									echo
    									'';
    								}
    									 ?>

                       <?php
     									if ($_SESSION['type'] == 0 ){
     									 echo
     	                '<li>
                        <a href="transaction.php">
                          <i class="material-icons">content_paste</i>
                          <p>Transaksi Saya</p>
                        </a>

                      </li>';
     								}else{
     									echo
     									'';
     								}
     									 ?>
                       <?php
                       if ($_SESSION['type'] == 1 ){
                        echo
                       '<li>
                           <a href="orders.php">
                               <i class="material-icons">library_books</i>
                               <p>Order Saya</p>
                           </a>
                       </li>';
                     }else{
                       echo
                       '';
                     }
                        ?>

    	            </ul>
    	    	</div>
    	    </div>

    	    <div class="main-panel">
    			<nav class="navbar navbar-transparent navbar-absolute">
    				<div class="container-fluid">
    					<div class="navbar-header">
    						<button type="button" class="navbar-toggle" data-toggle="collapse">
    							<span class="sr-only">Toggle navigation</span>
    							<span class="icon-bar"></span>
    							<span class="icon-bar"></span>
    							<span class="icon-bar"></span>
    						</button>
    						<a class="navbar-brand" href="#">Material Dashboard</a>
    					</div>
    					<div class="collapse navbar-collapse">
    						<ul class="nav navbar-nav navbar-right">
    							<li>
    								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
    									<i class="material-icons">dashboard</i>
    									<p class="hidden-lg hidden-md">Dashboard</p>
    								</a>
    							</li>
    							<li class="dropdown">
    								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
    									<i class="material-icons">notifications</i>
    									<span class="notification">5</span>
    									<p class="hidden-lg hidden-md">Notifications</p>
    								</a>
    								<ul class="dropdown-menu">
    									<li><a href="#">Mike John responded to your email</a></li>
    									<li><a href="#">You have 5 new tasks</a></li>
    									<li><a href="#">You're now friend with Andrew</a></li>
    									<li><a href="#">Another Notification</a></li>
    									<li><a href="#">Another One</a></li>
    								</ul>
    							</li>
    							<li>
    								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
    	 							   <i class="material-icons">person</i>
    	 							   <p class="hidden-lg hidden-md">Profile</p>
    	 						   </a>
    								 <ul class="dropdown-menu">
     									<li><a href="../../logout.php?logout">Logout</a></li>
     								</ul>
    							</li>
    						</ul>

    						<form class="navbar-form navbar-right" role="search">
    							<div class="form-group  is-empty">
    								<input type="text" class="form-control" placeholder="Search">
    								<span class="material-input"></span>
    							</div>
    							<button type="submit" class="btn btn-white btn-round btn-just-icon">
    								<i class="material-icons">search</i><div class="ripple-container"></div>
    							</button>
    						</form>
    					</div>
    				</div>
    			</nav>

    			<div class="content">
    				<div class="container-fluid">
    					<div class="row">

    						<div class="col-lg-3 col-md-6 col-sm-6">
    							<div class="card card-stats">
    								<div class="card-header" data-background-color="green">
    									<i class="material-icons">store</i>
    								</div>
    								<div class="card-content">
    									<p class="category">Revenue</p>
    									<h3 class="title">Rp <?php echo number_format($resultrevenue[0]); ?></h3>
    								</div>
    								<div class="card-footer">
    									<div class="stats">
    										<i class="material-icons">date_range</i> Since Beginning
    									</div>
    								</div>
    							</div>
    						</div>
    						<div class="col-lg-3 col-md-6 col-sm-6">
    							<div class="card card-stats">
    								<div class="card-header" data-background-color="blue">
    									<i class="material-icons">shopping_cart</i>
    								</div>
    								<div class="card-content">
    									<p class="category">Orders IN</p>
    									<h3 class="title"><?php echo $resultcountseller[0]; ?></h3>
    								</div>
    								<div class="card-footer">
    									<div class="stats">
    										<i class="material-icons">assessment</i> Tracked from Your Order
    									</div>
    								</div>
    							</div>
    						</div>

    						<div class="col-lg-3 col-md-6 col-sm-6">
    							<div class="card card-stats">
    								<div class="card-header" data-background-color="purple">
    									<i class="material-icons">local_cafe</i>
    								</div>
    								<div class="card-content">
    									<p class="category">Items</p>
    									<h3 class="title">765</h3>
    								</div>
    								<div class="card-footer">
    									<div class="stats">
    										<i class="material-icons">update</i> Just Updated
    									</div>
    								</div>
    							</div>
    						</div>
    					</div>




    				</div>
    			</div>

    			<footer class="footer">
    				<div class="container-fluid">
    					<nav class="pull-left">
    						<ul>
    							<li>
    								<a href="#">
    									Home
    								</a>
    							</li>
    							<li>
    								<a href="#">
    									Company
    								</a>
    							</li>
    							<li>
    								<a href="#">
    									Portfolio
    								</a>
    							</li>
    							<li>
    								<a href="#">
    								   Blog
    								</a>
    							</li>
    						</ul>
    					</nav>
    					<p class="copyright pull-right">
    						&copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
    					</p>
    				</div>
    			</footer>
    		</div>
    	</div>

    </body>

    	<!--   Core JS Files   -->
    	<script src="../assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    	<script src="../assets/js/material.min.js" type="text/javascript"></script>

    	<!--  Charts Plugin -->
    	<script src="../assets/js/chartist.min.js"></script>

    	<!--  Notifications Plugin    -->
    	<script src="../assets/js/bootstrap-notify.js"></script>

    	<!--  Google Maps Plugin    -->
    	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    	<!-- Material Dashboard javascript methods -->
    	<script src="../assets/js/material-dashboard.js"></script>

    	<!-- Material Dashboard DEMO methods, don't include it in your project! -->
    	<script src="../assets/js/demo.js"></script>

    	<script type="text/javascript">
        	$(document).ready(function(){

    			// Javascript method's body can be found in assets/js/demos.js
            	demo.initDashboardPageCharts();

        	});
    	</script>

    </html>


<?php
  }
 ?>

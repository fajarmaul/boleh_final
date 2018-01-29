<?php
include "config.php";
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM items WHERE id_item = '$id' ");
$query2 = mysqli_query($conn, "SELECT * FROM items JOIN has_item ON items.id_item = has_item.id_item WHERE has_item.id_item = $id ");
$result = mysqli_fetch_array($query);
$result2 = mysqli_fetch_array($query2);
 ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Dashboard by Creative Tim</title>

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
	                <li>
	                    <a href="dashboard.php">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li>
	                    <a href="seller.php">
	                        <i class="material-icons">person</i>
	                        <p>User Profile</p>
	                    </a>
	                </li>
	                <li class="active">
	                    <a href="table.php">
	                        <i class="material-icons">content_paste</i>
	                        <p>Barang</p>
	                    </a>
	                </li>
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
						<h4 >Item Detail</h4>
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
								 <div class="col-md-12">
										 <div class="card">
												 <div class="card-header" data-background-color="purple">
														 <h4 class="title">Barang Anda</h4>
														 <p class="category">Silahkan Sesuaikan Barang Anda</p>
												 </div>
                             <div class="card-content table-responsive">
                              <form method="post" action="modules/edititem_process.php" enctype="multipart/form-data">
                                <div class="col-md-6">
                                  <table>
                                    <thead>
                                      <td></td>
                                      <td></td>
                                    </thead>
                                    <tbody>
                                      <!-- editproses untuk edit -->
                                      <input type="hidden" name="id" value="<?php echo $result['id_item'];?>">

                                         <div class="col-sm-3">
                                           <div class="form-group">
                                               <tr>
                                                 <td>Nama Barang :  </td>
                                                 <td><input type="text" name="item_name" placeholder = "Masukkan Nama Barang Anda" class="form-control" value="<?php echo $result['item_name'];?>" required></td>
                                               </tr>
                                           </div>
                                         </div>

                                         <div class="col-sm-3">
                                           <div class="form-group">
                                               <tr>
                                                 <td>Harga : </td>
                                                 <td><input type="number" min = 0 onkeypress="return event.charCode >=48" name="item_price" placeholder = "Masukkan Harga Barang" class="form-control" value="<?php echo $result['price'];?>" required></td>
                                               </tr>
                                           </div>
                                         </div>

                                           <div class="col-sm-3">
                                             <div class="dropdown">
                                                   <tr>
                                                     <td>Kategori</td>
                                                     <td><select class="dropdown-toggle" name="category">
                                                        <option value="0">Makanan</option>
                                                        <option value="1">Merchandise</option>
                                                        </select>
                                                     </td>
                                                   </tr>
                                             </div>
                                           </div>

                                           <div class="col-sm-3">
                                             <div class="dropdown">
                                                   <tr>
                                                     <td>Jumlah Barang</td>
                                                     <td><input type="number" min= 0  onkeypress="return event.charCode >=48" name="quantity" placeholder = "Masukkan Jumlah Barang" class="form-control" value="<?php echo $result2['quantity'];?>" required></td>
                                                     </td>
                                                   </tr>
                                             </div>
                                           </div>

                                           <div class="col-sm-3">
                                             <div class="form-group">
                                                 <tr>
                                                   <td>Deskripsi : </td>
                                                   <td><textarea class="form-control" cols="60" rows="3" name="description" placeholder="Silahkan Masukan Deskripsi Barang Anda" rows="5"><?php echo $result2['description'];?></textarea>
                                                 </tr>
                                             </div>
                                           </div>
                                       </tbody>
                                  </table>
                                </div>
                                <div class="col-md-2">
                                </div>
                                <div class="col-md-4">
                                  <table>
                                   <thead>
                                   </thead>
                                   <tbody>
                                     <tr>
                                       <td><img src="images/<?php echo $result['pic'];?>"></td>
                                     </tr>
                                     <tr>
                                       <td>Change Item Picture</td>
                                     </tr>
                                     <tr>
                                       <td><input type="file" name="pict" class="btn btn-primary" ></td>
                                     </tr>
                                   </tbody>
                               </table>
                             </div>
                                <div class="col-sm-3">
                                   <tr>
                                     <td><button type="submit" class="btn btn-primary" name="submit">Submit</button></td>
                                   </tr>
                                 </div>
                           </form>
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

</html>

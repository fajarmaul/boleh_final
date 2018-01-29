<?php

  // $date = date('Y-m-d H:i:s');
  // session_start();
  // echo $_POST['item_name'];
  // echo ' ';
  // echo $_POST['total'];
  // echo ' ';
  // echo $_POST['quantity'];
  // echo ' ';
  // echo $_POST['user_name'];
  // echo ' ';
  // echo $_POST['phone'];
  // echo ' ';
  // echo $_POST['address'];
  // echo ' ';
  // echo $_POST['email'];
  // echo ' ';
  // echo $date;

  session_start();
  include 'dashboard/src/config.php';
  $iditem = $_POST['iditem'];
  $total = $_POST['total'];
  $quantity = $_POST['quantity'];
  $date = date('Y-m-d H:i:s');
  $iduser = $_POST['user'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $sql = "INSERT INTO orders(id_order, order_total, price_total, order_date, id_user, id_item, paid) VALUE('','$quantity','$total', '$date', '$iduser', '$iditem', 0)";
  $quantitylama = $_POST['quantitylama'];
  $quantitybaru = $quantitylama - $quantity;
  if(mysqli_query($conn,$sql)){
    mysqli_query($conn,"UPDATE has_item SET quantity='$quantitybaru' WHERE id_item = '$iditem' ");
  ?>
  <script language="javascript">alert("Order Successful, Please Check My Transaction");</script>
  <script>document.location.href='home.php';</script>
  <?php
  }
  else{
  ?>
  <script language="javascript">alert("Order Failed");</script>
  <script>document.location.href='home.php';</script>
  <?php
  }
  mysqli_close($conn);
  ?>

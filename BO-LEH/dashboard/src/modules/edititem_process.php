<?php
  include "config.php";
  $id = $_POST['id'];
	 // variabel tambahan dari edit.php
	//$pass = $_POST['passmhs'];//gak dipake soalnya password
	$name = $_POST['item_name'];
	$price = $_POST['item_price'];
	$category = $_POST['category'];
  $quantity = $_POST['quantity'];
  $description = $_POST['description'];
  $pict = $_FILES['pict']['name'];
  $temp = $_FILES['pict']['tmp_name'];
  $newpict = date('dmYHis').$pict;
  $path = "../images/".$newpict;
  if(move_uploaded_file($temp, $path)){
    $sql_ganti = "UPDATE items SET item_name = '$name', price ='$price' , type ='$category' , pic = '$newpict' ,description ='$description' WHERE id_item = '$id' ";
    $sql_ganti2 = "UPDATE has_item SET quantity = '$quantity' WHERE id_item = '$id' ";
    mysqli_query($conn,$sql_ganti2);
    if(mysqli_query($conn, $sql_ganti)){
    ?>
   <script language="javascript">alert("Input Successful");</script>
   <script>document.location.href='../table.php';</script>
  <?php
  }else{
    ?>
     <script language="javascript">alert("Input Failed");</script>
     <script>document.location.href='../table.php';</script>
  <?php
    }
  }
  else{
   echo "Sorry, can't upload the picture at the moment";
   echo "<br><a href='../additem.php'>Back to Form</a>";
  }
  mysqli_close($conn);
   ?>

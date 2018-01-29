<?php
include "config.php";

$item_name = $_POST['item_name'];
$category = $_POST['category'];
$price = $_POST['item_price'];
$description = $_POST['description'];
$pict = $_FILES['pict']['name'];
$temp = $_FILES['pict']['tmp_name'];
//renaming the pic into users id prefix
$newpict = date('dmYHis').$pict;
//set the path folder
$path = "../images/".$newpict;
//Uploading Process
if(move_uploaded_file($temp, $path)){
  $sql_create = "INSERT INTO items(id, item_name, price, type, pic, description, location) VALUE('','$item_name','$price', '$category', '$newpict', '$description', '$location')";
  if(mysqli_query($conn, $sql_create)){
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

 ?>

}



 ?>

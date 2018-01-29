<?php
  include "config.php";
	$id = $_POST['id']; // variabel tambahan dari edit.php
	$email = $_POST['email']; // dollar underscore post itu ngambil data dari yang sebelumnya
	//$pass = $_POST['passmhs'];//gak dipake soalnya password
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
  $sql_ganti = "UPDATE users SET name = '$name', address ='$address' , phone ='$phone' , email ='$email' WHERE id_user = '$id'";
  if(mysqli_query($conn,$sql_ganti)){
?>
<script language="javascript">alert("Input Successful");</script>
<script>document.location.href='../seller.php';</script> //untuk nge link
<?php
}
else{
 ?>
 <script language="javascript">alert("Input Failed");</script>
 <script>document.location.href='../seller.php';</script>
<?php
}
mysqli_close($conn);
 ?>

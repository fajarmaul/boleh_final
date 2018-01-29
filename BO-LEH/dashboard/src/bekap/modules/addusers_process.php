<?php
  include "config.php";
  $name = $_POST['seller_name'];
  $email = $_POST['email'];
  $pass = md5($_POST['password']);
  $address = $_POST['seller_address'];
  $type = 1;
  $phone = $_POST['seller_phone'];
  $sql_buat = "INSERT INTO users(id, password, name, address, phone, email,code) VALUE('','$pass','$name','$address','$phone','$email','$type')";
  if(mysqli_query($conn,$sql_buat)){
?>
<script language="javascript">alert("Input Successful");</script>
<script>document.location.href='../usersdata.php';</script> //untuk nge link
<?php
}
else{
 ?>
 <script language="javascript">alert("Input Failed");</script>
 <script>document.location.href='../usersdata.php';</script>
<?php
}
mysqli_close($conn);
 ?>

<?php
  session_start();
  include 'config.php';

  $id_item = $_POST['iditem'];
  $rating  = $_POST['rating'];
  $query = mysqli_query($conn, "INSERT INTO rating(id_item,vote) VALUES('$id_item','$rating')");


  if ($query) {
    ?>
    <script language="javascript">alert("Terimakasih sudah memberi rating");</script>
    <script>document.location.href='../transaction.php';</script>
   <?php
   }else{
     ?>
      <script language="javascript">alert("Kesalahan yg jarang terjadi, coba lagi!");</script>
      <script>document.location.href='../transaction.php';</script>
   <?php
     }
   mysqli_close($conn);
    ?>

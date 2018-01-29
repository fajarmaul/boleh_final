<?php
session_start();
include "dashboard/src/config.php";
  $id = $_SESSION['user'];
  $query = mysqli_query($conn, "SELECT * FROM users WHERE id_user = $id" );
  $result = mysqli_fetch_array($query);
  echo $_SESSION['type'];
  echo ' <br> ';
  echo $_SESSION['name'];
  echo ' <br> ';
  echo $_SESSION['user'];
  echo ' <br> ';

  if (isset($_SESSION['iditem'])) {
    echo $_SESSION['iditem'];
  }
  echo ' <br> ';
  echo $result['userpic'];

 ?>

<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: signin.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: home.php");
 }

 if (isset($_GET['logout'])) {
  unset($_SESSION['user']);
  unset($_SESSION['name']);
  unset($_SESSION['type']);

  session_unset();
  session_destroy();
  header("Location: signin.php");
  exit;
 }

<?php

 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.

 define('DBHOST', 'localhost');
 define('DBUSER', 'root');
 define('DBPASS', '');
 define('DBNAME', 'db_boleh');

 //$conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
 //$dbcon = mysqli_select_db(DBNAME);

$newconn = mysqli_connect("localhost","root","","db_boleh");

 if (!$newconn) {
  die("Connection failed : " . mysqli_error($newconn));
  //die("Connection failed");
 }

 $_SESSION['connect'] = $newconn;

//  if ( !$dbcon ) {
//   die("Database Connection failed : " . mysqli_error());
//   //die("Connection failed");
//  }

<?php
  include "config.php";
  $eror = false;
  $id = $_POST['idorder'];
  $file_type	= array('jpg','jpeg','png','gif','bmp', 'PNG');
  $max_size = 2000000;
	 // variabel tambahan dari edit.php
	//$pass = $_POST['passmhs'];//gak dipake soalnya password
  $pict = $_FILES['pict']['name'];
  $temp = $_FILES['pict']['tmp_name'];
  $file_size	= $_FILES['pict']['size'];

  $explode	= explode('.',$pict);
  $extensi =  $explode[count($explode)-1];

  $newpict = date('dmYHis').$pict;
  $path = "../payment/".$newpict;

  if(!in_array($extensi,$file_type)){
    $eror   = true;
    $pesan = 'Type file yang anda upload tidak sesuai<br />';
  }

  if($file_size > $max_size){
    $eror   = true;
    $pesan = 'Ukuran file melebihi batas maximum<br />';
  }

  if($eror == true){
		echo '<div id="eror">'.$pesan.'</div>';
    echo "<br><a href='../transaction.php'>Back to Form</a>";
	}
  else{

    if(move_uploaded_file($temp, $path)){
      $sql_ganti = "UPDATE orders SET pic = '$newpict' WHERE id_order= '$id' ";
      if(mysqli_query($conn, $sql_ganti)){
        $sql_ganti2 = "UPDATE orders SET paid = 1 WHERE id_order = '$id' ";
        mysqli_query($conn, $sql_ganti2);
      ?>
     <script language="javascript">alert("Input Successful");</script>
     <script>document.location.href='../transaction.php';</script>
    <?php
    }else{
      ?>
      <script language="javascript">alert("Input Failed");</script>
       <script>document.location.href='../transaction.php';</script>
    <?php
      }
    }
    else{
      echo "Sorry, can't upload the picture ";
      echo "<br><a href='../transaction.php'>Back to Form</a>";
    }
  }
  mysqli_close($conn);
   ?>

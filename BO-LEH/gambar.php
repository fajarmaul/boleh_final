<?php
	include "dbconnect.php";

  $sql = "SELECT * FROM items";
	$qry_item = mysqli_query($newconn ,$sql);


?>

<table class="table centered">
<tr>
  <th>Thumbnail</th>
  <th>No</th>
  <th>Nama Item</th>
  <th>Harga</th>
  <th>Deskripsi Item</th>
  <th>Quantity</th>
  <th colspan="2">Menu</th>
</tr>
<?php
$count = 1;
while($items = mysqli_fetch_array($qry_item)){
  echo
  '<tr>
    <td><a target="_blank" href="coba/'.$items['gambar_item'].'">
<img src="coba/'.$items['gambar_item'].'" alt='.$items['nama_item'].'>
</a></td>
    <td>'.$count++.'</td>
    <td>'.$items['nama_item'].'</td>
    <td>'.$items['harga'].'</td>
    <td>';echo nl2br($items['deskripsi_item']);echo'</td>
    <td>'.$items['quantity'].'</td>
  </tr>';
}
?>
</table>

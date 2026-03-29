<?php 
require "../config/koneksi.php"; 
  
$id_paket_audio=$_POST['id_paket_audio'];
$paket_audio=$_POST['paket_audio'];
$biaya=$_POST['biaya'];

$sql2 = "UPDATE paket_audio SET paket_audio = '$paket_audio', biaya = '$biaya' WHERE id_paket_audio = '$id_paket_audio'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Data Berhasil Diubah');
document.location='index.php?p=paket_audio'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Diubah');
document.location='index.php?p=edit_paket_audio&id_paket_audio=<?= $id_paket_audio;?>'</script><?php }
?>
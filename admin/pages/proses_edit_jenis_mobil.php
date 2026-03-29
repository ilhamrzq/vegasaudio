<?php 
require "../config/koneksi.php"; 
  
$id_jenis_mobil=$_POST['id_jenis_mobil'];
$jenis_mobil=$_POST['jenis_mobil'];

$sql2 = "UPDATE jenis_mobil SET jenis_mobil = '$jenis_mobil' WHERE id_jenis_mobil = '$id_jenis_mobil'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Data Berhasil Diubah');
document.location='index.php?p=jenis_mobil'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Diubah');
document.location='index.php?p=edit_jenis_mobil&id_jenis_mobil=<?= $id_jenis_mobil;?>'</script><?php }
?>
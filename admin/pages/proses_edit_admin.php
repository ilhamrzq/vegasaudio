<?php 
require "../config/koneksi.php"; 
  
$id_admin=$_POST['id_admin'];
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$hp=$_POST['hp'];
$username=$_POST['username'];
$password= $_POST['password'];

$sql2 = "UPDATE admin SET nama = '$nama', alamat = '$alamat', hp = '$hp', username = '$username', password = '$password' WHERE id_admin = '$id_admin'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Data Berhasil Diubah');
document.location='index.php?p=admin'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Diubah');
document.location='index.php?p=edit_admin&id_admin=<?= $id_admin;?>'</script><?php }
?>
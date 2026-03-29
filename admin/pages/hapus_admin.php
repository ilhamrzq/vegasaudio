<?php
include "../config/koneksi.php";
$id_admin = $_GET['id_admin'];
$hasil=mysql_query("delete from admin where id_admin='$id_admin'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Dihapus');
document.location='index.php?p=admin'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Dihapus');
document.location='index.php?p=admin'</script><?php }
?>
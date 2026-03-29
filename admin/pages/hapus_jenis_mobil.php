<?php
include "../config/koneksi.php";
$id_jenis_mobil = $_GET['id_jenis_mobil'];
$hasil=mysql_query("delete from jenis_mobil where id_jenis_mobil='$id_jenis_mobil'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Dihapus');
document.location='index.php?p=jenis_mobil'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Dihapus');
document.location='index.php?p=jenis_mobil'</script><?php }
?>
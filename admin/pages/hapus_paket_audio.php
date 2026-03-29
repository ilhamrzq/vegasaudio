<?php
include "../config/koneksi.php";
$id_paket_audio = $_GET['id_paket_audio'];
$hasil=mysql_query("delete from paket_audio where id_paket_audio='$id_paket_audio'");

if ($hasil) {
?>
<script language="JavaScript">
alert('Data Berhasil Dihapus');
document.location='index.php?p=paket_audio'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Gagal Dihapus');
document.location='index.php?p=paket_audio'</script><?php }
?>
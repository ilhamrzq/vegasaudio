<?php 
require "../config/koneksi.php"; 
  
$id_pendaftaran=$_POST['id_pendaftaran'];
$status=$_POST['status'];
$no_nota=$_POST['no_nota'];
$tanggal=$_POST['tanggal'];
$total=$_POST['total'];
$nama_teknisi=$_POST['nama_teknisi'];

 $sql = "INSERT INTO pembayaran  
           ( 
        	id_pembayaran, 
			id_pendaftaran,
			no_nota,
			tanggal,
			total,
			status,
			nama_teknisi
           ) 
 
           VALUES  
           (  
        NULL,
			'$id_pendaftaran', 
			'$no_nota', 
			'$tanggal', 
			'$total',
			'$status',
			'$nama_teknisi'  
            )"; 

$hasil=mysql_query($sql);

$sql2 = "UPDATE pendaftaran SET status = 'Lunas' WHERE id_pendaftaran = '$id_pendaftaran'";

$hasil2=mysql_query($sql2);

//see the result
if ($hasil2) {
?>
<script language="JavaScript">
alert('Pelunasan Berhasil');
document.location='index.php?p=pendaftaran'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Pelunasan Gagal');
document.location='index.php?p=tambah_pembayaran&id_pendaftaran=<?= $id_pendaftaran;?>'</script><?php }
?>
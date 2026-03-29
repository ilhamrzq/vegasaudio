<?php 
require "../config/koneksi.php"; 
  
$jenis_mobil=$_POST['jenis_mobil'];

 $sql = "INSERT INTO jenis_mobil  
           ( 
        id_jenis_mobil, 
			  jenis_mobil
           ) 
 
           VALUES  
           (  
        NULL,
			  '$jenis_mobil'
            )"; 

$hasil=mysql_query($sql);

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data Jenis Mobil Berhasil Ditambahkan');
document.location='index.php?p=jenis_mobil'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Jenis Mobil Gagal Ditambahkan');
document.location='index.php?p=tambah_jenis_mobil'</script><?php }
?>
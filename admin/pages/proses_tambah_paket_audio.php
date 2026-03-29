<?php 
require "../config/koneksi.php"; 
  
$paket_audio=$_POST['paket_audio'];
$biaya=$_POST['biaya'];

 $sql = "INSERT INTO paket_audio  
           ( 
        id_paket_audio, 
			  paket_audio,
			  biaya
           ) 
 
           VALUES  
           (  
        NULL,
			  '$paket_audio', 
			  '$biaya'
            )"; 

$hasil=mysql_query($sql);

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data Paket Audio Berhasil Ditambahkan');
document.location='index.php?p=paket_audio'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Paket Audio Gagal Ditambahkan');
document.location='index.php?p=tambah_paket_audio'</script><?php }
?>
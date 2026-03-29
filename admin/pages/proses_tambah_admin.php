<?php 
require "../config/koneksi.php"; 
  
$nama=$_POST['nama'];
$alamat=$_POST['alamat'];
$hp=$_POST['hp'];
$status='1';
$username=$_POST['username'];
$password= ($_POST['password']);

 $sql = "INSERT INTO admin  
           ( 
        id_admin, 
			  username,
			  password,
        nama,
        alamat,
        hp,
        status
           ) 
 
           VALUES  
           (  
        NULL,
			  '$username', 
        '$password', 
        '$nama', 
        '$alamat', 
        '$hp', 
			  '$status'
            )"; 

$hasil=mysql_query($sql);

//see the result
if ($hasil) {
?>
<script language="JavaScript">
alert('Data Admin Berhasil Ditambahkan');
document.location='index.php?p=admin'</script>
<?php
}else{
?>
<script language="JavaScript">
alert('Data Admin Gagal Ditambahkan');
document.location='index.php?p=tambah_admin'</script><?php }
?>
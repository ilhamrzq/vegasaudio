<?php
include "../config/koneksi.php";//sambung ke mysql

//mengambil nilai dari form
$id_admin = $_GET['id'];
$status=$_GET['status'];
if($status=='1'){
	$ganti_status = '0';
}
elseif($status=='0'){
	$ganti_status = '1';
}

echo "ID: $id_admin, Status: $ganti_status";

$update = mysql_query("UPDATE admin SET status = '$ganti_status' WHERE id_admin = '$id_admin'");

if ($update){
//echo "sukses update data";
?>
<script language="JavaScript">
alert('Status Berhasil Diubah');
document.location='index.php?p=admin'
</script>

<?php
}else{
echo "gagal : ".mysql_error();
}
?>
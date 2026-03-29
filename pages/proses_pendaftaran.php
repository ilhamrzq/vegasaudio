<?php 
require "../config/koneksi.php"; 

$next=$_POST['next'];
$id_customer=$_POST['id_customer'];  
$nama=$_POST['nama'];
$no_hp=$_POST['no_hp'];
$alamat= $_POST['alamat'];
$nomor_plat=$_POST['nomor_plat'];
$jenis_mobil=$_POST['jenis_mobil'];
$tgl_noAntrian=$_POST['tgl_noAntrian'];
$id_paket_audio=$_POST['id_paket_audio'];
$nomor_plat=$_POST['nomor_plat'];
$total_biaya=$_POST['total_biaya'];
$tgl_pendaftaran=$_POST['tgl_pendaftaran'];
date_default_timezone_set('Asia/Jakarta');
// $jam_pendaftaran=date("H:i");
$jam_pendaftaran=$_POST['jam_pendaftaran'];

$cek = mysql_query("SELECT count(id_pendaftaran) as jumlah_daftar FROM pendaftaran WHERE jam_pendaftaran = '$jam_pendaftaran' AND tgl_pendaftaran = '$tgl_pendaftaran'");
$htg = mysql_fetch_array($cek);
$jumlahnya = $htg['jumlah_daftar'];
if($jumlahnya>=2){
    ?>
    <script language="JavaScript">
    alert('Maaf, Slot Sudah Terpenuhi Pada Jam Yang Anda Inginkan. Silahkan Pilih Jam Yang Lainnya');
    document.location='../pendaftaran.php'</script>
    <?php 
}
else{

if ($next<='8') {
    $queryy = "insert into customer(id_customer, nama, no_hp, alamat, nomor_plat, jenis_mobil) values('$id_customer','$nama', '$no_hp', '$alamat', '$nomor_plat', '$jenis_mobil')" ;
    $hasill = mysql_query($queryy);
    $query = "insert into pendaftaran(id_pendaftaran, tgl_noAntrian, id_customer, id_paket_audio, tgl_pendaftaran, jam_pendaftaran, total_biaya, status) values(NULL,'$tgl_noAntrian', '$id_customer', '$id_paket_audio', '$tgl_pendaftaran', '$jam_pendaftaran', '$total_biaya', 'Pendaftaran')" ;
    $hasil = mysql_query($query);
}

if ($hasil) {
    ?>
    <script language="JavaScript">
    alert('Pendaftaran Berhasil Dilakukan. Silahkan Datang Pada Jadwal Yang Anda Tentukan');
    document.location='../laporan/struk.php?id=<?php echo $tgl_noAntrian;?>'</script>
    <?php
}else{
    ?>
    <script language="JavaScript">
    alert('Pendaftaran Gagal Dilakukan');
    document.location='../index.php'</script>
    <?php 
}
}
?>
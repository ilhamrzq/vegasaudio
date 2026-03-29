<?php
include "config/koneksi.php";
?>
<?php
error_reporting(0);
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

     <title>Pendaftaran</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">

     <link rel="shortcut icon" type="image/x-icon" href="images/logo.png">
     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>

          </div>
     </section>


     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Transformasikan Mobil Anda Dengan Audio Menakjubkan!</p>
                    </div>

                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i> 087787093352</span>
                         <span class="date-icon"><i class="fa fa-clock-o"></i> 09:00 - 20:00 (Setiap Hari)</span>
                    </div>

               </div>
          </div>
     </header>

     <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- LOGO HERE -->
                    <p align="left"><img src="images/logo.png" width="145" />
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="index.php" class="smoothScroll">Beranda</a></li>
                         <li><a href="about.php" class="smoothScroll">Tentang Kami</a></li>
                         <li><a href="paketaudio.php" class="smoothScroll">Paket Audio</a></li>
                         <li><a href="#appointment" class="smoothScroll">Pendaftaran</a></li>
                         <li><a href="saran.php" class="smoothScroll">Kritik dan Saran</a></li>
                         <li class="appointment-btn"><a href="login.php">Login Admin</a></li>
                    </ul>
               </div>
          </div>
     </section>

<?php
date_default_timezone_set('Asia/Jakarta');
$tgl_pendaftaran = date("Y-m-d");
$queryy = mysql_query("SELECT tgl_noAntrian FROM pendaftaran WHERE tgl_pendaftaran = '$tgl_pendaftaran'");
$htg = mysql_num_rows($queryy);

$next = $htg + 1;

$tgl_noAntrian = $tgl_pendaftaran . '/' . $next;

// Kondisi jika jadwal sudah penuh
if ($next == 9) {
     $next = 'Tidak Tersedia (Full Booked)'; 
     $disableFunction = true; // Mengatur variabel untuk menonaktifkan fungsi/tombol
} else {
     $disableFunction = false; // Mengatur variabel untuk mengaktifkan fungsi/tombol
}

$hitung = mysql_query("SELECT max(id_customer) as id_terakhir from customer");
$cari = mysql_fetch_array($hitung);
$id_lanjut = $cari['id_terakhir'] + 1;

?>

     <!-- PENDAFTARAN -->
     <section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">
                    <div class="col-md-12 col-sm-12">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="pages/proses_pendaftaran.php">
                              <input type="hidden" class="form-control" id="nama" name="id_customer" value="<?=$id_lanjut;?>">
                              <!-- SECTION TITLE -->
                              <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Pendaftaran</h2>
                                   <h5>Sesi Waktu dibagi menjadi 4 sesi dan Slot Maksimum Tiap Waktu = 2 Pelanggan</h5>
                                   <h5>Perlu diperhatikan bahwa tanggal pendaftaran otomatis dan tidak dapat diubah. Jika slot pada tiap sesi waktu sudah terpenuhi, status nomor antrian akan berubah menjadi <b>Tidak Tersedia</b>. Silahkan daftar kembali di hari berikutnya, Terima kasih.</h5>                                  
                              </div>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-6 col-sm-6">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anda" required="" autocomplete="off" <?php if ($disableFunction) echo 'disabled'; ?>>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="no_hp">No. Handphone</label>
                                        <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="No. Handphone Anda" required="" autocomplete="off" <?php if ($disableFunction) echo 'disabled'; ?>>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Anda" required="" autocomplete="off" <?php if ($disableFunction) echo 'disabled'; ?>>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="nomor_plat">No. Plat</label>
                                        <input type="text" class="form-control" id="nomor_plat" name="nomor_plat" placeholder="No. Plat Kendaraan Anda" required="" autocomplete="off" <?php if ($disableFunction) echo 'disabled'; ?>>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Jenis Mobil</label>
                                        <?php
$result2 = mysql_query("SELECT * FROM jenis_mobil");
echo '<select name="jenis_mobil" class="form-control-rounded form-control" required autocomplete="off">';
echo '<option value="" disabled selected>Pilih Jenis Mobil</option>'; // Menambahkan opsi default yang tidak dapat dipilih
while ($row2 = mysql_fetch_array($result2)) {
    echo '<option value="' . $row2['jenis_mobil'] . '">' . $row2['jenis_mobil'] . '</option>';
}
echo '</select>';
?>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="tgl_noAntrian">Nomor Antrian</label>
                                        <input type="text" class="form-control-rounded form-control" value="<?php echo $next; ?>" required="" readonly name="next">
                                            <input type="hidden" name="tgl_noAntrian" class="form-control-rounded form-control" value="<?php echo $tgl_noAntrian; ?>" required="" readonly>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="select">Paket Audio</label>
                                        <?php
$result = mysql_query("SELECT * FROM paket_audio");
$jsArray = "var prdName = new Array();\n";
echo '<select class="form-control" name="id_paket_audio" required autocomplete="off" onchange="document.getElementById(\'txt2\').value = prdName[this.value]">';
echo '<option value="" disabled selected>Pilih Paket Audio</option>'; // Menambahkan opsi default yang tidak dapat dipilih
while ($row = mysql_fetch_array($result)) {
    echo '<option value="' . $row['id_paket_audio'] . '">' . $row['paket_audio'] . '</option>';
    $jsArray .= "prdName['" . $row['id_paket_audio'] . "'] = '" . addslashes($row['biaya']) . "';\n";
}
echo '</select>';

?>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="tgl_pendaftaran">Tanggal Pendaftaran</label>
                                        <input type="date" class="form-control" id="tgl_pendaftaran" name="tgl_pendaftaran" value="<?=$tgl_pendaftaran;?>" min="<?=$tgl_pendaftaran;?>" readonly>				
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                        <label for="jam_pendaftaran">Jam Pendaftaran</label>
                                        <select name="jam_pendaftaran" class="form-control" id="jam_pendaftaran" required="" autocomplete="off">
                                        <option value="" disabled selected>Pilih Jam Pendaftaran</option>
                                        <?php
                                        $start_time = strtotime("09:00:00");
                                        $end_time = strtotime("20:00:00");
                                        $interval = 3 * 60 * 60; // Interval waktu per 3 jam (dalam detik)
                                
                                        while ($start_time <= $end_time) {
                                            $jam = date("H:i", $start_time);
                                
                                            // Tambahkan interval khusus pada jam istirahat (12:00 - 12:30)
                                            if ($jam === '12:00') {
                                                $jam1 = date("H:i", strtotime("+30 minutes", $start_time));
                                                // Jam Tidak Ditampilkan
                                                $start_time = strtotime("12:30");
                                            }
                                            // Tambahkan interval khusus pada jam 15:30
                                            elseif ($jam === '15:30') {
                                                $jam1 = date("H:i", strtotime("+2 hours 30 minutes", $start_time));
                                                echo "<option value='$jam'>$jam - $jam1</option>";
                                                $start_time += $interval;
                                            }
                                            // Tambahkan interval khusus pada jam 18:30
                                            elseif ($jam === '18:30') {
                                                echo "<option value='$jam'>$jam - Selesai</option>";
                                                $start_time += $interval;
                                            }
                                            // Interval waktu normal
                                            else {
                                                $jam1 = date("H:i", $start_time + $interval);
                                                echo "<option value='$jam'>$jam - $jam1</option>";
                                                $start_time += $interval;
                                            }
                                        }
                                        ?>
                                        </select>
                                   </div>
                                   <input type="hidden" name="total_biaya" id="txt2" class="form-control" readonly=""/>
                                   <script type="text/javascript">
                                   <?php echo $jsArray; ?>
                                   </script>

                                   <div class="col-md-12 col-sm-12">
                                   <button type="submit" class="form-control" id="cf-submit" name="submit" <?php if ($disableFunction) echo 'disabled'; ?>>Daftar Sekarang</button>
                                   </div>
                              </div>
                        </form>
                    </div>

               </div>
          </div>
     </section>

     <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb">
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Informasi Lanjut</h4>
                              <p>Untuk mengetahui informasi lebih lanjut, silahkan hubungi kontak berikut.</p>

                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i> 087787093352</p>
                                   <p><i class="fa fa-instagram"></i> <a href="https://www.instagram.com/vegas.audio/" target="blank">vegas.audio</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4">
                         &nbsp;
                    </div>

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Waktu Operasional</h4>
                                   <p>Senin - Minggu <span>09:00 - 20:00</span></p>
                                   <br>
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Alamat</h4>
                                   <p>Jl. KSR Dadi Kusmayadi No.45, RT.05/RW.07, Kel. Tengah, Kec. Cibinong, Kabupaten Bogor, Jawa Barat, 16914.</span></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-11 col-sm-12 border-top">
                         <div class="col-md-5 col-sm-5">
                         </div>

                         <div class="col-md-2 col-sm-2 text-align-right">
                              <div class="angle-up-btn">
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </footer>

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>
     
</body>
</html>

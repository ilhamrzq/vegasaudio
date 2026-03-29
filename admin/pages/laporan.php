<?php 
error_reporting(0);
?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-8">
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Laporan</strong>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="table-responsive">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    <input type="date" name="tgl_awal" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="date" name="tgl_akhir" class="form-control">
                                                </td>

                                                <td width="15%">
                                                    <button type="submit" class="btn btn-warning">Lihat Data</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                        </form>
<br>
<?php
$tgl_awal = $_POST['tgl_awal'];
  $tgl_akhir = $_POST['tgl_akhir'];
?>
<a href="pages/laporan_pembayaran.php?tgl_awal=<?= $tgl_awal;?>&tgl_akhir=<?= $tgl_akhir;?>" target="blank"><button type="submit" class="btn btn-success"><i class="fa fa-print"> &nbsp; Cetak Laporan PDF</i></button></a>
<br>
<br>
<p align="center">Data Tanggal <?= $tgl_awal;?> Sampai <?= $tgl_akhir;?></p>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
<?php
  include ("../config/koneksi.php");
  
  $sqll = "select * from pembayaran join pendaftaran using (id_pendaftaran) join paket_audio using(id_paket_audio) join customer where pendaftaran.id_customer=customer.id_customer and tanggal between STR_TO_DATE('$tgl_awal', '%Y-%m-%d') AND STR_TO_DATE('$tgl_akhir', '%Y-%m-%d') order by id_pembayaran desc";
  $resultt = mysql_query($sqll);
    if(mysql_num_rows($resultt) > 0){
?>                                            
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Antrian</th>
                                            <th>Jam</th>
                                            <th>Nama</th>
                                            <th>No. Plat</th>
                                            <th>Paket Audio</th>
                                            <th>Total Biaya</th>
                                            <th width="30%">Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php
  $nomor=1;
  while($data = mysql_fetch_array($resultt)){
?>                                          
                                        <tr>
                                            <td><?= $nomor++;?></td>
                                            <td><?= $data['tgl_noAntrian'];?></td>
                                            <td><?= $data['jam_pendaftaran'];?></td>
                                            <td><?= $data['nama'];?></td>
                                            <td><?= $data['nomor_plat'];?></td>
                                            <td><?= $data['paket_audio'];?></td>
                                            <td><?= $data['total_biaya'];?></td>
                                            <td>
                                                <form action="index.php?p=ganti_status" method="POST">
                                                    <input type="hidden" name="id_pendaftaran" value="<?php echo $data['id_pendaftaran'];?>">
                                                     <?php
                                                        if($data['status']=='Lunas'){
                                                    ?>
                                                    Lunas
                                                <?php } else { ?>
                                                <?php } ?>
                                                </form>
                                            </td>
                                            <td align="center">
                                                <?php
                                                        if($data['status']!='Lunas'){
                                                    ?>
                                                <?php }else{ ?>

                                                    LUNAS
                                                <?php } ?>
                                            </td>
                                        </tr>
<?php
  }
?>
              </tbody>
            </table>
<?php
  }else{
    echo 'Data not found!';
    echo mysql_error();
  }
?>            
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
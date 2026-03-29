<?php
  include("../config/koneksi.php");  
  ?>
  <?php
$id_pendaftaran = $_GET['id_pendaftaran']; //get the no which will updated

$queryy = mysql_query("SELECT * FROM pendaftaran join customer using(id_customer) join paket_audio using (id_paket_audio) WHERE id_pendaftaran = '$id_pendaftaran'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

$id_admin = $_SESSION['id_admin']; 
?>

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Konfirmasi Pembayaran</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Konfirmasi Pembayaran</a></li>
                                    <li class="active"><a href="#">Data Pembayaran</a></li>
                                </ol>
                            </div>
                        </div>
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
                                <strong class="card-title">Data Pembayaran</strong>
                            </div>
                            <div class="card-body">
         
<form action="index.php?p=proses_pembayaran" method="post" enctype="multipart/form-data" class="form-horizontal">
    <input type="hidden" id="text-input" name="id_pendaftaran" class="form-control" value="<?= $dt['id_pendaftaran'];?>">
    <input type="hidden" id="text-input" name="id_admin" class="form-control" value="<?= $id_admin;?>">
    <input type="hidden" id="text-input" name="status" class="form-control" value="Lunas">

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">No. Antrian</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="tgl_noAntrian" placeholder="Text" class="form-control" value="<?= $dt['tgl_noAntrian'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nama Customer</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="nama" placeholder="Text" class="form-control" value="<?= $dt['nama'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">No. Plat</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="nomor_plat" placeholder="Text" class="form-control" value="<?= $dt['nomor_plat'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Mobil</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="jenis_mobil" placeholder="Text" class="form-control" value="<?= $dt['jenis_mobil'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Paket Audio</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="paket_audio" placeholder="Text" class="form-control" value="<?= $dt['paket_audio'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">No. Nota</label></div>
                                        <div class="col-12 col-md-9">
                                            <?php

                                            $sql = mysql_query("SELECT no_nota FROM pembayaran");
                                                echo '<input type="text" class="form-control" id="no_nota" value="';

                                            $no_nota = "V001";
                                            if(mysql_num_rows($sql) == 0){
                                                echo $no_nota;
                                            }

                                            $result = mysql_num_rows($sql);
                                            $counter = 0;
                                            while(list($no_nota) = mysql_fetch_array($sql)){
                                                if (++$counter == $result) {
                                                    $no_nota++;
                                                    echo $no_nota;
                                                }
                                            }
                                                echo '"name="no_nota" placeholder="No. Nota" readonly>';

                                        ?>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Tanggal Pembayaran</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="date" id="email-input" name="tanggal" value="<?= date("Y-m-d");?>" class="form-control" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Total Biaya</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="total" id="txt2" class="form-control" value="<?= $dt['total_biaya'];?>" readonly>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Penanggung Jawab Instalasi</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" name="nama_teknisi" class="form-control" required="">
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-success" onclick="return confirm('Apakah Anda yakin telah lunas?')">Lunas</button>
                                </form>


                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
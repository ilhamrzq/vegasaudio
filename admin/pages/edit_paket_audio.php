<?php
  include("../config/koneksi.php");  
  ?>
  <?php
$id_paket_audio = $_GET['id_paket_audio']; //get the no which will updated

$queryy = mysql_query("SELECT * FROM paket_audio WHERE id_paket_audio = '$id_paket_audio'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Paket Audio</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Paket Audio</a></li>
                                    <li class="active"><a href="#">Edit Data Paket Audio</a></li>
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
                                <strong class="card-title">Edit Data Paket Audio</strong>
                            </div>
                            <div class="card-body">
         
<form action="index.php?p=proses_edit_paket_audio" method="post" enctype="multipart/form-data" class="form-horizontal">
     <input type="hidden" id="text-input" name="id_paket_audio" value="<?=$dt['id_paket_audio'];?>" class="form-control" required="">

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Paket Audio</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="paket_audio" class="form-control" value="<?=$dt['paket_audio'];?>" required="">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Biaya</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="number" id="text-input" name="biaya" class="form-control" value="<?=$dt['biaya'];?>" required="">
                                        </div>
                                    </div>
                                
                                    
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </form>


                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
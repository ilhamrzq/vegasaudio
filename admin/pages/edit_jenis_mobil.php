<?php
  include("../config/koneksi.php");  
  ?>
  <?php
$id_jenis_mobil = $_GET['id_jenis_mobil']; //get the no which will updated

$queryy = mysql_query("SELECT * FROM jenis_mobil WHERE id_jenis_mobil = '$id_jenis_mobil'"); //get the data that will be updated
$dt=mysql_fetch_array($queryy);

?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Jenis Mobil</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Jenis Mobil</a></li>
                                    <li class="active"><a href="#">Edit Data Jenis Mobil</a></li>
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
                                <strong class="card-title">Edit Data Jenis Mobil</strong>
                            </div>
                            <div class="card-body">
         
<form action="index.php?p=proses_edit_jenis_mobil" method="post" enctype="multipart/form-data" class="form-horizontal">
<input type="hidden" id="text-input" name="id_jenis_mobil" class="form-control" required="" value="<?=$dt['id_jenis_mobil'];?>">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Jenis Mobil</label></div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="jenis_mobil" class="form-control" required="" value="<?=$dt['jenis_mobil'];?>">
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
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
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
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
<?php
  include ("../config/koneksi.php");
  $sqll = "Select * from pembayaran join pendaftaran using (id_pendaftaran) join customer where pendaftaran.id_customer = customer.id_customer order by id_pembayaran desc";
  $resultt = mysql_query($sqll);
    if(mysql_num_rows($resultt) > 0){
?>                                            
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Antrian</th>
                                            <th>No. Nota</th>
                                            <th>Nama</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Penanggung Jawab Instalasi</th>
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
                                            <td><?= $data['no_nota'];?></td>
                                            <td><?= $data['nama'];?></td>
                                            <td><?= $data['total'];?></td>
                                            <td><?= $data['status'];?></td>
                                            <td><?= $data['nama_teknisi'];?></td>
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
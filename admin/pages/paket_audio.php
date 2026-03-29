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
                                <strong class="card-title">Data Paket Audio</strong>
                            </div>
                            <div class="card-body">
                                <a href="index.php?p=tambah_paket_audio" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" color="white"><u>Tambah Data</u></font></a></div><br>

                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
<?php
  include ("../config/koneksi.php");
  $sqll = "select * from paket_audio order by id_paket_audio desc";
  $resultt = mysql_query($sqll);
    if(mysql_num_rows($resultt) > 0){
?>                                            
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Paket Audio</th>
                                            <th>Biaya</th>
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
                                            <td><?= $data['paket_audio'];?></td>
                                            <td><?= $data['biaya'];?></td>
                                            
                                            <td align="center">
                                                <a href="index.php?p=edit_paket_audio&id_paket_audio=<?php echo $data['id_paket_audio']; ?>" class="btn btn-warning mb-3"> <i class="fa fa-fw fa-pencil" style="color: white"></i> <font color="white">Edit</font></a>
                                            </td>
                                            <td align="center">
                                                <a href="index.php?p=hapus_paket_audio&id_paket_audio=<?php echo $data['id_paket_audio']; ?>" onClick="return confirm('Apakah Anda Yakin Hapus Data?')" class="btn btn-danger mb-3"> <i class="fa fa-fw fa-trash" style="color: white"></i> <font color="white">Hapus</font></a>
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
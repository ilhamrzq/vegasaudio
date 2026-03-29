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
                                <strong class="card-title">Data Admin</strong>
                            </div>
                            <div class="card-body">
                                <a href="index.php?p=tambah_admin" class="btn btn-success mb-3"><i class="fa fa-plus" style="color: white"></i> <font size="3" color="white"><u>Tambah Data</u></font></a></div><br>

                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
<?php
  include ("../config/koneksi.php");
  $sqll = "select * from admin order by id_admin desc";
  $resultt = mysql_query($sqll);
    if(mysql_num_rows($resultt) > 0){
?>                                            
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Alamat</th>
                                            <th>No. HP</th>
                                            <th>Status</th>
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
                                            <td><?= $data['nama'];?></td>
                                            <td><?= $data['username'];?></td>
                                            <td><?= $data['alamat'];?></td>
                                            <td><?= $data['hp'];?></td>
                                            <td align="center">
                                            <?php if($data['status']=='1'){ ?>
                                              <a href="index.php?p=ganti_status_admin&id=<?php echo $data['id_admin'];?>&status=<?php echo $data['status'];?>" onClick="return confirm('Apakah Anda Yakin Menonaktifkan admin Ini?')" class="btn btn-success mb-3" style="width: 100px"> <font color="white"> Aktif</font></a>
                                            <?php } elseif($data['status']=='0') { ?>
                                              <a href="index.php?p=ganti_status_admin&id=<?php echo $data['id_admin'];?>&status=<?php echo $data['status'];?>" onClick="return confirm('Apakah Anda Yakin Mengaktifkan admin Ini?')" class="btn btn-danger mb-3" style="width: 100px"> <font color="white">Nonaktif</font></a>
                                            <?php } ?>
                                          </td>
                                            
                                            <td align="center">
                                                <a href="index.php?p=edit_admin&id_admin=<?php echo $data['id_admin']; ?>" class="btn btn-warning mb-3"> <i class="fa fa-fw fa-pencil" style="color: white"></i> <font color="white">Edit</font></a>
                                            </td>
                                            <td align="center">
                                                <a href="index.php?p=hapus_admin&id_admin=<?php echo $data['id_admin']; ?>" onClick="return confirm('Apakah Anda Yakin Hapus Data?')" class="btn btn-danger mb-3"> <i class="fa fa-fw fa-trash" style="color: white"></i> <font color="white">Hapus</font></a>
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
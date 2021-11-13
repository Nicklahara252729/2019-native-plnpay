<?php 
session_start();
include('../library/utama.php');
//panggil class
$call  = new database();
$call->koneksi();
if($_SESSION['status']!=TRUE){
            header("location:login.php");
        }
//show data
$data    = $call->tampil_pelanggan();
//show level
$level    = $call->tampil_tarif();

//delete data
if(isset($_GET['key'])){
$key   =$_GET['key'];
$hapus =$call->hapus_pelanggan($key);
}

//simpan data
if(isset($_POST['id_pelanggan'])){
        $simpan_data =$call->insert_pelanggan($_POST['id_pelanggan'],$_POST['no_meter'],$_POST['nama'],$_POST['alamat'],$_POST['tarif']);
}

//simpan data
if(isset($_POST['id_pelangganedit'])){
        $simpan_data =$call->update_pelanggan($_GET['keyedit'],$_POST['id_pelangganedit'],$_POST['no_meteredit'],$_POST['namaedit'],$_POST['alamatedit'],$_POST['tarifedit']);
}

include('../theme/admin/start_theme.php');
include('../theme/admin/header.php');
include('../theme/admin/menu.php');
?>
<div class="content-body">
        <div class="container">
        	<?php if(isset($_GET['keyedit'])){ ?> 
        	<div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="post" target="_self">
                         <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="ID Pelanggan" required name="id_pelangganedit" value="<?php echo $call->baca_pelanggan("id_pelanggan",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Nomor Meter" required name="no_meteredit" value="<?php echo $call->baca_pelanggan("nomor_kwh",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Nama Pelanggan" required name="namaedit" value="<?php echo $call->baca_pelanggan("nama_pelanggan",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Alamat" required name="alamatedit" value="<?php echo $call->baca_pelanggan("alamat",$_GET['keyedit']); ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <select name="tarifedit" id="level" class="form-control">
                                                                <?php foreach($level as $shows){ ?>
                                                                    <option value="<?php echo $shows['id_tarif']; ?>" <?php if($call->baca_petugas("id_tarif",$_GET['keyedit']) == $shows['id_tarif']){echo"selected";} ?> > <?php echo $shows['kodetarif']; ?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
            			</div>
                      </div>
                    </div>
                </div>
              <?php } ?>

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#creat-event">Tambah data
                      <i class="mdi mdi-play-circle ml-1"></i>
                    </button>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                                                    <th>ID Pelanggan</th>
                                                    <th>Nomor Meter</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Alamat</th>
                                                    <th>Tarif</th>
                                                    <th>Tool</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $number=1; 
                                                foreach($data as $row){ ?>
                                                <tr>
                                                    <td align="center"><?php echo $number; ?></td>
                                                    <td><?php echo $row['id_pelanggan']; ?></td>
                                                    <td><?php echo $row['nomor_kwh']; ?></td>
                                                    <td><?php echo $row['nama_pelanggan']; ?></td>
                                                    <td><?php echo $row['alamat']; ?></td>
                                                    <td><?php echo $row['kodetarif']; ?></td>
                                                    <td>
                                                        <a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="pelanggan.php?key=<?php echo $row['id']; ?>"><i class="fa fa-trash"></i></a>
                                                        <a class="btn btn-warning" href="pelanggan.php?keyedit=<?php echo $row['id']; ?>"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /# content body -->

    <!-- Modal -->
    <div class="modal fade creat-event" id="creat-event">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>TAMBAH DATA</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="" action="" method="post" target="_self">
                        <div class="modal-body">
                          <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="ID Pelanggan" required name="id_pelanggan">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Nomor Meter" required name="no_meter">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Nama Pelanggan" required name="nama">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Alamat" required name="alamat">
                                                        </div>
                                                        <div class="form-group">
                                                            <select name="tarif" id="tarif" class="form-control">
                                                                <?php foreach($level as $show){ ?>
                                                                    <option value="<?php echo $show['id_tarif']; ?>"><?php echo $show['kodetarif']; ?></option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-success">Submit</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
<?php 
include('../theme/admin/footer.php');
include('../theme/admin/end_theme.php');
?>
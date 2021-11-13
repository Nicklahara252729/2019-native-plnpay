<?php 
session_start();
error_reporting(0);
include('../library/utama.php');
//panggil class
$call  = new database();
$call->koneksi();
if($_SESSION['status']!=TRUE){
            header("location:login.php");
        }
//show data
$data    = $call->tampil_penggunaan();

//delete data
if(isset($_GET['key'])){
$key   =$_GET['key'];
$hapus =$call->hapus_penggunaan($key);
}

//simpan data
if(isset($_POST['id_pelanggan'])){
        $simpan_data =$call->insert_penggunaan($_POST['id_pelanggan'],$_POST['bulan'],$_POST['tahun'],$_POST['meter_awal']);
}

//simpan data
if(isset($_POST['id_pelangganedit'])){
        $simpan_data =$call->update_penggunaan($_GET['keyedit'],$_POST['id_pelangganedit'],$_POST['bulanedit'],$_POST['tahunedit'],$_POST['meter_awaledit']);
}
include('../theme/admin/start_theme.php');
?>
<div class="content-wrapper">
	<?php if(isset($_GET['keyedit'])){ ?> 
		<div class="card">
            <div class="card-body">              
            	<h4 class="card-title">Edit data</h4>
              <div class="row">
                <div class="col-12">
                  <form class="forms-sample" method="post" target="_self">
                        <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="ID Pelanggan" required name="id_pelangganedit" value="<?php echo $call->baca_penggunaan("id_pelanggan",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="bulan" required name="bulanedit" value="<?php echo $call->baca_penggunaan("bulan",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="tahun" required name="tahunedit" value="<?php echo $call->baca_penggunaan("tahun",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Meter awal" required name="meter_awaledit" value="<?php echo $call->baca_penggunaan("meter_awal",$_GET['keyedit']); ?>">
                                                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                </div>
              </div>
            </div>
          </div>
<?php } ?>

          <div class="card">
            <div class="card-body">              
            	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">Tambah Data<i class="icon-control-play ml-1"></i></button>
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                          <th>No</th>
                                                    <th>ID Pelanggan</th>
                                                    <th>Nama pelanggan</th>
                                                    <th>Bulan</th>
                                                    <th>Tahun </th>
                                                    <th>Meter Awal</th>
                                                    <th>Meter Akhir</th>
                                                    <th>Tool</th>
                      </tr>
                    </thead>
                    <tbody>
                    	<?php $number=1; 
                                                foreach($data as $row){ ?>
                                                <tr>
                                                    <td align="center"><?php echo $number; ?></td>
                                                    <td><?php echo $row['id_pelanggan']; ?></td>
                                                    <td><?php echo $row['nama_pelanggan']; ?></td>
                                                    <td><?php echo $row['bulan']; ?></td>
                                                    <td><?php echo $row['tahun']; ?></td>
                                                    <td><?php echo $row['meter_awal']; ?></td>
                                                    <td><?php echo $row['meter_akhir']; ?></td>
                                                    <td>
                                                        <a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="penggunaan.php?key=<?php echo $row['id_penggunaan']; ?>"><i class="icon-trash"></i></a>
                                                        <a class="btn btn-warning" href="penggunaan.php?keyedit=<?php echo $row['id_penggunaan']; ?>"><i class="icon-pencil"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $number++; } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

<!-- Modal starts -->
                  <div class="text-center">
                  </div>
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
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
                                                            <input type="text" id="position-input" class="form-control" placeholder="bulan" required name="bulan" value="<?php echo date('M'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="tahun" required name="tahun" value="<?php echo date('Y'); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Meter awal" required name="meter_awal">
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
                  <!-- Modal Ends -->

</div>
<?php 
include('../theme/admin/end_theme.php');
?>
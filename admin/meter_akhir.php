<?php 
session_start();
if($_SESSION['status']!=TRUE){
            header("location:login.php");
        }
include('../library/utama.php');
include('../theme/admin/start_theme.php');

// panggil class
$call  = new database();
$call->koneksi();

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
        $simpan_data =$call->update_meter_akhir($_GET['keyedit'],$_POST['id_pelangganedit'],$_POST['bulanedit'],$_POST['tahunedit'],$_POST['meter_awaledit'],$_POST['meter_akhir']);
}
?>
<div class="content-wrapper">
	<?php if(isset($_GET['keyedit'])){ ?> 
		  <div class="card">
            <div class="card-body">
              <h4 class="card-title">Edit meter akhir</h4>
              <div class="row">
                
                <div class="col-12">
                  <form class="forms-sample" method="post" target="_self">
                        <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="ID Pelanggan" required name="id_pelangganedit" value="<?php echo $call->baca_penggunaan("id_pelanggan",$_GET['keyedit']); ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="bulan" required name="bulanedit" value="<?php echo $call->baca_penggunaan("bulan",$_GET['keyedit']); ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="tahun" required name="tahunedit" value="<?php echo $call->baca_penggunaan("tahun",$_GET['keyedit']); ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Meter awal" required name="meter_awaledit" value="<?php echo $call->baca_penggunaan("meter_awal",$_GET['keyedit']); ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Meter akhir" required name="meter_akhir" >
                                                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
                      </form>
                </div>
            </div>
          </div>
      <?php } ?>

          <div class="card">
            <div class="card-body">
              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
                    <thead>
                      <tr>
                        <th>No</th>
                                                    <th>ID Pelanggan</th>
                                                    <th>Nama pelanggan</th>
                                                    <th>Bulan </th>
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
                                                        
                                                        <a class="btn btn-success" href="meter_akhir.php?keyedit=<?php echo $row['id_penggunaan']; ?>"><i class="icon-plus"></i></a>
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
<?php 
include('../theme/admin/navbar_tiga.php');
include('../theme/admin/end_theme.php');
?>
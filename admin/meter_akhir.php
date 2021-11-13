<?php 
session_start();
if($_SESSION['status']!=TRUE){
            header("location:login.php");
        }
include('../library/utama.php');
include('../theme/admin/start_theme.php');
include('../theme/admin/navbar_satu.php');
include('../theme/admin/navbar_dua.php');
include('../theme/admin/search.php');

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
<main class="page-content content-wrap">
            <?php 
            include('../theme/admin/navigation.php');
            include('../theme/admin/menu.php');
            ?>
            <div class="page-inner">
              <?php include('../theme/admin/page_title.php');?>  
                <div id="main-wrapper">
                    <?php if(isset($_GET['keyedit'])){ ?> 
                    <div class="row">
                        <div class="col-md-12">
                            <form id="" action="" method="post" target="_self">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="modal-title" id="myModalLabel">Edit penggunaan</h4>
                                                </div>
                                                <div class="modal-body">
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
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-default" href="meter_akhir.php">Cancel</a>
                                                    <button type="submit" id="add-row" class="btn btn-success">Simpan perubahan</button>
                                                </div>
                                            </div>
                                        
                                    </form>
                        
                    </div>
                <?php } ?>
                                <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Penggunaan</h4>
                                </div>
                                <div class="panel-body">

                                    <div class="table-responsive">
                                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
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
                                            <tfoot>
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
                                            </tfoot>
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
                                                        
                                                        <a class="btn btn-success" href="meter_akhir.php?keyedit=<?php echo $row['id_penggunaan']; ?>"><i class="fa fa-plus"></i></a>
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
                </div><!-- Main Wrapper -->
                <?php include('../theme/admin/footer.php');?>
            </div><!-- Page Inner -->
</main><!-- Page Content -->
<?php 
include('../theme/admin/navbar_tiga.php');
include('../theme/admin/end_theme.php');
?>

            
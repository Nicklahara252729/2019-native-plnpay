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
                                                    <h4 class="modal-title" id="myModalLabel">Edit pelanggan</h4>
                                                </div>
                                                <div class="modal-body">
                                                        
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
                                                </div>
                                                <div class="modal-footer">
                                                    <a type="button" class="btn btn-default" href="pelanggan.php">Cancel</a>
                                                    <button type="submit" id="add-row" class="btn btn-success">Simpan perubahan</button>
                                                </div>
                                            </div>
                                        
                                    </form>
                        </div>
                    </div>
                <?php } ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Petugas</h4>
                                </div>
                                <div class="panel-body">
                                    <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Tambah Pelanggan</button>
                                    <!-- Modal -->
                                    <form id="" action="" method="post" target="_self">
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Tambah pelanggan</h4>
                                                </div>
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
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" id="add-row" class="btn btn-success">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>

                                    <div class="table-responsive">
                                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
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
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID Pelanggan</th>
                                                    <th>Nomor Meter</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Alamat</th>
                                                    <th>Tarif</th>
                                                    <th>Tool</th>
                                                </tr>
                                            </tfoot>
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
                </div><!-- Main Wrapper -->
                <?php include('../theme/admin/footer.php');?>
            </div><!-- Page Inner -->
</main><!-- Page Content -->
<?php 
include('../theme/admin/navbar_tiga.php');
include('../theme/admin/end_theme.php');
?>

        
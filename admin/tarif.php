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
$data    = $call->tampil_tarif();

//delete data
if(isset($_GET['key'])){
$key   =$_GET['key'];
$hapus =$call->hapus_tarif($key);
}

//simpan data
if(isset($_POST['kodetarif'])){
        $simpan_data =$call->insert_tarif($_POST['kodetarif'],$_POST['daya'],$_POST['tarifperkwh'],$_POST['adminbank'],$_POST['kategori']);
}

//simpan data
if(isset($_POST['kodetarifedit'])){
        $simpan_data =$call->update_tarif($_GET['keyedit'],$_POST['kodetarifedit'],$_POST['dayaedit'],$_POST['tarifperkwhedit'],$_POST['adminbankedit'],$_POST['kategoriedit']);
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
                            <form class="forms-sample" method="post" target="_self">
                        <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="kodetarif" required name="kodetarifedit" value="<?php echo $call->baca_tarif("kodetarif",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="daya " required name="dayaedit" value="<?php echo $call->baca_tarif("daya",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="tarifperkwh " required name="tarifperkwhedit" value="<?php echo $call->baca_tarif("tarifperkwh",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="adminbank " required name="adminbankedit" value="<?php echo $call->baca_tarif("adminbank",$_GET['keyedit']); ?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="kategori" required name="kategoriedit" value="<?php echo $call->baca_tarif("kategori",$_GET['keyedit']); ?>">
                                                        </div>
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                        <button class="btn btn-light">Cancel</button>
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
                                    <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Tambah Tarif</button>
                                    <!-- Modal -->
                                    <form id="" action="" method="post" target="_self">
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Tambah tarif</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="kodetarif" required name="kodetarif">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="daya " required name="daya">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="tarifperkwh " required name="tarifperkwh">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="adminbank " required name="adminbank">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="kategori" required name="kategori">
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
                                                    <th>Kode tarif</th>
                                                    <th>Daya</th>
                                                    <th>Tarif per Kwh</th>
                                                    <th>Admin bank</th>
                                                    <th>Kategori</th>
                                                    <th>Tool</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode tarif</th>
                                                    <th>Daya</th>
                                                    <th>Tarif per Kwh</th>
                                                    <th>Admin bank</th>
                                                    <th>Kategori</th>
                                                    <th>Tool</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $number=1; 
                                                foreach($data as $row){ ?>
                                                <tr>
                                                    <td align="center"><?php echo $number; ?></td>
                                                    <td><?php echo $row['kodetarif']; ?></td>
                                                    <td><?php echo $row['daya']; ?></td>
                                                    <td><?php echo $row['tarifperkwh']; ?></td>
                                                    <td><?php echo $row['adminbank']; ?></td>
                                                    <td><?php echo $row['kategori']; ?></td>
                                                    <td>
                                                        <a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="tarif.php?key=<?php echo $row['id_tarif']; ?>"><i class="fa fa-trash"></i></a>
                                                        <a class="btn btn-warning" href="tarif.php?keyedit=<?php echo $row['id_tarif']; ?>"><i class="fa fa-pencil"></i></a>
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

        
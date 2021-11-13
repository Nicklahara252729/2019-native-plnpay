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
                                                    <th>Kode tarif</th>
                                                    <th>Daya</th>
                                                    <th>Tarif per Kwh</th>
                                                    <th>Admin bank</th>
                                                    <th>Kategori</th>
                                                    <th>Tool</th>
                      </tr>
                    </thead>
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
                                                        <a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="tarif.php?key=<?php echo $row['id_tarif']; ?>"><i class="fa fa fa-trash"></i></a>
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
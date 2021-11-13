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
include('../theme/admin/menu.php');
include('../theme/admin/sidebar.php');
include('../theme/admin/right_menu.php');
?>
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>Tarif</h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">home</a></li>
                        <li class="breadcrumb-item active">tarif</li>
                    </ul>
                </div>            
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="input-group mb-0">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if(isset($_GET['keyedit'])){ ?> 
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    </div>
                    <div class="body">
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
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                    	<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#defaultModal">Tambah data
                      <i class="mdi mdi-play-circle ml-1"></i>
                    </button>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                                        <a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="tarif.php?key=<?php echo $row['id_tarif']; ?>">Hapus</a>
                                                        <a class="btn btn-warning" href="tarif.php?keyedit=<?php echo $row['id_tarif']; ?>">Edit</a>
                                                    </td>
                                                </tr>
                                                <?php $number++; } ?>
                                </tbody>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table --> 
    </div>
</section>

<!-- Default Size -->
<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">TAMBAH DATA</h4>
            </div>
            <div class="modal-body"> 
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
include('../theme/admin/end_theme.php');
?>
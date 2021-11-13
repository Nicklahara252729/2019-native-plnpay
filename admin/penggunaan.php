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
        $simpan_data =$call->update_penggunaan($_GET['keyedit'],$_POST['id_pelangganedit'],$_POST['bulanedit'],$_POST['tahunedit'],$_POST['meter_awaledit']);
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
                    <h2>Petugas</h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">home</a></li>
                        <li class="breadcrumb-item active">petugas</li>
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
                                                        <a class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini ?');" href="penggunaan.php?key=<?php echo $row['id_penggunaan']; ?>">Hapus</a>
                                                        <a class="btn btn-warning" href="penggunaan.php?keyedit=<?php echo $row['id_penggunaan']; ?>">Edit</a>
                                                    </td>
                                                </tr>
                                                <?php $number++; } ?>
                    </tbody>
                                </tbody>
                                <tfoot>
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
<?php
include('../theme/admin/end_theme.php');
?>
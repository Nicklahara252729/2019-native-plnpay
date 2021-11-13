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

$data    = $call->tampil_laporan();
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
                    <h2>Laporan</h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a href="index.php"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">home</a></li>
                        <li class="breadcrumb-item active">laporan</li>
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

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                    	<button type="button" class="btn btn-info btn-sm" onclick="window.print();">Cetak laporan
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
                                                    <th>Nomor Kwh</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Bulan</th>
                                                    <th>Tahun</th>
                                                    <th>Meter Awal</th>
                                                    <th>Meter Akhir</th>
                                                    <th>Tarif/Kwh</th>
                                                    <th>Jumlah Meter</th>
                                                    <th>Biaya admin</th>
                                                    <th>Total Tagihan</th>
                                                    <th>Status</th>
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
                                                    <td><?php echo $row['bulan']; ?></td>
                                                    <td><?php echo $row['tahun']; ?></td>
                                                    <td><?php echo $row['meter_awal']; ?></td>
                                                    <td><?php echo $row['meter_akhir']; ?></td>
                                                    <td><?php echo $row['tarifperkwh']; ?></td>
                                                    <td><?php echo $row['jumlah_meter']; ?></td>
                                                    <td><?php echo"Rp ".number_format($row['adminbank']); ?></td>
                                                    <td><?php echo"Rp ".number_format(($row['jumlah_meter'] * $row['tarifperkwh'])+$row['adminbank']); ?></td>
                                                    <td>
                                                        <a class="btn btn-info"  href="#">Sudah dibayar</a>
                                                    </td>
                                                </tr>
                                                <?php $number++; } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                        <th>No</th>
                                                    <th>ID Pelanggan</th>
                                                    <th>Nomor Kwh</th>
                                                    <th>Nama Pelanggan</th>
                                                    <th>Bulan</th>
                                                    <th>Tahun</th>
                                                    <th>Meter Awal</th>
                                                    <th>Meter Akhir</th>
                                                    <th>Tarif/Kwh</th>
                                                    <th>Jumlah Meter</th>
                                                    <th>Biaya admin</th>
                                                    <th>Total Tagihan</th>
                                                    <th>Status</th>
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


<?php
include('../theme/admin/end_theme.php');
?>
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
$data    = $call->tampil_tagihan();



include('../theme/admin/start_theme.php');
include('../theme/admin/header.php');
include('../theme/admin/menu.php');
?>
<div class="content-body">
        <div class="container">
        	

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
              <div class="row">
                <div class="col-12 table-responsive">
                  <table id="order-listing" class="table">
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

<?php 
include('../theme/admin/footer.php');
include('../theme/admin/end_theme.php');
?>
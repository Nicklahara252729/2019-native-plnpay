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
$data    = $call->tampil_laporan();

?>
<div class="content-wrapper">

          <div class="card">
            <div class="card-body">
              <button type="button" class="btn btn-primary btn-sm" onclick="window.print();">Cetak laporan
                      <i class="mdi mdi-play-circle ml-1"></i>
                    </button>
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
                                                        <a class="btn btn-success"  href="#">Sudah dibayar</a>
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
include('../theme/admin/end_theme.php');
?>
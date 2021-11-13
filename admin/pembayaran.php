<?php 
session_start();
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

//simpan data
if(isset($_POST['keyword'])){
        $data =$call->tampil_pembayaran($_POST['keyword']);
}

if(isset($_POST['paid'])){
    $simpan_data =$call->insert_pembayaran($_POST['paid'],$_POST['id_tagihan'],$_POST['id_pelanggan'],$_POST['total']);
}

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
                            <form class="forms-sample" method="post" target="_self">
                        <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="Masukkan Nomor Meter / ID Pelanggan" required name="keyword" >
                                                        </div>
                        <button type="submit" class="btn btn-success mr-2">Cari</button>
                      </form>
                        </div>
                      </div>
                    </div>
                </div>
              

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
                                                        <?php if($row['status'] == "belum bayar"){?>
                                                        <a class="btn btn-danger"  href="#">Belum dibayar</a>
                                                    <?php }else{?>
                                                        <a class="btn btn-info"  href="#">Sudah dibayar</a>
                                                    <?php } ?>
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


                <?php 
                            foreach($data as $rows){ 
                            $total = ($rows['jumlah_meter'] * $rows['tarifperkwh'])+$rows['adminbank'];
                            if($rows['status']=="belum bayar"){
                        ?>
    <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="row">
                            <h4 class="card-title">Masukkan Total Tagihan</h4>
              <h2><?php echo"Rp ".number_format($total); ?></h2>
                            <form class="forms-sample" method="post" target="_self">
                    <input type="hidden" name="id_tagihan" value="<?php echo $rows['id_tagihan']; ?>">
                                                    <input type="hidden" name="id_pelanggan" value="<?php echo $rows['id_pelanggan']; ?>">
                                                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="Rp" required name="paid" >
                                                        </div>
                        <button type="submit" class="btn btn-success mr-2">Bayar</button>
                      </form>
                        </div>
                      </div>
                  </div>
                    </div>
                </div>
<?php } }?>

            </div>
        </div>
    </div>
    <!-- /# content body -->


    
<?php 
include('../theme/admin/footer.php');
include('../theme/admin/end_theme.php');
?>
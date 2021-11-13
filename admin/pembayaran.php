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

//simpan data
if(isset($_POST['keyword'])){
        $data =$call->tampil_pembayaran($_POST['keyword']);
}

if(isset($_POST['paid'])){
    $simpan_data =$call->insert_pembayaran($_POST['paid'],$_POST['id_tagihan'],$_POST['id_pelanggan'],$_POST['total']);
}

error_reporting(0);
?>
<main class="page-content content-wrap">
            <?php 
            include('../theme/admin/navigation.php');
            include('../theme/admin/menu.php');
            ?>
            <div class="page-inner">
              <?php include('../theme/admin/page_title.php');?>  
                <div id="main-wrapper">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <form id="" action="" method="post" target="_self">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="modal-title" id="myModalLabel">Pembayaran</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="Masukkan Nomor Meter / ID Pelanggan" required name="keyword" >
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" id="add-row" class="btn btn-success btn-lg">Cari</button>
                                                </div>
                                            </div>
                                        
                                    </form>
                        </div>
                    </div>
                

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Detail pembayaran</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
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
                                                        <a class="btn btn-success"  href="#">Sudah dibayar</a>
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

                        <?php 
                            foreach($data as $rows){ 
                            $total = ($rows['jumlah_meter'] * $rows['tarifperkwh'])+$rows['adminbank'];
                            if($rows['status']=="belum bayar"){
                        ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <form id="" action="" method="post" target="_self">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="modal-title" id="myModalLabel">Masukkan Total Tagihan</h4>
                                                    
                                                    <h2><?php echo"Rp ".number_format($total); ?></h2>
                                                    <input type="hidden" name="id_tagihan" value="<?php echo $rows['id_tagihan']; ?>">
                                                    <input type="hidden" name="id_pelanggan" value="<?php echo $rows['id_pelanggan']; ?>">
                                                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                                                
                                                </div>
                                                <div class="modal-body">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input type="text" id="name-input" class="form-control" placeholder="Rp" required name="paid" >

                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                        <button type="submit" id="add-row" class="btn btn-success " style="width:100%;">Bayar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } }?>
                </div><!-- Main Wrapper -->
                <?php include('../theme/admin/footer.php');?>
            </div><!-- Page Inner -->
</main><!-- Page Content -->
<?php 
include('../theme/admin/navbar_tiga.php');
include('../theme/admin/end_theme.php');
?>

        
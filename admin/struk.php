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
$data    = $call->tampil_tagihan();
//delete data
if(isset($_GET['key'])){
$key   =$_GET['key'];
$data = $call->tampil_struk($key);
}
include('../theme/admin/start_theme.php');

?>
<section class="content" style="margin:0 auto;">
    <div class="container">

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table style="width:100%;">
                                        <?php $number=1; 
                                                foreach($data as $row){ ?>
                                        <tr>
                                            <td colspan="3">Yunda Payment (Payment Point Online Bank)</td>
                                        </tr>
                                        <tr>                                        
                                            <td style="text-align: center;" colspan="3"><strong><h3>STRUK PEMBAYARAN IURAN LISTRIK</h3></strong></td>
                                        </tr>
                                        <tr>
                                            <td>NO REFERENSI</td>
                                            <td>:</td>
                                            <td><?php echo md5($row['id_pembayaran']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>ID PELANGGAN</td>
                                            <td>:</td>
                                            <td><?php echo $row['id_pelanggan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>NAMA</td>
                                            <td>:</td>
                                            <td><?php echo $row['nama_pelanggan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>TARIF / DAYA</td>
                                            <td>:</td>
                                            <td><?php echo $row['tarifperkwh']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>RP TAG PLN</td>
                                            <td>:</td>
                                            <td><?php echo"Rp ".number_format($row['total_bayar'] - $row['adminbank']); ?></td>
                                        </tr>
                                        <tr>                                        
                                            <td style="text-align: center;" colspan="3"><strong><h4>PLN menyatakan struk ini sebagai bukti pembayaran yang sah.</h4></strong></td>
                                        </tr>
                                        <tr>
                                            <td>ADMIN BANK</td>
                                            <td>:</td>
                                            <td><?php echo"Rp ".number_format($row['adminbank']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>TOTAL BAYAR</td>
                                            <td>:</td>
                                            <td><?php echo"Rp ".number_format($row['total_bayar']); ?></td>
                                        </tr>
                                    <?php } ?>
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
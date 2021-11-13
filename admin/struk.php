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
$data    = $call->tampil_tagihan();
//delete data
if(isset($_GET['key'])){
$key   =$_GET['key'];
$data = $call->tampil_struk($key);
}

?>

<div class="content-wrapper">
	<div class="container">
          <div class="card">
            <div class="card-body">
              
              <div class="row">
                <div class="col-12 table-responsive">
                  <table style="width:100%;">
                                		<?php $number=1; 
                                                foreach($data as $row){ ?>
                                		<tr>
                                			<td colspan="3">Priya Payment (Payment Point Online Bank)</td>
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
</div>
<?php 
include('../theme/admin/end_theme.php');
?>
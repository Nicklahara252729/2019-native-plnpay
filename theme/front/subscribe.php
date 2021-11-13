<!-- ======================================================
			==Start subscription area==
====================================================== -->
<?php
//error_reporting(0);
include('./library/utama.php');
// panggil class
$call  = new database();
$call->koneksi();

//show data
$data    = $call->tampil_tagihan();
//delete data
if(isset($_POST['id_pelanggan'])){
$data = $call->tampil_check($_POST['id_pelanggan'],$_POST['nometer']);
}
?>
<section class="subscribe-area">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="section-title">
					<h2>check your website’s <span>seo</span> problems for free</h2>
					<span></span>
					<p>
						Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse moles
						feugiat nulla facilisis at vero eros et accumsan
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12  col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1">
				<div class="subscribe-content-area">
					<form action="#" method="post" action="" target="_self">
						<ul>
							<li>
								<div class="subscribe-field">
									<div class="form-group">
										<input type="text" placeholder="ID PELANGGAN" class="input-field" name="id_pelanggan">
									</div>
								</div>
							</li>
							<li>
								<div class="subscribe-name-field">
									<div class="form-group">
										<input type="text" placeholder="NOMOR METER" class="input-field" name="nometer">
									</div>
								</div>
							</li>
							<li>
								<div class="subscribe-btn">
									<button type="submit"  class="seo-btn">check</button>
								</div>
							</li>
						</ul>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="border: dashed 1px;">
				<div class="section-title">
					<table style="width:100%;">
                                		<?php $number=1; 
                                                foreach($data as $row){ ?>
                                		<tr>
                                			<td colspan="3">Sri Payment (Payment Point Online Bank)</td>
                                		</tr>
                                		<tr>                                		
                                			<td style="text-align: center;" colspan="3"><strong><h3>STRUK PEMBAYARAN IURAN LISTRIK</h3></strong></td>
                                		</tr>
                                		<tr>
                                			<td style="text-align: left;">NO REFERENSI</td>
                                			<td>:</td>
                                			<td style="text-align: left;"><?php echo md5($row['id_pembayaran']); ?></td>
                                		</tr>
                                		<tr>
                                			<td style="text-align: left;">ID PELANGGAN</td>
                                			<td>:</td>
                                			<td style="text-align: left;"><?php echo $row['id_pelanggan']; ?></td>
                                		</tr>
                                		<tr>
                                			<td style="text-align: left;">NAMA</td>
                                			<td>:</td>
                                			<td style="text-align: left;"><?php echo $row['nama_pelanggan']; ?></td>
                                		</tr>
                                		<tr>
                                			<td style="text-align: left;">TARIF / DAYA</td>
                                			<td>:</td>
                                			<td style="text-align: left;"><?php echo $row['tarifperkwh']; ?></td>
                                		</tr>
                                		<tr>
                                			<td style="text-align: left;">RP TAG PLN</td>
                                			<td>:</td>
                                			<td style="text-align: left;"><?php echo"Rp ".number_format($row['total_bayar'] - $row['adminbank']); ?></td>
                                		</tr>
                                		<tr>                                		
                                			<td style="text-align: center;" colspan="3"><strong><h4>PLN menyatakan struk ini sebagai bukti pembayaran yang sah.</h4></strong></td>
                                		</tr>
                                		<tr>
                                			<td style="text-align: left;">ADMIN BANK</td>
                                			<td>:</td>
                                			<td style="text-align: left;"><?php echo"Rp ".number_format($row['adminbank']); ?></td>
                                		</tr>
                                		<tr>
                                			<td style="text-align: left;">TOTAL BAYAR</td>
                                			<td>:</td>
                                			<td style="text-align: left;"><?php echo"Rp ".number_format($row['total_bayar']); ?></td>
                                		</tr>
                                		<tr>
                                			<td style="text-align: left;">STATUS</td>
                                			<td>:</td>
                                			<td style="text-align: left;"><strong><?php echo $row['status'] ; ?></strong></td>
                                		</tr>
                                	<?php } ?>
                                	</table>
				</div>
			</div>
		</div>
		
	</div>
</section>
<!-- ======================================================
			==End subscription area==
====================================================== -->

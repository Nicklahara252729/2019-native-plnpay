<?php
$url = $_SERVER['REQUEST_URI'];
$pecah = explode('/', $url);
$link = explode('.', $pecah[3]);
if($link[0] == "index" || $link[0] ==""){
	$title = "Dashboard";
}else if ($link[0] == "petugas"){
	$title = "Petugas";
}else if ($link[0] == "pelanggan"){
	$title = "Pelanggan";
}else if ($link[0] == "tarif"){
	$title = "Tarif";
}else if ($link[0] == "penggunaan"){
	$title = "Penggunaan";
}else if ($link[0] == "meter_akhir"){
	$title = "Meter Akhir";
}else if ($link[0] == "pembayaran"){
	$title = "Pembayaran";
}else if ($link[0] == "tagihan"){
	$title = "Tagihan";
}else if ($link[0] == "laporan"){
	$title = "Laporan";
}
?>
<div class="page-title">
                    <h3><?php echo $title; ?></h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo $url; ?>">Home</a></li>
                            <li class="active"><?php echo $title; ?></li>
                        </ol>
                    </div>
                </div>
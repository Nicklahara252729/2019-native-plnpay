<div class="menu">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <nav class="topbar-nav">
                        <ul class="metismenu" id="metismenu">
                            <?php if($_SESSION['level']=="admin"){?>
                            <li>
                                <a href="index.php">
                                    <span class="fa fa-tachometer"></span> DASHBOARD
                                </a>
                            </li>
                            <li>
                                <a  href="petugas.php" aria-expanded="false">
                                    <span class="fa fa-user"></span> Petugas
                                </a>
                                
                            </li>
                            <li>
                                <a href="pelanggan.php">
                                    <span class="fa fa-users"></span> Pelanggan
                                </a>
                            </li>
                            <li>
                                <a  href="tarif.php" aria-expanded="false">
                                    <span class="fa fa-money"></span> Tarif
                                </a>
                                
                            </li>
                            <li>
                                <a href="laporan.php">
                                    <span class="fa fa-calendar"></span> Laporan
                                </a>
                            </li>
                            <li>
                                <a  href="tagihan.php" aria-expanded="false">
                                    <span class="fa fa-tags"></span> Tagihan
                                </a>
                            </li>
                            <li>
                                <a  href="penggunaan.php" aria-expanded="false">
                                    <span class="fa fa-history"></span> Penggunaan
                                </a>
                            </li>
                            <?php }elseif($_SESSION['level']=="petugas"){ ?>
                            <li>
                                <a  href="meter_akhir.php" aria-expanded="false">
                                    <span class="fa fa-tachometer"></span> Meter Akhir
                                </a>
                            </li>
                            <?php }else{ ?>
                            <li>
                                <a  href="pembayaran.php" aria-expanded="false">
                                    <span class="fa fa-credit-card"></span> Pembayaran
                                </a>
                            </li>
                            <?php }?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /# menu -->
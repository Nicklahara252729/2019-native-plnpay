<?php
$url = $_SERVER['REQUEST_URI'];
$pecah = explode('/', $url);
$link = explode('.', $pecah[3]);
?>
<div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <a href="javascript:void(0);" id="profile-menu-link">
                                <div class="sidebar-profile-image">
                                    <img src="../asset/admin/images/profile-menu-image.png" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span>David Green<br><small>Art Director</small></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        <?php if($_SESSION['level']=="admin"){?>
                        <li <?php if($link[0]=="admin"){ ?> class="active" <?php } ?>><a href="index.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>

                        <li <?php if($link[0]=="petugas"){ ?> class="active" <?php } ?>><a href="petugas.php" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Petugas</p></a></li>

                        <li <?php if($link[0]=="pelanggan"){ ?> class="active" <?php } ?>><a href="pelanggan.php" class="waves-effect waves-button"><span class="menu-icon icon-users"></span><p>Pelanggan</p></a></li>

                        <li <?php if($link[0]=="tarif"){ ?> class="active" <?php } ?>><a href="tarif.php" class="waves-effect waves-button"><span class="menu-icon fa fa-money"></span><p>Tarif</p></a></li>

                        <li <?php if($link[0]=="laporan"){ ?> class="active" <?php } ?>><a href="laporan.php" class="waves-effect waves-button"><span class="menu-icon icon-docs"></span><p>Laporan</p></a></li>

                        <li <?php if($link[0]=="tagihan"){ ?> class="active" <?php } ?>><a href="tagihan.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-flash"></span><p>Tagihan</p></a></li>

                        <li <?php if($link[0]=="penggunaan"){ ?> class="active" <?php } ?>><a href="penggunaan.php" class="waves-effect waves-button"><span class="menu-icon fa  fa-calculator "></span><p>Penggunaan</p></a></li>
                    <?php }elseif($_SESSION['level']=="petugas"){ ?>

                        <li <?php if($link[0]=="meter_akhir"){ ?> class="active" <?php } ?>><a href="meter_akhir.php" class="waves-effect waves-button"><span class="menu-icon fa  fa-edit "></span><p>Meter akhir</p></a></li>
                    <?php }else{ ?>

                        <li <?php if($link[0]=="pembayaran"){ ?> class="active" <?php } ?>><a href="pembayaran.php" class="waves-effect waves-button"><span class="menu-icon fa  fa-credit-card "></span><p>Pembayaran</p></a></li>
                    <?php }?>
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div><!-- Page Sidebar -->
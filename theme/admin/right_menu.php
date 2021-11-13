<aside class="right_menu">
    <div id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info m-b-20">
                        <div class="image">
                            <a href="profile.html"><img src="../asset/admin/images/profile_av.jpg" alt="User"></a>
                        </div>
                        <div class="detail">
                            <h6><?php echo $_SESSION['nama_admin']; ?> </h6>
                            <p class="m-b-0"><?php echo $_SESSION['level']; ?> </p>
                            <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-facebook-box"></i></a>
                            <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-linkedin-box"></i></a>
                            <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-instagram"></i></a>
                            <a href="javascript:void(0);" title="" class=" waves-effect waves-block"><i class="zmdi zmdi-twitter-box"></i></a>                            
                        </div>
                    </div>
                </li>
                <li class="header">MAIN</li>
                <?php if($_SESSION['level']=="admin"){?>
                <li class="active open"> <a href="index.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li > <a href="petugas.php"><i class="material-icons">person</i><span>Petugas</span></a></li>
                <li > <a href="pelanggan.php"><i class="material-icons">people</i><span>Pelanggan</span></a></li>
                <li > <a href="tarif.php"><i class="material-icons">attach_money</i><span>Tarif</span></a></li>
                <li > <a href="laporan.php"><i class="material-icons">event_note</i><span>Laporan</span></a></li>
                <li > <a href="tagihan.php"><i class="material-icons">label</i><span>Tagihan</span></a></li>
                <li > <a href="penggunaan.php"><i class="material-icons">timeline</i><span>Penggunaan</span></a></li>
                <?php }elseif($_SESSION['level']=="petugas"){ ?>
                <li > <a href="meter_Akhir.php"><i class="material-icons">restore</i><span>Meter Akhir</span></a></li>
                <?php }else{ ?>
                <li > <a href="pembayaran.php"><i class="material-icons">touch_app</i><span>Pembayaran</span></a></li>
<?php }?>
                    
            </ul>
        </div>
    </div>
</aside>
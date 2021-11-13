<div class="nav-bottom">
        <div class="container">
          <ul class="nav page-navigation">
            <?php if($_SESSION['level']=="admin"){?>
            <li class="nav-item">
              <a href="index.php" class="nav-link"><i class="link-icon icon-screen-desktop"></i><span class="menu-title">Dashboard</span></a>
            </li>

            <li class="nav-item">
              <a href="petugas.php" class="nav-link"><i class="link-icon icon-user"></i><span class="menu-title">Petugas</span></a>
            </li>

            <li class="nav-item">
              <a href="pelanggan.php" class="nav-link"><i class="link-icon icon-people"></i><span class="menu-title">Pelanggan</span></a>
            </li>

            <li class="nav-item">
              <a href="tarif.php" class="nav-link"><i class="link-icon icon-tag"></i><span class="menu-title">Tarif</span></a>
            </li>

            <li class="nav-item">
              <a href="laporan.php" class="nav-link"><i class="link-icon icon-calendar"></i><span class="menu-title">Laporan</span></a>
            </li>

            <li class="nav-item">
              <a href="tagihan.php" class="nav-link"><i class="link-icon icon-calculator"></i><span class="menu-title">Tagihan</span></a>
            </li>

            <li class="nav-item">
              <a href="penggunaan.php" class="nav-link"><i class="link-icon icon-graph"></i><span class="menu-title">Penggunaan</span></a>
            </li>
<?php }elseif($_SESSION['level']=="petugas"){ ?>
            <li class="nav-item">
              <a href="meter_akhir.php" class="nav-link"><i class="link-icon icon-speedometer"></i><span class="menu-title">Meter Akhir</span></a>
            </li>
<?php }else{ ?>
            <li class="nav-item">
              <a href="pembayaran.php" class="nav-link"><i class="link-icon icon-credit-card "></i><span class="menu-title">Pembayaran</span></a>
            </li>
<?php }?>
          </ul>
        </div>
      </div>
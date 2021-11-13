<!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas sidebar-dark" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <img src="../asset/admin/images/faces/face1.jpg" alt="profile image">
            <p class="text-center font-weight-medium"><?php echo $_SESSION['nama_admin']; ?></p>
          </li>

          <?php if($_SESSION['level']=="admin"){?>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="menu-icon icon-diamond"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="petugas.php">
              <i class="menu-icon icon-user"></i>
              <span class="menu-title">Petugas</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="pelanggan.php">
              <i class="menu-icon icon-people"></i>
              <span class="menu-title">Pelanggan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="tarif.php">
              <i class="menu-icon icon-tag"></i>
              <span class="menu-title">Tarif</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="laporan.php">
              <i class="menu-icon icon-docs"></i>
              <span class="menu-title">Laporan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="tagihan.php">
              <i class="menu-icon icon-calculator"></i>
              <span class="menu-title">Tagihan</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="penggunaan.php">
              <i class="menu-icon icon-graph"></i>
              <span class="menu-title">Penggunaan</span>
            </a>
          </li>
          <?php }elseif($_SESSION['level']=="petugas"){ ?>

          <li class="nav-item">
            <a class="nav-link" href="meter_akhir.php">
              <i class="menu-icon icon-speedometer"></i>
              <span class="menu-title">Meter Akhir</span>
            </a>
          </li>
<?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="pembayaran.php">
              <i class="menu-icon icon-credit-card"></i>
              <span class="menu-title">Pembayaran</span>
            </a>
          </li>
          <?php }?>
        </ul>
      </nav>
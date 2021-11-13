<?php 
include('../library/utama.php');
// panggil class
$call  = new database();
$call->koneksi();
if(isset($_POST['username']) && $_POST['password']){
    $proses = $call->login($_POST['username'], md5($_POST['password']));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Priya Payment</title>
  <link rel="stylesheet" href="../asset/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../asset/admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../asset/admin/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="../asset/admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../asset/admin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../asset/admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../asset/admin/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper auth p-0 theme-two">
        <div class="row d-flex align-items-stretch">
          <div class="col-md-4 banner-section d-none d-md-flex align-items-stretch justify-content-center">
            <div class="slide-content bg-1">
            </div>
          </div>
          <div class="col-12 col-md-8 h-100 bg-white">
            <div class="auto-form-wrapper d-flex align-items-center justify-content-center flex-column">
              <div class="nav-get-started">
                
                <a class="btn get-started-btn" href="../index.php">HOME PAGE</a>
              </div>
              <form class="m-t-md" action="" target="_self" method="post">
                <h3 class="mr-auto">Hello! let's get started</h3>
                <p class="mb-5 mr-auto">Enter your details below.</p>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Username" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="icon-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Password" name="password">
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn">SIGN IN</button>
                </div>
                <div class="wrapper mt-5 text-gray">
                  <p class="footer-text">Copyright © 2018 Urbanui. All rights reserved.</p>
                  <ul class="auth-footer text-gray">
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                  </ul>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="../asset/admin/vendors/js/vendor.bundle.base.js"></script>
  <script src="../asset/admin/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../asset/admin/js/off-canvas.js"></script>
  <script src="../asset/admin/js/hoverable-collapse.js"></script>
  <script src="../asset/admin/js/misc.js"></script>
  <script src="../asset/admin/js/settings.js"></script>
  <script src="../asset/admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../asset/admin/js/dashboard.js"></script>
  <script src="../asset/admin/js/data-table.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
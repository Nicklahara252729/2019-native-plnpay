<?php 
session_start();
include('../library/utama.php');
//panggil class
$call  = new database();
$call->koneksi();
if(isset($_POST['username']) && $_POST['password']){
    $proses = $call->login($_POST['username'], md5($_POST['password']));
}

?>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>Yunda Payment</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="../asset/admin/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../asset/admin/plugins/morrisjs/morris.css" />
<link rel="stylesheet" href="../asset/admin/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="../asset/admin/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="../asset/admin/css/main.css">
<link rel="stylesheet" href="../asset/admin/css/color_skins.css">
</head>
<body class="theme-black">
<div class="authentication">
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="row">
                
                <div class="col-lg-6 col-md-12 offset-lg-3">
                    <div class="card-plain">
                        <div class="header">
                            <h5>Log in System</h5>
                        </div>
                        <form id="" action="" method="post" target="_self">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="User Name" name="username">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                            </div>
                        
                        <div class="footer">
                            <button type="submit" class="btn btn-primary btn-round btn-block">Login</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jquery Core Js -->
<script src="../asset/admin/bundles/libscripts.bundle.js"></script>
<script src="../asset/admin/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>
</html>
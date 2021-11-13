<?php
$url = $_SERVER['REQUEST_URI'];
$pecah = explode('/', $url);
$link = explode('.', $pecah[3]);
?>
<!doctype html>
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
<body class="theme-black" <?php if($link[0]=='struk'){ ?> onload="window.print();" <?php } ?>>
	<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="../asset/admin/images/logo.svg" width="48" height="48" alt="Alpino"></div>
        <p>Please wait...</p>        
    </div>
</div>
<?php
$url = $_SERVER['REQUEST_URI'];
$pecah = explode('/', $url);
$link = explode('.', $pecah[3]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Priya Payment</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../asset/admin/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css">
  <link rel="stylesheet" href="../asset/admin/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../asset/admin/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../asset/admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../asset/admi/nmages/favicon.png" />
</head>

<body <?php if($link[0]=='struk'){ ?> onload="window.print();" <?php } ?>>
  <div class="container-scroller">
    <?php 
    if($link[0]!='struk'){ ?>
    <nav class="navbar horizontal-layout col-lg-12 col-12 p-0">
      <?php 
      include('../theme/admin/navbar_top.php'); 
      include('../theme/admin/navbar_bottom.php');
      ?>
    </nav>
  <?php } ?>
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">


  
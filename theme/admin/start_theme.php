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
  <title>Chairul Payment</title>
  <!-- plugins:css -->
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

<body <?php if($link[0]=='struk'){ ?> onload="window.print();" <?php } ?>>
<div class="container-scroller" >
	<?php 
	if($link[0]!='struk'){
	include('../theme/admin/navbar.php'); 
}?>
	<div class="container-fluid page-body-wrapper">
		<?php 
		if($link[0]!='struk'){
		include('../theme/admin/theme_setting.php'); 
		include('../theme/admin/sidebar.php'); 
		?>
		<div class="main-panel">
			<?php } ?>
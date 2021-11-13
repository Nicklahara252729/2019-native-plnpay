<?php
$url = $_SERVER['REQUEST_URI'];
$pecah = explode('/', $url);
$link = explode('.', $pecah[3]);
?>
<!DOCTYPE html>
<html>
<head>
        
        <!-- Title -->
        <title>Sri Payment</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../asset/admin/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../asset/admin/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../asset/admin/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../asset/admin/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../asset/admin/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../asset/admin/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../asset/admin/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../asset/admin/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../asset/admin/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../asset/admin/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>	
        <link href="../asset/admin/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../asset/admin/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../asset/admin/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>	

        <link href="../asset/admin/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/> 
        <link href="../asset/admin/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/> 
        	
        <!-- Theme Styles -->
        <link href="../asset/admin/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../asset/admin/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../asset/admin/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="../asset/admin/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../asset/admin/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
    
        
    </head>
    <body class="page-header-fixed" <?php if($link[0]=="struk"){ ?> onload="window.print();" <?php } ?>>
        <div class="overlay"></div>
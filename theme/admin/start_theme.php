<?php
$url = $_SERVER['REQUEST_URI'];
$pecah = explode('/', $url);
$link = explode('.', $pecah[3]);
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Liza payment</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="manifest" href="#">
    <link rel="apple-touch-icon" href="#">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="../asset/admin/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../asset/admin/css/style.css">
</head>
<body <?php if($link[0]=='struk'){ ?> onload="window.print();" <?php } ?>>
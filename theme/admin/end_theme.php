<?php
$url = $_SERVER['REQUEST_URI'];
$pecah = explode('/', $url);
$link = explode('.', $pecah[3]);
?>
<div class="cd-overlay"></div>
        <!-- Javascripts -->
        <?php if($link[0] == "index" || $link[0] == ""){?>
        <script src="../asset/admin/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../asset/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../asset/admin/plugins/pace-master/pace.min.js"></script>
        <script src="../asset/admin/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../asset/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../asset/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../asset/admin/plugins/switchery/switchery.min.js"></script>
        <script src="../asset/admin/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../asset/admin/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../asset/admin/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../asset/admin/plugins/waves/waves.min.js"></script>
        <script src="../asset/admin/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../asset/admin/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../asset/admin/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="../asset/admin/plugins/toastr/toastr.min.js"></script>
        <script src="../asset/admin/plugins/flot/jquery.flot.min.js"></script>
        <script src="../asset/admin/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../asset/admin/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../asset/admin/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../asset/admin/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../asset/admin/plugins/curvedlines/curvedLines.js"></script>
        <script src="../asset/admin/plugins/metrojs/MetroJs.min.js"></script>
        <script src="../asset/admin/js/modern.js"></script>
        <script src="../asset/admin/js/pages/dashboard.js"></script>
        <script src="../asset/admin/js/pages/table-data.js"></script>
        <?php } else {?>
        <script src="../asset/admin/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../asset/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../asset/admin/plugins/pace-master/pace.min.js"></script>
        <script src="../asset/admin/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../asset/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../asset/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../asset/admin/plugins/switchery/switchery.min.js"></script>
        <script src="../asset/admin/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../asset/admin/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../asset/admin/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../asset/admin/plugins/waves/waves.min.js"></script>
        <script src="../asset/admin/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../asset/admin/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="../asset/admin/plugins/moment/moment.js"></script>
        <script src="../asset/admin/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../asset/admin/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="../asset/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../asset/admin/js/modern.min.js"></script>
        <script src="../asset/admin/js/pages/table-data.js"></script>
        <?php } ?>
    </body>
</html>
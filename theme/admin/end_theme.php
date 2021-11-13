			<?php 
			$url = $_SERVER['REQUEST_URI'];
			$pecah = explode('/', $url);
			$link = explode('.', $pecah[3]);
			if($link[0]!='struk'){
			include('../theme/admin/footer.php');  ?>
		</div>
	<?php } ?>
	</div>
</div>
<!-- plugins:js -->
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
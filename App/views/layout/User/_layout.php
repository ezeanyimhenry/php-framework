<!DOCTYPE html>
<html lang="en">

<?php
include_once("App/views/layout/user/_head.php")
	?>

<body>

	<!--*******************
		Preloader start
	********************-->
	<div id="preloader">
		<div class="waviy">
			<span style="--i:1">L</span>
			<span style="--i:2">o</span>
			<span style="--i:3">a</span>
			<span style="--i:4">d</span>
			<span style="--i:5">i</span>
			<span style="--i:6">n</span>
			<span style="--i:7">g</span>
			<span style="--i:8">.</span>
			<span style="--i:9">.</span>
			<span style="--i:10">.</span>
		</div>
	</div>
	<!--*******************
		Preloader end
	********************-->

	<!--**********************************
		Main wrapper start
	***********************************-->
	<div id="main-wrapper">

		<?php
		include_once("App/views/layout/user/_navHeader.php")
			?>

		<?php
		include_once("App/views/layout/user/_header.php")
			?>

		<?php
		include_once("App/views/layout/user/_sidebar.php")
			?>

		<?php
		// include_once($contentPage);
		?>

		<?php
		include_once("App/views/user/components/modals/_plan_type_modal.php");
		include_once("App/views/user/components/modals/_change_password_modal.php");
		?>



		<?php
		include_once("App/views/layout/user/_footer.php")
			?>




	</div>
	<!--**********************************
		Main wrapper end
	***********************************-->

	<!--**********************************
		Scripts
	***********************************-->
	<!-- Required vendors -->
	<script src="Public/vendor/global/global.min.js"></script>
	<script src="Public/vendor/chart-js/chart.bundle.min.js"></script>

	<!-- Apex Chart -->
	<script src="Public/vendor/apexchart/apexchart.js"></script>
	<script src="Public/vendor/nouislider/nouislider.min.js"></script>
	<script src="Public/vendor/wnumb/wNumb.js"></script>

	<!-- Flot -->
	<script src="Public/vendor/flot/jquery.flot.js"></script>
	<script src="Public/vendor/flot/jquery.flot.pie.js"></script>
	<script src="Public/vendor/flot/jquery.flot.resize.js"></script>
	<script src="Public/vendor/flot-spline/jquery.flot.spline.min.js"></script>

	<!-- Datatable -->
	<script src="Public/vendor/datatables/js/jquery.dataTables.min.js"></script>
	<script src="Public/js/plugins-init/datatables.init.js"></script>

	<!-- Chart sparkline plugin files -->
	<script src="Public/vendor/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="Public/js/plugins-init/sparkline-init.js"></script>

	<!-- Chart piety plugin files -->
	<script src="Public/vendor/peity/jquery.peity.min.js"></script>
	<script src="Public/js/plugins-init/piety-init.js"></script>

	<!-- Init file -->
	<script src="Public/js/plugins-init/widgets-script-init.js"></script>

	<script src="Public/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

	<!-- Dashboard 1 -->
	<script src="Public/js/dashboard/dashboard-1.js"></script>

	<script src="Public/js/custom.min.js"></script>
	<script src="Public/js/dlabnav-init.js"></script>
	<script src="Public/js/demo.js"></script>
	<script src="Public/js/styleSwitcher.js"></script>

	<script src="Public/js/plugins-init/jquery.validate-init.js"></script>

	<script src="Public/js/scripts.js"></script>
	<script src="Public/js/wallets.js"></script>

</body>


</html>
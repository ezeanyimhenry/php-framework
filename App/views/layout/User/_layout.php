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
		include_once($contentPage);
		?>

		<?php
		include_once("App/views/user/modals/_plan_type_modal.php")
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

	<script>
		(function () {
			'use strict'

			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.querySelectorAll('.needs-validation')

			// Loop over them and prevent submission
			Array.prototype.slice.call(forms)
				.forEach(function (form) {
					form.addEventListener('submit', function (event) {
						if (!form.checkValidity()) {
							event.preventDefault()
							event.stopPropagation()
						}else{
							form.submit();
						}
						
						form.classList.add('was-validated')
					}, false)
				})
		})()
	</script>

	<script>
		function fetchPlanDetails(selectedPlanName, selectedPlanType) {
			$.ajax({
				url: '/investment/fetchPlanDetails/', // Use the appropriate URL pattern
				method: 'POST',
				contentType: 'application/json', // Set the content type to JSON
				data: JSON.stringify({        // Convert the data to JSON format
					planName: selectedPlanName,
					planType: selectedPlanType
				}),
				success: function (response) {
					// Define a function to update calculations
					function updateCalculations() {
						var userAmount = parseFloat($('#amount').val()); // Parse the input as a float

						if (response.length > 0) {
							var planDetails = response[0]; // Access the first object in the array

							var profit = (planDetails.roi * planDetails.duration / 100) * userAmount;
							var total = profit + userAmount;

							$('#minimum_amount').val(planDetails.minimum_amount);
							$('#maximum_amount').val(planDetails.maximum_amount);
							$('#roi').val(planDetails.roi);
							$('#duration').val(planDetails.duration);
							$('#profit').val(profit.toFixed(2));
							$('#total').val(total.toFixed(2));
						} else {
							console.error('No plan details found in the response.');
						}
					}

					// Attach an input event listener to the "amount" field
					$('#amount').on('input', updateCalculations);

					// Initially, trigger the calculations when the page loads
					updateCalculations();

				},
				error: function (xhr, status, error) {
					console.error('Error fetching plan details: ' + error);
				},
			});
		}

	</script>
</body>


</html>
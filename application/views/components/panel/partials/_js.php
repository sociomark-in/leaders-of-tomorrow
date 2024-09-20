<!-- core:js -->
<!-- <script src="<?= base_url("assets/panel/") ?>/vendors/core/core.js"></script> -->
<!-- endinject -->

<!-- Plugin js for this page -->
<script src="<?= base_url("assets/panel/") ?>vendors/flatpickr/flatpickr.min.js"></script>
<!-- End plugin js for this page -->

<!-- inject:js -->
<script src="<?= base_url("assets/panel/") ?>vendors/feather-icons/feather.min.js"></script>
<script src="<?= base_url("assets/panel/") ?>js/template.js"></script>
<!-- endinject -->

<!-- Custom js for this page -->
<script src="<?= base_url("assets/panel/") ?>js/app.js"></script>
<script src="<?= base_url("assets/panel/") ?>js/dashboard-light.js"></script>
<!-- End custom js for this page -->

<script>
	$('main select.form-select').each((index, elem) => {
		$(elem).select2();
	})
	$('main input[data-type=date]').each((index, elem) => {
		$(elem).datepicker({
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true,
			dateFormat: 'dd/mm/yy'
		});
	})
</script>

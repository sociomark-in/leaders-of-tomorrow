<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_03']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<input type="hidden" name="referrer" value="<?= $referrer ?>">

	<!-- 
	75520	initiative_name
	75521	initiative_start_date	
	75522	initiative_end_date	
	75523	initiative_desc	
	75524	initiative_challenges	
	75525	initiative_strategy	
 	-->

	<div class="row g-3 g-md-4">
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Innovation and Adaptability<sup class="text-danger">&ast;</sup></h5>
				</legend>
				<p class="text-muted">(The initiative or innovation can be a new product/ solution development, digitization, technical innovation, process improvement, entering new market, etc.)</p>
			</div>
			<div class="row g-3">
				<div class="col-12">
					<div class="">
						<label for="" class="form-label">Describe the digital technologies (e.g., AI, IoT) that your company has integrated into its operations. How did these technologies help in transforming your business model or customer experience</label>
						<textarea required name="case_study_1" id="" class="form-control" maxlength="5000" rows="5"> <?= $application_temp['id_255301'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Business Performance and Market Impact<sup class="text-danger">&ast;</sup></h5>
				</legend>
			</div>
			<div class="row g-3">
				<div class="col-12">
					<div class="">
						<label for="" class="form-label">How has the integration of digital technologies impacted your company&#39;s performance in terms of revenue, customer satisfaction, and market share? Please provide any specific metrics or examples.</label>
						<textarea required name="case_study_2" id="" class="form-control" maxlength="5000" rows="5"> <?= $application_temp['id_255302'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
	</div>
</div>
<div class="row g-3">
	<div class="col-md-auto">
		<a href="<?= base_url('dashboard/application/' . $application_id . '?stage=' . $stage - 1) ?>" class="btn btn-outline-secondary">Back</a>
	</div>
	<div class="col-md-auto">
		<button type="submit" class="btn btn-primary">Save and Next</button>
	</div>
	<div class="col-md-auto">
		<button type="reset" class="btn btn-outline-secondary">Reset This Section</button>
	</div>
</div>
<?= form_close() ?>
<script>
	function parseDDMMYYYYDate(dateString) {
		let parts = dateString.split('/');
		let day = parseInt(parts[0], 10);
		let month = parseInt(parts[1], 10) - 1; // Months are 0-indexed
		let year = parseInt(parts[2], 10);

		return new Date(year, month, day);
	}
	$.validator.addMethod("greater_than", function(value, element, param) {

		var d1 = new Date(Date.parse(value));
		var d2 = new Date(Date.parse($(param).val()));
		console.log([value, $(param).val()]);
		console.log([parseDDMMYYYYDate(value.trim()), parseDDMMYYYYDate($(param).val().trim())]);

		return parseDDMMYYYYDate(value.trim()) > parseDDMMYYYYDate($(param).val().trim());
	});
	$('[name=initiative_start_date]').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'dd/mm/yy',
		maxDate: '<?= date('d/m/Y') ?>',

	});
	$('[name=initiative_end_date]').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'dd/mm/yy',
	});
	$("#form_option_03").validate({
		ignore: [
			":hidden", ":focus"
		],
		rules: {
			case_study_1: {
				maxlength: 5000,
				minlength: 50
			},
			case_study_2: {
				maxlength: 5000,
				minlength: 50
			},
		},
		messages: {
			case_study_1: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			case_study_2: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
		}
	});
</script>

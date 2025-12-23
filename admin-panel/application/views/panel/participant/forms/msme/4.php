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
		<!-- 4. INDIVIDUAL CATEGORY -->
		<fieldset class="col-12">
			<legend class="card-title mb-0">
				<h5>Individual Category Preference & Entrepreneur Insight<sup class="text-danger">&ast;</sup></h5>
			</legend>
			<div class="row g-3">
				<div class="col-12">
					<p>I wish to additionally be considered for:</p>
				</div>
				<div class="col-xl-4">
					<div class="border rounded-1 p-2 p-lg-3">
						<div class="form-check">
							<input required name="alt_category_id" value="1_INDIVIDUAL" class="form-check-input" type="radio" id="checkOption1" <?= ($application['id_255601'] == "1_INDIVIDUAL") ?	 "checked" : "" ?>>
							<label class="form-check-label" for="checkOption1">
								<h5 class="mb-2">Entrepreneur of the Year</h5>
								<small class="text-muted">
									I confirm that I am <strong>more than 35 years</strong> of age as on <strong>March 31, 2025</strong>, and my MSME is <strong>more than 2 years</strong> old.
								</small>
							</label>
						</div>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="border rounded-1 p-2 p-lg-3">
						<div class="form-check">
							<input required name="alt_category_id" value="2_INDIVIDUAL" class="form-check-input" type="radio" id="checkOption2" <?= ($application['id_255601'] == "2_INDIVIDUAL") ?	 "checked" : "" ?>>
							<label class="form-check-label" for="checkOption2">
								<h5 class="mb-2">Next Gen Entrepreneur</h5>
								<small class="text-muted">
									I confirm that I am <strong>up to 35 years</strong> of age as on <strong>March 31, 2025</strong>, and my MSME is <strong>more than 2 and less than 5 years</strong> old.
								</small>
							</label>
						</div>
					</div>
				</div>
				<div class="col-xl-4">
					<div class="border rounded-1 p-2 p-lg-3">
						<div class="form-check">
							<input required name="alt_category_id" value="3_INDIVIDUAL" class="form-check-input" type="radio" id="checkOption3" <?= ($application['id_255601'] == "3_INDIVIDUAL") ?	 "checked" : "" ?>>
							<label class="form-check-label" for="checkOption3">
								<h5 class="mb-2">Woman Entrepreneur of the Year</h5>
								<small class="text-muted">
									I confirm that I am <strong>a woman entrepreneur</strong> and hold <strong>at least 33% equity stake</strong> in the organization
								</small>
							</label>
						</div>
					</div>
				</div>
			</div>
			<div class="form-text">
				<p>(Please tick only those that are relevant and for which you meet the eligibility criteria)</p>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Entrepreneur of the Year<sup class="text-danger">&ast;</sup></h5>
				</legend>
				<p class="text-muted">(The response to this question will be used to evaluate and determine the finalists for the "Entrepreneur of the Year" category. By submitting this response, you consent to its consideration for this awards category.)</p>
			</div>
			<div class="row g-3 flex-row-reverse">
				<div class="col-lg-4">
					<div class="p-3 bg-light">
						


						<p>In your response, you may cover:</p>
						<ul>
							<li><strong>Agility in Action</strong> – How did you respond to market volatility, supply-chain changes, competition, or technological disruption? What tough calls or course-corrections did you lead to keep the business resilient and future-ready?</li>
							<li><strong>Ambition with Purpose</strong> – How have you pushed the boundaries for your business (new markets, new products, new models) while staying rooted in a clear purpose or mission?</li>
							<li><strong>Ascent to Impact</strong> – How has your leadership contributed to meaningful growth – in terms of revenues, jobs, customer value, or competitiveness – and strengthened your organisation’s role in India’s economic story?</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="">
						<label for="" class="form-label">Between April 01, 2023 and March 31, 2025, how have you personally embodied “Agility. Ambition. Ascent.” as an entrepreneur/innovator </label>
						<textarea required name="case_study_individual" id="" class="form-control" maxlength="5000" rows="5"><?= $application_temp['id_255602'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<!-- 4. INDIVIDUAL CATEGORY -->
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
			case_study_4: {
				maxlength: 5000,
				minlength: 50
			},
			case_study_5: {
				maxlength: 5000,
				minlength: 50
			},
			initiative_strategy: {
				maxlength: 5000,
				minlength: 50
			},
			initiative_end_date: {
				greater_than: '[name=initiative_start_date]'
			}
		},
		messages: {
			case_study_4: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			case_study_5: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			initiative_strategy: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			initiative_end_date: {
				greater_than: 'End Date should be greater than Start Date'
			}
		}
	});
</script>

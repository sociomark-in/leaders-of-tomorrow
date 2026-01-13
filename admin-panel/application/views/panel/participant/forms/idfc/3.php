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
		<!-- 3. CASE STUDIES -->
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Innovation & Initiative Overview<sup class="text-danger">&ast;</sup></h5>
				</legend>
				<!-- <p class="text-muted"></p> -->
			</div>
			<div class="row g-3 flex-row-reverse">
				<div class="col-lg-4">
					<div class="bg-light p-3">
						<p>Please cover:</p>
						<ul>
							<li>The problem/opportunity you aimed to address</li>
							<li>The innovation or distinctive approach (product, process, technology, business model, market entry, etc.)</li>
							<li>How this initiative aligns with your overall business strategy</li>
						</ul>
					</div>
				</div>
				<div class="col-xl-8 col-12">
					<div class="">
						<label for="" class="form-label">Describe the key initiative/product/service or business transformation your organisation implemented between April 01, 2023 and March 31, 2025? </label>
						<textarea required name="case_study_1" id="" class="form-control" maxlength="5000" rows="5"><?= $application_temp['id_255301'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Measurable Outcomes & Business Impact<sup class="text-danger">&ast;</sup></h5>
				</legend>
			</div>
			<div class="row g-3 flex-row-reverse">
				<div class="col-lg-4">
					<div class="p-3 bg-light">
						<p>Wherever possible, include metrics such as (as applicable):</p>
						<ul>
							<li>Revenue growth, profitability, or margin improvement</li>
							<li>Operational efficiency, productivity gains, or cost optimisation</li>
							<li>Customer acquisition/retention, NPS/CSAT, market share</li>
							<li>Sustainability/ESG improvements (e.g., waste reduction, energy savings)</li>
						</ul>
						<p>Avoid generic statements; focus on specific, measurable results</p>
					</div>
				</div>
				<div class="col-xl-8">
					<div class="">
						<label for="" class="form-label">Share the quantifiable outcomes achieved during the eligibility period because of this initiative </label>
						<textarea required name="case_study_2" id="" class="form-control" maxlength="5000" rows="5"><?= $application_temp['id_255302'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Scalability & Future Growth Plan<sup class="text-danger">&ast;</sup></h5>
				</legend>
			</div>
			<div class="row g-3 flex-row-reverse">
				<div class="col-lg-4">
					<div class="p-3 bg-light">
						<p>You may highlight:</p>
						<ul>
							<li>Planned geographic or market expansion</li>
							<li>Technology upgrades or digital transformation roadmap</li>
							<li>Talent and capability building</li>
							<li>Investments in capacity, R&D, partnerships</li>
							<li>How you will ensure long-term sustainability and competitiveness</li>
						</ul>

					</div>
				</div>
				<div class="col-xl-8">
					<div class="">
						<label for="" class="form-label">Explain how you plan to scale this initiative and your business over the next 3–5 years</label>
						<textarea required name="case_study_3" id="" class="form-control" maxlength="5000" rows="5"><?= $application_temp['id_255303'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<!-- 3. CASE STUDIES -->
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
			case_study_3: {
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
			case_study_1: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			case_study_2: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			case_study_3: {
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

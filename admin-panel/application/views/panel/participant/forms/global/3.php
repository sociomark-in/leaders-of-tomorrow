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
					<h5>Export & International Expansion Strategy<sup class="text-danger">&ast;</sup></h5>
				</legend>
				<!-- <p class="text-muted"></p> -->
			</div>
			<div class="row g-3 flex-row-reverse">
				<div class="col-lg-4">
					<div class="bg-light p-3">
						<p>You may include:</p>
						<ul>
							<li>New markets entered or existing ones deepened</li>
							<li>Channels used (distributors, e-commerce, direct sales, partnerships)</li>
							<li>Product/service adaptations for global markets</li>
							<li>Investments in capacity, certifications, or capabilities for international business</li>
						</ul>
					</div>
				</div>
				<div class="col-xl-8 col-12">
					<div class="">
						<label for="" class="form-label">Describe your key export/international business strategy adopted during April 01, 2023, to March 31, 2025, that has led to business success. What was the problem that you aimed to address through the initiative/product/service? </label>
						<textarea required name="case_study_1" id="" class="form-control" maxlength="5000" rows="5"><?= $application_temp['id_255301'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>International Positioning & Differentiation<sup class="text-danger">&ast;</sup></h5>
				</legend>
			</div>
			<div class="row g-3 flex-row-reverse">
				<div class="col-lg-4">
					
				</div>
				<div class="col-xl-8">
					<div class="">
						<label for="" class="form-label">How are your products/services positioned internationally (price, quality, niche, brand, innovation)? What sets you apart from global competitors?</label>
						<textarea required name="case_study_2" id="" class="form-control" maxlength="5000" rows="5"><?= $application_temp['id_255302'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Measurable outcomes/Business Impact<sup class="text-danger">&ast;</sup></h5>
				</legend>
			</div>
			<div class="row g-3 flex-row-reverse">
				<div class="col-lg-4">
					<div class="p-3 bg-light">
						<p>You may include:</p>
						<ul>
							<li>Export revenue growth and share of total business</li>
							<li>Number of new markets/customers/distributors added</li>
							<li>Improvement in margins, order sizes, repeat business</li>
							<li>Recognition through global certifications, awards, or key marquee clients</li>
						</ul>
					</div>
				</div>
				<div class="col-xl-8">
					<div class="">
						<label for="" class="form-label">Explain the measurable outcomes achieved in this period.</label>
						<textarea required name="case_study_3" id="" class="form-control" maxlength="5000" rows="5"><?= $application_temp['id_255303'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Building a Future-Ready Global Enterprise<sup class="text-danger">&ast;</sup></h5>
				</legend>
			</div>
			<div class="row g-3 flex-row-reverse">
				<div class="col-lg-4">
					<div class="p-3 bg-light">
						<p>You may highlight:</p>
						<ul>
							<li>Target regions/segments and go-to-market approach</li>
							<li>Continuous improvement in quality/compliance/sustainability</li>
							<li>Digital, logistics, and supply-chain strategies for global competitiveness</li>
							<li>Role of innovation and partnerships in your global journey</li>
						</ul>

					</div>
				</div>
				<div class="col-xl-8">
					<div class="">
						<label for="" class="form-label">Describe how you plan to strengthen and scale your global business over the next 3–5 years</label>
						<textarea required name="case_study_4" id="" class="form-control" maxlength="5000" rows="5"><?= $application_temp['id_255304'] ?></textarea>
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
			case_study_4: {
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
			case_study_4: {
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

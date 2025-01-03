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

	<fieldset class="mb-3">
		<div class="mb-3">
			<legend class="card-title mb-0">
				<h5>Initiative / Product / Service<sup class="text-danger">&ast;</sup></h5>
			</legend>
			<p>(The initiative or innovation can be a new product/ solution development, digitization, technical innovation, process improvement, entering new market, etc.)</p>
		</div>
		<div class="row g-3">
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Name of the initiative or product/service offering</label>
					<input required type="text" name="initiative_name" value="<?= $application_temp['id_75520'] ?>" class="form-control">
				</div>
			</div>
			<div class="col-xl-3 col-12">
				<div class="">
					<label for="" class="form-label">Start Date</label>
					<input required type="text" data-type="date" name="initiative_start_date" value="<?= $application_temp['id_75521'] ?>" class="form-control">
					<span class="form-text">(in DD/MM/YYYY)</span>
				</div>
			</div>
			<div class="col-xl-3 col-12">
				<div class="">
					<label for="" class="form-label">End Date</label>
					<input required type="text" data-type="date" name="initiative_end_date" value="<?= $application_temp['id_75522'] ?>" class="form-control">
					<span class="form-text">(in DD/MM/YYYY)</span>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Describe the initiative/product/service that you organization has developed between the period of April 01, 2022, to March 31, 2023 that has led to business success. What was the problem that you aimed to address through the initiative/product/service?</label>
					<textarea required name="initiative_desc" id="" class="form-control" maxlength="500" rows="5"> <?= $application_temp['id_75523'] ?></textarea>
					<span class="form-text">(50 - 5000 characters)</span>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Highlight the challenges faced by you as an MSME to implement the initiative or product/service offering mentioned above and how did the organization overcome these challenges?</label>
					<textarea required name="initiative_challenges" id="" class="form-control" maxlength="500" rows="5"> <?= $application_temp['id_75524'] ?></textarea>
					<span class="form-text">(50 - 5000 characters)</span>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Elaborate on your go-market-strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors.</label>
					<textarea required name="initiative_strategy" id="" class="form-control" maxlength="500" rows="5"> <?= $application_temp['id_75525'] ?></textarea>
					<span class="form-text">(50 - 5000 characters)</span>
				</div>
			</div>
		</div>
	</fieldset>
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
			initiative_desc: {
				maxlength: 5000,
				minlength: 50
			},
			initiative_challenges: {
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
			initiative_desc: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			initiative_challenges: {
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

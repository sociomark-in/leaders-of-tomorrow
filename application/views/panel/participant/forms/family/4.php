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
		<div class="col-12">
			<fieldset class="">
				<div class="mb-3">
					<legend class="card-title mb-0">
						<h5>Business Performance and Market Impact<sup class="text-danger">&ast;</sup></h5>
					</legend>
				</div>
				<div class="row g-3">
					<div class="col-12">
						<div class="">
							<label for="" class="form-label">What have been the major challenges your family business has faced, and how did you overcome them? Please provide specific examples of challenges in areas such as management, market expansion, or technology integration</label>
							<textarea required name="case_study_3" id="" class="form-control" maxlength="500" rows="5"> <?= $application_temp['id_255303'] ?></textarea>
							<span class="form-text">(50 - 5000 characters)</span>
						</div>
					</div>
					<div class="col-12">
						<div class="">
							<label for="" class="form-label">Outline your growth trajectory over the past 10 years, providing specific metrics such as revenue growth, market share, or client acquisition</label>
							<textarea required name="case_study_4" id="" class="form-control" maxlength="500" rows="5"> <?= $application_temp['id_255304'] ?></textarea>
							<span class="form-text">(50 - 5000 characters)</span>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
		<div class="col-12">
			<fieldset class="">
				<div class="mb-3">
					<legend class="card-title mb-0">
						<h5>Scalability and Future Readiness<sup class="text-danger">&ast;</sup></h5>
					</legend>
				</div>
				<div class="row g-3">
					<div class="col-12">
						<div class="">
							<label for="" class="form-label">How have you handled economic or market downturns, and what strategies have you implemented to ensure business continuity and growth in challenging times.</label>
							<textarea required name="case_study_5" id="" class="form-control" maxlength="500" rows="5"> <?= $application_temp['id_255305'] ?></textarea>
							<span class="form-text">(50 - 5000 characters)</span>
						</div>
					</div>
				</div>
			</fieldset>
		</div>
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
			case_study_3: {
				maxlength: 5000,
				minlength: 50
			},
			case_study_4: {
				maxlength: 5000,
				minlength: 50
			},
			case_study_5: {
				maxlength: 5000,
				minlength: 50
			},
			initiative_end_date: {
				greater_than: '[name=initiative_start_date]'
			}
		},
		messages: {
			case_study_3: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			case_study_4: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			case_study_5: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			initiative_end_date: {
				greater_than: 'End Date should be greater than Start Date'
			}
		}
	});
</script>

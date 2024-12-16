<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_03']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<input type="hidden" name="referrer" value="<?= $referrer ?>">
	<!-- 
		74516 case_study_1
		74517 case_study_2
		74518 case_study_3
		74519
	 -->
	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Case Studies (Part 1 / 2)</h5>
		</legend>
		<div class="row g-3">
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Describe your journey as an entrepreneur. What was your inspiration behind setting up your organization? (Max 150 words)</label>
					<textarea required name="case_study_1" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74516'] ?></textarea>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Highlight the key initiatives taken by you within the organization in the past 2 years which led to business growth and success (Max 150 words)</label>
					<textarea required name="case_study_3" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74518'] ?></textarea>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Elaborate on the impact of these initiatives on the various stakeholders of your organization such as customers, employees, MSME industry, etc. (Max 150 words)</label>
					<textarea required name="case_study_4" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74519'] ?></textarea>
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
	$.validator.addMethod("wordCount", function(value, element, wordCount) {

		return value.split(' ').length <= wordCount;

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
			overview: {
				maxlength: 5000,
				minlength: 50
			},
			mission_stmt: {
				maxlength: 5000,
				minlength: 50
			},
			services_stmt: {
				maxlength: 5000,
				minlength: 50
			},
		},
		messages: {
			overview: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			mission_stmt: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			services_stmt: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
		}
	});
</script>

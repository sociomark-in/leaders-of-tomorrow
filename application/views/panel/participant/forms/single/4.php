<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_04']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<input type="hidden" name="referrer" value="<?= $referrer ?>">
	<!-- 
		74518 case_study_3
		74519 case_study_4
		74520 case_study_5
		74521 case_study_6
		74522 case_study_7
		74523 case_study_8
		74524 case_study_9
	 -->

	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>
				<h5>Case Studies (Part 2 / 2)</h5>
			</h5>
		</legend>
		<div class="row g-3">
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Highlight the key milestones achieved by you as an entrepreneur during your journey. What are you key differentiating factors from your competitors? (Max 150 words)</label>
					<textarea required name="case_study_5" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74520'] ?></textarea>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">
						How do you plan to scale up your business in the next 2 years. Highlight the following parameters (max 200 words)
						Growth plan for next 2-3 years
						Project/Initiative/Solutions you aim to introduce in the future for business growth
						Plan for raising funds in future
						Any other

					</label>
					<textarea required name="case_study_6" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74521'] ?></textarea>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">How do you envision contributing to the growth of the MSME sector in the coming years? (Max 150 words)</label>
					<textarea required name="case_study_7" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74522'] ?></textarea>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Why should you win the Award in this category? (Max 50 words)</label>
					<textarea required name="case_study_8" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74523'] ?></textarea>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Is there any other information you would like to provide to support and strengthen your application? For example: Awards, recognitions, etc. (Max 100 words)</label>
					<textarea required name="case_study_9" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74524'] ?></textarea>
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
	$("#form_option_04").validate({
		ignore: [
			":hidden", ":focus"
		],
		rules: {
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

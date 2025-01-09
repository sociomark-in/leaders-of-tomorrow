<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_03']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<input type="hidden" name="referrer" value="<?= $referrer ?>">

	<!-- 
	75526	initiative_tech
	75527	initiative_impact	
	75528	initiative_scalability	
	75529	initiative_info	
 	-->

	<div class="row g-3 g-md-4">
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Social Responsibility and Community Impact<sup class="text-danger">&ast;</sup></h5>
				</legend>
			</div>
			<div class="row g-3">
				<div class="col-12">
					<div class="">
						<label for="" class="form-label">How has your work contributed to the welfare of society or the environment? Describe the social or environmental outcomes achieved through your initiatives.</label>
						<textarea required name="case_study_4" id="" class="form-control" maxlength="500" rows="5"> <?= $application_temp['id_255304'] ?></textarea>
						<span class="form-text">(Max 200 words)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<div class="mb-3">
				<legend class="card-title mb-0">
					<h5>Scalability and Future Plans<sup class="text-danger">&ast;</sup></h5>
				</legend>
			</div>
			<div class="row g-3">
				<div class="col-12">
					<div class="">
						<label for="" class="form-label">What is your long-term vision for the initiative, and how do you plan to scale its impact in the future?</label>
						<textarea required name="case_study_5" id="" class="form-control" maxlength="500" rows="5"> <?= $application_temp['id_255305'] ?></textarea>
						<span class="form-text">(Max 200 words)</span>
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
	$.validator.addMethod("wordCount", function(value, element, wordCount) {

		return value.split(' ').length <= wordCount;

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
		}
	});
</script>

<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_02']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">

	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Organization Overview</h5>
		</legend>
		<div class="row g-3">
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Brief Overview of the Company</label>
					<textarea required name="overview" id="" class="form-control" maxlength="500" rows="5"></textarea>
				</div>
			</div>
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Mission & Vision</label>
					<textarea required name="mission_stmt" id="" class="form-control" maxlength="500" rows="5"></textarea>
				</div>
			</div>
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Products / Services Offered</label>
					<textarea required name="services_stmt" id="" class="form-control" maxlength="500" rows="5"></textarea>
				</div>
			</div>
		</div>
	</fieldset>

	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Financial Details</h5>
		</legend>
		<div class="row g-3">
			<div class="col-xxl-4 col-12">

			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				FY 2023
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				FY 2022
			</div>
			<div class="col-xxl-4 col-12">
				Revenue/ Turnover (in INR Crores)
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="turnover_24" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="turnover_23" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-12">
				Revenue Growth (In %)
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="growth_24" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="growth_23" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
		</div>
	</fieldset>
</div>
<div class="row g-3">
	<div class="col-md-auto">
		<button type="reset" class="btn btn-outline-secondary">Reset Form</button>
	</div>
	<div class="col-md-auto">
		<button type="submit" class="btn btn-primary">Save and Next</button>
	</div>
</div>
<?= form_close() ?>
<script>
	$.validator.addMethod("wordCount", function(value, element, wordCount) {

		return value.split(' ').length <= wordCount;

	});
	$("#form_option_02").validate({
		ignore: [
			":hidden", ":focus"
		],
		rules: {
			overview: {
				wordCount: 300
			},
			mission_stmt: {
				wordCount: 300
			},
			services_stmt: {
				wordCount: 300
			},
		},
		messages: {
			overview: {
				wordCount: "Error"
			},
			mission_stmt: {
				wordCount: "Error"
			},
			services_stmt: {
				wordCount: "Error"
			},
		}
	});
</script>

<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_02']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<input type="hidden" name="referrer" value="<?= $referrer ?>">
	<!-- 
	74509	organization[overview]	
	74510	organization[mission_stmt]	
	74511	organization[services_stmt]	
	74512	finance[turnover_24]	
	74513	finance[turnover_23]	
	74514	finance[growth_24]	
	74515	finance[growth_23]	
 -->
	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Organization Overview<span class="text-danger">&ast;</span></h5>
		</legend>
		<div class="row g-3">
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Brief Overview of the Company</label>
					<textarea required name="organization[overview]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74509'] ?></textarea>
				</div>
			</div>
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Mission & Vision</label>
					<textarea required name="organization[mission_stmt]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74510'] ?></textarea>
				</div>
			</div>
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Products / Services Offered</label>
					<textarea required name="organization[services_stmt]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74511'] ?></textarea>
				</div>
			</div>
		</div>
	</fieldset>
	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Financial Details<span class="text-danger">&ast;</span></h5>
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
				<select required name="finance[turnover_24]" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option <?= ($application['id_74512'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="finance[turnover_23]" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option <?= ($application['id_74513'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-12">
				Revenue Growth (In %)
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="finance[growth_24]" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option <?= ($application['id_74514'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="finance[growth_23]" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option <?= ($application['id_74515'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
		</div>
	</fieldset>
</div>
<div class="row g-3">
	<div class="col-md-auto">
		<?php
		$s = $stage;
		$s--;
		?>
		<a href="<?= base_url('dashboard/application/' . $application_id . '?stage=' . $s) ?>" class="btn btn-outline-secondary">Reset This Section</a>
		<!-- <button type="reset" class="btn btn-outline-secondary">Reset This Section</button> -->
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

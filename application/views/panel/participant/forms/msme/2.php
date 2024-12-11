<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_02']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<input type="hidden" name="referrer" value="<?= $referrer ?>">
	<!-- 
	75508	organization_mission_vision	
	75509	organization_services	
	75510	organization_reveue_23	
	75511	organization_reveue_22	
	75512	organization_growth_23	
	75513	organization_growth_22	
	75514	organization_profit_23	
	75515	organization_profit_22	
	75516	organization_assets_23	
	75517	organization_assets_22	
	75518	organization_der_23	
	75519	organization_der_22
 -->
	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Organization Overview</h5>
		</legend>
		<div class="row g-3">
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Industry segment of the participating entity</label>
					<input type="text" name="organization_industry" class="form-control" required>
				</div>
			</div>
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Brief Overview of the Company</label>
					<textarea required name="organization_overview" id="" class="form-control" rows="5"></textarea>
				</div>
			</div>
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Mission & Vision</label>
					<textarea required name="organization_mission_vision" id="" class="form-control" rows="5"></textarea>
				</div>
			</div>
			<div class="col-xl-6 col-12">
				<div class="">
					<label for="" class="form-label">Products / Services Offered</label>
					<textarea required name="organization_services" id="" class="form-control" rows="5"></textarea>
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
				<select required name="organization_revenue_23" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="organization_revenue_22" id="" class="form-select">
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
				<select required name="organization_growth_23" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="organization_growth_22" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-12">
				Net Profit Margin (In %)
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="organization_profit_23" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="organization_profit_22" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-12">
				Asset Valuation (in INR Crores)
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="organization_assets_23" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="organization_assets_22" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-12">
				Debt: Equity Ratio
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="organization_der_23" id="" class="form-select">
					<option value="">Select Option</option>
					<?php for ($i = 0; $i < 10; $i++) : ?>
						<option value="Select <?= $i ?>">Select <?= $i ?></option>
					<?php endfor ?>
				</select>
			</div>
			<div class="col-xxl-4 col-lg-6 col-12">
				<select required name="organization_der_22" id="" class="form-select">
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
		<a href="<?= base_url('dashboard/application/' . $application_id . '?stage=' . $stage - 1) ?>" class="btn btn-outline-secondary">Back</a>
	</div>
	<div class="col-md-auto">
		<button type="submit" class="btn btn-primary">Save and Next</button>
	</div>
	<div class="col-md-auto">
		<button type="reset" class="btn btn-outline-secondary">Reset Form</button>
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
			organization_overview: {
				maxlength: 5000,
				minlength: 50
			},
			organization_mission_vision: {
				maxlength: 5000,
				minlength: 50
			},
			organization_services: {
				maxlength: 5000,
				minlength: 50
			},
			services_stmt: {
				wordCount: 300
			},
		},
		messages: {
			overview: {
				wordCount: "Error"
			},
			organization_overview: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			organization_mission_vision: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			organization_services: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			services_stmt: {
				wordCount: "Error"
			},
		}
	});
</script>

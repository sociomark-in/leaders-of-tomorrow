<?= form_open_multipart('api/v2/awards/nomination/single/new') ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Personal Information</h5>
		</legend>
		<div class="row g-3">
			<div class="col-xl-4 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Full Name of Individual</label>
					<input type="text" name="applicant[name]" class="form-control">
				</div>
			</div>
			<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Designation</label>
					<input type="text" name="applicant[designation]" class="form-control">
				</div>
			</div>
			<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Date of Birth</label>
					<input type="text" name="applicant[dob]" class="form-control">
				</div>
			</div>
			<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Total Years of Experience</label>
					<input type="text" name="applicant[experience]" class="form-control">
					<span class="form-text">As On <?= date('F j, Y') ?></span>
				</div>
			</div>
		</div>
	</fieldset>
	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Current Organization</h5>
		</legend>
		<div class="row g-3">
			<div class="col-xl-5 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Name of the Current Organization</label>
					<input type="text" name="organization[name]" class="form-control">
				</div>
			</div>
			<div class="col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Type of Business</label>
					<select name="organization[type]" id="" class="form-select">
						<option value="">Select Option</option>
						<?php for ($i = 0; $i < 10; $i++) : ?>
							<option value="Select <?= $i ?>">Select <?= $i ?></option>
						<?php endfor ?>
					</select>
				</div>
			</div>
			<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Years of Experience</label>
					<input type="text" name="organization[experience]" class="form-control">
					<span class="form-text">As On <?= date('F j, Y') ?></span>
				</div>
			</div>
			<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Business Segment</label>
					<select name="organization[segment]" id="" class="form-select">
						<option value="">Select Option</option>
						<?php for ($i = 0; $i < 10; $i++) : ?>
							<option value="Select <?= $i ?>">Select <?= $i ?></option>
						<?php endfor ?>
					</select>
				</div>
			</div>
			<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Date of Company Incorporation</label>
					<input type="text" name="organization[inc_date]" class="form-control">
					<span class="form-text">(in DD/MM/YYYY)</span>
				</div>
			</div>
			<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">No. Of Employees</label>
					<select name="organization[size]" id="" class="form-select">
						<option value="">Select Option</option>
						<?php for ($i = 0; $i < 10; $i++) : ?>
							<option value="Select <?= $i ?>">Select <?= $i ?></option>
						<?php endfor ?>
					</select>
					<span class="form-text">(On payroll + On contract)</span>
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Website URL</label>
					<input type="text" name="organization[website]" class="form-control">
				</div>
			</div>
			<div class="col-xl-4 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">LinkedIn URL</label>
					<input type="text" name="organization[linkedin]" class="form-control">
				</div>
			</div>
		</div>
	</fieldset>
	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Contact Person of Organization</h5>
		</legend>
		<div class="row g-3">
			<div class="col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Full Name of Individual</label>
					<input name="contact_person[name]" type="text" class="form-control">
				</div>
			</div>
			<div class="col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Email Address</label>
					<input name="contact_person[email]" type="text" class="form-control">
				</div>
			</div>
			<div class="col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Contact Number</label>
					<input name="contact_person[contact]" type="text" class="form-control">
				</div>
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

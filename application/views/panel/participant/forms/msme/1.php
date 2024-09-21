<?= form_open_multipart('api/v2/awards/nomination/single/new') ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<fieldset class="mb-3">
		<legend class="card-title mb-0">
			<h5>Participating Entity</h5>
		</legend>
		<div class="row g-3">
			<div class="col-xl-5 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Name of the Participating Entity</label>
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
					<input required type="text" data-type="date" name="organization[inc_date]" class="form-control">
					<span class="form-text">(in DD/MM/YYYY)</span>
				</div>
			</div>
			<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">No. Of Employees</label>
					<select required name="organization[size]" id="" class="form-select">
						<option value="">Select Option</option>
						<option value="Less Than 50">Less Than 50</option>
						<option value="50 - 100">50 - 100</option>
						<option value="100 - 200">100 - 200</option>
						<option value="200 - 400">200 - 400</option>
						<option value="More Than 400">More Than 400</option>
					</select>
					<span class="form-text">(On payroll + On contract)</span>
				</div>
			</div>
			<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
				<div class="">
					<label for="" class="form-label">Funding Source</label>
					<select required name="organization[funding]" id="" class="form-select">
						<option value="">Select Option</option>
						<option value="Personal funds of the owner">Personal funds of the owner</option>
						<option value="Business Loans">Business Loans</option>
						<option value="Loan from family / friends">Loan from family / friends</option>
						<option value="Loan from Banks / NBFCs">Loan from Banks / NBFCs</option>
					</select>
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

<?php
$data['category'] = $category;
$this->load->view('components/panel/partials/_category_eligibility_requirements', $data); ?>

<script src="https://cdn.jsdelivr.net/npm/country-state-city@3.2.2/dist/country-state-city.min.js"></script>

<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_01']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<input type="hidden" name="referrer" value="<?= $referrer ?>">
	<div class="row g-3 g-md-4">
		<fieldset class="col-12">
			<legend class="card-title mb-0">
				<h5>Participating Entity<sup class="text-danger">&ast;</sup></h5>
			</legend>
			<div class="row g-3">
				<div class="col-xl-6 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Name of the Participating Entity</label>
						<input required type="text" name="organization[name]" class="form-control">
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Name of the Applicant (MD/CEO/Founder or equivalent)</label>
						<input required type="text" name="name" class="form-control">
					</div>
				</div>
				<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Designation</label>
						<input required type="text" name="designation" class="form-control">
					</div>
				</div>
				<!-- <div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Date of Birth</label>
						<input required type="text" data-type="date" name="dob" class="form-control">
						<span class="form-text">(in DD/MM/YYYY)</span>
					</div>
				</div> -->
				<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Business Segment</label>
						<select required name="organization[segment]" id="" class="form-select">
							<option value="">Select Business Segment</option>
							<option value="Micro">Micro</option>
							<option value="Small">Small</option>
							<option value="Medium">Medium</option>
						</select>
					</div>
				</div>
				<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Date of Company Incorporation</label>
						<input required type="text" data-type="date" name="organization[inc_date]" class="form-control">
						<span class="form-text">(in DD/MM/YYYY)</span>
					</div>
				</div>
				<!-- <div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Total Years of Experience</label>
						<input required type="text" name="experience[total]" class="form-control">
					</div>
				</div>
				<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Years of Experience in this Company</label>
						<input required type="text" name="experience[current]" class="form-control">
					</div>
				</div> -->
				<div class="col-12">
					<div class="row g-3">
						<div class="col-12">
							<label for="" class="form-label">Registered Address Participating Entity</label>
							<input required type="text" name="organization[address][line_1]" class="form-control mb-2">
							<input type="text" name="organization[address][line_2]" class="form-control mb-2">
							<input type="text" name="organization[address][line_3]" class="form-control mb-2">
						</div>
						<div class="col-xl-4 col-lg-6 col-12">
							<label for="" class="form-label">State</label>
							<!-- <input type="text" placeholder="" name="organization[address][state]" value="<?= $application['organization_state'] ?>" class="form-control"> -->
							<select required name="organization[address][state]" id="stateSelect" class="form-select">
								<option value="">Select State</option>
								<?php foreach ($locations['states'] as $key => $option)  : ?>
									<option value="<?= $option['title'] ?>"><?= $option['title'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-xl-4 col-lg-6 col-12">
							<label for="" class="form-label">City</label>
							<select required name="organization[address][city]" id="citySelect" class="form-select">
								<option value="">Select City</option>
								<?php foreach ($locations['cities'] as $key => $option)  : ?>
									<option value="<?= $option['city_name'] ?>"><?= $option['city_name'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<script>
					const stateSelect = document.getElementById("stateSelect");
					const citySelect = document.getElementById("citySelect");

					// Get all states of India
					const states = csc.getStatesOfCountry('IN');

					// Populate state select
					states.forEach(state => {
						const option = document.createElement("option");
						option.value = state.isoCode;
						option.text = state.name;
						stateSelect.appendChild(option);
					});

					// Event listener for state change
					stateSelect.addEventListener("change", () => {
						const selectedState = stateSelect.value;

						// Get cities of the selected state
						const cities = csc.getCitiesOfState('IN', selectedState);

						citySelect.innerHTML = ""; // Clear previous cities

						// Add "Select City" option
						const selectCityOption = document.createElement("option");
						selectCityOption.value = "";
						selectCityOption.text = "Select City";
						citySelect.appendChild(selectCityOption);

						// Populate city select
						cities.forEach(city => {
							const option = document.createElement("option");
							option.value = city.name;
							option.text = city.name;
							citySelect.appendChild(option);
						});
					});
				</script>


				<!-- <div class="col-xxl-3 col-xl-4 col-12">
					<div class="">
						<label for="" class="form-label">Type of Business</label>
						<select required name="organization[business]" id="" class="form-select">
							<option value="">Select Business Type</option>
							<option value="Manufacturing">Manufacturing</option>
							<option value="Service">Service</option>
						</select>
					</div>
				</div> -->
				<div class="col-xxl-3 col-xl-4 col-12">
					<div class="">
						<label for="" class="form-label">Type of Ownership</label>
						<select required name="organization[ownership]" id="" class="form-select">
							<option value="">Select Ownership Type</option>
							<option value="Sole Proprietorship">Sole Proprietorship</option>
							<option value="Partnership">Partnership</option>
							<option value="Private Limited">Private Limited</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-8 col-12">
					<div class="">
						<label for="" class="form-label">Website URL</label>
						<input type="text" placeholder="https://www.domain.xyz" name="organization[url]" class="form-control">
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<legend class="card-title mb-0">
				<h5>Contact Person of Organization<sup class="text-danger">&ast;</sup></h5>
			</legend>
			<div class="row g-3">
				<!-- <div class="col-12">
				<div class="">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" value="" id="PoCCheck" checked>
						<label class="form-check-label" for="PoCCheck">
							Same As Login
						</label>
					</div>
				</div>
				<script>
					$(document).ready(function() {
						$("#PoCCheck").on('change', () => {
							if ($(this).is(':checked')) {
								$("sectionChange").addClass('d-none');
							} else {
								console.log("Not Checked");
								$("sectionChange").removeClass('d-none');
							}
						});​
					})
				</script>
			</div> -->
				<div id="sectionChange" class="col-12">
					<div class="row g-3">
						<div class="col-xl-3 col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Full Name of Individual</label>
								<input required name="contact_person[name]" value="<?= $user['name'] ?>" type="text" class="form-control">
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Email Address</label>
								<input required name="contact_person[email]" value="<?= $user['email'] ?>" type="email" class="form-control">
							</div>
						</div>
						<div class="col-xl-3 col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Contact Number</label>
								<input required name="contact_person[contact]" value="<?= $user['contact'] ?>" minlength="10" maxlength="10" type="text" class="form-control">
							</div>
						</div>
					</div>
				</div>
			</div>
		</fieldset>
	</div>
</div>
<div class="row g-3">
	<div class="col-md-auto">
		<button type="button" data-bs-toggle="modal" data-bs-target="#consentModal" class="btn btn-primary">Save and Next</button>
	</div>
	<div class="col-md-auto">
		<button type="reset" class="btn btn-outline-secondary">Reset This Section</button>
	</div>
</div>
<div class="modal fade" id="consentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Alert Dialogue</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Details on this page cannot be changed once saved. Please confirm before saving.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Make Changes</button>
				<button type="submit" class="btn btn-primary">Save and Continue</button>
			</div>
		</div>
	</div>
</div>
<?= form_close() ?>
<script>
	$.validator.addMethod("emailregex", function(value, element) {
		return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
	})
	$.validator.addMethod("ddmmyyyyregex", function(value, element) {
		return this.optional(element) || /^(0?[1-9]|[1-2][0-9]|3[0-1])\/(0?[1-9]|1[0-2])\/[1-9]\d{3}$/i.test(value);
	})
	$.validator.addMethod("letters", function(value, element) {
		return this.optional(element) || /^[a-zA-Z\s]*$/i.test(value);
	});
	$.validator.addMethod("phone", function(value, element) {
		return this.optional(element) || /^[0-9]*$/i.test(value);
	});
	$("#form_option_01").validate({

		rules: {
			"name": {
				letters: true,
			},
			"organization[address][state]": {
				letters: true,
			},
			"organization[address][city]": {
				letters: true,
			},
			'organization[inc_date]': {
				ddmmyyyyregex: true,
			},

			"contact_person[name]": {
				letters: true,
			},
			"contact_person[email]": {
				emailregex: true
			},
			"contact_person[contact]": {
				phone: true
			}
		},
		messages: {
			'name': {
				letters: "Please enter a valid name."
			},
			'organization[address][state]': {
				letters: "Please enter a valid State."
			},
			'organization[address][city]': {
				letters: "Please enter a valid City."
			},
			'organization[inc_date]': {
				ddmmyyyyregex: "Please enter a valid date!"
			},

			'contact_person[name]': {
				letters: "Please enter a valid name."
			},
			'contact_person[email]': {
				emailregex: 'Please enter a valid email address.'
			},
			'contact_person[contact]': {
				phone: 'Please enter a valid contact number'
			}
		}
	});
</script>

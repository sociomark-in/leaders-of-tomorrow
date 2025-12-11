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
						<label for="" class="form-label">Participating Entity (Organization Name)</label>
						<input required type="text" name="organization[name]" class="form-control">
					</div>
				</div>
				<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Industry Sector</label>
						<input required type="text" name="organization[industry]" class="form-control">
					</div>
				</div>
				<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
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
				<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Date of Company Incorporation</label>
						<input required type="text" data-type="date" name="organization[inc_date]" class="form-control">
						<span class="form-text">(in DD/MM/YYYY)</span>
					</div>
				</div>
				<div class="col-12">
					<div class="row g-3">
						<div class="col-12">
							<label for="" class="form-label">Registered Address Participating Entity</label>
							<input required type="text" name="organization[address][line_1]" class="form-control mb-2">
							<input type="text" name="organization[address][line_2]" class="form-control mb-2">
							<input type="text" name="organization[address][line_3]" class="form-control mb-2">
						</div>
						<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
							<label for="" class="form-label">State</label>
							<!-- <input type="text" placeholder="" name="organization[address][state]" value="<?= $application['organization_state'] ?>" class="form-control"> -->
							<select required name="organization[address][state]" id="stateSelect" data-placeholder="Select State" class="form-select">
								<option value="">Select State</option>
								<?php foreach ($locations['states'] as $key => $option) : ?>
									<option value="<?= $option['city_state'] ?>"><?= $option['city_state'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
							<label for="" class="form-label">City</label>
							<select required name="organization[address][city]" id="citySelect" class="form-select">
								<option value="">Select City</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-xxl-3 col-xl-4 col-12">
					<div class="">
						<label for="" class="form-label">Type of Ownership</label>
						<select required name="organization[ownership]" id="my-select" class="form-select mb-1">
							<option value="">Select Ownership Type</option>
							<option value="Sole Proprietorship">Sole Proprietorship</option>
							<option value="Partnership">Partnership</option>
							<option value="Private Limited">Private Limited</option>
							<option value="Other">Other (Please Specify)</option>
						</select>
						<div id="other-text-input" style="display:none;">
							<input type="text" class="form-control mt-2" name="organization[ownership]">
						</div>

						<script>
							$(document).ready(function() {

								const $select = $('#my-select');
								const $otherContainer = $('#other-text-input');
								const $otherInput = $('#other-text-input input');

								// 2. Listen for changes on the Select2 element
								$select.on('change', function() {
									const selectedValue = $select.val();
									console.log(selectedValue);


									if (selectedValue === 'Other') {
										$otherContainer.slideDown(200, function() {
											$otherInput.focus();
										});
										$otherInput.prop('required', true);

									} else {
										$otherContainer.slideUp(200);
										$otherInput.val(selectedValue);
										$otherInput.prop('required', false);
									}
								});
								$select.trigger('change');
							});
						</script>
					</div>
				</div>
				<div class="col-xxl-3 col-xl-4 col-12">
					<div class="">
						<label for="" class="form-label">Current Generation Leading Years</label>
						<input type="number" min="0" name="organization[leading]" class="form-control">
						<span class="form-text">Years the current generation has been leading the business</span>
					</div>
				</div>
				<div class="col-xxl-6 col-xl-8 col-12">
					<div class="">
						<label for="" class="form-label">Website URL</label>
						<input type="url" placeholder="https://www.domain.xyz" name="organization[url]" class="form-control">
					</div>
				</div>
				<div class="col-12">
					<!-- EQUITY SPLIT -->
					<label for="" class="form-label">Family Ownership Structure</label>
					<table class="table table-bordered mb-2" id="equityTable">
						<thead>
							<tr>
								<th>Name</th>
								<th>Gender</th>
								<th>Relation to Founder</th>
								<th>Generation</th>
								<th>Designation</th>
								<th>Equity (%)</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
					</table>
					<button type="button" class="btn btn-primary" id="addPartnerButton">Add Partner</button>
					<template id="partnerNode">
						<tr>
							<td>
								<input type="text" class="form-control" name="partner[__INDEX__][name]">
							</td>
							<td>
								<select name="partner[__INDEX__][gender]" class="form-select">
									<option value="">Select Gender</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
									<option value="Other">Other</option>
								</select>
							</td>
							<td>
								<input type="text" class="form-control" name="partner[__INDEX__][relation]">
							</td>
							<td>
								<select name="partner[__INDEX__][generation]" class="form-select">
									<option value="">Select Generation</option>
									<option value="1st">1st</option>
									<option value="2nd">2nd</option>
									<option value="3rd">3rd</option>
									<option value="4th">4th</option>
									<?php for ($j = 5; $j <= 10; $j++): ?>
										<option value="<?= $j ?>th"><?= $j ?>th</option>
									<?php endfor ?>
								</select>
							</td>
							<td>
								<input type="text" class="form-control" name="partner[__INDEX__][designation]">
							</td>
							<td>
								<input type="text" class="form-control" name="partner[__INDEX__][equity]">
							</td>
						</tr>
					</template>
				</div>
				<div class="col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Name of the Applicant (MD/CEO/Founder or equivalent)</label>
						<input required type="text" name="name" class="form-control">
					</div>
				</div>
				<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Designation</label>
						<input required type="text" name="designation" class="form-control">
					</div>
				</div>
				<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Relation to Founder</label>
						<input required type="text" name="founder_relation" class="form-control">
					</div>
				</div>
				<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Date of Birth</label>
						<input required type="text" data-type="date" name="dob" class="form-control">
						<span class="form-text">(in DD/MM/YYYY)</span>
					</div>
				</div>
				<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Gender</label>
						<select required name="gender" class="form-select">
							<option value="">Select Gender</option>
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>
						</select>
					</div>
				</div>
			</div>
		</fieldset>
		<fieldset class="col-12">
			<legend class="card-title mb-0">
				<h5>Primary Contact for Award Coordination<sup class="text-danger">&ast;</sup></h5>
			</legend>
			<div class="row g-3">
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


	$(document).ready(function() {
		// 1. Get references to the elements using jQuery selectors
		const $template = $('#partnerNode');
		const $container = $('#equityTable tbody');
		const $addButton = $('#addPartnerButton');

		// Initialize the counter for the next index number
		// Start at 0 if no items exist on load
		let itemIndex = $container.find('#equityTable tbody tr').length;



		// --- FUNCTION TO ADD AND RENAME THE ITEM ---
		const addPartner = () => {
			// 1. Clone the content
			const templateContent = $template[0].content;
			if (!templateContent) return;

			// Perform a deep clone and wrap it in jQuery
			const cloneFragment = document.importNode(templateContent, true);
			const $newClone = $(cloneFragment);

			// 2. Find all input fields within the clone
			$newClone.find('input, select, textarea').each(function() {
				const $input = $(this);
				let currentName = $input.attr('name');

				// Replace the '__INDEX__' placeholder with the current index number
				if (currentName) {
					currentName = currentName.replace('__INDEX__', itemIndex);
					$input.attr('name', currentName);

					// Optional: Clear the value of the new input
					$input.val('');
				}
			});

			$newClone.find('select').each(function() {
				const $input = $(this);
				let currentName = $input.attr('name');

				// Replace the '__INDEX__' placeholder with the current index number
				if (currentName) {
					currentName = currentName.replace('__INDEX__', itemIndex);
					$input.attr('name', currentName);

					// Optional: Clear the value of the new input
					$input.val('');
				}
			});


			const $selectElement = $newClone.find('select');

			// 4. Append the renamed clone to the container
			$container.append($newClone);

			if ($selectElement.length) {
				$selectElement.select2({
					// You can pass any required Select2 options here
					placeholder: "Select an option",
					allowClear: true,
					width: "100%"
				});
			}

			console.log(itemIndex);
			// 5. Increment the index for the next item
			itemIndex++;
		};

		// --- EVENT LISTENERS ---

		// Attach the add function to the button
		$addButton.on('click', addPartner);

		// Initial load: Add one item automatically if none exist (optional)
		if (itemIndex === 0) {
			addPartner();
		}
	});
</script>

<?php
$category_id = $application['category_id'];
$application_id = $application['nomination_id'] ?? null;
$utm = $utm ?? null;
?>
<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Application for <?= $category['name'] ?> <?= date('Y') ?></h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('my-nominations') ?>">My Applications</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Application</li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-xxl-9 col-12">
			<div class="row py-3">
				<div class="col-12 grid-margin stretch-card">
					<div class="card input-group-card">
						<div class="card-body">
							<div class="col-12 grid-margin stretch-card">
								<?= form_open_multipart('api/v2/awards/nomination/single/edit', ['id' => 'formFullView']) ?>
								<input type="hidden" name="category_id" value="<?= $category_id ?>">
								<input type="hidden" name="application_id" value="<?= $id ?? null ?>">
								<input type="hidden" name="utm" value="<?= $utm ?? null ?>">
								<input type="hidden" name="agent_id" value="<?= $agent_id ?? null ?>">

								<?php
								switch ($category_id) {
									case '1_GLOBAL':
										include_once APPPATH . '/views/panel/participant/applications/edit/global.php';
										break;
									case '1_FAMILY':
										include_once APPPATH . '/views/panel/participant/applications/edit/family.php';
										break;
									case '1_INDIVIDUAL':
										include_once APPPATH . '/views/panel/participant/applications/edit/individual_1.php';
										break;
									case '2_INDIVIDUAL':
										include_once APPPATH . '/views/panel/participant/applications/edit/individual_2.php';
										break;

									default:
										switch (explode('_', $category['type'])[1]) {
											case 'IDFC':
												include_once APPPATH . '/views/panel/participant/applications/edit/idfc.php';
												break;

											default:
												include_once APPPATH . '/views/panel/participant/applications/edit/msme.php';
												break;
										}
										break;
								}
								?>
								<div class="row">
									<div class="col-12">
										<div class="row">
											<div class="col-md-auto">
												<button type="submit" class="btn btn-primary">Confirm and Submit</button>
											</div>
										</div>
									</div>
								</div>
								<?= form_close() ?>
							</div>
							<div class="modal fade" id="uploadInstructionsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="staticBackdropLabel">File Upload Instructions</h1>
										</div>
										<div class="modal-body">
											<div class="row g-3">
												<div class="col-12">
													To make sure your file remains supported for further process:
												</div>
												<div class="col-12">
													<ol>
														<li>PDF Version should be - <strong>
																< 1.4</strong>
														</li>
														<li>PDF Versions for all the Attachments should be same.</li>
														<li>
															For further instructions <a href="#" class="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Click Here</a>
														</li>
													</ol>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
										</div>
									</div>
								</div>
							</div>

							<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
								<div class="modal-dialog modal-dialog-centered">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Instructions</h1>
										</div>
										<div class="modal-body">
											<div class="row g-3">
												<div class="col-12">

												</div>
												<div class="col-12">
													<ol>
														<li>Open your PDF in Google Chrome</li>
														<li>Select <strong>Print</strong> and set Print Destination as <strong>Save as PDF</strong></li>
														<li>Save the PDF and upload the same PDF in your Application</li>
													</ol>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-primary" data-bs-target="#uploadInstructionsModal" data-bs-toggle="modal">Back to Instructions</button>
										</div>
									</div>
								</div>
							</div>

							<script>
								let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('uploadInstructionsModal')) // Returns a Bootstrap modal instance
								// Show or hide:
								modal.show();
							</script>

							<script>
								$state = $('#stateSelect');
								$city = $('#citySelect');

								$htmlData = "<option>Select City</option>";
								$cityValue = "<?= $application['organization_city'] ?>";
								if ($cityValue != "") {
									$htmlData += "<option selected value='" + $cityValue + "'>" + $cityValue + "</option>";
								}

								$city.html(
									"<option value=''> Select State First</option>"
								);
								$.ajax({
									url: "<?= base_url('api/data/StatesAPIController/get_cities_by_state?state=') ?>" + $state.val(),
									success: function(data) {
										$htmlData += "<option value=''>Select City</option>";

										if (data.length == 0) {
											$htmlData += "<option value=" + $state.val() + ">" + $state.val() + "</option>"
										} else {
											data.forEach(city => {
												$htmlData += "<option value=" + city.city_name + ">" + city.city_name + "</option>"
											});
										}

										$city.html($htmlData);
									}
								})
								$state.on('change', () => {
									$.ajax({
										url: "<?= base_url('api/data/StatesAPIController/get_cities_by_state?state=') ?>" + $state.val(),
										success: function(data) {
											$htmlData = "<option value=''>Select City</option>";

											if (data.length == 0) {
												$htmlData += "<option value=" + $state.val() + ">" + $state.val() + "</option>"
											} else {
												data.forEach(city => {
													$htmlData += "<option value=" + city.city_name + ">" + city.city_name + "</option>"
												});
											}

											$city.html($htmlData);
										}
									})
								})
							</script>

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
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3">
			<div class="">
				<div class="">
					<h5 class="card-title mb-3">All Comments</h5>
					<?php foreach ($comments as $key => $comment) : ?>
						<div class="mb-3 p-3 card-comment">
							<blockquote class="blockquote">
								<p class="mb-4"><?= $comment['comment'] ?></p>
								<footer class="blockquote-footer">
									<?= $comment['created_by']['name'] ?>,&nbsp;(<cite title="Source Title"><?= ucfirst($comment['created_at']) ?></cite>)</footer>
							</blockquote>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</main>

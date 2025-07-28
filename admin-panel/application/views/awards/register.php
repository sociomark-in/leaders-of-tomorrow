<!-- core:css -->
<link rel="stylesheet" href="<?= base_url("assets") ?>/vendors/core/core.css">
<!-- endinject -->

<!-- Plugin css for this page -->
<link rel="stylesheet" href="<?= base_url("assets") ?>/vendors/flatpickr/flatpickr.min.css">

<link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet"> 
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.2/apexcharts.min.css" integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.2/apexcharts.min.js" integrity="sha512-vIqZt7ReO939RQssENNbZ+Iu3j0CSsgk41nP3AYabLiIFajyebORlk7rKPjGddmO1FQkbuOb2EVK6rJkiHsmag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= base_url() ?>assets/js/apexcharts-light.js"></script>
<!-- End plugin css for this page -->

<!-- Plugin: JQuery daterangepicker  -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.css"/>
<!-- Plugin: JQuery daterangepicker  -->

<!-- Plugin: JQuery select2 -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" href="<?= base_url("assets/css/") ?>select2-custom.min.css">
<!-- Plugin: JQuery select2  -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" integrity="sha512-bE0ncA3DKWmKaF3w5hQjCq7ErHFiPdH2IGjXRyXXZSOokbimtUuufhgeDPeQPs51AI4XsqDZUK7qvrPZ5xboZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="<?= base_url("assets/vendors/") ?>jquery-steps/jquery.steps.css">

<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>

<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">
<main>
	<section>
		<div class="container">
			<div class="my-3 my-md-4">
				<?= form_open_multipart('api/new-nominee', ['id' => "formWizard"]) ?>
					<!-- First Step -->
					<h2>Organization Details</h2>
					<fieldset>
						<div class=" mb-3">
							<legend>Organization Details</legend>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut nulla nunc. Maecenas arcu sem, hendrerit a tempor quis,
								sagittis accumsan tellus. In hac habitasse platea dictumst. Donec a semper dui. Nunc eget quam libero. Nam at felis metus.
								Nam tellus dolor, tristique ac tempus nec, iaculis quis nisi.</p>
						</div>
						<div class="row m-0">
							<div class="col-xl-6 col-lg-4 col-12">
								<div class="mb-3">
									<label for="nameInput">Name of Organization</label>
									<input type="text" class="form-control" id="nameInput" required>
									<span class="form-text">As per the business registration certificate issued by the Govt. of India</span>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="industryTypeSelect" class="form-label">Type of Industry</label>
									<select name="" class="" id="industryTypeSelect">
										<?php for ($i = 0; $i < 10; $i++) : ?>
											<option value="">Select <?= $i ?></option>
										<?php endfor ?>
									</select>
									<script>
										$("#industryTypeSelect").select2({
											theme: "bootstrap-5",
										});
									</script>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="businessTypeSelect" class="form-label">Business Segment</label>
									<select name="" class="" id="businessTypeSelect">
										<?php for ($i = 0; $i < 10; $i++) : ?>
											<option value="">Select <?= $i ?></option>
										<?php endfor ?>
									</select>
									<script>
										$("#businessTypeSelect").select2({
											theme: "bootstrap-5",
										});
									</script>
								</div>
							</div>

							<div class="col-xl-2 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="companyIncDateInput" class="form-label">Incorporation Date</label>
									<input type="text" class="form-control" id="companyIncDateInput" min="01/02/2000" required>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="websiteInput" class="form-label">Company Website URL</label>
									<input type="url" class="form-control" id="websiteInput" placeholder="https://">
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="phoneInput" class="form-label">UDYAM MSME Number</label>
									<input type="text" class="form-control" id="phoneInput" placeholder="UDYAM-XY-07-1234567" required data-inputmask-alias="AAAAA-AA-99-9999999">
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="phoneInput" class="form-label">CIN Number</label>
									<input type="text" class="form-control" id="phoneInput" placeholder="U67190TN2014PTC096178" required data-inputmask-alias="A99999AA9999AAA999999">
								</div>
							</div>

							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="participationStateSelect" class="form-label">Participating State <img src="<?= base_url('assets/images/icons/') ?>laoding.gif" height="20" alt=""></label>
									<select name="" class="" id="participationStateSelect">
										<?php for ($i = 0; $i < 10; $i++) : ?>
											<option value="">Select <?= $i ?></option>
										<?php endfor ?>
									</select>
									<script>
										$("#participationStateSelect").select2({
											theme: "bootstrap-5",
										});
									</script>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="participationCitySelect" class="form-label">Participating City <img src="<?= base_url('assets/images/icons/') ?>laoding.gif" height="20" alt=""></label>
									<select name="" class="" id="participationCitySelect">
										<?php for ($i = 0; $i < 10; $i++) : ?>
											<option value="">Select <?= $i ?></option>
										<?php endfor ?>
									</select>
									<script>
										$("#participationCitySelect").select2({
											theme: "bootstrap-5",
										});
									</script>
								</div>
							</div>

							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="businessTypeSelect" class="form-label">Business Type</label>
									<div class="row">
										<div class="col-auto">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="business_type" value="" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Medium
												</label>
											</div>
										</div>
										<div class="col-auto">
											<div class="form-check">
												<input class="form-check-input" type="radio" name="business_type" value="" id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													Small
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="businessStaffCountSelect" class="form-label">No. Of Employees <img src="<?= base_url('assets/images/icons/') ?>laoding.gif" height="20" alt=""></label>
									<select name="" class="" id="businessStaffCountSelect">
										<option value="" selected></option>
										<?php for ($i = 0; $i < 10; $i++) : ?>
											<option value="">Select <?= $i ?></option>
										<?php endfor ?>
									</select>
									<script>
										$("#businessStaffCountSelect").select2({
											theme: "bootstrap-5",
										});
									</script>
								</div>
							</div>

							<div class="col-xl-6 col-lg-4 col-12">
								<div class="mb-3">
									<label for="cpNameInput">Contact Person Name</label>
									<input type="text" class="form-control" id="cpNameInput" required>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="emailInput" class="form-label">Email address</label>
									<input type="email" class="form-control" id="emailInput" placeholder="name@example.com" required>
								</div>
							</div>
							<div class="col-xl-2 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="phoneInput" class="form-label">Contact Number</label>
									<input type="text" class="form-control" id="phoneInput" placeholder="(+091) 999-999-9999" required data-inputmask-alias="(+999) 999-999-9999">
								</div>
							</div>

							<div class="mb-3">
								<div class="bg-light p-3">
									<h5>Instructions</h5>
									<ul class="">
										<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
										<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
										<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
										<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
									</ul>
								</div>
							</div>
						</div>
					</fieldset>

					<!-- Second Step - Financial Achievements -->
					<h2>Financial Achievements</h2>
					<fieldset>
						<div class=" mb-3">
							<legend>Financial Achievements of Recent 3 Years:</legend>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut nulla nunc. Maecenas arcu sem, hendrerit a tempor quis,
								sagittis accumsan tellus. In hac habitasse platea dictumst. Donec a semper dui. Nunc eget quam libero. Nam at felis metus.
								Nam tellus dolor, tristique ac tempus nec, iaculis quis nisi.</p>
						</div>
						<div class="row m-0 d-none">
							<div class="col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="customRange3" class="form-label">Revenue Turnover 2023:</label>
									<div class="wrapper" class="form-range">
										<div class="slider-wrapper px-3 mb-3">
											<div class="evaluation-slider" aria-controls="#valuation2023"></div>
										</div>
										<div class="row g-0">
											<div class="col-auto">
												<div class="input-group">
													<span class="input-group-text">&#8377;</span>
													<input type="text" class="form-control" id="valuation2023" disabled placeholder="Slide to Choose." />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="customRange3" class="form-label">Revenue Turnover 2022:</label>
									<div class="wrapper" class="form-range">
										<div class="slider-wrapper px-3 mb-3">
											<div class="evaluation-slider" aria-controls="#valuation2022"></div>
										</div>
										<div class="row g-0">
											<div class="col-auto">
												<div class="input-group">
													<span class="input-group-text">&#8377;</span>
													<input type="text" class="form-control" id="valuation2022" disabled placeholder="Slide to Choose." />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="customRange3" class="form-label">Revenue Turnover 2021:</label>
									<div class="wrapper" class="form-range">
										<div class="slider-wrapper px-3 mb-3">
											<div class="evaluation-slider" aria-controls="#valuation2021"></div>
										</div>
										<div class="row g-0">
											<div class="col-auto">
												<div class="input-group">
													<span class="input-group-text">&#8377;</span>
													<input type="text" class="form-control" id="valuation2021" disabled placeholder="Slide to Choose." />
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<script>
								var nf = new Intl.NumberFormat('en-in', {
									style: 'currency',
									currency: 'INR',
									minimumFractionDigits: 2,
									maximumFractionDigits: 2
								});
								$(".evaluation-slider").each((index, elem) => {
									$(elem).slider({
										range: 'min',
										min: 5000000,
										max: 500000000,
										step: 5000000,
										value: 5000000,
										slide: function(event, ui) {
											// $(".to").val(nf.format(parseInt(ui.value)));
											$($(elem).attr('aria-controls')).val(parseInt(ui.value).toLocaleString());
										}
									});
								});
							</script>
						</div>
						<div class="row m-0 mb-3">
							<div class="col-12">
								<label for="" class="form-label">Revenue Turnover <strong>(in &#8377; Cr.)</strong>:</label>
							</div>
							<div class="col-12">
								<div class="list-group">
									<div class="list-group-item">
										<div class="row">
											<div class="col-xl-2 col-lg-3">
												<label for=""><strong>FY 2022 - 2023</strong></label>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														< 1 Cr. </label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														1 Cr. to 10 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														10 Cr. to 25 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														25 Cr. to 50 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														50 Cr. to 100 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														> 100 Cr.</label>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row">
											<div class="col-xl-2 col-lg-3">
												<label for=""><strong>FY 2021 - 2022</strong></label>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														< 1 Cr. </label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														1 Cr. to 10 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														10 Cr. to 25 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														25 Cr. to 50 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														50 Cr. to 100 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														> 100 Cr.</label>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row">
											<div class="col-xl-2 col-lg-3">
												<label for=""><strong>FY 2020 - 2021</strong></label>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														< 1 Cr. </label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														1 Cr. to 10 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														10 Cr. to 25 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														25 Cr. to 50 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														50 Cr. to 100 Cr.</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														> 100 Cr.</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row m-0 mb-3">
							<div class="col-12">
								<label for="" class="form-label">Revenue Growth <strong>(in %)</strong>:</label>
							</div>
							<div class="col-12">
								<div class="list-group">
									<div class="list-group-item">
										<div class="row">
											<div class="col-xl-2 col-lg-3">
												<label for=""><strong>FY 2022 - 2023</strong></label>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														< 5% </label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														5% to 10%</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														10% to 25%</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														25% to 50%</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														> 50%</label>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row">
											<div class="col-xl-2 col-lg-3">
												<label for=""><strong>FY 2021 - 2022</strong></label>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														< 5% </label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														5% to 10%</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														10% to 25%</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														25% to 50%</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														> 50%</label>
												</div>
											</div>
										</div>
									</div>
									<div class="list-group-item">
										<div class="row">
											<div class="col-xl-2 col-lg-3">
												<label for=""><strong>FY 2020 - 2021</strong></label>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														< 5% </label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														5% to 10%</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														10% to 25%</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														25% to 50%</label>
												</div>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
													<label class="form-check-label" for="flexRadioDefault1">
														> 50%</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<div class="bg-light p-3">
								<h5>Instructions</h5>
								<ul class="">
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
								</ul>
								<small class="text-muted">*Note: The shortlisted participants will have to submit the copy of the audited financials for the past 2 years</small>
							</div>
						</div>
					</fieldset>

					<!-- Third Step - Case Studies -->
					<h2>Third Step</h2>
					<fieldset>
						<legend>Third Step</legend>
						<p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo,
							pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat.
							Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris
							venenatis.</p>
					</fieldset>

					<!-- Fourth Step - Document Uploads -->
					<h2>Document Uploads</h2>
					<fieldset>
						<legend>Fourth Step</legend>
						<div class="row">
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">File</label>
									<input type="file" name="doc1" class="dropify" data-default-file="" data-max-file-size="50K" data-allowed-file-extensions="pdf" />
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">File</label>
									<input type="file" name="doc2" class="dropify" data-default-file="" data-max-file-size="50K" data-allowed-file-extensions="pdf" />
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">File</label>
									<input type="file" class="dropify" data-default-file="" data-max-file-size="50K" data-allowed-file-extensions="pdf" />
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">File</label>
									<input type="file" class="dropify" data-default-file="" data-max-file-size="50K" data-allowed-file-extensions="pdf" />
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">File</label>
									<input type="file" class="dropify" data-default-file="" data-max-file-size="50K" data-allowed-file-extensions="pdf" />
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">File</label>
									<input type="file" class="dropify" data-default-file="" data-max-file-size="50K" data-allowed-file-extensions="pdf" />
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">File</label>
									<input type="file" class="dropify" data-default-file="" data-max-file-size="50K" data-allowed-file-extensions="pdf" />
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="mb-3">
									<label for="" class="form-label">File</label>
									<input type="file" class="dropify" data-default-file="" data-max-file-size="50K" data-allowed-file-extensions="pdf" />
								</div>
							</div>
						</div>
						<div class="mb-3">
							<div class="bg-light p-3">
								<h5>Instructions</h5>
								<ul class="">
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa iusto minima debitis necessitatibus, ratione facilis tenetur quos voluptatem tempora nobis.</li>
								</ul>
							</div>
						</div>
					</fieldset>

					<!-- Fifth Step - Declaration -->
					<h2>Declaration</h2>
					<fieldset>
						<legend>Declaration</legend>
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
									<label class="form-check-label" for="flexCheckChecked">
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eius repellendus consectetur harum cupiditate velit nobis ut doloribus ducimus expedita tempora, maxime sapiente reiciendis incidunt hic ab obcaecati aspernatur perspiciatis ipsum ullam consequatur! Esse vero, natus unde repellendus enim tempora?
										</p>
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eius repellendus consectetur harum cupiditate velit nobis ut doloribus ducimus expedita tempora, maxime sapiente reiciendis incidunt hic ab obcaecati aspernatur perspiciatis ipsum ullam consequatur! Esse vero, natus unde repellendus enim tempora?
										</p>
									</label>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
									<label class="form-check-label" for="flexCheckChecked">
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eius repellendus consectetur harum cupiditate velit nobis ut doloribus ducimus expedita tempora, maxime sapiente reiciendis incidunt hic ab obcaecati aspernatur perspiciatis ipsum ullam consequatur! Esse vero, natus unde repellendus enim tempora?
										</p>
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eius repellendus consectetur harum cupiditate velit nobis ut doloribus ducimus expedita tempora, maxime sapiente reiciendis incidunt hic ab obcaecati aspernatur perspiciatis ipsum ullam consequatur! Esse vero, natus unde repellendus enim tempora?
										</p>
									</label>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
									<label class="form-check-label" for="flexCheckChecked">
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eius repellendus consectetur harum cupiditate velit nobis ut doloribus ducimus expedita tempora, maxime sapiente reiciendis incidunt hic ab obcaecati aspernatur perspiciatis ipsum ullam consequatur! Esse vero, natus unde repellendus enim tempora?
										</p>
									</label>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
									<label class="form-check-label" for="flexCheckChecked">
										<p>
											Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt eius repellendus consectetur harum cupiditate velit nobis ut doloribus ducimus expedita tempora, maxime sapiente reiciendis incidunt hic ab obcaecati aspernatur perspiciatis ipsum ullam consequatur! Esse vero, natus unde repellendus enim tempora?
										</p>
									</label>
								</div>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</section>
</main>
<link rel="stylesheet" href="<?= base_url("assets/css/") ?>dropify-custom.min.css">
<!-- Custom js for this page -->
<script>
	var form = $("#formWizard");
	form.validate({
		errorPlacement: function errorPlacement(error, element) {
			element.before(error);
		},
		rules: {
			confirm: {
				equalTo: "#password"
			}
		}
	});
	form.steps({
		headerTag: "h2",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft",
		onStepChanging: function(event, currentIndex, newIndex) {
			form.validate().settings.ignore = ":disabled,:hidden";
			return form.valid();
		},
		onFinishing: function(event, currentIndex) {
			form.validate().settings.ignore = ":disabled";
			return form.valid();
		},
		onFinished: function(event, currentIndex) {
			$("#formWizard").submit()
		}
	});
	$(":input").inputmask();
	$("input#companyIncDateInput").datepicker({
		changeMonth: true,
		changeYear: true,

		dateFormat: 'dd-mm-yy',
		maxDate: '-30Y',
		minDate: '-100Y',
		inline: true
	});

	$('.dropify').dropify({
		error: {
			'fileSize': 'The file size is too big ({{ value }} max).',
			'minWidth': 'The image width is too small ({{ value }}}px min).',
			'maxWidth': 'The image width is too big ({{ value }}}px max).',
			'minHeight': 'The image height is too small ({{ value }}}px min).',
			'maxHeight': 'The image height is too big ({{ value }}px max).',
			'imageFormat': 'The image format is not allowed ({{ value }} only).'
		}
	});
</script>
<!-- End custom js for this page -->

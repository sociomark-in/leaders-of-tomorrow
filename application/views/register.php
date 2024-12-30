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
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.css" />
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.min.js" integrity="sha512-QK4ymL3xaaWUlgFpAuxY+6xax7QuxPB3Ii/99nykNP/PlK3NTQa/f/UbQQnWsM4h5yjQoMjWUhCJbYgWamtL6g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
	.iti.iti--allow-dropdown {
		display: block;
		width: 100%;
	}
</style>

<main class="w-fullscreen m-0">
	<section class="section signup-widget">
		<div class="container h-100">
			<div class="row h-100 flex-row-reverse">
				<div class="col-xl-8 col-lg-10 col-12">
					<div class="plain-card p-3 mb-3">
						<div class="card-body">
							<div class="">
								<div class="mb-3 mb-md-4">
									<img src="<?= base_url('assets/images/') ?>main.png" alt="" height="40">
								</div>
								<div class="section-title mb-3 mb-md-5">
									<h2><span>Register for Awards</span></h2>
								</div>
								<div class="">
									<style>
										.wizard>.content {
											min-height: 300px;
										}
									</style>
									<div class="row g-3 g-md-4">
										<div class="col-12">
											<?php if (!is_null($googleusercontent)): ?>
												<?php
												if ($googleusercontent['status'] == "SUCCESS"):
													$profile['name'] = $googleusercontent['profile']['name'];
													$profile['email'] = $googleusercontent['profile']['email'];
													$profile['is_email_verified'] = $googleusercontent['profile']['is_email_verified'];
												?>
													<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
														You Google Details have been Successfully Received! Please Enter Your Contact Number.
														<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
													</div>
												<?php else:
													$profile['name'] = null;
													$profile['email'] = null;
												?>
												<?php endif ?>
											<?php else: ?>
												<div class="row gx-3 align-items-center">
													<div class="col-auto">
														<a href="<?= $page['oauth_url']['google'] ?>"><img height="50" src="<?= base_url('assets/images/icons/google_sign_in_lg.svg') ?>" alt="Google Button"></a>
													</div>
													<div class="col-auto">
														<p class="m-0">or</p>
													</div>
												</div>
											<?php endif ?>
										</div>
										<div class="col-12">
											<div class="row g-1 g-md-2">
												<div class="col-12">
													<h5>Register by filling out this form.</h5>
												</div>
												<div class="col-12">
													<?= form_open('api/v2/participant/register', ['id' => "formWizard"]) ?>
													<fieldset>
														<div class="row g-3 mb-3">
															<div class="col-xl-6 col-12">
																<label for="" class="form-label">Name</label>
																<?php if (!is_null($profile['name'])): ?>
																	<input type="text" name="name" value="<?= $profile['name'] ?>" class="form-control" required>
																<?php else: ?>
																	<input type="text" name="name" class="form-control" required>
																<?php endif ?>
															</div>
															<div class="col-xl-6 col-12">
																<label for="" class="form-label">Contact Number</label>
																<input type="text" minlength="10" maxlength="10" id="OTPContact" name="contact" class="form-control" required>
															</div>
															<div class="col-12">
																<label for="" class="form-label">Email Address</label>
																<?php if (!is_null($profile['email'])): ?>
																	<input type="hidden" name="is_email_verified" value="<?= $profile['is_email_verified'] ?>">
																	<input type="email" name="email" value="<?= $profile['email'] ?>" class="form-control" required>
																<?php else: ?>
																	<input type="text" name="email" class="form-control" required>
																<?php endif ?>
															</div>
															<div class="col-12">
																<div class="">
																	<div class="form-check">
																		<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" required>
																		<label class="form-check-label" for="flexCheckChecked">
																			By checking this box, I agree to abide by the event's rules and regulations
																		</label>
																	</div>
																</div>
															</div>
															<div class="col-12">
																<div class="row">
																	<div class="col-auto">
																		<button class="btn btn-red" type="submit">Register Now</button>
																	</div>
																	<div class="col-auto">
																		<button class="btn btn-secondary" type="reset">Nevermind</button>
																	</div>
																</div>
															</div>
															<div class="col-12">
																<div class="">
																	Already Registered? <a href="<?= base_url('login') ?>">Click Here to Login</a>
																</div>
															</div>
														</div>
														<script>
															$("#OTPContact").intlTelInput({
																initialCountry: "in",
																separateDialCode: true,
																preferredCountries: ["in, us"],
																hiddenInput: "full_contact",
																formatOnDisplay: true,
																nationalMode: false,
																customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
																	return "8655425357";
																},
																// allowDropdown: false,
																geoIpLookup: function(callback) {
																	$.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
																		var countryCode = (resp && resp.country) ? resp.country : "";
																		callback(countryCode);
																	});
																},
																utilsScript: "../../build/js/utils.js?1562189064761",
																utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js",
															});
														</script>
													</fieldset>
													<?= form_close() ?>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
</main>

<link rel="stylesheet" href="<?= base_url("assets/css/") ?>dropify-custom.min.css">
<!-- Custom js for this page -->
<script>
	var form = $("#formWizard");
	$.validator.addMethod("emailregex", function(value, element) {
		return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
	})
	$.validator.addMethod("letters", function(value, element) {
		return this.optional(element) || /^[a-zA-Z\s']*$/i.test(value);
	});
	$.validator.addMethod("numbers", function(value, element) {
		return this.optional(element) || /^[0-9]*$/i.test(value);
	});
	form.validate({
		// errorPlacement: function errorPlacement(error, element) {
		// 	element.before(error);
		// },
		rules: {
			name: {
				letters: true,
			},
			contact: {
				numbers: true,
			},
			email: {
				normalizer: function(value) {
					return $.trim(value)
				},
				emailregex: true,
				remote: {
					url: '<?= base_url('api/v2/register/email/verify') ?>',
					async: false,
					type: "post",
					data: {}
				},
			},
		},
		messages: {
			email: {
				emailregex: 'Please enter a valid email address'
			},
			name: {
				letters: 'Please enter a valid name',
			},
			contact: {
				letters: 'Please enter a valid phone number',
			},
		}
	});
	$(":input").inputmask();
</script>
<!-- End custom js for this page -->

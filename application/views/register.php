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

<script src="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/js/dropify.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/dropify@0.2.2/dist/css/dropify.min.css" rel="stylesheet">

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
											<div class="row gx-3">
												<div class="col-auto">
													<a href="" type="submit" class="btn btn-google"><i class="fa-brands fa-google"></i>&nbsp;Sign Up with Google</a>
												</div>
												<div class="col-auto">
													<a href="" type="reset" class="btn btn-facebook"><i class="fa-brands fa-facebook-f"></i>&nbsp;Sign Up with Facebook</a>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row g-1 g-md-2">
												<div class="col-12">
													<h5>Lorem ipsum dolor sit.</h5>
												</div>
												<div class="col-12">
													<?= form_open('api/v2/participant/register', ['id' => "formWizard"]) ?>
													<!-- Third Step - Case Studies -->
													<input type="hidden" name="user_role" value="participant">
													<h2>Getting Started</h2>
													<fieldset>
														<div class="row g-3 mb-3 mb-md-5">
															<div class="col-12">
																<div class="">
																	<label for="" class="form-label">Email Address</label>
																	<input type="email" id="OTPMail" name="email" class="form-control" required>
																</div>
															</div>
															<div class="col-12">
																<div class="">
																	<button type="button" id="sendOTP" class="btn btn-red">Send OTP</button>
																	<span class="form-text ms-2 text-success" id="notify"></span>
																</div>
															</div>
															<div class="col-xl-4 col-lg-6 col-12">
																<div class="">
																	<label for="" class="form-label">Enter OTP</label>
																	<input type="text" name="otp" class="form-control" required>
																</div>
															</div>
														</div>
														<script>
															$("#sendOTP").on('click', () => {
																$.ajax({
																	url: '<?= base_url('api/v2/register/otp/send') ?>',
																	data: {
																		'email' : $("input[type=email]").val()
																	},
																	success: () => {
																		$("#sendOTP").attr('disabled', true);
																		$('#notify').text('OTP has been sent successfully!')
																	}
																})
															})
														</script>
													</fieldset>

													<h2>Personal Details</h2>
													<fieldset>
														<div class="row g-3 mb-3 mb-md-5">
															<div class="col-12">
																<div class="">
																	<label for="" class="form-label">Name</label>
																	<input type="text" name="name" class="form-control" required>
																</div>
															</div>
															<div class="col-12">
																<div class="">
																	<label for="" class="form-label">Contact Number</label>
																	<input type="text" maxlength="10" minlength="10" name="contact" class="form-control" required>
																</div>
															</div>
														</div>
													</fieldset>

													<?= form_close() ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<script>
								$.validator.addMethod("emailregex", function(value, element) {
									return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
								})
								$.validator.addMethod("linkedinurl_regex", function(value, element) {
									return this.optional(element) || /^(https?:\/\/)?(www\.)?linkedin\.com\//i.test(value);
								})
								$.validator.addMethod("letters", function(value, element) {
									return this.optional(element) || /^[a-zA-Z\s']*$/i.test(value);
								});
								$.validator.addMethod("numbers", function(value, element) {
									return this.optional(element) || /^[0-9]*$/i.test(value);
								});
								$('#registerForm').validate({
									rules: {
										email: {
											emailregex: true,
											remote: {
												url: '<?= base_url() ?>',
												type: "post",
												data: {
													email: function() {
														return $("#email_address").val();
													}
												}
											},
										},
										name: {
											letters: true,
										},
										contact: {
											numbers: true,
										},
										linkedin: {
											linkedinurl_regex: true,
										}
									},
									messages: {
										email: {
											emailregex: 'Please enter a valid email address',
											remote: 'Email address already exist. Please try to login.'
										},
										name: {
											letters: 'Please enter a valid name',
										},
										contact: {
											numbers: 'Please enter a valid contact number'
										},
										linkedin: {
											linkedinurl_regex: 'Not a valid LinkedIn URL'
										}
									}
								})
							</script>
							<hr class="mb-1">
							<div class="row gx-1 justify-content-end">
								<div class="col-auto">
									<div class="text-muted">
										<small>Powered By</small>
									</div>
								</div>
								<div class="col-auto">
									<svg style="height: 16px;" id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1671 270">
										<defs>
											<style>
												.text {
													fill: #7D7D7D;
													stroke-width: 0px;
												}
											</style>
										</defs>
										<g id="textblock">
											<g id="textblocktransform">
												<path id="text-0" class="text" d="M58.46,202.58h0c-10.8,0-19.75-.99-26.86-2.98-7.11-1.95-12.8-4.39-17.09-7.32-4.28-2.93-7.58-5.83-9.88-8.73h0c-.77-1.11-1.45-2.18-2.04-3.19-.63-1.05-1.06-2.19-1.31-3.45h0c-.35-1.71-.68-3.94-.99-6.69-.35-2.79-.4-6.01-.16-9.67H.15c.1-1.53.4-2.6.89-3.19h0c.59-.66,1.57-1.17,2.93-1.52h0c2.47-.59,5.7-1.11,9.67-1.57,3.94-.49,6.76-.73,8.46-.73h0c1.78,0,3.22.35,4.34,1.05,1.11.66,2.44,1.81,3.97,3.45h0c1.71,1.78,4.63,4.04,8.78,6.79,4.18,2.79,10.61,4.18,19.28,4.18h0c8.33,0,14.61-1.76,18.86-5.28,4.25-3.48,6.37-8.33,6.37-14.53h0c0-3.31-.99-6.43-2.98-9.35-1.99-2.96-5.63-5.9-10.92-8.83-5.26-2.93-12.78-6.01-22.57-9.25h0c-16.16-5.43-27.81-12.19-34.96-20.27-7.14-8.08-10.71-19.32-10.71-33.7h0c0-11.88,2.89-21.82,8.67-29.84,5.78-7.98,13.78-14.02,23.98-18.13,10.21-4.08,21.98-6.11,35.32-6.11h0c10.31,0,18.85,1.22,25.6,3.66,6.76,2.4,12,5.12,15.73,8.15,3.76,3.03,6.18,5.49,7.26,7.37h0c.7,1.08,1.15,1.9,1.36,2.46.21.56.37,1.31.47,2.25h0c.24,2.65.33,5.57.26,8.78-.1,3.24-.42,6.9-.94,10.97h0c-.24,1.36-.7,2.3-1.36,2.82h0c-.63.42-1.57.63-2.82.63h0c-8.26.17-14.63-.24-19.12-1.25h0c-1.81-.42-3.01-.85-3.61-1.31-.59-.42-1.36-1.1-2.3-2.04h0c-1.36-1.6-3.5-3.48-6.43-5.64-2.93-2.19-7.63-3.29-14.11-3.29h0c-8.92,0-15.24,2.02-18.97,6.06-3.76,4.04-5.64,8.57-5.64,13.59h0c0,5.96,2.77,10.62,8.31,14,5.5,3.34,14.21,7.14,26.13,11.39h0c9.96,3.48,18.51,7.28,25.66,11.39,7.14,4.08,12.61,9.3,16.41,15.68,3.76,6.37,5.64,14.79,5.64,25.24h0c0,13.03-3,23.83-8.99,32.4-5.99,8.6-14.16,15.01-24.51,19.23-10.31,4.21-22.01,6.32-35.11,6.32ZM218.4,202.68h0c-21.42,0-38.39-5.7-50.89-17.09-12.51-11.39-18.76-28.35-18.76-50.89h0c0-23.13,6.48-40.42,19.44-51.88,12.99-11.43,30.32-17.14,51.99-17.14h0c20.94,0,37.69,5.63,50.27,16.88,12.61,11.29,18.91,27.9,18.91,49.85h0c0,22.89-6.3,40.32-18.91,52.3-12.58,11.98-29.92,17.97-52.04,17.97ZM219.71,171.8h0c9.34,0,16.39-2.91,21.16-8.73s7.16-15.8,7.16-29.94h0c0-13.41-2.4-22.87-7.21-28.37-4.81-5.47-11.93-8.2-21.37-8.2h0c-9.13,0-16.3,2.94-21.53,8.83-5.23,5.92-7.84,15.52-7.84,28.79h0c0,13.86,2.49,23.6,7.47,29.21,4.98,5.61,12.37,8.41,22.15,8.41ZM381.79,65.68h0c10.14,0,17.5.84,22.1,2.51,4.6,1.64,7.49,2.93,8.67,3.87h0c1.85,1.18,3.29,2.72,4.34,4.6h0c.59.94,1.27,2.56,2.04,4.86.77,2.3,1.32,4.81,1.67,7.52h0c.42,2.12.45,3.62.1,4.49-.35.91-1.41,2-3.19,3.29h0c-2.06,1.36-4.28,2.56-6.69,3.61-2.44,1.08-4.42,1.83-5.96,2.25h0c-1.25.35-2.23.44-2.93.26-.66-.17-1.6-.68-2.82-1.52h0c-1.36-.94-3.26-1.99-5.7-3.14-2.47-1.15-5.89-1.72-10.24-1.72h0c-5.5,0-10.75,1.36-15.73,4.08-4.98,2.72-9.02,6.79-12.12,12.23-3.1,5.47-4.65,12.28-4.65,20.43h0c0,12.23,3.2,21.7,9.61,28.42,6.41,6.72,15.01,10.08,25.81,10.08h0c5.54,0,10.14-.57,13.79-1.72,3.66-1.15,6.55-2.32,8.67-3.5h0c1.71-.94,3.01-1.17,3.92-.68.87.45,1.57,1.27,2.09,2.46h0l9.3,21.06c.94,2.23.44,3.8-1.52,4.7h0c-3.17,1.64-8.36,3.47-15.57,5.49-7.25,2.06-16.18,3.08-26.8,3.08h0c-21.35,0-38.4-5.68-51.15-17.03-12.75-11.36-19.12-28.34-19.12-50.94h0c0-14.46,2.93-26.84,8.78-37.15,5.89-10.28,14.23-18.17,25.03-23.67,10.8-5.47,23.55-8.2,38.25-8.2ZM438.8,26.02h0c0-1.11.35-2.09,1.05-2.93.66-.87,1.55-1.99,2.66-3.34h0c2.4-2.72,5.17-5.59,8.31-8.62,3.14-3,6.32-5.9,9.56-8.73h0c2.06-1.6,3.59-2.4,4.6-2.4h0c1.01,0,2.58.8,4.7,2.4h0c6.9,5.96,12.77,11.74,17.61,17.35h0c1.11,1.29,2.04,2.37,2.77,3.24.7.91,1.04,1.92,1.04,3.03h0c0,1.08-.35,2.06-1.04,2.93-.73.84-1.69,1.99-2.87,3.45h0c-2.3,2.61-4.98,5.43-8.05,8.46-3.07,3.03-6.22,5.9-9.46,8.62h0c-1.18,1.01-2.11,1.67-2.77,1.99-.7.28-1.34.42-1.93.42h0c-.59,0-1.2-.14-1.83-.42-.66-.31-1.67-.98-3.03-1.99h0c-3.41-2.72-6.6-5.59-9.56-8.62-2.96-3.03-5.64-5.94-8.05-8.73h0c-1.11-1.36-2-2.44-2.66-3.24-.7-.84-1.04-1.79-1.05-2.87ZM484.98,75.61v117.15c0,2.54-.52,4.3-1.57,5.28-1.08.98-2.89,1.46-5.43,1.46h-26.28c-2.54,0-4.35-.49-5.43-1.46-1.04-.98-1.57-2.73-1.57-5.28h0v-117.15c0-2.54.52-4.3,1.57-5.28,1.08-.98,2.89-1.46,5.43-1.46h26.28c2.54,0,4.35.49,5.43,1.46,1.05.98,1.57,2.73,1.57,5.28h0ZM582.33,202.68h0c-21.42,0-38.39-5.7-50.89-17.09-12.51-11.39-18.76-28.35-18.76-50.89h0c0-23.13,6.48-40.42,19.44-51.88,12.96-11.43,30.29-17.14,51.99-17.14h0c20.94,0,37.69,5.63,50.27,16.88,12.57,11.29,18.86,27.9,18.86,49.85h0c0,22.89-6.29,40.32-18.86,52.3-12.58,11.98-29.92,17.97-52.04,17.97ZM583.58,171.8h0c9.37,0,16.42-2.91,21.16-8.73,4.77-5.82,7.16-15.8,7.16-29.94h0c0-13.41-2.4-22.87-7.21-28.37-4.81-5.47-11.93-8.2-21.37-8.2h0c-9.09,0-16.25,2.94-21.48,8.83-5.23,5.92-7.84,15.52-7.84,28.79h0c0,13.86,2.49,23.6,7.47,29.21,4.95,5.61,12.31,8.41,22.1,8.41ZM779.52,199.49h-64.16c-8.78,0-15.43-1.1-19.96-3.29-4.56-2.23-7.63-5.85-9.2-10.87-1.57-5.02-2.35-11.69-2.35-20.01h0V50.74c0-8.5.78-15.24,2.35-20.22,1.57-4.95,4.63-8.52,9.2-10.71,4.53-2.16,11.18-3.24,19.96-3.24h59.93c2.06,0,3.59.35,4.6,1.04h0c2.23,1.5,4.53,3.33,6.9,5.49,2.37,2.12,4.88,4.67,7.52,7.63h0c.87,1.11,1.31,2,1.31,2.66h0c0,.77-.44,1.62-1.31,2.56h0c-2.65,3-5.16,5.56-7.52,7.68-2.37,2.12-4.67,3.95-6.9,5.49h0c-1.18.66-2.72.99-4.6.99h-35.69c-5.61,0-9.44,1.18-11.5,3.55-2.06,2.4-3.08,6.5-3.08,12.28h0v24.71h45.82c2.02,0,3.55.35,4.6,1.05h0c2.19,1.53,4.49,3.36,6.9,5.49,2.37,2.12,4.88,4.67,7.52,7.63h0c.84,1.11,1.25,2.02,1.25,2.72h0c0,.77-.42,1.62-1.25,2.56h0c-2.65,2.96-5.16,5.5-7.52,7.63-2.4,2.12-4.7,3.95-6.9,5.49h0c-1.18.7-2.72,1.05-4.6,1.05h-45.82v25.76c0,5.68,1.03,9.75,3.08,12.23,2.06,2.47,5.89,3.71,11.5,3.71h39.92c2.06,0,3.59.33,4.6.99h0c2.19,1.53,4.49,3.36,6.9,5.49,2.37,2.12,4.88,4.69,7.52,7.68h0c.84,1.11,1.25,2,1.25,2.66h0c0,.77-.42,1.62-1.25,2.56h0c-2.65,2.96-5.16,5.5-7.52,7.63-2.4,2.16-4.7,3.99-6.9,5.49h0c-1.18.7-2.72,1.05-4.6,1.05h0ZM949.65,118.24h0v74.51c0,2.54-.52,4.3-1.57,5.28-1.08.98-2.89,1.46-5.43,1.46h-26.28c-2.54,0-4.34-.49-5.38-1.46-1.08-.98-1.62-2.73-1.62-5.28h0v-67.87c0-9.27-1.95-16.02-5.85-20.27-3.94-4.25-9.25-6.37-15.94-6.37h0c-6.72,0-11.9,1.45-15.52,4.34-3.62,2.89-6.41,6.53-8.36,10.92h0v79.26c0,2.54-.54,4.3-1.62,5.28-1.04.98-2.84,1.46-5.38,1.46h-26.28c-2.54,0-4.35-.49-5.43-1.46-1.04-.98-1.57-2.73-1.57-5.28h0v-106.9c0-2.06.42-3.64,1.25-4.75h0c1.78-2.37,3.92-4.79,6.43-7.26s5.59-5.1,9.25-7.89h0c1.11-.87,2.18-1.31,3.19-1.31h0c.94,0,2,.44,3.19,1.31h0c3.59,2.79,6.65,5.47,9.2,8.05,2.54,2.54,4.79,5.17,6.74,7.89h.68c1.43-1.88,3.59-4.08,6.48-6.58,2.89-2.51,6.95-4.74,12.17-6.69,5.23-1.95,11.93-2.93,20.12-2.93h0c7.98,0,15.59,1.62,22.83,4.86,7.21,3.24,13.13,8.67,17.77,16.3,4.63,7.66,6.95,18.13,6.95,31.4ZM1110.37,81.09h0v103.46c0,24.84-7.07,43.77-21.21,56.8-14.18,12.99-33.6,19.49-58.26,19.49h0c-10.21,0-18.27-.73-24.19-2.19-5.96-1.5-10.47-2.93-13.53-4.28h0c-1.95-.94-3.22-1.92-3.81-2.93h0c-.87-1.36-1.83-3.36-2.87-6.01-1.08-2.65-2.09-5.54-3.03-8.67h0c-.24-1.18-.28-2.07-.1-2.66h0c.35-.87.98-1.78,1.88-2.72h0c1.53-1.53,3.73-3.31,6.58-5.33,2.86-2.06,5.05-3.38,6.58-3.97h0c1.6-.59,3.08-.51,4.44.26h0c2.23,1.18,5.4,2.53,9.51,4.02,4.15,1.5,9.95,2.25,17.4,2.25h0c11.91,0,21.61-3.07,29.1-9.2,7.49-6.13,11.23-15.57,11.23-28.32h0v-4.6h-.52c-1.88,2.37-4.3,4.79-7.26,7.26-2.96,2.47-6.81,4.56-11.55,6.27-4.7,1.71-10.76,2.56-18.18,2.56h0c-12.82,0-23.34-2.79-31.56-8.36-8.22-5.57-14.26-13.25-18.13-23.04-3.87-9.79-5.8-20.94-5.8-33.44h0c0-13.69,2.26-25.97,6.79-36.84,4.49-10.9,12.05-19.52,22.68-25.86,10.62-6.3,25.17-9.46,43.63-9.46h0c11.04,0,20.34.8,27.9,2.4,7.52,1.6,13.83,3.61,18.91,6.01,5.12,2.37,9.58,4.74,13.38,7.11ZM1048.77,96.4h0c-9.86,0-17.38,3.33-22.57,9.98-5.19,6.62-7.79,16.91-7.79,30.88h0c0,21.84,9.02,32.76,27.07,32.76h0c7.04,0,12.44-1.45,16.2-4.34,3.73-2.89,6.53-6.55,8.41-10.97h0v-52.67c-1.88-1.36-4.51-2.63-7.89-3.81-3.41-1.22-7.89-1.83-13.43-1.83ZM1178.61,202.68h0c-12.51,0-22.43-3.5-29.78-10.5-7.35-7.04-11.02-16.72-11.02-29.05h0c0-6.37,1.17-12.3,3.5-17.77,2.33-5.5,6.43-10.36,12.28-14.58,5.82-4.21,13.97-7.59,24.45-10.14,10.52-2.54,23.95-4.02,40.29-4.44h0c0-7.73-1.93-13.31-5.8-16.72-3.9-3.41-9.72-5.12-17.45-5.12h0c-6.97,0-12.66,1.2-17.09,3.61-4.42,2.37-7.19,3.97-8.31,4.81h0c-1.18,1.05-2.63,1.43-4.34,1.15h0c-2.3-.31-4.74-.91-7.32-1.78-2.58-.84-5.36-1.81-8.36-2.93h0c-.42-.17-.89-.45-1.41-.84-.49-.38-.78-.96-.89-1.72h0c0-.42.05-.94.16-1.57.07-.66.28-1.83.63-3.5h0c.35-1.71.85-3.81,1.52-6.32.7-2.51,1.34-4.44,1.93-5.8h0c.77-1.46,2.04-2.82,3.81-4.08h0c1.43-1.22,5.8-3.14,13.11-5.75,7.32-2.65,17.9-3.97,31.77-3.97h0c38.21,0,57.32,18.58,57.32,55.75h0v72.21c0,1.6-.45,2.98-1.36,4.13-.91,1.15-2.42,1.72-4.55,1.72h-19.12c-1.36,0-2.58-.19-3.66-.57-1.04-.38-2.04-1.13-2.98-2.25h0l-7.89-10.19h-.89c-3.94,5.71-9.2,9.84-15.78,12.38-6.58,2.54-14.18,3.81-22.78,3.81ZM1192.67,173.11h0c7.8,0,13.71-2,17.71-6.01s6.57-8.13,7.68-12.38h0v-14.16c-11.84,0-20.71.92-26.6,2.77-5.92,1.81-9.86,4.18-11.81,7.11-1.95,2.96-2.93,6.13-2.93,9.51h0c0,4.95,1.53,8.38,4.6,10.29,3.03,1.92,6.81,2.87,11.34,2.87ZM1418.29,81.09h0v103.46c0,24.84-7.07,43.77-21.21,56.8-14.18,12.99-33.6,19.49-58.26,19.49h0c-10.17,0-18.24-.73-24.19-2.19-5.96-1.5-10.47-2.93-13.53-4.28h0c-1.95-.94-3.22-1.92-3.81-2.93h0c-.87-1.36-1.83-3.36-2.87-6.01-1.08-2.65-2.09-5.54-3.03-8.67h0c-.24-1.18-.28-2.07-.1-2.66h0c.35-.87.98-1.78,1.88-2.72h0c1.53-1.53,3.73-3.31,6.58-5.33,2.86-2.06,5.05-3.38,6.58-3.97h0c1.6-.59,3.08-.51,4.44.26h0c2.23,1.18,5.4,2.53,9.51,4.02,4.15,1.5,9.96,2.25,17.45,2.25h0c11.88,0,21.56-3.07,29.05-9.2,7.49-6.13,11.23-15.57,11.23-28.32h0v-4.6h-.52c-1.85,2.37-4.27,4.79-7.26,7.26-2.96,2.47-6.81,4.56-11.55,6.27-4.7,1.71-10.76,2.56-18.18,2.56h0c-12.82,0-23.34-2.79-31.56-8.36-8.22-5.57-14.26-13.25-18.13-23.04-3.87-9.79-5.8-20.94-5.8-33.44h0c0-13.69,2.26-25.97,6.79-36.84,4.49-10.9,12.05-19.52,22.68-25.86,10.62-6.3,25.17-9.46,43.63-9.46h0c11.08,0,20.38.8,27.9,2.4,7.52,1.6,13.83,3.61,18.91,6.01,5.12,2.37,9.58,4.74,13.38,7.11ZM1356.68,96.4h0c-9.86,0-17.38,3.33-22.57,9.98-5.19,6.62-7.79,16.91-7.79,30.88h0c0,21.84,9.02,32.76,27.07,32.76h0c7.04,0,12.44-1.45,16.2-4.34,3.73-2.89,6.53-6.55,8.41-10.97h0v-52.67c-1.88-1.36-4.51-2.63-7.89-3.81-3.41-1.22-7.89-1.83-13.43-1.83ZM1516.78,202.68h0c-14.39,0-26.89-2.32-37.52-6.95-10.62-4.63-18.86-11.84-24.71-21.63-5.89-9.79-8.83-22.42-8.83-37.88h0c0-23.2,5.96-40.76,17.87-52.67,11.91-11.91,27.73-17.87,47.44-17.87h0c12.85,0,23.72,2.3,32.6,6.9,8.88,4.6,15.64,10.94,20.27,19.02,4.63,8.08,6.95,17.29,6.95,27.64h0c0,10.14-2.59,17.21-7.79,21.21-5.19,3.97-12.75,5.96-22.68,5.96h-54.76c.7,8.78,3.92,15.47,9.67,20.06,5.71,4.6,13.52,6.9,23.41,6.9h0c7.8,0,14.07-1.18,18.81-3.55,4.7-2.33,7.99-4.18,9.88-5.54h0c1.6-1.18,3.43-1.74,5.49-1.67h0c1.6,0,3.92.33,6.95.99,3.03.63,6.03,1.79,8.99,3.5h0c2.12,1.11,3.19,2.65,3.19,4.6h0c0,1.11-.21,2.68-.63,4.7h0c-.24,1.18-.68,2.91-1.31,5.17-.59,2.26-1.34,4.37-2.25,6.32h0c-.52.94-1.34,1.83-2.46,2.66h0c-1.71,1.18-4.44,2.75-8.2,4.7-3.8,1.99-8.97,3.71-15.52,5.17-6.55,1.5-14.84,2.25-24.87,2.25ZM1485.38,120.28h41.59c4.35,0,6.53-2,6.53-6.01h0c0-6.03-1.9-11.11-5.7-15.26-3.76-4.11-9.44-6.17-17.03-6.17h0c-8.26,0-14.32,2.63-18.18,7.89-3.87,5.29-6.27,11.81-7.21,19.54Z" />
											</g>
										</g>
									</svg>
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
	$.validator.addMethod("linkedinurl_regex", function(value, element) {
		return this.optional(element) || /^(https?:\/\/)?(www\.)?linkedin\.com\//i.test(value);
	})
	$.validator.addMethod("letters", function(value, element) {
		return this.optional(element) || /^[a-zA-Z\s']*$/i.test(value);
	});
	$.validator.addMethod("numbers", function(value, element) {
		return this.optional(element) || /^[0-9]*$/i.test(value);
	});
	form.validate({
		errorPlacement: function errorPlacement(error, element) {
			element.before(error);
		},
		rules: {
			name: {
				letters: true,
			},
			email: {
				emailregex: true
			},
			contact: {
				numbers: true
			},
			linkedin: {
				linkedinurl_regex: true
			}
		},
		messages: {
			email: {
				emailregex: 'Please enter a valid email address'
			},
			name: {
				letters: 'Please enter a valid name',
			},
			contact: {
				numbers: 'Please enter a valid contact number'
			},
			linkedin: {
				linkedinurl_regex: 'Not a valid LinkedIn URL'
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

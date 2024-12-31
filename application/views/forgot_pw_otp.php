<?php $this->load->view('components/panel/_forgot_password_reset_modal');?>

<main class="w-fullscreen">
	<section class="section signup-widget">
		<div class="container h-100">
			<div class="row h-100 justify-content-between align-items-lg-center">
				<div class="col-xl-5 col-lg-8 col-md-6 col-12">
					<div class="media-content">
						<img class="w-100" src="<?= base_url('assets/images/ilu.png') ?>" alt="Leaders Of Tomorrow">
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<div class="plain-card p-3">
						<div class="card-body">
							<div class="row gap-3">
								<div class="col-12">
									<img src="<?= base_url('assets/images/') ?>main.png" alt="" height="40">
								</div>
								<div class="col-12">
									<?= form_open('api/v2/auth/forgot-password/send-otp', ['id' => "loginForm"]) ?>
									<div class="row gap-2">
										<div class="col-12">
											<div class="section-title">
												<h3>Forgot Password</h3>
											</div>
										</div>
										<div class="col-12">
											<label for="" class="form-label">Enter Registered Email Address</label>
											<input type="text" name="useremail" class="form-control">
										</div>
										<div class="col-12">
											<button type="submit" class="btn btn-red">Send OTP</button>
										</div>
										<div class="g-recaptcha" data-sitekey="6LeyC1oqAAAAADkQ7fisXtlSXdG7t1ZxxFgV3EsF"></div>
									</div>
									<?= form_close() ?>
								</div>
								<!-- <div class="mb-2">Forgot Password? <a href="">Click Here to Reset</a></div> -->
								<div class="">
									Not Registered? <a href="<?= base_url('register') ?>">Click Here to Register</a>
								</div>
							</div>
							<script>
								$.validator.addMethod("emailregex", function(value, element) {
									return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
								})
								$('#loginForm').validate({
									rules: {
										useremail: {
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
									},
									messages: {
										useremail: {
											emailregex: 'Please enter a valid email address',
											remote: 'Email address does not exist. Please register to proceed.'
										},
									}
								})
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

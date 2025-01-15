<?php $this->load->view('components/panel/_forgot_password_reset_modal'); ?>

<main class="w-fullscreen">
	<section class="section signup-widget">
		<div class="container h-100">
			<div class="row g-3 g-md-0 h-100 justify-content-between align-items-lg-center">
				<div class="col-xl-5 col-lg-8 col-md-6 col-12">
					<div class="media-content">
						<picture>
							<source srcset="<?= base_url('assets/images/ilu_awards.png') ?>" type="image/png" media="(min-width: 768px)">
							<source srcset="<?= base_url('assets/images/ilu_awards@600.png') ?>" type="image/png" media="(max-width: 768px)">
							<img class="w-100" src="<?= base_url('assets/images/ilu_awards@600.png') ?>" alt="">
						</picture>
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
									<?php
									switch ($_SESSION['user_login_status']['status']):
										case 'SUCCESS': ?>
											<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
												<strong></strong> <?= $_SESSION['user_login_status']['message'] ?>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											<?php break; ?>
										<?php
										case 'WARNING': ?>
											<div class="alert w-100 alert-warning alert-dismissible fade show" role="alert">
												<strong></strong> <?= $_SESSION['user_login_status']['message'] ?>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											<?php break; ?>
										<?php
										case 'ERROR': ?>
											<div class="alert w-100 alert-danger alert-dismissible fade show" role="alert">
												<?= $_SESSION['user_login_status']['message'] ?>
												<!-- <strong><a href="#" class="alert-link" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Forgot Password</a></strong>  -->
												<!-- <strong><a href="<?= base_url('forgot-password') ?>" class="alert-link">Forgot Password</a></strong>  -->
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											<?php break; ?>

										<?php
										default: ?>
											<?php break; ?>
									<?php endswitch ?>
								</div>
								<div class="col-12">
									<?= form_open('api/v2/participant/login', ['id' => "loginForm"]) ?>
									<div class="row gap-2">
										<div class="col-12">
											<label for="" class="form-label">Email Address</label>
											<input type="text" name="useremail" class="form-control">
										</div>
										<div class="col-12">
											<label for="" class="form-label">Password</label>
											<div class="input-group">
												<input type="password" id="pwd" name="password" required class="form-control">
												<button type="button" data-controls="password" class="input-group-text"><i class="link-icon" data-feather="eye"></i></button>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" class="btn btn-red">Login</button>
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
								$('input[type=password]').each((index, element) => {
									var button = $(element).next();
									var type = $(element).attr('type');
									var icon = $(element).next().children('svg').attr('data-feather');
									button.on('click', () => {
										console.log(type);
										if (type === 'password') {
											type = 'text';
										} else {
											type = 'password';
										}
										$(element).attr('type', type);
									})
								})

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

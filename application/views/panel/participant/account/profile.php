<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">My Profile</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Profile</li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-6 col-12 d-none">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5>Reset Your Password</h5>
							</div>
							<div class="">
								<?php if (isset($_SESSION['password_reset_status'])): ?>
									<?php switch ($_SESSION['password_reset_status']['status']):
										case 'SUCCESS': ?>
											<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
												The Password has been successfully Reset.
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											<?php
											break;
											?>
										<?php
										case 'ERROR': ?>
											<div class="alert w-100 alert-danger alert-dismissible fade show" role="alert">
												Error Resetting the Password. <?= $_SESSION['password_reset_status']['message'] ?>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											<?php
											break;
											?>
										<?php
										default: ?>
											<div class="alert w-100 alert-warning alert-dismissible fade show" role="alert">
												Unknown Error Occurred!
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											<?php
											break;
											?>
									<?php endswitch ?>
								<?php
								endif;
								?>
								<?= form_open('api/v2/settings/password/reset', ['id' => 'formWidget']) ?>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Current Passowrd</label>
											<input type="password" name="password_curr" required class="form-control">
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">New Passowrd</label>
											<div class="input-group">
												<input type="password" id="pwd" name="password" required class="form-control">
												<button type="button" data-controls="password" class="input-group-text"><i class="link-icon" data-feather="eye"></i></button>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Confirm New Passowrd</label>
											<div class="input-group">
												<input type="password" id="pwd_cfm" name="password_cfm" required class="form-control">
												<button type="button" data-controls="password_cfm" class="input-group-text"><i class="link-icon" data-feather="eye"></i></button>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="row g-3">
											<div class="col-auto">
												<button type="submit" class="btn btn-primary">Reset Password</button>
											</div>
											<div class="col-auto">
												<button type="reset" class="btn btn-outline-secondary">Nevermind</button>
											</div>
										</div>
									</div>
								</div>
								<?= form_close() ?>
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
								// const showHidePass = document.getElementById('showHidePassword');
								// const userPassword = document.getElementById('password');

								// showHidePass.addEventListener('click', function(e) {
								// 	let showHideAttr = userPassword.getAttribute('type');

								// 	if (showHideAttr === 'password') {
								// 		showHideAttr = 'text';
								// 	} else {
								// 		showHideAttr = 'password';
								// 	}
								// 	userPassword.setAttribute('type', showHideAttr);
								// 	this.classList.toggle('fa-eye-slash');
								// });
								$('#formWidget').validate({
									errorPlacement: function errorPlacement(error, element) {
										if (element.next().hasClass('input-group-text')) {
											element.parent().after(error);
										} else {
											element.after(error)
										}
									},
									rules: {
										password_cfm: {
											equalTo: '#pwd',
										},
									},
									messages: {
										password_cfm: {
											equalTo: 'Password Should Match!',
										},
									}
								})
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5>Verify Your Email Address</h5>
							</div>

							<div class="">
								<?php if (isset($_SESSION['email_verification_status'])): ?>
									<?php switch ($_SESSION['email_verification_status']['status']):
										case 'SUCCESS': ?>
											<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
												A verification link has been sent to your registered email address which will expire <strong> in 10 minutes</strong>.
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											<?php
											break;
											?>
										<?php
										default: ?>
											<div class="alert w-100 alert-warning alert-dismissible fade show" role="alert">
												Unknown Error Occurred!
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											<?php
											break;
											?>
									<?php endswitch ?>
								<?php
								endif;
								?>
								<?= form_open('api/v2/auth/verify/email/send', ['id' => 'formEmailVerify']) ?>
								<div class="row g-3">
									<div class="col-12">
										<input type="hidden" name="referer" value="<?= current_url() ?>">
										<div class="">
											<input type="email" name="email" required class="form-control">
										</div>
									</div>
									<div class="col-12">
										<div class="row g-3">
											<div class="col-12">
												<button type="submit" class="btn btn-primary">Get Verification Link</button>
											</div>
										</div>
									</div>
								</div>
								<?= form_close() ?>
							</div>
							<script>
								$.validator.addMethod("emailregex", function(value, element) {
									return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
								})
								$('#formEmailVerify').validate({
									errorPlacement: function errorPlacement(error, element) {
										if (element.next().hasClass('input-group-text')) {
											element.parent().after(error);
										} else {
											element.after(error)
										}
									},
									rules: {
										email: {
											emailregex: true,
											// remote: {
											// 	url: '<?= base_url('api/v2/register/otp/verify') ?>',
											// 	async: false,
											// 	type: "post",
											// 	data: {}
											// },
										},
									},
									messages: {
										email: {
											emailregex: 'Please enter a valid email address.',
										},
									}
								})
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-12 d-none">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5>Verify Your Contact Number</h5>
							</div>
							<div class=" mb-3">
								<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
									An OTP has been sent to your registered contact number which will expire <strong> in 10 minutes</strong>.
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
								<?= form_open('api/v2/auth/verify/contact/send', ['id' => 'formEmailVerify']) ?>
								<div class="row g-3">
									<div class="col-12">
										<input type="hidden" name="<?= current_url() ?>">
										<div class="">
											<input type="text" name="contact" id="OTPContact" required class="form-control">
										</div>
									</div>
									<div class="col-12">
										<div class="row g-3">
											<div class="col-12">
												<button type="submit" class="btn btn-primary">Get OTP</button>
											</div>
										</div>
									</div>
								</div>
								<?= form_close() ?>
							</div>
							<div class="">
								<?= form_open('api/v2/auth/verify/contact/verify', ['id' => 'formContactOTP']) ?>
								<div class="row g-3">
									<div class="col-12">
										<input type="hidden" name="<?= current_url() ?>">
										<div class="d-flex gap-2">
											<input type="text" maxlength="1" name="code[]" id="OTPContact" style="width:50px" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required class="form-control mobile-otp">
											<input type="text" maxlength="1" name="code[]" id="OTPContact" style="width:50px" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required class="form-control mobile-otp">
											<input type="text" maxlength="1" name="code[]" id="OTPContact" style="width:50px" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required class="form-control mobile-otp">
											<input type="text" maxlength="1" name="code[]" id="OTPContact" style="width:50px" oninput="this.value = this.value.replace(/[^0-9]/g, '');" required class="form-control mobile-otp">
										</div>
									</div>
									<div class="col-12">
										<div class="row g-3">
											<div class="col-12">
												<button type="submit" class="btn btn-primary">Get OTP</button>
											</div>
										</div>
									</div>
								</div>
								<?= form_close() ?>
							</div>
							<script>
								$("#OTPContact").intlTelInput({
									initialCountry: "in",
									separateDialCode: false,
									formatOnDisplay: true,
									nationalMode: false,
									// allowDropdown: false,
									geoIpLookup: function(callback) {
										$.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
											var countryCode = (resp && resp.country) ? resp.country : "";
											callback(countryCode);
										});
									},
									utilsScript: "../../build/js/utils.js?1562189064761",
									utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js",
									preferredCountries: [],
								});
								$('input.mobile-otp').each((index, element) => {
									$(element).on('keyup', () => {
										if ($(element).val()) {
											$(element).next().focus();
										}
									})
								})

								$.validator.addMethod("emailregex", function(value, element) {
									return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
								})
								$('#formEmailVerify').validate({
									errorPlacement: function errorPlacement(error, element) {
										if (element.next().hasClass('input-group-text')) {
											element.parent().after(error);
										} else {
											element.after(error)
										}
									},
									rules: {
										email: {
											emailregex: true,
											// remote: {
											// 	url: '<?= base_url('api/v2/register/otp/verify') ?>',
											// 	async: false,
											// 	type: "post",
											// 	data: {}
											// },
										},
									},
									messages: {
										email: {
											emailregex: 'Please enter a valid email address.',
										},
									}
								})
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

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
		<div class="col-lg-4 col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5>SMS Configuration</h5>
							</div>
							<div class="">
								<?php
								if (isset($_SESSION['password_reset_session'])):
									if ($_SESSION['password_reset_session']):
								?>
										<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
											A verification link has been sent to your registered email address which will expire <strong> in 10 minutes</strong>.
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
										</div>
								<?php
									endif;
								endif;
								?>
								<?= form_open('api/v2/settings/password/reset', ['id' => 'formWidget']) ?>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Authentication ID</label>
											<div class="input-group">
												<input type="password" name="plivo[auth_id]" value="<?= $config['sms_auth_id'] ?>" required class="form-control">
												<button type="button" data-controls="password" class="input-group-text"><i class="link-icon" data-feather="eye"></i></button>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Authentication Token</label>
											<div class="input-group">
												<input type="password" name="plivo[auth_token]" value="<?= $config['sms_auth_token'] ?>" required class="form-control">
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
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-8 col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5>Verify Your Email Address</h5>
							</div>
							<div class="">
								<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
									A verification link has been sent to your registered email address which will expire <strong> in 10 minutes</strong>.
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
								</div>
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
		<div class="col-lg-4 col-md-6 col-12">
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

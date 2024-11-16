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
		<div class="col-lg-3 col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5>Email Configuration</h5>
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
										<label for="" class="form-label">SMTP Host</label>
										<input type="text" class="form-control" name="email[smtp_host]" value="<?= $config['smtp_host']  ?>">
									</div>
									<div class="col-12">
										<label for="" class="form-label">SMTP Username</label>
										<input type="text" class="form-control" name="email[smtp_username]" value="<?= $config['smtp_username']  ?>">
									</div>
									<div class="col-12">
										<label for="" class="form-label">SMTP Port</label>
										<input type="text" class="form-control" name="email[smtp_port]" value="<?= $config['smtp_port']  ?>">
									</div>
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">SMTP Password</label>
											<div class="input-group">
												<input type="password" name="email[smtp_password]" value="<?= $config['smtp_password'] ?>" required class="form-control">
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
		<div class="col-lg-5 col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5>Google OAuth Client Configuration</h5>
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
											<label for="" class="form-label">Google Client ID</label>
											<div class="input-group">
												<input type="text" name="google[client_id]" value="<?= $config['googleclient_id'] ?>" required class="form-control">
												<span class="input-group-text">.apps.googleusercontent.com</span>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Google Client Secret</label>
											<div class="input-group">
												<input type="password" name="google[client_secret]" value="<?= $config['googleclient_secret'] ?>" required class="form-control">
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
	</div>
</main>

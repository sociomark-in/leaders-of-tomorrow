<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Reset Your Account Password</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Profile</li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-6 col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="card-title">
								<h5>Reset Your Password</h5>
							</div>
							<div class="">
								<?= form_open('', ['id' => 'formWidget']) ?>
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
	</div>
</main>

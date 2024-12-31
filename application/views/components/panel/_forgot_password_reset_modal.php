<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalToggleLabel">Resend Login Credentials</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?= form_open("api/v2/auth/forgotpw/send", ['id' => "resendCredentialsForm"]) ?>
			<div class="modal-body">
				<label for="" class="form-label">Enter Registered Email Address</label>
				<input class="form-control" type="email" name="useremail" id="forgotUserEmail" required>
			</div>
			<div class="modal-footer">
				<!-- <button class="btn btn-red" id="forgotSendOTP" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Send OTP Over Email</button> -->
				<button class="btn btn-red" type="submit">Send Credentials Over Email</button>
			</div>
			<?= form_close() ?>
			<script>
				$("#resendCredentialsForm").validate({})
			</script>
		</div>
	</div>
</div>
<div class="d-none modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Verify OTP and Reset Password</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?= form_open() ?>
			<div class="modal-body">
				<div class="row g-3">
					<div class="col-12">
						<label for="" class="form-label">Enter OTP</label>
						<input class="form-control" type="text" name="password" id="">
					</div>
					<div class="col-12">
						<label for="" class="form-label">Enter A New Password</label>
						<div class="input-group">
							<input type="password" id="pwd" name="password" required class="form-control">
							<button type="button" data-controls="password" class="input-group-text"><i class="link-icon" data-feather="eye"></i></button>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-red">Reset Password</button>
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

<!-- Alert Message Box -->
<div class="row">
	<div class="col-12">
		<!-- 
			[is_email_verified] => 0
            [is_password_reset] => 0
		 -->

		<?php if (!$user['is_email_verified']): ?>
			<div class="alert w-100 alert-danger alert-dismissible fade show" role="alert">
				<strong>Holy guacamole!</strong> Your email is not verified. Verify Now!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif ?>
		<?php if (!$user['is_contact_verified']): ?>
			<div class="alert w-100 alert-danger alert-dismissible fade show" role="alert">
				<strong>Holy guacamole!</strong> Your contact number is not verified. Verify Now!
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif ?>
		<?php if (!$user['is_password_reset']): ?>
			<div class="alert w-100 alert-warning alert-dismissible fade show" role="alert">
				<strong>Holy guacamole!</strong> You should Reset Your Default Password.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php endif ?>
	</div>
</div>
<!-- Alert Message Box -->

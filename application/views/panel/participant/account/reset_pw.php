<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Reset Your Account Password</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">My Profile</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Account Settings</a></li>
				<li class="breadcrumb-item active" aria-current="page">Reset Password</li>
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
								<?= form_open() ?>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Current Passowrd</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">New Passowrd</label>
											<input type="text" class="form-control">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

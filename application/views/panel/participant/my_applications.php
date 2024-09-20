<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">All Applications</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Applications</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-12">
			<?php if (count($my_applications) > 0) : ?>
				<div class="row">
					<?php for ($i = 0; $i < 3; $i++) : ?>
						<div class="col-xl-3 col-lg-4 col-12">
							<div class="row">
								<div class="col-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="mb-3">
												<h5 class="">Lorem ipsum dolor sit. <?= $i ?></h5>
											</div>
											<div class="">
												<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, delectus.</p>
											</div>
										</div>
										<div class="card-footer">
											<div class="row justify-content-between">
												<div class="col">
													<div class="mb-0 text-sm">
														<p>
															Applied On<br>
															<strong>
																<?= date('F j, Y') ?>
															</strong>
														</p>
													</div>
												</div>
												<div class="col-auto">
													<a href="<?= base_url('dashboard/application/' . random_string('alnum', 16)) ?>">View Application</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php endfor ?>
				</div>
				<hr class="m-0 mb-3">
			<?php else : ?>
			<?php endif ?>
			<div class="row">
				<?php for ($i = 0; $i < 10; $i++) : ?>
					<div class="col-xl-3 col-lg-4 col-12">
						<div class="row">
							<div class="col-12 grid-margin stretch-card">
								<div class="card">
									<div class="card-body pb-3">
										<div class="mb-3">
											<h5 class="">Lorem ipsum dolor sit. <?= $i ?></h5>
										</div>
										<div class="mb-3">
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, delectus.</p>
										</div>
										<div class="">
											<a href="" class="btn btn-sm btn-primary">Apply Now</a>
											<a href="" class="btn btn-sm btn-white">View Details</a>
										</div>
									</div>
									<div class="card-footer">
										<p class="mb-0 text-sm text-muted">Last Date to Apply <?= date('F j, Y') ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endfor ?>
			</div>
		</div>
	</div>
</main>

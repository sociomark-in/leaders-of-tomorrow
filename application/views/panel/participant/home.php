<main class="page-content">
	<?php $this->load->view('components/panel/widget/_alert_stack') ?>
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Welcome to LOT Awards Dashboard</h4>
		</div>
	</div>

	<div class="row g-3">
		<div class="col-12">
			<div class="row">
				<ul class="nav nav-pills gap-3" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#my-categories-tab-pane" type="button" role="tab" aria-controls="my-categories-tab-pane" aria-selected="true">My Applications</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" data-bs-toggle="tab" data-bs-target="#all-categories-tab-pane" type="button" role="tab" aria-controls="all-categories-tab-pane" aria-selected="false">All Categories</button>
					</li>
				</ul>
			</div>
		</div>
		<div class="col-12">
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="my-categories-tab-pane" role="tabpanel" aria-labelledby="my-categories-tab" tabindex="0">
					<div class="row">
						<?php if (count($my_applications) > 0): ?>
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
						<?php else: ?>
							<div class="col-12 grid-margin stretch-card">
								<div class="alert alert-danger" role="alert">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, neque! <a href="#" class="alert-link">Click Here to Apply</a>.
								</div>
							</div>
						<?php endif ?>
					</div>
				</div>
				<div class="tab-pane fade" id="all-categories-tab-pane" role="tabpanel" aria-labelledby="all-categories-tab" tabindex="0">
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
		</div>
	</div>
	<!-- row -->
</main>

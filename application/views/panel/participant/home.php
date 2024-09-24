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
				<div class="col-12">
					<?php if (count($my_applications['individual']) > 0 || count($my_applications['msme']) > 0) : ?>
						<div class="row">
							<?php foreach ($my_applications['individual'] as $key => $application) : ?>
								<div class="col-xl-3 col-lg-4 col-12">
									<div class="row">
										<div class="col-12 grid-margin stretch-card">
											<div class="card">
												<div class="card-body">
													<div class="mb-3">
														<h5 class=""><?= $application['category']['name'] ?></h5>
													</div>
													<div class="">
														<p><span class="badge bg-warning"><?= $application['status_text'] ?></span></p>
													</div>
												</div>
												<div class="card-footer">
													<div class="row justify-content-between">
														<div class="col">
															<div class="mb-0 text-sm">
																<p>
																	Applied On<br>
																	<strong>
																		<?= $application['created_at'] ?>
																	</strong>
																</p>
															</div>
														</div>
														<div class="col-auto">
															<?php
															if ((int)$application['status'] >= 3) :
																$redirect = base_url('dashboard/application/' . $application['nomination_id'] . '/edit');
															?>
																<a href="<?= $redirect ?>">Unlock and Edit</a>
															<?php else :
																$redirect = base_url('dashboard/application/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
															?>
																<a href="<?= $redirect ?>">Complete Application</a>
															<?php endif ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
							<?php foreach ($my_applications['msme'] as $key => $application) : ?>
								<div class="col-xl-3 col-lg-4 col-12">
									<div class="row">
										<div class="col-12 grid-margin stretch-card">
											<div class="card">
												<div class="card-body">
													<div class="mb-3">
														<h5 class=""><?= $application['category']['name'] ?></h5>
													</div>
													<div class="">
														<p><span class="badge bg-warning"><?= $application['status_text'] ?></span></p>
													</div>
												</div>
												<div class="card-footer">
													<div class="row justify-content-between">
														<div class="col">
															<div class="mb-0 text-sm">
																<p>
																	Applied On<br>
																	<strong>
																		<?= $application['created_at'] ?>
																	</strong>
																</p>
															</div>
														</div>
														<div class="col-auto">
															<div class="col-auto">
															<?php
															if ((int)$application['status'] >= 3) :
																$redirect = base_url('dashboard/application/' . $application['nomination_id'] . '/edit');
															?>
																<a href="<?= $redirect ?>">Unlock and Edit</a>
															<?php else :
																$redirect = base_url('dashboard/application/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
															?>
																<a href="<?= $redirect ?>">Complete Application</a>
															<?php endif ?>
														</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
						<hr class="m-0 mb-3">
					<?php else : ?>
					<?php endif ?>
					<div class="row">
						<?php foreach ($rest_categories['msme'] as $key => $category) : ?>
							<div class="col-xl-3 col-lg-4 col-12">
								<div class="row">
									<div class="col-12 grid-margin stretch-card">
										<div class="card">
											<div class="card-body pb-3">
												<div class="mb-3">
													<h5 class=""><?= $category['name'] ?></h5>
												</div>
												<div class="">
													<a href="<?= base_url('dashboard/category/' . $category['code']) . '/nominate' ?>" class="btn btn-sm btn-primary">Apply Now</a>
													<a href="<?= base_url('awards/category/' . $category['code']) ?>" target="_blank" class="btn btn-sm btn-white">View Details</a>
												</div>
											</div>
											<div class="card-footer">
												<p class="mb-0 text-sm text-muted">Last Date to Apply <?= date('F j, Y') ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
						<?php foreach ($rest_categories['individual'] as $key => $category) : ?>
							<div class="col-xl-3 col-lg-4 col-12">
								<div class="row">
									<div class="col-12 grid-margin stretch-card">
										<div class="card">
											<div class="card-body pb-3">
												<div class="mb-3">
													<h5 class=""><?= $category['name'] ?></h5>
												</div>
												<div class="">
													<a href="<?= base_url('dashboard/category/' . $category['code']) . '/nominate' ?>" class="btn btn-sm btn-primary">Apply Now</a>
													<a href="<?= base_url('awards/category/' . $category['code']) ?>" target="_blank" class="btn btn-sm btn-white">View Details</a>
												</div>
											</div>
											<div class="card-footer">
												<p class="mb-0 text-sm text-muted">Last Date to Apply <?= date('F j, Y') ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</main>

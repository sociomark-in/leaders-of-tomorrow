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
												<p><?= $application['status_text'] ?></p>
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
													switch ((int)$application['status']) {
														case '4':
															$redirect = base_url('dashboard/application/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
															$text = "Complete Application";
															break;

														default:
															# code...
															break;
													}
													?>
													<a href="<?= $redirect ?>"><?= $text ?></a>
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
												<p><?= $application['status_text'] ?></p>
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
														switch ($application['status']) {
															case '2':
																$redirect = base_url('dashboard/application/' . $application['nomination_id']) . "/edit";
																$text = "Edit Application";
																break;
															case '4':
																$redirect = base_url('dashboard/application/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
																$text = "Complete Application";
																break;

															default:
																$redirect = base_url('dashboard/application/' . $application['nomination_id']) . "/edit";
																$text = "";
																break;
														}
														?>
														<a href="<?= $redirect ?>"><?= $text ?></a>
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
				<div class="row justify-content-center mb-3">
					<div class="col-md-auto">
						<img src="<?= base_url('assets/images/panel/icons/') ?>applications-empty.png" alt="">
					</div>
					<div class="col-12">
						<div class="text-center">
							<a class="btn btn-primary" href="<?= base_url('awards/categories') ?>">View All Categories</a>
						</div>
					</div>
				</div>
				<hr class="m-0 mb-3">
			<?php endif ?>
		</div>
	</div>
</main>

<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">All Applications</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Application</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-12">
			<?php 
			if (count($my_applications['individual']) > 0 || count($my_applications['msme']) > 0) : ?>
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
													if ($application['stage_status'] == "") {
														$redirect = base_url('dashboard/nomination/' . $application['nomination_id']);
													} elseif ($application['stage_status'] >= 1) {
														# code...
														$redirect = base_url('dashboard/nomination/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
													} else {
														$redirect = base_url('dashboard/nomination/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
													}

													?>
													<a href="<?= $redirect ?>">View Application</a>
												</div>
												<div class="col-auto">
													<?php
													if ($application['status'] == "") {
														$redirect = base_url('dashboard/nomination/' . $application['nomination_id']);
													} elseif ($application['stage_status'] >= 1) {
														# code...
														$redirect = base_url('dashboard/nomination/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
													} else {
														$redirect = base_url('dashboard/nomination/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
													}

													?>
													<a href="<?= $redirect ?>">View Application</a>
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
													<?php
													if ($application['stage_status'] == "") {
														$redirect = base_url('dashboard/nomination/' . $application['nomination_id']);
													} elseif ($application['stage_status'] >= 1) {
														# code...
														$redirect = base_url('dashboard/nomination/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
													} else {
														$redirect = base_url('dashboard/nomination/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'] + 1;
													}

													?>
													<a href="<?= $redirect ?>">View Application</a>
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
		</div>
	</div>
</main>

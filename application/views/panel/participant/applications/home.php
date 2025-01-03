<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">My Applications</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Applications</li>
			</ol>
		</nav>
	</div>

	<div class="row g-3">
		<div class="col-12">
			<div class="row">
				<div class="col-12">
					<?php if (count($my_applications['msme']) > 0) : ?>
						<div class="row">
							<?php foreach ($my_applications['individual'] as $key => $application) : ?>
								<div class="col-xl-4 col-lg-6 col-12">
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
							<?php foreach ($my_applications['msme'] as $key => $application) : ?>
								<div class="col-xl-4 col-lg-6 col-12">
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
																		$redirect = base_url('dashboard/application/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'];
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
					<?php else : ?>
						<div class="row justify-content-center">
							<div class="col-md-auto">
								<img src="<?= base_url('assets/images/panel/icons/') ?>applications-empty.png" alt="">
							</div>
						</div>
					<?php endif ?>
					<?php if (!is_null($rest_categories['msme']) && count($rest_categories['msme']) > 0): ?>
						<div class="row mb-3">
							<div class="col-12">
								<div>
									<h4 class="mb-3 mb-md-0">Apply for MSME Categories</h4>
								</div>
							</div>
						</div>
						<div class="row">
							<?php foreach ($rest_categories['msme'] as $key => $category) :
								$category['valid_until'] = date_format(date_create_from_format("Y-m-d H:i:s", $category['valid_until']), 'F j, Y')
							?>
								<div class="col-xl-4 col-lg-6 col-12">
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
													<p class="mb-0 text-sm text-muted">Last Date: <?= $category['valid_until'] ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</main>

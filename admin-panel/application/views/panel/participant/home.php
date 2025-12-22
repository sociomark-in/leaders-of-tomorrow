<main class="page-content">
	<div class="row">
		<div class="col-12 grid-margin">
			<div class="card welcome-banner">
				<div class="card-body">
					<div class="row">
						<div class="col-12">
							<div class="d-flex justify-content-between align-items-center">
								<div>
									<h4 class="mb-3 mb-md-0">Welcome, <strong><?= $user['name'] ?></strong>!</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<?php if (count($my_applications['msme']) > 0) : ?>
				<div class="row">
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
												<div class="row">
													<div class="col">
														<p class="mb-2">Stage I</p>
														<p><?= $application['status_text'] ?? "--" ?></p>
													</div>
													<div class="col">
														<p class="mb-2">Stage II</p>
														<p><?= $application['status_2_text'] ?? "--" ?></p>
													</div>
												</div>
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
																$redirect = base_url('nomination/' . $application['nomination_id']) . "/edit";
																$text = "Edit Application";
																break;
															case '4':
																$redirect = base_url('nomination/' . $application['nomination_id']) . "?stage=" . (int)$application['stage_status'];
																$text = "Complete Application";
																break;
															case '1':
																if (!is_null($application['status_2'])) {
																	$redirect = base_url('my-presentations/');
																	$text = "View All Presentations";
																} else {
																	switch ($application['status_2']) {
																		case '1':
																			$text = "";
																			break;

																		default:
																			$redirect = base_url('nomination/' . $application['nomination_id'] . "/presentation");
																			$text = "Prepare Presentation for Stage II";
																			break;
																	}
																}
																break;

															default:
																$redirect = base_url('nomination/' . $application['nomination_id']) . "/edit";
																$text = "";
																break;
														}
														?>
														<?php switch ($application['status']):
															case '1': ?>
																<a href="<?= $redirect ?>" class=""><?= $text ?></a>
																<?php break; ?>
															<?php
															default: ?>
																<a href="<?= $redirect ?>" class=""><?= $text ?></a>
																<?php break; ?>
														<?php endswitch ?>
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
				<div class="row justify-content-center mb-3">
					<div class="col-md-auto">
						<img src="<?= base_url('assets/images/panel/icons/') ?>applications-empty.png" alt="">
					</div>
					<div class="col-12">
						<div class="text-center">
							<a class="btn btn-primary" href="<?= base_url('my-nominations') ?>">View All Categories</a>
						</div>
					</div>
				</div>
				<hr class="m-0 mb-3">
			<?php endif ?>
		</div>
	</div>
	<!-- row -->
</main>

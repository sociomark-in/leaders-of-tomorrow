<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">My Presentations</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Presentations</li>
			</ol>
		</nav>
	</div>
	

	<div class="row g-3">
		<div class="col-12">
			<div class="row">
				<div class="col-12">
					<?php if (!is_null($my_presentations) && count($my_presentations) > 0) : ?>
						<div class="row">
							<?php foreach ($my_presentations as $key => $application) :?>
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
																		$redirect = base_url('dashboard/presentation/' . $application['presentation_id']) . "/edit";
																		$text = "Edit Presentation";
																		break;

																	default:
																		$redirect = base_url('dashboard/presentation/' . $application['presentation_id']) . "/edit";
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
				</div>
			</div>
		</div>
	</div>
</main>

<?php
$stage = 0;
if ($nomination['stage'] >= 1) {
	$stage = $nomination['stage'];
}
?>
<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Presentation (#<?= $application['presentation_id'] ?>) for Stage II of <?= $application['category']['name'] ?></h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/presentations') ?>">All Presentations</a></li>
				<li class="breadcrumb-item active" aria-current="page">#<?= $application['presentation_id'] ?></li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-xl col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card input-group-card">
						<div class="card-body">
							<div class="row justify-content-between align-items-center">
								<div class="col">
									<div class="row align-items-center">
										<div class="col-lg-auto">
											<img src="<?= ($application['logo_image'] == "") ? 'https://ui-avatars.com/api/?name=' . $application['organization_name']  : "" . $application['logo_image'] ?>" alt="Logo">
										</div>
										<div class="col">
											<h2 class="page-title"><?= $application['organization_name'] ?></h2>
										</div>
									</div>
								</div>
								<div class="col-auto">
									<div class="row g-3">
										<?php if ($application['status'] != '1'): ?>
											<div class="col-lg-auto col-12">
												<?= form_open('api/v2/awards/presentation/accept') ?>
												<input type="hidden" name="presentation_id" value="<?= $application['presentation_id'] ?>">
												<input type="hidden" name="nomination_id" value="<?= $application['nomination_id'] ?>">
												<button type="submit" class="btn d-flex btn-primary btn-icon-text"><i class="btn-icon-prepend" data-feather="check"></i>Accept</button>
												<?= form_close() ?>
											</div>
										<?php endif ?>
										<div class="col-lg-auto col-12">
											<a href="<?= base_url('dashboard/presentation/' . $application['presentation_id'] . '/download?key=' . urlencode($this->encryption->encrypt($application['presentation_id']))) ?>" class="btn d-flex btn-yellow btn-icon-text"><i class="btn-icon-prepend" data-feather="download"></i>Download Presentation</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-9 col-12 grid-margin stretch-card">
					<div class="col-12">
						<div class="nomination_detailed">
							<?php
							switch (explode('_', $application['category_id'])[1]) {
								case 'INDIVIDUAL':
									# code...
									include_once APPPATH . '/views/panel/moderator/presentations/category_single/individual.php';
									break;
								case 'GLOBAL':
									# code...
									include_once APPPATH . '/views/panel/moderator/presentations/category_single/global.php';
									break;
								case 'FAMILY':
									# code...
									include_once APPPATH . '/views/panel/moderator/presentations/category_single/family.php';
									break;
								case 'DIGITAL':
									# code...
									include_once APPPATH . '/views/panel/moderator/presentations/category_single/digital.php';
									break;

								default:
									include_once APPPATH . '/views/panel/moderator/presentations/category_single/msme.php';
									break;
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-12 grid-margin stretch-card">
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card input-group-card">
								<div class="card-body">
									<h5 class="card-title">Add a comment and request improvement</h5>
									<?= form_open('api/v2/awards/presentation/unlock_w_comment', ['id' => ""]) ?>
									<input type="hidden" name="presentation_id" value="<?= $application['presentation_id'] ?>">
									<input type="hidden" name="nomination_id" value="<?= $application['nomination_id'] ?>">
									<div class="row g-3">
										<div class="col-12">
											<label for="" class="form-label">Put Your Comment Below</label>
											<textarea name="comment" id="" cols="30" rows="8" class="form-control" required></textarea>
										</div>
										<div class="col-12">
											<div class="col-auto">
												<button type="submit" class="btn btn-yellow">Comment & Unlock Presentation</button>
											</div>
										</div>
									</div>
									<?= form_close() ?>
									<div class="mt-3">
										<h5 class="card-title">Previous Comments</h5>
										<div class="row">
											<div class="col-12">
												<?php foreach ($comments as $key => $comment): ?>
													<div class="bg-light">
														<blockquote class="blockquote p-3">
															<p class="mb-4"><?= $comment['comment'] ?></p>
															<footer class="blockquote-footer">
																<?= $comment['created_by']['name'] ?>,&nbsp;(<cite title="Source Title"><?= ucfirst($comment['created_at']) ?></cite>)</footer>
														</blockquote>
													</div>
												<?php endforeach ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php if ($application['status'] != '0'): ?>
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<h5 class="card-title">Comment & Reject</h5>
										<?= form_open('api/v2/awards/presentation/reject_w_comment', ['id' => ""]) ?>
										<input type="hidden" name="presentation_id" value="<?= $application['presentation_id'] ?>">
										<input type="hidden" name="nomination_id" value="<?= $application['nomination_id'] ?>">
										<div class="row g-3">
											<div class="col-12">
												<label for="" class="form-label">Put Your Comment Below</label>
												<textarea name="comment" id="" cols="30" rows="8" class="form-control" required></textarea>
											</div>
											<div class="col-12">
												<div class="col-auto">
													<button type="submit" class="btn btn-primary">Comment & Reject Presentation</button>
												</div>
											</div>
										</div>
										<?= form_close() ?>
									</div>
								</div>
							</div>
						<?php endif ?>

					</div>
				</div>
			</div>
		</div>
</main>

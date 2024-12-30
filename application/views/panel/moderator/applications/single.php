<?php
$stage = 0;
if ($nomination['stage'] >= 1) {
	$stage = $nomination['stage'];
}
?>
<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Application (#<?= $id ?>)</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/applications') ?>">Applications</a></li>
				<li class="breadcrumb-item active" aria-current="page">Application #<?= $id ?></li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-xl col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card input-group-card">
						<div class="card-body">
							<div class="row justify-content-between">
								<div class="col">
									<h5 class="card-title">Application for <?= $category['name'] ?></h5>
									<p><a class="link-icon" href="<?= base_url('awards/category/') . $category['code'] ?>" target="_blank">View Category Details<i class="mb-1 px-1" data-feather="external-link"></i></a></p>
								</div>
								<div class="col-auto">
									<div class="row g-3">
										<?php if ($application['status'] != '1'): ?>
											<div class="col-lg-auto col-12">
												<?= form_open('api/v2/awards/nomination/accept') ?>
												<input type="hidden" name="application_id" value="<?= $application['nomination_id'] ?>">
												<button type="submit" class="btn d-flex btn-primary btn-icon-text"><i class="btn-icon-prepend" data-feather="check"></i>Accept</button>
												<?= form_close() ?>
											</div>
										<?php endif ?>
										<div class="col-lg-auto col-12">
											<!-- 
											<?= form_open('api/v2/awards/nomination/download') ?>
											<input type="hidden" name="application_id" value="<?= $application['nomination_id'] ?>">
											<button type="submit" class="btn d-flex btn-primary btn-icon-text"><i class="btn-icon-prepend" data-feather="download"></i>Download Docket</button>
											<?= form_close() ?> 
											-->

											<a target="_blank" href="<?= base_url('dashboard/application/' . $application['nomination_id'] . '/download?key=' . urlencode($this->encryption->encrypt($application['nomination_id']))) ?>" class="btn d-flex btn-yellow btn-icon-text"><i class="btn-icon-prepend" data-feather="download"></i>Download Docket</a>
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
							if (strtolower($category['type']) == 'msme') {
								include_once APPPATH . '/views/panel/moderator/full_view/msme.php';
							} else {
								include_once APPPATH . '/views/panel/moderator/full_view/individual.php';
							} ?>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-12 grid-margin stretch-card">
					<div class="row">
						<?php if ($application['status'] != '0'): ?>
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<h5 class="card-title">Comment & Reject</h5>
										<?= form_open('api/v2/awards/nomination/reject_w_comment', ['id' => ""]) ?>
										<input type="hidden" name="application_id" value="<?= $id ?>">
										<div class="row g-3">
											<div class="col-12">
												<label for="" class="form-label">Put Your Comment</label>
												<textarea name="comment" id="" cols="30" rows="8" class="form-control" required></textarea>
											</div>
											<div class="col-12">
												<div class="col-auto">
													<button type="submit" class="btn btn-primary">Comment & Reject Application</button>
												</div>
											</div>
										</div>
										<?= form_close() ?>
									</div>
								</div>
							</div>
						<?php endif ?>
						<div class="col-12 grid-margin stretch-card">
							<div class="card input-group-card">
								<div class="card-body">
									<h5 class="card-title">New Comment & Send for Betterment</h5>
									<?= form_open('api/v2/awards/nomination/unlock_w_comment', ['id' => ""]) ?>
									<input type="hidden" name="application_id" value="<?= $id ?>">
									<div class="row g-3">
										<div class="col-12">
											<label for="" class="form-label">Put Your Comment</label>
											<textarea name="comment" id="" cols="30" rows="8" class="form-control" required></textarea>
										</div>
										<div class="col-12">
											<div class="col-auto">
												<button type="submit" class="btn btn-primary">Comment & Unlock Application</button>
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
					</div>
				</div>
			</div>
		</div>
</main>

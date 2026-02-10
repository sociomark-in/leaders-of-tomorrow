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
				<li class="breadcrumb-item"><a href="<?= base_url('') ?>">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Application #<?= $id ?></li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card input-group-card">
						<div class="card-body">
							<div class="row justify-content-between">
								<div class="col">
									<h5 class="card-title">Application for <?= $category['name'] ?></h5>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-9 col-12 grid-margin stretch-card">
					<div class="row">
						<div class="col-12">
							<div class="nomination_detailed">
								<div class="">
									<?php
									switch ($category['type']) {
										case '1_GLOBAL':
											# code...
											include_once APPPATH . '/views/panel/moderator/view/global.php';
											break;
										case '1_FAMILY':
											# code...
											include_once APPPATH . '/views/panel/moderator/view/family.php';
											break;

										default:
											switch (explode('_', $category['type'])[1]) {
												default:
													include_once APPPATH . '/views/panel/moderator/view/msme.php';
													break;
											}
											break;
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-12 grid-margin stretch-card">
					<div class="row w-100">
						<div class="col-12 grid-margin stretch-card">
							<div class="card input-group-card">
								<div class="card-body">
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
	</div>
</main>

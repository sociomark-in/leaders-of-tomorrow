<?php
$category_id = $application['category_id'];
$application_id = $application['nomination_id'] ?? null;
$utm = $utm;
?>
<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Application for <?= $category['name'] ?> <?= date('Y') ?></h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/my-applications') ?>">My Applications</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Application</li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-xxl-9 col-12">
			<div class="row py-3">
				<div class="col-12 grid-margin stretch-card">
					<div class="card input-group-card">
						<div class="card-body">
							<div class="col-12 grid-margin stretch-card">
								<?php
								switch ($category_id) {
									case '1_DIGITAL':
										include_once APPPATH . '/views/panel/participant/applications/edit/digital.php';
										break;
									case '1_GLOBAL':
										include_once APPPATH . '/views/panel/participant/applications/edit/global.php';
										break;
									case '1_FAMILY':
										include_once APPPATH . '/views/panel/participant/applications/edit/family.php';
										break;
									case '1_INDIVIDUAL':
										include_once APPPATH . '/views/panel/participant/applications/edit/individual_1.php';
										break;
									case '2_INDIVIDUAL':
										include_once APPPATH . '/views/panel/participant/applications/edit/individual_2.php';
										break;

									default:
										include_once APPPATH . '/views/panel/participant/applications/edit/msme.php';
										break;
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3">
			<div class="">
				<div class="">
					<h5 class="card-title mb-3">All Comments</h5>
					<?php foreach ($comments as $key => $comment) : ?>
						<div class="mb-3 p-3 card-comment">
							<blockquote class="blockquote">
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
</main>

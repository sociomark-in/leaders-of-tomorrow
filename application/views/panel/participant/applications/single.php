<?php
$stage = 0;
if ($nomination['stage'] >= 1) {
	$stage = $nomination['stage'];
}
?>
<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="d-flex gap-2 align-items-baseline">
			<h4 class="mb-3 mb-md-0">New Application</h4>
			<p class="m-0 text-muted">(#<?= $id ?>)</p>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/my-applications') ?>">My Applications</a></li>
				<li class="breadcrumb-item active" aria-current="page">(#<?= $id ?>)</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-xl col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="row align-items-center gap-3">
								<div class="col-auto">
									<div class="">
										<!-- <img src="https://placehold.co/60x60" alt=""> -->
										<img src="<?= base_url('assets/images/favicon.png') ?>" width="60" height="60" alt="Logo">
									</div>
								</div>
								<div class="col">
									<h2><?= $category['name'] ?></h2>
								</div>
								<div class="col-auto">
									<div class="row">
										<a href="<?= base_url('awards/category/' . $category['code']) ?>" target="_blank" class="btn btn-primary">View Category Details</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
				// print_r($_SESSION['temp_application_session']);
				?>
				<div class="col-12 grid-margin stretch-card">
					<div class="col-12">
						<?php

						switch ($category['type']) {
							case '1_INDIVIDUAL':
								# code...
								include_once APPPATH . '/views/panel/participant/categories/individual_1.php';
								break;
							case '2_INDIVIDUAL':
								# code...
								include_once APPPATH . '/views/panel/participant/categories/individual_2.php';
								break;
							case '1_FAMILY':
								# code...
								include_once APPPATH . '/views/panel/participant/categories/family.php';
								break;
							case '1_DIGITAL':
								# code...
								include_once APPPATH . '/views/panel/participant/categories/digital.php';
								break;
							case '1_GLOBAL':
								# code...
								include_once APPPATH . '/views/panel/participant/categories/global.php';
								break;

							default:
								include_once APPPATH . '/views/panel/participant/categories/msme.php';
								# code...
								break;
						} ?>
					</div>
				</div>
				<script>
					$("form").each((index, element) => {
						var $form = $(element);
						var $button = $form.find('[type="submit"]');
						$button.on("click", (element) => {
							if ($form.valid()) {
								$button.text('Please wait...').css({
									'pointer-events': 'none',
									'opacity': 0.5,
								});
							}
						});
					});
				</script>
			</div>
		</div>
	</div>
</main>

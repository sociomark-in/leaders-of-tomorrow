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
				<li class="breadcrumb-item active" aria-current="page">My Applications</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-xl col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body"></div>
					</div>
				</div>
				<div class="col-12 grid-margin stretch-card">
					<div class="col-12">
						<?php
						if (strtolower($category['type']) == 'msme') {
							include_once APPPATH . '/views/panel/participant/categories/msme.php';
						} else {
							include_once APPPATH . '/views/panel/participant/categories/individual.php';
						} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

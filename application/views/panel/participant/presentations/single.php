<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="d-flex gap-2 align-items-baseline">
			<h4 class="mb-3 mb-md-0">New Presentation for <?= $category['name'] ?></h4>
			<p class="m-0 text-muted">(#<?= $application['nomination_id'] ?>)</p>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/my-applications') ?>">My Applications</a></li>
				<li class="breadcrumb-item active" aria-current="page">(#<?= $id ?>)</li>
			</ol>
		</nav>
	</div>
	<?php
	$c = explode('_', $category['type']);
	switch ($c[1]) {
		case 'MSME':
			# code...
			include_once APPPATH . 'views/panel/participant/presentations/category/individual.php';
			break;

		default:
			include_once APPPATH . 'views/panel/participant/presentations/category/msme.php';
			break;
	}
	?>

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
</main>

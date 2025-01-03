<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" integrity="sha512-bE0ncA3DKWmKaF3w5hQjCq7ErHFiPdH2IGjXRyXXZSOokbimtUuufhgeDPeQPs51AI4XsqDZUK7qvrPZ5xboZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="<?= base_url("assets/vendors/") ?>jquery-steps/jquery.steps.css">

<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>

<?php
$stage = 0;
if ($nomination['stage'] >= 1) {
	$stage = $nomination['stage'];
} else {
	$application['nomination_id'] = date('U') . "-" . random_string('numeric', 5);
}
?>
<main class="page-content">
	<!-- Alert Message Box -->
	<!-- <div class="row">
		<div class="col-12">
			<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
				<strong>Holy guacamole! <?= $stage ?></strong> You should check in on some of those fields below.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div> -->
	<!-- Alert Message Box -->

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="d-flex gap-2 align-items-center">
			<h4 class="mb-3 mb-md-0">New Application</h4>
			<p class="text-muted m-0">(#LOTS12-<?= $category['code'] ?>-<?= $application['nomination_id'] ?>)</p>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">New Application</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="row g-4">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row align-items-center">
								<div class="col-auto">
									<div class="">
										<img src="<?= base_url('assets/images/favicon.png') ?>" width="60" height="60" alt="Logo">
									</div>
								</div>
								<div class="col">
									<h2><?= $category['name'] ?></h2>
								</div>
								<div class="col-auto">
									<div class="row">
										<a href="<?= base_url('awards/category/' . $category['code']) ?>" target="_blank" class="btn btn-primary">View Details</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<?php
					switch ($category['type']) {
						case '1_DIGITAL':
							include_once APPPATH . '/views/panel/participant/categories/digital.php';
							# code...
						case '1_FAMILY':
							include_once APPPATH . '/views/panel/participant/categories/family.php';
							# code...
							break;
						case '1_GLOBAL':
							include_once APPPATH . '/views/panel/participant/categories/global.php';
							# code...
							break;
						case '1_INDIVIDUAL':
							include_once APPPATH . '/views/panel/participant/categories/individual_1.php';
							# code...
							break;
						case '2_INDIVIDUAL':
							include_once APPPATH . '/views/panel/participant/categories/individual_2.php';
							# code...
							break;

						default:
							include_once APPPATH . '/views/panel/participant/categories/msme.php';
							# code...
							break;
					} ?>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</main>

<!-- Custom js for this page -->
<script>
	$("#formWizard").steps({
		headerTag: "h2",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft"
	});
	$(":input").inputmask();
</script>
<!-- End custom js for this page -->

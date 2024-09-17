<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" integrity="sha512-bE0ncA3DKWmKaF3w5hQjCq7ErHFiPdH2IGjXRyXXZSOokbimtUuufhgeDPeQPs51AI4XsqDZUK7qvrPZ5xboZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="<?= base_url("assets/vendors/") ?>jquery-steps/jquery.steps.css">

<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>

<?php
$stage = 0;
if ($nomination['stage'] >= 1) {
	$stage = $nomination['stage'];
}

$application_id = random_string('numeric', 8);

$tabs = [
	[
		'name' => "Business Details",
		'identifier' => "profile",
	],
	[
		'name' => "Financial Details",
		'identifier' => "finance",
	],
	[
		'name' => "Case Studies I",
		'identifier' => "case_1",
	],
	[
		'name' => "Case Studies II",
		'identifier' => "case_2",
	],
	[
		'name' => "Document Uploads",
		'identifier' => "uploads",
	],
]

?>
<main class="page-content">
	<!-- Alert Message Box -->
	<div class="row">
		<div class="col-12">
			<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
				<strong>Holy guacamole! <?= $stage ?></strong> You should check in on some of those fields below.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div>
	<!-- Alert Message Box -->

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="">
			<h4 class="mb-3 mb-md-0">New Application ( <a href="">#LOTS12-<?= $category['code'] ?>-<?= $application_id ?></a> )</h4>
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
										<img src="https://placehold.co/60x60" alt="">
									</div>
								</div>
								<div class="col">
									<h2>Lorem ipsum dolor sit amet consectetur.</h2>
								</div>
								<div class="col-auto">
									<div class="row">
										<a href="" class="btn btn-primary">View Details</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="staged-tab-wizard">
						<ul class="nav nav-pills gap-3" id="myTab" role="tablist">
							<?php for ($i = 0; $i < count($tabs); $i++): ?>
								<?php if ($i == $stage): ?>
									<li class="nav-item" role="presentation">
										<button class="nav-link active" id="<?= $tabs[$i]['identifier'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tabs[$i]['identifier'] ?>-tab-pane" type="button" role="tab" aria-controls="<?= $tabs[$i]['identifier'] ?>-tab-pane" aria-selected="true"><?= $tabs[$i]['name'] ?></button>
									</li>
								<?php elseif ($i < $stage): ?>
									<li class="nav-item" role="presentation">
										<button class="nav-link success" id="<?= $tabs[$i]['identifier'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tabs[$i]['identifier'] ?>-tab-pane" type="button" role="tab" aria-controls="<?= $tabs[$i]['identifier'] ?>-tab-pane" aria-selected="false"><?= $tabs[$i]['name'] ?></button>
									</li>
								<?php else: ?>
									<li class="nav-item" role="presentation">
										<button class="nav-link disabled" id="<?= $tabs[$i]['identifier'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tabs[$i]['identifier'] ?>-tab-pane" type="button" role="tab" aria-controls="<?= $tabs[$i]['identifier'] ?>-tab-pane" aria-selected="false"><?= $tabs[$i]['name'] ?></button>
									</li>
								<?php endif ?>
							<?php endfor ?>
						</ul>
						<div class="tab-content" id="myTabContent">
							<?php for ($i = 0; $i < count($tabs); $i++): ?>
								<?php if ($i == $stage): ?>
									<div class="tab-pane py-3 fade show active" id="<?= $tabs[$i]['identifier'] ?>-tab-pane" role="tabpanel" aria-labelledby="<?= $tabs[$i]['identifier'] ?>-tab" tabindex="0">
										<div class="row">
											<div class="col-12 grid-margin stretch-card">
												<div class="card">
													<div class="card-body">
														<?= form_open('api/v2/awards/nomination/single/new') ?>
														<div class="mb-3">
															<input type="hidden" name="category_id" value="<?= $category['code'] ?>">
															<input type="hidden" name="application_id" value="<?= $application['id'] ?? null ?>">
															<input type="hidden" name="utm" value="<?= $utm ?>">
															<input type="hidden" name="agent_id" value="<?= $this->input->get('agent_id') ?>">
															<input type="hidden" name="stage" value="<?= $this->input->get('stage') ?>">
															<?php switch ($tabs[$i]['identifier']) {
																case 'profile':
																	$this->load->view('panel/participant/forms/single/profile');
																	break;
																case 'finance':
																	$this->load->view('panel/participant/forms/single/profile');
																	break;
																case 'case_1':
																	$this->load->view('panel/participant/forms/single/profile');
																	break;
																case 'case_2':
																	$this->load->view('panel/participant/forms/single/profile');
																	break;

																default:
																	$this->load->view('panel/participant/forms/single/uploads');
																	# code...
																	break;
															} ?>
														</div>
														<div class="row g-3">
															<?php if ($i + 1 == count($tabs)) : ?>
																<div class="col-md-auto">
																	<button type="submit" class="btn btn-primary">Save and Submit</button>
																</div>
															<?php else: ?>
																<div class="col-md-auto">
																	<button type="reset" class="btn btn-outline-secondary">Reset Form</button>
																</div>
																<div class="col-md-auto">
																	<button type="submit" class="btn btn-primary">Save and Next</button>
																</div>
															<?php endif ?>
														</div>
														<?= form_close() ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php else: ?>
									<div class="tab-pane disabled py-3 fade" id="<?= $tabs[$i]['identifier'] ?>-tab-pane" role="tabpanel" aria-labelledby="<?= $tabs[$i]['identifier'] ?>-tab" tabindex="0">
										<div class="row">
											<div class="col-12 grid-margin stretch-card">
												<div class="card">
													<div class="card-body">
														<?php switch ($tabs[$i]['identifier']) {
															case 'profile':
																$this->load->view('panel/participant/forms/single/profile');
																break;
															case 'finance':
																$this->load->view('panel/participant/forms/single/profile');
																break;
															case 'case_1':
																$this->load->view('panel/participant/forms/single/profile');
																break;
															case 'case_2':
																$this->load->view('panel/participant/forms/single/profile');
																break;

															default:
																$this->load->view('panel/participant/forms/single/uploads');
																# code...
																break;
														} ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endif ?>
							<?php endfor ?>
						</div>
					</div>
				</div>
				<div class="col-12">

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

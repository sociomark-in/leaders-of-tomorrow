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
								switch (explode('_', $category['type'])[1]) {
									case 'IDFC':
										include_once APPPATH . '/views/panel/participant/categories/idfc.php';
										break;

									default:
										include_once APPPATH . '/views/panel/participant/categories/msme.php';
										break;
								}
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
				<?php switch ($this->input->get('stage')):
					case 0:
					case "":
					case 5: ?>
						<script>
							$state = $('#stateSelect');
							$city = $('#citySelect');

							$cityValue = "<?= $application['organization_city'] ?>";
							if ($cityValue != "") {
								$htmlData += "<option selected value='" + $cityValue + "'>" + $cityValue + "</option>";
							}

							$city.html(
								"<option value=''> Select State First</option>"
							);
							$.ajax({
								url: "<?= base_url('api/data/StatesAPIController/get_cities_by_state?state=') ?>" + $state.val(),
								success: function(data) {
									$htmlData += "<option value=''>Select City</option>";

									if (data.length == 0) {
										$htmlData += "<option value=" + $state.val() + ">" + $state.val() + "</option>"
									} else {
										data.forEach(city => {
											$htmlData += "<option value=" + city.city_name + ">" + city.city_name + "</option>"
										});
									}

									$city.html($htmlData);
								}
							})
							$state.on('change', () => {
								$.ajax({
									url: "<?= base_url('api/data/StatesAPIController/get_cities_by_state?state=') ?>" + $state.val(),
									success: function(data) {
										$htmlData = "<option value=''>Select City</option>";

										if (data.length == 0) {
											$htmlData += "<option value=" + $state.val() + ">" + $state.val() + "</option>"
										} else {
											data.forEach(city => {
												$htmlData += "<option value=" + city.city_name + ">" + city.city_name + "</option>"
											});
										}

										$city.html($htmlData);
									}
								})
							})
						</script>
					<?php
						break;
					case 4: ?>
						<div class="modal fade" id="uploadInstructionsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">File Upload Instructions</h1>
									</div>
									<div class="modal-body">
										<div class="row g-3">
											<div class="col-12">
												To make sure your file remains supported for further process:
											</div>
											<div class="col-12">
												<ol>
													<li>PDF Version should be - <strong>
															< 1.4</strong>
													</li>
													<li>PDF Versions for all the Attachments should be same.</li>
													<li>
														For further instructions <a href="#" class="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Click Here</a>
													</li>
												</ol>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
									</div>
								</div>
							</div>
						</div>

						<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Instructions</h1>
									</div>
									<div class="modal-body">
										<div class="row g-3">
											<div class="col-12">

											</div>
											<div class="col-12">
												<ol>
													<li>Open your PDF in Google Chrome</li>
													<li>Select <strong>Print</strong> and set Print Destination as <strong>Save as PDF</strong></li>
													<li>Save the PDF and upload the same PDF in your Application</li>
												</ol>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button class="btn btn-primary" data-bs-target="#uploadInstructionsModal" data-bs-toggle="modal">Back to Instructions</button>
									</div>
								</div>
							</div>
						</div>

						<script>
							let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('uploadInstructionsModal')) // Returns a Bootstrap modal instance
							// Show or hide:
							modal.show();
						</script>
				<?php break;
				endswitch
				?>
			</div>
		</div>
	</div>
</main>

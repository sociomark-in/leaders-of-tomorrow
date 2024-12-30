<main class="page-content">
	<?php $this->load->view('components/panel/widget/_alert_stack') ?>
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

	<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="">
			<h4 class="mb-3 mb-md-0">All Nominations</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">All Nominations</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<!-- <div class="d-flex justify-content-between align-items-baseline mb-3">
								<h6 class="card-title mb-0">All Nominations</h6>
								<div class="row align-items-center">
									!-- <div class="col-auto">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
											Download<i class="link-icon px-1 mb-1" data-feather="download"></i>
										</button>
									</div> --
								</div>
							</div> -->
							<div class="row">
								<div class="col-12">
									<table class="table table-striped" id="applicationsTable">
										<thead>
											<tr>
												<th>Participant</th>
												<th>Contact Person</th>
												<th>Category</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_applications['msme'] as $key => $application) : ?>
												<tr>
													<td>
														(<span class="text-red"><a href="<?= base_url('dashboard/application/' . $application['nomination_id']) ?>">#<?= $application['nomination_id'] ?></a></span>)
														<h5><?= $application['name'] ?></h5>
														<a href="<?= $application['linkedin_url'] ?>" target="_blank"><i class="link-icon px-1 mb-1" data-feather="linkedin"></i></a>
														<a href="<?= $application['organization_url'] ?>" target="_blank"><i class="link-icon px-1 mb-1" data-feather="link"></i></a>
													</td>
													<td>
														<h5><?= $application['id_75534'] ?></h5>
														<a href="mailto:<?= $application['id_75535'] ?>"><i class="link-icon px-1 mb-1" data-feather="mail"></i></a>
														<a href="tel:<?= $application['id_75536'] ?>"><i class="link-icon px-1 mb-1" data-feather="phone"></i></a>
													</td>
													<td><?= $application['category']['name'] ?></td>
													<td><?= $application['status_text'] ?></td>
													<td>
														<?php
														$edit = 0;
														switch ($user['role']) {
															case 'jury':
															case 'admin':
															case 'super-admin':
																$edit = 1;
																# code...
																break;

															default:
																# code...
																break;
														} ?>
														<?php if ($edit) : ?>
															<a href="<?= base_url('dashboard/application/' . $application['nomination_id']) ?>">
																<i class="link-icon px-1 mb-1" data-feather="eye"></i>
															</a>
															<?php if (in_array($application['status'], [3, 1, 0])) : ?>
															<?php endif ?>
														<?php else: ?>
															<?php if (in_array($application['status'], [3])) : ?>
															<?php endif ?>
														<?php endif ?>
														<a target="_blank" href="<?= base_url('dashboard/application/' . $application['nomination_id'] . '/download?key=' . urlencode($this->encryption->encrypt($application['nomination_id']))) ?>"><i class="link-icon px-1 mb-1 text-dark" data-feather="download"></i></a>
														<!-- <a href=""><i class="link-icon px-1 mb-1 text-success" data-feather="check"></i></a>
														<a href=""><i class="link-icon px-1 mb-1 text-danger" data-feather="x"></i></a> -->
													</td>
												</tr>
											<?php endforeach ?>
											<?php foreach ($all_applications['individual'] as $key => $application) : ?>
												<tr>
													<td>
														<span class="text-muted"><?= $application['nomination_id'] ?></span>
														<h5><?= $application['name'] ?></h5>
														<a href="<?= $application['linkedin_url'] ?>" target="_blank"><i class="link-icon px-1 mb-1" data-feather="linkedin"></i></a>
														<a href="<?= $application['organization_url'] ?>" target="_blank"><i class="link-icon px-1 mb-1" data-feather="link"></i></a>
													</td>
													<td>
														<h5><?= $application['id_74529'] ?></h5>
														<a href="mailto:<?= $application['id_74530'] ?>"><i class="link-icon px-1 mb-1" data-feather="mail"></i></a>
														<a href="tel:<?= $application['id_74531'] ?>"><i class="link-icon px-1 mb-1" data-feather="phone"></i></a>
													</td>
													<td><?= $application['category']['name'] ?></td>
													<td><?= $application['status_text'] ?></td>
													<td>
														<?php
														$edit = 0;
														switch ($user['role']) {
															case 'jury':
															case 'admin':
															case 'super-admin':
																$edit = 1;
																# code...
																break;

															default:
																# code...
																break;
														} ?>
														<?php if ($edit) : ?>
															<a href="<?= base_url('dashboard/application/' . $application['nomination_id']) ?>">
																<i class="link-icon px-1 mb-1" data-feather="eye"></i>
															</a>
															<?php if (in_array($application['status'], [3, 1, 0])) : ?>
															<?php endif ?>
														<?php else: ?>
															<?php if (in_array($application['status'], [3])) : ?>
															<?php endif ?>
														<?php endif ?>
														<a target="_blank" href="<?= base_url('dashboard/application/' . $application['nomination_id'] . '/download?key=' . urlencode($this->encryption->encrypt($application['nomination_id']))) ?>"><i class="link-icon px-1 mb-1 text-dark" data-feather="download"></i></a>
														<!-- <a href=""><i class="link-icon px-1 mb-1 text-success" data-feather="check"></i></a>
														<a href=""><i class="link-icon px-1 mb-1 text-danger" data-feather="x"></i></a> -->
													</td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
									<script>
										$('#applicationsTable').DataTable({
											dom: "Bfirt",
											order: [
												[0, 'desc']
											],
											// "columnDefs": [{
											// 	"targets": [2, 4],
											// 	"orderable": false
											// }],
											layout: {
												topStart: {
													buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
												}
											}
										})
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-fullscreen-xl-down modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<h1 class="modal-title fs-5" id="exampleModalLabel">Select Download Options</h1>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<?= form_open() ?>
							<div class="modal-body">
								<div class="row g-3">
									<?php for ($i = 0; $i < 24; $i++): ?>
										<div class="col-xl-3 col-lg-4 col-md-6 col-12">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
												<label class="form-check-label" for="flexCheckChecked">
													Checked checkbox
												</label>
											</div>
										</div>
									<?php endfor ?>
								</div>
							</div>
							<div class="modal-footer">
								<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary">Download</button>
							</div>
							<?= form_close() ?>
						</div>
					</div>
				</div>

				<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
						<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<div>
							Some text as placeholder. In real life you can have the elements you have chosen. Like, text, images, lists, etc.
						</div>
						<div class="dropdown mt-3">
							<button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
								Dropdown button
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Action</a></li>
								<li><a class="dropdown-item" href="#">Another action</a></li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</main>

<main class="page-content">
	<?php $this->load->view('components/panel/widget/_alert_stack') ?>

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="">
			<h4 class="mb-3 mb-md-0">All Applications</h4>
			<a href="">(LDRT-nxBWow0F-23djX0H7V8vrHgAGhFnW-UNu9-GxI9)</a>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Overview</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-baseline">
								<h6 class="card-title mb-0">All Nominations</h6>
								<div class="row align-items-center">
									<div class="col-auto">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
											Launch demo modal
										</button>
									</div>
									<div class="col-auto">
										<a class="btn p-0 btn-icon-text text-dark" href="">View All</a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<table class="table table-striped" id="applicationsTable">
										<thead>
											<tr>
												<th>Name</th>
												<th>Email</th>
												<th>id_74529 Number</th>
												<th>Category</th>
												<th>Status</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($all_applications['msme'] as $key => $application) : ?>
												<tr>
													<td><a href=""><?= $application['name'] ?></a></td>
													<td><a href="mailto:<?= $application['email'] ?>"><?= $application['email'] ?></a></td>
													<td><a href="<?= $application['organization_url'] ?>"><?= $application['organization_url'] ?></a></td>
													<td><?= $application['category']['name'] ?></td>
													<td><?= $application['status_text'] ?></td>
													<td><button class="btn btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Take Action</button></td>
												</tr>
											<?php endforeach ?>
											<?php foreach ($all_applications['individual'] as $key => $application) : ?>
												<tr>
													<td><a href=""><i class="link-icon px-1 mb-1" data-feather="eye"></i><?= $application['name'] ?></a></td>
													<td>
														<h5><?= $application['id_74529'] ?></h5>
														<a class="d-block" href="mailto:"><i class="link-icon px-1 mb-1" data-feather="mail"></i><?= $application['id_74529'] ?></a>
														<a class="d-block" href="mailto:<?= $application['id_74530'] ?>"><i class="link-icon px-1 mb-1" data-feather="mail"></i><?= $application['id_74530'] ?></a>
														<a class="d-block" href="tel:<?= $application['id_74531'] ?>"><i class="link-icon px-1 mb-1" data-feather="link"></i><?= $application['id_74531'] ?></a>
													</td>
													<td>
														<a class="d-block" href="<?= $application['organization_url'] ?>"><i class="link-icon px-1 mb-1" data-feather="link"></i><?= $application['organization_url'] ?></a>
													</td>
													<td><?= $application['category']['name'] ?></td>
													<td><?= $application['status_text'] ?></td>
													<td><button class="btn btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">Take Action</button></td>
												</tr>
											<?php endforeach ?>
										</tbody>
									</table>
									<script>
										$('#applicationsTable').DataTable()
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" integrity="sha512-bE0ncA3DKWmKaF3w5hQjCq7ErHFiPdH2IGjXRyXXZSOokbimtUuufhgeDPeQPs51AI4XsqDZUK7qvrPZ5xboZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="<?= base_url("assets/vendors/") ?>jquery-steps/jquery.steps.css">

<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>
<main class="page-content">
	<?php $this->load->view('components/panel/widget/_alert_stack') ?>

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="">
			<h4 class="mb-3 mb-md-0">My Profile</h4>
			<a href="">(LDRT-nxBWow0F-23djX0H7V8vrHgAGhFnW-UNu9-GxI9)</a>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Profile</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="col-xl-3 col-lg-4 col-12">
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline">
										<h6 class="card-title mb-0">All Nominations</h6>
										<div>
											<a class="btn p-0 btn-icon-text text-dark" href="">View All</a>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h3 class="mb-2">3,897</h3>
											<div class="d-flex align-items-baseline">
												<p class="text-success">
													<span>+3.3%</span>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-12">
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline">
										<h6 class="card-title mb-0">Uncategorized</h6>
										<div>
											<a class="btn p-0 btn-icon-text text-dark" href="">View All</a>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h3 class="mb-2">3,897</h3>
											<div class="d-flex align-items-baseline">
												<p class="text-success">
													<span>+3.3%</span>
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-12">
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline">
										<h6 class="card-title mb-0">Under Review</h6>
										<div>
											<a class="btn p-0 btn-icon-text text-dark" href="">View All</a>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h3 class="mb-2">3,897</h3>
											<div class="d-flex align-items-baseline">
												<p class="text-success">
													<span>+3.3%</span>
												</p>
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
		<div class="col-12">
			<div class="row">
				<div class="col-xl-9 col-lg-8 col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-baseline mb-3">
								<h6 class="card-title mb-0">All Nominations</h6>
							</div>
							<div class="">
								<table class="table table-striped w-100" id="leadsDataTable">
									<thead>
										<tr role="row">
											<th>#</th>
											<th>Name of the Company</th>
											<th>Award Category</th>
											<th>Date Submitted</th>
											<th>Attempts</th>
											<th>Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php for ($i = 1; $i <= 20; $i++) : ?>
											<tr>
												<td><?= $i ?></td>
												<td><a href="<?= base_url('dashboard/application/' . random_string('alnum', 16)) ?>">Lorem ipsum dolor, sit amet</a></td>
												<td>Lorem ipsum dolor</td>
												<td>01/01/2022</td>
												<td>02 / --</td>
												<td><span class="badge bg-warning">Released</span></td>
												<td>
													<a href="" class="btn btn-danger"><i class="icon-md" data-feather="trash-2"></i></a>
												</td>
											</tr>
										<?php endfor ?>
									</tbody>
								</table>
								<script>
									new DataTable('#leadsDataTable');
								</script>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-baseline mb-3">
								<h6 class="card-title mb-0">Latest Updates</h6>
							</div>
							<div class="" style="height: 640px; overflow-y:scroll;">
								<?php for ($i = 0; $i < 20; $i++) : ?>
									<a href="javascript:;" class="row m-0 g-2 border-bottom p-2">
										<div class="col-auto">
											<img src="https://ui-avatars.com/api/?name=Leonardo+Payne" class="rounded-circle wd-35" alt="user">
										</div>
										<div class="col">
											<div class="d-flex justify-content-between">
												<h6 class="text-body mb-2">Leonardo Payne</h6>
												<p class="text-muted tx-12">12.30 PM</p>
											</div>
											<p class="text-muted tx-13">Hey! there I'm available...</p>
										</div>
									</a>
								<?php endfor ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- row -->
</main>

<main class="page-content">
	<?php $this->load->view('components/panel/widget/_alert_stack') ?>

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="">
			<h4 class="mb-3 mb-md-0">Moderator Dashboard</h4>
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
				<div class="col-xl-3 col-lg-4 col-12">
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<div class="d-flex justify-content-between align-items-baseline">
										<h6 class="card-title mb-0">All Nominations</h6>
										<div>
											<a class="btn p-0 btn-icon-text text-dark" href="<?= base_url('dashboard/applications') ?>">View All</a>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h3 class="mb-2"><?= $applications_count['all'] ?></h3>
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
										<h6 class="card-title mb-0">New Nominations</h6>
										<div>
											<a class="btn p-0 btn-icon-text text-dark" href="<?= base_url('dashboard/applications') ?>">View All</a>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h3 class="mb-2"><?= $applications_count['uncategorized'] ?></h3>

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
											<a class="btn p-0 btn-icon-text text-dark" href="<?= base_url('dashboard/applications') ?>">View All</a>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h3 class="mb-2"><?= $applications_count['under_review'] ?></h3>

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
										<h6 class="card-title mb-0">Rejected</h6>
										<div>
											<a class="btn p-0 btn-icon-text text-dark" href="<?= base_url('dashboard/applications') ?>">View All</a>
										</div>
									</div>
									<div class="row">
										<div class="col-12">
											<h3 class="mb-2"><?= $applications_count['rejected'] ?></h3>
											<!-- <div class="d-flex align-items-baseline">
												<p class="text-success">
													<span>+3.3%</span>
												</p>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 d-none">
			<div class="row">
				<div class="col-xl-9 col-lg-7 col-12">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-baseline mb-2">
								<h6 class="card-title mb-0">Monthly sales</h6>
								<div>
									<a class="btn p-0 btn-icon-text text-dark" href="<?= base_url('dashboard/applications') ?>">View All</a>
								</div>
							</div>
							<p class="text-secondary">Sales are activities related to selling or the number of goods or services sold in a given time period.</p>
							<div id="monthlySalesChart"></div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-5 col-12 grid-margin-stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-baseline">
								<h6 class="card-title mb-0">Cloud storage</h6>
								<div>
									<a class="btn p-0 btn-icon-text text-dark" href="">View All</a>
								</div>
							</div>
							<div id="storageChart"></div>
							<div class="row mb-3">
								<div class="col-6 d-flex justify-content-end">
									<div>
										<label class="d-flex align-items-center justify-content-end fs-10px text-uppercase fw-bolder">Total storage <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
										<h5 class="fw-bolder mb-0 text-end">8TB</h5>
									</div>
								</div>
								<div class="col-6">
									<div>
										<label class="d-flex align-items-center fs-10px text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Used storage</label>
										<h5 class="fw-bolder mb-0">~5TB</h5>
									</div>
								</div>
							</div>
							<div class="d-grid">
								<button class="btn btn-primary">Upgrade storage</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

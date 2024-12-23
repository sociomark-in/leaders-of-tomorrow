<main class="page-content">
	<?php $this->load->view('components/panel/widget/_alert_stack') ?>
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="">
			<h4 class="mb-3 mb-md-0">All Lead Agents</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">All Agents</li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-xl-8 col-lg-6 col-12">
			<div class="row">
				<?php foreach ($agents as $key => $agent) : ?>
					<div class="col-xl-4 col-lg-6 col-12">
						<div class="row">
							<div class="col-12 grid-margin stretch-card">
								<div class="card">
									<div class="card-body">
										<div class="row justify-content-between">
											<div class="col-auto">
												<!-- <?= implode(' ', [$employee['first_name'], $employee['last_name']]) ?> -->
												<img class="wd-50 ht-50 rounded-circle" src="https://ui-avatars.com/api/?name=<?= $agent['name'] ?>" alt="<?= $agent['name'] ?>">
											</div>
											<div class="col">
												<div class="row">
													<div class="col-12">
														<h6 class="card-title mb-0"><?= $agent['name'] ?></h6>
														<h3 class="mb-2">3,897</h3>
													</div>
												</div>
											</div>
											<div class="col-auto">
												<a class="btn p-0 btn-light" href="">
													<i class="p-1" data-feather="refresh-ccw"></i>
												</a>
												<a class="btn p-0 btn-primary" href="<?= base_url('dashboard/agent/' . $agent['agent_id']) ?>">
													<i class="p-1" data-feather="arrow-right"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<div class="col-xl-4 col-lg-6">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="row gap-3">
								<div class="col-12">
									<h6 class="card-title mb-0">Add A New Agent</h6>
								</div>
								<div class="col-12">
									<?= form_open('api/v2/dashboard/agency/new') ?>
									<input type="text" hidden name="agent_id" class="form-control" value="<?= random_string('numeric', 10) ?>">
									<div class="row gap-3">
										<div class="col-12">
											<div class="">
												<label for="" class="form-label">Agent Name</label>
												<input type="text" class="form-control" name="agent_name">
											</div>
										</div>
										<div class="col-12">
											<div class="row">
												<div class="col-auto"><button class="btn btn-primary" type="submit">Add New Agent</button></div>
											</div>
										</div>
									</div>
									<?= form_close() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

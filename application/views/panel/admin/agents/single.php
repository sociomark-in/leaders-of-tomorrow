<main class="page-content">
	<?php $this->load->view('components/panel/widget/_alert_stack') ?>
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="">
			<h4 class="mb-3 mb-md-0">Lead Agent #1</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="#">All Agents</a></li>
				<li class="breadcrumb-item active" aria-current="page">Agent #1</li>
			</ol>
		</nav>
	</div>

	<section>
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-12">
						<div class="row">
							<div class="col-12 grid-margin stretch-card">
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between align-items-baseline">
											<h6 class="card-title mb-0">All Leads</h6>
											<div>
												<a class="btn p-0 btn-icon-text text-dark" href="">View Page Preview</a>
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
					<div class="col-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col">
										<div class="row">
											<div class="col-12">
												<h6 class="card-title">Leads Details</h6>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-12">
										<table class="table table-bordered" id="agentLeads">
											<thead>
												<tr>
													<th>ID</th>
													<th>Name</th>
													<th>Email Id</th>
													<th>Contact No</th>
													<th>Organization Name</th>
												</tr>
											</thead>
											<tbody>
												<?php for ($i = 1; $i < 22; $i++) : ?>
													<tr>
														<td><?php echo $i;?></td>
														<td>Hemant</td>
														<td>hemant@sociomark.in</td>
														<td>9874563211</td>
														<td>Sociomark</td>
													</tr>
												<?php endfor ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<script>
	new DataTable("#agentLeads");
</script>

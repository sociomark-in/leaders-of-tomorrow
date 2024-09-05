<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-baseline">
						<h6 class="card-title mb-0">All Blog Posts</h6>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xl-8 col-12">
			<div class="row">
				<div class="col-12 col-xl-12 stretch-card">
					<div class="row flex-grow-1">
						<?php for ($i = 0; $i < 10; $i++) : ?>
							<div class="col-lg-4 col-md-6 grid-margin stretch-card">
								<div class="card">
									<div class="card-body">
										<div class="d-flex justify-content-between align-items-baseline">
											<h6 class="card-title mb-0">Award Category</h6>
											<div class="dropdown mb-2">
												<a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
												</a>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-12">
												<h3 class="mb-2">3,897</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endfor ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-baseline mb-2">
								<h6 class="card-title mb-0">New Nominations</h6>
								<div class="dropdown mb-2">
									<a type="button" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
									</a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton7">
										<a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
									</div>
								</div>
							</div>
							<div class="table-responsive">
								<table class="table table-hover mb-0" id="leadsDataTable">
									<thead>
										<tr>
											<th class="pt-0">#</th>
											<th class="pt-0">Title</th>
											<th class="pt-0">Author</th>
											<th class="pt-0">Category</th>
											<th class="pt-0">Tags</th>
											<th class="pt-0">Date</th>
											<th class="pt-0">Views Count</th>
											<th class="pt-0">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
										for ($i = 1; $i < 20; $i++) : ?>
											<tr>
												<td><?= $i ?></td>
												<td><a href="<?= base_url("posts/blog/" . $blog['uslug'] . "/edit") ?>">Lorem, ipsum dolor.</a></td>
												<td> Lorem, ipsum dolor.</td>
												<td> Lorem, ipsum dolor.</td>
												<td> Lorem, ipsum dolor.</td>
												<td> Lorem, ipsum dolor.</td>
												<td> Lorem, ipsum dolor.</td>
												<td> Lorem, ipsum dolor.</td>
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
			</div>
		</div>
		<div class="col-xl-4">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<div class="d-flex justify-content-between align-items-baseline">
								<h6 class="card-title mb-0">All Blog Posts</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</main>

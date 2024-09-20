<main>
	<section class="section pb-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('awards') ?>">Awards</a></li>
							<li class="breadcrumb-item active" aria-current="page">All Categories</li>
						</ol>
					</nav>
				</div>
				<div class="col-xl-auto col-lg-8 col-md-10 col-12">
					<div class="page-title">
						<div class="row align-items-center justify-content-center">
							<div class="col-auto">
								<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
							</div>
							<div class="col-auto">
								<h1>All Categories</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12">
					<ul class="nav nav-pills gap-2 mb-3" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">MSME Awards</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Individual Awards</button>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
							<div class="row g-2">
								<?php foreach ($categories['msme'] as $key => $category): ?>
									<div class="col-xxl-4 col-lg-6">
										<div class="card h-100">
											<div class="card-body">
												<div class="row h-100 flex-column justify-content-between">
													<div class="col-12">
														<div class="mb-3">
															<h5><?= $category['name'] ?></h5>
															<p>Lorem ipsum dolor sit amet.</p>
														</div>
													</div>
													<div class="col-12">
														<a href="<?= base_url('dashboard/category/' . $category['code'] . "/nominate") ?>" class="btn btn-red">Apply Now</a>
														<a href="<?= base_url('awards/category/' . $category['code']) ?>" class="btn">Details</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						</div>
						<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
							<div class="row g-2">
								<?php foreach ($categories['individual'] as $key => $category): ?>
									<div class="col-xxl-3">
										<div class="card h-100">
											<div class="card-body">
												<div class="row h-100 flex-column justify-content-between">
													<div class="col-12">
														<div class="mb-3">
															<h5><?= $category['name'] ?></h5>
															<p>Lorem ipsum dolor sit amet.</p>
														</div>
													</div>
													<div class="col-12">
														<a href="<?= base_url('awards/category/' . $category['code'] . "/nominate") ?>" class="btn btn-red">Apply Now</a>
														<a href="<?= base_url('awards/category/' . $category['code']) ?>" class="btn">Details</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

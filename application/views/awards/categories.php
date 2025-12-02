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
			<div class="row g-2 justify-content-center">
				<?php if (count($categories['active']) > 0) : ?>
					<?php foreach ($categories['active'] as $key => $category): ?>
						<div class="col-xxl-4 col-lg-6">
							<a class="card glw-card h-100" id="categoryModalHandler<?= $key ?>" data-modal-category="<?= $category['code'] ?>" data-bs-toggle="modal" data-bs-target="#categoryModal">
								<div class="card-body">
									<div class="row h-100 align-items-center">
										<div class="col-auto">
											<div class="glw-image">
												<div class="glw-icon p-2 pb-3">
													<img src="<?= base_url('assets/images/icons/categories/' . $category['code'] . '.png') ?>" class="w-100" alt="">
												</div>
											</div>
										</div>
										<div class="col">
											<h6 class="m-0"><?= $category['name'] ?></h6>
										</div>
									</div>
								</div>
							</a>
							<script>
								$button = $("#categoryModalHandler<?= $key ?>");
								$button.on("click", () => {
									$.ajax({
										url: "<?= base_url('api/data/CategoryAPIController/get_category_by_code') ?>",
										data: {
											category: "<?= $category['code'] ?>"
										},
										success: function(result) {
											console.log(result);
											$("#categoryModal .modal-title").text(result.name)
											$("#categoryModal .modal-body").html(
												"<p>" + result.description + "</p>"
											)
										}
									})
								})
							</script>
						</div>
					<?php endforeach ?>
				<?php else: ?>
					<?php foreach ($categories['all'] as $key => $category): ?>
						<div class="col-xxl-4 col-lg-6">
							<a class="card glw-card h-100" id="categoryModalHandler<?= $key ?>" data-modal-category="<?= $category['code'] ?>" data-bs-toggle="modal" data-bs-target="#categoryModal">
								<div class="card-body">
									<div class="row h-100 align-items-center">
										<div class="col-auto">
											<div class="glw-image">
												<div class="glw-icon p-2 pb-3">
													<img src="<?= base_url('assets/images/icons/categories/' . $category['code'] . '.png') ?>" class="w-100" alt="">
												</div>
											</div>
										</div>
										<div class="col">
											<h6 class="m-0"><?= $category['name'] ?></h6>
										</div>
									</div>
								</div>
							</a>
							<script>
								$button = $("#categoryModalHandler<?= $key ?>");
								$button.on("click", () => {
									$.ajax({
										url: "<?= base_url('api/data/CategoryAPIController/get_category_by_code') ?>",
										data: {
											category: "<?= $category['code'] ?>"
										},
										success: function(result) {
											console.log(result);
											$("#categoryModal .modal-title").text(result.name)
											$("#categoryModal .modal-body").html(
												"<p>" + result.description + "</p>"
											)
										}
									})
								})
							</script>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</div>
		</div>
		<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModelLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title fs-5">Modal title</h1>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body"></div>
					<div class="modal-footer">
						<a href="<?=  ?>" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
						<button type="button" class="btn btn-red">Save changes</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<main>
	<section class="py-3 py-md-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6 col-lg-8 col-md-10 col-12">
					<div class="page-title">
						<div class="row align-items-center justify-content-center">
							<div class="col-auto">
								<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
							</div>
							<div class="col-auto">
								<h1>All Cities</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-0">
		<div class="container">
			<div class="row">
				<?php foreach ($cities as $key => $city) : ?>
					<div class="col-lg-4 col-md-6 col-6">
						<a href="<?= base_url('city/') . strtolower($city) ?>" class="interactive-tile">
							<div class="row">
								<div class="col-auto">
									<div class="photo mb-3">
										<img src="https://placehold.co/100x100" alt="" height="100">
									</div>
								</div>
								<div class="col">
									<div class="desc py-3 py-md-4">
										<h4><?= $city ?></h4>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</section>
</main>

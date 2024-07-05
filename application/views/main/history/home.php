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
								<h1>All Seasons</h1>
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
				<?php for ($i = 11; $i > 7; $i--) : ?>
					<div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-6">
						<a href="<?= base_url('history/') . "season-" . $i ?>"  class="speaker-tile">
							<div class="photo mb-3">
								<img src="https://placehold.co/288x360" alt="">
							</div>
							<div class="desc text-center">
								<h5>Season <?= $i ?></h5>
								<p>Lorem ipsum dolor sit amet.</p>
							</div>
						</a>
					</div>
				<?php endfor ?>
				<?php for ($i = 7; $i > 0; $i--) : ?>
					<div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-6">
						<div class="speaker-tile">
							<div class="photo mb-3">
								<img src="https://placehold.co/288x360" alt="">
							</div>
							<div class="desc text-center">
								<h5>Season <?= $i ?></h5>
								<p>Lorem ipsum dolor sit amet.</p>
							</div>
						</div>
					</div>
				<?php endfor ?>
			</div>
		</div>
	</section>
</main>

<div class="col-12">
	<div class="partners-nav row m-0 g-3 justify-content-center justify-content-lg-evenly">
		<?php foreach ($partners as $key => $partner) : ?>
			<div class="col-md-auto col-sm-6 col-12" data-aos="fade-up" data-aos-delay="<?= 100 * $key ?>">
				<a class="nav-link text-dark text-center">
					<p class="mb-3">
						<?= $partner['text'] ?>

					</p>
					<div class="px-3">
						<a href="<?= $partner['url'] ?>"><img src="<?= base_url('assets/images/cities/' . strtolower($city) . '/partners/') . $partner['logo'] ?>" alt="<?= $partner['text'] ?>" height="80"></a>
					</div>
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>

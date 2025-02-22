<?php foreach ($partners as $key => $partner) : ?>
	<div class="col-md-auto col-sm-6 col-12" data-aos="fade-up" data-aos-delay="<?= 100 * $key ?>">
		<div class="nav-link text-dark text-center">
			<p class="mb-3">
				<?= $partner['text'] ?>
			</p>
			<div class="px-3">
				<a href="<?= $partner['url'] ?>" target="_blank"><img src="<?= base_url('assets/images/cities/' . strtolower($city) . '/partners/') . $partner['logo'] ?>" alt="<?= $partner['text'] ?>" height="80"></a>
			</div>
		</div>
	</div>
<?php endforeach ?>

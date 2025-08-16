<?php foreach ($partners as $key => $partner) : ?>
	<div class="col-md-auto col-sm-6 col-12" data-aos="fade-up" data-aos-delay="<?= 100 * $key ?>">
		<div class="nav-link text-dark text-center">
			<p class="mb-3">
				<strong class="text-uppercase"><?= $partner['text'] ?></strong>
			</p>
			<div class="p-3">
				<a href="<?= $partner['url'] ?? "javascript:void(0)" ?>" target="_blank"><img src="<?= base_url('assets/images/sponsors/') . $partner['logo'] ?>" alt="<?= $partner['text'] ?>" height="50"></a>
			</div>
		</div>
	</div>
<?php endforeach ?>
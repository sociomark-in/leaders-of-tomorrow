<div class="col-md-10 col-12">
	<div class="partners-nav row g-3 justify-content-center justify-content-lg-between">
		<div class="col-sm-6 col-12 col-md-auto">
			<a class="nav-link text-dark text-center">
				<p class="mb-3">
					Initiated By
				</p>
				<div class="px-3">
					<a href="javascript:void(0)"><img src="<?= base_url('assets/images/sponsors/times-influence.png')?>" alt="Times Influence" height="80"></a>
				</div>
			</a>
		</div>
		<?php foreach ($partners as $key => $partner) : ?>
			<div class="col-sm-6 col-12 col-md-auto">
				<a class="nav-link text-dark text-center">
					<p class="mb-3">
						<?= $partner['text'] ?>

					</p>
					<div class="px-3">
						<a href="<?= $partner['url'] ?>"><img src="<?= base_url('assets/images/sponsors/' . $season . '/') . $partner['logo'] ?>" alt="<?= $partner['text'] ?>" height="80"></a>
					</div>
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>

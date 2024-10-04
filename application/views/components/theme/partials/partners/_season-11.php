<div class="col-md-10 col-12">
	<div class="partners-nav row g-3 justify-content-center justify-content-lg-between">
		<?php foreach ($partners as $key => $partner) : ?>
			<div class="col-sm-6 col-12 col-md-auto">
				<a class="nav-link text-dark text-center">
					<p class="mb-3">
						<?= $partner['text'] ?>

					</p>
					<div class="px-3">
						<a href="<?= $partner['url'] ?>"><img src="https://tnics.in/assets/media/images/logos/<?= $partner['logo'] ?>" alt="<?= $partner['text'] ?>" height="80"></a>
					</div>
				</a>
			</div>
		<?php endforeach ?>
	</div>
</div>

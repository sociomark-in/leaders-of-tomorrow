<section class="py-3 py-md-5 bg-white">
	<div class="container">
		<div class="row m-0">
			<div class="col-12">
				<div class="mb-md-4 mb-3 section-title text-center">
					<h2 class=""><span>Our Partners</span></h2>
				</div>
				<div class="row m-0 justify-content-center">
					<div class="col-lg-6 col-md-10 col-12">
						<?php switch ($this->uri->segment(2)):
							case 'season-11':
							case 'season-10':
							case 'season-9':
							case 'season-8':
						?>
								<div class="partners-nav row g-3 justify-content-center justify-content-lg-between">
									<?php foreach ($partners as $key => $partner) : ?>
										<div class="col-6 col-md-auto">
											<a class="nav-link text-dark text-center">
												<p class="mb-3">
													<?= $partner['text'] ?>
													
												</p>
												<div class="px-3">
													<a href="<?= $partner['url'] ?>"><img src="https://tnics.in/assets/media/images/logos/<?= $partner['logo'] ?>" alt="<?= $partner['text'] ?>" height="40"></a>
												</div>
											</a>
										</div>
									<?php endforeach ?>
								</div>
							<?php
								break;

							default:
							?>
								<div class="partners-nav row g-3 justify-content-center justify-content-lg-between">
									<div class="col-6 col-md-auto">
										<a class="nav-link text-dark text-center">
											<p class="mb-3">
												An Initiative By
											</p>
											<div class="px-3">
												<img src="<?= base_url('assets/images/sponsors/') ?>times.png" alt="Partners" height="80">
											</div>
										</a>
									</div>
									<div class="col-6 col-md-auto">
										<a class="nav-link text-dark text-center">
											<p class="mb-3">
												Presented By
											</p>
											<div class="px-3">
												<img src="<?= base_url('assets/images/sponsors/12/') ?>hdfc.png" alt="Partners" height="80">
											</div>
										</a>
									</div>
								</div>
						<?php
								break;
						endswitch; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

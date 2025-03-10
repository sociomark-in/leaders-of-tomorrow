<main>
	<section class="section pb-md-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('awards') ?>">Awards</a></li>
							<li class="breadcrumb-item active" aria-current="page">Gallery</li>
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
								<h1>Key Moments</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="gallery" class="section">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
						<div class="gallery-masonry row justify-content-center g-3 g-md-0 gap-md-2 gap-lg-4" id="galleryMasonry">
							<?php for ($i = 1; $i <= count($gallery); $i++) : ?>
								<a class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 tile gallery-tile" data-aos="fade-left" data-aos-delay="<?= $i * 10 ?>" href="<?= base_url('assets/images/galleries/12/' . $i . '.jpg') ?>">
									<figure>
										<picture>
											<!-- <source srcset="https://placehold.co/250x167/webp" type="image/webp"> -->
											<source srcset="<?= base_url('assets/images/galleries/12/thumbs/'  . $i . '.jpg') ?>" type="image/jpg">
											<img class="w-100" src="<?= base_url('assets/images/galleries/12/'  . $i . '.jpg') ?>" alt="" loading="lazy">
										</picture>
										<figcaption></figcaption>
									</figure>
								</a>
							<?php endfor ?>
						</div>
						<script>
						var gallery = lightGallery(document.getElementById('galleryMasonry'), {
							plugins: [lgZoom, lgThumbnail],
							speed: 500,
						});
					</script>
				</div>
			</div>
		</div>
	</section>
</main>

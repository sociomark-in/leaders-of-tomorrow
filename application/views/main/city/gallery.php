<main>
	<!--<div class="d-block d-md-none fixed-mobile">
			<a class="btn btn-red p-2 py-4 text-uppercase" href="<?= base_url('city/' . strtolower($city['name'])  . '/register') ?>">Register</a>
		</div>-->
	<section class="section pb-md-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('all-cities') ?>">All Cities</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('city/' . strtolower($city['name'])) ?>"><?= $city['name'] ?></a></li>
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
						<div class="gallery-masonry" id="galleryMasonry">
							<?php for ($i = 1; $i <= count($city['gallery']); $i++) : ?>
								<a class="tile gallery-tile mb-2" data-aos="fade-left" data-aos-delay="<?= $i * 10 ?>" href="<?= base_url('assets/images/cities/' . strtolower($city['name']) . '/gallery/' . $i . '.jpg') ?>">
									<figure>
										<picture>
											<!-- <source srcset="https://placehold.co/250x167/webp" type="image/webp"> -->
											<source srcset="<?= base_url('assets/images/cities/' . strtolower($city['name']) . '/gallery/thumbs/'  . $i . '.jpg') ?>" type="image/jpg">
											<img class="w-100" src="<?= base_url('assets/images/cities/' . strtolower($city['name']) . '/gallery/thumbs/'  . $i . '.jpg') ?>" alt="" loading="lazy">
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
	<div class="footer-lineart" style="background-image: url('<?= base_url('assets/images/icons/city/') ?><?= strtolower($city['name']) ?>-lineart-color.png')">

	</div>
</main>

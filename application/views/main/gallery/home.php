<main>
	<section class="py-3 py-md-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-5 col-lg-8 col-md-10 col-12">
					<div class="page-title">
						<div class="row align-items-center justify-content-center">
							<div class="col-auto">
								<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
							</div>
							<div class="col-auto">
								<h1>Gallery</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="gallery" class="section">
		<div class="container">
			<div class="gallery-masonry" id="galleryMasonry">
				<?php for ($i = 0; $i < 24; $i++) :  ?>
					<a href="https://placehold.co/2000x1335/jpg">
						<figure>
							<picture>
								<source srcset="https://placehold.co/250x167/webp" type="image/webp">
								<source srcset="https://placehold.co/250x167/jpg" type="image/jpg">
								<img class="w-100" src="https://placehold.co/250x167/jpg" alt="" loading="lazy">
							</picture>
							<figcaption></figcaption>
						</figure>
					</a>
				<?php endfor ?>
			</div>
		</div>
		<script>
			lightGallery(document.getElementById('galleryMasonry'), {
				plugins: [lgZoom, lgThumbnail],
				speed: 500,
			});
		</script>
	</section>
</main>

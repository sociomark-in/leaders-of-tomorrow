<main>
	<section class="section pb-md-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<!-- <li class="breadcrumb-item"><a href="<?= base_url('history') ?>">All Seasons</a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Past Seasons</li>
							<li class="breadcrumb-item active" aria-current="page">Season <?= $season ?></li>
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
								<h1>Season <?= $season ?></h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="">
		<div class="container">
			<div class="row justify-content-center g-3 g-md-4">
				<div class="col-12">
					<ul class="nav nav-pills" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="btn btn-icon-prepend btn-red text-uppercase" href="<?= current_url() . "/awards" ?>">
								<img src="<?= base_url('assets/images/icons/') ?>award.png" class="icon" alt="Award Icon">
								Awards
							</a>
						</li>
						<?php foreach ($cities as $key => $city) : ?>
							<?php if ($city == $page['name']): ?>
								<li class="nav-item">
									<a href="<?= current_url() ?>?city=<?= $city ?>" class="nav-link active" id="<?= strtolower($city) ?>"><?= $city ?></a>
								</li>
							<?php else: ?>
								<li class="nav-item">
									<a href="<?= current_url() ?>?city=<?= $city ?>" class="nav-link" id="<?= strtolower($city) ?>"><?= $city ?></a>
								</li>
							<?php endif ?>
						<?php endforeach ?>
					</ul>
				</div>
				<div class="col-12">
					<div class="row align-items-center">
						<div class="col-xl-5 col-lg-6 col-md-6 col-12">
							<div class="media-content" data-aos="fade-right">
								<lite-youtube videoid="<?= $page['promo'] ?>">
									<a class="lite-youtube-fallback w-100" href="https://www.youtube.com/watch?v=<?= $page['promo'] ?>"><?= $city ?></a>
								</lite-youtube>
							</div>
						</div>
						<div class="col-xl-7 col-lg-6 col-12">
							<?php if (isset($page['theme'])) : ?>
								<div class="section-title aos-init aos-animate" data-aos="fade-left">
									<h2><span><?= $page['theme'] ?></span></h2>
								</div>
							<?php endif ?>
							<div class="desc">
								<?php if (isset($city['text'])) : ?>
									<p class="wrapped" data-aos="fade-left" data-aos-delay="400"></p>
								<?php endif ?>
								<div class="row">
									<div class="col-md-12">
										<p class="mb-2">Date:</p>
										<h4 class="text-red" data-aos="fade-left" data-aos-delay="400"><?= $page['date'] ?></h4>
									</div>
									<div class="col-md-12">
										<p class="mb-2">Venue:</p>
										<h4 class="text-red" data-aos="fade-left" data-aos-delay="400"><?= $page['venue'] ?></h4>
									</div>
								</div>
								<?php if (isset($city['episodes'])) : ?>
									<a data-aos="fade-left" data-aos-delay="500" href="https://www.youtube.com/playlist?list=<?= $city['episodes'] ?>" class="btn btn-yellow" target="_blank">View All Episodes</a>
								<?php endif ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php if (!is_null($springboard['gallery']) > 0): ?>
		<section id="gallery" class="section pt-0">
			<div class="container">
				<div class="row g-3">
					<div class="col-12">
						<div class="section-title">
							<h2><span>Key Moments</span></h2>
						</div>
					</div>
					<div class="col-12">
						<div class="row g-3" id="galleryMasonry">
							<?php foreach ($springboard['gallery'] as $key => $image) : ?>
								<a class="col-xxl-2 col-xl-3 col-lg-4 col-6" data-aos="fade-left" data-aos-delay="<?= $key * 10 ?>" href="<?= base_url('assets/images/history/' . $season . '/springboards/' . strtolower($page['name']) . '/gallery/' . $image) ?>">
									<figure>
										<picture>
											<!-- <source srcset="https://placehold.co/250x167/webp" type="image/webp"> -->
											<source srcset="<?= base_url('assets/images/history/' . $season . '/springboards/' . strtolower($page['name']) . '/gallery/thumbs/' . $image) ?>" type="image/jpg">
											<img class="w-100" src="<?= base_url('assets/images/history/' . $season . '/springboards/' . strtolower($page['name']) . '/gallery/thumbs/' . $image) ?>" alt="" loading="lazy">
										</picture>
										<figcaption></figcaption>
									</figure>
								</a>
							<?php endforeach ?>
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
	<?php endif ?>
	<!-- 
	<section id="live">
		<div class="container">
			<div class="row justify-content-center g-4">
				<div class="col-xl-8 col-lg-10 col-12">
					<div class="section-title text-center">
						<h2><span>Season <?= $season ?> Awards</span></h2>
					</div>
				</div>
				<div class="col-xl-10 col-12">
					<div class="media-content springboard-banner">
						<div class="media-content" data-aos="fade-right">
							<div class="wrap">
							<iframe class="w-100" src="https://www.youtube.com/embed/<?= $awards['live'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="winners" class="pt-0">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Season <?= $season ?> Winners</span></h2>
					</div>
				</div>
				<div class="col-12">
					<table class="table table-bordered heading-red">
						<thead>
							<tr>
								<th>Sr. No.</th>
								<th class="p-3">Categories</th>
								<th class="p-3">Name of Winners</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($awards['winners'] as $key => $winner) : ?>
								<tr>
									<td><?= $key + 1 ?></td>
									<td class="p-3"><?= $winner['category'] ?></td>
									<td class="p-3"><i class="fa-solid fa-trophy me-3 text-gold"></i><strong><?= $winner ?></strong></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<section id="speakers" class="d-none pt-0">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>List of Speakers</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiper speakerSwiper">
						<div class="swiper-wrapper">
							<?php for ($i = 0; $i < 12; $i++) : ?>
								<div class="swiper-slide p-3">
									<div class="speaker-tile normal">
										<div class="photo mb-3">
											<img src="https://placehold.co/288x360" class="w-100" alt="">
										</div>
										<div class="desc text-center">
											<h5>Lorem ipsum dolor sit.</h5>
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, nostrum.</p>
										</div>
									</div>
								</div>
							<?php endfor ?>
						</div>
					</div>
					<script>
						new Swiper(".speakerSwiper", {
							slidesPerView: 2,
							breakpoints: {
								640: {
									slidesPerView: 3,
									spaceBetween: 20,
								},
								1024: {
									slidesPerView: 4,
									spaceBetween: 50,
								},
								1400: {
									slidesPerView: 5,
									spaceBetween: 30,
								},
							},
						})
					</script>
				</div>
			</div>
		</div>
	</section>
	<section id="juries" class="d-none p-0">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>List of Juries</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiper jurySwiper">
						<div class="swiper-wrapper">
							<?php for ($i = 0; $i < 12; $i++) : ?>
								<div class="swiper-slide p-3">
									<div class="speaker-tile normal">
										<div class="photo mb-3">
											<img src="https://placehold.co/288x360" class="w-100" alt="">
										</div>
										<div class="desc text-center">
											<h5>Lorem ipsum dolor sit.</h5>
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, nostrum.</p>
										</div>
									</div>
								</div>
							<?php endfor ?>
						</div>
					</div>
					<script>
						new Swiper(".jurySwiper", {
							slidesPerView: 2,
							breakpoints: {
								640: {
									slidesPerView: 3,
									spaceBetween: 20,
								},
								1024: {
									slidesPerView: 4,
									spaceBetween: 50,
								},
								1400: {
									slidesPerView: 5,
									spaceBetween: 30,
								},
							},
						})
					</script>
				</div>
			</div>
		</div>
	</section> -->
</main>
<link rel="stylesheet" href="<?= base_url('assets/css/awards.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/custom.min.css') ?>">
<main class="awards-wrapper">
	<div class="hanging-ribbon d-none">
		<div class="content">
			<p>Season</p>
			<h3>12</h3>
		</div>
	</div>

	<div class="fireworks">
		<button class="btn btn-red" id="party"></button>
		<style>
			#party {
				position: fixed;
				z-index: 999;
				bottom: 5rem;
				right: 1rem;
				width: 3rem;
				height: 3rem;
				background-image: url('<?= base_url("assets/images/icons/fireworks.png") ?>');
				background-position: center;
				background-size: 60% auto;
				background-repeat: no-repeat;
				border-radius: 50%;
			}
		</style>
	</div>

	<section class="section pb-md-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Past Seasons</li>
							<li class="breadcrumb-item"><a href="<?= base_url('history/season-'). $season ?>">Season <?= $season ?></a></li>
							<li class="breadcrumb-item active" aria-current="page">Season <?= $season ?> Awards</li>
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
								<h1>Season <?= $season ?> Awards</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="live" class="section pb-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10 col-12">
					<div class="media-content springboard-banner">
						<div class="wrap">
							<!-- <a href="<?= base_url('panel') ?>">
								<picture>
									<source srcset="<?= base_url('assets/images/banners/awards_banner_h.jpg') ?>" type="image/jpg" media="(min-width: 768px)">
									<source srcset="<?= base_url('assets/images/banners/awards_banner_v.jpg') ?>" type="image/jpg" media="(max-width: 768px)">
									<img class="w-100" src="<?= base_url('assets/images/banners/awards_banner_v.jpg') ?>" alt="">
								</picture>
							</a> -->
							<iframe class="w-100" src="https://www.youtube.com/embed/ou5PFIuEoQ0?si=elC6hWnQL92do0sn" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="categories" class="section">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Categories</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="row g-2 justify-content-center">
						<?php foreach ($categories['all'] as $key => $category): ?>
							<div class="col-xxl-4 col-lg-6">
								<a class="card glw-card h-100">
									<div class="card-body">
										<div class="row h-100 align-items-center">
											<div class="col-auto">
												<div class="glw-image">
													<div class="glw-icon p-2 pb-3">
														<img src="<?= base_url('assets/images/icons/categories/' . $category['code'] . '.png') ?>" class="w-100" alt="">
													</div>
												</div>
											</div>
											<div class="col">
												<h6 class="m-0"><?= $category['name'] ?></h6>
											</div>
										</div>
									</div>
								</a>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="winners" class="pb-0">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Season 12 Winners</span></h2>
					</div>
				</div>
				<div class="col-12">
					<table class="table table-bordered heading-red">
						<thead>
							<tr>
								<!-- <th>Sr. No.</th> -->
								<th class="p-3">Categories</th>
								<th class="p-3">Name of Winners</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($winners as $key => $winner) :
								$organization = "<strong>" . $winner['organization'] . "</strong>";
								if ($winner['type'] == "INDIVIDUAL") {
									$organization = implode(', ', ["<strong>" . $winner['person'] . "</strong>", $winner['designation'], $winner['organization']]);
								}
							?>
								<tr>
									<td class="p-3"><?= $winner['category'] ?></td>
									<td class="p-3">
										<div class="d-flex">
											<i class="fa-solid fa-trophy me-3 mt-1 text-gold"></i>
											<p class="mb-0"><?= $organization ?></p>
										</div>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
				<div class="col-12">
					<div class="swiper gallerySwiper">
						<div class="swiper-wrapper" id="galleryMasonry">
							<?php
							$i = 0;
							foreach ($winners as $key => $winner):
								$organization = "<strong>" . $winner['organization'] . "</strong>";
								if ($winner['type'] == "INDIVIDUAL") {
									$organization = implode(', ', ["<strong>" . $winner['person'] . "</strong>", $winner['designation'], $winner['organization']]);
								}
							?>
								<?php if (!is_null($winner['gallery'])) : ?>
									<a href="<?= base_url('assets/images/history/'. $season . '/awards/gallery/' . $winner['gallery']['main']) ?>" class="swiper-slide" data-aos="fade-left" data-aos-delay="<?= $i * 10 ?>" href="<?= base_url($winner['gallery']['main']) ?>" data-sub-html="<p class='mb-1'><?= $winner['category'] ?></p>
											<h5><?= $organization ?></h5>">
										<picture>
											<source srcset="<?= base_url('assets/images/history/'. $season . '/awards/gallery/' . $winner['gallery']['thumb']) ?>" type="image/jpg">
											<img src="<?= base_url('assets/images/history/'. $season . '/awards/gallery/' . $winner['gallery']['thumb']) ?>" class="w-100 mb-3" alt="">
										</picture>
										<div class="caption text-dark d-none d-md-block">
											<p class="mb-1"><?= $winner['category'] ?></p>
											<h5><?= $organization ?></h5>
										</div>

									</a>
								<?php endif ?>
							<?php endforeach ?>
						</div>
					</div>
					<script>
						var gallery = lightGallery(document.getElementById('galleryMasonry'), {
							plugins: [lgZoom, lgThumbnail],
							speed: 500,
						});
						new Swiper(".gallerySwiper", {
							slidesPerView: 1.4,
							spaceBetween: 10,
							autoplay: {
								delay: 2500,
							},
							loop: true,
							breakpoints: {
								768: {
									slidesPerView: 2,
									spaceBetween: 20,
								},
								1400: {
									slidesPerView: 3,
									spaceBetween: 40,
								},
							},
						})
					</script>
				</div>
			</div>
		</div>
	</section>

	<section id="grand-juries" class="pb-0 d-none">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Grand Jury</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiper grandJurySwiper">
						<div class="swiper-wrapper">
							<?php foreach ($grand_juries as $key => $person) : ?>
								<div class="swiper-slide p-3">
									<div class="speaker-tile speaker-tile-01 normal">
										<div class="photo">
											<img src="<?= base_url('assets/images/history/' . $season . '/awards/grand-juries/') . $person['photo'] ?>" class="w-100" alt="">
										</div>
										<div class="desc text-center">
											<h5><?= $person['name'] ?></h5>
											<p><?= $person['description'] ?></p>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
					<script>
						new Swiper(".grandJurySwiper", {
							autoplay: {
								delay: 2000,
							},
							loop: true,
							slidesPerView: 1.3,
							// grid: {
							// 	rows: 1,
							// 	fill: 'row'
							// },
							breakpoints: {
								640: {
									slidesPerView: 2,
									spaceBetween: 20,
								},
								768: {
									slidesPerView: 3,
									spaceBetween: 20,
								},
								1024: {
									slidesPerView: 4,
									spaceBetween: 30,
								},
								1400: {
									slidesPerView: 5,
									spaceBetween: 0,
								},
							},
						})
					</script>
				</div>
			</div>
		</div>
	</section>

	<section id="speakers" class="pb-0 d-none">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Key Speakers</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="row align-items-center">
						<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
							<?php foreach ($chief_guest as $key => $person): ?>
								<div class="speaker-tile speaker-tile-02 normal">
									<div class="photo">
										<img src="<?= base_url('assets/images/history/' . $season . '/awards/speakers/') . $person['photo'] ?>" class="w-100" alt="">
									</div>
									<div class="desc text-center">
										<!-- <h5>Chief Guest</h5> -->
										<h5><?= $person['name'] ?></h5>
										<p><?= $person['description'] ?></p>
									</div>
								</div>
							<?php endforeach ?>
						</div>
						<div class="col-xxl-9 col-xl-8 col-lg-6 col-12">
							<!-- <div class="col-12"> -->
							<div class="swiper speakerSwiper">
								<div class="swiper-wrapper">
									<?php foreach ($speakers as $key => $person): ?>
										<div class="swiper-slide p-3">
											<div class="speaker-tile speaker-tile-02 normal">
												<div class="photo">
													<img src="<?= base_url('assets/images/history/' . $season . '/awards/speakers/') . $person['photo'] ?>" class="w-100" alt="">
												</div>
												<div class="desc text-center">
													<h5><?= $person['name'] ?></h5>
													<p><?= $person['description'] ?></p>
												</div>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							</div>
							<script>
								new Swiper(".speakerSwiper", {
									slidesPerView: 1.4,
									autoplay: {
										delay: 4000,
									},
									loop: true,
									breakpoints: {
										640: {
											slidesPerView: 2,
											spaceBetween: 20,
										},
										1024: {
											slidesPerView: 2,
											spaceBetween: 50,
										},
										1400: {
											slidesPerView: 3,
											spaceBetween: 0,
										},
									},
								})
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<script src="https://cdn.jsdelivr.net/npm/tsparticles@1.42.4/tsparticles.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/tsparticles-preset-confetti@1.42.4/tsparticles.preset.confetti.min.js"></script>
<script src="<?= base_url('assets/js/awards.js') ?>"></script>
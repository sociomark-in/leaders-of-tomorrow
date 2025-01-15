<main>
	<!-- <div class="d-block d-md-none fixed-mobile">
		<a class="btn btn-red p-2 py-4 text-uppercase" href="<?= base_url('city/' . strtolower($city['name'])  . '/register') ?>">Register</a>
	</div> -->
	<section class="section pb-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('all-cities') ?>">All Cities</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?= $city['name'] ?></li>
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
								<h1><?= $city['name'] ?> Springboard</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pb-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10 col-12">
					<div class="media-content springboard-banner">
						<div class="wrap">
							<picture>
								<source srcset="" type="image/">
								<img class="w-100" src="<?= base_url('assets/images/cities/' . strtolower($city['name']) . '/banner.jpg') ?>" alt="<?= $city['name'] ?> Banner">
							</picture>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section pb-0 blank" id="about">
		<div class="container">
			<div class="text-content text-lg mb-3 mb-md-5">
				<div class="glass-card">
					<div class="card-body">
						<p data-aos="fade-up">
							MSMEs in India are vital for economic growth, contributing significantly to GDP, employment & exports. They drive innovation, support large industries through supply chain integration & promote regional economic development.
						</p>
						<p data-aos="fade-up" data-aos-delay="200">
							Aligning with our theme <strong class="text-red">"Powering Entrepreneurs for the Global Stage."</strong>, these discussions will encompass topics such as policy support, streamlined regulations, digitization & impact of the budget, providing a comprehensive overview of macro-level challenges & opportunities for MSMEs to compete on a global scale.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section pb-0">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-5 col-lg-6 col-md-6 col-12">
					<div class="media-content" data-aos="fade-right">
						<!--<iframe class="w-100" src="https://www.youtube.com/watch?v=4yf12kND24M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>-->
						<iframe class="w-100" src="https://www.youtube.com/embed/hPLXN9QX0pk?si=sMt3x1_4IKRAY6Ja" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-xl-7 col-lg-6 col-12">
					<div class="section-title" data-aos="fade-left">
						<h2><span>Indore: Setting the Benchmark for India's Sustainability Vision</span></h2>
					</div>
					<div class="desc">
						<p data-aos="fade-left" data-aos-delay="200">
							Indore is leading the charge in India’s sustainability journey, setting a high benchmark for other cities to follow. Known for its groundbreaking initiatives in waste management, the city became the first in India to achieve a zero landfill status, transforming waste into resources through recycling and composting.
						</p>
						<p data-aos="fade-left" data-aos-delay="400">
							Indore is not only reimagining its future but is also inspiring other Indian cities to adopt sustainable practices and create a roadmap for a greener, more sustainable India. Join us at the Leaders of Tomorrow Indore Springboard - one pitstop on our pan India roadshow series, only on <strong class="text-red">ET NOW</strong>
						</p>
						<!-- <a data-aos="fade-left" data-aos-delay="500" href="https://www.youtube.com/watch?v=JhaCnMvPW-k&list=PL51KTBvlQFEGwdrPMKBpBFIPGKTtbcz3M" class="btn btn-yellow" target="_blank">View All Episodes</a> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="agenda" class="section pb-0 d-none">
		<div class="container">
			<div class="row g-3 justify-content-center">
				<div class="col-xl-9 col-lg-10 col-12">
					<div class="section-title text-center mb-3">
						<h2><span>Agenda</span></h2>
					</div>
					<div class="text-content d-none">
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque aliquam libero natus accusamus earum numquam illum quidem eum suscipit facere?</p>
						<a target="_blank" href="<?= base_url('assets/images/cities/') . strtolower($city['name']) . "/agenda.pdf" ?>" class="btn btn-yellow">Download PDF<i class="ms-2 fa-solid fa-arrow-down"></i></a>
					</div>
				</div>
				<div class="col-xl-8 col-lg-10 col-12">
					<div class="swiper agendaSwiper">
						<div class="swiper-wrapper" id="agendaPages">
							<a class="swiper-slide mb-2" href="<?= base_url('assets/images/cities/') . strtolower($city['name']) . "/agenda_page-0001.jpg" ?>">
								<figure>
									<picture>
										<source srcset="<?= base_url('assets/images/cities/') . strtolower($city['name']) . "/agenda_page-0001.jpg" ?>" type="image/jpg">
										<img class="w-100" src="<?= base_url('assets/images/cities/') . strtolower($city['name']) . "/agenda_page-0001.jpg" ?>" alt="" loading="lazy">
									</picture>
									<figcaption></figcaption>
								</figure>
							</a>
						</div>
					</div>
					<script>
						new Swiper(".agendaSwiper", {
							navigation: {
								nextEl: ".agendaSwiper .swiper-button-next",
								prevEl: ".agendaSwiper .swiper-button-prev",
							},
							slidesPerView: $(".agendaSwiper .swiper-slide").length,
							spaceBetween: 20,
							breakpoints: {
								640: {
									slidesPerView: $('.agendaSwiper .swiper-slide').length,
									spaceBetween: 20,
								},
							}
						})
						var agenda = lightGallery(document.getElementById('agendaPages'), {
							plugins: [lgZoom, lgThumbnail],
							speed: 500,
						});
					</script>
				</div>
			</div>
		</div>
	</section>
	<section id="speakers" class="pb-0">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Speakers</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="row align-items-center">
						<div class="col-12">
							<div class="swiper speakerSwiper">
								<div class="swiper-wrapper">
									<?php foreach ($city['speakers'] as $key => $speaker) : ?>
										<div class="swiper-slide p-3" data-aos="fade-left">
											<a href="javascript:void(0)" class="speaker-tile normal">
												<!-- <a href="<?= base_url('speaker/single') ?>" class="speaker-tile normal"> -->
												<div class="speaker-photo rounded-circle mb-3">
													<?php if ($speaker['photo'] == ""): ?>
														<img src="<?= base_url('assets/images/cities/person.png') ?>" class="w-100" alt="<?= $speaker['name'] ?>">
													<?php else: ?>
														<img src="<?= base_url('assets/images/cities/' . strtolower($city['name']) . '/speakers/' . $speaker['photo']) ?>" class="w-100" alt="<?= $speaker['name'] ?>">
													<?php endif ?>
												</div>
												<div class="desc text-center">
													<h5><?= $speaker['name'] ?></h5>
													<p><?= $speaker['description'] ?></p>
												</div>
											</a>
										</div>
									<?php endforeach ?>
								</div>
								<div class="swiper-button-next swiper-button-red"></div>
								<div class="swiper-button-prev swiper-button-red"></div>
							</div>
							<script>
								new Swiper(".speakerSwiper", {
									navigation: {
										nextEl: ".speakerSwiper .swiper-button-next",
										prevEl: ".speakerSwiper .swiper-button-prev",
									},
									slidesPerView: 1,
									grid: {
										rows: 1,
										fill: 'row'
									},
									breakpoints: {
										640: {
											slidesPerView: 2,
											spaceBetween: 20,
										},
										1024: {
											slidesPerView: 3,
											spaceBetween: 50,
										},
										1400: {
											slidesPerView: 4,
											spaceBetween: 20,
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
	<section id="gallery" class="">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Key Moments</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiper gallerySwiper">
						<div class="gallery-masonry swiper-wrapper">
							<?php for ($i = 1; $i <= 5; $i++) : ?>
								<div class="swiper-slide tile gallery-tile mb-2" data-aos="fade-left" data-aos-delay="<?= $i * 10 ?>">
									<figure>
										<picture>
											<!-- <source srcset="https://placehold.co/250x167/webp" type="image/webp"> -->
											<source srcset="<?= base_url('assets/images/cities/' . strtolower($city['name']) . '/gallery/thumbs/'  . $i . '.jpg') ?>" type="image/jpg">
											<img class="w-100" src="<?= base_url('assets/images/cities/' . strtolower($city['name']) . '/gallery/thumbs/'  . $i . '.jpg') ?>" alt="" loading="lazy">
										</picture>
										<figcaption></figcaption>
									</figure>
								</div>
							<?php endfor ?>
						</div>
					</div>
					<script>
						new Swiper(".gallerySwiper", {
							slidesPerView: 2,
							spaceBetween: 20,
							grid: {
								rows: 1,
								fill: "row"
							},
							breakpoints: {
								640: {
									slidesPerView: 3,
									spaceBetween: 20,
									grid: {
										rows: 3,
										fill: "row"
									},
								},
								1024: {
									slidesPerView: 4,
									spaceBetween: 50,
									grid: {
										rows: 3,
										fill: "row"
									},
								},
								1400: {
									slidesPerView: 5,
									spaceBetween: 20,
									grid: {
										rows: 1,
										fill: "column"
									},
								},
							},
						})
						var gallery = lightGallery(document.getElementById('galleryMasonry'), {
							plugins: [lgZoom, lgThumbnail],
							speed: 500,
						});
					</script>
				</div>
				<div class="col-12">
					<a href="<?= base_url('city/' . strtolower($city['name'])  . '/gallery') ?>" class="btn btn-red">View More</a>
				</div>
			</div>
		</div>
	</section>
	<div class="footer-lineart" style="background-image: url('<?= base_url('assets/images/icons/city/') ?><?= strtolower($city['name']) ?>-lineart-color.png')">
	</div>
</main>

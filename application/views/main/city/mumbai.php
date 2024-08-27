<main>
	<section class="section pb-md-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('all-cities') ?>">All Cities</a></li>
							<li class="breadcrumb-item active" aria-current="page">Mumbai</li>
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
								<h1>Mumbai Springboard</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section pb-0" id="about">
		<div class="container">
			<div class="text-content text-lg mb-3 mb-md-5">
				<p data-aos="fade-up">
					MSMEs in India are vital for economic growth, contributing significantly to GDP, employment & exports. They drive innovation, support large industries through supply chain integration & promote regional economic development.
				</p>
				<p data-aos="fade-up" data-aos-delay="100">
					We plan to host our inaugural Springboard in Mumbai with insightful discussions focusing on the broader topics affecting MSMEs in India.
				</p>
				<p data-aos="fade-up" data-aos-delay="200">
					Aligning with our theme <strong class="text-red">"Powering Entrepreneurs for the Global Stage."</strong>, these discussions will encompass topics such as policy support, streamlined regulations, digitization & impact of the budget, providing a comprehensive overview of macro-level challenges & opportunities for MSMEs to compete on a global scale.
				</p>
			</div>
		</div>
	</section>

	<section class="section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-5 col-lg-6 col-md-6 col-12">
					<div class="media-content" data-aos="fade-right">
						<iframe class="w-100" src="https://www.youtube.com/embed/gF5_3m-rS2A?si=7__x3paYx0udxCkk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-xl-7 col-lg-6 col-12">
					<div class="section-title" data-aos="fade-left">
						<h2><span>Galvanizing India’s MSMEs to Seize Global Opportunities</span></h2>
					</div>
					<div class="desc">
						<p data-aos="fade-left" data-aos-delay="400">
							Set against the vibrant backdrop of Mumbai, MSMEs play a crucial role in driving innovation, employment and exports, making them the lifeblood of the nation's growth.
						</p>

						<p data-aos="fade-left" data-aos-delay="400">
							Join us at #LOTSpringboard Mumbai as we delve into the challenges and opportunities shaping the future of MSMEs in India. Explore how policy support, streamlined regulations, and digitization are empowering entrepreneurs to make their mark on the global stage.
						</p>
						<a data-aos="fade-left" data-aos-delay="500" href="https://www.youtube.com/playlist?list=PL51KTBvlQFEHy5ylSshdFAB9OtDCuhirQ" class="btn btn-yellow" target="_blank">View All Episodes</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="agenda" class="section pb-0">
		<div class="container">
			<div class="row g-3 justify-content-center">
				<div class="col-xl-4 col-lg-6 col-12">
					<div class="section-title mb-3">
						<h2><span>Agenda</span></h2>
					</div>
					<div class="text-content">
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque aliquam libero natus accusamus earum numquam illum quidem eum suscipit facere?</p>
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque aliquam libero natus accusamus earum numquam illum quidem eum suscipit facere?</p>
						<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque aliquam libero natus accusamus earum numquam illum quidem eum suscipit facere?</p>
						<a href="#" class="btn btn-yellow">Download PDF<i class="ms-2 fa-solid fa-arrow-down"></i></a>
					</div>
				</div>
				<div class="col-xl-8 col-lg-6 col-md-11 col-12">
					<div class="swiper agendaSwiper">
						<div class="swiper-wrapper" id="agendaPages">
							<a class="swiper-slide mb-2" href="https://placehold.co/595x842/jpg">
								<figure>
									<picture>
										<source srcset="https://placehold.co/595x842/webp" type="image/webp">
										<source srcset="https://placehold.co/595x842/jpg" type="image/jpg">
										<img class="w-100" src="https://placehold.co/595x842/jpg" alt="" loading="lazy">
									</picture>
									<figcaption></figcaption>
								</figure>
							</a>
							<a class="swiper-slide mb-2" href="https://placehold.co/595x842/jpg">
								<figure>
									<picture>
										<source srcset="https://placehold.co/595x842/webp" type="image/webp">
										<source srcset="https://placehold.co/595x842/jpg" type="image/jpg">
										<img class="w-100" src="https://placehold.co/595x842/jpg" alt="" loading="lazy">
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
							slidesPerView: 1,
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
	<section id="speakers" class="">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Speakers</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="row align-items-center">
						<div class="col-xl-3 col-lg-6 col-12">
						<div class="swiper guestSwiper">
								<div class="swiper-wrapper">
									<?php foreach ($city['guests'] as $key => $speaker) : ?>
										<div class="swiper-slide p-3" data-aos="fade-left">
											<a href="javascript:void(0)" class="speaker-tile normal">
												<div class="">
													<h4 class="text-red text-center">Chief Guest</h4>
												</div>
												<!-- <a href="<?= base_url('speaker/single') ?>" class="speaker-tile normal"> -->
												<div class="speaker-photo rounded-circle mb-3">
													<img src="<?= base_url('assets/images/cities/mumbai/speakers/' . $speaker['photo']) ?>" class="w-100" alt="<?= $speaker['name'] ?>">
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
								new Swiper(".guestSwiper", {
									navigation: {
										nextEl: ".guestSwiper .swiper-button-next",
										prevEl: ".guestSwiper .swiper-button-prev",
									},
									slidesPerView: 1,
									
								})
							</script>
						</div>
						<div class="col-xl-9 col-lg-6 col-12">
							<div class="swiper speakerSwiper">
								<div class="swiper-wrapper">
									<?php foreach ($city['speakers'] as $key => $speaker) : ?>
										<div class="swiper-slide p-3" data-aos="fade-left">
											<a href="javascript:void(0)" class="speaker-tile normal">
												<!-- <a href="<?= base_url('speaker/single') ?>" class="speaker-tile normal"> -->
												<div class="speaker-photo rounded-circle mb-3">
													<img src="<?= base_url('assets/images/cities/mumbai/speakers/' . $speaker['photo']) ?>" class="w-100" alt="<?= $speaker['name'] ?>">
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
	<section id="gallery" class="section d-none">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Key Moments</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiper gallerySwiper">
						<div class="swiper-wrapper gallery-masonry" id="galleryMasonry">
							<?php for ($i = 0; $i < 20; $i++) : ?>
								<a class="swiper-slide tile mb-2" data-aos="fade-left" data-aos-delay="<?= $i * 10 ?>" href="https://placehold.co/1500x1000/jpg">
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
						new Swiper(".gallerySwiper", {
							slidesPerView: 5,
							spaceBetween: 20,
							grid: {
								rows: 3,
								fill: "row"
							}
						})
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

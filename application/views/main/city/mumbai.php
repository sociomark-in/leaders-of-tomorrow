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
						<h2><span>Leaders of Tomorrow Season 12</span></h2>
					</div>
					<div class="desc">
						<p data-aos="fade-left" data-aos-delay="400">
							In today's rapidly evolving entrepreneurial landscape, MSMEs are increasingly adopting a global mindset. A wave of ambition is rising among MSMEs across India, signalling that they are ready to broaden their horizons, think big and establish a global presence. In this context, we introduce the theme for season 12 - “Powering Entrepreneurs for the Global Stage.” Airing daily from Monday to Friday on ET Now at 7.30 pm
						</p>
						<a data-aos="fade-left" data-aos-delay="500" href="https://www.youtube.com/playlist?list=PL51KTBvlQFEHy5ylSshdFAB9OtDCuhirQ" class="btn btn-yellow" target="_blank">View All Episodes</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section p-0" id="about">
		<div class="container">
			<div class="text-content text-lg mb-3 mb-md-5">
				<p data-aos="fade-up">
					MSMEs in India are vital for economic growth, contributing significantly to GDP, employment & exports. They drive innovation, support large industries through supply chain integration & promote regional economic development. 
				</p>
				<p data-aos="fade-up" data-aos-delay="100">
					We plan to host our inaugural Springboard in Mumbai with insightful discussions focusing on the broader topics affecting MSMEs in India. 
				</p>
				<p data-aos="fade-up" data-aos-delay="200">
					Aligning with our theme “Powering Entrepreneurs for the Global Stage”, these discussions will encompass topics such as policy support, streamlined regulations, digitization & impact of the budget, providing a comprehensive overview of macro-level challenges & opportunities for MSMEs to compete on a global scale.
				</p>
			</div>
		</div>
	</section>
	<section id="agenda" class="section">
		<div class="container">
			<div class="row g-3 justify-content-center">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Agenda</span></h2>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-12">
					<div class="text-content">
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
	<section id="speakers">
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
							<?php for ($i = 0; $i < 10; $i++) : ?>
								<div class="swiper-slide p-3" data-aos="fade-left">
									<a href="<?= base_url('speaker/single') ?>" class="speaker-tile normal">
										<div class="photo rounded-circle mb-3">
											<img src="<?= base_url('assets/images/cities/') ?>person.png" class="w-100" alt="">
										</div>
										<div class="desc text-center">
											<h5>Lorem ipsum dolor sit.</h5>
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, nostrum.</p>
										</div>
									</a>
								</div>
							<?php endfor ?>
						</div>
					</div>
					<script>
						new Swiper(".speakerSwiper", {
							slidesPerView: 1,
							grid: {
								rows: 1,
								fill: 'row'
							},
							breakpoints: {
								640: {
									slidesPerView: 2,
									spaceBetween: 20,
									grid: {
										rows: 2,
									},
								},
								1024: {
									slidesPerView: 3,
									spaceBetween: 50,
									grid: {
										rows: 2,
									},
								},
								1400: {
									slidesPerView: 5,
									spaceBetween: 30,
									grid: {
										rows: 2,
									},
								},
							},
						})
					</script>
				</div>
			</div>
		</div>
	</section>
	<section id="gallery" class="section">
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
								<a class="swiper-slide tile mb-2" data-aos="fade-left" data-aos-delay="<?= $i*10 ?>" href="https://placehold.co/1500x1000/jpg">
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
	<div class="footer-lineart mumbai repeat-x">

	</div>
</main>

<main class="awards-wrapper">
	<div class="hanging-ribbon d-none">
		<div class="content">
			<p>Season</p>
			<h3>12</h3>
		</div>
	</div>
	<section class="section d-none">
		<div class="hero-backdrop-wrapper bg-black w-fullscreen position-relative">
			<div class="bg-media">
				<!-- <img class="w-100" src="https://placehold.co/1920x900" alt=""> -->
			</div>
			<div class="hero-content position-absolute">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-5">
							<div class="hero-main-wrapper">
								<div class="main-image mb-3">
									<img class="w-100" src="<?= base_url('assets/images/awards-ilu-white.png') ?>" alt="">
								</div>
								<div class="text-content text-center">
									<div class="row justify-content-center">
										<div class="col-auto">
											<a href="<?= base_url('dashboard') ?>" class="btn btn-lg btn-yellow" target="_blank">Nominate Now</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section pb-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Leaders of Tomorrow Awards</li>
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
								<h1>Awards</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section pb-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-10 col-12">
					<div class="media-content springboard-banner">
						<div class="wrap">
							<a href="<?= base_url('dashboard') ?>">
								<picture>
									<source srcset="<?= base_url('assets/images/banners/awards_banner_h.jpg') ?>" type="image/jpg" media="(min-width: 768px)">
									<source srcset="<?= base_url('assets/images/banners/awards_banner_v.jpg') ?>" type="image/jpg" media="(max-width: 768px)">
									<img class="w-100" src="<?= base_url('assets/images/banners/awards_banner_v.jpg') ?>" alt="">
								</picture>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pb-0" id="about">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-5 col-lg-6 col-md-6 col-12">
					<div class="media-content" data-aos="fade-right">
						<lite-youtube videoid="iFAuxpi5sHQ">
							<a class="lite-youtube-fallback w-100" href="https://www.youtube.com/watch?v=iFAuxpi5sHQ">Leaders of Tomorrow Awards 2025</a>
						</lite-youtube>
					</div>
				</div>
				<div class="col-xl-7 col-lg-6 col-12">
					<div class="section-title" data-aos="fade-left">
						<h2><span>Leaders of Tomorrow Awards</span></h2>
					</div>
					<div class="desc">
						<p data-aos="fade-left">
							ET Now Leaders of Tomorrow is the longest-running television show celebrating entrepreneurship in India. Leaders of Tomorrow has highlighted inspiring stories from visionaries since 2010. Over 12 successful, illustrious seasons, Leaders of Tomorrow has leveraged its massive on-air visibility and popularity to empower, enable and energize India’s MSME Sector. As an extension to our daily show, we also host 15 city-specific mini-conclaves called "Springboards," which highlight the unique opportunities and potential of each city within India. Towards the end of each season, we host the annual Leaders of Tomorrow Awards to honour the most promising MSMEs across India.
						</p>
						<!-- <a data-aos="fade-left" data-aos-delay="500" href="" class="btn btn-yellow" target="_blank">View All Episodes</a> -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pb-0">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12">
					<div class="glass-card">
						<div class="">
							<div class="desc text-lg">
								<p data-aos="fade-left">
									Leaders of Tomorrow Season 12 Awards will continue to spotlight outstanding MSMEs, carry forward its rich legacy. This year, the awards are aligned with our vision to propel India’s global aspirations, embracing the theme: <strong class="text-red">Powering Entrepreneurs for the Global Stage</strong>.
									The Leaders of Tomorrow Season 12 Awards is scheduled to take place in February or March 2025 as a half-day ceremony in either Mumbai or Delhi, attended by over 200 audience members largely comprising of CXOs from large and mid-enterprises.
								</p>
								<p data-aos="fade-left" data-aos-delay="400">
									In the lead-up to the event, we will reach out to the MSME community to drive registrations through a Call for Entries (CFE) campaign, leveraging promotional activities and agency outreach over a month. Following this, entries will undergo a rigorous review process, in collaboration with our knowledge partner, EY, to ensure eligibility criteria are met.
									Eligible submissions will then be evaluated by a screening jury, with shortlisted candidates identified based on jury scores and financial analysis. These shortlisted entries will be presented to a Grand Jury, comprising 7-10 distinguished industry leaders from various sectors. The Grand Jury, convening for a day in either Delhi or Mumbai, will finalize the winners through detailed deliberation on the same day.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section" id="categories">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Award Categories</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="row g-2 justify-content-center">
						<?php foreach ($categories['msme'] as $key => $category): ?>
							<div class="col-xxl-4 col-lg-6">
								<a class="card glw-card h-100" href="<?= base_url('awards/category/' . $category['code']) ?>">
									<!-- <a class="card glw-card h-100" href="#"> -->
									<div class="card-body">
										<div class="row h-100 align-items-center">
											<div class="col-auto">
												<div class="glw-image">
													<div class="glw-icon p-2 pb-3">
														<img src="<?= base_url('assets/images/icons/categories/' . $category['code'] . '.png') ?>" class="w-100" alt="">
														<!-- <img src="<?= base_url('assets/images/icons/trophy_color.png') ?>" class="w-100" alt=""> -->
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
	<section class="section d-none" id="phases">
		<div class="container">
			<div class="row g-3 g-md-4">
				<div class="col-12">
					<div class="section-title text-center">
						<h2><span>Programme Phases</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="staged_process__wrapper">
						<div class="row g-3">
							<div class="col-xxl col-xl-3 col-lg-6 col-12">
								<div class="stage__tile active">
									<div class="row">
										<div class="col-12">
											<div class="stage__title">
												<h5>Phase 1</h5>
											</div>
										</div>
										<div class="col-12">
											<div class="stage__details card">
												<div class="card-body">
													<div class="stage__content">
														<div class="icon mb-3">
															<img src="<?= base_url('assets/images/icons/profiles.png') ?>" height="40" alt="">
														</div>
														<div class="content">
															<h5>Call for Entries</h5>
															<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, dolorum.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xxl col-xl-3 col-lg-6 col-12">
								<div class="stage__tile">
									<div class="row">
										<div class="col-12">
											<div class="stage__title">
												<h5>Phase 2</h5>
											</div>
										</div>
										<div class="col-12">
											<div class="stage__details card">
												<div class="card-body">
													<div class="stage__content">
														<div class="icon mb-3">
															<img src="<?= base_url('assets/images/icons/shortlist.png') ?>" height="40" alt="">
														</div>
														<div class="content">
															<h5>Shortlisting & Documentation</h5>
															<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, dolorum.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xxl col-xl-3 col-lg-6 col-12">
								<div class="stage__tile">
									<div class="row">
										<div class="col-12">
											<div class="stage__title">
												<h5>Phase 3</h5>
											</div>
										</div>
										<div class="col-12">
											<div class="stage__details card">
												<div class="card-body">
													<div class="stage__content">
														<div class="icon mb-3">
															<img src="<?= base_url('assets/images/icons/podium.png') ?>" height="40" alt="">
														</div>
														<div class="content">
															<h5>Jury Round for the Selection of Finalists</h5>
															<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, dolorum.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xxl col-xl-3 col-lg-6 col-12">
								<div class="stage__tile">
									<div class="row">
										<div class="col-12">
											<div class="stage__title">
												<h5>Phase 4</h5>
											</div>
										</div>
										<div class="col-12">
											<div class="stage__details card">
												<div class="card-body">
													<div class="stage__content">
														<div class="icon mb-3">
															<img src="<?= base_url('assets/images/icons/trophy.png') ?>" height="40" alt="">
														</div>
														<div class="content">
															<h5>Award Ceremony</h5>
															<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, dolorum.</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="live" class="pb-0 d-none">
		<div class="container">
			<div class="row justify-content-center g-4">
				<div class="col-12">
					<div class="media-content">
						<iframe class="w-100" src="https://www.youtube.com/embed/gF5_3m-rS2A?si=7__x3paYx0udxCkk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="speakers" class="pb-0 d-none">
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
											<img src="<?= base_url('assets/images/cities/person.png') ?>" class="w-100" alt="">
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
	<section id="grand-juries" class="pb-0 d-none">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>List of Grand Juries</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiper jurySwiper">
						<div class="swiper-wrapper">
							<?php for ($i = 0; $i < 12; $i++) : ?>
								<div class="swiper-slide p-3">
									<div class="speaker-tile normal">
										<div class="photo mb-3">
											<img src="<?= base_url('assets/images/cities/person.png') ?>" class="w-100" alt="">
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
	</section>
	<section id="pre-juries" class=" d-none">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>List of Pre-juries</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiper preJurySwiper">
						<div class="swiper-wrapper">
							<?php for ($i = 0; $i < 12; $i++) : ?>
								<div class="swiper-slide p-3">
									<div class="speaker-tile normal">
										<div class="photo mb-3">
											<img src="<?= base_url('assets/images/cities/person.png') ?>" class="w-100" alt="">
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
						new Swiper(".preJurySwiper", {
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
</main>

<?php
$c_n = "all-cities";
foreach ($springboards as $key => $city) {
	if (date_format(date_create($city['date']), 'Y-m-d') > date('Y-m-d')) {
		$c_n = strtolower($city['name']);
		break;
	}
}
?>

<main>
	<section class="p-0 d-none">
		<div class="pseudo-kv">
			<div class="media-content">
				<video poster="<?= base_url('assets/video/') ?>banner-kv-poster.png" muted autoplay loop>
					<source src="<?= base_url('assets/video/') ?>banner-kv.mp4">
				</video>
			</div>
		</div>
	</section>
	<section class="pt-0">
		<div class="swiper heroSwiper">
			<div class="swiper-wrapper">
				<div class="swiper-slide">
					<div class="container">
						<div class="row justify-content-between align-items-center">
							<div class="col-xl-5 col-lg-6 col-12">
								<div class="" data-aos="fade-right">
									<img class="w-100" src="<?= base_url('assets/images/') ?>ilu.png" alt="">
								</div>
								<!--<img class="w-100" src="<?= base_url('assets/images/') ?>ilu2.gif" alt="">-->
							</div>
							<div class="col-xl-7 col-lg-6 col-12">
								<div class="media-content">
									<div class="ratio ratio-1x1">
										<!-- <video poster="<?= base_url('assets/video/') ?>banner-kv-poster.png" muted autoplay loop>
								<source src="<?= base_url('assets/video/') ?>banner-kv.mp4">
							</video> -->
										<img src="<?= base_url('assets/images/') ?>kv-buildings.png" alt="" class="spin">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if ((date('Y-m-d H:i:s') > '2024-10-24 09:23:00') && date('Y-m-d H:i:s') < '2024-11-01 12:00:00') : ?>
					<div class="swiper-slide">
						<div class="diwali-section bg-red">
							<div class="">
								<div class="row justify-content-center">
									<div class="col-12">
										<picture>
											<source srcset="<?= base_url('assets/images/banners/home_01-h.jpg') ?>" type="image/jpg" media="(min-width: 768px)">
											<source srcset="<?= base_url('assets/images/banners/home_01-v.jpg') ?>" type="image/jpg" media="(max-width: 768px)">
											<img class="w-100" src="<?= base_url('assets/images/banners/home_01-v.jpg') ?>" alt="">
										</picture>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endif ?>
			</div>
			<div class="swiper-button-next swiper-button-yellow"></div>
			<div class="swiper-button-prev swiper-button-yellow"></div>
		</div>
		<script>
			new Swiper(".heroSwiper", {
				slidesPerView: 1,
				spaceBetween: 30,
				loop: true,
				autoplay: {
					delay: 5000,
					disableOnInteraction: false,
				},
				pagination: {
					el: ".swiper-pagination",
					clickable: true,
				},
				navigation: {
					nextEl: ".swiper-button-next",
					prevEl: ".swiper-button-prev",
				},
			})
		</script>
		</div>
	</section>

	<section class="" id="about">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-5 col-lg-6 col-md-6 col-12">
					<div class="media-content" data-aos="fade-right">
						<lite-youtube videoid="vXoSrO_5u4Q">
							<a class="lite-youtube-fallback w-100" href="https://www.youtube.com/watch?v=vXoSrO_5u4Q">VIDEO TITLE/DESCRIPTION</a>
						</lite-youtube>
					</div>
				</div>
				<div class="col-xl-7 col-lg-6 col-12">
					<div class="section-title" data-aos="fade-left">
						<h2><span>Leaders of Tomorrow Season 12</span></h2>
					</div>
					<div class="desc">
						<p data-aos="fade-left" data-aos-delay="400">
							In today’s rapidly evolving entrepreneurial landscape, MSMEs are increasingly adopting a global mindset. A wave of ambition is rising among MSMEs across India, signalling that they are ready to broaden their horizons, think big and establish a global presence. In this context, we introduce the theme for Season&nbsp;12 - <strong class="text-red">Powering Entrepreneurs for the Global Stage.</strong> Airing daily from Monday to Friday on ET Now at 7.30 pm
						</p>
						<a data-aos="fade-left" data-aos-delay="500" href="https://www.youtube.com/playlist?list=PL51KTBvlQFEHy5ylSshdFAB9OtDCuhirQ" class="btn btn-yellow" target="_blank">View All Episodes</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="live" class="d-none">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="media-content">
						<iframe class="w-100" src="https://www.youtube.com/embed/gF5_3m-rS2A?si=7__x3paYx0udxCkk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="categories" class="d-none">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>All Categories</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiper categorySwiper">
						<div class="swiper-wrapper">
							<?php for ($i = 0; $i < 14; $i++) : ?>
								<div class="swiper-slide p-3">
									<a href="javascript:void(0)" class="speaker-tile featured rounded-circle image-bg">
										<div class="desc text-center">
											<h5>Lorem ipsum dolor sit.</h5>
										</div>
									</a>
								</div>
							<?php endfor ?>
						</div>
					</div>
					<script>
						new Swiper(".categorySwiper", {
							slidesPerView: 2,
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

	<section id="springboards" class="section pb-0">
		<div class="container">
			<div class="row g-3 align-items-center flex-row-reverse mb-3 mb-md-5">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Springboards</span></h2>
					</div>
					<div class="text-content">
						<p data-aos="fade-up">
							Leaders of Tomorrow Springboards is a dynamic series of ground events spanning 15 cities, designed to catapult your business to new heights. This innovative platform brings together renowned experts and business owners, fostering a collaborative environment where ideas are exchanged, challenges are addressed, and opportunities are seized. By converging with like-minded individuals and industry thought leaders, you'll gain invaluable insights, practical advice, and actionable strategies to propel your growth trajectory into the future. Join us at LOT Springboard and unlock the potential for your business to thrive in an ever-evolving landscape.
						</p>
						<a href="<?= base_url('city/' . $c_n) ?>" data-aos="fade-right" data-aos-delay="100" class="btn btn-yellow btn-hover-red">Upcoming Springboard</a>
						<a href="<?= base_url('all-cities') ?>" data-aos="fade-right" class="btn btn-red">All Springboards</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="awards" class="section pb-0">
		<div class="container">
			<div class="glass-card">
				<div class="card-body">
					<div class="row justify-content-center g-4">
						<div class="col-12">
							<div class="section-title">
								<h2><span>Awards</span></h2>
							</div>
							<div class="mb-3">
								<p data-aos="fade-up">
									The Annual Leaders of Tomorrow Awards will focus on uncovering & recognising the most promising MSMEs from across India, carrying forward its long-standing heritage. This prestigious event remains a cornerstone of our initiative, celebrating outstanding achievements in the MSME sector and shining a spotlight on emerging leaders nationwide. In the lead-up to the awards, we will actively engage with the MSME community to garner registrations. A distinguished Grand Jury will then evaluate the entries, culminating in the selection of winners across a diverse range of categories.
								</p>
							</div>
							<div class="">
								<a class="btn btn-icon-prepend btn-red text-uppercase" href="<?= base_url('awards') ?>">
									<img src="<?= base_url('assets/images/icons/') ?>award.png" class="icon" alt="Award Icon">
									Nominate Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="articles" class="section pb-3">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>In The News</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiperWrap px-3 px-md-5 position-relative">
						<div class="swiper articleSwiper">
							<div class="swiper-wrapper">
								<?php foreach ($articles as $key => $article) : ?>
									<div class="swiper-slide p-3">
										<a href="<?= $article['redirect'] ?>" target="_blank" class="article-tile">
											<div class="photo">
												<img class="w-100" src="<?= $article['thumb'] ?>" alt="">
											</div>
											<div class="desc">
												<h5><?= $article['title'] ?></h5>
											</div>
										</a>
									</div>
								<?php endforeach ?>
							</div>
						</div>
						<div class="swiper-button-next swiper-button-red"></div>
						<div class="swiper-button-prev swiper-button-red"></div>
					</div>
					<script>
						new Swiper(".articleSwiper", {
							slidesPerView: 1,
							navigation: {
								nextEl: ".swiperWrap .swiper-button-next",
								prevEl: ".swiperWrap .swiper-button-prev",
							},
							breakpoints: {
								640: {
									slidesPerView: 2,
									spaceBetween: 20,
								},
								1024: {
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
</main>

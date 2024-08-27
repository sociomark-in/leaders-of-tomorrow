<main>
	<section class="p-0">
		<div class="pseudo-kv">
			<div class="media-content">
				<video poster="<?= base_url('assets/video/') ?>banner-kv-poster.png" muted autoplay loop>
					<source src="<?= base_url('assets/video/') ?>banner-kv.mp4">
				</video>
			</div>
		</div>
	</section>

	<section class="" id="about">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-xl-5 col-lg-6 col-md-6 col-12">
					<div class="media-content" data-aos="fade-right">
						<iframe class="w-100" src="https://www.youtube.com/embed/vXoSrO_5u4Q?si=FHjpRisiSidQNmqV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-xl-7 col-lg-6 col-12">
					<div class="section-title" data-aos="fade-left">
						<h2><span>Leaders of Tomorrow Season 12</span></h2>
					</div>
					<div class="desc">
						<p data-aos="fade-left" data-aos-delay="400">
							In today’s rapidly evolving entrepreneurial landscape, MSMEs are increasingly adopting a global mindset. A wave of ambition is rising among MSMEs across India, signalling that they are ready to broaden their horizons, think big and establish a global presence. In this context, we introduce the theme for season 12 - “Powering Entrepreneurs for the Global Stage.” Airing daily from Monday to Friday on ET Now at 7.30 pm
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

	<section id="springboards" class="pt-0">
		<div class="container">
			<div class="row g-3 align-items-center flex-row-reverse mb-3 mb-md-5">
				<div class="col-xl-5 offset-xl-2 col-lg-6 col-md-6 col-12">
					<div class="media-content" data-aos="fade-left">
						<img src="<?= base_url('assets/images/cities/') ?>kv.jpg" alt="" class="w-100">
					</div>
				</div>
				<div class="col-xl-5 col-lg-6 col-12">
					<div class="section-title">
						<h2><span>Springboards</span></h2>
					</div>
					<div class="text-content" data-aos="fade-right">
						<p>
							In the dynamic landscape of business, seizing growth opportunities isn't just about being proactive-it's about being prepared. Season 12 of India's longest running show for SMEs and MSMEs is here to empower entrepreneurs to achieve their business goals and seize every opportunity not just locally but on the global stage.
						</p>
						<a href="<?= base_url('all-cities') ?>" class="btn btn-red">All Springboards</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="awards" class="d-none">
		<div class="container">
			<div class="row justify-content-center g-4">
				<div class="col-xl-8 col-lg-10 col-12">
					<div class="section-title text-center">
						<h2><span>Season 12 Awards</span></h2>
					</div>
					<div class="">
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt inventore voluptas quaerat eum modi, corporis iure distinctio saepe ratione possimus nisi aliquam iusto explicabo libero in tenetur debitis. Velit, quibusdam.
						</p>
					</div>
				</div>
				<div class="col-12">
					<div class="media-content">
						<iframe class="w-100" src="https://www.youtube.com/embed/gF5_3m-rS2A?si=7__x3paYx0udxCkk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="articles" class="pt-0">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Articles</span></h2>
					</div>
				</div>
				<div class="col-12">
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
					<script>
						new Swiper(".articleSwiper", {
							slidesPerView: 1,
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

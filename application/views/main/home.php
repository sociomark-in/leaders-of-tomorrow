<main>
	<section class="p-0">
		<div class="pseudo-kv">
			<div class="media-content">
				<video src="https://commondatastorage.googleapis.com/gtv-videos-bucket/sample/ForBiggerJoyrides.mp4" muted autoplay loop></video>
			</div>
		</div>
	</section>
	<section class="" id="about">
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
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nam rem eum necessitatibus et maiores tempora nisi vel officia corporis porro quibusdam dolore beatae autem ea quae asperiores in incidunt, veritatis consequuntur, quia tenetur laudantium quam ipsa. Consequuntur eaque quos iusto sit, sunt ullam tempore ratione provident? Magni, iusto mollitia.
						</p>
						<a data-aos="fade-left" data-aos-delay="500" href="" class="btn btn-yellow" target="_blank">View All Episodes</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="">
		<div class="container">
			<div class="row align-items-center flex-row-reverse">
				<div class="col-xl-5 col-lg-6 col-md-6 col-12">
					<div class="media-content" data-aos="fade-left">
						<img src="https://placehold.co/1500x2000" alt="" class="w-100">
					</div>
				</div>
				<div class="col-xl-7 col-lg-6 col-12">
					<div class="text-content text-lg" data-aos="fade-right">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium labore consequatur recusandae accusamus deleniti perferendis saepe fugit dolorem illum quis consectetur odio officia libero consequuntur, ducimus voluptas voluptates veritatis quam nostrum! Adipisci, animi ipsa? Incidunt distinctio reprehenderit cum magni aspernatur?</p>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium labore consequatur recusandae accusamus deleniti perferendis saepe fugit dolorem illum quis consectetur odio officia libero consequuntur, ducimus voluptas voluptates veritatis quam nostrum! Adipisci, animi ipsa? Incidunt distinctio reprehenderit cum magni aspernatur?</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section id="live">
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
	<section id="categories">
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
							<?php for ($i = 0; $i < 10; $i++) : ?>
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
								<div class="swiper-slide p-3">
									<a href="<?= base_url('speaker/single') ?>" class="speaker-tile">
										<div class="photo mb-3">
											<img src="https://placehold.co/288x360" alt="">
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
	<section id="agenda" class="d-none">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="section-title text-center mb-3 mb-md-5">
						<h2><span>Programme Agenda</span></h2>
					</div>
				</div>
				<div class="col-xl-8 col-lg-10 col-12">
					<div class="swiper agendaSwiper">
						<div class="swiper-wrapper" id="agendaPages">
							<a class="swiper-slide" href="https://placehold.co/2250x4000/jpg">
								<picture>
									<source srcset="https://placehold.co/2250x4000/jpg" type="image/jpg">
									<img src="https://placehold.co/2250x4000/jpg" alt="" class="w-100">
								</picture>
							</a>
							<a class="swiper-slide" href="https://placehold.co/2250x4000/jpg">
								<picture>
									<source srcset="https://placehold.co/2250x4000/jpg" type="image/jpg">
									<img src="https://placehold.co/2250x4000/jpg" alt="" class="w-100">
								</picture>
							</a>
						</div>
						<div class="swiper-button-next"></div>
						<div class="swiper-button-prev"></div>
					</div>
					<script type="text/javascript">
						new Swiper(".agendaSwiper", {
							navigation: {
								nextEl: ".agendaSwiper .swiper-button-next",
								prevEl: ".agendaSwiper .swiper-button-prev",
							},
							slidesPerView: 1,
							breakpoints: {
								1024: {
									slidesPerView: 2,
									spaceBetween: 30,
								}
							}
						});
						lightGallery(document.getElementById('agendaPages'), {
							plugins: [lgZoom, lgThumbnail],
							speed: 500,
						});
					</script>
				</div>
			</div>
		</div>
	</section>
	<section id="awards">
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
						<h2><span>Articles & Publications</span></h2>
					</div>
				</div>
				<div class="col-12">
					<div class="swiper articleSwiper">
						<div class="swiper-wrapper">
							<?php for ($i = 0; $i < 10; $i++) : ?>
								<div class="swiper-slide p-3">
									<a href="<?= base_url('speaker/single') ?>" class="article-tile">
										<div class="photo">
											<img class="w-100" src="https://placehold.co/1279x720" alt="">
										</div>
										<div class="desc">
											<h5>Lorem ipsum dolor sit.</h5>
											<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime, nostrum.</p>
										</div>
									</a>
								</div>
							<?php endfor ?>
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

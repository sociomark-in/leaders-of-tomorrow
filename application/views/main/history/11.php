<main>
	<section class="py-3 py-md-5">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xl-6 col-lg-8 col-md-10 col-12">
					<div class="page-title">
						<div class="row align-items-center justify-content-center">
							<div class="col-auto">
								<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
							</div>
							<div class="col-auto">
								<h1>Season 11</h1>
							</div>
						</div>
					</div>
				</div>
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
						<h2><span>Leaders of Tomorrow Season 11</span></h2>
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
			<div class="row justify-content-center g-4">
				<div class="col-xl-8 col-lg-10 col-12">
					<div class="section-title text-center">
						<h2><span>Season 11 Awards</span></h2>
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
	<section id="speakers" class="pt-0">
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
											<img src="https://placehold.co/288x360" alt="">
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
	<section id="juries" class="p-0">
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
											<img src="https://placehold.co/288x360" alt="">
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
</main>

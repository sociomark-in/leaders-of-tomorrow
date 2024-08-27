<main>
	<section class="p-0 d-none">
		<div class="swiper heroSwiper">
			<div class="swiper-wrapper">
				<?php for ($i=0; $i < count($springboards); $i++) : ?>
					<div class="swiper-slide">
						<div class="hero-slide fullscreen">
							<div class="row p-3 p-md-0">
								<div class="col-xl-5 col-md-6 col-12">
									<div class="media-content d-none d-md-block">
										<div class="wrap">
											<picture>
												<source srcset="https://placehold.co/400x700/webp" type="image/webp">
												<source srcset="https://placehold.co/400x700/jpg" type="image/jpg">
												<img data-aos="zoom-in" class="h-100 animate" src="https://placehold.co/400x700/jpg" alt="" loading="lazy">
											</picture>
										</div>
									</div>
								</div>
								<div class="col-xl-7 col-md-6 col-12">
									<div class="row align-items-end h-100">
										<div class="col-12">
											<div class="section">
												<div class="text-content">
													<div class="mb-3">
														<h3 class="mb-0 animate" data-aos="fade-left" data-aos-delay="100"><?= $springboards[$i]['name'] ?></h3>
													</div>
													<div class="">
														<h2 class="mb-0 animate" data-aos="fade-left" data-aos-delay="200"><strong><?= $springboards[$i]['theme']?></strong></h2>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="animate element d-none d-md-block">
								<img src="https://placehold.co/500x800" class="h-100 animate" data-aos="fade-right" data-aos-delay="400" alt="">
							</div>
						</div>
					</div>
				<?php endfor ?>
			</div>
		</div>
		<script>
			heroSwiper = new Swiper(".heroSwiper", {
				loop: true,
				autoplay: {
					duration: 400,
				}

			})
			heroSwiper.on('slideChangeTransitionEnd', () => {
				var currentSlide = $(".swiper-slide-active");
				$(".swiper-slide .animate").each((index, el) => {
					$(el).addClass('d-none');
				})
				$(".swiper-slide-active .animate").each((index, el) => {
					$(el).removeClass('d-none aos-animate');
					$(el).addClass('d-block');
					timeOutId = setTimeout(() => {
						$(el).addClass('aos-animate');
					}, 400);
				})
			})
		</script>
	</section>

	<section class="py-3 py-md-5">
		<div class="container">
			<div class="row justify-content-center mb-3 mb-md-5">
				<div class="col-xl-6 col-lg-8 col-md-10 col-12">
					<div class="page-title">
						<div class="row align-items-center justify-content-center">
							<div class="col-auto">
								<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
							</div>
							<div class="col-auto">
								<h1>Springboards</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row align-items-center flex-row-reverse mb-3 mb-md-5">
				<div class="col-xl-5 col-lg-6 col-md-6 col-12">
					<div class="media-content" data-aos="fade-left">
						<img src="https://placehold.co/1500x1500" alt="" class="w-100">
					</div>
				</div>
				<div class="col-xl-7 col-lg-6 col-12">
					<div class="text-content text-lg" data-aos="fade-right">
						<p>
							Leaders of Tomorrow will also host 15 on-ground Springboards across various cities in India. These springboards will serve as a launchpad for success, encapsulating the essence of India's growth story by covering opportunities across India. Springboards will also provide a platform for the top MSMEs in each city, playing a crucial role in propelling India’s smaller businesses toward success and empowering the leaders of tomorrow. At each of our Springboard, we will feature some of the most inspiring business leaders from each city, who will share their experiences and insights, motivating the audience, viewers and entrepreneurs with their success stories.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-0">
		<div class="container">
			<div class="row g-3">
				<?php $this->load->view('components/theme/partials/widget/_all_cities');?>
			</div>
		</div>
	</section>
</main>

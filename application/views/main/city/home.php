<main>
	<section class="p-0 d-none">
		<div class="swiper heroSwiper">
			<div class="swiper-wrapper">
				<?php for ($i = 0; $i < count($springboards); $i++) : ?>
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
														<h2 class="mb-0 animate" data-aos="fade-left" data-aos-delay="200"><strong><?= $springboards[$i]['theme'] ?></strong></h2>
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
			<div class="row align-items-center mb-3 mb-md-5">
				<div class="col-12">
					<div class="text-content" data-aos="fade-right">
						<div class="glass-card">
							<div class="">
								<div class="text-lg">
									<p>
										Leaders of Tomorrow Springboards is a dynamic series of ground events spanning 15 cities, designed to catapult your business to new heights. This innovative platform brings together renowned experts and business owners, fostering a collaborative environment where ideas are exchanged, challenges are addressed, and opportunities are seized. By converging with like-minded individuals and industry thought leaders, you'll gain invaluable insights, practical advice, and actionable strategies to propel your growth trajectory into the future. Join us at LOT Springboard and unlock the potential for your business to thrive in an ever-evolving landscape.
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-0">
		<div class="container">
			<div class="row g-3 py-2">
				<?php $this->load->view('components/theme/partials/widget/_all_cities'); ?>
			</div>
		</div>
	</section>
</main>

<main>
	<section class="section pb-md-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<!-- <li class="breadcrumb-item"><a href="<?= base_url('history') ?>">All Seasons</a></li> -->
							<li class="breadcrumb-item active" aria-current="page">Past Seasons</li>
							<li class="breadcrumb-item active" aria-current="page">Season <?= $season ?></li>
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
								<h1>Season <?= $season ?></h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="pb-0">
		<div class="container">
			<div class="row justify-content-center g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>All Springboards</span></h2>
					</div>
				</div>
				<div class="col-12">
					<ul class="nav nav-pills" id="myTab" role="tablist">
						<?php foreach ($hcities as $key => $city) : ?>
							<?php if ($key == 0): ?>
								<li class="nav-item" role="presentation">
									<button class="nav-link active" id="<?= strtolower($city['name']) ?>" data-bs-toggle="tab" data-bs-target="#<?= strtolower($city['name']) ?>-pane" type="button" role="tab" aria-controls="<?= strtolower($city['name']) ?>-pane" aria-selected="true"><?= $city['name'] ?></button>
								</li>
							<?php else: ?>
								<li class="nav-item" role="presentation">
									<button class="nav-link" id="<?= strtolower($city['name']) ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= strtolower($city['name']) ?>-tab-pane" type="button" role="tab" aria-controls="<?= strtolower($city['name']) ?>-tab-pane" aria-selected="false"><?= $city['name'] ?></button>
								</li>
							<?php endif ?>
						<?php endforeach ?>
					</ul>
					<div class="tab-content py-3" id="myTabContent">
						<?php foreach ($hcities as $key => $city) : ?>
							<?php if ($key == 0): ?>
								<div class="tab-pane fade show active" id="<?= strtolower($city['name']) ?>-pane" role="tabpanel" aria-labelledby="<?= strtolower($city['name']) ?>" tabindex="0">
									<div class="row align-items-center">
										<div class="col-xl-5 col-lg-6 col-md-6 col-12">
											<div class="media-content" data-aos="fade-right">
												<lite-youtube videoid="<?= $city['promo'] ?>">
													<a class="lite-youtube-fallback w-100" href="https://www.youtube.com/watch?v=<?= $city['promo'] ?>"><?= $city['name'] ?></a>
												</lite-youtube>
											</div>
										</div>
										<div class="col-xl-7 col-lg-6 col-12">
											<?php if (isset($city['theme'])) : ?>
												<div class="section-title aos-init aos-animate" data-aos="fade-left">
													<h2><span><?= $city['theme'] ?></span></h2>
												</div>
											<?php endif ?>
											<div class="desc">
												<?php if (isset($city['text'])) : ?>
													<p class="wrapped" data-aos="fade-left" data-aos-delay="400"></p>
												<?php endif ?>
												<div class="row">
													<div class="col-md-12">
														<p class="mb-2">Date:</p>
														<h4 class="text-red" data-aos="fade-left" data-aos-delay="400"><?= $city['date'] ?></h4>
													</div>
													<div class="col-md-12">
														<p class="mb-2">Venue:</p>
														<h4 class="text-red" data-aos="fade-left" data-aos-delay="400"><?= $city['venue'] ?></h4>
													</div>
												</div>
												<?php if (isset($city['episodes'])) : ?>
													<a data-aos="fade-left" data-aos-delay="500" href="https://www.youtube.com/playlist?list=<?= $city['episodes'] ?>" class="btn btn-yellow" target="_blank">View All Episodes</a>
												<?php endif ?>
											</div>
										</div>
									</div>
								</div>
							<?php else: ?>
								<div class="tab-pane fade" id="<?= strtolower($city['name']) ?>-tab-pane" role="tabpanel" aria-labelledby="<?= strtolower($city['name']) ?>-tab" tabindex="0">
									<div class="row align-items-center">
										<div class="col-xl-5 col-lg-6 col-md-6 col-12">
											<div class="media-content" data-aos="fade-right">
												<lite-youtube videoid="<?= $city['promo'] ?>">
													<a class="lite-youtube-fallback w-100" href="https://www.youtube.com/watch?v=<?= $city['promo'] ?>">VIDEO TITLE/DESCRIPTION</a>
												</lite-youtube>
											</div>
										</div>
										<div class="col-xl-7 col-lg-6 col-12">
											<?php if (isset($city['theme'])) : ?>
												<div class="section-title aos-init aos-animate" data-aos="fade-left">
													<h2><span><?= $city['theme'] ?></span></h2>
												</div>
											<?php endif ?>
											<div class="desc">
												<?php if (isset($city['text'])) : ?>
													<p class="wrapped" data-aos="fade-left" data-aos-delay="400"></p>
												<?php endif ?>
												<div class="row">
													<div class="col-md-12">
														<p class="mb-2">Date:</p>
														<h4 class="text-red" data-aos="fade-left" data-aos-delay="400"><?= $city['date'] ?></h4>
													</div>
													<div class="col-md-12">
														<p class="mb-2">Venue:</p>
														<h4 class="text-red" data-aos="fade-left" data-aos-delay="400"><?= $city['venue'] ?></h4>
													</div>
												</div>
												<?php if (isset($city['episodes'])) : ?>
													<a data-aos="fade-left" data-aos-delay="500" href="https://www.youtube.com/playlist?list=<?= $city['episodes'] ?>" class="btn btn-yellow" target="_blank">View All Episodes</a>
												<?php endif ?>
											</div>
										</div>
									</div>
								</div>
							<?php endif ?>
						<?php endforeach ?>
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
						<h2><span>Season <?= $season ?> Awards</span></h2>
					</div>
				</div>
				<div class="col-xl-10 col-12">
					<div class="media-content springboard-banner">
						<div class="media-content" data-aos="fade-right">
							<div class="wrap">
							<iframe class="w-100" src="https://www.youtube.com/embed/<?= $awards['live'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="winners" class="pt-0">
		<div class="container">
			<div class="row g-3">
				<div class="col-12">
					<div class="section-title">
						<h2><span>Season <?= $season ?> Winners</span></h2>
					</div>
				</div>
				<div class="col-12">
					<table class="table table-bordered heading-red">
						<thead>
							<tr>
								<!-- <th>Sr. No.</th> -->
								<th class="p-3">Categories</th>
								<th class="p-3">Name of Winners</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($awards['winners'] as $key => $winner) : ?>
								<tr>
									<!-- <td><?= $key + 1 ?></td> -->
									<td class="p-3"><?= $winner['category'] ?></td>
									<td class="p-3"><i class="fa-solid fa-trophy me-3 text-gold"></i><strong><?= $winner['name'] ?></strong></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<section id="speakers" class="d-none pt-0">
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
											<img src="https://placehold.co/288x360" class="w-100" alt="">
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
	<section id="juries" class="d-none p-0">
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
											<img src="https://placehold.co/288x360" class="w-100" alt="">
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
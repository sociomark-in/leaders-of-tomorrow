<main>
	<section class="springboard-register">
		<div class="container">
			<div class="row g-3 justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('all-cities') ?>">All Cities</a></li>
							<li class="breadcrumb-item active" aria-current="page">Mumbai</li>
						</ol>
					</nav>
				</div>
				<div class="col-xl-9 col-lg-8 col-12">
					<div class="wrap banner-image">
						<img src="<?= base_url('assets/images/cities/' . strtolower($city['name']) . '/') ?>banner.jpg" alt="" class="w-100">
					</div>
				</div>
				<div class="col-xl-3 col-lg-4 col-12">
					<div class="card bg-transparent">
						<div class="card-body">
							<div class="mb-3">
								<h2 class="text-red"><?= $city['name'] ?> Springboard</h2>
							</div>
							<div class="mb-3">
								<p>
									<strong>Date:&nbsp;</strong><?= $city['date'] ?>
								</p>
							</div>
							<div class="mb-3">
								<p class="text-uppercase text-lg mb-1">Event Starts In</p>
								<h3 class="m-0"><span id="days"></span>D&nbsp;:&nbsp;<span id="hours"></span>H&nbsp;:&nbsp;<span id="minutes"></span>M&nbsp;:&nbsp;<span id="seconds"></span>S</h3>
							</div>
							<div class="">
								<button class="btn btn-red w-100" data-bs-toggle="modal" data-bs-target="#registerModal">Register Now</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-6 col-lg-8 col-md-10 col-12">
					<div class="section">
						<div class="row mb-3 mb-md-4">
							<div class="col-12">
								<div class="page-title">
									<div class="row align-items-center justify-content-center">
										<div class="col-auto">
											<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
										</div>
										<div class="col-auto">
											<h1>Registration</h1>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						$form['id'] = "registerForm";
						$this->load->view('components/theme/partials/widget/register_atendee', $form);
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-fullscreen-md-down">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="registerModalLabel">Register to attend <?= $city['name'] ?> Springboard</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php
				$form['id'] = "registerFormPopup";
				$this->load->view('components/theme/partials/widget/register_atendee', $form);
				?>
			</div>
		</div>
	</div>
</div>
<script>
	var timer;

	var compareDate = new Date();
	compareDate.setDate(compareDate.getDate() + 7); //just for this demo today + 7 days

	timer = setInterval(function() {
		timeBetweenDates(compareDate);
	}, 1000);

	function timeBetweenDates(toDate) {
		var dateEntered = toDate;
		var now = new Date();
		var difference = dateEntered.getTime() - now.getTime();

		if (difference <= 0) {

			// Timer done
			clearInterval(timer);

		} else {

			var seconds = Math.floor(difference / 1000);
			var minutes = Math.floor(seconds / 60);
			var hours = Math.floor(minutes / 60);
			var days = Math.floor(hours / 24);

			hours %= 24;
			minutes %= 60;
			seconds %= 60;

			$("#days").text(days);
			$("#hours").text(hours);
			$("#minutes").text(minutes);
			$("#seconds").text(seconds);
		}
	}
</script>

<?php
$dateObj = date_create_from_format("Y-m-d H:i:s", $city['date']);
$dateTime = date_format($dateObj, 'F j, Y h:i A');
$venue = $city['venue'];
?>

<main>
	<section class="springboard-register pb-0">
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
				<div class="col-12 pt-0 section">
					<div class="row g-3 mb-3 mb-md-4 justify-content-center">
						<div class="col-xl-6 col-lg-8 col-md-10 col-12">
							<div class="page-title">
								<div class="row align-items-center justify-content-center">
									<div class="col-auto">
										<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
									</div>
									<div class="col-auto">
										<h1>Register Now</h1>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row g-3 justify-content-center align-items-end">
				<div class="col-xl-8 col-lg-6 col-12">
					<div class="section-title mb-3 mb-md-5" data-aos="fade-right">
						<h2><span> <?= $city['theme'] ?></span></h2>
					</div>
					<div class="text-content">
						<div class="card event-ticket">
							<div class="card-body">
								<div class="row g-3">
									<div class="col-lg-6 col-12">
										<p class="mb-0">Date & Time</p>
										<h3 class="text-red"><?php print_r($dateTime) ?></h3>
									</div>
									<div class="col-lg-6 col-12">
										<p class="mb-0">Venue</p>
										<h3 class="text-red"><?php print_r($venue) ?></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-12">
					<div class="card bg-transparent" data-aos="fade-left">
						<div class="card-body">
							<div class="mb-3">
								<h2 class="text-red"><?= $city['name'] ?> Springboard</span></h2>
							</div>
							<div class="mb-3">
								<p class="text-uppercase text-lg mb-1">Event Starts In</p>
								<h3 class="m-0"><span id="days">00</span>D&nbsp;:&nbsp;<span id="hours">00</span>H&nbsp;:&nbsp;<span id="minutes">00</span>M&nbsp;:&nbsp;<span id="seconds">00</span>S</h3>
							</div>
							<div class="">
								<!-- <button class="btn btn-red w-100" data-bs-toggle="modal" data-bs-target="#registerModal">Register Now</button> -->
								<a href="#register" class="btn btn-red w-100">Register Now</a>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	<section class="section" id="register">
		<div class="container">
			<div class="row g-3 justify-content-center">
				<div class="col-12">
					<div class="section-title mb-3">
						<h2><span>Register to attend</h2>
					</div>
				</div>
				<div class="col-12">
					<?php
					$form['id'] = "registerForm";
					$this->load->view('components/theme/partials/widget/register_attendee_horizontal', $form);
					?>
				</div>
			</div>
		</div>
	</section>
	<div class="footer-lineart" style="background-image: url('<?= base_url('assets/images/icons/city/') ?><?= strtolower($city['name']) ?>-lineart-color.png')">

	</div>
</main>
<script>
	var timer;

	var compareDate = new Date("August 29, 2024 17:00:00");
	compareDate.setDate(compareDate.getDate()); //just for this demo today + 7 days

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

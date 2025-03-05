<?php
$dateObj = date_create_from_format("Y-m-d H:i:s", $award_event['date']);
$dateTime = date_format($dateObj, 'F j, Y h:i A');
$venue = ($award_event['venue'] == "") ? "Yet to be decided!" : $award_event['venue'];

?>

<main>
	<section class="springboard-register pb-0">
		<div class="container">
			<div class="row g-3 justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('awards') ?>">LOT Awards</a></li>
							<li class="breadcrumb-item active" aria-current="page">Register to Attend</li>
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
			<div class="row g-3 justify-content-center">
				<div class="col-xl-8 col-lg-6 col-12">
					<div class="text-content">
						<div class="card event-ticket">
							<div class="card-body">
								<div class="row g-3">
									<div class="col-lg-6 col-12">
										<p class="mb-0">Date & Time</p>
										<h3 class="text-red"><?= $dateTime ?></h3>
									</div>
									<div class="col-lg-6 col-12">
										<p class="mb-0">Venue</p>
										<h3 class="text-red"><?= $venue ?></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-4 col-lg-6 col-12">
					<div class="card glass-card pb-4" data-aos="fade-left">
						<div class="card-body">
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
	<section id="register" class="section">
		<div class="container">
			<div class="row g-3 justify-content-center">
				<div class="col-12">
					<div class="section-title mb-3">
						<h2><span>Register to attend</h2>
					</div>
				</div>
				<div class="col-12">
					<?php $id = "awardAttendeeRegister" ?>
					<?= form_open('api/v2/awards/rsvp', ['id' => $id]) ?>
					<input type="hidden" name="utm" value='<?= json_encode($this->input->get()) ?>'>
					<input type="hidden" name="event_city" value="<?= $city['name'] ?>">
					<div class="row g-3">
						<div class="col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Name</label>
								<input type="text" name="name" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Email Address</label>
								<input type="email" name="email" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Phone Number</label>
								<input type="text" maxlength="10" minlength="10" name="contact" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="">
								<div class="mb-2 form-check">
									<input type="checkbox" name="whatsapp_consent" class="form-check-input">
									<label class="form-check-label" for="exampleCheck1">I would like to receive ticket and event updates over WhatsApp</label>
								</div>
								<input type="text" maxlength="10" minlength="10" name="whatsapp" class="form-control d-none">
							</div>
						</div>
						<script>
							$(document).ready(function() {
								$('input[name=whatsapp_consent]').on("click", () => {
									$('input[name=whatsapp]').toggleClass('d-none');
								})
							})
						</script>
						<div class="col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">LinkedIn URL</label>
								<input type="url" name="linkedin" placeholder="https://www.linkedin.com/" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Organization Website URL</label>
								<input type="url" name="website" class="form-control" required>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Organization</label>
								<input type="text" name="organization[name]" class="form-control" minlength="5" required>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Designation</label>
								<input type="text" name="organization[designation]" class="form-control" minlength="5" required>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<div class="">
								<label for="" class="form-label">Department / Area of Work</label>
								<select name="organization[department]" id="" class="form-select" required>
									<option value="">Select</option>
									<option value="Marketing">Marketing</option>
									<option value="Operations">Operations</option>
									<option value="Finance">Finance</option>
									<option value="HR">HR</option>
									<option value="Founder / CEO">Founder / CEO</option>
									<option value="Other">Other</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<div class="">
								<label for="" class="form-label">Organization Turnover</label>
								<select name="organization[turnover]" id="" class="form-select" required>
									<option value="">Select</option>
									<option value="Below 20 Cr">Below 20 Cr.</option>
									<option value="20 Cr - 50 Cr">20 Cr. - 50 Cr.</option>
									<option value="50 Cr - 100 Cr">50 Cr. - 100 Cr.</option>
									<option value="100 Cr - 250 Cr">100 Cr. - 250 Cr.</option>
									<option value="250 Cr - 500 Cr">250 Cr. - 500 Cr.</option>
									<option value="500 Cr - 1000 Cr">500 Cr - 1000 Cr.</option>
									<option value="1000 Cr+">1000+ Cr.</option>
								</select>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<div class="">
								<label for="" class="form-label">Industry</label>
								<select name="organization[industry]" id="" class="form-select" required>
									<option value="">Select</option>
									<option value="Textile">Textile</option>
									<option value="Jems and Jewellery">Jems and Jewellery</option>
									<option value="Pharmaceutical">Pharmaceutical</option>
									<option value="Information &amp; Technology">Information &amp; Technology</option>
									<option value="Semiconductor">Semiconductor</option>
									<option value="Real Estate and Construction">Real Estate and Construction</option>
									<option value="Education and Electrical Equipment">Education and Electrical Equipment</option>
									<option value="Manufacturing">Manufacturing</option>
									<option value="BFSI">BFSI</option>
									<option value="Gaming">Gaming</option>
									<option value="Fintech">Fintech</option>
									<option value="Food &amp; Beverages">Food &amp; Beverages</option>
									<option value="Oil &amp; Gas">Oil &amp; Gas</option>
									<option value="Automotive and Auto Components">Automotive and Auto Components</option>
									<option value="FMCG">FMCG</option>
									<option value="Aerospace and Defence">Aerospace and Defence</option>
									<option value="Services">Services</option>
									<option value="Other">Other</option>
								</select>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="">
								<label for="" class="form-label">To ensure you have the best experience, we request a short reply from prospective attendees about why they should be invited. Please share your motivations, goals, or any reasons that highlight your interest in the Leaders of Tomorrow Events.</label>
								<textarea name="message" minlength="50" id="" rows="5" class="form-control" required></textarea>
							</div>
						</div>
						<div class="col-12">
							<div class="mb-3 form-check">
								<input type="checkbox" name="consent" required class="form-check-input">
								<label class="form-check-label" for="exampleCheck1">By submitting this form, you agree to share your contact details with the partners of this event. You further agree to be bound by the rules and regulations in respect of the event that may be published on this website or communicated to you from time to time.</label>
							</div>
						</div>
						<div class="col-12">
							<button type="submit" class="btn btn-red">Register</button>
							<button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						</div>
					</div>
					<?= form_close() ?>
					<script>
						$.validator.addMethod("linkedinurl_regex", function(value, element) {
							return this.optional(element) || /^(https?:\/\/)?(www\.)?linkedin\.com\//i.test(value);
						})
						$.validator.addMethod("emailregex", function(value, element) {
							return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
						})
						$.validator.addMethod("letters", function(value, element) {
							return this.optional(element) || /^[a-zA-Z\s']*$/i.test(value);
						});
						$.validator.addMethod("numbers", function(value, element) {
							return this.optional(element) || /^[0-9]*$/i.test(value);
						});
						$('#<?= $id ?>').validate({
							rules: {
								name: {
									letters: true,
								},
								email: {
									emailregex: true
								},
								contact: {
									numbers: true
								},
								linkedin: {
									linkedinurl_regex: true
								}
							},
							messages: {
								email: {
									emailregex: 'Please enter a valid email address'
								},
								name: {
									letters: 'Please enter a valid name',
								},
								contact: {
									numbers: 'Please enter a valid contact number'
								},
								linkedin: {
									linkedinurl_regex: 'Not a valid LinkedIn URL'
								}
							}
						})
					</script>
				</div>
			</div>
		</div>
	</section>
</main>
<script>
	var timer;

	var compareDate = new Date("<?= $dateTime ?>");
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

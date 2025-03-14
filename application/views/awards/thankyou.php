		<?php $status = $_SESSION['lot_rsvp_status'] ?>
		<?php if (!is_null($status)):
			if (!array_key_exists('error', $status)):
		?>
				<section class="section pb-0">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-auto col-lg-11 col-12">
								<div class="page-title">
									<div class="row align-items-center justify-content-center">
										<div class="col-auto">
											<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
										</div>
										<div class="col-auto">
											<h1>Registration Pending</h1>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="section">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-8 col-lg-10 col-12">
								<div class="section-title mb-3">
									<h2><span>Thank you for expressing your interest in attending the event!</span></h2>
								</div>
								<div class="text-content mb-3 mb-md-5">
									<p>
										Please note that your registration is pending for approval by our organizing team. You will receive a confirmation email with further details from <a href="mailto:response@timesnetwork.in">response@timesnetwork.in</a> once your registration has been approved.
									</p>
								</div>
								<div class="text-center">
									<a href="<?= base_url('awards') ?>" class="btn btn-red">Back To Awards</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php else: ?>
				<section class="section pb-0">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-auto col-lg-11 col-12">
								<div class="page-title">
									<div class="row align-items-center justify-content-center">
										<div class="col-auto">
											<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
										</div>
										<div class="col-auto">
											<h1>Registration Error!</h1>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="section">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-xl-8 col-lg-10 col-12">
								<h2 class="text-red text-center mb-3 mb-md-5"><?= $status['error']['error_message'] ?></h2>
								<div class="text-center">
									<a href="<?= base_url('awards/register-to-attend') ?>" class="btn btn-red">Register Again</a>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endif ?>
		<?php endif ?>

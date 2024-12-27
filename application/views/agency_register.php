<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/css/intlTelInput.css" integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput-jquery.min.js" integrity="sha512-QK4ymL3xaaWUlgFpAuxY+6xax7QuxPB3Ii/99nykNP/PlK3NTQa/f/UbQQnWsM4h5yjQoMjWUhCJbYgWamtL6g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<main>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-xl-6"></div>
				<div class="col-xl-6">
					<div class="plain-card">
						<div class="card-body">
							<div class="">
								<div class="mb-3 mb-md-4">
									<img src="<?= base_url('assets/images/') ?>main.png" alt="" height="40">
								</div>
								<div class="section-title mb-3 mb-md-5">
									<h2><span>Lead for Awards</span></h2>
								</div>
								<div class="">
									<style>
										.wizard>.content {
											min-height: 300px;
										}
									</style>
									<div class="row g-3 g-md-4">
										<div class="col-12">
											<div class="row g-1 g-md-2">
												<div class="col-12">
													<h5>Fill out this form.</h5>
												</div>
												<div class="col-12">
													<?= form_open('api/v2/agency/lead', ['id' => "formWizard"]) ?>
													<fieldset>
														<div class="row g-3 mb-3 mb-md-5">
															<div class="col-xl-6 col-12">
																<label for="" class="form-label">Name</label>
																<input type="text" name="name" class="form-control" required>
															</div>
															<div class="col-xl-6 col-12">
																<label for="" class="form-label">Contact Number</label>
																<input type="text" minlength="10" maxlength="13" id="OTPContact" name="contact" class="form-control" required>
															</div>
															<div class="col-12">
																<label for="" class="form-label">Email Address</label>
																<input type="email" name="email" class="form-control" required>
															</div>
															<!-- <div class="col-12">
																<div class="">
																	<div class="form-check">
																		<input class="form-check-input" type="checkbox"  id="flexCheckChecked" checked>
																		<label class="form-check-label" for="flexCheckChecked">
																			Make Account of The Party to the LOT Awards!
																		</label>
																	</div>
																</div>
															</div> -->
															
															<input type="hidden" name="do_register" value="on">
															<input type="hidden" name="agency_id" value="<?= $agency['agent_id'] ?>">
															<div class="col-12">
																<div class="row g-2">
																	<div class="col-auto">
																		<button class="btn btn-red" type="submit">Submit</button>
																	</div>
																	<div class="col-auto">
																		<button class="btn btn-secondary" type="reset">Nevermind</button>
																	</div>
																</div>
															</div>
														</div>
														<script>
															$("#OTPContact").intlTelInput({
																initialCountry: "in",
																separateDialCode: true,
																preferredCountries: ["in, us"],
																hiddenInput: "full_contact",
																formatOnDisplay: true,
																nationalMode: false,
																// allowDropdown: false,
																geoIpLookup: function(callback) {
																	$.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
																		var countryCode = (resp && resp.country) ? resp.country : "";
																		callback(countryCode);
																	});
																},
																utilsScript: "../../build/js/utils.js?1562189064761",
																utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/12.0.3/js/utils.js",
															});
														</script>
													</fieldset>
													<?= form_close() ?>
													<script>
														$('#formWizard').validate({

														})
													</script>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

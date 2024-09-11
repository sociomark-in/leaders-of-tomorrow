<main>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" integrity="sha512-bE0ncA3DKWmKaF3w5hQjCq7ErHFiPdH2IGjXRyXXZSOokbimtUuufhgeDPeQPs51AI4XsqDZUK7qvrPZ5xboZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="<?= base_url("assets/vendors/") ?>jquery-steps/jquery.steps.css">

	<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>
	<section class="section pb-md-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('awards') ?>">Awards</a></li>
							<li class="breadcrumb-item active" aria-current="page">Register</li>
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
								<h1>Register</h1>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<form id="formWizard">
								<h2>Select Category</h2>
								<fieldset>
									<div class="mb-3">
										<legend>Select Category</legend>
									</div>
									<div class="mb-3">
										<div class="row g-3">
											<?php for ($i = 0; $i < 15; $i++) : ?>
												<div class="col-xl-3">
													<div class="radio-card">
														<input type="radio" class="d-none" name="single" id="categoryId<?= $i ?>">
														<label for="categoryId<?= $i ?>" class="w-100 d-block">
															<div class="card">
																<div class="card-body">
																	<div class="mb-3">
																		<h5 class="">Category <?= $i ?></h5>
																	</div>
																	<div class="">
																		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, delectus.</p>
																	</div>
																</div>
																<div class="card-footer">
																	<p class="mb-0 text-sm text-muted">Last Date to Apply <?= date('F j, Y') ?></p>
																</div>
															</div>
														</label>
													</div>
												</div>
											<?php endfor ?>
										</div>
									</div>
								</fieldset>
								<h2>Persona Details</h2>
								<fieldset>
									<div class=" mb-3">
										<legend>Personal Details</legend>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ut nulla nunc. Maecenas arcu sem, hendrerit a tempor quis,
											sagittis accumsan tellus. In hac habitasse platea dictumst. Donec a semper dui. Nunc eget quam libero. Nam at felis metus.
											Nam tellus dolor, tristique ac tempus nec, iaculis quis nisi.</p>
									</div>
									<div class="">
										<div class="mb-3">
											<label for="emailInput" class="form-label">Email address</label>
											<input type="email" class="form-control" id="emailInput" placeholder="name@example.com" required>
										</div>
										<div class="mb-3">
											<label for="phoneInput" class="form-label">Contact Number</label>
											<input type="text" class="form-control" id="phoneInput" placeholder="(+091) 9999-9999" required data-inputmask-alias="(+999) 9999-9999">
										</div>
										<div class="mb-3">
											<label for="phoneInput" class="form-label">UDYAM MSME Number</label>
											<input type="text" class="form-control" id="phoneInput" placeholder="UDYAM-XY-07-1234567" required data-inputmask-alias="AAAA-AA-99-9999999">
										</div>
										<div class="mb-3">
											<label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
											<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
										</div>
									</div>
								</fieldset>

								<h2>Second Step</h2>
								<fieldset>
									<legend>Second Step</legend>
									<p>Donec mi sapien, hendrerit nec egestas a, rutrum vitae dolor. Nullam venenatis diam ac ligula elementum pellentesque.
										In lobortis sollicitudin felis non eleifend. Morbi tristique tellus est, sed tempor elit. Morbi varius, nulla quis condimentum
										dictum, nisi elit condimentum magna, nec venenatis urna quam in nisi. Integer hendrerit sapien a diam adipiscing consectetur.
										In euismod augue ullamcorper leo dignissim quis elementum arcu porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Vestibulum leo velit, blandit ac tempor nec, ultrices id diam. Donec metus lacus, rhoncus sagittis iaculis nec, malesuada a diam.
										Donec non pulvinar urna. Aliquam id velit lacus.</p>
								</fieldset>

								<h2>Third Step</h2>
								<fieldset>
									<legend>Third Step</legend>
									<p>Morbi ornare tellus at elit ultrices id dignissim lorem elementum. Sed eget nisl at justo condimentum dapibus. Fusce eros justo,
										pellentesque non euismod ac, rutrum sed quam. Ut non mi tortor. Vestibulum eleifend varius ullamcorper. Aliquam erat volutpat.
										Donec diam massa, porta vel dictum sit amet, iaculis ac massa. Sed elementum dui commodo lectus sollicitudin in auctor mauris
										venenatis.</p>
								</fieldset>

								<h2>Fourth Step</h2>
								<fieldset>
									<legend>Fourth Step</legend>
									<p>Quisque at sem turpis, id sagittis diam. Suspendisse malesuada eros posuere mauris vehicula vulputate. Aliquam sed sem tortor.
										Quisque sed felis ut mauris feugiat iaculis nec ac lectus. Sed consequat vestibulum purus, imperdiet varius est pellentesque vitae.
										Suspendisse consequat cursus eros, vitae tempus enim euismod non. Nullam ut commodo tortor.</p>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Custom js for this page -->
			<script>
				$("#formWizard").steps({
					headerTag: "h2",
					bodyTag: "fieldset",
					transitionEffect: "slideLeft"
				});
				$(":input").inputmask();
			</script>
			<!-- End custom js for this page -->

		</div>
	</section>
</main>

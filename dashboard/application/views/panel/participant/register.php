<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-steps/1.1.0/jquery.steps.min.js" integrity="sha512-bE0ncA3DKWmKaF3w5hQjCq7ErHFiPdH2IGjXRyXXZSOokbimtUuufhgeDPeQPs51AI4XsqDZUK7qvrPZ5xboZg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="<?= base_url("assets/vendors/") ?>jquery-steps/jquery.steps.css">

<script src="https://cdn.jsdelivr.net/npm/inputmask@5.0.8/dist/jquery.inputmask.min.js"></script>
<main class="page-content">
	<!-- Alert Message Box -->
	<div class="row">
		<div class="col-12 grid-margin stretch-card">
			<div class="alert w-100 alert-success alert-dismissible fade show" role="alert">
				<strong>Holy guacamole!</strong> You should check in on some of those fields below.
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		</div>
	</div>
	<!-- Alert Message Box -->

	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div class="">
			<h4 class="mb-3 mb-md-0">My Profile( <a href="">#827428723846926374</a> )</h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">My Profile</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="row g-4">
				<div class="col-12">
					<ul class="nav nav-pills gap-3" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
							<button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="true">Company Profile</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="nominations-tab" data-bs-toggle="tab" data-bs-target="#nominations-tab-pane" type="button" role="tab" aria-controls="nominations-tab-pane" aria-selected="false">All Applications</button>
						</li>
						<li class="nav-item" role="presentation">
							<button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contact</button>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane py-3 fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
							<div class="row">
								<div class="col-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="row g-3">
												<div class="col-auto">
													<img src="https://placehold.co/80x80" alt="" class="">
												</div>
												<div class="col mb-3">
													<div class="">
														<h2>Lorem, ipsum.</h2>
														<p>Lorem ipsum dolor sit.</p>
													</div>
												</div>
												<div class="col-auto">
													<div class="row g-3">
														<div class="col-auto">
															<a href="" class="btn btn-lg btn-primary btn-icon-append">
																Button<i class="icon" data-feather="edit"></i>
															</a>
														</div>
														<div class="col-auto">
															<a href="" class="btn btn-lg btn-outline-primary btn-icon-append">
																Button<i class="icon" data-feather="arrow-right"></i>
															</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<form id="formWizard">
												<h2>First Step</h2>
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
						</div>
						<div class="tab-pane py-3 fade" id="nominations-tab-pane" role="tabpanel" aria-labelledby="nominations-tab" tabindex="0">
							<div class="row">
								<?php for ($i = 0; $i < 3; $i++) : ?>
									<div class="col-lg-4 col-md-6 col-12 stretch-card">
										<div class="card">
											<div class="card-body">
												<div class="mb-2">
													<h6>
														<span class="badge text-bg-success">Applied</span>
														<span class="badge text-bg-warning">In Process</span>
													</h6>
												</div>
												<div class="">
													<h3>Lorem ipsum dolor sit amet.</h3>
													<p class="text-muted">Last Updated on <?= date('F j,Y H:i:s') ?></p>
												</div>
											</div>
										</div>
									</div>
								<?php endfor ?>
							</div>
						</div>
						<div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>
					</div>
				</div>
				<div class="col-12">

				</div>
			</div>
		</div>
	</div>
	<!-- row -->
</main>

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

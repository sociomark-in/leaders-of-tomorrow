<ul class="nav nav-pills gap-3" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal-tab-pane" type="button" role="tab" aria-controls="personal-tab-pane" aria-selected="true">Organizational Details</button>
	</li>
	<!-- <li class="nav-item" role="presentation">
		<button class="nav-link" id="organization-tab" data-bs-toggle="tab" data-bs-target="#organization-tab-pane" type="button" role="tab" aria-controls="organization-tab-pane" aria-selected="false">Organizational Overview</button>
	</li> -->
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="casestudy1-tab" data-bs-toggle="tab" data-bs-target="#casestudy1-tab-pane" type="button" role="tab" aria-controls="casestudy-tab-pane" aria-selected="false">Case Study I</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="casestudy2-tab" data-bs-toggle="tab" data-bs-target="#casestudy2-tab-pane" type="button" role="tab" aria-controls="casestudy2-tab-pane" aria-selected="false">Case Study II</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="casestudy3-tab" data-bs-toggle="tab" data-bs-target="#casestudy3-tab-pane" type="button" role="tab" aria-controls="casestudy3-tab-pane" aria-selected="false">Case Study III</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="downloads-tab" data-bs-toggle="tab" data-bs-target="#downloads-tab-pane" type="button" role="tab" aria-controls="downloads-tab-pane" aria-selected="false">Creatives for Case Studies</button>
	</li>
</ul>
<div class="tab-content" id="myTabContent">
	<!-- Step 1 -->
	<div class="tab-pane fade show active" id="personal-tab-pane" role="tabpanel" aria-labelledby="personal-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<fieldset class="col-12">
								<legend class="card-title mb-0">
									<h5>Participating Entity<sup class="text-danger">&ast;</sup></h5>
								</legend>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<p class="form-label">Name of the Participating Entity</p>
											<h5><?= $application['organization_name'] ?></h5>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-12">
										<div class="">
											<p class="form-label">Name of the Presenter</p>
											<h5><?= $application['name'] ?></h5>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-12">
										<div class="">
											<p class="form-label">Designation</p>
											<h5><?= $application['designation'] ?></h5>
										</div>
									</div>

									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p class="form-label">Date of Company Incorporation</p>
											<h5><?= $application['id_255002'] ?></h5>
										</div>
									</div>


									<div class="col-xxl-3 col-xl-4 col-12">
										<div class="">
											<p class="form-label">Type of Business</p>
											<h5><?= $application['id_255004'] ?></h5>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="col-12">
									<legend class="card-title mb-0">
										<h5>Financial Details<sup class="text-danger">&ast;</sup></h5>
									</legend>
									<div class="row g-3">
										<div class="col-12">
											<div class="row g-3">
												<div class="col-xxl-4 col-12">

												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													FY 2024
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													FY 2023
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row g-3">
												<div class="col-xxl-4 col-12">
													Revenue / Turnover (in INR Crores)
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255101'] ?></h5>
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255102'] ?></h5>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row g-3">
												<div class="col-xxl-4 col-12">
													Revenue Growth (in %)
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255103'] ?></h5>
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255104'] ?></h5>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row g-3">
												<div class="col-xxl-4 col-12">
													Net Profit Margin (In %)
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255105'] ?></h5>
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255106'] ?></h5>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row g-3">
												<div class="col-xxl-4 col-12">
													Return on Assets
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255107'] ?></h5>
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255108'] ?></h5>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row g-3">
												<div class="col-xxl-4 col-12">
													Debt Equity Ratio
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255109'] ?></h5>
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255110'] ?></h5>
												</div>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 grid-margin stretch-card d-none">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<fieldset class="col-12">
								<legend class="card-title mb-0">
									<h5>Contact Person of Organization<sup class="text-danger">&ast;</sup></h5>
								</legend>
								<div class="row g-3">
									<div id="sectionChange" class="col-12">
										<div class="row g-3">
											<div class="col-xl-3 col-lg-6 col-12">
												<div class="">
													<p class="form-label">Full Name of Individual</p>
													<h5><?= $application['id_255901'] ?></h5>
												</div>
											</div>
											<div class="col-lg-6 col-12">
												<div class="">
													<p class="form-label">Email Address</p>
													<h5><?= $application['id_255902'] ?></h5>
												</div>
											</div>
											<div class="col-xl-3 col-lg-6 col-12">
												<div class="">
													<p class="form-label">Contact Number</p>
													<h5><?= $application['id_255903'] ?></h5>
												</div>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Case Study I -->
	<div class="tab-pane fade" id="casestudy1-tab-pane" role="tabpanel" aria-labelledby="casestudy1-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4 g-lg-5">
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Case Study I: About the Organization<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<p class="form-label">Brief description about the organization</p>
											<h5><?= $application['id_255201'] ?></h5>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<p class="form-label">Core Products / Services Offered</p>
											<h5><?= $application['id_255202'] ?></h5>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4 g-lg-5">
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Case Study II: Innovation and Adaptability<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<h5><?= $application['id_255203'] ?></h5>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Case Study II -->
	<div class="tab-pane fade" id="casestudy2-tab-pane" role="tabpanel" aria-labelledby="casestudy2-tab" tabindex="0">
		<div class="row g-3 mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="col-12">
									<div class="mb-3">
										<legend class="card-title mb-0">
											<h5>Case Study III: Business Performance & Market Impact<sup class="text-danger">&ast;</sup></h5>
										</legend>
									</div>
									<div class="row g-3">
										<div class="col-12">
											<div class="">
												<h5><?= $application['id_255204'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<h5><?= $application['id_255205'] ?></h5>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="col-12">
									<div class="mb-3">
										<legend class="card-title mb-0">
											<h5>Case Study IV: Sustainability & Social Responsibility<sup class="text-danger">&ast;</sup></h5>
										</legend>
									</div>
									<div class="row g-3">
										<div class="col-12">
											<div class="">
												<h5><?= $application['id_255206'] ?></h5>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Case Study III -->
	<div class="tab-pane fade" id="casestudy3-tab-pane" role="tabpanel" aria-labelledby="casestudy3-tab" tabindex="0">
		<div class="row g-3 mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="col-12">
									<div class="mb-3">
										<legend class="card-title mb-0">
											<h5>Case Study V: Scalability & Future Readiness<sup class="text-danger">&ast;</sup></h5>
										</legend>
									</div>
									<div class="row g-3">
										<div class="col-12">
											<div class="">
												<h5><?= $application['id_255207'] ?></h5>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="col-12">
									<div class="mb-3">
										<legend class="card-title mb-0">
											<h5>Case Study VI: Additional Supportings<sup class="text-danger">&ast;</sup></h5>
										</legend>
									</div>
									<div class="row g-3">
										<div class="col-12">
											<div class="">
												<h5><?= $application['id_255208'] ?></h5>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Document Uploads -->
	<div class="tab-pane fade" id="downloads-tab-pane" role="tabpanel" aria-labelledby="downloads-tab" tabindex="0">
		<div class="row g-3 mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Document Uploads</h5>
									</legend>
									<div class="row g-3">
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Graphic Creative Supporting Case Study I</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255401']) ?>" target="_blank">View Creative Graphic<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Graphic Creative Supporting Case Study II</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255402']) ?>" target="_blank">View Creative Graphic<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Graphic Creative Supporting Case Study III</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255403']) ?>" target="_blank">View Creative Graphic<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Graphic Creative Supporting Case Study IV</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255404']) ?>" target="_blank">View Creative Graphic<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Graphic Creative Supporting Case Study V</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255405']) ?>" target="_blank">View Creative Graphic<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Graphic Creative Supporting Case Study VI</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255406']) ?>" target="_blank">View Creative Graphic<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

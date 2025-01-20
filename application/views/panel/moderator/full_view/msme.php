<ul class="nav nav-pills gap-3" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal-tab-pane" type="button" role="tab" aria-controls="personal-tab-pane" aria-selected="true">Personal Details</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="organization-tab" data-bs-toggle="tab" data-bs-target="#organization-tab-pane" type="button" role="tab" aria-controls="organization-tab-pane" aria-selected="false">Organizational Overview</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="casestudy-tab" data-bs-toggle="tab" data-bs-target="#casestudy-tab-pane" type="button" role="tab" aria-controls="casestudy-tab-pane" aria-selected="false">Case Studies</button>
	</li>
	<!-- <li class="nav-item" role="presentation">
		<button class="nav-link" id="casestudy2-tab" data-bs-toggle="tab" data-bs-target="#casestudy2-tab-pane" type="button" role="tab" aria-controls="casestudy2-tab-pane" aria-selected="false">Case Study II</button>
	</li> -->
	<!-- <li class="nav-item" role="presentation">
		<button class="nav-link" id="casestudy3-tab" data-bs-toggle="tab" data-bs-target="#casestudy3-tab-pane" type="button" role="tab" aria-controls="casestudy3-tab-pane" aria-selected="false">Case Study III</button>
	</li> -->
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="downloads-tab" data-bs-toggle="tab" data-bs-target="#downloads-tab-pane" type="button" role="tab" aria-controls="downloads-tab-pane" aria-selected="false">Document Uploads</button>
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
									<h5>Participating Entity</h5>
								</legend>
								<div class="row g-3">
									<div class="col-xl-6 col-lg-6 col-12">
										<div class="">
											<p class="form-label">Name of the Participating Entity</p>
											<h5><?= $application['organization_name'] ?></h5>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-12">
										<div class="">
											<p class="form-label">Name of the Applicant</p>
											<h5><?= $application['name'] ?></h5>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p class="form-label">Designation</p>
											<h5><?= $application['designation'] ?></h5>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p class="form-label">Business Segment</p>
											<h5><?= $application['id_255003'] ?></h5>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p class="form-label">Date of Company Incorporation</p>
											<h5><?= $application['id_255002'] ?></h5>
										</div>
									</div>
									<div class="col-12">
										<div class="row g-3">
											<div class="col-12">
												<?php
												if(is_array(json_decode($application['id_255001']))){
													$address = implode(', ', json_decode($application['id_255001']));
												} else {
													$address = $application['id_255001'];
												}
												?>
												<p class="form-label">Registered Address Participating Entity</p>
												<h5><?= $address ?></h5>
											</div>
											<div class="col-xl-4 col-lg-6 col-12">
												<p class="form-label">State</p>
												<h5><?= $application['organization_state'] ?></h5>
											</div>
											<div class="col-xl-4 col-lg-6 col-12">
												<p class="form-label">City</p>
												<h5><?= $application['organization_city'] ?></h5>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-12">
										<div class="">
											<p class="form-label">Type of Ownership</p>
											<h5><?= $application['id_255005'] ?></h5>
										</div>
									</div>
									<div class="col-xxl-6 col-xl-8 col-12">
										<div class="">
											<p class="form-label">Website URL</p>
											<h5><a href="<?= $application['organization_url'] ?>" target="_blank"><?= $application['organization_url'] ?></a></h5>
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
							<fieldset class="col-12">
								<legend class="card-title mb-0">
									<h5>Contact Person of Organization</h5>
								</legend>
								<div class="row g-3">

									<div id="sectionChange" class="col-12">
										<div class="row g-3">
											<div class="col-xl-3 col-lg-6 col-12">
												<div class="">
													<p for="" class="form-label">Full Name of Individual</p>
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
	<div class="tab-pane fade" id="organization-tab-pane" role="tabpanel" aria-labelledby="organization-tab" tabindex="0">
		<div class="row mt-2">
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
											</div>
										</div>
										<div class="col-12">
											<div class="row g-3">
												<div class="col-xxl-4 col-12">
													Return On Assets (ROA)
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255106'] ?></h5>
												</div>
											</div>
										</div>
										<div class="col-12">
											<div class="row g-3">
												<div class="col-xxl-4 col-12">
													Current Ratio
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<h5><?= $application['id_255107'] ?></h5>
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
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<fieldset class="col-12">
								<legend class="card-title mb-0">
									<h5>Organization Overview<sup class="text-danger">&ast;</sup></h5>
								</legend>
								<div class="row g-3">
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p class="form-label">No. Of Employees</p>
											<h5><?= $application['id_255201'] ?></h5>
										</div>
									</div>

									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p class="form-label">Target Market Segment and Geographic Reach</p>
											<h5><?= $application['id_255202'] ?></h5>
										</div>
									</div>

									<div class="col-12">
										<div class="">
											<p class="form-label">Brief Description of the Business</p>
											<h5><?= $application['id_255203'] ?></h5>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<p class="form-label">Core Products / Services Offered</p>
											<h5><?= $application['id_255204'] ?></h5>
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
	<div class="tab-pane fade" id="casestudy-tab-pane" role="tabpanel" aria-labelledby="casestudy-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Innovation and Adaptability<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<p class="form-label">Describe the initiative/product/service that you organization has developed between the period of April 01, 2022, to March 31, 2024, that has led to business success. What was the problem that you aimed to address through the initiative/product/service?</p>
											<h5><?= $application['id_255301'] ?></h5>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Business Performance and Market Impact<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<p class="form-label">Outline your growth trajectory over the past two years, providing specific metrics such as revenue growth, market share, or client acquisition</p>
											<h5><?= $application['id_255302'] ?></h5>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Sustainability and Social Responsibility<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<p class="form-label">Describe the key initiative your organization has undertaken to promote environmental sustainability or create a positive social impact through this initiative. How has this initiative contributed to your business and the community</p>
											<h5><?= $application['id_255303'] ?></h5>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Scalability and Future Readiness<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<p class="form-label">Outline your organization&#39;s strategy for scaling operations and adapting to future market demands. Highlight any investments in technology, talent, or infrastructure that demonstrate readiness for future growth.</p>
											<h5><?= $application['id_255304'] ?></h5>
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Entrepreneur of the Year<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<p class="form-label">Describe the most significant innovation or transformation you have implemented in your business and its impact on your organization&#39;s growth and outcomes. Highlight how this has set your business apart in the industry.</p>
											<h5><?= $application['id_255305'] ?></h5>
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
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>MSME Certificate</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255401']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Company Incorporation Certificate</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255402']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Photographs or Videos of products/services offered</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255403']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Collaterals to Support the Impact</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255404']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Any other Collaterals</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255405']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
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

<ul class="nav nav-pills gap-3" id="myTab" role="tablist">
	<li class="nav-item" role="presentation">
		<button class="nav-link active" id="personal-tab" data-bs-toggle="tab" data-bs-target="#personal-tab-pane" type="button" role="tab" aria-controls="personal-tab-pane" aria-selected="true">Personal Details</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="organization-tab" data-bs-toggle="tab" data-bs-target="#organization-tab-pane" type="button" role="tab" aria-controls="organization-tab-pane" aria-selected="false">Organizational Overview</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="casestudy1-tab" data-bs-toggle="tab" data-bs-target="#casestudy1-tab-pane" type="button" role="tab" aria-controls="casestudy1-tab-pane" aria-selected="false">Case Study I</button>
	</li>
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="casestudy2-tab" data-bs-toggle="tab" data-bs-target="#casestudy2-tab-pane" type="button" role="tab" aria-controls="casestudy2-tab-pane" aria-selected="false">Case Study II</button>
	</li>
	<!-- <li class="nav-item" role="presentation">
		<button class="nav-link" id="casestudy3-tab" data-bs-toggle="tab" data-bs-target="#casestudy3-tab-pane" type="button" role="tab" aria-controls="casestudy3-tab-pane" aria-selected="false">Case Study III</button>
	</li> -->
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="downloads-tab" data-bs-toggle="tab" data-bs-target="#downloads-tab-pane" type="button" role="tab" aria-controls="downloads-tab-pane" aria-selected="false">Document Uploads</button>
	</li>
</ul>
<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="personal-tab-pane" role="tabpanel" aria-labelledby="personal-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Personal Information</h5>
									</legend>
									<div class="row g-3">
										<div class="col-12">
											<div class="">
												<p>Full Name of Individual</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Designation</p>
												<h5><?= $application['id_74502'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Date of Birth</p>
												<h5><?= $application['id_74501'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Total Months of Experience</p>
												<h5><?= $application['id_74503'] ?></h5>
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
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Current Organization</h5>
									</legend>
									<div class="row g-3">
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Name of the Current Organization</p>
												<h5><?= $application['organization_name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Type of Business</p>
												<h5><?= $application['id_74505'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Years of Experience</p>
												<h5><?= $application['id_74508'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Business Segment</p>
												<h5><?= $application['id_74506'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Company Incorporation</p>
												<h5><?= $application['id_74507'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>No. Of Employees</p>
												<h5><?= $application['id_74504'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Website URL</p>
												<h5><?= $application['organization_url'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>LinkedIn URL</p>
												<h5><?= $application['linkedin_url'] ?></h5>
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
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Contact Person</h5>
									</legend>
									<div class="row g-3">
										<div class="col-xl-3 col-lg-6">
											<div class="">
												<p>Full Name</p>
												<h5><?= $application['id_74529'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>Email Address</p>
												<h5><?= $application['id_74530'] ?></h5>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6">
											<div class="">
												<p>Contact Number</p>
												<h5><?= $application['id_74531'] ?></h5>
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
	<div class="tab-pane fade" id="organization-tab-pane" role="tabpanel" aria-labelledby="organization-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Organization Overview</h5>
									</legend>
									<div class="row g-3">
										<div class="col-12">
											<div class="">
												<p class="mb-2">Brief Overview of the Company</p>
												<h5><?= $application['id_74509'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p class="mb-2">Mission & Vision</p>
												<h5><?= $application['id_74510'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p class="mb-2">Products / Services Offered</p>
												<h5><?= $application['id_74511'] ?></h5>
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
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Financial Details</h5>
									</legend>
									<div class="row g-3">
										<div class="col-12">
											<table class="table table-striped">
												<thead>
													<tr>
														<th></th>
														<th>FY 2023</th>
														<th>FY 2022</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Revenue/ Turnover (in INR Crores)</td>
														<td>
															<h5><?= $application['id_74512'] ?></h5>
														</td>
														<td>
															<h5><?= $application['id_74513'] ?></h5>
														</td>
													</tr>
													<tr>
														<td>Revenue Growth (In %)</td>
														<td>
															<h5><?= $application['id_74514'] ?></h5>
														</td>
														<td>
															<h5><?= $application['id_74515'] ?></h5>
														</td>
													</tr>
												</tbody>
											</table>
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
	<div class="tab-pane fade" id="casestudy1-tab-pane" role="tabpanel" aria-labelledby="casestudy1-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Case Studies</h5>
									</legend>
									<div class="row g-3">
										<div class="col-12">
											<div class="">
												<p class="mb-2">Describe your journey as an entrepreneur. What was your inspiration behind setting up your organization? (Max 150 words)</p>
												<h5><?= $application['id_74516'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p class="mb-2">Highlight the key initiatives taken by you within the organization in the past 2 years which led to business growth and success (Max 150 words)</p>
												<h5><?= $application['id_74517'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p class="mb-2">Elaborate on the impact of these initiatives on the various stakeholders of your organization such as customers, employees, MSME industry, etc. (Max 150 words)</p>
												<h5><?= $application['id_74518'] ?></h5>
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
	<div class="tab-pane fade" id="casestudy2-tab-pane" role="tabpanel" aria-labelledby="casestudy2-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Case Studies</h5>
									</legend>
									<div class="row g-3">
										<div class="col-12">
											<div class="">
												<p class="mb-2">Highlight the key milestones achieved by you as an entrepreneur during your journey. What are you key differentiating factors from your competitors? (Max 150 words)</p>
												<h5><?= $application['id_74519'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p class="mb-2">How do you plan to scale up your business in the next 2 years. Highlight the following parameters (max 200 words)</p>
												<h5><?= $application['id_74520'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p class="mb-2">How do you envision contributing to the growth of the MSME sector in the coming years? (Max 150 words)</p>
												<h5><?= $application['id_74521'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p class="mb-2">Is there any other information you would like to provide to support and strengthen your application? For example: Awards, recognitions, etc. (Max 100 words)</p>
												<h5><?= $application['id_74522'] ?></h5>
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
												<h5><a class="link-icon" href="<?= base_url($application['id_74525']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Company Incorporation Certificate</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_74526']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Impact assessment report as on March 31, 2023</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_74527']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Any other Collaterals</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_74528']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
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

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
				<div class="card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Participating Entity</h5>
									</legend>
									<div class="row g-3">
										<div class="col-xl-5 col-lg-6">
											<div class="">
												<p>Name of the Participating Entity</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6">
											<div class="">
												<p>Type of Business</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Business Segment</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Date of Company Incorporation</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>No. Of Employees</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Funding Source</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>Website URL</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>LinkedIn URL</p>
												<h5><?= $application['name'] ?></h5>
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
				<div class="card">
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
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>Email Address</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6">
											<div class="">
												<p>Contact Number</p>
												<h5><?= $application['name'] ?></h5>
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
				<div class="card">
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
												<p>Industry segment of the participating entity</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>Brief Overview of the Company</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>Mission & Vision</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>Products / Services Offered</p>
												<h5><?= $application['name'] ?></h5>
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
				<div class="card">
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
															<h5><?= $application['name'] ?></h5>
														</td>
														<td>
															<h5><?= $application['name'] ?></h5>
														</td>
													</tr>
													<tr>
														<td>Revenue Growth (In %)</td>
														<td>
															<h5><?= $application['name'] ?></h5>
														</td>
														<td>
															<h5><?= $application['name'] ?></h5>
														</td>
													</tr>
													<tr>
														<td>Net Profit Margin (In %)</td>
														<td>
															<h5><?= $application['name'] ?></h5>
														</td>
														<td>
															<h5><?= $application['name'] ?></h5>
														</td>
													</tr>
													<tr>
														<td>Asset Valuation (in INR Crores)</td>
														<td>
															<h5><?= $application['name'] ?></h5>
														</td>
														<td>
															<h5><?= $application['name'] ?></h5>
														</td>
													</tr>
													<tr>
														<td>Debt: Equity Ratio</td>
														<td>
															<h5><?= $application['name'] ?></h5>
														</td>
														<td>
															<h5><?= $application['name'] ?></h5>
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
				<div class="card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Initiative / Product / Service</h5>
									</legend>
									<p class="mb-3">(The initiative or innovation can be a new product/ solution development, digitization, technical innovation, process improvement, entering new market, etc.)</p>
									<div class="row g-3">
										<div class="col-lg-6">
											<div class="">
												<p>Name of the initiative or product/service offering</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6">
											<div class="">
												<p>Start Date</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6">
											<div class="">
												<p>End Date</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p>Describe the initiative/product/service that you organization has developed between the period of April 01, 2022, to March 31, 2023 that has led to business success. What was the problem that you aimed to address through the initiative/product/service? </p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p>Highlight the challenges faced by you as an MSME to implement the initiative or product/service offering mentioned above and how did the organization overcome these challenges? </p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<p>Elaborate on your go-market-strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors. (Max 150 words)</p>
												<h5><?= $application['name'] ?></h5>
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
				<div class="card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="">
									<div class="row g-3">
										<div class="col-12">
											<legend class="card-title mb-0">
												<h5>Use of Technology</h5>
											</legend>
											<p>How have you leveraged technology while implementing the initiative/product/service? (Max 200 words)</p>
										</div>
										<div class="col-12">
											<div class="">
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-12">
								<fieldset class="">
									<div class="row g-3">
										<div class="col-12">
											<legend class="card-title mb-0">
												<h5>Impact of the innovation/ initiative</h5>
											</legend>
											<p>

												Elaborate on the impact created by the initiative/product/service on your various stakeholders such as customers, employees, industry, etc.
												<br>(Details should be measurable and generic statements should be avoided) (Max 200 words)
											</p>
										</div>
										<div class="col-12">
											<div class="">
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-12">
								<fieldset class="">
									<div class="row g-3">
										<div class="col-12">
											<legend class="card-title mb-0">
												<h5>Sustainability &amp; Scalability</h5>
											</legend>
											<p>Elaborate on the sustainability and / or scalability of the initiative/product/service offering mentioned above. Highlight the following parameters (max 200 words)
												Growth plan for next 2-3 years
												Growth plan for the initiative or product/ service offering
												Plan for raising funds in future
												Any other
											</p>
										</div>
										<div class="col-12">
											<div class="">
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-12">
								<fieldset class="">
								<div class="row g-3">
										<div class="col-12">
											<legend class="card-title mb-0">
												<h5>Additional Information</h5>
											</legend>
											<p>Is there any other information you would like to provide to support and strengthen your application? For example: Awards, recognitions, etc.</p>
										</div>
										<div class="col-12">
											<div class="">
												<h5><?= $application['name'] ?></h5>
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
	<!-- <div class="tab-pane fade" id="casestudy3-tab-pane" role="tabpanel" aria-labelledby="casestudy3-tab" tabindex="0">
		<div class="row g-3 mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Participating Entity</h5>
									</legend>
									<div class="row g-3">
										<div class="col-xl-5 col-lg-6">
											<div class="">
												<p>Name of the Participating Entity</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6">
											<div class="">
												<p>Type of Business</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Business Segment</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Date of Company Incorporation</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>No. Of Employees</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Funding Source</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>Website URL</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>LinkedIn URL</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-12">
								<fieldset class="">
									<legend class="card-title mb-0">
										<h5>Contact Person</h5>
									</legend>
									<div class="row g-3">
										<div class="col-xl-3 col-lg-6">
											<div class="">
												<p>Full Name</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="">
												<p>Email Address</p>
												<h5><?= $application['name'] ?></h5>
											</div>
										</div>
										<div class="col-xl-3 col-lg-6">
											<div class="">
												<p>Contact Number</p>
												<h5><?= $application['name'] ?></h5>
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
	</div> -->
	<div class="tab-pane fade" id="downloads-tab-pane" role="tabpanel" aria-labelledby="downloads-tab" tabindex="0">
		<div class="row g-3 mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
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
												<h5><a class="link-icon" href="<?= base_url('awards/category/') . $category['code'] ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Company Incorporation Certificate</p>
												<h5><a class="link-icon" href="<?= base_url('awards/category/') . $category['code'] ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Impact assessment report as on March 31, 2023</p>
												<h5><a class="link-icon" href="<?= base_url('awards/category/') . $category['code'] ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Any other Collaterals</p>
												<h5><a class="link-icon" href="<?= base_url('awards/category/') . $category['code'] ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
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

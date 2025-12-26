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
	<li class="nav-item" role="presentation">
		<button class="nav-link" id="individual-tab" data-bs-toggle="tab" data-bs-target="#individual-tab-pane" type="button" role="tab" aria-controls="individual-tab-pane" aria-selected="false">Individual Details</button>
	</li>
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
							<?php
							$address = json_decode($application['id_255001'], true);
							$equity = json_decode($application['id_255004'], true);
							?>
							<fieldset class="col-12">
								<legend class="card-title mb-0">
									<h5>Participating Entity<sup class="text-danger">&ast;</sup></h5>
								</legend>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<h5 class="form-label">Participating Entity (Organization Name)</h5>
											<div class="p-2 bg-light">
												<?= $application['organization_name'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Primary Industry Sector</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255000'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Business Segment</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255003'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Date of Company Incorporation</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255002'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="row g-3">
											<div class="col-12">
												<h5 class="form-label">Registered Address Participating Entity</h5>
												<div class="p-2 bg-light">
													<?= $address['0'] ?? '' ?>
												</div>
												<div class="p-2 bg-light">
													<?= $address['1'] ?? '' ?>
												</div>
												<div class="p-2 bg-light">
													<?= $address['2'] ?? '' ?>
												</div>
											</div>
											<div class="col-xl-4 col-lg-6 col-12">
												<h5 class="form-label">State</h5>
												<!-- <input type="text" placeholder="" name="organization[address][state]" value="<?= $application['organization_state'] ?>" class="form-control"> -->
												<div class="p-2 bg-light">
													<?= $application['organization_state'] ?? '' ?>
												</div>
											</div>
											<div class="col-xl-4 col-lg-6 col-12">
												<h5 class="form-label">City</h5>
												<div class="p-2 bg-light">
													<?= $application['organization_city'] ?? '' ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
										<div id="ownershipTypeDiv" class="">
											<?php $isOtherOwn = isset($application['id_255005']) && !in_array($application['id_255005'], ['Sole Proprietorship', 'Partnership', 'Private Limited']); ?>
											<h5 class="form-label">Type of Ownership</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255005'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">IEC (Import Export Code) Number</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255009'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Export Promotion Council / RCMC</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255010'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-6 col-12">
										<div id="certificationsDiv" class="">
											<?php
											$c = json_decode($application['id_255011'] ?? '[]', true);
											$s = NULL;
											$isOtherCert = false;
											foreach ($c as $key => $value) {
												$c[$key] = trim($value);
												if (str_contains($value, 'Other')) {
													$isOtherCert = true;
													$s = str_replace(['(', ')'], '', ltrim($value, 'Other - '));
												} else {
													$isOtherCert = false;
												}
											}
											$isOtherCert = true; ?>
											<h5 class="form-label">Key International Certifications</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255011'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-6 col-xl-8 col-12">
										<div class="">
											<h5 class="form-label">Website URL</h5>
											<div class="p-2 bg-light">
												<?= $application['organization_url'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-12">
										<!-- EQUITY SPLIT -->
										<h5 class="form-label">Equity Split Between Partners</h5>
										<table class="table table-bordered mb-2" id="equityTable">
											<thead>
												<tr>
													<th>Name</th>
													<th>Gender</th>
													<th>Designation</th>
													<th>Equity (%)</th>
												</tr>
											</thead>
											<tbody>
												<?php if (isset($equity) && is_array($equity)) : ?>
													<?php foreach ($equity as $index => $partner) : ?>
														<tr>
															<td>
																<div class="p-2 bg-light">
																	<?= $partner['name'] ?? '' ?>
																</div>
															</td>
															<td>
																<div class="p-2 bg-light">
																	<?= $partner['gender'] ?? '' ?>
																</div>
															</td>
															<td>
																<div class="p-2 bg-light">
																	<?= $partner['designation'] ?? '' ?>
																</div>
															</td>
															<td>
																<div class="p-2 bg-light">
																	<?= $partner['equity'] ?? '' ?>
																</div>
															</td>
														</tr>
													<?php endforeach ?>
												<?php endif ?>
											</tbody>
										</table>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Name of the Applicant</h5>
											<div class="p-2 bg-light">
												<?= $application['name'] ?? '' ?>
											</div>
											<span class="form-text">(MD/CEO/Founder or equivalent)</span>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Designation</h5>
											<div class="p-2 bg-light">
												<?= $application['designation'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Date of Birth</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255008'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Gender</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255007'] ?? '' ?>
											</div>
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
									<h5>Primary Contact for Award Coordination<sup class="text-danger">&ast;</sup></h5>
								</legend>
								<div class="row g-3">
									<div id="sectionChange" class="col-12">
										<div class="row g-3">
											<div class="col-xl-3 col-lg-6 col-12">
												<div class="">
													<h5 class="form-label">Full Name of Individual</h5>
													<div class="p-2 bg-light">
														<?= $application['id_255901'] ?? '' ?>
													</div>
												</div>
											</div>
											<div class="col-lg-6 col-12">
												<div class="">
													<h5 class="form-label">Email Address</h5>
													<div class="p-2 bg-light">
														<?= $application['id_255902'] ?? '' ?>
													</div>
												</div>
											</div>
											<div class="col-xl-3 col-lg-6 col-12">
												<div class="">
													<h5 class="form-label">Contact Number</h5>
													<div class="p-2 bg-light">
														<?= $application['id_255903'] ?? '' ?>
													</div>
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
	<!-- Organization Details -->
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
											<table class="table table-bordered">
												<thead>
													<tr>
														<th></th>
														<th>FY 2024 - 2025</th>
														<th>FY 2023 - 2024</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Revenue/ Turnover (in INR Crores)</td>
														<td><?= $application['id_255101'] ?></td>
														<td><?= $application['id_255102'] ?></td>
													</tr>
													<tr>
														<td>Revenue from Global Markets (as a percentage of total revenue)</td>
														<td><?= $application['id_255103'] ?></td>
														<td><?= $application['id_255104'] ?></td>
													</tr>
													<tr>
														<td>EBITDA margin (In %)</td>
														<td><?= $application['id_255105'] ?></td>
														<td><?= $application['id_255106'] ?></td>
													</tr>
													<tr>
														<td>Net Profit Margin (In %)</td>
														<td><?= $application['id_255107'] ?></td>
														<td><?= $application['id_255108'] ?></td>
													</tr>
													<tr>
														<td>Export Revenue Growth %</td>
														<td><?= $application['id_255109'] ?></td>
														<td></td>
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
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<div class="col-12">
								<fieldset class="col-12">
									<legend class="card-title mb-0">
										<h5>Organization Overview<sup class="text-danger">&ast;</sup></h5>
									</legend>
									<div class="row g-3 mb-3">
										<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
											<div class="">
												<h5 class="form-label">No. Of Employees</h5>
												<div class="p-2 bg-light">
													<?= $application['id_255201'] ?? '' ?>
												</div>
												<small class="text-muted">(On payroll + On contract) as on March 31, 2025</small>
											</div>
										</div>
										<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
											<div class="">
												<h5 class="form-label">No. Of Employees Globally</h5>
												<div class="p-2 bg-light">
													<?= $application['id_255206'] ?? '' ?>
												</div>
												<small class="text-muted">(On payroll + On contract) as on March 31, 2025</small>
											</div>
										</div>
										<div class="col-xl-6 col-12">
											<div class="">
												<h5 class="form-label">Target Market Segment and Geographic Reach</h5>
												<div class="row">
													<div class="col-xl-6">
														<p class="mb-1">Domestic</p>
														<div class="p-2 bg-light">
															<?= $application['id_255204'] ?? '' ?>
														</div>
													</div>
													<div class="col-xl-6">
														<p class="mb-1">International</p>
														<div class="p-2 bg-light">
															<?= $application['id_255205'] ?? '' ?>
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-12">
											<div class="">
												<h5 class="form-label">Briefly describe what you export and your key value proposition in global markets</h5>
												<div class="p-2 bg-light" style="min-height: 100px">
													<?= $application['id_255202'] ?? '' ?>
												</div>
												<span class="form-text">(50 - 5000 characters)</span>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<h5 class="form-label">Core Products / Services Offered</h5>
												<div class="p-2 bg-light" style="min-height: 100px">
													<?= $application['id_255203'] ?? '' ?>
												</div>
												<span class="form-text">(50 - 5000 characters)</span>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<h5 class="form-label">Details of Cross-Border Collaborations/Partnerships established</h5>
												<div class="p-2 bg-light" style="min-height: 100px">
													<?= $application['id_255207'] ?? '' ?>
												</div>
												<span class="form-text">(50 - 5000 characters)</span>
											</div>
										</div>
										<div class="col-12">
											<div class="">
												<h5 class="form-label">Market Expansion in the Last 2 Years as on March 31, 2025</h5>
												<div class="p-2 bg-light" style="min-height: 100px">
													<?= $application['id_255208'] ?? '' ?>
												</div>
												<span class="form-text">(50 - 5000 characters)</span>
											</div>
										</div>
									</div>
									<small>Note: The shortlisted participants will have to submit the copy of the audited financials/Acknowledgement letter from a CA or chartered account firm for the past 2 years supporting the above selection</small>

								</fieldset>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Case Studies -->
	<div class="tab-pane fade" id="casestudy-tab-pane" role="tabpanel" aria-labelledby="casestudy-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4 g-lg-5">
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Innovation and Adaptability<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<p class="form-label">Describe an innovative solution, product, or service introduced to global markets that has significantly impacted your business. Highlight how it was adapted to meet the needs of diverse international audiences</p>
											<div class="p-2 bg-light" style="min-height: 100px">
												<?= $application['id_255301'] ?? '' ?>
											</div>
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
											<p class="form-label">Provide an overview of your business’s performance in global markets, including key achievements, market share growth, and any notable recognitions or awards. How has your organization impacted the industries you operate in?</p>
											<div class="p-2 bg-light" style="min-height: 100px">
												<?= $application['id_255302'] ?? '' ?>
											</div>
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
											<p class="form-label">Highlight the sustainability initiative or corporate social responsibility (CSR) program implemented by your organization that has had a measurable impact in the global markets you operate in</p>
											<div class="p-2 bg-light" style="min-height: 100px">
												<?= $application['id_255303'] ?? '' ?>
											</div>
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
											<p class="form-label">Outline your organization’s plans for future expansion and global growth. How are you leveraging technology, talent, and innovation to ensure scalability and readiness for emerging global challenges?</p>
											<div class="p-2 bg-light" style="min-height: 100px">
												<?= $application['id_255304'] ?? '' ?>
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
	<!-- Individual -->
	<div class="tab-pane fade" id="individual-tab-pane" role="tabpanel" aria-labelledby="individual-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4">
							<fieldset class="col-12">
								<legend class="card-title mb-0">
									<h5>Individual Category Preference & Entrepreneur Insight<sup class="text-danger">&ast;</sup></h5>
								</legend>
								<div class="row g-3">
									<div class="col-12">
										<p>I wish to additionally be considered for:</p>
									</div>
									<div class="col-xl-4">
										<?php switch ($application['id_255601']):
											case '1_INDIVIDUAL': ?>
												<div class="border rounded-1 p-2 p-lg-3">
													<h5 class="mb-2">Entrepreneur of the Year</h5>
													<small class="text-muted">
														I confirm that I am <strong>more than 35 years</strong> of age as on <strong>March 31, 2025</strong>, and my MSME is <strong>more than 2 years</strong> old.
													</small>
												</div>
												<?php break; ?>
											<?php
											case "2_INDIVIDUAL": ?>
												<div class="border rounded-1 p-2 p-lg-3">
													<h5 class="mb-2">Next Gen Entrepreneur</h5>
													<small class="text-muted">
														I confirm that I am <strong>up to 35 years</strong> of age as on <strong>March 31, 2025</strong>, and my MSME is <strong>more than 2 and less than 5 years</strong> old.
													</small>
												</div>
												<?php break; ?>
											<?php
											case "3_INDIVIDUAL": ?>
												<div class="border rounded-1 p-2 p-lg-3">
													<h5 class="mb-2">Woman Entrepreneur of the Year</h5>
													<small class="text-muted">
														I confirm that I am <strong>a woman entrepreneur</strong> and hold <strong>at least 33% equity stake</strong> in the organization
													</small>
												</div>
												<?php break; ?>

											<?php
											default: ?>
												<?php break; ?>
										<?php endswitch ?>
									</div>
								</div>
							</fieldset>
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Entrepreneur of the Year<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3 flex-row-reverse">

									<div class="col-12">
										<div class="">
											<h5 for="" class="form-label">Between April 01, 2023 and March 31, 2025, how have you personally embodied “Agility. Ambition. Ascent.” as an entrepreneur/innovator </h5>
											<div class="p-2 bg-light" style="min-height: 100px">
												<?= $application['id_255602'] ?? '' ?>
											</div>
											<span class="form-text">(50 - 5000 characters)</span>
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
												<p class="form-label">MSME Certificate</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255401']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Incorporation Certificate</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255402']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">IEC Copy</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255406']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Export performance certificates from EPCs, key international certification</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255407']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Collaterals to Support the Impact</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255404']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-lg-4 col-md-6 col-12">
											<div class="">
												<p class="form-label">Any other Collaterals</p>
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

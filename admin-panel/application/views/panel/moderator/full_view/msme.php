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
	<?php
	$address = json_decode($application['id_255001'], true);
	$equity = json_decode($application['id_255004'], true);
	?>
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
									<div class="col-xl-6 col-lg-6 col-12">
										<div class="">
											<p>Participating Entity (Organization Name)</p>
											<h5><?= $application['organization_name'] ?? '' ?></h5>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p>Business Segment</p>
											<h5><?= $application['id_255003'] ?? '' ?></h5>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p>Date of Company Incorporation</p>
											<h5><?= $application['id_255002'] ?? '' ?></h5>
										</div>
									</div>
									<div class="col-12">
										<div class="row g-3">
											<div class="col-12">
												<p>Registered Address Participating Entity</p>
												<h5><?= implode(', ', [$address['0'] ?? '', $address['1'] ?? '',  $address['2'] ?? '']) ?></h5>
												<h5><?= $application['organization_city'] ?? '' ?>, <?= $application['organization_state'] ?? ''?></h5>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-12">
										<div class="">
											<p>Type of Ownership</p>
											<h5><?= $application['id_255005'] ?? '' ?>
											<div id="other-text-input" style="display:none;">
												<input type="text" class="form-control mt-2" name="organization[ownership]" value="<?= $application['255005'] ?? '' ?>">
											</div>
											<script>
												$(document).ready(function() {

													const $select = $('#my-select');
													const $otherContainer = $('#other-text-input');
													const $otherInput = $('#other-text-input input');

													// 2. Listen for changes on the Select2 element
													$select.on('change', function() {
														const selectedValue = $select.val();
														console.log(selectedValue);


														if (selectedValue === 'Other') {
															$otherContainer.slideDown(200, function() {
																$otherInput.focus();
															});
															$otherInput.prop('required', true);

														} else {
															$otherContainer.slideUp(200);
															$otherInput.val(selectedValue);
															$otherInput.prop('required', false);
														}
													});
													$select.trigger('change');
												});
											</script>
										</div>
									</div>
									<div class="col-xxl-6 col-xl-8 col-12">
										<div class="">
											<p>Website URL</p>
											<input type="url" placeholder="https://www.domain.xyz" value="<?= $application['organization_url'] ?? '' ?>" name="organization[url]" class="form-control">
										</div>
									</div>
									<div class="col-12">
										<!-- EQUITY SPLIT -->
										<p>Equity Split Between Partners</p>
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
																<input type="text" class="form-control" name="partner[<?= $index ?>][name]" value="<?= $partner['name'] ?? '' ?>">
															</td>
															<td>
																<select name="partner[<?= $index ?>][gender]" class="form-select">
																	<option value="">Select Gender</option>
																	<option value="Male" <?= ($partner['gender'] ?? '') === 'Male' ? 'selected' : '' ?>>Male</option>
																	<option value="Female" <?= ($partner['gender'] ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
																	<option value="Other" <?= ($partner['gender'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
																</select>
															</td>
															<td>
																<input type="text" class="form-control" name="partner[<?= $index ?>][designation]" value="<?= $partner['designation'] ?? '' ?>">
															</td>
															<td>
																<input type="text" class="form-control" name="partner[<?= $index ?>][equity]" value="<?= $partner['equity'] ?? '' ?>">
															</td>
														</tr>
													<?php endforeach ?>
												<?php endif ?>
											</tbody>
										</table>
										<button type="button" class="btn btn-primary" id="addPartnerButton">Add Partner</button>
										<template id="partnerNode">
											<tr>
												<td>
													<input type="text" class="form-control" name="partner[__INDEX__][name]">
												</td>
												<td>
													<select name="partner[__INDEX__][gender]" class="form-select">
														<option value="">Select Gender</option>
														<option value="Male">Male</option>
														<option value="Female">Female</option>
														<option value="Other">Other</option>
													</select>
												</td>
												<td>
													<input type="text" class="form-control" name="partner[__INDEX__][designation]">
												</td>
												<td>
													<input type="text" class="form-control" name="partner[__INDEX__][equity]">
												</td>
											</tr>
										</template>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p>Name of the Applicant (MD/CEO/Founder or equivalent)</p>
											<input required type="text" name="name" value="<?= $application['name'] ?? '' ?>" class="form-control">
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p>Designation</p>
											<input required type="text" name="designation" value="<?= $application['designation'] ?? '' ?>" class="form-control">
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p>Date of Birth</p>
											<input required type="text" data-type="date" name="dob" value="<?= $application['id_255008'] ?? '' ?>" class="form-control">
											<span class="form-text">(in DD/MM/YYYY)</span>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<p>Gender</p>
											<select required name="gender" class="form-select">
												<option value="">Select Gender</option>
												<option value="Male" <?= ($application['id_255007'] ?? '') === 'Male' ? 'selected' : '' ?>>Male</option>
												<option value="Female" <?= ($application['id_255007'] ?? '') === 'Female' ? 'selected' : '' ?>>Female</option>
												<option value="Other" <?= ($application['id_255007'] ?? '') === 'Other' ? 'selected' : '' ?>>Other</option>
											</select>
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
													<p>Full Name of Individual</p>
													<input required name="contact_person[name]" value="<?= $application['id_255901'] ?? '' ?>" type="text" class="form-control">
												</div>
											</div>
											<div class="col-lg-6 col-12">
												<div class="">
													<p>Email Address</p>
													<input required name="contact_person[email]" value="<?= $application['id_255902'] ?? '' ?>" type="email" class="form-control">
												</div>
											</div>
											<div class="col-xl-3 col-lg-6 col-12">
												<div class="">
													<p>Contact Number</p>
													<input required name="contact_person[contact]" value="<?= $application['id_255903'] ?? '' ?>" minlength="10" maxlength="10" type="text" class="form-control">
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
	<div class="tab-pane fade" id="individual-tab-pane" role="tabpanel" aria-labelledby="individual-tab" tabindex="0"></div>
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

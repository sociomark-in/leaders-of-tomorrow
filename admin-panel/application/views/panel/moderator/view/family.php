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
									<div class="col-xl-6 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Participating Entity (Organization Name)</h5>
											<div class="p-2 bg-light">
												<?= $application['organization_name'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Industry Sector</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255000'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Business Segment</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255003'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
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
											<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
												<h5 class="form-label">State</h5>
												<div class="p-2 bg-light">
													<?= $application['organization_state'] ?? '' ?>
												</div>
											</div>
											<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
												<h5 class="form-label">City</h5>
												<div class="p-2 bg-light">
													<?= $application['organization_city'] ?? '' ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-12">
										<div class="">
											<h5 class="form-label">Type of Ownership</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255005'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-12">
										<div class="">
											<h5 class="form-label">Current Generation Leading Years</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255006'] ?? '' ?>
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
										<h5 class="form-label">Family Ownership Structure</h5>
										<table class="table table-bordered mb-2" id="equityTable">
											<thead>
												<tr>
													<th>Name</th>
													<th>Gender</th>
													<th>Relation to Founder</th>
													<th>Generation</th>
													<th>Designation</th>
													<th>Equity (%)</th>
												</tr>
											</thead>
											<tbody>
												<?php if (isset($equity) && is_array($equity)) : ?>
													<?php foreach ($equity as $index => $partner) : ?>
														<?php if ($partner['name'] != "") : ?>
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
																		<?= $partner['relation'] ?? '' ?>
																	</div>
																</td>
																<td>
																	<div class="p-2 bg-light">
																		<?= $partner['generation'] ?? '' ?>
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
														<?php endif ?>
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
											<span class="text-muted">(MD/CEO/Founder or equivalent)</span>
										</div>
									</div>
									<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Designation</h5>
											<div class="p-2 bg-light">
												<?= $application['designation'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Relation to Founder</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255010'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Date of Birth</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255008'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
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
									<div class="row g-3 mb-3">
										<div class="col-12">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th></th>
														<th>FY 2025 - 2024</th>
														<th>FY 2024 - 2023</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Annual Turnover (INR in Crores)</td>
														<td><?= $application['id_255101'] ?></td>
														<td><?= $application['id_255102'] ?></td>
													</tr>
													<tr>
														<td>EBITDA margin (In %)</td>
														<td><?= $application['id_255103'] ?></td>
														<td><?= $application['id_255104'] ?></td>
													</tr>
													<tr>
														<td>Net Profit Margin (In %)</td>
														<td><?= $application['id_255105'] ?></td>
														<td><?= $application['id_255106'] ?></td>
													</tr>
													<tr>
														<td>Revenue Growth %</td>
														<td><?= $application['id_255107'] ?></td>
														<td></td>
													</tr>
													<tr>
														<td>Debt-to-Equity Ratio (as on March 31, 2025)</td>
														<td><?= $application['id_255108'] ?></td>
														<td></td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
									<small>Note: The shortlisted participants will have to submit the copy of the audited financials/Acknowledgement letter from a CA or chartered account firm for the past 2 years supporting the above selection</small>
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
									<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">No. Of Employees</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255201'] ?? '' ?>
											</div>
											<small class="text-muted">(On payroll + On contract) as on March 31, 2025</small>
										</div>
									</div>
									<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Generational Status</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255204'] ?? '' ?>
											</div>
										</div>
									</div>

									<div class="col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">No. of family members actively involved</h5>
											<div class="p-2 bg-light">
												<?= $application['id_255205'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
										<div class="">
											<h5 class="form-label">Equity Spilt</h5>
											<div class="row g-3">
												<?php
												$investment = explode('-', $application['id_255206'] ?? "---");
												?>
												<div class="col-lg-auto col-12">
													<div class="p-2 bg-light">
														<?= $investment[0] ?? '' ?>&percnt;
													</div>
												</div>
												<div class="col-lg-auto col-12">
													<div class="p-2 bg-light">
														<?= $investment[1] ?? '' ?>&percnt;
													</div>
												</div>
												<div class="col-lg-auto col-12">
													<div class="p-2 bg-light">
														<?= $investment[2] ?? '' ?>&percnt;
													</div>
												</div>
											</div>
											<span class="text-muted">between family members and investors</span>
										</div>
									</div>
									<div class="col-12">
										<div class="row">
											<div class="col-12">
												<h5 class="form-label">Brief History of the Family Business</h5>
												<div class="p-2 bg-light" style="min-height: 100px">
													<?= $application['id_255202'] ?? '' ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<h5 class="form-label">Briefly describe how responsibilities are currently shared between generations (founder, second-generation, third generation, etc.) and key decision-making processes. </h5>
											<div class="p-2 bg-light" style="min-height: 100px">
												<?= $application['id_255203'] ?? '' ?>
											</div>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<h5 class="form-label">Highlight governance discipline in your family business (e.g., formal board, advisory board, family council, succession planning, documented policies, external professionals, auditors).</h5>
											<div class="p-2 bg-light" style="min-height: 100px">
												<?= $application['id_255207'] ?? '' ?>
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
	<div class="tab-pane fade" id="casestudy-tab-pane" role="tabpanel" aria-labelledby="casestudy-tab" tabindex="0">
		<div class="row mt-2">
			<div class="col-12 grid-margin stretch-card">
				<div class="card input-group-card">
					<div class="card-body">
						<div class="row g-4 g-lg-5">
							<fieldset class="col-12">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Innovation & Strategic Shifts in the Family Business<sup class="text-danger">&ast;</sup></h5>
									</legend>
									<!-- <p class="text-muted"></p> -->
								</div>
								<div class="row g-3 flex-row-reverse">
									<div class="col-12">
										<div class="">
											<h5 class="form-label">Describe the key innovations, changes, or strategic initiatives introduced by the current generation during this period</h5>
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
										<h5>Business Outcomes & Continuity of Legacy<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3 flex-row-reverse">
									<div class="col-12">
										<div class="">
											<h5 class="form-label">Explain the measurable impact of these initiatives </h5>
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
										<h5>Succession, Governance & Future-Ready Growth Plan<sup class="text-danger">&ast;</sup></h5>
									</legend>
								</div>
								<div class="row g-3 flex-row-reverse">
									<div class="col-12">
										<div class="">
											<h5 class="form-label">Describe how you are strengthening the business for the next decade.</h5>
											<div class="p-2 bg-light" style="min-height: 100px">
												<?= $application['id_255303'] ?? '' ?>
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
												<p>Company Incorporation Certificate/Business Registration/GST Certificate</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255402']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
											</div>
										</div>
										<div class="col-xl-4 col-lg-6">
											<div class="">
												<p>Collaterals to Support the Impact</p>
												<h5><a class="link-icon" href="<?= base_url($application['id_255403']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></h5>
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

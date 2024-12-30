<?php
$category_id = $application['category_id'];
$application_id = $application['nomination_id'] ?? null;
$utm = $utm;
?>
<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Application for <?= $category['name'] ?> <?= date('Y') ?></h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/my-applications') ?>">My Applications</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit Application</li>
			</ol>
		</nav>
	</div>
	<div class="row">
		<div class="col-xxl-9 col-12">
			<div class="row py-3">
				<div class="col-12 grid-margin stretch-card">
					<div class="card input-group-card">
						<div class="card-body">
							<div class="col-12 grid-margin stretch-card">
								<?= form_open_multipart('api/v2/awards/nomination/single/edit', ['id' => 'formFullView']) ?>
								<input type="hidden" name="category_id" value="<?= $category_id ?>">
								<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
								<input type="hidden" name="utm" value="<?= $utm ?>">
								<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
								<input type="hidden" name="stage" value="<?= $stage ?>">
								<div class="row">
									<div class="col-12">
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>Participating Entity<sup class="text-danger">&ast;</sup></h5>
											</legend>
											<div class="row g-3">
												<div class="col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">Name of the Participating Entity</label>
														<input required type="text" value="<?= $application['name'] ?>" name="organization[name]" class="form-control">
													</div>
												</div>
												<div class="col-xl-3 col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">Type of Business</label>
														<select required name="organization[type]" id="" class="form-select">
															<option value="">Select Option</option>
															<?php for ($i = 0; $i < 10; $i++) : ?>
																<option <?= ($application['id_75510'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
															<?php endfor ?>
														</select>
													</div>
												</div>
												<div class="col-xl-3 col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">Business Segment</label>
														<select required name="organization[segment]" id="" class="form-select">
															<option value="">Select Option</option>
															<?php for ($i = 0; $i < 10; $i++) : ?>
																<option <?= ($application['id_75505'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
															<?php endfor ?>
														</select>
													</div>
												</div>
												<div class="col-xl-4 col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">Date of Company Incorporation</label>
														<input required value="<?= $application['id_75507'] ?>" type="text" data-type="date" name="organization[inc_date]" class="form-control">
														<span class="form-text">(in DD/MM/YYYY)</span>
													</div>
												</div>
												<div class="col-xl-4 col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">No. Of Employees</label>
														<select required name="organization[size]" id="" class="form-select">
															<option value="">Select Option</option>
															<option <?= ($application['id_75501'] == "Less Than 50") ? "selected" : "" ?> value="Less Than 50">Less Than 50</option>
															<option <?= ($application['id_75501'] == "50 - 100") ? "selected" : "" ?> value="50 - 100">50 - 100</option>
															<option <?= ($application['id_75501'] == "100 - 200") ? "selected" : "" ?> value="100 - 200">100 - 200</option>
															<option <?= ($application['id_75501'] == "200 - 400") ? "selected" : "" ?> value="200 - 400">200 - 400</option>
															<option <?= ($application['id_75501'] == "More Than 400") ? "selected" : "" ?> value="More Than 400">More Than 400</option>
														</select>
														<span class="form-text">(On payroll + On contract)</span>
													</div>
												</div>
												<div class="col-xl-4 col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">Funding Source</label>
														<select required name="organization[funding]" id="" class="form-select">
															<option value="">Select Option</option>
															<option <?= ($application['id_75506'] == "Personal funds of the owner") ? "selected" : "" ?> value="Personal funds of the owner">Personal funds of the owner</option>
															<option <?= ($application['id_75506'] == "Business Loans") ? "selected" : "" ?> value="Business Loans">Business Loans</option>
															<option <?= ($application['id_75506'] == "Loan from family / friends") ? "selected" : "" ?> value="Loan from family / friends">Loan from family / friends</option>
															<option <?= ($application['id_75506'] == "Loan from Banks / NBFCs") ? "selected" : "" ?> value="Loan from Banks / NBFCs">Loan from Banks / NBFCs</option>
														</select>
													</div>
												</div>
												<div class="col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">Website URL</label>
														<input type="text" value="<?= $application['organization_url'] ?>" placeholder="https://www.domain.xyz" name="organization[website]" class="form-control">
													</div>
												</div>
												<div class="col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">LinkedIn URL</label>
														<input type="text" value="<?= $application['linkedin_url'] ?>" placeholder="https://www.domain.xyz" name="organization[linkedin]" class="form-control">
													</div>
												</div>
											</div>
										</fieldset>
									</div>
									<div class="col-12">
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>Contact Person of Organization<sup class="text-danger">&ast;</sup></h5>
											</legend>
											<div class="row g-3">
												<div class="col-xl-3 col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">Full Name of Individual</label>
														<input required value="<?= $application['id_75534'] ?>" name="contact_person[name]" type="text" class="form-control">
													</div>
												</div>
												<div class="col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">Email Address</label>
														<input required value="<?= $application['id_75535'] ?>" name="contact_person[email]" type="email" class="form-control">
													</div>
												</div>
												<div class="col-xl-3 col-lg-6 col-12">
													<div class="">
														<label for="" class="form-label">Contact Number</label>
														<input required value="<?= $application['id_75536'] ?>" name="contact_person[contact]" minlength="10" maxlength="13" type="text" class="form-control">
													</div>
												</div>
											</div>
										</fieldset>
									</div>

									<div class="col-12">
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>Financial Details<span class="text-danger">&ast;</span></h5>
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
																	<select required name="organization_revenue_23" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75510'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
																<td>
																	<select required name="organization_revenue_22" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75511'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
															</tr>
															<tr>
																<td>Revenue Growth (In %)</td>
																<td>
																	<select required name="organization_growth_23" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75512'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
																<td>
																	<select required name="organization_growth_22" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75513'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
															</tr>
															<tr>
																<td>Net Profit Margin (In %)</td>
																<td>
																	<select required name="organization_profit_23" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75514'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
																<td>
																	<select required name="organization_profit_22" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75515'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
															</tr>
															<tr>
																<td>Asset Valuation (in INR Crores)</td>
																<td>
																	<select required name="organization_assets_23" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75516'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
																<td>
																	<select required name="organization_assets_22" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75517'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
															</tr>
															<tr>
																<td>Debt: Equity Ratio</td>
																<td>
																	<select required name="organization_der_23" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75518'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
																<td>
																	<select required name="organization_der_22" id="" class="form-select">
																		<option value="">Select Option</option>
																		<?php for ($i = 0; $i < 10; $i++) : ?>
																			<option <?= ($application['id_75519'] == "Select " . $i) ? "selected" : "" ?> value="Select <?= $i ?>">Select <?= $i ?></option>
																		<?php endfor ?>
																	</select>
																</td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
										</fieldset>
									</div>
									<div class="col-12">
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>Organization Overview<span class="text-danger">&ast;</span></h5>
											</legend>
											<div class="row g-3">
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Industry segment of the participating entity</label>
														<input type="text" value="<?= $application['id_75502'] ?>" name="organization[industry]" class="form-control">
													</div>
												</div>
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Brief Overview of the Company</label>
														<textarea name="organization[overview]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75503'] ?></textarea>
													</div>
												</div>
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Mission & Vision</label>
														<textarea name="organization[mission_stmt]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75508'] ?></textarea>
													</div>
												</div>
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Products / Services Offered</label>
														<textarea name="organization[services_stmt]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75509'] ?></textarea>
													</div>
												</div>
											</div>
										</fieldset>
									</div>

									<div class="col-12">
										<fieldset class="mb-3">
											<div class="mb-3">
												<legend class="card-title mb-0">
													<h5>Initiative / Product / Service<span class="text-danger">&ast;</span></h5>
												</legend>
												<p>(The initiative or innovation can be a new product/ solution development, digitization, technical innovation, process improvement, entering new market, etc.)</p>
											</div>
											<div class="row g-3">
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Name of the initiative or product/service offering</label>
														<input type="text" value="<?= $application['id_75520'] ?>" name="initiative[name]" class="form-control">
													</div>
												</div>
												<div class="col-xl-3 col-12">
													<div class="">
														<label for="" class="form-label">Start Date</label>
														<input type="text" value="<?= $application['id_75521'] ?>" data-type="date" name="initiative[start_date]" class="form-control">
														<span class="form-text">(in DD/MM/YYYY)</span>
													</div>
												</div>
												<div class="col-xl-3 col-12">
													<div class="">
														<label for="" class="form-label">End Date</label>
														<input type="text" value="<?= $application['id_75522'] ?>" data-type="date" name="initiative[end_date]" class="form-control">
														<span class="form-text">(in DD/MM/YYYY)</span>
													</div>
												</div>
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Describe the initiative/product/service that you organization has developed between the period of April 01, 2022, to March 31, 2023 that has led to business success. What was the problem that you aimed to address through the initiative/product/service? (Max 200 words)</label>
														<textarea name="initiative[description]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75523'] ?></textarea>
													</div>
												</div>
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Highlight the challenges faced by you as an MSME to implement the initiative or product/service offering mentioned above and how did the organization overcome these challenges? (Max 150 words)</label>
														<textarea name="initiative[challenges]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75524'] ?></textarea>
													</div>
												</div>
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Elaborate on your go-market-strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors. (Max 150 words)</label>
														<textarea name="initiative[strategy]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75525'] ?></textarea>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
									<div class="col-12">
										<fieldset class="mb-3">
											<div class="mb-3">
												<legend class="card-title mb-0">
													<h5>Use of Technology<span class="text-danger">&ast;</span></h5>
												</legend>
											</div>
											<div class="row g-3">
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">How have you leveraged technology while implementing the initiative/product/service? (Max 200 words)</label>
														<textarea name="initiative[technology]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75526'] ?></textarea>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
									<div class="col-12">
										<fieldset class="mb-3">
											<div class="mb-3">
												<legend class="card-title mb-0">
													<h5>Impact of the innovation/ initiative<span class="text-danger">&ast;</span></h5>
												</legend>
											</div>
											<div class="row g-3">
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Elaborate on the impact created by the initiative/product/service on your various stakeholders such as customers, employees, industry, etc.
															(Details should be measurable and generic statements should be avoided) (Max 200 words)
														</label>
														<textarea name="initiative[impact]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75527'] ?></textarea>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
									<div class="col-12">
										<fieldset class="mb-3">
											<div class="mb-3">
												<legend class="card-title mb-0">
													<h5>Sustainability & Scalability<span class="text-danger">&ast;</span></h5>
												</legend>
											</div>
											<div class="row g-3">
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Elaborate on the sustainability and / or scalability of the initiative/product/service offering mentioned above. Highlight the following parameters (max 200 words)
															Growth plan for next 2-3 years
															Growth plan for the initiative or product/ service offering
															Plan for raising funds in future
															Any other
														</label>
														<textarea name="initiative[scalability]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75528'] ?></textarea>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
									<div class="col-12">
										<fieldset class="mb-3">
											<div class="mb-3">
												<legend class="card-title mb-0">
													<h5>Additional Information<span class="text-danger">&ast;</span></h5>
												</legend>
											</div>
											<div class="row g-3">
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Is there any other information you would like to provide to support and strengthen your application? For example: Awards, recognitions, etc.</label>
														<textarea name="initiative[additional]" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_75529'] ?></textarea>
													</div>
												</div>
											</div>
										</fieldset>
									</div>

									<div class="col-12">
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>Upload Files<span class="text-danger">&ast;</span></h5>
											</legend>
											<div class="row g-3 mb-3">
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">MSME certificate&nbsp;<a class="link-icon" href="<?= base_url($application['id_75530']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
														<input type="file" accept="application/pdf" name="doc1" class="dropify" data-default-file="<?= $application['id_75530'] ?>" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
														<span class="form-text">Documents received from Ministry of MSME, Govt. of India</span>
													</div>
												</div>
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Company Incorporation Certificate&nbsp;<a class="link-icon" href="<?= base_url($application['id_75530']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
														<input type="file" accept="application/pdf" name="doc2" class="dropify" data-default-file="<?= $application['id_75531'] ?>" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
													</div>
												</div>
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Impact assessment report&nbsp;<a class="link-icon" href="<?= base_url($application['id_75530']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
														<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="<?= $application['id_75532'] ?>" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
														<span class="form-text">as on March 31, 2023</span>
													</div>
												</div>
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Any other Collaterals&nbsp;<a class="link-icon" href="<?= base_url($application['id_75530']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
														<input type="file" accept="application/pdf" name="doc4" class="dropify" data-default-file="<?= $application['id_75533'] ?>" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
														<span class="form-text">(Awards / Articles / Certificates, etc.) in a Single PDF</span>
													</div>
												</div>
											</div>
											<div class="d-none">
												<div class="bg-light p-3">
													<h5>Instructions<span class="text-danger">&ast;</span></h5>
													<ul class="">
														<li>Open the PDF Properties and check for PDF version < version 5 (1.4)</li>
														<li>Open the unsupported PDF file with Chrome</li>
														<li>Right Click and Print</li>
														<li>Change destination as [Save as PDF]</li>
														<li>This exported PDF file is compatible to upload.</li>
													</ul>
												</div>
											</div>
											<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
											<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
											<link rel="stylesheet" href="<?= base_url("assets/css/") ?>dropify-custom.min.css">
											<script>
												$('.dropify').dropify({
													error: {
														'fileSize': 'The file size is too big ({{ value }} max).',
														'minWidth': 'The image width is too small ({{ value }}}px min).',
														'maxWidth': 'The image width is too big ({{ value }}}px max).',
														'minHeight': 'The image height is too small ({{ value }}}px min).',
														'maxHeight': 'The image height is too big ({{ value }}px max).',
														'imageFormat': 'The image format is not allowed ({{ value }} only).'
													}
												});
											</script>
										</fieldset>
									</div>
									<div class="col-12">
										<div class="row">
											<div class="col-md-auto">
												<button type="submit" class="btn btn-primary">Edit and Resubmit</button>
											</div>
										</div>
									</div>
								</div>
								<?= form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3">
			<div class="">
				<div class="">
					<h5 class="card-title mb-3">All Comments</h5>
					<?php foreach ($comments as $key => $comment) : ?>
						<div class="mb-3 p-3 card-comment">
							<blockquote class="blockquote">
								<p class="mb-4"><?= $comment['comment'] ?></p>
								<footer class="blockquote-footer">
									<?= $comment['created_by']['name'] ?>,&nbsp;(<cite title="Source Title"><?= ucfirst($comment['created_at']) ?></cite>)</footer>
							</blockquote>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</main>

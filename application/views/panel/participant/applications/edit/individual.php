<main class="page-content">
	<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
		<div>
			<h4 class="mb-3 mb-md-0">Application for <?= $category['name'] ?> <?= date('Y') ?></h4>
		</div>
		<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url('dashboard/my-applications') ?>">My Applications</a></li>
				<li class="breadcrumb-item active" aria-current="page">Edit</li>
			</ol>
		</nav>
	</div>

	<div class="row">
		<div class="col-xxl-9 col-12">
			<div class="staged-tab-wizard">
				<div class="row g-3">
					<div class="col-12 grid-margin stretch-card">
						<?php
						$category_id = $category['code'];
						$application_id = $application['nomination_id'] ?? null;
						$utm = $utm;
						$agent_id = $this->input->get('agent_id');
						$stage = $this->input->get('stage');
						?>
						<?= form_open_multipart('api/v2/awards/nomination/single/edit', ['id' => 'formFullView']) ?>

						<input type="hidden" name="category_id" value="<?= $category_id ?>">
						<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
						<input type="hidden" name="utm" value="<?= $utm ?>">
						<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
						<input type="hidden" name="stage" value="4">
						<div class="row">
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<fieldset class="mb-3" disabled="">
											<legend class="card-title mb-0">
												<h5>Personal Information</h5>
											</legend>
											<div class="row g-3">
												<div class="col-12">
													<div class="">
														<p>Full Name of the Individual</p>
														<h5>Sociomark Digital Marketing Agency</h5>
													</div>
												</div>
												<div class="col-xl-4 col-lg-6">
													<div class="">
														<p>Designation</p>
														<h5>Sociomark Digital Marketing Agency</h5>
													</div>
												</div>
												<div class="col-xl-4 col-lg-6">
													<div class="">
														<p>Date of Birth</p>
														<h5>13/07/2001</h5>
													</div>
												</div>
												<div class="col-xl-4 col-lg-6">
													<div class="">
														<p>Total Months of Experience</p>
														<h5>Sociomark Segment</h5>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<fieldset class="mb-3" disabled="">
											<legend class="card-title mb-0">
												<h5>Current Organization</h5>
											</legend>
											<div class="row g-3">
												<div class="col-xl-4 col-lg-6">
													<div class="">
														<p>Name of the Current Organization</p>
														<h5>50</h5>
													</div>
												</div>
												<div class="col-xl-4 col-lg-6">
													<div class="">
														<p>Type of Business</p>
														<h5>Personal funds of the owner</h5>
													</div>
												</div>
												<div class="col-xl-4 col-lg-6">
													<div class="">
														<p>Years of Experience</p>
														<h5>Personal funds of the owner</h5>
													</div>
												</div>
												<div class="col-xl-4 col-lg-6">
													<div class="">
														<p>Business Segment</p>
														<h5>Personal funds of the owner</h5>
													</div>
												</div>
												<div class="col-xl-3 col-lg-6">
													<div class="">
														<p>Company Incorporation</p>
														<h5>Personal funds of the owner</h5>
													</div>
												</div>
												<div class="col-xl-3 col-lg-6">
													<div class="">
														<p>No of Employees</p>
														<h5>Personal funds of the owner</h5>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="">
														<p>Website URL</p>
														<h5>https://sociomark.in</h5>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="">
														<p>LinkedIn URL</p>
														<h5>https://cdnjs.com/libraries/Dropify34LinkedIn</h5>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<fieldset class="mb-3" disabled="">
											<legend class="card-title mb-0">
												<h5>Contact Person of Organization</h5>
											</legend>
											<div class="row g-3">
												<div class="col-xl-3 col-lg-6">
													<div class="">
														<p>Full Name</p>
														<h5>Hemant Karekar</h5>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="">
														<p>Email Address</p>
														<h5>hemant@sociomark.in</h5>
													</div>
												</div>
												<div class="col-xl-3 col-lg-6">
													<div class="">
														<p>Contact Number</p>
														<h5>08689862375</h5>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>Organization Overview</h5>
											</legend>
											<div class="row g-3">
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Brief Overview of the Company</label>
														<textarea name="overview" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74509'] ?></textarea>
													</div>
												</div>
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Mission & Vision</label>
														<textarea name="mission_stmt" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74510'] ?></textarea>
													</div>
												</div>
												<div class="col-xl-6 col-12">
													<div class="">
														<label for="" class="form-label">Products / Services Offered</label>
														<textarea name="services_stmt" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74511'] ?></textarea>
													</div>
												</div>
											</div>
										</fieldset>
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>Financial Details</h5>
											</legend>
											<div class="row g-3">
												<div class="col-xxl-4 col-12">

												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													FY 2023
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													FY 2022
												</div>
												<div class="col-xxl-4 col-12">
													Revenue/ Turnover (in INR Crores)
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<select disabled name="turnover_24" id="" class="form-select">
														<option value="">Select Option</option>
														<?php for ($i = 0; $i < 10; $i++) : ?>
															<option value="Select <?= $i ?>">Select <?= $i ?></option>
														<?php endfor ?>
													</select>
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<select disabled name="turnover_23" id="" class="form-select">
														<option value="">Select Option</option>
														<?php for ($i = 0; $i < 10; $i++) : ?>
															<option value="Select <?= $i ?>">Select <?= $i ?></option>
														<?php endfor ?>
													</select>
												</div>
												<div class="col-xxl-4 col-12">
													Revenue Growth (In %)
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<select disabled name="growth_24" id="" class="form-select">
														<option value="">Select Option</option>
														<?php for ($i = 0; $i < 10; $i++) : ?>
															<option value="Select <?= $i ?>">Select <?= $i ?></option>
														<?php endfor ?>
													</select>
												</div>
												<div class="col-xxl-4 col-lg-6 col-12">
													<select disabled name="growth_23" id="" class="form-select">
														<option value="">Select Option</option>
														<?php for ($i = 0; $i < 10; $i++) : ?>
															<option value="Select <?= $i ?>">Select <?= $i ?></option>
														<?php endfor ?>
													</select>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>Case Studies (Part 1 / 2)</h5>
											</legend>
											<div class="row g-3">
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Describe your journey as an entrepreneur. What was your inspiration behind setting up your organization? (Max 150 words)</label>
														<textarea name="overview" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74516'] ?></textarea>
													</div>
												</div>
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Highlight the key initiatives taken by you within the organization in the past 2 years which led to business growth and success (Max 150 words)</label>
														<textarea name="mission_stmt" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74517'] ?></textarea>
													</div>
												</div>
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Elaborate on the impact of these initiatives on the various stakeholders of your organization such as customers, employees, MSME industry, etc. (Max 150 words)</label>
														<textarea name="services_stmt" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74518'] ?></textarea>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>
													<h5>Case Studies (Part 2 / 2)</h5>
												</h5>
											</legend>
											<div class="row g-3">
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Highlight the key milestones achieved by you as an entrepreneur during your journey. What are you key differentiating factors from your competitors? (Max 150 words)</label>
														<textarea name="services_stmt" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74519'] ?></textarea>
													</div>
												</div>
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">
															How do you plan to scale up your business in the next 2 years. Highlight the following parameters (max 200 words)
															Growth plan for next 2-3 years
															Project/Initiative/Solutions you aim to introduce in the future for business growth
															Plan for raising funds in future
															Any other

														</label>
														<textarea name="services_stmt" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74520'] ?></textarea>
													</div>
												</div>
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">How do you envision contributing to the growth of the MSME sector in the coming years? (Max 150 words)</label>
														<textarea name="services_stmt" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74521'] ?></textarea>
													</div>
												</div>
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Why should you win the Award in this category? (Max 50 words)</label>
														<textarea name="services_stmt" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74522'] ?></textarea>
													</div>
												</div>
												<div class="col-12">
													<div class="">
														<label for="" class="form-label">Is there any other information you would like to provide to support and strengthen your application? For example: Awards, recognitions, etc. (Max 100 words)</label>
														<textarea name="services_stmt" id="" class="form-control" maxlength="500" rows="5"><?= $application['id_74523'] ?></textarea>
													</div>
												</div>
											</div>
										</fieldset>
									</div>
								</div>
							</div>
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<fieldset class="mb-3">
											<legend class="card-title mb-0">
												<h5>Upload Files</h5>
											</legend>
											<div class="row g-3 mb-3">
												<div class="col-xl-3 col-lg-4 col-md-6 col-12">
													<div class="">
														<label for="" class="form-label">MSME certificate</label>
														<input type="file" accept="application/pdf" name="doc1" class="dropify" data-default-file="<?= $application['id_74525'] ?> data-max-file-size=" 250K" data-allowed-file-extensions="pdf" />
														<span class="form-text">document supporting received from Ministry of MSME, Govt. of India</span>
													</div>
												</div>
												<div class="col-xl-3 col-lg-4 col-md-6 col-12">
													<div class="">
														<label for="" class="form-label">Company Incorporation Certificate</label>
														<input type="file" accept="application/pdf" name="doc2" class="dropify" data-default-file="<?= $application['id_74525'] ?> data-max-file-size=" 250K" data-allowed-file-extensions="pdf" />
													</div>
												</div>
												<div class="col-xl-3 col-lg-4 col-md-6 col-12">
													<div class="">
														<label for="" class="form-label">Work Experience Letter</label>
														<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="<?= $application['id_74525'] ?> data-max-file-size=" 250K" data-allowed-file-extensions="pdf" />
														<span class="form-text">as on March 31, 2023</span>
													</div>
												</div>
												<div class="col-xl-3 col-lg-4 col-md-6 col-12">
													<div class="">
														<label for="" class="form-label">Any other Collaterals</label>
														<input type="file" accept="application/pdf" name="doc4" class="dropify" data-default-file="<?= $application['id_74525'] ?> data-max-file-size=" 250K" data-allowed-file-extensions="pdf" />
														<span class="form-text">(Awards / Articles / Certificates, etc.) in a Single PDF</span>
													</div>
												</div>
											</div>
											<div class="">
												<div class="bg-light p-3">
													<h5>Instructions</h5>
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
								</div>
							</div>
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<div class="row g-3">
											<div class="col-md-auto">
												<button type="reset" class="btn btn-outline-secondary">Reset Form</button>
											</div>
											<div class="col-md-auto">
												<button type="submit" class="btn btn-primary">Lock and Submit</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?= form_close() ?>
					</div>
					<script>
						$("#formFullView").validate({
							ignore: [
								":hidden", ":focus"
							],
							rules: {
								//Rules
							},
							messages: {
								//messages
							}
						});
					</script>
				</div>
			</div>
		</div>
		<div class="col-xl-3">
			<div class="">
				<h5 class="card-title mb-3">All Comments</h5>
				<?php foreach ($comments as $key => $comment) : ?>
					<div class="mb-3 p-3 bg-light">
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
</main>

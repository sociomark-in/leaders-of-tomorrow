<div class="staged-tab-wizard">
	<div class="row g-3">
		<div class="col-xl-9 col-12 grid-margin stretch-card">
			<?php
			$category_id = $category['code'];
			$application_id = $application['id'] ?? null;
			$utm = $utm;
			$agent_id = $this->input->get('agent_id');
			$stage = $this->input->get('stage');
			?>
			<?= form_open_multipart('api/v2/awards/nomination/single/edit', ['id' => 'formFullView']) ?>
			<input type="hidden" name="category_id" value="<?= $category_id ?>">
			<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
			<input type="hidden" name="utm" value="<?= $utm ?>">
			<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
			<input type="hidden" name="stage" value="<?= $stage ?>">
			<div class="row">
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<fieldset class="mb-3">
								<legend class="card-title mb-0">
									<h5>Participating Entity</h5>
								</legend>
								<div class="row g-3">
									<div class="col-xl-5 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Name of the Participating Entity</label>
											<input type="text" name="organization[name]" class="form-control">
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Type of Business</label>
											<select name="organization[type]" id="" class="form-select">
												<option value="">Select Option</option>
												<?php for ($i = 0; $i < 10; $i++) : ?>
													<option value="Select <?= $i ?>">Select <?= $i ?></option>
												<?php endfor ?>
											</select>
										</div>
									</div>
									<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Business Segment</label>
											<select name="organization[segment]" id="" class="form-select">
												<option value="">Select Option</option>
												<?php for ($i = 0; $i < 10; $i++) : ?>
													<option value="Select <?= $i ?>">Select <?= $i ?></option>
												<?php endfor ?>
											</select>
										</div>
									</div>
									<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Date of Company Incorporation</label>
											<input required type="text" data-type="date" name="organization[inc_date]" class="form-control">
											<span class="form-text">(in DD/MM/YYYY)</span>
										</div>
									</div>
									<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">No. Of Employees</label>
											<select required name="organization[size]" id="" class="form-select">
												<option value="">Select Option</option>
												<option value="Less Than 50">Less Than 50</option>
												<option value="50 - 100">50 - 100</option>
												<option value="100 - 200">100 - 200</option>
												<option value="200 - 400">200 - 400</option>
												<option value="More Than 400">More Than 400</option>
											</select>
											<span class="form-text">(On payroll + On contract)</span>
										</div>
									</div>
									<div class="col-xxl-2 col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Funding Source</label>
											<select required name="organization[funding]" id="" class="form-select">
												<option value="">Select Option</option>
												<option value="Personal funds of the owner">Personal funds of the owner</option>
												<option value="Business Loans">Business Loans</option>
												<option value="Loan from family / friends">Loan from family / friends</option>
												<option value="Loan from Banks / NBFCs">Loan from Banks / NBFCs</option>
											</select>
										</div>
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Website URL</label>
											<input type="text" name="organization[website]" class="form-control">
										</div>
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">LinkedIn URL</label>
											<input type="text" name="organization[linkedin]" class="form-control">
										</div>
									</div>
								</div>
							</fieldset>
							<fieldset class="mb-3">
								<legend class="card-title mb-0">
									<h5>Contact Person of Organization</h5>
								</legend>
								<div class="row g-3">
									<div class="col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Full Name of Individual</label>
											<input name="contact_person[name]" type="text" class="form-control">
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Email Address</label>
											<input name="contact_person[email]" type="text" class="form-control">
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Contact Number</label>
											<input name="contact_person[contact]" type="text" class="form-control">
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<fieldset class="mb-3">
								<legend class="card-title mb-0">
									<h5>Organization Overview</h5>
								</legend>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Industry segment of the participating entity</label>
											<input type="text" name="organization[industry]" class="form-control">
										</div>
									</div>
									<div class="col-xl-6 col-12">
										<div class="">
											<label for="" class="form-label">Brief Overview of the Company</label>
											<textarea required name="organization[overview]" id="" class="form-control" maxlength="500" rows="5"></textarea>
										</div>
									</div>
									<div class="col-xl-6 col-12">
										<div class="">
											<label for="" class="form-label">Mission & Vision</label>
											<textarea required name="organization[mission_stmt]" id="" class="form-control" maxlength="500" rows="5"></textarea>
										</div>
									</div>
									<div class="col-xl-6 col-12">
										<div class="">
											<label for="" class="form-label">Products / Services Offered</label>
											<textarea required name="organization[services_stmt]" id="" class="form-control" maxlength="500" rows="5"></textarea>
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
										<select required name="finance[turnover_24]" id="" class="form-select">
											<option value="">Select Option</option>
											<?php for ($i = 0; $i < 10; $i++) : ?>
												<option value="Select <?= $i ?>">Select <?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="finance[turnover_23]" id="" class="form-select">
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
										<select required name="finance[growth_24]" id="" class="form-select">
											<option value="">Select Option</option>
											<?php for ($i = 0; $i < 10; $i++) : ?>
												<option value="Select <?= $i ?>">Select <?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="finance[growth_23]" id="" class="form-select">
											<option value="">Select Option</option>
											<?php for ($i = 0; $i < 10; $i++) : ?>
												<option value="Select <?= $i ?>">Select <?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
									<div class="col-xxl-4 col-12">
										Net Profit Margin (In %)
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="finance[margin_24]" id="" class="form-select">
											<option value="">Select Option</option>
											<?php for ($i = 0; $i < 10; $i++) : ?>
												<option value="Select <?= $i ?>">Select <?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="finance[margin_23]" id="" class="form-select">
											<option value="">Select Option</option>
											<?php for ($i = 0; $i < 10; $i++) : ?>
												<option value="Select <?= $i ?>">Select <?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
									<div class="col-xxl-4 col-12">
										Asset Valuation (in INR Crores)
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="finance[valuation_24]" id="" class="form-select">
											<option value="">Select Option</option>
											<?php for ($i = 0; $i < 10; $i++) : ?>
												<option value="Select <?= $i ?>">Select <?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="finance[valuation_23]" id="" class="form-select">
											<option value="">Select Option</option>
											<?php for ($i = 0; $i < 10; $i++) : ?>
												<option value="Select <?= $i ?>">Select <?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
									<div class="col-xxl-4 col-12">
										Debt: Equity Ratio
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="finance[der_24]" id="" class="form-select">
											<option value="">Select Option</option>
											<?php for ($i = 0; $i < 10; $i++) : ?>
												<option value="Select <?= $i ?>">Select <?= $i ?></option>
											<?php endfor ?>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="finance[der_24]" id="" class="form-select">
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
					<div class="card">
						<div class="card-body">
							<fieldset class="mb-3">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Initiative / Product / Service</h5>
									</legend>
									<p>(The initiative or innovation can be a new product/ solution development, digitization, technical innovation, process improvement, entering new market, etc.)</p>
								</div>
								<div class="row g-3">
									<div class="col-xl-6 col-12">
										<div class="">
											<label for="" class="form-label">Name of the initiative or product/service offering</label>
											<input type="text" name="initiative[name]" class="form-control">
										</div>
									</div>
									<div class="col-xl-3 col-12">
										<div class="">
											<label for="" class="form-label">Start Date</label>
											<input required type="text" data-type="date" name="initiative[start_date]" class="form-control">
											<span class="form-text">(in DD/MM/YYYY)</span>
										</div>
									</div>
									<div class="col-xl-3 col-12">
										<div class="">
											<label for="" class="form-label">End Date</label>
											<input required type="text" data-type="date" name="initiative[end_date]" class="form-control">
											<span class="form-text">(in DD/MM/YYYY)</span>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Describe the initiative/product/service that you organization has developed between the period of April 01, 2022, to March 31, 2023 that has led to business success. What was the problem that you aimed to address through the initiative/product/service? (Max 200 words)</label>
											<textarea required name="initiative[description]" id="" class="form-control" maxlength="500" rows="5"></textarea>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Highlight the challenges faced by you as an MSME to implement the initiative or product/service offering mentioned above and how did the organization overcome these challenges? (Max 150 words)</label>
											<textarea required name="initiative[challenges]" id="" class="form-control" maxlength="500" rows="5"></textarea>
										</div>
									</div>
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Elaborate on your go-market-strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors. (Max 150 words)</label>
											<textarea required name="initiative[strategy]" id="" class="form-control" maxlength="500" rows="5"></textarea>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<fieldset class="mb-3">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Use of Technology</h5>
									</legend>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad fugit, rerum nobis suscipit itaque ullam similique cupiditate? Molestias voluptatum repellendus a hic? Quo aut voluptatem molestias illo, iure accusamus cupiditate!</p>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">How have you leveraged technology while implementing the initiative/product/service? (Max 200 words)</label>
											<textarea required name="initiative[technology]" id="" class="form-control" maxlength="500" rows="5"></textarea>
										</div>
									</div>
								</div>
							</fieldset>

							<fieldset class="mb-3">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Impact of the innovation/ initiative</h5>
									</legend>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad fugit, rerum nobis suscipit itaque ullam similique cupiditate? Molestias voluptatum repellendus a hic? Quo aut voluptatem molestias illo, iure accusamus cupiditate!</p>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Elaborate on the impact created by the initiative/product/service on your various stakeholders such as customers, employees, industry, etc.
												(Details should be measurable and generic statements should be avoided) (Max 200 words)
											</label>
											<textarea required name="initiative[impact]" id="" class="form-control" maxlength="500" rows="5"></textarea>
										</div>
									</div>
								</div>
							</fieldset>

							<fieldset class="mb-3">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Sustainability & Scalability</h5>
									</legend>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad fugit, rerum nobis suscipit itaque ullam similique cupiditate? Molestias voluptatum repellendus a hic? Quo aut voluptatem molestias illo, iure accusamus cupiditate!</p>
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
											<textarea required name="initiative[scalalbility]" id="" class="form-control" maxlength="500" rows="5"></textarea>
										</div>
									</div>
								</div>
							</fieldset>

							<fieldset class="mb-3">
								<div class="mb-3">
									<legend class="card-title mb-0">
										<h5>Additional Information</h5>
									</legend>
									<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad fugit, rerum nobis suscipit itaque ullam similique cupiditate? Molestias voluptatum repellendus a hic? Quo aut voluptatem molestias illo, iure accusamus cupiditate!</p>
								</div>
								<div class="row g-3">
									<div class="col-12">
										<div class="">
											<label for="" class="form-label">Is there any other information you would like to provide to support and strengthen your application? For example: Awards, recognitions, etc.</label>
											<textarea required name="initiative[additional]" id="" class="form-control" maxlength="500" rows="5"></textarea>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</div>
				<div class="col-12 grid-margin stretch-card">
					<div class="card">
						<div class="card-body">
							<fieldset class="mb-3">
								<legend class="card-title mb-0">
									<h5>Upload Files</h5>
								</legend>
								<div class="row g-3 mb-3">
									<div class="col-xl-3 col-lg-4 col-md-6 col-12">
										<div class="">
											<label for="" class="form-label">MSME certificate</label>
											<input type="file" accept="application/pdf" name="doc1" class="dropify" data-default-file="" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
											<span class="form-text">document supporting received from Ministry of MSME, Govt. of India</span>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-12">
										<div class="">
											<label for="" class="form-label">Company Incorporation Certificate</label>
											<input type="file" accept="application/pdf" name="doc2" class="dropify" data-default-file="" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-12">
										<div class="">
											<label for="" class="form-label">Impact assessment report</label>
											<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
											<span class="form-text">as on March 31, 2023</span>
										</div>
									</div>
									<div class="col-xl-3 col-lg-4 col-md-6 col-12">
										<div class="">
											<label for="" class="form-label">Any other Collaterals</label>
											<input type="file" accept="application/pdf" name="doc4" class="dropify" data-default-file="" data-max-file-size="250K" data-allowed-file-extensions="pdf" />
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
					<div class="card">
						<div class="card-body">
							<div class="row g-3">
								<div class="col-md-auto">
									<button type="reset" class="btn btn-outline-secondary">Reset Form</button>
								</div>
								<div class="col-md-auto">
									<button type="submit" class="btn btn-primary">Save and Submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?= form_close() ?>
		</div>
		<div class="col-xl-3">
			Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam libero ea aperiam quibusdam fugit recusandae, illo quia mollitia velit impedit quas omnis dignissimos quisquam porro totam numquam natus quos magnam et nobis. Assumenda ipsam reprehenderit exercitationem, quia sit tempora vero laborum velit rem, totam ex molestias, expedita iste possimus minus eius ad asperiores? Velit odit sapiente earum dolorem aliquid adipisci ad maiores dolorum minima aperiam, non cupiditate eligendi corporis est animi consectetur, ratione voluptatem magni, dolore quia nisi possimus quod. Ullam error accusantium perspiciatis beatae excepturi! Necessitatibus voluptatibus accusamus debitis nobis consectetur, perspiciatis dignissimos tempora eligendi quo in maxime quam.
		</div>
	</div>
</div>

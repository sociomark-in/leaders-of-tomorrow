<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script> -->

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>

<?= form_open_multipart('api/v2/awards/presentation/new', ['id' => "form_option"]) ?>
<input type="hidden" name="nomination_id" value="<?= $application['nomination_id'] ?>">
<input type="hidden" name="presentation_id" value="<?= $presentation_id ?>">
<div class="row py-3">
	<div class="col-12 grid-margin stretch-card">
		<div class="card input-group-card">
			<div class="card-body">
				<fieldset class="">
					<legend class="card-title mb-0">
						<h5>Basic Details<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="row g-2 g-md-3">
						<div class="col-xl-3 col-lg-4 col-12">
							<div class="col-12">
								<div class="">
									<label for="" class="form-label">Logo of the Incorporation</label>
									<input type="file" accept="image/*" name="logoimg" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
									<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-8 col-12">
							<div class="row g-2 g-md-3">
								<div class="col-12">
									<div class="">
										<label for="" class="form-label">Name of the Participating Entity (Organization Name)</label>
										<input required type="text" name="organization[name]" class="form-control">
									</div>
								</div>
								<div class="col-xl-8 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Name of the Presenter</label>
										<input required type="text" name="name" class="form-control">
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Designation</label>
										<input required type="text" name="designation" class="form-control">
									</div>
								</div>
								<div class="col-xl-4 col-12">
									<div class="">
										<label for="" class="form-label">Type of Business</label>
										<select required name="organization[business]" id="" class="form-select">
											<option value="">Select Business Type</option>
											<option value="Manufacturing">Manufacturing</option>
											<option value="Service">Service</option>
										</select>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">No. Of Employees</label>
										<select required name="organization[size]" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255201'] == "Less than 50") ? "selected" : "" ?> value="Less than 50">Less than 50</option>
											<option <?= ($application['id_255201'] == "50 - 100") ? "selected" : "" ?> value="50 - 100">50 - 100</option>
											<option <?= ($application['id_255201'] == "100 - 200") ? "selected" : "" ?> value="100 - 200">100 - 200</option>
											<option <?= ($application['id_255201'] == "200 - 400") ? "selected" : "" ?> value="200 - 400">200 - 400</option>
											<option <?= ($application['id_255201'] == "More than 400") ? "selected" : "" ?> value="More than 400">More than 400</option>
										</select>
										<span class="form-text">(On payroll + On contract) as on March 31, 2024</span>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Date of Company Incorporation</label>
										<input required type="text" data-type="date" value="<?= $application['id_255002'] ?>" name="organization[inc_date]" class="form-control">
										<span class="form-text">(in DD/MM/YYYY)</span>
									</div>
								</div>
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
				<fieldset class="">
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
									<select required name="organization_revenue_24" id="" class="form-select">
										<option value="">Select Option</option>
										<option value="5 - 24">5 - 24</option>
										<option value="25 - 49">25 - 49</option>
										<option value="50 - 100">50 - 100</option>
										<option value="101 - 200">101 - 200</option>
										<option value="201 - 250">201 - 250</option>
									</select>
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_revenue_23" id="" class="form-select">
										<option value="">Select Option</option>
										<option value="5 - 24">5 - 24</option>
										<option value="25 - 49">25 - 49</option>
										<option value="50 - 100">50 - 100</option>
										<option value="101 - 200">101 - 200</option>
										<option value="201 - 250">201 - 250</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="row g-3">
								<div class="col-xxl-4 col-12">
									Revenue Growth (in %)
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_growth_24" id="" class="form-select">
										<option value="">Select Option</option>
										<option value="< 5%">
											< 5%</option>
										<option value="6% - 15%">6% - 15%</option>
										<option value="16% - 25%">16% - 25%</option>
										<option value="26% - 35%">26% - 35%</option>
										<option value="> 36%">> 36%</option>
									</select>
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_growth_23" id="" class="form-select">
										<option value="">Select Option</option>
										<option value="< 5%">
											< 5%</option>
										<option value="6% - 15%">6% - 15%</option>
										<option value="16% - 25%">16% - 25%</option>
										<option value="26% - 35%">26% - 35%</option>
										<option value="> 36%">> 36%</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="row g-3">
								<div class="col-xxl-4 col-12">
									Net Profit Margin (In %)
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_profit_24" id="" class="form-select">
										<option value="">Select Option</option>
										<option value="< 5%">
											< 5%</option>
										<option value="6% - 15%">6% - 15%</option>
										<option value="16% - 25%">16% - 25%</option>
										<option value="26% - 35%">26% - 35%</option>
										<option value="> 36%">> 36%</option>
									</select>
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_profit_23" id="" class="form-select">
										<option value="">Select Option</option>
										<option value="< 5%">
											< 5%</option>
										<option value="6% - 15%">6% - 15%</option>
										<option value="16% - 25%">16% - 25%</option>
										<option value="26% - 35%">26% - 35%</option>
										<option value="> 36%">> 36%</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="row g-3">
								<div class="col-xxl-4 col-12">
									Return on Assets (in %)
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_roa_24" id="" class="form-select">
										<option value="">Select Option</option>
										<option value="< 5%">
											< 5%</option>
										<option value="6% - 15%">6% - 15%</option>
										<option value="16% - 25%">16% - 25%</option>
										<option value="26% - 35%">26% - 35%</option>
										<option value="> 36%">> 36%</option>
									</select>
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_roa_23" id="" class="form-select">
										<option value="">Select Option</option>
										<option value="< 5%">
											< 5%</option>
										<option value="6% - 15%">6% - 15%</option>
										<option value="16% - 25%">16% - 25%</option>
										<option value="26% - 35%">26% - 35%</option>
										<option value="> 36%">> 36%</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="row g-3">
								<div class="col-xxl-4 col-12">
									Current Ratio
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_der_24" id="" class="form-select">
										<option value="">Select Option</option>
										<option <?= ($application['id_255108'] == "< 1.0") ? "selected" : "" ?> value="< 1.0">
											< 1.0</option>
										<option <?= ($application['id_255108'] == "1.0 - 1.5") ? "selected" : "" ?> value="1.0 - 1.5">1.0 - 1.5</option>
										<option <?= ($application['id_255108'] == "1.6 - 2.0") ? "selected" : "" ?> value="1.6 - 2.0">1.6 - 2.0</option>
										<option <?= ($application['id_255108'] == "6% - 15%") ? "selected" : "" ?> value="2.1 - 3.0">2.1 - 3.0</option>
										<option <?= ($application['id_255108'] == "6% - 15%") ? "selected" : "" ?> value="> 3.0">> 3.0</option>
									</select>
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_der_23" id="" class="form-select">
										<option value="">Select Option</option>
										<option <?= ($application['id_255108'] == "< 1.0") ? "selected" : "" ?> value="< 1.0">
											< 1.0</option>
										<option <?= ($application['id_255108'] == "1.0 - 1.5") ? "selected" : "" ?> value="1.0 - 1.5">1.0 - 1.5</option>
										<option <?= ($application['id_255108'] == "1.6 - 2.0") ? "selected" : "" ?> value="1.6 - 2.0">1.6 - 2.0</option>
										<option <?= ($application['id_255108'] == "6% - 15%") ? "selected" : "" ?> value="2.1 - 3.0">2.1 - 3.0</option>
										<option <?= ($application['id_255108'] == "6% - 15%") ? "selected" : "" ?> value="> 3.0">> 3.0</option>
									</select>
								</div>
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
				<fieldset class="">
					<legend class="card-title mb-2">
						<h5>Case Study I: About the Organization<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="mb-3">
						<p>Brief description of the Business</p>
					</div>
					<div class="row g-2 g-md-3 mb-3 flex-row-reverse">
						<!-- <div class="col-xl-4 col-12">
							<div class="bg-light p-3">
								<p><strong>Guidelines</strong></p>
								<ul>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
								</ul>
							</div>
						</div> -->
						<div class="col-xl col-12">
							<textarea required rows="15" maxlength="750" name="case_study_1" class="form-control editor" id=""></textarea>
							<span class="form-text">(Character Limit: Minimum 300, Maximum 750)</span>
						</div>
					</div>
					<div class="mb-3">
						<p>Core Products / Services Offered</p>
					</div>
					<div class="row g-2 g-md-3 mb-3 flex-row-reverse">
						<!-- <div class="col-xl-4 col-12">
							<div class="bg-light p-3">
								<p><strong>Guidelines</strong></p>
								<ul>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
									<li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, ipsam.</li>
								</ul>
							</div>
						</div> -->
						<div class="col-xl col-12">
							<textarea required rows="15" maxlength="750" name="case_study_2" class="form-control editor" id=""></textarea>
							<span class="form-text">(Character Limit: Minimum 300, Maximum 750)</span>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="col-12 grid-margin stretch-card">
		<div class="card input-group-card">
			<div class="card-body">
				<fieldset class="">
					<legend class="card-title mb-2">
						<h5>Case Study II: Innovation & Adaptibility<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="row g-2 g-md-3 mb-3 flex-row-reverse">
						<div class="col-xl-4 col-12">
							<div class="bg-light p-3">
								<p><strong>Guidelines</strong></p>
								<ul>
									<li>Highlight your most innovative product/service and its USP</li>
									<li>Describe how your business adapted to recent market challenges.</li>
									<li>What new technologies or processes have you adopted?</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-8 col-12">
							<textarea required rows="15" maxlength="750" name="case_study_3" class="form-control editor" id=""></textarea>
							<span class="form-text">(Character Limit: Minimum 300, Maximum 750)</span>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="col-12 grid-margin stretch-card">
		<div class="card input-group-card">
			<div class="card-body">
				<fieldset class="">
					<legend class="card-title mb-2">
						<h5>Case Study III: Business Performance & Market Impact<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="row g-2 g-md-3 mb-3 flex-row-reverse">
						<div class="col-xl-4 col-12">
							<div class="bg-light p-3">
								<p><strong>Guidelines</strong></p>
								<ul>
									<li>Summarize your revenue growth & Key financial achievements over the last 2 years.</li>
									<li>How have you managed financial challenges effectively?</li>
									<li>Highlight new markets or customer segments you have entered.</li>
									<li>How has your business positively impacted the local community?</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-8 col-12">
							<textarea required rows="15" maxlength="750" name="case_study_4" class="form-control editor" id=""></textarea>
							<span class="form-text">(Character Limit: Minimum 300, Maximum 750)</span>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="col-12 grid-margin stretch-card">
		<div class="card input-group-card">
			<div class="card-body">
				<fieldset class="">
					<legend class="card-title mb-2">
						<h5>Case Study IV: Sustainability & Social Responsibility<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="row g-2 g-md-3 mb-3 flex-row-reverse">
						<div class="col-xl-4 col-12">
							<div class="bg-light p-3">
								<p><strong>Guidelines</strong></p>
								<ul>
									<li>What social responsibility initiatives have you undertaken?</li>
									<li>How does your business contribute to the well-being of your community?</li>
									<li>What steps have you taken to ensure long-term sustainability?</li>
									<li>What is your strategy for scaling your business in the next 5 years?</li>
									<li>How are you preparing for future industry trends and challenges?</li>
									<li>What investments have you made in technology and talent for future growth?</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-8 col-12">
							<textarea required rows="15" maxlength="750" name="case_study_5" class="form-control editor" id=""></textarea>
							<span class="form-text">(Character Limit: Minimum 300, Maximum 750)</span>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="col-12 grid-margin stretch-card">
		<div class="card input-group-card">
			<div class="card-body">
				<fieldset class="">
					<legend class="card-title mb-2">
						<h5>Case Study V: Scalability & Future Readiness<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="row g-2 g-md-3 mb-3 flex-row-reverse">
						<div class="col-xl-4 col-12">
							<div class="bg-light p-3">
								<p><strong>Guidelines</strong></p>
								<ul>
									<li>What social responsibility initiatives have you undertaken?</li>
									<li>How does your business contribute to the well-being of your community?</li>
									<li>What steps have you taken to ensure long-term sustainability?</li>
									<li>What is your strategy for scaling your business in the next 5 years?</li>
									<li>How are you preparing for future industry trends and challenges?</li>
									<li>What investments have you made in technology and talent for future growth?</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-8 col-12">
							<textarea required rows="15" maxlength="750" name="case_study_6" class="form-control editor" id=""></textarea>
							<span class="form-text">(Character Limit: Minimum 300, Maximum 750)</span>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<!--<div class="col-12 grid-margin stretch-card d-none">-->
	<!--	<div class="card input-group-card">-->
	<!--		<div class="card-body">-->
	<!--			<fieldset class="">-->
	<!--				<legend class="card-title mb-2">-->
	<!--					<h5>Case Study VI: Additional Supportings<sup class="text-danger">&ast;</sup></h5>-->
	<!--				</legend>-->
	<!--				<div class="row g-2 g-md-3 mb-3 flex-row-reverse">-->
	<!--					<div class="col-xl-4 col-12">-->
	<!--						<div class="bg-light p-3">-->
	<!--							<p><strong>Guidelines</strong></p>-->
	<!--							<p>Add any of the following to support your entry</p>-->
	<!--							<ul>-->
	<!--								<li>Customer testimonials</li>-->
	<!--								<li>Awards & Achievements</li>-->
	<!--								<li>Any other collateral to support the entry</li>-->
	<!--							</ul>-->
	<!--						</div>-->
	<!--					</div>-->
	<!--					<div class="col-xl-8 col-12">-->
	<!--						<textarea required rows="15" maxlength="750" name="case_study_8" class="form-control editor" id=""></textarea>-->
	<!--						<span class="form-text">(Character Limit: Minimum 300, Maximum 750)</span>-->
	<!--					</div>-->
	<!--				</div>-->
	<!--			</fieldset>-->
	<!--		</div>-->
	<!--	</div>-->
	<!--</div>-->
	<div class="col-12 grid-margin stretch-card">
		<div class="card input-group-card">
			<div class="card-body">
				<fieldset class="">
					<legend class="card-title mb-2">
						<h5>Case Study VI: Additional Supportings<sup class="text-danger">&ast;</sup></h5>
						<!-- <h5>Creatives & Images<sup class="text-danger">&ast;</sup></h5> -->
					</legend>
					<div class="mb-3">
						<p></p>
					</div>
					<div class="row g-2 g-md-3 flex-row-reverse">
						<div class="col-xl-4 col-12">
							<div class="bg-light p-3">
								<p><strong>Guidelines</strong></p>
								<p>Add any of the following to support your entry.</p>
								<ul>
									<li>Product images of the making of the product or service offering</li>
									<li>Customer testimonials</li>
									<li>Awards & Achievements</li>
									<li>Any other collateral to support the entry</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-8 col-12">
							<div class="row g-2 g-md-3">
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Image I</label>
										<input type="file" accept="image/*" name="doc1" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
										<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Image II</label>
										<input type="file" accept="image/*" name="doc2" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
										<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Image III</label>
										<input type="file" accept="image/*" name="doc3" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
										<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Image IV</label>
										<input type="file" accept="image/*" name="doc4" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
										<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Image V</label>
										<input type="file" accept="image/*" name="doc5" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
										<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Image VI</label>
										<input type="file" accept="image/*" name="doc6" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
										<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
	<div class="col-12 grid-margin stretch-card">
		<div class="row g-3">
			<div class="col-auto"><button type="button" data-bs-toggle="modal" data-bs-target="#consentModal" class="btn btn-primary">Confirm & Submit</button></div>
			<div class="col-auto"><button type="reset" class="btn btn-outline-secondary">Reset this Form</button></div>
		</div>
	</div>
</div>

<div class="modal fade" id="consentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Confirmation Dialogue</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Details on this page cannot be changed once saved. Please confirm before saving.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Make Changes</button>
				<button type="submit" class="btn btn-primary">Save and Continue</button>
			</div>
		</div>
	</div>
</div>
<?= form_close() ?>

<script>
	$("#form_option").validate({
		ignore: [
			":hidden", ":focus"
		],
		rules: {
			case_study_1: {
				maxlength: 750,
				minlength: 360
			},
			case_study_2: {
				maxlength: 750,
				minlength: 360
			},
			case_study_3: {
				maxlength: 750,
				minlength: 360
			},
			case_study_4: {
				maxlength: 750,
				minlength: 360
			},
			case_study_5: {
				maxlength: 750,
				minlength: 360
			},
			case_study_6: {
				maxlength: 750,
				minlength: 360
			},
			case_study_7: {
				maxlength: 750,
				minlength: 360
			},
			case_study_8: {
				maxlength: 750,
				minlength: 360
			},
			case_study_9: {
				maxlength: 750,
				minlength: 360
			},
			case_study_10: {
				maxlength: 750,
				minlength: 360
			},
			case_study_11: {
				maxlength: 750,
				minlength: 360
			},
			case_study_12: {
				maxlength: 750,
				minlength: 360
			},
		},
		messages: {
			case_study_1: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_2: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_3: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_4: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_5: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_6: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_7: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_8: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_9: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_10: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_11: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
			case_study_12: {
				maxlength: "Please enter no more than 750 characters.",
				minlength: "Please enter at least 360 characters.",
			},
		}
	});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js"></script>

<script>
	$(document).ready(function() {
		$('.editor-wysiwyg').each((index, element) => {
			$(element).summernote({
				height: 360,
				toolbar: [
					// [groupName, [list of button]]
					['style', ['style']],
					['style', ['bold', 'italic', 'underline', 'clear']],
					['font', ['strikethrough', 'superscript', 'subscript']],
					['para', ['ul', 'ol', 'paragraph']],
				],
				callbacks: {
					onPaste: function(e) {
						let buffer = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('text/html');

						// Create a temporary element to parse the HTML
						let tempDiv = document.createElement('div');
						tempDiv.innerHTML = buffer;

						// Remove font styles from all elements
						let allElements = tempDiv.querySelectorAll('*');
						allElements.forEach(element => {
							element.style.fontFamily = ''; // Clear inline font styles
							// element.style.fontSize = ''; // Clear inline font styles
						});

						let cleanHTML = tempDiv.innerHTML;

						// Prevent the default paste behavior
						e.preventDefault();

						// Insert the cleaned HTML into Summernote
						$(element).summernote('pasteHTML', cleanHTML);
					}
				}
			});
		});
	});
</script>

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

	// $("input[type='file']").each(function(index, element) {
	// 	if ($(element).attr("data-default-file") == "" || $(element).attr("data-default-file") == null) {
	// 		$(element).prop("required", true);
	// 		console.log("Absent");

	// 	} else {
	// 		$(element).prop("required", false);
	// 		console.log("Present");
	// 	}
	// });
</script>

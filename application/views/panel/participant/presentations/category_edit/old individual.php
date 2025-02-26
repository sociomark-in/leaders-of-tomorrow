<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-bs5.min.js"></script> -->

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote-lite.min.js"></script>
<?php
$presentation_id = date('U') . "-" . random_string('numeric', 5);
?>
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
										<label for="" class="form-label">Name of the Participating Entity</label>
										<input required type="text" name="organization[name]" class="form-control">
									</div>
								</div>
								<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Designation</label>
										<input required type="text" name="designation" class="form-control">
									</div>
								</div>
								<div class="col-xxl-9 col-xl-8 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Name of the MD/CEO/Founder</label>
										<input required type="text" name="name" class="form-control">
									</div>
								</div>
								<div class="col-xl-4 col-12">
									<div class="">
										<label for="" class="form-label">Type of Business</label>
										<select required name="organization[business]" id="" class="form-select">
											<option value="">Select Business Type</option>
											<option <?= ($application['id_255004'] == "Manufacturing") ? "selected" : "" ?> value="Manufacturing">Manufacturing</option>
											<option <?= ($application['id_255004'] == "Service") ? "selected" : "" ?> value="Service">Service</option>
										</select>
									</div>
								</div>
								<div class="col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">No. Of Employees</label>
										<select required name="organization[size]" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255202'] == "Less than 50") ? "selected" : "" ?> value="Less than 50">Less than 50</option>
											<option <?= ($application['id_255202'] == "50 - 100") ? "selected" : "" ?> value="50 - 100">50 - 100</option>
											<option <?= ($application['id_255202'] == "100 - 200") ? "selected" : "" ?> value="100 - 200">100 - 200</option>
											<option <?= ($application['id_255202'] == "200 - 400") ? "selected" : "" ?> value="200 - 400">200 - 400</option>
											<option <?= ($application['id_255202'] == "More than 400") ? "selected" : "" ?> value="More than 400">More than 400</option>
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
								<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Total Years of Experience</label>
										<input required type="text" name="experience[total]" class="form-control">
									</div>
								</div>
								<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
									<div class="">
										<label for="" class="form-label">Years of Experience in this Company</label>
										<input required type="text" name="experience[current]" class="form-control">
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
									<select required name="organization_revenue_2" id="" class="form-select">
										<option value="">Select Option</option>
										<option <?= ($application['id_255101'] == "5 - 24") ? "selected" : "" ?> value="5 - 24">5 - 24</option>
										<option <?= ($application['id_255101'] == "25 - 49") ? "selected" : "" ?> value="25 - 49">25 - 49</option>
										<option <?= ($application['id_255101'] == "50 - 100") ? "selected" : "" ?> value="50 - 100">50 - 100</option>
										<option <?= ($application['id_255101'] == "101 - 200") ? "selected" : "" ?> value="50 - 100">101 - 200</option>
										<option <?= ($application['id_255101'] == "201 - 250") ? "selected" : "" ?> value="50 - 100">201 - 250</option>
									</select>
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_revenue_1" id="" class="form-select">
										<option value="">Select Option</option>
										<option <?= ($application['id_255102'] == "5 - 24") ? "selected" : "" ?> value="5 - 24">5 - 24</option>
										<option <?= ($application['id_255102'] == "25 - 49") ? "selected" : "" ?> value="25 - 49">25 - 49</option>
										<option <?= ($application['id_255102'] == "50 - 100") ? "selected" : "" ?> value="50 - 100">50 - 100</option>
										<option <?= ($application['id_255102'] == "101 - 200") ? "selected" : "" ?> value="50 - 100">101 - 200</option>
										<option <?= ($application['id_255102'] == "201 - 250") ? "selected" : "" ?> value="50 - 100">201 - 250</option>
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
									<select required name="organization_growth_2" id="" class="form-select">
										<option value="">Select Option</option>
										<option <?= ($application['id_255103'] == "< 5%") ? "selected" : "" ?> value="< 5%">
											< 5%</option>
										<option <?= ($application['id_255103'] == "6% - 15%") ? "selected" : "" ?> value="6% - 15%">6% - 15%</option>
										<option <?= ($application['id_255103'] == "16% - 25%") ? "selected" : "" ?> value="16% - 25%">16% - 25%</option>
										<option <?= ($application['id_255103'] == "26% - 35%") ? "selected" : "" ?> value="26% - 35%">26% - 35%</option>
										<option <?= ($application['id_255103'] == "> 36%") ? "selected" : "" ?> value="> 36%">> 36%</option>
									</select>
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_growth_1" id="" class="form-select">
										<option value="">Select Option</option>
										<option <?= ($application['id_255104'] == "< 5%") ? "selected" : "" ?> value="< 5%">
											< 5%</option>
										<option <?= ($application['id_255104'] == "6% - 15%") ? "selected" : "" ?> value="6% - 15%">6% - 15%</option>
										<option <?= ($application['id_255104'] == "16% - 25%") ? "selected" : "" ?> value="16% - 25%">16% - 25%</option>
										<option <?= ($application['id_255104'] == "26% - 35%") ? "selected" : "" ?> value="26% - 35%">26% - 35%</option>
										<option <?= ($application['id_255104'] == "> 36%") ? "selected" : "" ?> value="> 36%">> 36%</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="row g-3">
								<div class="col-xxl-4 col-12">
									EBTIA (In %)
								</div>
								<div class="col-xxl-4 col-lg-6 col-12">
									<select required name="organization_profit" id="" class="form-select">
										<option value="">Select Option</option>
										<option <?= ($application['id_255105'] == "< 10%") ? "selected" : "" ?> value="< 10%">
											< 10%</option>
										<option <?= ($application['id_255105'] == "11% - 15%") ? "selected" : "" ?> value="11% - 15%">11% - 15%</option>
										<option <?= ($application['id_255105'] == "16% - 20%") ? "selected" : "" ?> value="16% - 20%">16% - 20%</option>
										<option <?= ($application['id_255105'] == "21% - 25%") ? "selected" : "" ?> value="21% - 25%">21% - 25%</option>
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
						<p>Background about your organization/institute.</p>
					</div>
					<div class="row g-2 g-md-3 mb-3">
						<div class="col-12">
							<textarea rows="10" maxlength="900" required rows="10" name="case_study_1" class="form-control editor" id=""></textarea>
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
						<h5>Case Study II: Unique Offerings<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="mb-3">
						<p>Key product/service offerings</p>
					</div>
					<div class="row g-2 g-md-3">
						<div class="col-12">
							<textarea required maxlength="900" rows="10" name="case_study_2" class="form-control editor" id=""></textarea>
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
						<h5>Case Study III: Key Initiatives<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="mb-3">
						<p>What sets your business model apart from competitors in the market?</p>
					</div>
					<div class="row g-2 g-md-3 mb-3">
						<div class="col-12">
							<textarea required maxlength="900" rows="10" name="case_study_3" class="form-control editor" id=""></textarea>
						</div>
					</div>
					<div class="mb-3">
						<p>How do you plan to scale your business, and what challenges do you anticipate in the scaling process?</p>
					</div>
					<div class="row g-2 g-md-3">
						<div class="col-12">
							<textarea required maxlength="900" rows="10" name="case_study_4" class="form-control editor" id=""></textarea>
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
						<h5>Case Study IV<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="mb-3">
						<p>How well do you understand your target market, and what strategies are in place to adapt to changing market trends?</p>
					</div>
					<div class="row g-2 g-md-3 mb-3">
						<div class="col-12">
							<textarea required maxlength="900" rows="10" name="case_study_5" class="form-control editor" id=""></textarea>
						</div>
					</div>
					<div class="mb-3">
						<p>Share examples of how your business has demonstrated innovation in response to market demands in the last two years</p>
					</div>
					<div class="row g-2 g-md-3">
						<div class="col-12">
							<textarea required maxlength="900" rows="10" name="case_study_6" class="form-control editor" id=""></textarea>
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
						<h5>Case Study V<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="mb-3">
						<p>How do you plan to manage cash flow effectively, especially during periods of rapid growth or economic downturns?</p>
					</div>
					<div class="row g-2 g-md-3 mb-3">
						<div class="col-12">
							<textarea required maxlength="900" rows="10" name="case_study_7" class="form-control editor" id=""></textarea>
						</div>
					</div>
					<div class="mb-3">
						<p>Can you share any customer success stories or testimonials that highlight the impact of your business on your target audience?</p>
					</div>
					<div class="row g-2 g-md-3">
						<div class="col-12">
							<textarea required maxlength="900" rows="10" name="case_study_8" class="form-control editor" id=""></textarea>
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
						<h5>Case Study VI<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="mb-3">
						<p>What are your long-term goals for the company, and how do you see it evolving in the next 5-10 years?</p>
					</div>
					<div class="row g-2 g-md-3 mb-3">
						<div class="col-12">
							<textarea required maxlength="900" rows="10" name="case_study_9" class="form-control editor" id=""></textarea>
						</div>
					</div>
					<div class="mb-3">
						<p>How do emerging technologies or trends factor into your strategic planning?</p>
					</div>
					<div class="row g-2 g-md-3">
						<div class="col-12">
							<textarea required maxlength="900" rows="10" name="case_study_10" class="form-control editor" id=""></textarea>
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
						<h5>Creatives & Images<sup class="text-danger">&ast;</sup></h5>
					</legend>
					<div class="mb-3">
						<p></p>
					</div>
					<div class="row g-2 g-md-3">
						<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Graphic Creative Supporting Case Study I</label>
								<input type="file" accept="image/*" name="doc1" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
								<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Graphic Creative Supporting Case Study II</label>
								<input type="file" accept="image/*" name="doc2" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
								<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Graphic Creative Supporting Case Study III</label>
								<input type="file" accept="image/*" name="doc3" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
								<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Graphic Creative Supporting Case Study IV</label>
								<input type="file" accept="image/*" name="doc4" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
								<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Graphic Creative Supporting Case Study V</label>
								<input type="file" accept="image/*" name="doc5" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
								<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Graphic Creative Supporting Case Study VI</label>
								<input type="file" accept="image/*" name="doc6" class="dropify" data-max-file-size="1M" data-max-width="1000" data-min-width="100" data-allowed-formats="square" data-max-file-size-preview="1M" data-allowed-file-extensions="jpg jpeg png" />
								<span class="form-text">(JPG of Maximum Size 1MB in Square Orientation)</span>
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
				maxlength: 900,
				minlength: 300
			},
			case_study_2: {
				maxlength: 900,
				minlength: 300
			},
			case_study_3: {
				maxlength: 900,
				minlength: 300
			},
			case_study_4: {
				maxlength: 900,
				minlength: 300
			},
			case_study_5: {
				maxlength: 900,
				minlength: 300
			},
			case_study_6: {
				maxlength: 900,
				minlength: 300
			},
			case_study_7: {
				maxlength: 900,
				minlength: 300
			},
			case_study_8: {
				maxlength: 900,
				minlength: 300
			},
			case_study_9: {
				maxlength: 900,
				minlength: 300
			},
			case_study_10: {
				maxlength: 900,
				minlength: 300
			},
			case_study_11: {
				maxlength: 900,
				minlength: 300
			},
			case_study_12: {
				maxlength: 900,
				minlength: 300
			},
		},
		messages: {
			case_study_1: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_2: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_3: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_4: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_5: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_6: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_7: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_8: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_9: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_10: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_11: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
			},
			case_study_12: {
				maxlength: "Please enter no more than 900 characters.",
				minlength: "Please enter at least 300 characters.",
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
				height: 300,
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

	$("input[type='file']").each(function(index, element) {
		if ($(element).attr("data-default-file") == "" || $(element).attr("data-default-file") == null) {
			$(element).prop("required", true);
			console.log("Absent");

		} else {
			$(element).prop("required", false);
			console.log("Present");
		}
	});
</script>

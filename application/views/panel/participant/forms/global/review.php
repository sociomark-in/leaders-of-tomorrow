<div class="row g-3">
	<div class="col-12 grid-margin stretch-card">
		<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'formFullView']) ?>
		<input type="hidden" name="category_id" value="<?= $category_id ?>">
		<input type="hidden" name="application_id" value="<?= $id ?? null ?>">
		<input type="hidden" name="utm" value="<?= $utm ?>">
		<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
		<input type="hidden" name="stage" value="<?= $stage ?>">
		<!-- 
	75502	organization_industry	
	75503	organization_overview	
	75508	organization_mission_vision	
	75509	organization_services	
	75510	organization_reveue_23	
	75511	organization_reveue_22	
	75512	organization_growth_23	
	75513	organization_growth_22	
	75514	organization_profit_23	
	75515	organization_profit_22	
	75516	organization_assets_23	
	75517	organization_assets_22	
	75518	organization_der_23	
	75519	organization_der_22

	75520	initiative_name
	75521	initiative_start_date	
	75522	initiative_end_date	
	75523	initiative_desc	
	75524	initiative_challenges	
	75525	initiative_strategy	

	75526	initiative_tech
	75527	initiative_impact	
	75528	initiative_scalability	
	75529	initiative_info	

	75530	doc1
	75531	doc2	
	75532	doc3	
	75533	doc4	
 -->
		<div class="row g-3">
			<div class="col-12">
				<div class="row g-md-5 g-3">
					<fieldset class="col-12">
						<legend class="card-title mb-0">
							<h5>Participating Entity<sup class="text-danger">&ast;</sup></h5>
						</legend>
						<div class="row g-3">
							<div class="col-xl-6 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Name of the Participating Entity</label>
									<input required type="text" value="<?= $application['organization_name'] ?>" name="organization[name]" class="form-control">
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Name of the Applicant (MD/CEO/Founder or equivalent)</label>
									<input required type="text" value="<?= $application["name"] ?>" name="name" class="form-control">
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Designation</label>
									<input required type="text" value="<?= $application['designation'] ?>" name="designation" class="form-control">
								</div>
							</div>
							<!-- <div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
							<div class="">
								<label for="" class="form-label">Date of Birth</label>
								<input required type="text" data-type="date" name="dob" class="form-control">
								<span class="form-text">(in DD/MM/YYYY)</span>
							</div>
						</div> -->
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Business Segment</label>
									<select required name="organization[segment]" id="" class="form-select">
										<option value="">Select Business Segment</option>
										<option <?= ($application['id_255003'] == "Micro") ? "selected" : "" ?> value="Micro">Micro</option>
										<option <?= ($application['id_255003'] == "Small") ? "selected" : "" ?> value="Small">Small</option>
										<option <?= ($application['id_255003'] == "Medium") ? "selected" : "" ?> value="Medium">Medium</option>
									</select>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Date of Company Incorporation</label>
									<input required type="text" data-type="date" value="<?= $application['id_255002'] ?>" name="organization[inc_date]" class="form-control">
									<span class="form-text">(in DD/MM/YYYY)</span>
								</div>
							</div>
							<!-- <div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
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
						</div> -->
							<div class="col-12">
								<div class="row g-3">
									<div class="col-12">
										<?php
										$address = json_decode($application['id_255001']);
										?>
										<label for="" class="form-label">Registered Address Participating Entity</label>
										<input required type="text" value="<?= $address[0] ?>" name="organization[address][line_1]" class="form-control mb-2">
										<input type="text" value="<?= $address[1] ?>" name="organization[address][line_2]" class="form-control mb-2">
										<input type="text" value="<?= $address[2] ?>" name="organization[address][line_3]" class="form-control mb-2">
									</div>
									<div class="col-xl-4 col-lg-6 col-12">
            							<label for="" class="form-label">State</label>
            							<!-- <input type="text" placeholder="" name="organization[address][state]" value="<?= $application['organization_state'] ?>" class="form-control"> -->
            							<select required name="organization[address][state]" id="stateSelect" class="form-select">
            								<option value="">Select State</option>
            								<?php foreach ($locations['states'] as $key => $option)  : ?>
            									<option <?= ($application['organization_state'] == $option['title']) ? "selected" : "" ?> value="<?= $option['title'] ?>"><?= $option['title'] ?></option>
            								<?php endforeach ?>
            							</select>
            						</div>
            						<div class="col-xl-4 col-lg-6 col-12">
            							<label for="" class="form-label">City</label>
            							<select required name="organization[address][city]" id="citySelect" class="form-select">
            								<option value="">Select City</option>
            								<?php foreach ($locations['cities'] as $key => $option)  : ?>
            									<option <?= ($application['organization_city'] == $option['city_name']) ? "selected" : "" ?> value="<?= $option['city_name'] ?>"><?= $option['city_name'] ?></option>
            								<?php endforeach ?>
            							</select>
            						</div>
								</div>
							</div>

							<!-- <div class="col-xxl-3 col-xl-4 col-12">
								<div class="">
									<label for="" class="form-label">Type of Business</label>
									<select required name="organization[business]" id="" class="form-select">
										<option value="">Select Business Type</option>
										<option value="Manufacturing">Manufacturing</option>
										<option value="Service">Service</option>
									</select>
								</div>
							</div> -->
							<div class="col-xxl-3 col-xl-4 col-12">
								<div class="">
									<label for="" class="form-label">Type of Ownership</label>
									<select required name="organization[ownership]" id="" class="form-select">
										<option value="">Select Ownership Type</option>
										<option <?= ($application['id_255005'] == "Sole Proprietorship") ? "selected" : "" ?> value="Sole Proprietorship">Sole Proprietorship</option>
										<option <?= ($application['id_255005'] == "Partnership") ? "selected" : "" ?> value="Partnership">Partnership</option>
										<option <?= ($application['id_255005'] == "Private Limited") ? "selected" : "" ?> value="Private Limited">Private Limited</option>
										<option <?= ($application['id_255005'] == "Other") ? "selected" : "" ?> value="Other">Other</option>
									</select>
								</div>
							</div>
							<div class="col-xxl-6 col-xl-8 col-12">
								<div class="">
									<label for="" class="form-label">Website URL</label>
									<input type="url" placeholder="https://www.domain.xyz" name="organization[url]" value="<?= $application['organization_url'] ?>" class="form-control">
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="col-12">
						<legend class="card-title mb-0">
							<h5>Contact Person of Organization<sup class="text-danger">&ast;</sup></h5>
						</legend>
						<div class="row g-3">
							<!-- <div class="col-12">
							<div class="">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="" id="PoCCheck" checked>
									<label class="form-check-label" for="PoCCheck">
										Same As Login
									</label>
								</div>
							</div>
							<script>
								$(document).ready(function() {
									$("#PoCCheck").on('change', () => {
										if ($(this).is(':checked')) {
											$("sectionChange").addClass('d-none');
										} else {
											console.log("Not Checked");
											$("sectionChange").removeClass('d-none');
										}
									});​
								})
							</script>
						</div> -->
							<div id="sectionChange" class="col-12">
								<div class="row g-3">
									<div class="col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Full Name of Individual</label>
											<input required name="contact_person[name]" value="<?= $application['id_255901'] ?>" type="text" class="form-control">
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Email Address</label>
											<input required name="contact_person[email]" value="<?= $application['id_255902'] ?>" type="email" class="form-control">
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Contact Number</label>
											<input required name="contact_person[contact]" value="<?= $application['id_255903'] ?>" minlength="10" maxlength="10" type="text" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>

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
										Revenue from Global Markets (in % of Revenue)
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="organization_growth_2" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255103'] == "Less than 20%") ? "selected" : "" ?> value="Less than 20%">Less than 20%</option>
											<option <?= ($application['id_255103'] == "20% - 40%") ? "selected" : "" ?> value="20% - 40%">20% - 40%</option>
											<option <?= ($application['id_255103'] == "40% - 60%") ? "selected" : "" ?> value="40% - 60%">40% - 60%</option>
											<option <?= ($application['id_255103'] == "60% - 80%") ? "selected" : "" ?> value="60% - 80%">60% - 80%</option>
											<option <?= ($application['id_255103'] == "More than 80%") ? "selected" : "" ?> value="More than 80%">More than 80%</option>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="organization_growth_1" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255104'] == "Less than 20%") ? "selected" : "" ?> value="Less than 20%">Less than 20%</option>
											<option <?= ($application['id_255104'] == "20% - 40%") ? "selected" : "" ?> value="20% - 40%">20% - 40%</option>
											<option <?= ($application['id_255104'] == "40% - 60%") ? "selected" : "" ?> value="40% - 60%">40% - 60%</option>
											<option <?= ($application['id_255104'] == "60% - 80%") ? "selected" : "" ?> value="60% - 80%">60% - 80%</option>
											<option <?= ($application['id_255104'] == "More than 80%") ? "selected" : "" ?> value="More than 80%">More than 80%</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="row g-3">
									<div class="col-xxl-4 col-12">
										Investment in R&amp;D for Global Markets (In % of Revenue)
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="organization_profit" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255105'] == "Less than 20%") ? "selected" : "" ?> value="Less than 20%">Less than 20%</option>
											<option <?= ($application['id_255105'] == "20% - 40%") ? "selected" : "" ?> value="20% - 40%">20% - 40%</option>
											<option <?= ($application['id_255105'] == "40% - 60%") ? "selected" : "" ?> value="40% - 60%">40% - 60%</option>
											<option <?= ($application['id_255105'] == "60% - 80%") ? "selected" : "" ?> value="60% - 80%">60% - 80%</option>
											<option <?= ($application['id_255105'] == "More than 80%") ? "selected" : "" ?> value="More than 80%">More than 80%</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="col-12">
						<legend class="card-title mb-0">
							<h5>Organization Overview<sup class="text-danger">&ast;</sup></h5>
						</legend>
						<div class="row g-3">
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
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
									<span class="form-text">(On payroll + On contract) as on March 31, 2024 in India</span>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">No. Of Employees Globally</label>
									<select required name="organization[global_size]" id="" class="form-select">
										<option value="">Select Option</option>
										<option <?= ($application['id_255202'] == "Less than 50") ? "selected" : "" ?> value="Less than 50">Less than 50</option>
										<option <?= ($application['id_255202'] == "50 - 100") ? "selected" : "" ?> value="50 - 100">50 - 100</option>
										<option <?= ($application['id_255202'] == "100 - 200") ? "selected" : "" ?> value="100 - 200">100 - 200</option>
										<option <?= ($application['id_255202'] == "200 - 400") ? "selected" : "" ?> value="200 - 400">200 - 400</option>
										<option <?= ($application['id_255202'] == "More than 400") ? "selected" : "" ?> value="More than 400">More than 400</option>
									</select>
									<span class="form-text">(On payroll + On contract) as on March 31, 2024 Globally</span>
								</div>
							</div>

							<div class="col-xl-6 col-12">
								<div class="">
									<div class="">
										<label for="" class="form-label">Number of Countries with Business Presence</label>
										<input required name="organization_presence" value="<?= $application['id_255203'] ?>" type="text" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-12">
								<div class="">
									<div class="">
										<label for="" class="form-label">Countries of Operation</label>
										<input required name="organization_operation" value="<?= $application['id_255204'] ?>" type="text" class="form-control">
										<span class="form-text">(List at least 5, specifying at least 2 countries from different continents)</span>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="">
									<label for="" class="form-label">Details of Cross-Border Collaborations/Partnerships Established</label>
									<textarea required name="organization_collabs" id="" class="form-control" rows="5"><?= $application['id_255205'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>

							<div class="col-12">
								<div class="">
									<label for="" class="form-label">Market Expansion in the Last 2 Years</label>
									<textarea required name="organization_expansion" id="" class="form-control" rows="5"><?= $application['id_255206'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>

							<div class="col-12">
								<div class="">
									<label for="" class="form-label">Brief Description of the Business</label>
									<textarea required name="organization_overview" id="" class="form-control" rows="5"><?= $application['id_255207'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>
							<div class="col-12">
								<div class="">
									<label for="" class="form-label">Core Products / Services Offered</label>
									<textarea required name="organization_services" id="" class="form-control" rows="5"><?= $application['id_255208'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset class="col-12">
						<div class="mb-3">
							<legend class="card-title mb-0">
								<h5>Innovation and Adaptability<sup class="text-danger">&ast;</sup></h5>
							</legend>
						</div>
						<div class="row g-3">
							<div class="col-12">
								<div class="">
									<label for="" class="form-label">Describe an innovative solution, product, or service introduced to global markets that has significantly impacted your business. Highlight how it was adapted to meet the needs of diverse international audiences</label>
									<textarea required name="case_study_1" id="" class="form-control" maxlength="5000" rows="5"> <?= $application['id_255301'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
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
									<label for="" class="form-label">Provide an overview of your business’s performance in global markets, including key achievements, market share growth, and any notable recognitions or awards. How has your organization impacted the industries you operate in?</label>
									<textarea required name="case_study_2" id="" class="form-control" maxlength="5000" rows="5"> <?= $application['id_255302'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
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
									<label for="" class="form-label">Highlight the sustainability initiative or corporate social responsibility (CSR) program implemented by your organization that has had a measurable impact in the global markets you operate in</label>
									<textarea required name="case_study_3" id="" class="form-control" maxlength="5000" rows="5"> <?= $application['id_255303'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
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
									<label for="" class="form-label">Outline your organization’s plans for future expansion and global growth. How are you leveraging technology, talent, and innovation to ensure scalability and readiness for emerging global challenges?</label>
									<textarea required name="case_study_4" id="" class="form-control" maxlength="5000" rows="5"> <?= $application['id_255304'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>
						</div>
					</fieldset>

					<fieldset class="col-12">
						<legend class="card-title mb-3">
							<h5>Upload Files<sup class="text-danger">&ast;</sup></h5>
						</legend>
						<div class="d-none">
							<div class="bg-light p-3 mb-2">
								<h5>Instructions<sup class="text-danger">&ast;</sup></h5>
								<ul class="">
									<li>Open the PDF Properties and check for PDF version < version 5 (1.4)</li>
									<li>Open the unsupported PDF file with Chrome</li>
									<li>Right Click and Print</li>
									<li>Change destination as [Save as PDF]</li>
									<li>This exported PDF file is compatible to upload.</li>
								</ul>
							</div>
						</div>
						<div class="row g-3 mb-3">
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">MSME Certificate</label>
									<input type="file" accept="application/pdf" name="doc1" class="dropify" data-default-file="<?= $application['id_255401'] ?>" data-max-file-size="500K" data-allowed-file-extensions="pdf" />
									<span class="form-text">document supporting received from Ministry of MSME, Govt. of India (PDF of Maximum Size 500KB)</span>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Proof of Global Presence</label>
									<input type="file" accept="application/pdf" name="doc2" class="dropify" data-default-file="<?= $application['id_255402'] ?>" data-max-file-size="500K" data-allowed-file-extensions="pdf" />
									<span class="form-text">(Provide a list of business registrations, partnerships, or collaborations in the required countries) (PDF of Maximum Size 500KB)</span>
								</div>
							</div>
							<!-- <div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Applicable Environmental Certifications</label>
									<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="<?= $application['id_75532'] ?>" data-max-file-size="500K" data-allowed-file-extensions="pdf" />
									<span class="form-text">(ISO 14001: Environmental Management System (EMS), LEED,
									GreenCO, Ecomark certificate, etc.) (PDF of Maximum Size 500KB)</span>
								</div>
							</div> -->
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Photographs or Videos of products/services offered</label>
									<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="<?= $application['id_255403'] ?>" data-max-file-size="1M" data-allowed-file-extensions="pdf" />
									<span class="form-text">(PDF of Maximum Size 500KB)</span>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Collaterals to Support the Impact</label>
									<input type="file" accept="application/pdf" name="doc4" class="dropify" data-default-file="<?= $application['id_255404'] ?>" data-max-file-size="500K" data-allowed-file-extensions="pdf" />
									<span class="form-text">Collaterals to support impact mentioned in the application form</span>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Any other Collaterals</label>
									<input type="file" accept="application/pdf" name="doc5" class="dropify" data-default-file="<?= $application['id_255405'] ?>" data-max-file-size="1M" data-allowed-file-extensions="pdf" />
									<span class="form-text">(Awards / Articles / Certificates, etc.) in a Single PDF (PDF of Maximum Size 500KB)</span>
								</div>
							</div>
						</div>

						<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

						<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
						<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js"></script>

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
							/* PDF.js - Run PDF Version Check */
							$('.dropify').each((index, elem) => {
								$(elem).on('change', function(event) {
									// Access the selected file directly from the event object
									const file = event.target.files[0];

									// Check if a file is actually selected
									if (!file) {
										console.warn('No file selected for dropify element:', this);
										return; // Exit the function if no file is selected
									}

									// Create a new FileReader object for each file
									const reader = new FileReader();

									reader.onload = (event) => {
										const arrayBuffer = event.target.result;
										console.log('ArrayBuffer:', arrayBuffer);

										// Assuming you have pdfjsLib loaded:
										pdfjsLib.getDocument(arrayBuffer).promise.then((pdfDoc) => {
											pdfDoc.getMetadata().then((metadata) => {
												console.log('Metadata:', metadata.info.PDFFormatVersion);
												if (metadata.info.PDFFormatVersion > "1.7") {
													alert('PDF Version not Supported!');
												}
											});
										}).catch((error) => {
											console.error('Error getting PDF version:', error);
										});
									};

									// Read the file as an ArrayBuffer
									reader.readAsArrayBuffer(file);
								});
							});
						</script>
					</fieldset>

				</div>
			</div>
			<div class="col-12">
				<div class="row">
					<div class="col-md-auto">
						<a href="<?= base_url('dashboard/application/' . $application_id . '?stage=' . $stage - 1) ?>" class="btn btn-outline-secondary">Back</a>
					</div>
					<div class="col-md-auto">
						<button type="submit" class="btn btn-primary">Confirm and Submit</button>
					</div>
				</div>
			</div>
		</div>
		<?= form_close() ?>
	</div>
</div>
<script>
	function parseDDMMYYYYDate(dateString) {
		let parts = dateString.split('/');
		let day = parseInt(parts[0], 10);
		let month = parseInt(parts[1], 10) - 1; // Months are 0-indexed
		let year = parseInt(parts[2], 10);

		return new Date(year, month, day);
	}
	$('[name=initiative_start_date]').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'dd/mm/yy',
		maxDate: '<?= date('d/m/Y') ?>',

	});
	$('[name=initiative_end_date]').datepicker({
		changeMonth: true,
		changeYear: true,
		showButtonPanel: true,
		dateFormat: 'dd/mm/yy',
	});

	$.validator.addMethod("greater_than", function(value, element, param) {

		var d1 = new Date(Date.parse(value));
		var d2 = new Date(Date.parse($(param).val()));
		console.log([value, $(param).val()]);
		console.log([parseDDMMYYYYDate(value.trim()), parseDDMMYYYYDate($(param).val().trim())]);

		return parseDDMMYYYYDate(value.trim()) > parseDDMMYYYYDate($(param).val().trim());
	});
	$.validator.addMethod("emailregex", function(value, element) {
		return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
	})
	$.validator.addMethod("letters", function(value, element) {
		return this.optional(element) || /^[a-zA-Z\s']*$/i.test(value);
	});
	$.validator.addMethod("phone", function(value, element) {
		return this.optional(element) || /^[0-9]*$/i.test(value);
	});
	$("#formFullView").validate({
		ignore: [
			":hidden", ":focus"
		],
		rules: {
			"contact_person[email]": {
				emailregex: true
			},
			"contact_person[contact]": {
				phone: true
			},
			overview: {
				wordCount: 300
			},
			organization_overview: {
				maxlength: 5000,
				minlength: 50
			},
			organization_mission_vision: {
				maxlength: 5000,
				minlength: 50
			},
			organization_services: {
				maxlength: 5000,
				minlength: 50
			},
			services_stmt: {
				wordCount: 300
			},
			case_study_1: {
				maxlength: 5000,
				minlength: 50
			},
			case_study_2: {
				maxlength: 5000,
				minlength: 50
			},
			initiative_strategy: {
				maxlength: 5000,
				minlength: 50
			},
			initiative_end_date: {
				greater_than: '[name=initiative_start_date]'
			},
		},
		messages: {
			'contact_person[email]': {
				emailregex: 'Please enter a valid email address.'
			},
			'contact_person[contact]': {
				phone: 'Please enter a valid contact number'
			},
			overview: {
				wordCount: "Error"
			},
			organization_overview: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			organization_mission_vision: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			organization_services: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			services_stmt: {
				wordCount: "Error"
			},
			case_study_1: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			case_study_2: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			initiative_strategy: {
				maxlength: "Please enter no more than 5000 characters.",
				minlength: "Please enter at least 50 characters.",
			},
			initiative_end_date: {
				greater_than: 'End Date should be greater than Start Date'
			},
		}
	});
</script>

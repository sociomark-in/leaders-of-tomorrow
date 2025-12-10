<div class="row g-3">
	<div class="col-12 grid-margin stretch-card">
		<div class="row g-3">
			<div class="col-12">
				<div class="row g-md-5 g-3">
					<!-- 1. BASIC INFORMATION: ADDRESS & EQUITY PENDING -->
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
									<label for="" class="form-label">Participating Entity (Organization Name)</label>
									<input required type="text" value="<?= $application['organization_name'] ?? '' ?>" name="organization[name]" class="form-control">
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Business Segment</label>
									<select required name="organization[segment]" id="" class="form-select">
										<option value="">Select Business Segment</option>
										<option value="Micro" <?= isset($application['id_255003']) && $application['id_255003'] === 'Micro' ? 'selected' : '' ?>>Micro</option>
										<option value="Small" <?= isset($application['id_255003']) && $application['id_255003'] === 'Small' ? 'selected' : '' ?>>Small</option>
										<option value="Medium" <?= isset($application['id_255003']) && $application['id_255003'] === 'Medium' ? 'selected' : '' ?>>Medium</option>
									</select>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Date of Company Incorporation</label>
									<input required type="text" data-type="date" name="organization[inc_date]" value="<?= $application['id_255002'] ?? '' ?>" class="form-control">
									<span class="form-text">(in DD/MM/YYYY)</span>
								</div>
							</div>
							<div class="col-12">
								<div class="row g-3">
									<div class="col-12">
										<label for="" class="form-label">Registered Address Participating Entity</label>
										<input required type="text" name="organization[address][line_1]" value="<?= $address['0'] ?? '' ?>" class="form-control mb-2">
										<input type="text" name="organization[address][line_2]" value="<?= $address['1'] ?? '' ?>" class="form-control mb-2">
										<input type="text" name="organization[address][line_3]" value="<?= $address['2'] ?? '' ?>" class="form-control mb-2">
									</div>
									<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
										<label for="" class="form-label">State</label>
										<!-- <input type="text" placeholder="" name="organization[address][state]" value="<?= $application['organization_state'] ?>" class="form-control"> -->
										<select required name="organization[address][state]" id="stateSelect" data-placeholder="Select State" class="form-select">
											<option value="">Select State</option>
											<?php foreach ($locations['states'] as $key => $option) : ?>
												<option value="<?= $option['city_state'] ?>" <?= isset($application['organization_state']) && $application['organization_state'] === $option['city_state'] ? 'selected' : '' ?>><?= $option['city_state'] ?></option>
											<?php endforeach ?>
										</select>
									</div>
									<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
										<label for="" class="form-label">City</label>
										<select required name="organization[address][city]" id="citySelect" class="form-select">
											<option value="">Select City</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-12">
								<div class="">
									<label for="" class="form-label">Type of Ownership</label>
									<select required name="organization[ownership]" id="my-select" class="form-select mb-1">
										<option value="">Select Ownership Type</option>
										<option value="Sole Proprietorship" <?= isset($application['id_255005']) && $application['id_255005'] === 'Sole Proprietorship' ? 'selected' : '' ?>>Sole Proprietorship</option>
										<option value="Partnership" <?= isset($application['id_255005']) && $application['id_255005'] === 'Partnership' ? 'selected' : '' ?>>Partnership</option>
										<option value="Private Limited" <?= isset($application['id_255005']) && $application['id_255005'] === 'Private Limited' ? 'selected' : '' ?>>Private Limited</option>
										<option value="Other" <?= isset($application['id_255005']) && $application['id_255005'] === 'Other' ? 'selected' : '' ?>>Other (Please Specify)</option>
									</select>
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
									<label for="" class="form-label">Website URL</label>
									<input type="url" placeholder="https://www.domain.xyz" value="<?= $application['organization_url'] ?? '' ?>" name="organization[url]" class="form-control">
								</div>
							</div>
							<div class="col-12">
								<!-- EQUITY SPLIT -->
								<label for="" class="form-label">Equity Split Between Partners</label>
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
									<label for="" class="form-label">Name of the Applicant (MD/CEO/Founder or equivalent)</label>
									<input required type="text" name="name" value="<?= $application['name'] ?? '' ?>" class="form-control">
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Designation</label>
									<input required type="text" name="designation" value="<?= $application['designation'] ?? '' ?>" class="form-control">
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Date of Birth</label>
									<input required type="text" data-type="date" name="dob" value="<?= $application['id_255008'] ?? '' ?>" class="form-control">
									<span class="form-text">(in DD/MM/YYYY)</span>
								</div>
							</div>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
								<div class="">
									<label for="" class="form-label">Gender</label>
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
					<fieldset class="col-12">
						<legend class="card-title mb-0">
							<h5>Primary Contact for Award Coordination<sup class="text-danger">&ast;</sup></h5>
						</legend>
						<div class="row g-3">
							<div id="sectionChange" class="col-12">
								<div class="row g-3">
									<div class="col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Full Name of Individual</label>
											<input required name="contact_person[name]" value="<?= $application['id_255901'] ?? '' ?>" type="text" class="form-control">
										</div>
									</div>
									<div class="col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Email Address</label>
											<input required name="contact_person[email]" value="<?= $application['id_255902'] ?? '' ?>" type="email" class="form-control">
										</div>
									</div>
									<div class="col-xl-3 col-lg-6 col-12">
										<div class="">
											<label for="" class="form-label">Contact Number</label>
											<input required name="contact_person[contact]" value="<?= $application['id_255903'] ?? '' ?>" minlength="10" maxlength="10" type="text" class="form-control">
										</div>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<!-- 1. BASIC INFORMATION: ADDRESS & EQUITY PENDING -->

					<!-- 2. FINANCIAL DETAILS -->
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
										Annual Turnover (INR in Crores)
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="financial_1_2" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255101'] == "Less than 25") ? "selected" : "" ?> value="Less than 25">Less than 25</option>
											<option <?= ($application['id_255101'] == "25 - 49") ? "selected" : "" ?> value="25 - 49">25 - 49</option>
											<option <?= ($application['id_255101'] == "50 - 149") ? "selected" : "" ?> value="50 - 149">50 - 149</option>
											<option <?= ($application['id_255101'] == "150 - 300") ? "selected" : "" ?> value="150 - 300">150 - 300</option>
											<option <?= ($application['id_255101'] == "301 - 500") ? "selected" : "" ?> value="301 - 500">301 - 500</option>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="financial_1_1" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255102'] == "Less than 25") ? "selected" : "" ?> value="Less than 25">Less than 25</option>
											<option <?= ($application['id_255102'] == "25 - 49") ? "selected" : "" ?> value="25 - 49">25 - 49</option>
											<option <?= ($application['id_255102'] == "50 - 149") ? "selected" : "" ?> value="50 - 149">50 - 149</option>
											<option <?= ($application['id_255102'] == "150 - 300") ? "selected" : "" ?> value="150 - 300">150 - 300</option>
											<option <?= ($application['id_255102'] == "301 - 500") ? "selected" : "" ?> value="301 - 500">301 - 500</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="row g-3">
									<div class="col-xxl-4 col-12">
										EBITDA margin (In %)
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="financial_2_2" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255103'] == "Break - even / Negative") ? "selected" : "" ?> value="Break - even / Negative">
												Break - even / Negative</option>
											<option <?= ($application['id_255103'] == "1% - 10%") ? "selected" : "" ?> value="1% - 10%">1% - 10%</option>
											<option <?= ($application['id_255103'] == "11% - 20%") ? "selected" : "" ?> value="11% - 20%">11% - 20%</option>
											<option <?= ($application['id_255103'] == "20% - 40%") ? "selected" : "" ?> value="20% - 40%">20% - 40%</option>
											<option <?= ($application['id_255103'] == "> 40%") ? "selected" : "" ?> value="> 40%">> 40%</option>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="financial_2_1" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255104'] == "Break - even / Negative") ? "selected" : "" ?> value="Break - even / Negative">
												Break - even / Negative</option>
											<option <?= ($application['id_255104'] == "1% - 10%") ? "selected" : "" ?> value="1% - 10%">1% - 10%</option>
											<option <?= ($application['id_255104'] == "11% - 20%") ? "selected" : "" ?> value="11% - 20%">11% - 20%</option>
											<option <?= ($application['id_255104'] == "20% - 40%") ? "selected" : "" ?> value="20% - 40%">20% - 40%</option>
											<option <?= ($application['id_255104'] == "> 40%") ? "selected" : "" ?> value="> 40%">> 40%</option>
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
										<select required name="financial_3_2" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255105'] == "< 10%") ? "selected" : "" ?> value="< 10%">
												< 10%</option>
											<option <?= ($application['id_255105'] == "11% - 15%") ? "selected" : "" ?> value="11% - 15%">11% - 15%</option>
											<option <?= ($application['id_255105'] == "16% - 20%") ? "selected" : "" ?> value="16% - 20%">16% - 20%</option>
											<option <?= ($application['id_255105'] == "21% - 25%") ? "selected" : "" ?> value="21% - 25%">21% - 25%</option>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="financial_3_1" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255106'] == "< 10%") ? "selected" : "" ?> value="< 10%">
												< 10%</option>
											<option <?= ($application['id_255106'] == "11% - 15%") ? "selected" : "" ?> value="11% - 15%">11% - 15%</option>
											<option <?= ($application['id_255106'] == "16% - 20%") ? "selected" : "" ?> value="16% - 20%">16% - 20%</option>
											<option <?= ($application['id_255106'] == "21% - 25%") ? "selected" : "" ?> value="21% - 25%">21% - 25%</option>
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
										<select required name="financial_4_2" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255107'] == "Break-even / negative") ? "selected" : "" ?> value="Break-even / negative">
												Break-even / negative</option>
											<option <?= ($application['id_255107'] == "1%-4%") ? "selected" : "" ?> value="1%-4%">1%-4%</option>
											<option <?= ($application['id_255107'] == "5-10%") ? "selected" : "" ?> value="5-10%">5-10%</option>
											<option <?= ($application['id_255107'] == "11% - 20%") ? "selected" : "" ?> value="11% - 20%">11% - 20%</option>
											<option <?= ($application['id_255107'] == "> 20%") ? "selected" : "" ?> value="> 20%">> 20%</option>
										</select>
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="financial_4_1" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255108'] == "Break-even / negative") ? "selected" : "" ?> value="Break-even / negative">
												Break-even / negative</option>
											<option <?= ($application['id_255108'] == "1%-4%") ? "selected" : "" ?> value="1%-4%">1%-4%</option>
											<option <?= ($application['id_255108'] == "5-10%") ? "selected" : "" ?> value="5-10%">5-10%</option>
											<option <?= ($application['id_255108'] == "11% - 20%") ? "selected" : "" ?> value="11% - 20%">11% - 20%</option>
											<option <?= ($application['id_255108'] == "> 20%") ? "selected" : "" ?> value="> 20%">> 20%</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="row g-3">
									<div class="col-xxl-4 col-12">
										Revenue Growth %
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="financial_5_1" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255109'] == "< 10%") ? "selected" : "" ?> value="< 10%">
												< 10%</option>
											<option <?= ($application['id_255109'] == "10-25%") ? "selected" : "" ?> value="10-25%">10-25%</option>
											<option <?= ($application['id_255109'] == "26-50%") ? "selected" : "" ?> value="26-50%">26-50%</option>
											<option <?= ($application['id_255109'] == "51-100%") ? "selected" : "" ?> value="51-100%">51-100%</option>
											<option <?= ($application['id_255109'] == "> 100%") ? "selected" : "" ?> value="> 100%">> 100%</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="row g-3">
									<div class="col-xxl-4 col-12">
										Debt-to-Equity Ratio
									</div>
									<div class="col-xxl-4 col-lg-6 col-12">
										<select required name="financial_6_1" id="" class="form-select">
											<option value="">Select Option</option>
											<option <?= ($application['id_255110'] == " < 1.0") ? "selected" : "" ?> value="< 1.0">
												< 1.0</option>
											<option <?= ($application['id_255110'] == "1.0 - 2.0") ? "selected" : "" ?> value="1.0 - 2.0">1.0 - 2.0</option>
											<option <?= ($application['id_255110'] == "2.0 - 3.0") ? "selected" : "" ?> value="2.0 - 3.0">2.0 - 3.0</option>
											<option <?= ($application['id_255110'] == "> 3.0") ? "selected" : "" ?> value="> 3.0">> 3.0</option>
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
						<div class="row g-3 mb-3">
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
								</div>
							</div>
							<div class="col-xl-6 col-12">
								<div class="">
									<label for="" class="form-label">Target Market Segment and Geographic Reach</label>
									<div class="row">
										<div class="col-xl-6">
											<input type="text" required name="organization[domestic]" value="<?= $application['id_255204'] ?? "" ?>" placeholder="Domestic" class="form-control">
										</div>
										<div class="col-xl-6">
											<input type="text" name="organization[international]" value="<?= $application['id_255205'] ?? "" ?>" placeholder="International" class="form-control">
										</div>
									</div>
								</div>
							</div>

							<div class="col-12">
								<div class="">
									<label for="" class="form-label">Brief Description of the Business</label>
									<textarea required name="organization_overview" id="" class="form-control" rows="5"><?= $application['id_255202'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>
							<div class="col-12">
								<div class="">
									<label for="" class="form-label">Core Products / Services Offered</label>
									<textarea required name="organization_services" id="" class="form-control" rows="5"><?= $application['id_255203'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>
						</div>
					</fieldset>
					<!-- 2. FINANCIAL DETAILS -->

					<!-- 3. CASE STUDIES -->
					<fieldset class="col-12">
						<div class="mb-3">
							<legend class="card-title mb-0">
								<h5>Innovation & Initiative Overview<sup class="text-danger">&ast;</sup></h5>
							</legend>
							<!-- <p class="text-muted"></p> -->
						</div>
						<div class="row g-3 flex-row-reverse">
							<div class="col-lg-4">
								<div class="bg-light p-3">
									<p>Please cover:</p>
									<ul>
										<li>The problem/opportunity you aimed to address</li>
										<li>The innovation or distinctive approach (product, process, technology, business model, market entry, etc.)</li>
										<li>How this initiative aligns with your overall business strategy</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-8 col-12">
								<div class="">
									<label for="" class="form-label">Describe the key initiative/product/service or business transformation your organisation implemented between April 01, 2023 and March 31, 2025? </label>
									<textarea required name="case_study_1" id="" class="form-control" maxlength="5000" rows="5"><?= $application['id_255301'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="col-12">
						<div class="mb-3">
							<legend class="card-title mb-0">
								<h5>Measurable Outcomes & Business Impact<sup class="text-danger">&ast;</sup></h5>
							</legend>
						</div>
						<div class="row g-3 flex-row-reverse">
							<div class="col-lg-4">
								<div class="p-3 bg-light">
									<p>Wherever possible, include metrics such as (as applicable):</p>
									<ul>
										<li>Revenue growth, profitability, or margin improvement</li>
										<li>Operational efficiency, productivity gains, or cost optimisation</li>
										<li>Customer acquisition/retention, NPS/CSAT, market share</li>
										<li>Sustainability/ESG improvements (e.g., waste reduction, energy savings)</li>
									</ul>
									<p>Avoid generic statements; focus on specific, measurable results</p>
								</div>
							</div>
							<div class="col-xl-8">
								<div class="">
									<label for="" class="form-label">Share the quantifiable outcomes achieved during the eligibility period because of this initiative </label>
									<textarea required name="case_study_2" id="" class="form-control" maxlength="5000" rows="5"><?= $application['id_255302'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>
						</div>
					</fieldset>
					<fieldset class="col-12">
						<div class="mb-3">
							<legend class="card-title mb-0">
								<h5>Scalability & Future Growth Plan<sup class="text-danger">&ast;</sup></h5>
							</legend>
						</div>
						<div class="row g-3 flex-row-reverse">
							<div class="col-lg-4">
								<div class="p-3 bg-light">
									<p>You may highlight:</p>
									<ul>
										<li>Planned geographic or market expansion</li>
										<li>Technology upgrades or digital transformation roadmap</li>
										<li>Talent and capability building</li>
										<li>Investments in capacity, R&D, partnerships</li>
										<li>How you will ensure long-term sustainability and competitiveness</li>
									</ul>

								</div>
							</div>
							<div class="col-xl-8">
								<div class="">
									<label for="" class="form-label">Explain how you plan to scale this initiative and your business over the next 3–5 years</label>
									<textarea required name="case_study_3" id="" class="form-control" maxlength="5000" rows="5"><?= $application['id_255303'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>
						</div>
					</fieldset>
					<!-- 3. CASE STUDIES -->

					<!-- 4. INDIVIDUAL CATEGORY -->
					<fieldset class="col-12">
						<legend class="card-title mb-0">
							<h5>Individual Category Preference & Entrepreneur Insight<sup class="text-danger">&ast;</sup></h5>
						</legend>
						<div class="row g-3">
							<div class="col-12">
								<p>I wish to additionally be considered for:</p>
							</div>
							<div class="col-xl-4">
								<div class="border rounded-1 p-2 p-lg-3">
									<div class="form-check">
										<input required name="alt_category_id" value="1_INDIVIDUAL" class="form-check-input" type="radio" id="checkOption1" <?= ($application['id_255601'] == "1_INDIVIDUAL") ?	 "checked" : "" ?>>
										<label class="form-check-label" for="checkOption1">
											<h5 class="mb-2">Entrepreneur of the Year</h5>
											<small class="text-muted">
												I confirm that I am <strong>more than 35 years</strong> of age as on <strong>March 31, 2025</strong>, and my MSME is <strong>more than 2 years</strong> old.
											</small>
										</label>
									</div>
								</div>
							</div>
							<div class="col-xl-4">
								<div class="border rounded-1 p-2 p-lg-3">
									<div class="form-check">
										<input required name="alt_category_id" value="2_INDIVIDUAL" class="form-check-input" type="radio" id="checkOption2" <?= ($application['id_255601'] == "2_INDIVIDUAL") ?	 "checked" : "" ?>>
										<label class="form-check-label" for="checkOption2">
											<h5 class="mb-2">Next Gen Innovator</h5>
											<small class="text-muted">
												I confirm that I am <strong>up to 35 years</strong> of age as on <strong>March 31, 2025</strong>, and my MSME is <strong>more than 2 and less than 5 years</strong> old.
											</small>
										</label>
									</div>
								</div>
							</div>
							<div class="col-xl-4">
								<div class="border rounded-1 p-2 p-lg-3">
									<div class="form-check">
										<input required name="alt_category_id" value="3_INDIVIDUAL" class="form-check-input" type="radio" id="checkOption3" <?= ($application['id_255601'] == "3_INDIVIDUAL") ?	 "checked" : "" ?>>
										<label class="form-check-label" for="checkOption3">
											<h5 class="mb-2">Woman Entrepreneur of the Year</h5>
											<small class="text-muted">
												I confirm that I am <strong>a woman entrepreneur</strong> and hold <strong>at least 33% equity stake</strong> in the organization
											</small>
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="form-text">
							<p>(Please tick only those that are relevant and for which you meet the eligibility criteria)</p>
						</div>
					</fieldset>
					<fieldset class="col-12">
						<div class="mb-3">
							<legend class="card-title mb-0">
								<h5>Entrepreneur of the Year<sup class="text-danger">&ast;</sup></h5>
							</legend>
							<p class="text-muted">(The response to this question will be used to evaluate and determine the finalists for the "Entrepreneur of the Year" category. By submitting this response, you consent to its consideration for this awards category.)</p>
						</div>
						<div class="row g-3">
							<div class="col-12">
								<div class="">
									<label for="" class="form-label">Describe the most significant innovation or transformation you have implemented in your business and its impact on your organization&#39;s growth and outcomes. Highlight how this has set your business apart in the industry.</label>
									<textarea required name="case_study_individual" id="" class="form-control" maxlength="5000" rows="5"><?= $application['id_255602'] ?></textarea>
									<span class="form-text">(50 - 5000 characters)</span>
								</div>
							</div>
						</div>
					</fieldset>
					<!-- 4. INDIVIDUAL CATEGORY -->

					<!-- 5. UPLOAD FILES -->
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
									<label for="" class="form-label">MSME Certificate&nbsp;<a class="link-icon" href="<?= base_url($application['id_255401']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
									<input type="file" accept="application/pdf" name="doc1" class="dropify" data-default-file="<?= $application['id_255401'] ?>" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
									<span class="form-text">document supporting received from Ministry of MSME, Govt. of India (PDF of Maximum Size 2MB)</span>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Incorporation Certificate&nbsp;<a class="link-icon" href="<?= base_url($application['id_255402']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
									<input type="file" accept="application/pdf" name="doc2" class="dropify" data-default-file="<?= $application['id_255402'] ?>" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
									<span class="form-text">(PDF of Maximum Size 2MB)</span>
								</div>
							</div>
							<!-- <div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Applicable Environmental Certifications</label>
									<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="<?= $application['id_255403'] ?>" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
									<span class="form-text">(ISO 14001: Environmental Management System (EMS), LEED,
									GreenCO, Ecomark certificate, etc.) (PDF of Maximum Size 2MB)</span>
								</div>
							</div> -->
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Photographs or Videos of products/services offered&nbsp;<a class="link-icon" href="<?= base_url($application['id_255403']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
									<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="<?= $application['id_255403'] ?>" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
									<span class="form-text">(PDF of Maximum Size 2MB)</span>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Collaterals to Support the Impact&nbsp;<a class="link-icon" href="<?= base_url($application['id_255404']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
									<input type="file" accept="application/pdf" name="doc4" class="dropify" data-default-file="<?= $application['id_255404'] ?>" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
									<span class="form-text">Collaterals to support impact mentioned in the application form</span>
								</div>
							</div>
							<div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Any other Collaterals&nbsp;<a class="link-icon" href="<?= base_url($application['id_255405']) ?>" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
									<input type="file" accept="application/pdf" name="doc5" class="dropify" data-default-file="<?= $application['id_255405'] ?>" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
									<span class="form-text">(Awards / Articles / Certificates, etc.) in a Single PDF (PDF of Maximum Size 2MB)</span>
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
					<!-- 5. UPLOAD FILES -->
				</div>
			</div>
		</div>
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

	$(document).ready(function() {
		// 1. Get references to the elements using jQuery selectors
		const $template = $('#partnerNode');
		const $container = $('#equityTable tbody');
		const $addButton = $('#addPartnerButton');

		// Initialize the counter for the next index number
		// Start at 0 if no items exist on load
		let itemIndex = $container.find('tr').length;

		console.log("Rows:" + itemIndex);


		// --- FUNCTION TO ADD AND RENAME THE ITEM ---
		const addPartner = () => {
			// 1. Clone the content
			itemIndex++;
			const templateContent = $template[0].content;
			if (!templateContent) return;

			// Perform a deep clone and wrap it in jQuery
			const cloneFragment = document.importNode(templateContent, true);
			const $newClone = $(cloneFragment);

			// 2. Find all input fields within the clone
			$newClone.find('input, select, textarea').each(function() {
				const $input = $(this);
				let currentName = $input.attr('name');

				// Replace the '__INDEX__' placeholder with the current index number
				if (currentName) {
					currentName = currentName.replace('__INDEX__', itemIndex);
					$input.attr('name', currentName);

					// Optional: Clear the value of the new input
					$input.val('');
				}
			});

			$newClone.find('select').each(function() {
				const $input = $(this);
				let currentName = $input.attr('name');

				// Replace the '__INDEX__' placeholder with the current index number
				if (currentName) {
					currentName = currentName.replace('__INDEX__', itemIndex);
					$input.attr('name', currentName);

					// Optional: Clear the value of the new input
					$input.val('');
				}
			});


			const $selectElement = $newClone.find('select');

			// 4. Append the renamed clone to the container
			$container.append($newClone);

			if ($selectElement.length) {
				$selectElement.select2({
					// You can pass any required Select2 options here
					placeholder: "Select an option",
					allowClear: true,
					width: "100%"
				});
			}

			console.log("Rows:" + itemIndex);
		};

		// --- EVENT LISTENERS ---

		// Attach the add function to the button
		$addButton.on('click', addPartner);

		// Initial load: Add one item automatically if none exist (optional)
		if (itemIndex === 0) {
			addPartner();
		}
	});
</script>

<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_02']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<input type="hidden" name="referrer" value="<?= $referrer ?>">
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
 -->
	<div class="row g-3 g-md-4">
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
							Net Profit Margin (In %)
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
				<div class="col-12">
					<div class="row g-3">
						<div class="col-xxl-4 col-12">
							Return On Assets (ROA)
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="organization_assets" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255106'] == "< 5%") ? "selected" : "" ?> value="< 5%">
									< 5%</option>
								<option <?= ($application['id_255106'] == "5% - 10%") ? "selected" : "" ?> value="5% - 10%">5% - 10%</option>
								<option <?= ($application['id_255106'] == "11% - 15%") ? "selected" : "" ?> value="11% - 15%">11% - 15%</option>
								<option <?= ($application['id_255106'] == "16% - 20%") ? "selected" : "" ?> value="16% - 20%">16% - 20%</option>
								<option <?= ($application['id_255106'] == "> 20%") ? "selected" : "" ?> value="> 20%">> 20%</option>
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
							<select required name="organization_der_23" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255107'] == " Less than 1.0") ? "selected" : "" ?> value="< 1.0">
									< 1.0</option>
								<option <?= ($application['id_255107'] == "1.0 = 1.5") ? "selected" : "" ?> value="1.0 = 1.5">1.0 - 1.5</option>
								<option <?= ($application['id_255107'] == "1.6 - 2.0") ? "selected" : "" ?> value="1.6 - 2.0">1.6 - 2.0</option>
								<option <?= ($application['id_255107'] == "2.1 - 3.0") ? "selected" : "" ?> value="2.1 - 3.0">2.1 - 3.0</option>
								<option <?= ($application['id_255107'] == "Greater than 3.0") ? "selected" : "" ?> value="> 3.0">> 3.0</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="row g-3">
						<div class="col-xxl-4 col-12">
							Years of Involvement in Social Entrepreneurship
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="organization_involvement" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255108'] == "2 - 5 Years") ? "selected" : "" ?> value="2 - 5 Years">2 - 5 Years</option>
								<option <?= ($application['id_255108'] == "5 - 10 Years") ? "selected" : "" ?> value="5 - 10 Years">5 - 10 Years</option>
								<option <?= ($application['id_255108'] == "More than 10 Years") ? "selected" : "" ?> value="More than 10 Years">More than 10 Years</option>
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
				<div class="col-xxl-6 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Target Market Segment and Geographic Reach</label>
						<!--<input required type="text" value="<?= $application_temp['id_255201'] ?>" name="organization_reach" class="form-control">-->
						<select required name="organization[reach]" id="" class="form-select">
							<option value="">Select Option</option>
							<option <?= ($application['id_255201'] == "Domestic") ? "selected" : "" ?> value="Domestic">Domestic</option>
							<option <?= ($application['id_255201'] == "International") ? "selected" : "" ?> value="International">International</option>
						</select>
					</div>
				</div>
				<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
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
				<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">No. Of Beneficiary</label>
						<!--<input required type="number" value="<?= $application['id_255205'] ?>" name="organization[beneficiary]" class="form-control">-->
						<select required name="organization[beneficiary]" id="" class="form-select">
							<option value="">Select Option</option>
							<option <?= ($application['id_255205'] == "Less than 100") ? "selected" : "" ?> value="Less than 100">Less than 100</option>
							<option <?= ($application['id_255205'] == "100 - 500") ? "selected" : "" ?> value="100 - 500">100 - 500</option>
							<option <?= ($application['id_255205'] == "500 - 1000") ? "selected" : "" ?> value="500 - 1000">500 - 1000</option>
							<option <?= ($application['id_255205'] == "More than 1000") ? "selected" : "" ?> value="More than 1000">More than 1000</option>
						</select>
					</div>
				</div>
				<div class="col-xxl-4 col-xl-3 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">No. of community members directly impacted </label>
						<!--<input required type="number" value="<?= $application['id_255206'] ?>" name="organization[community_impact]" class="form-control">-->
						<select required name="organization[community_impact]" id="" class="form-select">
							<option value="">Select Option</option>
							<option <?= ($application['id_255206'] == "Less than 100") ? "selected" : "" ?> value="Less than 100">Less than 100</option>
							<option <?= ($application['id_255206'] == "100 - 500") ? "selected" : "" ?> value="100 - 500">100 - 500</option>
							<option <?= ($application['id_255206'] == "500 - 1000") ? "selected" : "" ?> value="500 - 1000">500 - 1000</option>
							<option <?= ($application['id_255206'] == "More than 1000") ? "selected" : "" ?> value="More than 1000">More than 1000</option>
						</select>
					</div>
				</div>
				<div class="col-xxl-4 col-xl-3 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">% of profits reinvested into social initiatives</label>
						<!--<input required type="number" value="<?= $application['id_255207'] ?>" name="organization[investment]" class="form-control">-->
							<select required name="organization[investment]" id="" class="form-select">
							<option value="">Select Option</option>
							<option <?= ($application['id_255207'] == "Less than 10%") ? "selected" : "" ?> value="Less than 10%">Less than 10%</option>
							<option <?= ($application['id_255207'] == "10 - 20") ? "selected" : "" ?> value="10 - 20">10% - 20%</option>
							<option <?= ($application['id_255207'] == "20 - 40") ? "selected" : "" ?> value="20 - 40">20% - 40%</option>
							<option <?= ($application['id_255207'] == "More than 40") ? "selected" : "" ?> value="More than 40">More than 40%</option>
						</select>
					</div>
				</div>
				<div class="col-xxl-4 col-xl-6 col-12">
					<div class="">
						<label for="" class="form-label">No. of new regions/communities targeted for expansion in the next 3 years</label>
						<select required name="organization[regions]" id="" class="form-select">
							<option value="">Select Option</option>
							<option <?= ($application['id_255208'] == "1 - 2") ? "selected" : "" ?> value="1 - 2">1 - 2</option>
							<option <?= ($application['id_255208'] == "3 - 5") ? "selected" : "" ?> value="3 - 5">3 - 5</option>
							<option <?= ($application['id_255208'] == "6 - 10") ? "selected" : "" ?> value="6 - 10">6 - 10</option>
							<option <?= ($application['id_255208'] == "More than 10") ? "selected" : "" ?> value="More than 10">More than 10</option>
						</select>
					</div>
				</div>
				<div class="col-12">
					<div class="">
						<label for="" class="form-label">Brief Description of the Business</label>
						<textarea required name="organization_overview" id="" class="form-control" rows="5"><?= $application_temp['id_255203'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
				<div class="col-12">
					<div class="">
						<label for="" class="form-label">Core Products / Services Offered</label>
						<textarea required name="organization_services" id="" class="form-control" rows="5"><?= $application_temp['id_255204'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
	</div>
	<div class="row g-3">
		<!-- <div class="col-md-auto">
		<a href="<?= base_url('dashboard/application/' . $application['id'] . '?stage=' . $stage - 1) ?>" class="btn btn-outline-secondary">Back</a>
	</div> -->
		<div class="col-md-auto">
			<button type="submit" class="btn btn-primary">Save and Next</button>
		</div>
		<div class="col-md-auto">
			<button type="reset" class="btn btn-outline-secondary">Reset This Section</button>
		</div>
	</div>
	<?= form_close() ?>
	<script>
		$.validator.addMethod("wordCount", function(value, element, wordCount) {

			return value.split(' ').length <= wordCount;

		});
		$("#form_option_02").validate({
			ignore: [
				":hidden", ":focus"
			],
			rules: {
				organization_overview: {
					maxlength: 5000,
					minlength: 50
				},
				organization_services: {
					maxlength: 5000,
					minlength: 50
				},
			},
			messages: {
				organization_overview: {
					maxlength: "Please enter no more than 5000 characters.",
					minlength: "Please enter at least 50 characters.",
				},
				organization_services: {
					maxlength: "Please enter no more than 5000 characters.",
					minlength: "Please enter at least 50 characters.",
				},
			}
		});
	</script>

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
							FY 2025
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							FY 2024
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="row g-3">
						<div class="col-xxl-4 col-12">
							Annual Turnover (INR in Crores)
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="organization_revenue_2" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255101'] == "5 - 24") ? "selected" : "" ?> value="5 - 24">5 - 24</option>
								<option <?= ($application['id_255101'] == "25 - 49") ? "selected" : "" ?> value="25 - 49">25 - 49</option>
								<option <?= ($application['id_255101'] == "50 - 149") ? "selected" : "" ?> value="50 - 149">50 - 149</option>
								<option <?= ($application['id_255101'] == "150 - 300") ? "selected" : "" ?> value="150 - 300">150 - 300</option>
								<option <?= ($application['id_255101'] == "301 - 500") ? "selected" : "" ?> value="301 - 500">301 - 500</option>
							</select>
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="organization_revenue_1" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255102'] == "5 - 24") ? "selected" : "" ?> value="5 - 24">5 - 24</option>
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
							<select required name="organization_growth_2" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255103'] == "Break-even/Negative") ? "selected" : "" ?> value="Break-even/Negative">Break-even / Negative</option>
								<option <?= ($application['id_255103'] == "1% - 10%") ? "selected" : "" ?> value="6% - 15%">6% - 15%</option>
								<option <?= ($application['id_255103'] == "11% - 20%") ? "selected" : "" ?> value="11% - 20%">11% - 20%</option>
								<option <?= ($application['id_255103'] == "20% - 40%") ? "selected" : "" ?> value="20% - 40%">20% - 40%</option>
								<option <?= ($application['id_255103'] == "> 40%") ? "selected" : "" ?> value="> 40%">> 40%</option>
							</select>
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="organization_growth_1" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255104'] == "Break-even/Negative") ? "selected" : "" ?> value="Break-even/Negative">Break-even / Negative</option>
								<option <?= ($application['id_255104'] == "1% - 10%") ? "selected" : "" ?> value="6% - 15%">6% - 15%</option>
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
							<select required name="organization_profit" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255105'] == "Break-even/Negative") ? "selected" : "" ?> value="Break-even/Negative">Break-even / Negative</option>
								<option <?= ($application['id_255105'] == "1% - 4%") ? "selected" : "" ?> value="1% - 4%">1% - 4%</option>
								<option <?= ($application['id_255105'] == "5% - 10%") ? "selected" : "" ?> value="5% - 10%">5% - 10%</option>
								<option <?= ($application['id_255105'] == "11% - 20%") ? "selected" : "" ?> value="11% - 20%">11% - 20%</option>
								<option <?= ($application['id_255105'] == "> 20%") ? "selected" : "" ?> value="> 20%">> 20%</option>
							</select>
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="organization_profit" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255106'] == "Break-even/Negative") ? "selected" : "" ?> value="Break-even/Negative">Break-even / Negative</option>
								<option <?= ($application['id_255106'] == "1% - 4%") ? "selected" : "" ?> value="1% - 4%">1% - 4%</option>
								<option <?= ($application['id_255106'] == "5% - 10%") ? "selected" : "" ?> value="5% - 10%">5% - 10%</option>
								<option <?= ($application['id_255106'] == "11% - 20%") ? "selected" : "" ?> value="11% - 20%">11% - 20%</option>
								<option <?= ($application['id_255106'] == "> 20%") ? "selected" : "" ?> value="> 20%">> 20%</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="row g-3">
						<div class="col-xxl-4 col-12">
							Revenue Growth % (FY 2024-25 over FY 2023-24)
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="organization_assets" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255107'] == "< 10%") ? "selected" : "" ?> value="< 10%">< 10%</option>
								<option <?= ($application['id_255107'] == "10% - 25%") ? "selected" : "" ?> value="10% - 25%">10% - 25%</option>
								<option <?= ($application['id_255107'] == "26% - 50%") ? "selected" : "" ?> value="26% - 50%">26% - 50%</option>
								<option <?= ($application['id_255107'] == "51% - 100%") ? "selected" : "" ?> value="51% - 100%">51% - 100%</option>
								<option <?= ($application['id_255107'] == "> 100%") ? "selected" : "" ?> value="> 100%">> 100%</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="row g-3">
						<div class="col-xxl-4 col-12">
							Debt-to-Equity Ratio (as on March 31, 2025)
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="organization_der_23" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255108'] == " Less than 1.0") ? "selected" : "" ?> value="< 1.0">< 1.0</option>
								<option <?= ($application['id_255108'] == "1.0 - 2.0") ? "selected" : "" ?> value="1.0 - 2.0">1.0 - 2.0</option>
								<option <?= ($application['id_255108'] == "2.1 - 3.0") ? "selected" : "" ?> value="2.1 - 3.0">2.1 - 3.0</option>
								<option <?= ($application['id_255108'] == "> 3.0") ? "selected" : "" ?> value="> 3.0">> 3.0</option>
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
						<span class="form-text">(On payroll + On contract) as on March 31, 2024</span>
					</div>
				</div>

				<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">Target Market Segment and Geographic Reach</label>
						<select required name="organization[members]" id="" class="form-select">
							<option value="">Select Option</option>
							<option <?= ($application['id_255202'] == "Domestic") ? "selected" : "" ?> value="Domestic">Domestic</option>
							<option <?= ($application['id_255202'] == "International") ? "selected" : "" ?> value="International">International</option>
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
		},
		messages: {
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
		}
	});
</script>

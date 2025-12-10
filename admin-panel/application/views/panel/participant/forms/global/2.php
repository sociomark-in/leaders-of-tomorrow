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
							Revenue/ Turnover (in INR Crores)
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
							Revenue from Global Markets (as a percentage of total revenue)
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="financial_2_2" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255103'] == "< 20%") ? "selected" : "" ?> value="< 20%">
									< 20%</option>
								<option <?= ($application['id_255103'] == "20%-39%") ? "selected" : "" ?> value="20%-39%">20%-39%</option>
								<option <?= ($application['id_255103'] == "40%-59%") ? "selected" : "" ?> value="40%-59%">40%-59%</option>
								<option <?= ($application['id_255103'] == "60%-80%") ? "selected" : "" ?> value="60%-80%">60%-80%</option>
								<option <?= ($application['id_255103'] == "> 80%") ? "selected" : "" ?> value="> 80%">> 80%</option>
							</select>
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="financial_2_1" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255104'] == "< 20%") ? "selected" : "" ?> value="< 20%">
									< 20%</option>
								<option <?= ($application['id_255104'] == "20%-39%") ? "selected" : "" ?> value="20%-39%">20%-39%</option>
								<option <?= ($application['id_255104'] == "40%-59%") ? "selected" : "" ?> value="40%-59%">40%-59%</option>
								<option <?= ($application['id_255104'] == "60%-80%") ? "selected" : "" ?> value="60%-80%">60%-80%</option>
								<option <?= ($application['id_255104'] == "> 80%") ? "selected" : "" ?> value="> 80%">> 80%</option>
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
							<select required name="financial_3_2" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255105'] == "Break - even / Negative") ? "selected" : "" ?> value="Break - even / Negative">
									Break - even / Negative</option>
								<option <?= ($application['id_255105'] == "1% - 10%") ? "selected" : "" ?> value="1% - 10%">1% - 10%</option>
								<option <?= ($application['id_255105'] == "11% - 20%") ? "selected" : "" ?> value="11% - 20%">11% - 20%</option>
								<option <?= ($application['id_255105'] == "20% - 40%") ? "selected" : "" ?> value="20% - 40%">20% - 40%</option>
								<option <?= ($application['id_255105'] == "> 40%") ? "selected" : "" ?> value="> 40%">> 40%</option>
							</select>
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="financial_3_1" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255106'] == "Break - even / Negative") ? "selected" : "" ?> value="Break - even / Negative">
									Break - even / Negative</option>
								<option <?= ($application['id_255106'] == "1% - 10%") ? "selected" : "" ?> value="1% - 10%">1% - 10%</option>
								<option <?= ($application['id_255106'] == "11% - 20%") ? "selected" : "" ?> value="11% - 20%">11% - 20%</option>
								<option <?= ($application['id_255106'] == "20% - 40%") ? "selected" : "" ?> value="20% - 40%">20% - 40%</option>
								<option <?= ($application['id_255106'] == "> 40%") ? "selected" : "" ?> value="> 40%">> 40%</option>
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
								<option <?= ($application['id_255107'] == "< 10%") ? "selected" : "" ?> value="< 10%">
									< 10%</option>
								<option <?= ($application['id_255107'] == "11% - 15%") ? "selected" : "" ?> value="11% - 15%">11% - 15%</option>
								<option <?= ($application['id_255107'] == "16% - 20%") ? "selected" : "" ?> value="16% - 20%">16% - 20%</option>
								<option <?= ($application['id_255107'] == "21% - 25%") ? "selected" : "" ?> value="21% - 25%">21% - 25%</option>
							</select>
						</div>
						<div class="col-xxl-4 col-lg-6 col-12">
							<select required name="financial_4_1" id="" class="form-select">
								<option value="">Select Option</option>
								<option <?= ($application['id_255107'] == "< 10%") ? "selected" : "" ?> value="< 10%">
									< 10%</option>
								<option <?= ($application['id_255107'] == "11% - 15%") ? "selected" : "" ?> value="11% - 15%">11% - 15%</option>
								<option <?= ($application['id_255107'] == "16% - 20%") ? "selected" : "" ?> value="16% - 20%">16% - 20%</option>
								<option <?= ($application['id_255107'] == "21% - 25%") ? "selected" : "" ?> value="21% - 25%">21% - 25%</option>
							</select>
						</div>
					</div>
				</div>
				
				<div class="col-12">
					<div class="row g-3">
						<div class="col-xxl-4 col-12">
							Export Revenue Growth %
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
				<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
					<div class="">
						<label for="" class="form-label">No. Of Employees Globally</label>
						<select required name="organization[size_global]" id="" class="form-select">
							<option value="">Select Option</option>
							<option <?= ($application['id_255206'] == "Less than 50") ? "selected" : "" ?> value="Less than 50">Less than 50</option>
							<option <?= ($application['id_255206'] == "50 - 100") ? "selected" : "" ?> value="50 - 100">50 - 100</option>
							<option <?= ($application['id_255206'] == "100 - 200") ? "selected" : "" ?> value="100 - 200">100 - 200</option>
							<option <?= ($application['id_255206'] == "200 - 400") ? "selected" : "" ?> value="200 - 400">200 - 400</option>
							<option <?= ($application['id_255206'] == "More than 400") ? "selected" : "" ?> value="More than 400">More than 400</option>
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
				<div class="col-12">
					<div class="">
						<label for="" class="form-label">Details of Cross-Border Collaborations/Partnerships established</label>
						<textarea required name="organization_collaborations" id="" class="form-control" rows="5"><?= $application['id_255207'] ?></textarea>
						<span class="form-text">(50 - 5000 characters)</span>
					</div>
				</div>
			</div>
		</fieldset>
		<!-- 2. FINANCIAL DETAILS -->
	</div>
</div>
<div class="row g-3">
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

	$(document).ready(function() {

		const $radioGroup = $('input[name="organization[target]"]');
		const $otherContainer = $('#other-text-input');
		const $otherInput = $($otherContainer.find('input, select'));

		// 2. Listen for changes on the Select2 element
		$radioGroup.on('change', function() {
			const selectedValue = $radioGroup.filter(':checked').val();
			console.log(selectedValue);


			if (selectedValue === 'yes') {
				$otherContainer.slideDown(200, function() {
					$otherInput.focus();
				});
				$otherInput.prop('required', true);

			} else {
				$otherContainer.slideUp(200);
				$otherInput.val('');
				$otherInput.prop('required', false);
			}
		});
	});
</script>

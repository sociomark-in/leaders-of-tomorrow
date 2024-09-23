<?= form_open_multipart('api/v2/awards/nomination/single/new', ['id' => 'form_option_03']) ?>
<div class="mb-3">
	<input type="hidden" name="category_id" value="<?= $category_id ?>">
	<input type="hidden" name="application_id" value="<?= $application_id ?? null ?>">
	<input type="hidden" name="utm" value="<?= $utm ?>">
	<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
	<input type="hidden" name="stage" value="<?= $stage ?>">
	<input type="hidden" name="referrer" value="<?= $referrer ?>">

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
					<input type="text" name="initiative_name" class="form-control">
				</div>
			</div>
			<div class="col-xl-3 col-12">
				<div class="">
					<label for="" class="form-label">Start Date</label>
					<input required type="text" data-type="date" name="initiative_start_date" class="form-control">
					<span class="form-text">(in DD/MM/YYYY)</span>
				</div>
			</div>
			<div class="col-xl-3 col-12">
				<div class="">
					<label for="" class="form-label">End Date</label>
					<input required type="text" data-type="date" name="initiative_end_date" class="form-control">
					<span class="form-text">(in DD/MM/YYYY)</span>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Describe the initiative/product/service that you organization has developed between the period of April 01, 2022, to March 31, 2023 that has led to business success. What was the problem that you aimed to address through the initiative/product/service? (Max 200 words)</label>
					<textarea required name="initiative_desc" id="" class="form-control" maxlength="500" rows="5"></textarea>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Highlight the challenges faced by you as an MSME to implement the initiative or product/service offering mentioned above and how did the organization overcome these challenges? (Max 150 words)</label>
					<textarea required name="initiative_challenges" id="" class="form-control" maxlength="500" rows="5"></textarea>
				</div>
			</div>
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">Elaborate on your go-market-strategy for introducing the initiative/product/service into the market. Highlight the factors that differentiate you from your competitors. (Max 150 words)</label>
					<textarea required name="initiative_strategy" id="" class="form-control" maxlength="500" rows="5"></textarea>
				</div>
			</div>
		</div>
	</fieldset>
</div>
<div class="row g-3">
	<div class="col-md-auto">
		<button type="reset" class="btn btn-outline-secondary">Reset Form</button>
	</div>
	<div class="col-md-auto">
		<button type="submit" class="btn btn-primary">Save and Next</button>
	</div>
</div>
<?= form_close() ?>
<script>
	$.validator.addMethod("wordCount", function(value, element, wordCount) {

		return value.split(' ').length <= wordCount;

	});
	$("#form_option_03").validate({
		ignore: [
			":hidden", ":focus"
		],
		rules: {
			overview: {
				wordCount: 300
			},
			mission_stmt: {
				wordCount: 300
			},
			services_stmt: {
				wordCount: 300
			},
		},
		messages: {
			overview: {
				wordCount: "Error"
			},
			mission_stmt: {
				wordCount: "Error"
			},
			services_stmt: {
				wordCount: "Error"
			},
		}
	});
</script>

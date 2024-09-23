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
				<h5>Use of Technology</h5>
			</legend>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad fugit, rerum nobis suscipit itaque ullam similique cupiditate? Molestias voluptatum repellendus a hic? Quo aut voluptatem molestias illo, iure accusamus cupiditate!</p>
		</div>
		<div class="row g-3">
			<div class="col-12">
				<div class="">
					<label for="" class="form-label">How have you leveraged technology while implementing the initiative/product/service? (Max 200 words)</label>
					<textarea required name="initiative_tech" id="" class="form-control" maxlength="500" rows="5"></textarea>
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
					<textarea required name="initiative_impact" id="" class="form-control" maxlength="500" rows="5"></textarea>
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
					<textarea required name="initiative_scalability" id="" class="form-control" maxlength="500" rows="5"></textarea>
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
					<textarea required name="initiative_info" id="" class="form-control" maxlength="500" rows="5"></textarea>
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

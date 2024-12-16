<?= form_open("api/v2/awards/nomination/single/new", ['id' => 'formView']) ?>
<input type="hidden" name="category_id" value="<?= $category_id ?>">
<input type="hidden" name="application_id" value="<?= $id ?? null ?>">
<input type="hidden" name="utm" value="<?= $utm ?>">
<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
<input type="hidden" name="stage" value="<?= $stage ?>">
<div class="row gap-3">
	<div class="col-12">
		<div class="form-check">
			<input class="form-check-input" name="confirm" type="checkbox" id="flexCheckChecked" required>
			<label class="form-check-label" for="flexCheckChecked">
				I, holding the position in
				<strong><?= $application['organization_name'] ?></strong>
				 hereby declare the following:
			</label>
		</div>

	</div>
	<div class="col-12">
		<div class="p-3 bg-light">
			<ul>
				<li>By submitting this form from the company’s official email ID, I hereby confirm that I am duly authorized to make this declaration as an authorized representative of the company.</li>
				<li>All the information contained in this application is true and accurate to the best of my knowledge.</li>
				<li>I understand that <strong><?= APP_NAME ?> Awards</strong> and it’s affiliates may choose not to take steps to verify the information contained therein, and responsibility for any harm or damages caused by my fraudulent or negligent misrepresentations will be my own. I also agree to abide by the terms and conditions mentioned on the Awards website and ‘<strong><?= APP_NAME ?> Awards</strong> Nomination Form’</li>
				<li>I authorize <strong><?= APP_NAME ?> Awards</strong> and it’s affiliates to use the content submitted as part of this entry, in whole or in part and use and display such entry, which shall include trade publications, press releases, electronic posting to the Awards website, electronic hyperlinks to the website of the Participant, and any display format selected by <strong><?= APP_NAME ?> Awards</strong> during the awards ceremony or at a later point in time, for a period of five years. Any such use shall ensure confidentiality and anonymity of information and data,
					as applicable.</li>
				<li>This declaration along with all other details pertaining to ‘<strong><?= APP_NAME ?> Awards</strong>’ are authorized and validated by the sender and shared using an official email ID of the organization.</li>
				<li>This declaration must be filled by an authorized signatory (preferably Chief Executive Officer or Chief Risk Officer) from the participant organization.</li>
				<li>In absence of a duly filled 'Declaration’ document, your nomination may not be considered.</li>
			</ul>
		</div>
	</div>
	<div class="col-12">
		<button type="submit" class="btn btn-primary">Confirm Nomination & Return to Dashboard</button>
	</div>
</div>
<?= form_close() ?>
<script>
	$("#formView").validate({
		ignore: [
			":hidden", ":focus"
		],
		rules: {
			//Rules
		},
		messages: {
			//messages
		}
	});
</script>

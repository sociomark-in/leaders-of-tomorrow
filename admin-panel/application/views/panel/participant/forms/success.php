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
			<ul class="mb-3">
				<li>
					I /We for and on behalf of my/ our organization declare to have read and understood the rules and regulations governing the Awards and voluntarily express our interest in participating in the Event.
				</li>
				<li>
					I/We declare that all information submitted as part of our application is complete, true and accurate. We understand that any kind of misrepresentation/ false claims could lead to disqualification at any point of evaluation during the Awards.
				</li>
				<li>
					I/We declare that the Promoters and Key Managerial Personnel of the participating entity and the participant entity itself are not subject to any litigations or disqualifications by any court of law or regulatory authorities.
				</li>
				<li>
					We authorize the Awards Management to use the content submitted as part of my/our entry, in whole or in part and use and display such entry, which shall include trade publications, press releases, electronic posting on the Awards website, electronic hyperlinks to the website of the Participant, and any display format selected by the Awards Management during or after the Awards event.
				</li>
				<li>
					I/ We further declare and confirm that (i) the decision taken by the investors and/or BCCL will be final and binding and we shall not raise or make any claims, allegations or action in respect of the same and the event or any part thereof against the investors and/or BCCL, its channels, directors, managements, employees, agents or authorised representatives; (ii) we shall not make any statements, claims or press releases, in any manner, directly or through any third party, on any public platform including any social media or any other online media in respect of our participation, selection and shortlisting or winning (as the case may be) relating to the event and that such act may lead to disqualification
				</li>
			</ul>
			<div class="">
				<p>Particiapant's Name:&nbsp;<strong><?= $application['name'] ?></strong></p>
				<p>Designation:&nbsp;<strong><?= $application['designation'] ?></strong></p>
				<p>Date:&nbsp;<strong><?= date('d-m-Y') ?></strong></p>
			</div>
		</div>
	</div>

	<!-- <div class="col-xl-4 col-lg-6 col-12">
		<div class="">
			<label for="" class="form-label">Are you an existing IDFC FIRST Bank Customer?</label>
			<div class="row ms-1">
				<div class="col-auto form-check">
					<input class="form-check-input" type="radio" name="is_idfc_customer" value="yes" id="idfcReferred" required>
					<label class="form-check-label" for="flexRadioDefault2">
						Yes
					</label>
				</div>
				<div class="col-auto form-check">
					<input class="form-check-input" type="radio" name="is_idfc_customer" value="no" required>
					<label class="form-check-label" for="flexRadioDefault1">
						No
					</label>
				</div>
			</div>
		</div>
	</div> -->

	<input type="hidden" name="is_idfc_customer" value="yes">

	<?php if (count($lead) > 0) : ?>

		<input type="hidden" name="agent_referrer" value="yes">
		<input type="hidden" name="agent_name" value="<?= $lead['created_by'] ?>">

	<?php else: ?>
		<div class="col-xl-4 col-lg-6 col-12">
			<div class="">
				<label for="" class="form-label">Were you assisted by our team to submit this nomination?</label>
				<div class="row ms-1">
					<div class="col-auto form-check">
						<input class="form-check-input" type="radio" name="agent_referrer" value="yes" id="agentReferred" required>
						<label class="form-check-label" for="flexRadioDefault2">
							Yes
						</label>
					</div>
					<div class="col-auto form-check">
						<input class="form-check-input" type="radio" name="agent_referrer" value="no" required>
						<label class="form-check-label" for="flexRadioDefault1">
							No
						</label>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-3 col-lg-6 col-12" id="agentDetails">
			<div class="">
				<label for="" class="form-label"> Please select their name</label>
				<!--<select name="agent_name" class="form-select" required>-->
				<!--	<option value="Nilam">Nilam</option>-->
				<!--	<option value="Savitri">Savy</option>-->
				<!--</select>-->
				<div class="row ms-1">
					<div class="col-auto form-check">
						<input class="form-check-input" type="radio" name="agent_name" value="Savitri" required>
						<label class="form-check-label" for="flexRadioDefault2">
							Savy
						</label>
					</div>
					<div class="col-auto form-check">
						<input class="form-check-input" type="radio" name="agent_name" value="Nilam" required>
						<label class="form-check-label" for="flexRadioDefault1">
							Nilam
						</label>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>

	<div class="col-12">
		<button type="submit" class="btn btn-primary">Submit Nomination & Return to Dashboard</button>
	</div>
</div>
<?= form_close() ?>
<script>
	$("#agentDetails").hide();
	$("input[type='radio'][name='agent_referrer'").change(function() {
		if ($(this).val() == "yes") {
			$("#agentDetails").show();
			$("input[name='agent_name']").each(function(index, element) {
				$(element).prop("required", true);
			});
		} else {
			$("#agentDetails").hide();
			$("input[name='agent_name']").each(function(index, element) {
				$(element).prop("required", false);
			});
		}

	});
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

<?= form_open("api/v2/awards/nomination/single/new", ['id' => 'formView']) ?>
<input type="hidden" name="category_id" value="<?= $category_id ?>">
<input type="hidden" name="application_id" value="<?= $id ?? null ?>">
<input type="hidden" name="utm" value="<?= $utm ?>">
<input type="hidden" name="agent_id" value="<?= $agent_id ?>">
<input type="hidden" name="stage" value="<?= $stage ?>">
<div class="row g-3 g-xl-5">
	<div class="col-12">
		<div class="form-check mb-3">
			<input class="form-check-input" name="confirm" type="checkbox" id="flexCheckChecked" required>
			<label class="form-check-label" for="flexCheckChecked">
				I, holding the position in
				<strong><?= $application['organization_name'] ?></strong>
				hereby declare the following:
			</label>
		</div>
		<div class="p-3 bg-light">
			<ul class="mb-3">
				<li>I /We for and on behalf of my/ our organization declare to have read and understood the rules and regulations governing the Awards and voluntarily express our interest in participating in the Event. </li>
				<li>I/We declare that all information submitted as part of our application is complete, true and accurate. We understand that any kind of misrepresentation/ false claims could lead to disqualification at any point of evaluation during the Awards. </li>
				<li>I/We declare that the Promoters and Key Managerial Personnel of the participating entity and the participant entity itself are not subject to any litigations or disqualifications by any court of law or regulatory authorities.</li>
				<li>We authorize the Awards Management to use the content submitted as part of my/our entry, in whole or in part and use and display such entry, which shall include trade publications, press releases, electronic posting on the Awards website, electronic hyperlinks to the website of the Participant, and any display format selected by the Awards Management during or after the Awards event.</li>
				<li>I/ We further declare and confirm that
					<ol>
						<li>the decision taken by the investors and/or BCCL will be final and binding and we shall not raise or make any claims, allegations or action in respect of the same and the event or any part thereof against the investors and/or BCCL, its channels, directors, managements, employees, agents or authorised representatives;</li>
						<li>we shall not make any statements, claims or press releases, in any manner, directly or through any third party, on any public platform including any social media or any other online media in respect of our participation, selection and shortlisting or winning (as the case may be) relating to the event and that such act may lead to disqualification</li>
					</ol>
				</li>
			</ul>
			<div class="">
				<p>Particiapant's Name:&nbsp;<strong><?= $application['name'] ?></strong></p>
				<p>Designation:&nbsp;<strong><?= $application['designation'] ?></strong></p>
				<p>Date:&nbsp;<strong><?= date('d-m-Y') ?></strong></p>
			</div>
		</div>
	</div>

	<div class="col-xl-6">
		<div class="">
			<label for="" class="form-label">Are you a winner of Leaders of tomorrow in the previous editions?</label>
			<div class="row my-1">
				<div class="col-auto form-check">
					<input class="form-check-input" type="radio" name="last_winner[status]" value="yes" id="isWinnerYes" required>
					<label class="form-check-label" for="isWinnerYes">
						Yes
					</label>
				</div>
				<div class="col-auto form-check">
					<input class="form-check-input" type="radio" name="last_winner[status]" value="no" id="isWinnerNo" required>
					<label class="form-check-label" for="isWinnerNo">
						No
					</label>
				</div>
			</div>
			<div class="" id="other-text-input" style="display:none;">
				<div class="row">
					<div class="col-xl-4 col-lg-6">
						<label for="" class="form-label">Year</label>
						<select class="form-select" name="last_winner[year]" id="">
							<option value="">Select A Year</option>
							<?php for ($yr = date('Y'); $yr >= 2015; $yr--) : ?>
								<option value="<?= $yr ?>"><?= $yr ?></option>
							<?php endfor; ?>
						</select>
					</div>
					<div class="col-xl col-lg-6">
						<label for="" class="form-label">Category</label>
						<input type="text" name="last_winner[category]" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-6">
		<div class="">
			<label for="" class="form-label">How did you get to know about the Awards?</label>
			<select required name="agent_referrer" id="my-select" class="form-select mb-1">
				<option value="">Select Source</option>
				<option value="Television">Television</option>
				<option value="Social Media">Social Media</option>
				<option value="Through Agency">Through Agency</option>
				<option value="Other">Other (Please Specify)</option>
			</select>
			<div id="other-source-input" style="display:none;">
				<input type="text" class="form-control mt-2" name="agent_referrer">
			</div>

			<script>
				$(document).ready(function() {

					const $select = $('#my-select');
					const $otherContainer = $('#other-source-input');
					const $otherInput = $('#other-source-input input');

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


	<div class="col-12">
		<button type="submit" class="btn btn-primary">Submit Nomination & Return to Dashboard</button>
	</div>
</div>
<?= form_close() ?>
<script>
	$(document).ready(function() {

		const $radioGroup = $('input[name="last_winner[status]"]');
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


		//Agent Referrer
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

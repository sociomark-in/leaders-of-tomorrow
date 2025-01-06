<div class="modal fade" id="eligibilityModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Eligibility Criteria and Pre-requisites</h1>
			</div>
			<div class="modal-body">
				<?php 
				switch ($category['type']) {
					case '1_DIGITAL':
						include_once APPPATH . '/views/panel/participant/categories/criteria/digital.php';
						# code...
						break;
					case '1_FAMILY':
						include_once APPPATH . '/views/panel/participant/categories/criteria/family.php';
						# code...
						break;
					case '1_GLOBAL':
						include_once APPPATH . '/views/panel/participant/categories/criteria/global.php';
						# code...
						break;
					case '1_INDIVIDUAL':
						include_once APPPATH . '/views/panel/participant/categories/criteria/individual_1.php';
						# code...
						break;
					case '2_INDIVIDUAL':
						include_once APPPATH . '/views/panel/participant/categories/criteria/individual_2.php';
						# code...
						break;

					default:
						include_once APPPATH . '/views/panel/participant/categories/criteria/msme.php';
						# code...
						break;
				} ?>
			</div>
			<div class="modal-footer">
				<a href="<?= base_url('dashboard') ?>" class="btn btn-red-outline">Back to Dashboard</a>
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
			</div>
		</div>
	</div>
</div>

<script>
	let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('eligibilityModal')) // Returns a Bootstrap modal instance
	// Show or hide:
	modal.show();
</script>

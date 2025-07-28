<?php
$tabs = [
	[
		'name' => "Business Details",
		'identifier' => "profile",
	],
	[
		'name' => "Financial Details",
		'identifier' => "finance",
	],
	[
		'name' => "Case Studies I",
		'identifier' => "case_1",
	],
	[
		'name' => "Case Studies II",
		'identifier' => "case_2",
	],
	[
		'name' => "Document Uploads",
		'identifier' => "uploads",
	],
	[
		'name' => "Review & Confirm",
		'identifier' => "review",
	],
	[
		'name' => "Reference & Consent",
		'identifier' => "success",
	],
]
?>
<div class="staged-tab-wizard">
	<ul class="nav nav-pills gap-3" id="myTab" role="tablist">
		<?php for ($i = 0; $i < count($tabs); $i++): ?>
			<?php if ($i == $stage): ?>
				<li class="nav-item" role="presentation">
					<!-- <button class="nav-link active" id="<?= $tabs[$i]['identifier'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tabs[$i]['identifier'] ?>-tab-pane" type="button" role="tab" aria-controls="<?= $tabs[$i]['identifier'] ?>-tab-pane" aria-selected="true"><?= $tabs[$i]['name'] ?></button> -->
					<a href="<?= base_url('application/' . $application['nomination_id'] . '?stage=' . $stage) ?>" class="nav-link active"><i class="link-icon px-1 pb-1" data-feather="info"></i><?= $tabs[$i]['name'] ?></a>
				</li>
			<?php elseif ($i < $stage): ?>
				<li class="nav-item" role="presentation">
					<!-- <button class="nav-link success" id="<?= $tabs[$i]['identifier'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tabs[$i]['identifier'] ?>-tab-pane" type="button" role="tab" aria-controls="<?= $tabs[$i]['identifier'] ?>-tab-pane" aria-selected="false"><?= $tabs[$i]['name'] ?></button> -->
					<?php if ($i == 0) : ?>
						<a href="javascript:void(0)" class="nav-link success"><i class="link-icon mr-2 px-1 pb-1" data-feather="lock"></i><?= $tabs[$i]['name'] ?></a>
					<?php else: ?>
						<a href="<?= base_url('application/' . $application['nomination_id'] . '?stage=' . $i) ?>" class="nav-link success"><i class="link-icon px-1 pb-1" data-feather="check"></i><?= $tabs[$i]['name'] ?></a>
					<?php endif ?>
				</li>
			<?php else: ?>
				<li class="nav-item" role="presentation">
					<!-- <button class="nav-link disabled" id="<?= $tabs[$i]['identifier'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tabs[$i]['identifier'] ?>-tab-pane" type="button" role="tab" aria-controls="<?= $tabs[$i]['identifier'] ?>-tab-pane" aria-selected="false"><?= $tabs[$i]['name'] ?></button> -->
					<a href="<?= base_url('application/' . $application['nomination_id'] . '?stage=' . $stage) ?>" class="nav-link disabled"><?= $tabs[$i]['name'] ?></a>
				</li>
			<?php endif ?>
		<?php endfor ?>
	</ul>
	<div class="tab-content" id="myTabContent">
		<?php for ($i = 0; $i < count($tabs); $i++):
			$data["category_id"] = $category['type'];
			$data["application_id"] = $application['nomination_id'] ?? null;
			$data["application_temp"] = $_SESSION['application_temp'] ?? null;
			$data["referrer"] = current_url();
			$data["utm"] = $utm ?? null;
			$data["agent_id"] = $this->input->get('agent_id');
			$data["stage"] = $this->input->get('stage') ?? 0;
		?>
			<?php if ($i == $stage): ?>
				<!-- <div class="tab-pane py-3 fade show active" id="<?= $tabs[$i]['identifier'] ?>-tab-pane" role="tabpanel" aria-labelledby="<?= $tabs[$i]['identifier'] ?>-tab" tabindex="0"> -->
				<div class="row py-3">
					<div class="col-12 grid-margin stretch-card">
						<div class="card input-group-card">
							<div class="card-body">
								<?php
								switch ($tabs[$i]['identifier']) {
									case 'profile':
										$this->load->view('panel/participant/forms/idfc/1', $data);
										break;
									case 'finance':
										$this->load->view('panel/participant/forms/idfc/2', $data);
										break;
									case 'case_1':
										$this->load->view('panel/participant/forms/idfc/3', $data);
										break;
									case 'case_2':
										$this->load->view('panel/participant/forms/idfc/4', $data);
										break;
									case 'uploads':
										$this->load->view('panel/participant/forms/idfc/5', $data);
										break;
									case 'review':
										$this->load->view('panel/participant/forms/idfc/review', $data);
										break;
									case 'success':
										$this->load->view('panel/participant/forms/success', $data);
										break;

									default:

										# code...
										break;
								} ?>
							</div>

							<?= form_close() ?>
						</div>
					</div>
				</div>
				<!-- </div> -->
			<?php else: ?>
			<?php endif ?>
		<?php endfor ?>
	</div>
</div>

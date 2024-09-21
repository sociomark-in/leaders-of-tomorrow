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
]
?>

<div class="staged-tab-wizard">
	<ul class="nav nav-pills gap-3" id="myTab" role="tablist">
		<?php for ($i = 0; $i < count($tabs); $i++): ?>
			<?php if ($i == $stage): ?>
				<li class="nav-item" role="presentation">
					<button class="nav-link active" id="<?= $tabs[$i]['identifier'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tabs[$i]['identifier'] ?>-tab-pane" type="button" role="tab" aria-controls="<?= $tabs[$i]['identifier'] ?>-tab-pane" aria-selected="true"><?= $tabs[$i]['name'] ?></button>
				</li>
			<?php elseif ($i < $stage): ?>
				<li class="nav-item" role="presentation">
					<button class="nav-link success" id="<?= $tabs[$i]['identifier'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tabs[$i]['identifier'] ?>-tab-pane" type="button" role="tab" aria-controls="<?= $tabs[$i]['identifier'] ?>-tab-pane" aria-selected="false"><?= $tabs[$i]['name'] ?></button>
				</li>
			<?php else: ?>
				<li class="nav-item" role="presentation">
					<button class="nav-link disabled" id="<?= $tabs[$i]['identifier'] ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= $tabs[$i]['identifier'] ?>-tab-pane" type="button" role="tab" aria-controls="<?= $tabs[$i]['identifier'] ?>-tab-pane" aria-selected="false"><?= $tabs[$i]['name'] ?></button>
				</li>
			<?php endif ?>
		<?php endfor ?>
	</ul>
	<div class="tab-content" id="myTabContent">
		<?php for ($i = 0; $i < count($tabs); $i++):
			$data["category_id"] = $category['code'];
			$data["application_id"] = $application['id'] ?? null;
			$data["utm"] = $utm;
			$data["agent_id"] = $this->input->get('agent_id');
			$data["stage"] = $this->input->get('stage');
		?>
			<?php if ($i == $stage): ?>
				<div class="tab-pane py-3 fade show active" id="<?= $tabs[$i]['identifier'] ?>-tab-pane" role="tabpanel" aria-labelledby="<?= $tabs[$i]['identifier'] ?>-tab" tabindex="0">
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<?php
									switch ($tabs[$i]['identifier']) {
										case 'profile':
											$this->load->view('panel/participant/forms/msme/1', $data);
											break;
										case 'finance':
											$this->load->view('panel/participant/forms/msme/2', $data);
											break;
										case 'case_1':
											$this->load->view('panel/participant/forms/msme/3', $data);
											break;
										case 'case_2':
											$this->load->view('panel/participant/forms/msme/4', $data);
											break;

										default:
											$this->load->view('panel/participant/forms/msme/5', $data);
											# code...
											break;
									} ?>
								</div>

								<?= form_close() ?>
							</div>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="tab-pane disabled py-3 fade" id="<?= $tabs[$i]['identifier'] ?>-tab-pane" role="tabpanel" aria-labelledby="<?= $tabs[$i]['identifier'] ?>-tab" tabindex="0">
				<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<?php
									switch ($tabs[$i]['identifier']) {
										case 'profile':
											$this->load->view('panel/participant/forms/msme/1', $data);
											break;
										case 'finance':
											$this->load->view('panel/participant/forms/msme/2', $data);
											break;
										case 'case_1':
											$this->load->view('panel/participant/forms/msme/3', $data);
											break;
										case 'case_2':
											$this->load->view('panel/participant/forms/msme/4', $data);
											break;

										default:
											$this->load->view('panel/participant/forms/msme/5', $data);
											# code...
											break;
									} ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif ?>
		<?php endfor ?>
	</div>
</div>

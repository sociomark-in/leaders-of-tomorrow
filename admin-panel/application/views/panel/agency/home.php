<main class="page-content">
	<?php
	$this->load->view('components/panel/widget/_alert_stack') ?>
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

	<script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>

	<section>
		<div class="row">
			<div class="col-12 grid-margin">
				<div class="card welcome-banner">
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<div class="d-flex justify-content-between align-items-center">
									<div>
										<h4 class="mb-3 mb-md-0">Welcome, <strong><?= $user['name'] ?></strong>!</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<ul class="nav nav-pills" id="myTab" role="tablist">
					<li class="nav-item" role="presentation">
						<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">All Applications</button>
					</li>
					<li class="nav-item" role="presentation">
						<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">All Profiles</button>
					</li>
				</ul>
			</div>
			<div class="col-12">
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
						<div class="row p-3">
							<div class="col-12">
								<div class="row">
									<div class="col-12 grid-margin stretch-card">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col">
														<div class="row">
															<div class="col-12">
																<h6 class="card-title">All Applications</h6>
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-12">
														<table class="table table-bordered" id="agentEntries">
															<thead>
																<tr>
																	<th></th>
																	<th>Date & Time</th>
																	<th>ID</th>
																	<th>Category</th>
																	<th>Name</th>
																	<th>Email</th>
																	<th>Organization Name</th>
																	<th>Designation</th>
																	<th>State</th>
																	<th>City</th>
																	<th>Website</th>
																	<th>Status</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($agency['data']['entries']['all'] as $key => $application): ?>
																	<tr>
																		<td>
																			<a id="commentButton<?= $key ?>" class="" data-bs-toggle="offcanvas" href="#offcanvasComment" role="button" aria-controls="offcanvasComment">
																				<i class="link-icon px-1 mb-1" data-feather="message-circle"></i>
																			</a>
																			<?php
																			$data = [
																				'application_id' => $application['nomination_id']
																			];
																			?>
																			<script>
																				$("#commentButton<?= $key ?>").on("click", () => {
																					$cb = $(this);
																					$.ajax({
																						url: "<?= base_url('api/data/CommentAPIController/get_comment_for_application') ?>",
																						method: "POST",
																						data: <?= json_encode($data) ?>,
																						success: function(result) {
																							$html = "<div class='p-3 row g-3'>";
																							console.log(result.length);
																							if (result.length > 0) {
																								result.forEach(element => {
																									$html += "<div class='col-12 bg-light p-3'>"
																									$html += "<div class='mb-2'><strong>" + element.comment
																									$html += "</strong></div>"
																									$html += "<i class='text-muted'>" + element.created_at
																									$html += "</i>"
																									$html += "</div>"
																								});
																							} else {
																								$html = "<i class='text-muted'>No Comments</i>"
																							}
																							$("#offcanvasComment .offcanvas-body").html($html)
																							$html += "</div>"
																						},
																					})
																				})
																			</script>
																		</td>
																		<td><?= date_format(date_create_from_format('Y-m-d H:i:s', $application['created_at']), 'F j, Y H:iA')  ?></td>
																		<td><?= $application['nomination_id'] ?></td>
																		<td><?= $application['category']['name'] ?></td>
																		<td><?= $application['name'] ?></td>
																		<td><?= $application['email'] ?></td>
																		<td><?= $application['organization_name'] ?></td>
																		<td><?= $application['designation'] ?></td>
																		<td><?= $application['organization_state'] ?></td>
																		<td><?= $application['organization_city'] ?></td>
																		<td><?= $application['organization_url'] ?></td>
																		<td><?= $application['status'] ?></td>
																	</tr>
																<?php endforeach ?>
															</tbody>
														</table>
													</div>
												</div>
												<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasComment" aria-labelledby="offcanvasCommentLabel">
													<div class="offcanvas-header">
														<h5 class="offcanvas-title" id="offcanvasCommentLabel">All Comments</h5>
														<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
													</div>
													<div class="offcanvas-body">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<script>
								new DataTable("#agentEntries", {
									scrollX: true,
									paging: false,
									order: [
										[0, 'asc']
									],
									layout: {
										topStart: {
											buttons: [{
													extend: 'excelHtml5',
													title: 'Applications_Export_<?= date('YmdHis') ?>'
												},
												{
													extend: 'csvHtml5',
													title: 'Applications_Export_<?= date('YmdHis') ?>'
												}
											]
										}
									}
								});
							</script>
						</div>
					</div>
					<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
						<div class="row p-3">
							<div class="col-12">
								<div class="row">
									<div class="col-12 grid-margin stretch-card">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col">
														<div class="row">
															<div class="col-12">
																<h6 class="card-title">All Profiles</h6>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-12">
														<table class="table w-100 table-bordered" id="agentLeads">
															<thead>
																<tr>
																	<th>Date & Time</th>
																	<th>Name</th>
																	<th>Email</th>
																	<th>Contact</th>
																</tr>
															</thead>
															<tbody>
																<?php foreach ($agency['data']['users'] as $key => $user): ?>
																	<tr>
																		<td><?= date_format(date_create_from_format('Y-m-d H:i:s', $user['created_at']), 'F j, Y H:iA')  ?></td>
																		<td><?= $user['name'] ?></td>
																		<td><?= $user['email'] ?></td>
																		<td><?= $user['contact'] ?></td>
																	</tr>
																<?php endforeach ?>
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<script>
									new DataTable("#agentLeads", {
										paging: false,
										layout: {
											topStart: {
												buttons: [{
														extend: 'excelHtml5',
														title: 'Export_<?= date('YmdHis') ?>'
													},
													{
														extend: 'csvHtml5',
														title: 'Export_<?= date('YmdHis') ?>'
													}
												]
											}
										}
									});
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

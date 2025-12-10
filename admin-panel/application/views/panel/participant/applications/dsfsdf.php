<!DOCTYPE html>
<!--
Author: Apogee Digitech
Website: http://localhost/times-now/leaders-of-tomorrow/admin-panel/Contact: nobleui123@gmail.com
Purchase: http://localhost/times-now/leaders-of-tomorrow/admin-panel/License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
	<!-- End fonts -->

	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/images/favicons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/images/favicons/favicon-16x16.png">
	<link rel="manifest" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/images/favicons/site.webmanifest">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

	<!-- core:css -->
	<link rel="stylesheet" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/vendors/flatpickr/flatpickr.min.css">

	<link href="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">
	<script src="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.js"></script>
	<script>
		Object.assign(DataTable.defaults, {
			language: {
				emptyTable: '<img src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/images/panel/icons/search-empty.png" style="height:200px; width:auto;"/>'
			}
		});
	</script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.2/apexcharts.min.css" integrity="sha512-qc0GepkUB5ugt8LevOF/K2h2lLGIloDBcWX8yawu/5V8FXSxZLn3NVMZskeEyOhlc6RxKiEj6QpSrlAoL1D3TA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.45.2/apexcharts.min.js" integrity="sha512-vIqZt7ReO939RQssENNbZ+Iu3j0CSsgk41nP3AYabLiIFajyebORlk7rKPjGddmO1FQkbuOb2EVK6rJkiHsmag==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/js/apexcharts-light.js"></script>
	<!-- End plugin css for this page -->

	<!-- Plugin: JQuery Validator  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/additional-methods.min.js" integrity="sha512-TiQST7x/0aMjgVTcep29gi+q5Lk5gVTUPE9XgN0g96rwtjEjLpod4mlBRKWHeBcvGBAEvJBmfDqh2hfMMmg+5A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- Plugin: JQuery Validator  -->

	<!-- Plugin: JQuery Validator  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.0/themes/base/jquery-ui.min.css" integrity="sha512-F8mgNaoH6SSws+tuDTveIu+hx6JkVcuLqTQ/S/KJaHJjGc8eUxIrBawMnasq2FDlfo7FYsD8buQXVwD+0upbcA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.14.0/jquery-ui.min.js" integrity="sha512-MlEyuwT6VkRXExjj8CdBKNgd+e2H+aYZOCUaCrt9KRk6MlZDOs91V1yK22rwm8aCIsb5Ec1euL8f0g58RKT/Pg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- Plugin: JQuery Validator  -->

	<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script> -->

	<!-- Plugin: JQuery daterangepicker  -->
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.css" />
	<!-- Plugin: JQuery daterangepicker  -->

	<!-- Plugin: JQuery select2 -->
	<script type="text/javascript" src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/vendors/select2/select2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/vendors/select2/select2.min.css" />
	<!-- Plugin: JQuery daterangepicker  -->

	<!-- inject:css -->
	<link rel="stylesheet" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

	<!-- Layout styles -->
	<link rel="stylesheet" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/css/demo1/style-new.css">
	<!-- End layout styles -->

	<link rel="shortcut icon" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/images/favicon.png" />

	<link rel="stylesheet" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/css/custom.min.css">
	<!-- <link rel="stylesheet" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/css/panel.min.css"> -->


	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<!-- 
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
	function initGoogleSignIn() {
		gapi.load('auth2', function() {
			gapi.auth2.init({
				client_id: '973841660802-aocg2s8viu5sopiu7etlevigtutfb4bt.apps.googleusercontent.com',
				scope: 'email profile' // Adjust scopes as needed
			});
		});
	}
</script> 
-->
	<title>Leaders of Tomorrow</title>
</head>

<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<nav class="sidebar">
			<div class="sidebar-header">
				<a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/" class="sidebar-brand">
					<img src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/images/main.png" alt="" width="160">
				</a>
				<div class="sidebar-toggler not-active">
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<div class="sidebar-body">
				<ul class="nav">
					<li class="nav-item ">
						<a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/" class="nav-link">
							<i class="link-icon" data-feather="box"></i>
							<span class="link-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item ">
						<a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/my-nominations" class="nav-link">
							<i class="link-icon" data-feather="database"></i>
							<span class="link-title">Nominations</span>
						</a>
					</li>
					<li class="nav-item ">
						<a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/my-presentations" class="nav-link">
							<i class="link-icon" data-feather="layers"></i>
							<span class="link-title">Presentations</span>
						</a>
					</li>
					<li class="d-none nav-item nav-category">Round II</li>
					<li class="d-none nav-item">
						<a class="nav-link " data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
							<i class="link-icon" data-feather="users"></i>
							<span class="link-title">Jury Panel</span>
							<i class="link-arrow" data-feather="chevron-down"></i>
						</a>
						<div class="collapse" id="emails">
							<ul class="nav sub-menu">
								<li class="nav-item ">
									<a href="#" class="nav-link">Juries</a>
								</li>
								<li class="nav-item ">
									<a href="#" class="nav-link">Menu Items</a>
								</li>
							</ul>
						</div>
					</li>

					<!-- Access Level: admin -->


				</ul>
			</div>
		</nav>
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
			<nav class="navbar">
				<a href="#" class="sidebar-toggler">
					<i data-feather="menu"></i>
				</a>
				<div class="navbar-content">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/my-profile">Welcome, Hemant Sociomark!</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="wd-30 ht-30 rounded-circle" src="https://ui-avatars.com/api/?name=Hemant Sociomark" alt="profile">
							</a>
							<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
								<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
									<div class="mb-3">
										<img class="wd-80 ht-80 rounded-circle" src="https://ui-avatars.com/api/?name=Hemant Sociomark" alt="">
									</div>
									<div class="text-center">
										<p class="tx-16 fw-bolder">Hemant Sociomark</p>
										<p class="tx-12 text-muted">hemant@sociomark.in</p>
									</div>
								</div>
								<ul class="list-unstyled p-1">
									<li class="dropdown-item py-2">
										<a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/my-profile" class="text-body ms-0">
											<i class="me-2 icon-md" data-feather="user"></i>
											<span>Profile</span>
										</a>
									</li>
									<li class="dropdown-item py-2">
										<a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/logout" class="text-body ms-0">
											<i class="me-2 icon-md" data-feather="repeat"></i>
											<span>Switch User</span>
										</a>
									</li>
									<li class="dropdown-item py-2">
										<a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/logout" class="text-body ms-0">
											<i class="me-2 icon-md" data-feather="log-out"></i>
											<span>Log Out</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->
			<main class="page-content">
				<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
					<div>
						<h4 class="mb-3 mb-md-0">Application for Excellence in Sustainability 2025</h4>
					</div>
					<nav style="--bs-breadcrumb-divider: '/';" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/">Dashboard</a></li>
							<li class="breadcrumb-item"><a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/my-nominations">My Applications</a></li>
							<li class="breadcrumb-item active" aria-current="page">Edit Application</li>
						</ol>
					</nav>
				</div>
				<div class="row">
					<div class="col-xxl-9 col-12">
						<div class="row py-3">
							<div class="col-12 grid-margin stretch-card">
								<div class="card input-group-card">
									<div class="card-body">
										<div class="col-12 grid-margin stretch-card">
											<form action="http://localhost/times-now/leaders-of-tomorrow/admin-panel/api/v2/awards/nomination/single/edit" id="formFullView" enctype="multipart/form-data" method="post" accept-charset="utf-8">
												<input type="hidden" name="category_id" value="3_MSME">
												<input type="hidden" name="application_id" value="1765017660-74618">
												<input type="hidden" name="utm" value="">
												<input type="hidden" name="agent_id" value="">

												<div class="row g-3">
													<div class="col-12 grid-margin stretch-card">
														<div class="row g-3">
															<div class="col-12">
																<div class="row g-md-5 g-3">
																	<!-- 1. BASIC INFORMATION: ADDRESS & EQUITY PENDING -->
																	<fieldset class="col-12">
																		<legend class="card-title mb-0">
																			<h5>Participating Entity<sup class="text-danger">&ast;</sup></h5>
																		</legend>
																		<div class="row g-3">
																			<div class="col-xl-6 col-lg-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Participating Entity (Organization Name)</label>
																					<input required type="text" value="Sociomark" name="organization[name]" class="form-control">
																				</div>
																			</div>
																			<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Business Segment</label>
																					<select required name="organization[segment]" id="" class="form-select">
																						<option value="">Select Business Segment</option>
																						<option value="Micro">Micro</option>
																						<option value="Small" selected>Small</option>
																						<option value="Medium">Medium</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Date of Company Incorporation</label>
																					<input required type="text" data-type="date" name="organization[inc_date]" value="01/12/2025" class="form-control">
																					<span class="form-text">(in DD/MM/YYYY)</span>
																				</div>
																			</div>
																			<div class="col-12">
																				<div class="row g-3">
																					<div class="col-12">
																						<label for="" class="form-label">Registered Address Participating Entity</label>
																						<input required type="text" name="organization[address][line_1]" value="Address Line 1" class="form-control mb-2">
																						<input type="text" name="organization[address][line_2]" value="Address Line 2" class="form-control mb-2">
																						<input type="text" name="organization[address][line_3]" value="Address Line 3" class="form-control mb-2">
																					</div>
																					<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
																						<label for="" class="form-label">State</label>
																						<!-- <input type="text" placeholder="" name="organization[address][state]" value="Maharashtra" class="form-control"> -->
																						<select required name="organization[address][state]" id="stateSelect" data-placeholder="Select State" class="form-select">
																							<option value="">Select State</option>
																							<option value="Andaman & Nicobar Islands">Andaman & Nicobar Islands</option>
																							<option value="Andhra Pradesh">Andhra Pradesh</option>
																							<option value="Arunachal Pradesh">Arunachal Pradesh</option>
																							<option value="Assam">Assam</option>
																							<option value="Bihar">Bihar</option>
																							<option value="Chandigarh Metro">Chandigarh Metro</option>
																							<option value="Chhattisgarh">Chhattisgarh</option>
																							<option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
																							<option value="Daman & Diu">Daman & Diu</option>
																							<option value="Delhi">Delhi</option>
																							<option value="Goa">Goa</option>
																							<option value="Gujrat">Gujrat</option>
																							<option value="Haryana">Haryana</option>
																							<option value="Himachal Pradesh">Himachal Pradesh</option>
																							<option value="Jammu & Kashmir">Jammu & Kashmir</option>
																							<option value="Jharkhand">Jharkhand</option>
																							<option value="Karnataka">Karnataka</option>
																							<option value="Kerala">Kerala</option>
																							<option value="Lakshadweep">Lakshadweep</option>
																							<option value="Madhya Pradesh">Madhya Pradesh</option>
																							<option value="Maharashtra" selected>Maharashtra</option>
																							<option value="Manipur">Manipur</option>
																							<option value="Meghalaya">Meghalaya</option>
																							<option value="Mizoram">Mizoram</option>
																							<option value="Nagaland">Nagaland</option>
																							<option value="Orissa">Orissa</option>
																							<option value="Pondicherry">Pondicherry</option>
																							<option value="Punjab">Punjab</option>
																							<option value="Rajasthan">Rajasthan</option>
																							<option value="Sikkim">Sikkim</option>
																							<option value="Tamil Nadu">Tamil Nadu</option>
																							<option value="Telangana">Telangana</option>
																							<option value="Tripura">Tripura</option>
																							<option value="Uttar Pradesh">Uttar Pradesh</option>
																							<option value="Uttarakhand">Uttarakhand</option>
																							<option value="West Bengal">West Bengal</option>
																						</select>
																					</div>
																					<div class="col-xxl-2 col-xl-4 col-lg-6 col-12">
																						<label for="" class="form-label">City</label>
																						<select required name="organization[address][city]" id="citySelect" class="form-select">
																							<option value="">Select City</option>
																						</select>
																					</div>
																				</div>
																			</div>
																			<div class="col-xxl-3 col-xl-4 col-12">
																				<div class="">
																					<label for="" class="form-label">Type of Ownership</label>
																					<select required name="organization[ownership]" id="my-select" class="form-select mb-1">
																						<option value="">Select Ownership Type</option>
																						<option value="Sole Proprietorship">Sole Proprietorship</option>
																						<option value="Partnership" selected>Partnership</option>
																						<option value="Private Limited">Private Limited</option>
																						<option value="Other">Other (Please Specify)</option>
																					</select>
																					<div id="other-text-input" style="display:none;">
																						<input type="text" class="form-control mt-2" name="organization[ownership]" value="">
																					</div>
																					<script>
																						$(document).ready(function() {

																							const $select = $('#my-select');
																							const $otherContainer = $('#other-text-input');
																							const $otherInput = $('#other-text-input input');

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
																			<div class="col-xxl-6 col-xl-8 col-12">
																				<div class="">
																					<label for="" class="form-label">Website URL</label>
																					<input type="url" placeholder="https://www.domain.xyz" value="https://www.haxolac.com" name="organization[url]" class="form-control">
																				</div>
																			</div>
																			<div class="col-12">
																				<!-- EQUITY SPLIT -->
																				<label for="" class="form-label">Equity Split Between Partners</label>
																				<table class="table table-bordered mb-2" id="equityTable">
																					<thead>
																						<tr>
																							<th>Name</th>
																							<th>Gender</th>
																							<th>Designation</th>
																							<th>Equity (%)</th>
																						</tr>
																					</thead>
																					<tbody>
																						<tr>
																							<td>
																								<input type="text" class="form-control" name="partner[0][name]" value="Heta">
																							</td>
																							<td>
																								<select name="partner[0][gender]" class="form-select">
																									<option value="">Select Gender</option>
																									<option value="Male">Male</option>
																									<option value="Female" selected>Female</option>
																									<option value="Other">Other</option>
																								</select>
																							</td>
																							<td>
																								<input type="text" class="form-control" name="partner[0][designation]" value="Owner">
																							</td>
																							<td>
																								<input type="text" class="form-control" name="partner[0][equity]" value="50">
																							</td>
																						</tr>
																						<tr>
																							<td>
																								<input type="text" class="form-control" name="partner[1][name]" value="Vivek">
																							</td>
																							<td>
																								<select name="partner[1][gender]" class="form-select">
																									<option value="">Select Gender</option>
																									<option value="Male" selected>Male</option>
																									<option value="Female">Female</option>
																									<option value="Other">Other</option>
																								</select>
																							</td>
																							<td>
																								<input type="text" class="form-control" name="partner[1][designation]" value="Owner 2">
																							</td>
																							<td>
																								<input type="text" class="form-control" name="partner[1][equity]" value="50">
																							</td>
																						</tr>
																						<tr>
																							<td>
																								<input type="text" class="form-control" name="partner[2][name]" value="">
																							</td>
																							<td>
																								<select name="partner[2][gender]" class="form-select">
																									<option value="">Select Gender</option>
																									<option value="Male">Male</option>
																									<option value="Female">Female</option>
																									<option value="Other">Other</option>
																								</select>
																							</td>
																							<td>
																								<input type="text" class="form-control" name="partner[2][designation]" value="">
																							</td>
																							<td>
																								<input type="text" class="form-control" name="partner[2][equity]" value="">
																							</td>
																						</tr>
																					</tbody>
																				</table>
																				<button type="button" class="btn btn-primary" id="addPartnerButton">Add Partner</button>
																				<template id="partnerNode">
																					<tr>
																						<td>
																							<input type="text" class="form-control" name="partner[__INDEX__][name]">
																						</td>
																						<td>
																							<select name="partner[__INDEX__][gender]" class="form-select">
																								<option value="">Select Gender</option>
																								<option value="Male">Male</option>
																								<option value="Female">Female</option>
																								<option value="Other">Other</option>
																							</select>
																						</td>
																						<td>
																							<input type="text" class="form-control" name="partner[__INDEX__][designation]">
																						</td>
																						<td>
																							<input type="text" class="form-control" name="partner[__INDEX__][equity]">
																						</td>
																					</tr>
																				</template>
																			</div>
																			<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Name of the Applicant (MD/CEO/Founder or equivalent)</label>
																					<input required type="text" name="name" value="Hemant Karekar" class="form-control">
																				</div>
																			</div>
																			<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Designation</label>
																					<input required type="text" name="designation" value="Developer" class="form-control">
																				</div>
																			</div>
																			<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Date of Birth</label>
																					<input required type="text" data-type="date" name="dob" value="05/12/2025" class="form-control">
																					<span class="form-text">(in DD/MM/YYYY)</span>
																				</div>
																			</div>
																			<div class="col-xxl-3 col-xl-4 col-lg-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Gender</label>
																					<select required name="gender" class="form-select">
																						<option value="">Select Gender</option>
																						<option value="Male">Male</option>
																						<option value="Female">Female</option>
																						<option value="Other" selected>Other</option>
																					</select>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<fieldset class="col-12">
																		<legend class="card-title mb-0">
																			<h5>Primary Contact for Award Coordination<sup class="text-danger">&ast;</sup></h5>
																		</legend>
																		<div class="row g-3">
																			<div id="sectionChange" class="col-12">
																				<div class="row g-3">
																					<div class="col-xl-3 col-lg-6 col-12">
																						<div class="">
																							<label for="" class="form-label">Full Name of Individual</label>
																							<input required name="contact_person[name]" value="Hemant Sociomark" type="text" class="form-control">
																						</div>
																					</div>
																					<div class="col-lg-6 col-12">
																						<div class="">
																							<label for="" class="form-label">Email Address</label>
																							<input required name="contact_person[email]" value="hemant@sociomark.in" type="email" class="form-control">
																						</div>
																					</div>
																					<div class="col-xl-3 col-lg-6 col-12">
																						<div class="">
																							<label for="" class="form-label">Contact Number</label>
																							<input required name="contact_person[contact]" value="8689862375" minlength="10" maxlength="10" type="text" class="form-control">
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<!-- 1. BASIC INFORMATION: ADDRESS & EQUITY PENDING -->

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
																						Annual Turnover (INR in Crores)
																					</div>
																					<div class="col-xxl-4 col-lg-6 col-12">
																						<select required name="financial_1_2" id="" class="form-select">
																							<option value="">Select Option</option>
																							<option value="Less than 25">Less than 25</option>
																							<option selected value="25 - 49">25 - 49</option>
																							<option value="50 - 149">50 - 149</option>
																							<option value="150 - 300">150 - 300</option>
																							<option value="301 - 500">301 - 500</option>
																						</select>
																					</div>
																					<div class="col-xxl-4 col-lg-6 col-12">
																						<select required name="financial_1_1" id="" class="form-select">
																							<option value="">Select Option</option>
																							<option value="Less than 25">Less than 25</option>
																							<option selected value="25 - 49">25 - 49</option>
																							<option value="50 - 149">50 - 149</option>
																							<option value="150 - 300">150 - 300</option>
																							<option value="301 - 500">301 - 500</option>
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
																						<select required name="financial_2_2" id="" class="form-select">
																							<option value="">Select Option</option>
																							<option value="Break - even / Negative">
																								Break - even / Negative</option>
																							<option value="1% - 10%">1% - 10%</option>
																							<option value="11% - 20%">11% - 20%</option>
																							<option value="20% - 40%">20% - 40%</option>
																							<option value="> 40%">> 40%</option>
																						</select>
																					</div>
																					<div class="col-xxl-4 col-lg-6 col-12">
																						<select required name="financial_2_1" id="" class="form-select">
																							<option value="">Select Option</option>
																							<option value="Break - even / Negative">
																								Break - even / Negative</option>
																							<option value="1% - 10%">1% - 10%</option>
																							<option value="11% - 20%">11% - 20%</option>
																							<option value="20% - 40%">20% - 40%</option>
																							<option value="> 40%">> 40%</option>
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
																						<select required name="financial_3_2" id="" class="form-select">
																							<option value="">Select Option</option>
																							<option selected value="< 10%">
																								< 10%</option>
																							<option value="11% - 15%">11% - 15%</option>
																							<option value="16% - 20%">16% - 20%</option>
																							<option value="21% - 25%">21% - 25%</option>
																						</select>
																					</div>
																					<div class="col-xxl-4 col-lg-6 col-12">
																						<select required name="financial_3_1" id="" class="form-select">
																							<option value="">Select Option</option>
																							<option value="< 10%">
																								< 10%</option>
																							<option selected value="11% - 15%">11% - 15%</option>
																							<option value="16% - 20%">16% - 20%</option>
																							<option value="21% - 25%">21% - 25%</option>
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
																							<option value="Break-even / negative">
																								Break-even / negative</option>
																							<option value="1%-4%">1%-4%</option>
																							<option value="5-10%">5-10%</option>
																							<option value="11% - 20%">11% - 20%</option>
																							<option value="> 20%">> 20%</option>
																						</select>
																					</div>
																					<div class="col-xxl-4 col-lg-6 col-12">
																						<select required name="financial_4_1" id="" class="form-select">
																							<option value="">Select Option</option>
																							<option value="Break-even / negative">
																								Break-even / negative</option>
																							<option value="1%-4%">1%-4%</option>
																							<option value="5-10%">5-10%</option>
																							<option value="11% - 20%">11% - 20%</option>
																							<option value="> 20%">> 20%</option>
																						</select>
																					</div>
																				</div>
																			</div>
																			<div class="col-12">
																				<div class="row g-3">
																					<div class="col-xxl-4 col-12">
																						Revenue Growth %
																					</div>
																					<div class="col-xxl-4 col-lg-6 col-12">
																						<select required name="financial_5_1" id="" class="form-select">
																							<option value="">Select Option</option>
																							<option value="< 10%">
																								< 10%</option>
																							<option value="10-25%">10-25%</option>
																							<option value="26-50%">26-50%</option>
																							<option value="51-100%">51-100%</option>
																							<option value="> 100%">> 100%</option>
																						</select>
																					</div>
																				</div>
																			</div>
																			<div class="col-12">
																				<div class="row g-3">
																					<div class="col-xxl-4 col-12">
																						Debt-to-Equity Ratio
																					</div>
																					<div class="col-xxl-4 col-lg-6 col-12">
																						<select required name="financial_6_1" id="" class="form-select">
																							<option value="">Select Option</option>
																							<option value="< 1.0">
																								< 1.0</option>
																							<option value="1.0 - 2.0">1.0 - 2.0</option>
																							<option value="2.0 - 3.0">2.0 - 3.0</option>
																							<option value="> 3.0">> 3.0</option>
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
																						<option selected value="Less than 50">Less than 50</option>
																						<option value="50 - 100">50 - 100</option>
																						<option value="100 - 200">100 - 200</option>
																						<option value="200 - 400">200 - 400</option>
																						<option value="More than 400">More than 400</option>
																					</select>
																				</div>
																			</div>
																			<div class="col-xl-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Target Market Segment and Geographic Reach</label>
																					<div class="row">
																						<div class="col-xl-6">
																							<input type="text" required name="organization[domestic]" value="Dolor blanditiis ven Enim consequatur co Enim consequatur co" placeholder="Domestic" class="form-control">
																						</div>
																						<div class="col-xl-6">
																							<input type="text" name="organization[international]" value="" placeholder="International" class="form-control">
																						</div>
																					</div>
																				</div>
																			</div>

																			<div class="col-12">
																				<div class="">
																					<label for="" class="form-label">Brief Description of the Business</label>
																					<textarea required name="organization_overview" id="" class="form-control" rows="5">International</textarea>
																					<span class="form-text">(50 - 5000 characters)</span>
																				</div>
																			</div>
																			<div class="col-12">
																				<div class="">
																					<label for="" class="form-label">Core Products / Services Offered</label>
																					<textarea required name="organization_services" id="" class="form-control" rows="5">Enim consequatur co Enim consequatur coEnim consequatur co</textarea>
																					<span class="form-text">(50 - 5000 characters)</span>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<!-- 2. FINANCIAL DETAILS -->

																	<!-- 3. CASE STUDIES -->
																	<fieldset class="col-12">
																		<div class="mb-3">
																			<legend class="card-title mb-0">
																				<h5>Innovation & Initiative Overview<sup class="text-danger">&ast;</sup></h5>
																			</legend>
																			<!-- <p class="text-muted"></p> -->
																		</div>
																		<div class="row g-3 flex-row-reverse">
																			<div class="col-lg-4">
																				<div class="bg-light p-3">
																					<p>Please cover:</p>
																					<ul>
																						<li>The problem/opportunity you aimed to address</li>
																						<li>The innovation or distinctive approach (product, process, technology, business model, market entry, etc.)</li>
																						<li>How this initiative aligns with your overall business strategy</li>
																					</ul>
																				</div>
																			</div>
																			<div class="col-xl-8 col-12">
																				<div class="">
																					<label for="" class="form-label">Describe the key initiative/product/service or business transformation your organisation implemented between April 01, 2023 and March 31, 2025? </label>
																					<textarea required name="case_study_1" id="" class="form-control" maxlength="5000" rows="5">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Undefined variable $application_temp</p>
<p>Filename: edit/msme.php</p>
<p>Line Number: 479</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit\msme.php<br />
			Line: 479<br />
			Function: _error_handler			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit.php<br />
			Line: 54<br />
			Function: include_once			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\core\MY_Loader.php<br />
			Line: 34<br />
			Function: view			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\controllers\NominationsController.php<br />
			Line: 177<br />
			Function: panel_view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Trying to access array offset on value of type null</p>
<p>Filename: edit/msme.php</p>
<p>Line Number: 479</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit\msme.php<br />
			Line: 479<br />
			Function: _error_handler			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit.php<br />
			Line: 54<br />
			Function: include_once			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\core\MY_Loader.php<br />
			Line: 34<br />
			Function: view			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\controllers\NominationsController.php<br />
			Line: 177<br />
			Function: panel_view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div></textarea>
																					<span class="form-text">(50 - 5000 characters)</span>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<fieldset class="col-12">
																		<div class="mb-3">
																			<legend class="card-title mb-0">
																				<h5>Measurable Outcomes & Business Impact<sup class="text-danger">&ast;</sup></h5>
																			</legend>
																		</div>
																		<div class="row g-3 flex-row-reverse">
																			<div class="col-lg-4">
																				<div class="p-3 bg-light">
																					<p>Wherever possible, include metrics such as (as applicable):</p>
																					<ul>
																						<li>Revenue growth, profitability, or margin improvement</li>
																						<li>Operational efficiency, productivity gains, or cost optimisation</li>
																						<li>Customer acquisition/retention, NPS/CSAT, market share</li>
																						<li>Sustainability/ESG improvements (e.g., waste reduction, energy savings)</li>
																					</ul>
																					<p>Avoid generic statements; focus on specific, measurable results</p>
																				</div>
																			</div>
																			<div class="col-xl-8">
																				<div class="">
																					<label for="" class="form-label">Share the quantifiable outcomes achieved during the eligibility period because of this initiative </label>
																					<textarea required name="case_study_2" id="" class="form-control" maxlength="5000" rows="5">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Undefined variable $application_temp</p>
<p>Filename: edit/msme.php</p>
<p>Line Number: 507</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit\msme.php<br />
			Line: 507<br />
			Function: _error_handler			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit.php<br />
			Line: 54<br />
			Function: include_once			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\core\MY_Loader.php<br />
			Line: 34<br />
			Function: view			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\controllers\NominationsController.php<br />
			Line: 177<br />
			Function: panel_view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Trying to access array offset on value of type null</p>
<p>Filename: edit/msme.php</p>
<p>Line Number: 507</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit\msme.php<br />
			Line: 507<br />
			Function: _error_handler			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit.php<br />
			Line: 54<br />
			Function: include_once			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\core\MY_Loader.php<br />
			Line: 34<br />
			Function: view			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\controllers\NominationsController.php<br />
			Line: 177<br />
			Function: panel_view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div></textarea>
																					<span class="form-text">(50 - 5000 characters)</span>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<fieldset class="col-12">
																		<div class="mb-3">
																			<legend class="card-title mb-0">
																				<h5>Scalability & Future Growth Plan<sup class="text-danger">&ast;</sup></h5>
																			</legend>
																		</div>
																		<div class="row g-3 flex-row-reverse">
																			<div class="col-lg-4">
																				<div class="p-3 bg-light">
																					<p>You may highlight:</p>
																					<ul>
																						<li>Planned geographic or market expansion</li>
																						<li>Technology upgrades or digital transformation roadmap</li>
																						<li>Talent and capability building</li>
																						<li>Investments in capacity, R&D, partnerships</li>
																						<li>How you will ensure long-term sustainability and competitiveness</li>
																					</ul>

																				</div>
																			</div>
																			<div class="col-xl-8">
																				<div class="">
																					<label for="" class="form-label">Explain how you plan to scale this initiative and your business over the next 3–5 years</label>
																					<textarea required name="case_study_3" id="" class="form-control" maxlength="5000" rows="5">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Undefined variable $application_temp</p>
<p>Filename: edit/msme.php</p>
<p>Line Number: 536</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit\msme.php<br />
			Line: 536<br />
			Function: _error_handler			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit.php<br />
			Line: 54<br />
			Function: include_once			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\core\MY_Loader.php<br />
			Line: 34<br />
			Function: view			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\controllers\NominationsController.php<br />
			Line: 177<br />
			Function: panel_view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Trying to access array offset on value of type null</p>
<p>Filename: edit/msme.php</p>
<p>Line Number: 536</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit\msme.php<br />
			Line: 536<br />
			Function: _error_handler			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit.php<br />
			Line: 54<br />
			Function: include_once			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\core\MY_Loader.php<br />
			Line: 34<br />
			Function: view			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\controllers\NominationsController.php<br />
			Line: 177<br />
			Function: panel_view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div></textarea>
																					<span class="form-text">(50 - 5000 characters)</span>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<!-- 3. CASE STUDIES -->

																	<!-- 4. INDIVIDUAL CATEGORY -->
																	<fieldset class="col-12">
																		<legend class="card-title mb-0">
																			<h5>Individual Category Preference & Entrepreneur Insight<sup class="text-danger">&ast;</sup></h5>
																		</legend>
																		<div class="row g-3">
																			<div class="col-12">
																				<p>I wish to additionally be considered for:</p>
																			</div>
																			<div class="col-xl-4">
																				<div class="border rounded-1 p-2 p-lg-3">
																					<div class="form-check">
																						<input required name="alt_category_id" value="1_INDIVIDUAL" class="form-check-input" type="radio" id="checkOption1">
																						<label class="form-check-label" for="checkOption1">
																							<h5 class="mb-2">Entrepreneur of the Year</h5>
																							<small class="text-muted">
																								I confirm that I am <strong>more than 35 years</strong> of age as on <strong>March 31, 2025</strong>, and my MSME is <strong>more than 2 years</strong> old.
																							</small>
																						</label>
																					</div>
																				</div>
																			</div>
																			<div class="col-xl-4">
																				<div class="border rounded-1 p-2 p-lg-3">
																					<div class="form-check">
																						<input required name="alt_category_id" value="2_INDIVIDUAL" class="form-check-input" type="radio" id="checkOption2">
																						<label class="form-check-label" for="checkOption2">
																							<h5 class="mb-2">Next Gen Innovator</h5>
																							<small class="text-muted">
																								I confirm that I am <strong>up to 35 years</strong> of age as on <strong>March 31, 2025</strong>, and my MSME is <strong>more than 2 and less than 5 years</strong> old.
																							</small>
																						</label>
																					</div>
																				</div>
																			</div>
																			<div class="col-xl-4">
																				<div class="border rounded-1 p-2 p-lg-3">
																					<div class="form-check">
																						<input required name="alt_category_id" value="3_INDIVIDUAL" class="form-check-input" type="radio" id="checkOption3" checked>
																						<label class="form-check-label" for="checkOption3">
																							<h5 class="mb-2">Woman Entrepreneur of the Year</h5>
																							<small class="text-muted">
																								I confirm that I am <strong>a woman entrepreneur</strong> and hold <strong>at least 33% equity stake</strong> in the organization
																							</small>
																						</label>
																					</div>
																				</div>
																			</div>
																		</div>
																		<div class="form-text">
																			<p>(Please tick only those that are relevant and for which you meet the eligibility criteria)</p>
																		</div>
																	</fieldset>
																	<fieldset class="col-12">
																		<div class="mb-3">
																			<legend class="card-title mb-0">
																				<h5>Entrepreneur of the Year<sup class="text-danger">&ast;</sup></h5>
																			</legend>
																			<p class="text-muted">(The response to this question will be used to evaluate and determine the finalists for the "Entrepreneur of the Year" category. By submitting this response, you consent to its consideration for this awards category.)</p>
																		</div>
																		<div class="row g-3">
																			<div class="col-12">
																				<div class="">
																					<label for="" class="form-label">Describe the most significant innovation or transformation you have implemented in your business and its impact on your organization&#39;s growth and outcomes. Highlight how this has set your business apart in the industry.</label>
																					<textarea required name="case_study_individual" id="" class="form-control" maxlength="5000" rows="5">
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Undefined variable $application_temp</p>
<p>Filename: edit/msme.php</p>
<p>Line Number: 608</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit\msme.php<br />
			Line: 608<br />
			Function: _error_handler			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit.php<br />
			Line: 54<br />
			Function: include_once			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\core\MY_Loader.php<br />
			Line: 34<br />
			Function: view			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\controllers\NominationsController.php<br />
			Line: 177<br />
			Function: panel_view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div>
<div style="border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

<h4>A PHP Error was encountered</h4>

<p>Severity: Warning</p>
<p>Message:  Trying to access array offset on value of type null</p>
<p>Filename: edit/msme.php</p>
<p>Line Number: 608</p>


	<p>Backtrace:</p>
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit\msme.php<br />
			Line: 608<br />
			Function: _error_handler			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit.php<br />
			Line: 54<br />
			Function: include_once			</p>

		
	
		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\core\MY_Loader.php<br />
			Line: 34<br />
			Function: view			</p>

		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\controllers\NominationsController.php<br />
			Line: 177<br />
			Function: panel_view			</p>

		
	
		
	
		
			<p style="margin-left:10px">
			File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\index.php<br />
			Line: 315<br />
			Function: require_once			</p>

		
	

</div></textarea>
																					<span class="form-text">(50 - 5000 characters)</span>
																				</div>
																			</div>
																		</div>
																	</fieldset>
																	<!-- 4. INDIVIDUAL CATEGORY -->

																	<!-- 5. UPLOAD FILES -->
																	<fieldset class="col-12">
																		<legend class="card-title mb-3">
																			<h5>Upload Files<sup class="text-danger">&ast;</sup></h5>
																		</legend>
																		<div class="d-none">
																			<div class="bg-light p-3 mb-2">
																				<h5>Instructions<sup class="text-danger">&ast;</sup></h5>
																				<ul class="">
																					<li>Open the PDF Properties and check for PDF version < version 5 (1.4)</li>
																					<li>Open the unsupported PDF file with Chrome</li>
																					<li>Right Click and Print</li>
																					<li>Change destination as [Save as PDF]</li>
																					<li>This exported PDF file is compatible to upload.</li>
																				</ul>
																			</div>
																		</div>
																		<div class="row g-3 mb-3">
																			<div class="col-xl-3 col-lg-4 col-md-6 col-12">
																				<div class="">
																					<label for="" class="form-label">MSME Certificate&nbsp;<a class="link-icon" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck.pdf" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
																					<input type="file" accept="application/pdf" name="doc1" class="dropify" data-default-file="uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck.pdf" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
																					<span class="form-text">document supporting received from Ministry of MSME, Govt. of India (PDF of Maximum Size 2MB)</span>
																				</div>
																			</div>
																			<div class="col-xl-3 col-lg-4 col-md-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Incorporation Certificate&nbsp;<a class="link-icon" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck1.pdf" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
																					<input type="file" accept="application/pdf" name="doc2" class="dropify" data-default-file="uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck1.pdf" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
																					<span class="form-text">(PDF of Maximum Size 2MB)</span>
																				</div>
																			</div>
																			<!-- <div class="col-xl-3 col-lg-4 col-md-6 col-12">
								<div class="">
									<label for="" class="form-label">Applicable Environmental Certifications</label>
									<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck2.pdf" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
									<span class="form-text">(ISO 14001: Environmental Management System (EMS), LEED,
									GreenCO, Ecomark certificate, etc.) (PDF of Maximum Size 2MB)</span>
								</div>
							</div> -->
																			<div class="col-xl-3 col-lg-4 col-md-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Photographs or Videos of products/services offered&nbsp;<a class="link-icon" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck2.pdf" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
																					<input type="file" accept="application/pdf" name="doc3" class="dropify" data-default-file="uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck2.pdf" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
																					<span class="form-text">(PDF of Maximum Size 2MB)</span>
																				</div>
																			</div>
																			<div class="col-xl-3 col-lg-4 col-md-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Collaterals to Support the Impact&nbsp;<a class="link-icon" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck3.pdf" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
																					<input type="file" accept="application/pdf" name="doc4" class="dropify" data-default-file="uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck3.pdf" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
																					<span class="form-text">Collaterals to support impact mentioned in the application form</span>
																				</div>
																			</div>
																			<div class="col-xl-3 col-lg-4 col-md-6 col-12">
																				<div class="">
																					<label for="" class="form-label">Any other Collaterals&nbsp;<a class="link-icon" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck4.pdf" target="_blank">View Document<i class="mb-1 px-1" data-feather="external-link"></i></a></label>
																					<input type="file" accept="application/pdf" name="doc5" class="dropify" data-default-file="uploads/1765017660-74618/1765018482_fgWYot1I_HSM_Introduction_Deck4.pdf" data-max-file-size="2M" data-allowed-file-extensions="pdf" />
																					<span class="form-text">(Awards / Articles / Certificates, etc.) in a Single PDF (PDF of Maximum Size 2MB)</span>
																				</div>
																			</div>
																		</div>

																		<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

																		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
																		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.worker.min.js"></script>

																		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css" integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog==" crossorigin="anonymous" referrerpolicy="no-referrer" />
																		<link rel="stylesheet" href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/css/dropify-custom.min.css">
																		<script>
																			$('.dropify').dropify({
																				error: {
																					'fileSize': 'The file size is too big ({{ value }} max).',
																					'minWidth': 'The image width is too small ({{ value }}}px min).',
																					'maxWidth': 'The image width is too big ({{ value }}}px max).',
																					'minHeight': 'The image height is too small ({{ value }}}px min).',
																					'maxHeight': 'The image height is too big ({{ value }}px max).',
																					'imageFormat': 'The image format is not allowed ({{ value }} only).'
																				}
																			});
																			/* PDF.js - Run PDF Version Check */
																			$('.dropify').each((index, elem) => {
																				$(elem).on('change', function(event) {
																					// Access the selected file directly from the event object
																					const file = event.target.files[0];

																					// Check if a file is actually selected
																					if (!file) {
																						console.warn('No file selected for dropify element:', this);
																						return; // Exit the function if no file is selected
																					}

																					// Create a new FileReader object for each file
																					const reader = new FileReader();

																					reader.onload = (event) => {
																						const arrayBuffer = event.target.result;
																						console.log('ArrayBuffer:', arrayBuffer);

																						// Assuming you have pdfjsLib loaded:
																						pdfjsLib.getDocument(arrayBuffer).promise.then((pdfDoc) => {
																							pdfDoc.getMetadata().then((metadata) => {
																								console.log('Metadata:', metadata.info.PDFFormatVersion);
																								if (metadata.info.PDFFormatVersion > "1.7") {
																									alert('PDF Version not Supported!');
																								}
																							});
																						}).catch((error) => {
																							console.error('Error getting PDF version:', error);
																						});
																					};

																					// Read the file as an ArrayBuffer
																					reader.readAsArrayBuffer(file);
																				});
																			});
																		</script>
																	</fieldset>
																	<!-- 5. UPLOAD FILES -->
																</div>
															</div>
															<div class="col-12">
																<div class="row">
																	<div class="col-md-auto">
																		<a href="
<div style=" border:1px solid #990000;padding-left:20px;margin:0 0 10px 0;">

																			<h4>A PHP Error was encountered</h4>

																			<p>Severity: Warning</p>
																			<p>Message: Undefined variable $stage</p>
																			<p>Filename: edit/msme.php</p>
																			<p>Line Number: 741</p>


																			<p>Backtrace:</p>






																			<p style="margin-left:10px">
																				File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit\msme.php<br />
																				Line: 741<br />
																				Function: _error_handler </p>




																			<p style="margin-left:10px">
																				File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\views\panel\participant\applications\edit.php<br />
																				Line: 54<br />
																				Function: include_once </p>








																			<p style="margin-left:10px">
																				File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\core\MY_Loader.php<br />
																				Line: 34<br />
																				Function: view </p>




																			<p style="margin-left:10px">
																				File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\application\controllers\NominationsController.php<br />
																				Line: 177<br />
																				Function: panel_view </p>






																			<p style="margin-left:10px">
																				File: D:\xamppserver\htdocs\times-now\leaders-of-tomorrow\admin-panel\index.php<br />
																				Line: 315<br />
																				Function: require_once </p>




																	</div>http://localhost/times-now/leaders-of-tomorrow/admin-panel/nomination/1765017660-74618?stage=-1" class="btn btn-outline-secondary">Back</a>
																</div>
																<div class="col-md-auto">
																	<button type="submit" class="btn btn-primary">Confirm and Submit</button>
																</div>
															</div>
														</div>
													</div>
												</div>
										</div>
										<script>
											function parseDDMMYYYYDate(dateString) {
												let parts = dateString.split('/');
												let day = parseInt(parts[0], 10);
												let month = parseInt(parts[1], 10) - 1; // Months are 0-indexed
												let year = parseInt(parts[2], 10);

												return new Date(year, month, day);
											}
											$('[name=initiative_start_date]').datepicker({
												changeMonth: true,
												changeYear: true,
												showButtonPanel: true,
												dateFormat: 'dd/mm/yy',
												maxDate: '10/12/2025',

											});
											$('[name=initiative_end_date]').datepicker({
												changeMonth: true,
												changeYear: true,
												showButtonPanel: true,
												dateFormat: 'dd/mm/yy',
											});

											$(document).ready(function() {
												// 1. Get references to the elements using jQuery selectors
												const $template = $('#partnerNode');
												const $container = $('#equityTable tbody');
												const $addButton = $('#addPartnerButton');

												// Initialize the counter for the next index number
												// Start at 0 if no items exist on load
												let itemIndex = $container.find('tr').length;

												console.log("Rows:" + itemIndex);


												// --- FUNCTION TO ADD AND RENAME THE ITEM ---
												const addPartner = () => {
													// 1. Clone the content
													itemIndex++;
													const templateContent = $template[0].content;
													if (!templateContent) return;

													// Perform a deep clone and wrap it in jQuery
													const cloneFragment = document.importNode(templateContent, true);
													const $newClone = $(cloneFragment);

													// 2. Find all input fields within the clone
													$newClone.find('input, select, textarea').each(function() {
														const $input = $(this);
														let currentName = $input.attr('name');

														// Replace the '__INDEX__' placeholder with the current index number
														if (currentName) {
															currentName = currentName.replace('__INDEX__', itemIndex);
															$input.attr('name', currentName);

															// Optional: Clear the value of the new input
															$input.val('');
														}
													});

													$newClone.find('select').each(function() {
														const $input = $(this);
														let currentName = $input.attr('name');

														// Replace the '__INDEX__' placeholder with the current index number
														if (currentName) {
															currentName = currentName.replace('__INDEX__', itemIndex);
															$input.attr('name', currentName);

															// Optional: Clear the value of the new input
															$input.val('');
														}
													});


													const $selectElement = $newClone.find('select');

													// 4. Append the renamed clone to the container
													$container.append($newClone);

													if ($selectElement.length) {
														$selectElement.select2({
															// You can pass any required Select2 options here
															placeholder: "Select an option",
															allowClear: true,
															width: "100%"
														});
													}

													console.log("Rows:" + itemIndex);
												};

												// --- EVENT LISTENERS ---

												// Attach the add function to the button
												$addButton.on('click', addPartner);

												// Initial load: Add one item automatically if none exist (optional)
												if (itemIndex === 0) {
													addPartner();
												}
											});
										</script>
										</form>
									</div>
									<div class="modal fade" id="uploadInstructionsModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
										<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="staticBackdropLabel">File Upload Instructions</h1>
												</div>
												<div class="modal-body">
													<div class="row g-3">
														<div class="col-12">
															To make sure your file remains supported for further process:
														</div>
														<div class="col-12">
															<ol>
																<li>PDF Version should be - <strong>
																		< 1.4</strong>
																</li>
																<li>PDF Versions for all the Attachments should be same.</li>
																<li>
																	For further instructions <a href="#" class="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Click Here</a>
																</li>
															</ol>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
												</div>
											</div>
										</div>
									</div>

									<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
										<div class="modal-dialog modal-dialog-centered">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Instructions</h1>
												</div>
												<div class="modal-body">
													<div class="row g-3">
														<div class="col-12">

														</div>
														<div class="col-12">
															<ol>
																<li>Open your PDF in Google Chrome</li>
																<li>Select <strong>Print</strong> and set Print Destination as <strong>Save as PDF</strong></li>
																<li>Save the PDF and upload the same PDF in your Application</li>
															</ol>
														</div>
													</div>
												</div>
												<div class="modal-footer">
													<button class="btn btn-primary" data-bs-target="#uploadInstructionsModal" data-bs-toggle="modal">Back to Instructions</button>
												</div>
											</div>
										</div>
									</div>

									<script>
										let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('uploadInstructionsModal')) // Returns a Bootstrap modal instance
										// Show or hide:
										modal.show();
									</script>

									<script>
										$state = $('#stateSelect');
										$city = $('#citySelect');

										$htmlData = "<option>Select City</option>";
										$cityValue = "Navi Mumbai";
										if ($cityValue != "") {
											$htmlData += "<option selected value='" + $cityValue + "'>" + $cityValue + "</option>";
										}

										$city.html(
											"<option value=''> Select State First</option>"
										);
										$.ajax({
											url: "http://localhost/times-now/leaders-of-tomorrow/admin-panel/api/data/StatesAPIController/get_cities_by_state?state=" + $state.val(),
											success: function(data) {
												$htmlData += "<option value=''>Select City</option>";

												if (data.length == 0) {
													$htmlData += "<option value=" + $state.val() + ">" + $state.val() + "</option>"
												} else {
													data.forEach(city => {
														$htmlData += "<option value=" + city.city_name + ">" + city.city_name + "</option>"
													});
												}

												$city.html($htmlData);
											}
										})
										$state.on('change', () => {
											$.ajax({
												url: "http://localhost/times-now/leaders-of-tomorrow/admin-panel/api/data/StatesAPIController/get_cities_by_state?state=" + $state.val(),
												success: function(data) {
													$htmlData = "<option value=''>Select City</option>";

													if (data.length == 0) {
														$htmlData += "<option value=" + $state.val() + ">" + $state.val() + "</option>"
													} else {
														data.forEach(city => {
															$htmlData += "<option value=" + city.city_name + ">" + city.city_name + "</option>"
														});
													}

													$city.html($htmlData);
												}
											})
										})
									</script>

									<script>
										$.validator.addMethod("emailregex", function(value, element) {
											return this.optional(element) || /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/i.test(value);
										})
										$.validator.addMethod("ddmmyyyyregex", function(value, element) {
											return this.optional(element) || /^(0?[1-9]|[1-2][0-9]|3[0-1])\/(0?[1-9]|1[0-2])\/[1-9]\d{3}$/i.test(value);
										})
										$.validator.addMethod("letters", function(value, element) {
											return this.optional(element) || /^[a-zA-Z\s]*$/i.test(value);
										});
										$.validator.addMethod("phone", function(value, element) {
											return this.optional(element) || /^[0-9]*$/i.test(value);
										});
										$("#form_option_01").validate({

											rules: {
												"name": {
													letters: true,
												},
												"organization[address][state]": {
													letters: true,
												},
												"organization[address][city]": {
													letters: true,
												},
												'organization[inc_date]': {
													ddmmyyyyregex: true,
												},

												"contact_person[name]": {
													letters: true,
												},
												"contact_person[email]": {
													emailregex: true
												},
												"contact_person[contact]": {
													phone: true
												}
											},
											messages: {
												'name': {
													letters: "Please enter a valid name."
												},
												'organization[address][state]': {
													letters: "Please enter a valid State."
												},
												'organization[address][city]': {
													letters: "Please enter a valid City."
												},
												'organization[inc_date]': {
													ddmmyyyyregex: "Please enter a valid date!"
												},

												'contact_person[name]': {
													letters: "Please enter a valid name."
												},
												'contact_person[email]': {
													emailregex: 'Please enter a valid email address.'
												},
												'contact_person[contact]': {
													phone: 'Please enter a valid contact number'
												}
											}
										});
									</script>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3">
					<div class="">
						<div class="">
							<h5 class="card-title mb-3">All Comments</h5>
						</div>
					</div>
				</div>
		</div>
		</main>
		<!-- partial:partials/_footer.html -->
		<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
			<p class="text-muted mb-1 mb-md-0">Copyright &copy; 2025. <a href="http://localhost/times-now/leaders-of-tomorrow/admin-panel/">Leaders of Tomorrow</a>.</p>
			<p class="text-muted">Handcrafted With <i class="mb-1 text-danger icon-sm" data-feather="heart"></i> in India</p>

		</footer>
		<!-- partial -->

	</div>
	</div>

	<!-- core:js -->
	<!-- <script src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel//vendors/core/core.js"></script> -->
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<script src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/vendors/flatpickr/flatpickr.min.js"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/vendors/feather-icons/feather.min.js"></script>
	<script src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<script src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/js/app.js"></script>
	<script src="http://localhost/times-now/leaders-of-tomorrow/admin-panel/assets/panel/js/dashboard-light.js"></script>
	<!-- End custom js for this page -->

	<script>
		$('main select.form-select').each((index, elem) => {
			$(elem).select2({
				width: '100%',
				placeholder: $(elem).attr('data-placeholder') || 'Select an option',
			});
		})
		$('main input[data-type=date]').each((index, elem) => {
			$(elem).datepicker({
				changeMonth: true,
				changeYear: true,
				showButtonPanel: true,
				dateFormat: 'dd/mm/yy',
				maxDate: "+1D",
				yearRange: "-100:+0"
			});
		})
	</script>


</body>

</html>

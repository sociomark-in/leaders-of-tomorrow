<?php

switch ($city['name']) {
	case 'Mumbai':
	case 'Lucknow':
	case 'Chandigarh':
	case 'Hyderabad':
	case 'Chennai':
	case 'Coimbatore':
	case 'Jaipur':
	case 'Pune':
	case 'Indore':
	case 'Delhi':
		$past = "d-none";
		break;

	default:
		$past = "d-block";
		break;
}
switch ($city['name']) {
	case 'Bengaluru':
		$active = "d-none";
		break;

	default:
		$active = "d-block d-md-inline-block";
		break;
}
?>
<nav class="sub-navbar navbar navbar-expand-lg">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= base_url() ?>">
			<img src="<?= base_url() ?>assets/images/main.png" alt="LOT Logo" height="40">
		</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#springboardNavbarNav" aria-controls="springboardNavbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="mx-0 mx-md-4 my-4 my-md-0 collapse navbar-collapse w-100 justify-content-between" id="springboardNavbarNav">
			<ul class="navbar-nav">
				<li class="nav-item me-md-3">
					<a class="btn btn-red text-uppercase" href="<?= base_url('all-cities') ?>">All Springboards</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('city/' . str_replace(" ", "-", strtolower($city['name']))) ?>#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('city/' . str_replace(" ", "-", strtolower($city['name']))) ?>#about">About</a>
				</li>
				<li class="nav-item <?= $past ?>">
					<a class="nav-link" href="<?= base_url('city/' . str_replace(" ", "-", strtolower($city['name']))) ?>#agenda">Agenda</a>
				</li>
				<li class="nav-item ">
					<a class="nav-link" href="<?= base_url('city/' . str_replace(" ", "-", strtolower($city['name']))) ?>#speakers">Speakers</a>
				</li>
				<li class="nav-item <?= $active ?> ">
					<a class="nav-link" href="<?= base_url('city/' . str_replace(" ", "-", strtolower($city['name']))) ?>#gallery">Gallery</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('city/' . str_replace(" ", "-", strtolower($city['name']))) ?>#partners">Partners</a>
				</li>
			</ul>
			<ul class="navbar-nav gap-2 <?= $past ?>">
				<li class="nav-item">
					<a class="btn btn-red text-uppercase" href="<?= base_url('city/' . str_replace(" ", "-", strtolower($city['name']))  . '/register') ?>">Register to Attend</a>
				</li>
			</ul>
		</div>
		<a class="navbar-brand d-none d-lg-block" href="https://www.timesnownews.com/" target="_blank">
			<img src="<?= base_url("assets/images/sponsors/") ?>times.png" alt="ICS Logo" height="50">
		</a>
	</div>
</nav>

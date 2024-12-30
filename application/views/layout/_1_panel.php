<!DOCTYPE html>
<!--
Author: Apogee Digitech
Website: <?= base_url() ?>
Contact: nobleui123@gmail.com
Purchase: <?= base_url() ?>
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">

<head>
	<?php $this->load->view('components/panel/_head'); ?>
	<title><?= (isset($page['title'])) ? $page['title'] : APP_NAME ?></title>
</head>

<body>
	<?php
	// if ($user['is_email_verified']) {
	// 	$prohibit = [
	// 		'type' => 'email'
	// 	];
	// 	$this->load->view('components/panel/partials/_email_noverify_prohibit_mask', $prohibit);
	// }
	// if (!$user['is_contact_verified']) {
	// 	$prohibit = [
	// 		'type' => 'contact'
	// 	];
	// 	$this->load->view('components/panel/partials/_email_noverify_prohibit_mask', $prohibit);
	// }
	?>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
		<?php $this->load->view('components/panel/partials/_sidebar'); ?>
		<!-- partial -->

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
			<?php $this->load->view('components/panel/partials/_navbar'); ?>
			<!-- partial -->

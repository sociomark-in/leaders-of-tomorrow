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
	<?php $this->load->view('components/theme/_head'); ?>
	<link rel="stylesheet" href="<?= base_url('assets/css/awards.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/custom.min.css') ?>">
	<title><?= (isset($page['title']))? $page['title']: APP_NAME ?></title>
</head>

<body>
	<div class="main-wrapper">

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
			<?php $this->load->view('components/theme/partials/_awards_navbar'); ?>
			<!-- partial -->

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
	<meta name="description" content=<?= (isset($page['desc']))? $page['desc']: "ET NOW Leaders of Tomorrow is India's longest-running TV show and the premier platform empowering small businesses and entrepreneurs with essential tools for success."?>>
	<meta name="og:description" content=<?= (isset($page['desc']))? $page['desc']: "ET NOW Leaders of Tomorrow is India's longest-running TV show and the premier platform empowering small businesses and entrepreneurs with essential tools for success."?>>
	<meta name="og:image" content="<?= (isset($page['thumb']))? $page['thumb'] : base_url("assets/images/favicon.png") ?>">
	<title><?= (isset($page['title']))? $page['title']: APP_NAME ?></title>
</head>

<body>
	<div class="main-wrapper">

		<div class="page-wrapper">

			<!-- partial:partials/_navbar.html -->
			<?php $this->load->view('components/theme/partials/_navbar'); ?>
			<!-- partial -->

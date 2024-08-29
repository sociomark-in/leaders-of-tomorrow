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
	<title><?= (isset($page['title'])) ? $page['title'] : APP_NAME ?></title>
</head>

<body>
	<div class="main-wrapper">
		<div class="page-wrapper">
			<div class="container full-screen">
				<div class="row h-100 align-items-center">
					<div class="col-12">
						<picture>
							<source media="(min-width: 768px)" srcset="<?= base_url('assets/images/') ?>soon.png">
							<source srcset="<?= base_url('assets/images/') ?>soon-v.png">
							<img class="w-100" src="<?= base_url('assets/images/') ?>soon-v.png" alt="Coming Soon">
						</picture>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('components/theme/partials/widget/_scrollto_top') ?>
	<?php $this->load->view('components/theme/partials/_js') ?>

	<?php
	if ($this->session->userdata('first_user')) :
	?>

	<?php endif ?>

</body>

</html>

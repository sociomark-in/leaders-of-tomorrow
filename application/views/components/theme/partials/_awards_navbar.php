<?php

use phpseclib3\Crypt\EC\BaseCurves\Base;
?>
<nav class="navbar navbar-expand-lg">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= base_url() ?>">
			<img src="<?= base_url() ?>assets/images/main.png" alt="LOT Logo" height="40">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="mx-0 mx-md-4 collapse navbar-collapse w-100 justify-content-between" id="navbarNav">
			<ul class="navbar-nav gap-2">
				<!-- <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
				</li> -->
				<!-- <li class="nav-item">
					<a class="btn btn-outline-red text-uppercase" href="<?= base_url("") ?>">Back to Home</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("awards") ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("awards#about") ?>">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('awards#categories') ?>">Awards Categories</a>
				</li>
				<li class="nav-item d-none">
					<a class="nav-link" href="<?= base_url('awards#phases') ?>">Programme Phases</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('awards#partners') ?>">Partners</a>
				</li>
			</ul>
			<ul class="navbar-nav align-items-center g-4">
				<?php if (isset($_SESSION['awards_panel_user'])) : ?>
					<li class="nav-item">
						<a class="btn btn-icon-prepend btn-red text-uppercase" href="<?= base_url('dashboard') ?>">My Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
					</li>
				<?php else: ?>
					<li class="nav-item">
						<a class="btn btn-icon-prepend btn-red text-uppercase" href="<?= base_url('login') ?>">Login/Sign&nbsp;Up</a>
					</li>
					<!-- <li class="nav-item">
						<a class="nav-link" href="<?= base_url('register') ?>">Register</a>
					</li> -->
				<?php endif ?>
			</ul>
		</div>
		<a class="navbar-brand d-none d-lg-block" href="https://www.timesnownews.com/" target="_blank">
			<img src="<?= base_url("assets/images/sponsors/") ?>times.png" alt="ICS Logo" height="50">
		</a>
	</div>
</nav>
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasNavbarLabel">All Cities</h5>
		<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
			<?php foreach ($cities as $key => $city) : ?>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("city/") . strtolower($city) ?>">
						<div class="row g-3 align-items-center">
							<div class="col-auto">
								<img src="https://placehold.co/60x60" alt="" width="60">
							</div>
							<div class="col">
								<h5><?= $city ?></h5>
							</div>
						</div>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
	</div>
</div>

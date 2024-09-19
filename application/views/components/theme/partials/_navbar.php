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
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("#about") ?>">About</a>
				</li>
				<li class="nav-item dropdown d-none">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Previous Seasons
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="<?= base_url('history/season-11') ?>">Season 11</a></li>
						<li><a class="dropdown-item" href="<?= base_url('history/season-10') ?>">Season 10</a></li>
						<li><a class="dropdown-item" href="<?= base_url('history/season-9') ?>">Season 9</a></li>
						<li><a class="dropdown-item" href="<?= base_url('history/season-8') ?>">Season 8</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="<?= base_url('history') ?>">All Other Seasons</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('all-cities') ?>">Springboards</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('#articles') ?>">News</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('#partners') ?>">Partners</a>
				</li>
				<li class="nav-item d-none">
					<a class="btn btn-icon-prepend btn-red text-uppercase" href="<?= base_url('awards') ?>">
						<img src="<?= base_url('assets/images/icons/') ?>award.png" class="icon" alt="Award Icon">
						Awards&nbsp;2024
					</a>
				</li>
				<li class="nav-item dropdown d-none">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						Miscellaneous Menu
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="<?= base_url("#awards") ?>">Awards</a></li>
						<li><a class="dropdown-item" href="<?= base_url("#articles") ?>">Articles</a></li>
						<li><a class="dropdown-item" href="<?= base_url("gallery") ?>">Gallery</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<!-- <li><a class="dropdown-item" href="<?= base_url('history') ?>">All Other Seasons</a></li> -->
					</ul>
				</li>
			</ul>
			<div class="row d-none">
				<div class="col-md-auto">
					<ul class="navbar-nav align-items-center g-4">
						<?php if (isset($_SESSION['nomination_user'])) : ?>
							<li class="nav-item">
								<a class="btn btn-icon-prepend btn-red text-uppercase" href="<?= base_url('logout') ?>">Logout</a>
							</li>
						<?php else: ?>
							<li class="nav-item">
								<a class="btn btn-icon-prepend btn-red text-uppercase" href="<?= base_url('login') ?>">Login</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?= base_url('register') ?>">Register</a>
							</li>
						<?php endif ?>
					</ul>
				</div>
			</div>
			<div class="row d-none">
				<div class="col-md-auto">
					<ul class="navbar-nav align-items-center g-4">

					</ul>
				</div>
			</div>
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



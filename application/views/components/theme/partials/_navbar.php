<nav class="navbar navbar-expand-lg">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= base_url() ?>">
			<img src="<?= base_url() ?>assets/images/logo.png" alt="LOT Logo" height="50">
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="mx-0 mx-md-4 collapse navbar-collapse w-100 justify-content-between" id="navbarNav">
			<ul class="navbar-nav">
				<!-- <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
				</li> -->
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url("#about") ?>">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('all-cities') ?>">All Cities</a>
				</li>
				<li class="nav-item dropdown">
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
				<li class="nav-item d-none">
					<a class="nav-link disabled" aria-disabled="true">Disabled</a>
				</li>
			</ul>
			<div class="row d-none">
				<div class="col-md-auto">
					<ul class="navbar-nav align-items-center g-4">
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
								<?= $location ??= "Choose A City" ?>
							</a>
						</li>
						<li class="nav-item">
							<a class="btn btn-red text-uppercase" href="#">Login</a>
						</li>
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

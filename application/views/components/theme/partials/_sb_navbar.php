<nav class="sub-navbar navbar navbar-expand-lg">
	<div class="container-fluid">
		<a class="navbar-brand" href="<?= base_url() ?>">
			<img src="<?= base_url() ?>assets/images/main.png" alt="LOT Logo" height="40">
		</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#springboardNavbarNav" aria-controls="springboardNavbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="mx-0 mx-md-4 collapse navbar-collapse w-100 justify-content-between" id="springboardNavbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="btn btn-red text-uppercase" href="<?= base_url('all-cities') ?>">All Springboards</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('city/' . strtolower($city['name'])) ?>#about">About</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('city/' . strtolower($city['name'])) ?>#agenda">Agenda</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('city/' . strtolower($city['name'])) ?>#speakers">Speakers</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('city/' . strtolower($city['name'])) ?>#gallery">Gallery</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('city/' . strtolower($city['name'])) ?>#partners">Partners</a>
				</li>
			</ul>
			<ul class="navbar-nav gap-2">
				<li class="nav-item">
					<a class="btn btn-red text-uppercase" href="<?= base_url('city/' . strtolower($city['name'])  . '/register') ?>">Attend the Event</a>
				</li>
			</ul>
		</div>
		<a class="navbar-brand d-none d-lg-block" href="https://www.timesnownews.com/" target="_blank">
			<img src="<?= base_url("assets/images/sponsors/") ?>times.png" alt="ICS Logo" height="50">
		</a>
	</div>
</nav>

<nav class="sidebar">
	<div class="sidebar-header">
		<a href="#" class="sidebar-brand">
			<img src="<?= base_url('assets/images/main.png') ?>" alt="" width="160">
		</a>
		<div class="sidebar-toggler not-active">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<div class="sidebar-body">
		<ul class="nav">
			<li class="nav-item">
				<a href="<?= base_url('dashboard') ?>" class="nav-link">
					<i class="link-icon" data-feather="box"></i>
					<span class="link-title">Dashboard</span>
				</a>
			</li>
			<?php if (in_array($_SESSION['awards_panel_user']['role'], ['participant'])) :?>
			<li class="nav-item">
				<a href="<?= base_url('dashboard/my-applications') ?>" class="nav-link">
					<i class="link-icon" data-feather="database"></i>
					<span class="link-title">Nominations</span>
				</a>
			</li>
			<?php endif ?>

			<?php if (in_array($_SESSION['awards_panel_user']['role'], ['partner', 'jury', 'admin', 'super-admin'])) :?>
			<!-- Nominations -->
			<li class="nav-item nav-category">Nominations Management</li>
			<!-- Access Level: jury -->
			<li class="nav-item">
				<a href="<?= base_url('dashboard/applications') ?>" class="nav-link">
					<i class="link-icon" data-feather="database"></i>
					<span class="link-title">Nominations</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('dashboard/applications') ?>" class="nav-link">
					<i class="link-icon" data-feather="book"></i>
					<span class="link-title">Categories</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url('nominations') ?>" class="nav-link">
					<i class="link-icon" data-feather="map-pin"></i>
					<span class="link-title">Cities</span>
				</a>
			</li>
			<?php endif ?>

			<!-- Access Level: admin -->

			<?php if (in_array($_SESSION['awards_panel_user']['role'], ['admin', 'super-admin'])) :?>
			<li class="nav-item nav-category">User Management</li>
			<li class="nav-item">
				<a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
					<i class="link-icon" data-feather="users"></i>
					<span class="link-title">Jury Panel</span>
					<i class="link-arrow" data-feather="chevron-down"></i>
				</a>
				<div class="collapse" id="emails">
					<ul class="nav sub-menu">
						<li class="nav-item">
							<a href="#" class="nav-link">Juries</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">Menu Items</a>
						</li>
					</ul>
				</div>
			</li>

			<li class="nav-item">
				<a href="dashboard.html" class="nav-link">
					<i class="link-icon" data-feather="users"></i>
					<span class="link-title">Users</span>
				</a>
			</li>
			<li class="nav-item">
				<a href="dashboard.html" class="nav-link">
					<i class="link-icon" data-feather="settings"></i>
					<span class="link-title">Settings</span>
				</a>
			</li>
			<?php endif ?>
			
			<?php if (in_array($_SESSION['awards_panel_user']['role'], ['super-admin'])) :?>
			<li class="nav-item nav-category">Apps</li>
			<li class="nav-item">
				<a href="<?= base_url('dashboard/app/settings') ?>" class="nav-link">
					<i class="link-icon" data-feather="settings"></i>
					<span class="link-title">App Settings</span>
				</a>
			</li>

			<li class="nav-item nav-category">Docs</li>
			<li class="nav-item">
				<a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
					<i class="link-icon" data-feather="hash"></i>
					<span class="link-title">Documentation</span>
				</a>
			</li>
			<?php endif ?>
		</ul>
	</div>
</nav>

<nav class="sidebar">
	<div class="sidebar-header">
		<a href="<?= base_url() ?>" class="sidebar-brand">
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
			<li class="nav-item <?= link_is_active("dashboard") ?>">
				<a href="<?= base_url('dashboard') ?>" class="nav-link">
					<i class="link-icon" data-feather="box"></i>
					<span class="link-title">Dashboard</span>
				</a>
			</li>
			<?php if (in_array($_SESSION['awards_panel_user']['role'], ['participant'])) : ?>
				<li class="nav-item <?= link_is_active("dashboard/my-applications") ?>">
					<a href="<?= base_url('dashboard/my-applications') ?>" class="nav-link">
						<i class="link-icon" data-feather="database"></i>
						<span class="link-title">Nominations</span>
					</a>
				</li>
				<?php if ($_SESSION['awards_panel_user']['is_nominated']) : ?>
					<li class="nav-item d-none <?= link_is_active("dashboard/my-presentations") ?>">
						<a href="<?= base_url('dashboard/my-presentations') ?>" class="nav-link">
							<i class="link-icon" data-feather="layers"></i>
							<span class="link-title">Presentations</span>
						</a>
					</li>
				<?php endif ?>
				<li class="d-none nav-item nav-category">Round II</li>
				<li class="d-none nav-item">
					<a class="nav-link <?= link_is_active("") ?>" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
						<i class="link-icon" data-feather="users"></i>
						<span class="link-title">Jury Panel</span>
						<i class="link-arrow" data-feather="chevron-down"></i>
					</a>
					<div class="collapse" id="emails">
						<ul class="nav sub-menu">
							<li class="nav-item <?= link_is_active("") ?>">
								<a href="#" class="nav-link">Juries</a>
							</li>
							<li class="nav-item <?= link_is_active("") ?>">
								<a href="#" class="nav-link">Menu Items</a>
							</li>
						</ul>
					</div>
				</li>
			<?php endif ?>


			<?php if (in_array($_SESSION['awards_panel_user']['role'], ['partner', 'jury', 'admin', 'super-admin'])) : ?>
				<!-- Nominations -->
				<li class="nav-item nav-category">Nominations Management</li>
				<!-- Access Level: jury -->
				<li class="nav-item <?= link_is_active("dashboard/applications") ?>">
					<a href="<?= base_url('dashboard/applications') ?>" class="nav-link">
						<i class="link-icon" data-feather="database"></i>
						<span class="link-title">Nominations</span>
					</a>
				</li>
				<li class="nav-item <?= link_is_active("dashboard/presentations") ?>">
					<a href="<?= base_url('dashboard/presentations') ?>" class="nav-link">
						<i class="link-icon" data-feather="book"></i>
						<span class="link-title">Presentations</span>
					</a>
				</li>
			<?php endif ?>

			<!-- Access Level: admin -->

			<?php if (in_array($_SESSION['awards_panel_user']['role'], ['admin', 'super-admin'])) : ?>
				<li class="nav-item nav-category">User Management</li>
				<!-- <li class="nav-item">
					<a class="nav-link <?= link_is_active("") ?>" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
						<i class="link-icon" data-feather="users"></i>
						<span class="link-title">Jury Panel</span>
						<i class="link-arrow" data-feather="chevron-down"></i>
					</a>
					<div class="collapse" id="emails">
						<ul class="nav sub-menu">
							<li class="nav-item <?= link_is_active("") ?>">
								<a href="#" class="nav-link">Juries</a>
							</li>
							<li class="nav-item <?= link_is_active("") ?>">
								<a href="#" class="nav-link">Menu Items</a>
							</li>
						</ul>
					</div>
				</li> -->

				<!-- <li class="nav-item <?= link_is_active("dashboard/all-users") ?>">
					<a href="<?= base_url('dashboard/all-users') ?>" class="nav-link">
						<i class="link-icon" data-feather="users"></i>
						<span class="link-title">All Users</span>
					</a>
				</li> -->
				<li class="nav-item <?= link_is_active("dashboard/all-agents") ?>">
					<a href="<?= base_url("dashboard/all-agents") ?>" class="nav-link">
						<i class="link-icon" data-feather="users"></i>
						<span class="link-title">All Agents</span>
					</a>
				</li>
				<!-- <li class="nav-item <?= link_is_active("dashboard") ?>">
					<a href="<?= base_url('dashboard') ?>" class="nav-link">
						<i class="link-icon" data-feather="settings"></i>
						<span class="link-title">Settings</span>
					</a>
				</li> -->
			<?php endif ?>

			<?php if (in_array($_SESSION['awards_panel_user']['role'], ['super-admin'])) : ?>
				<li class="nav-item nav-category">Apps</li>
				<li class="nav-item <?= link_is_active("dashboard/app/settings") ?>">
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

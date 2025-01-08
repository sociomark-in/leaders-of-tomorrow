<main>
	<section class="section pb-0">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-12">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('awards') ?>">Awards</a></li>
							<li class="breadcrumb-item"><a href="<?= base_url('awards/categories') ?>">All Categories</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?= $category['name'] ?></li>
						</ol>
					</nav>
				</div>
				<div class="col-xl-auto col-lg-8 col-md-10 col-12">
					<div class="page-title">
						<h1><?= $category['name'] ?></h1>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-12">
					<div class="card glass-card">
						<div class="card-body">
							<div class="desc text-lg">
							<p data-aos="fade-left">
									<?= $content['description'] ?>
								</p>
							</div>
							<a href="<?= base_url('awards/category/' . $category['code'] . '/nominate') ?>" class="btn btn-lg btn-red">Nominate Now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

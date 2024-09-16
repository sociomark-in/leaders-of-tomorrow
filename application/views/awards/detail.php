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
						<div class="row align-items-center justify-content-center">
							<div class="col-auto">
								<img src="<?= base_url("assets/images/") ?>favicon.png" alt="" class="mb-2" height="80">
							</div>
							<div class="col-auto">
								<h1><?= $category['name'] ?></h1>
							</div>
						</div>
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
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nam rem eum necessitatibus et maiores tempora nisi vel officia corporis porro quibusdam dolore beatae autem ea quae asperiores in incidunt, veritatis consequuntur, quia tenetur laudantium quam ipsa. Consequuntur eaque quos iusto sit, sunt ullam tempore ratione provident? Magni, iusto mollitia.
								</p>
								<p data-aos="fade-left" data-aos-delay="400">
									Lorem ipsum dolor sit amet consectetur adipisicing elit. Non nam rem eum necessitatibus et maiores tempora nisi vel officia corporis porro quibusdam dolore beatae autem ea quae asperiores in incidunt, veritatis consequuntur, quia tenetur laudantium quam ipsa. Consequuntur eaque quos iusto sit, sunt ullam tempore ratione provident? Magni, iusto mollitia.
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

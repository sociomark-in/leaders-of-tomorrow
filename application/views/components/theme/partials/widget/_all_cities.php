<?php foreach ($springboards as $key => $sb) : ?>
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<?php switch ($sb['name']) {
			case 'Mumbai': ?>
				<a href="<?= base_url('city/') . strtolower($sb['name']) ?>" class="tile interactive-tile">
					<div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="<?= $key * 10 ?>">
						<div class="col-auto">
							<div class="photo rounded-circle bg-red mb-3 p-2">
								<img src="<?= base_url("assets/images/icons/city/new/") . strtolower($sb['name'])?>.png" alt="Mumbai" height="100">
							</div>
						</div>
						<div class="col">
							<div class="desc py-3 py-md-4">
								<h4><?= $sb['name'] ?></h4>
								<p class="">Visit Springboard</p>
							</div>
						</div>
					</div>
				</a>

			<?php break;

			default: ?>
				<a href="javascript:void(0)" class="tile">
					<div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="<?= $key * 100 ?>">
						<div class="col-auto">
							<div class="photo rounded-circle bg-red mb-3 p-2">
								<img src="<?= base_url("assets/images/icons/city/new/"). strtolower($sb['name'])?>.png" alt="Mumbai" height="100">
							</div>
						</div>
						<div class="col">
							<div class="desc py-3 py-md-4">
								<h4><?= $sb['name'] ?></h4>
								<p class="text-muted">Coming Soon</p>
							</div>
						</div>
					</div>
				</a>
		<?php break;
		} ?>
		<?php ?>
	</div>
<?php endforeach ?>

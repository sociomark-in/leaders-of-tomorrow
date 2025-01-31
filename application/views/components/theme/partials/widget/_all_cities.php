<?php 
$done = 11;
$live = "";
for ($i = $done; $i < count($springboards); $i++) : 
	$sb = $springboards[$i];
	?>
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<?php switch ($sb['name']) {
			case $live: ?>
				<a href="<?= base_url('city/') . str_replace(" ", "-", str_replace(' ', '-', strtolower($sb['name']))) ?>" class="tile interactive-tile city-tile upcoming">
				<!-- <a href="<?= base_url('city/') . str_replace(' ', '-', strtolower($sb['name'])) ?>" class="tile interactive-tile city-tile ongoing"> -->
					<div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="<?= $i * 10 ?>">
						<div class="col-auto">
							<div class="photo rounded-circle bg-red mb-3 p-2">
								<img src="<?= base_url("assets/images/icons/city/new/") . str_replace(' ', '-', strtolower($sb['name']))?>.png" alt="Mumbai" height="100">
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
				<a href="javascript:void(0)" class="tile city-tile">
					<div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="<?= $i * 10 ?>">
						<div class="col-auto">
							<div class="photo rounded-circle bg-red mb-3 p-2">
								<img src="<?= base_url("assets/images/icons/city/new/"). str_replace(' ', '-', strtolower($sb['name']))?>.png" alt="<?= $sb['name'] ?>" height="100">
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
<?php endfor ?>
<?php for ($i = 0; $i < $done; $i++) : 
	$sb = $springboards[$i];
	?>
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
				<a href="<?= base_url('city/') . str_replace(' ', '-', strtolower($sb['name'])) ?>" class="tile interactive-tile city-tile end">
					<div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="<?= $i * 10 ?>">
						<div class="col-auto">
							<div class="photo rounded-circle bg-red mb-3 p-2">
								<img src="<?= base_url("assets/images/icons/city/new/") . str_replace(' ', '-', strtolower($sb['name']))?>.png" alt="<?= $sb['name'] ?>" height="100">
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
		<?php ?>
	</div>
<?php endfor ?>

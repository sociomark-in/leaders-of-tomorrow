<?php
if (isset($live_springboard)):
	$sb = $live_springboard;
?>
	<div class="col-lg-4 col-md-6 col-sm-6 col-12">
		<a href="<?= base_url('city/') . str_replace(" ", "-", str_replace(' ', '-', strtolower($sb['name']))) ?>" class="tile interactive-tile city-tile ongoing">
			<!-- <a href="<?= base_url('city/') . str_replace(' ', '-', strtolower($sb['name'])) ?>" class="tile interactive-tile city-tile ongoing"> -->
			<div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
				<div class="col-auto">
					<div class="photo rounded-circle bg-red mb-3 p-2">
						<img src="<?= base_url("assets/images/icons/city/new/") . $sb['image']?>" alt="Mumbai" height="100">
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
	</div>
<?php endif ?>
<?php
if (!is_null($upcoming_springboards)):
	for ($i = 0; $i < count($upcoming_springboards); $i++) :
		$sb = $upcoming_springboards[$i];
		if (isset($sb) && is_array($sb)):
			if ($sb['status'] == 0):
?>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<a href="javascript:void(0)" class="tile city-tile">
						<div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="<?= $i * 10 ?>">
							<div class="col-auto">
								<div class="photo rounded-circle bg-red mb-3 p-2">
									<img src="<?= base_url("assets/images/icons/city/new/") . $sb['image']?>" alt="<?= $sb['name'] ?>" height="100">
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
				</div>
			<?php else: ?>
				<div class="col-lg-4 col-md-6 col-sm-6 col-12">
					<a href="<?= base_url('city/') . str_replace(" ", "-", str_replace(' ', '-', strtolower($sb['name']))) ?>" class="tile interactive-tile city-tile upcoming">
						<!-- <a href="<?= base_url('city/') . str_replace(' ', '-', strtolower($sb['name'])) ?>" class="tile interactive-tile city-tile ongoing"> -->
						<div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="100">
							<div class="col-auto">
								<div class="photo rounded-circle bg-red mb-3 p-2">
									<img src="<?= base_url("assets/images/icons/city/new/") . $sb['image']?>" alt="Mumbai" height="100">
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
				</div>
<?php
			endif;
		endif;
	endfor;
endif;
?>
<?php
if (!is_null($past_springboards)):
	for ($i = 0; $i < count($past_springboards); $i++) :
		$sb = $past_springboards[$i];
		if (isset($sb) && is_array($sb)):
?>
			<div class="col-lg-4 col-md-6 col-sm-6 col-12">
				<a href="<?= base_url('city/') . str_replace(" ", "-", str_replace(' ', '-', strtolower($sb['name']))) ?>" class="tile interactive-tile city-tile">
					<!-- <a href="<?= base_url('city/') . str_replace(' ', '-', strtolower($sb['name'])) ?>" class="tile interactive-tile city-tile ongoing"> -->
					<div class="row justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="<?= $i * 10 ?>">
						<div class="col-auto">
							<div class="photo rounded-circle bg-red mb-3 p-2">
								<img src="<?= base_url("assets/images/icons/city/new/") . $sb['image']?>" alt="Mumbai" height="100">
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
			</div>
<?php
		endif;
	endfor;
endif;
?>
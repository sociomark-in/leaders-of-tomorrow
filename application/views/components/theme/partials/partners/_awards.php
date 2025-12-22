<div class="col-12">
	<div class="partners-nav row g-3 m-0 justify-content-center justify-content-lg-around">
		<div class="col-sm-6 col-12 col-md-auto" data-aos="fade-up">
			<a href="javascript:void(0)" class="nav-link text-dark text-center d-block">
				<p class="mb-3">
					An Initiative By
				</p>
				<div class="px-3">
					<img src="<?= base_url('assets/images/sponsors/') ?>times-influence.png" alt="Partners" height="80">
				</div>
			</a>
		</div>
		<div class="col-sm-6 col-12 col-md-auto" data-aos="fade-up" data-aos-delay="100">
			<a href="https://www.idfcfirstbank.com" target="_blank" class="nav-link text-dark text-center d-block">
				<p class="mb-3">
					<strong class="text-uppercase">Presented By</strong>
				</p>
				<div class="px-3">
					<img src="<?= base_url('assets/images/sponsors/') ?>idfc.png" alt="Partners" height="70">
				</div>
			</a>
		</div>
		<?php if(isset($partners) && count($partners) > 0): ?>
		<?php foreach ($partners as $key => $partner): ?>
			<div class="col-sm-6 col-12 col-md-auto" data-aos="fade-up" data-aos-delay="100">
				<a href="<?= $partner['url'] ?>" target="_blank" class="nav-link text-dark text-center d-block">
					<p class="mb-3">
						<?= $partner['text'] ?>
					</p>
					<div class="px-3">
						<img src="<?= base_url('assets/images/sponsors/13/') . $partner['logo'] ?>" alt="Partners" height="80">
					</div>
				</a>
			</div>
			<?php endforeach ?>
			<?php endif ?>
			<!-- 
		<div class="col-sm-6 col-12 col-md-auto" data-aos="fade-up" data-aos-delay="100">
			<a href="https://www.idfcfirstbank.com" target="_blank" class="nav-link text-dark text-center d-block">
				<p class="mb-3">
					Presented By
				</p>
				<div class="px-3">
					<img src="<?= base_url('assets/images/sponsors/12/') ?>idfc.png" alt="Partners" height="80">
				</div>
			</a>
		</div>
		<div class="col-sm-6 col-12 col-md-auto" data-aos="fade-up" data-aos-delay="100">
			<a href="https://www.idfcfirstbank.com" target="_blank" class="nav-link text-dark text-center d-block">
				<p class="mb-3">
					Process Partner
				</p>
				<div class="px-3">
					<img src="<?= base_url('assets/images/sponsors/12/') ?>ey.png" alt="Partners" height="80">
				</div>
			</a>
		</div>
		<div class="col-sm-6 col-12 col-md-auto" data-aos="fade-up" data-aos-delay="100">
			<a href="https://www.idfcfirstbank.com" target="_blank" class="nav-link text-dark text-center d-block">
				<p class="mb-3">
					Education Partner
				</p>
				<div class="px-3">
					<img src="<?= base_url('assets/images/sponsors/12/') ?>bu.png" alt="Partners" height="80">
				</div>
			</a>
		</div>
		<div class="col-sm-6 col-12 col-md-auto" data-aos="fade-up" data-aos-delay="200">
			<a href="https://fiana.co.in/" target="_blank" class="nav-link text-dark text-center d-block">
				<p class="mb-3">
					Outdoor Partners
				</p>
				<div class="px-3">
					<img src="<?= base_url('assets/images/sponsors/12/') ?>ooh-unit.png" alt="Partners" height="50">
					<div class="row justify-content-center g-2 d-none">
						<div class="col-auto">
							<img src="<?= base_url('assets/images/sponsors/12/') ?>ooh_only.png" alt="Partners" height="30" style="margin-top: 2rem;">
						</div>
						<div class="col-auto">
							<img src="<?= base_url('assets/images/sponsors/12/') ?>ooh.png" alt="Partners" height="80">
						</div>
					</div>
				</div>
			</a>
		</div> -->
	</div>
</div>

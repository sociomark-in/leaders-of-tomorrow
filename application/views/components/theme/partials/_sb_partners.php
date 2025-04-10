<section class="py-3 py-md-5 bg-white blank-all" id="partners">
	<div class="container">
		<div class="row m-0 gap-3 gap-md-4">
			<?php if(isset($city['partners'])):?>
			<div class="col-12">
				<div class="mb-md-4 mb-3 section-title text-center">
					<h2 class=""><span>Springboard Partners</span></h2>
				</div>
				<div class="row m-0 justify-content-center">
					<?php switch ($this->uri->segment(2)):
						// Cities
						case 'coimbatore':
							$data['city'] = $city['name'];
							$data['partners'] = $city['partners'];
							$this->load->view('components/theme/partials/partners/layout-01', $data);
							break;
						case 'delhi':
							$data['city'] = $city['name'];
							$data['partners'] = $city['partners'];
							$this->load->view('components/theme/partials/partners/layout-01', $data);
							break;
						case 'bengaluru':
							$data['city'] = $city['name'];
							$data['partners'] = $city['partners'];
							$this->load->view('components/theme/partials/partners/layout-01', $data);
							break;
						case 'goa':
							$data['city'] = $city['name'];
							$data['partners'] = $city['partners'];
							$this->load->view('components/theme/partials/partners/layout-01', $data);
							break;
						case 'ahmedabad':
							$data['city'] = $city['name'];
							$data['partners'] = $city['partners'];
							$this->load->view('components/theme/partials/partners/layout-01', $data);
							break;
						case 'nagpur':
							$data['city'] = $city['name'];
							$data['partners'] = $city['partners'];
							$this->load->view('components/theme/partials/partners/layout-01', $data);
							break;
						case 'kolkata':
							$data['city'] = $city['name'];
							$data['partners'] = $city['partners'];
							$this->load->view('components/theme/partials/partners/layout-01', $data);
							break;

						default:
							break;
					endswitch; ?>
				</div>
			</div>
			<?php endif ?>
			<div class="col-12">
				<div class="mb-md-4 mb-3 section-title text-center">
					<h2 class=""><span>Our Partners</span></h2>
				</div>
				<div class="row m-0 justify-content-center">
					<?php switch ($this->uri->segment(2)):
						// Seasons
						case 'season-11':
						case 'season-10':
						case 'season-9':
						case 'season-8':
							$this->load->view('components/theme/partials/partners/_season-old');
							break;

						default:
							$this->load->view('components/theme/partials/partners/season-12/_main');
							break;
					endswitch; ?>
				</div>
			</div>
		</div>
	</div>
</section>

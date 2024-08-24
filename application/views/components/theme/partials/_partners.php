<section class="py-3 py-md-5 bg-white" id="partners">
	<div class="container">
		<div class="row m-0">
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
							$this->load->view('components/theme/partials/partners/_season-11');
							break;
						// Cities
						case 'mumbai':
							$this->load->view('components/theme/partials/partners/season-12/_main');
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

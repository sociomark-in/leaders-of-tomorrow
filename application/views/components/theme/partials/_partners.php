
<?php if ($this->uri->segment(1) == "awards") {
	$this->load->view('components/theme/partials/partners/_awards');
} else {
	switch ($this->uri->segment(2)) {
			// Seasons
		case 'season-11':
		case 'season-10':
		case 'season-9':
		case 'season-8':
			$this->load->view('components/theme/partials/partners/_season-old');
			break;

		default:
			$this->load->view('components/theme/partials/partners/_main');
			break;
	}
}

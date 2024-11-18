<?php switch ($this->uri->segment(2)):
	case 'coimbatore':
		$data['city'] = $city['name'];
		$data['partners'] = $city['partners'];
		$this->load->view('components/theme/partials/partners/layout-01', $data);
		break;
endswitch; ?>

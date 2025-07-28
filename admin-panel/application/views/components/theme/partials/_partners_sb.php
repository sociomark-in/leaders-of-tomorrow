
<?php 	
switch ($this->uri->segment(2)):
	case 'coimbatore':
	case 'pune':
	case 'indore':
	case 'jaipur':
	case 'delhi':
	case 'bengaluru':
	case 'ahmedabad':
	case 'goa':
	case 'nagpur':
	case 'kolkata':
		$data['city'] = $city['name'];
		$data['partners'] = $city['partners'];
		$this->load->view('components/theme/partials/partners/layout-01', $data);
		break;
endswitch;

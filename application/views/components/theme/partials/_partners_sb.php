
<?php
if (in_array($this->uri->segment(2), 
[
	'mumbai',
])):
	$data['city'] = $city['name'];
	$data['partners'] = $city['partners'];
	$this->load->view('components/theme/partials/partners/layout-01', $data);
endif;

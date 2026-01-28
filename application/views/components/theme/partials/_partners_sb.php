
<?php
if (isset($city['partners']) && in_array($this->uri->segment(2), 
[
	'mumbai',
	'hyderabad',
	'bengaluru',
	'chennai',
	'kolkata',
	'delhi',
	'pune',
	'ahmedabad',
])):
	$data['city'] = $city['name'];
	$data['partners'] = $city['partners'];
	$this->load->view('components/theme/partials/partners/layout-01', $data);
endif;

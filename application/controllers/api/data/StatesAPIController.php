<?php

class StatesAPIController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output
			->set_header('Cache-Control: no-store, no-cache')
			->set_content_type('application/json');
	}

	public function get_all_states()
	{
		$this->load->model('data/StateModel');
		$this->load->model('data/CityModel');
		
		$data['states'] = json_decode($this->StateModel->get(), true);

		// foreach ($data['states'] as $key => $state) {
		// 	$data['states'][$key]['cities'] => $this->CityModel->get(null, [''])
		// }


		$this->output->set_output(json_encode($data));
	}
}

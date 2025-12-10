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
		$this->output->set_output(json_encode($data));
	}


	public function get_cities_by_state(){
		$this->load->model('data/CityModel');
		$state = $this->input->get('state');
		$this->output->set_output($this->CityModel->get(null, ['city_state' => $state]));
	}
}

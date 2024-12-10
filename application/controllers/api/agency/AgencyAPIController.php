<?php

class AgencyAPIController extends CI_Controller
{
	private $request, $response, $data;
	public function __construct()
	{
		parent::__construct();
	}

	public function new_agency() {
		$this->request = $this->input->post();
		$this->load->model('panel/AgentModel');
		if($this->AgentModel->insert()){
			print_r($this->request);
		}
	}
}

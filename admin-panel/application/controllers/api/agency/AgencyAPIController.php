<?php

class AgencyAPIController extends CI_Controller
{
	private $request, $response, $data;
	public function __construct()
	{
		parent::__construct();
	}

	public function new_agency() {
		$this->data = [
			'agent_id' => $this->input->post('agent_id'),
			'name' => $this->input->post('agent_name'),
		];
		$this->load->model('panel/AgentModel');
		if($this->AgentModel->insert($this->data)){
			redirect('all-agents');
		}
	}
}

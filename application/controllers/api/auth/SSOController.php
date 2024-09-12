<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SSOController extends CI_Controller
{
	private $request, $response, $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/User');
	}

	public function participant_login()
	{
		redirect('profile/' . random_string('alnum', 16));
	}

	public function validate()
	{
		$this->request = $this->input->get();
		foreach ($this->request as $key => $value) {
			switch ($key) {
				case 'email':
					if (filter_var($value, FILTER_VALIDATE_EMAIL) && checkdnsrr('sociomark.in')) {
						if (count($this->User->get([$key => $value])) >= 0) {
							$this->output->set_content_type('application/json')->set_output("false");
						} else {
							$this->output->set_content_type('application/json')->set_output("true");
						}
					} else {
						$this->output->set_content_type('application/json')->set_output("false");
					}
					break;

				default:
					$this->output->set_content_type('application/json')->set_output("false");
					break;
			}
		}
	}

	public function participant_register()
	{
		$this->request = $this->input->post();
		$data = $this->request;
		if ($this->User->insert($this->request)) {
			$this->session->set_userdata('nomination_user', $data);
			echo "<pre>";
			print_r($data);
		}
	}
}

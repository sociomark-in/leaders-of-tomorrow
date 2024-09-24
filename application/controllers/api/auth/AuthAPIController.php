<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthAPIController extends CI_Controller
{
	private $request, $response, $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');
	}

	public function participant_login()
	{
		$this->request = $this->input->post();
		$this->data['user'] = json_decode($this->UserModel->get(null, ['useremail' => $this->request['useremail']]), true)[0];
		if (count($this->data['user'])) {
			$user = $this->data['user'];
			if (hash('md5', hash('sha256', $this->request['password'])) == $user['password']) {
				$session = $this->data['user'];
				$this->session->set_userdata('awards_panel_user', $session);
				redirect('dashboard');
			} else {
				redirect('login');
			}
		}
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
			$this->session->set_userdata('awards_panel_user', $data);
			echo "<pre>";
			print_r($data);
		}
	}

	public function send_otp(){
		$this->output
	}
	public function verify_otp(){}
}

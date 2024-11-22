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
		$this->request['passowrd_encrypted'] = hash('md5', hash('sha256', $this->request['password']));
		$this->data['user'] = json_decode($this->UserModel->get(null, ['useremail' => $this->request['useremail']]), true)[0];
		if (count($this->data['user'])) {
			$user = $this->data['user'];
			if (hash('md5', hash('sha256', $this->request['password'])) == $user['password']) {
				$session = $this->data['user'];
				$this->session->set_userdata('awards_panel_user', $session);
				redirect('dashboard');
			} else {
				$session['status'] = 'ERROR';
				$session['message'] = 'Incorrect Credentials!';
				$this->session->set_flashdata('user_login_status', $session);
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
						if (count($this->UserModel->get([$key => $value])) >= 0) {
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
		// $password = random_string('alnum', 16);

		$contact = $this->request['contact'];
		$this->request['password'] = hash('md5', hash('sha256', $contact));

		$data['name'] = $this->request['name'];
		$data['email'] = $this->request['email'];
		$data['contact'] = $this->request['contact'];
		$data['role'] = 'participant';
		$data['useremail'] = $data['email'];
		$data['password'] = $this->request['password'];
		$existing_user = json_decode($this->UserModel->get(null, ['useremail' => $this->request['email']]), true)[0];
		$session = [
			'status' => 'UNDEFINED',
			'message' => 'Unknown Error Occured!'
		];
		if (!is_null($existing_user) && count($existing_user) >= 1) {
			$session['status'] = 'WARNING';
			$session['message'] = 'You have already registered. Please Log In Again.';
			$this->session->set_flashdata('user_login_status', $session);
			redirect('login');
		} else {
			if ($this->UserModel->insert($data)) {
				$session['status'] = 'SUCCESS';
				$session['message'] = 'You have successfully registered. Please Log In.';
				$this->session->set_flashdata('user_login_status', $session);
				redirect('login');
			} else {
				$session['status'] = 'WARNING';
				$session['message'] = 'You have already registered. Please Log In Now.';
				$this->session->set_flashdata('user_login_status', $session);
				redirect('register');
			}
		}
	}

	public function agency_lead_register()
	{
		$this->request = $this->input->post();
		
		$data['name'] = $this->request['name'];
		$data['email'] = $this->request['email'];
		$data['contact'] = $this->request['contact'];
		
		$session = [
			'status' => 'UNDEFINED',
			'message' => 'Unknown Error Occured!'
		];
		if ($this->request['do_regoster'] == 'on') {
			$existing_user = json_decode($this->UserModel->get(null, ['useremail' => $this->request['email']]), true)[0];
			if (!is_null($existing_user) && count($existing_user) >= 1) {
				$session['status'] = 'WARNING';
				$session['message'] = 'You have already registered. Please Log In Again.';
				$this->session->set_flashdata('user_login_status', $session);
				redirect('login');
			} else {
				$contact = $this->request['contact'];
				$this->request['password'] = hash('md5', hash('sha256', $contact));
				$data['role'] = 'participant';
				$data['useremail'] = $data['email'];
				$data['password'] = $this->request['password'];
				$existing_user = json_decode($this->UserModel->get(null, ['useremail' => $this->request['email']]), true)[0];
				$session = [
					'status' => 'UNDEFINED',
					'message' => 'Unknown Error Occured!'
				];
				if (!is_null($existing_user) && count($existing_user) >= 1) {
					$session['status'] = 'WARNING';
					$session['message'] = 'You have already registered. Please Log In Again.';
					$this->session->set_flashdata('user_login_status', $session);
					redirect('login');
				} else {
					if ($this->UserModel->insert($data)) {
						$session['status'] = 'SUCCESS';
						$session['message'] = 'You have successfully registered. Please Log In.';
						$this->session->set_flashdata('user_login_status', $session);
						redirect('login');
					} else {
						$session['status'] = 'WARNING';
						$session['message'] = 'You have already registered. Please Log In Now.';
						$this->session->set_flashdata('user_login_status', $session);
						redirect('agency-register');
					}
				}
			}
		} else {
			$this->LeadsModel->insert();
		}
		print_r($this->input->post());
	}

	public function send_otp()
	{
		$this->request = $this->input->post();
		$error = false;
		if ($this->request['email'] == "") {
			$error = true;
		}
		if ($error) {
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'status' => 'error',
					'message' => 'Email Address is Empty',
				]));
		} else {
			$otp = random_int(1000, 9999);
			$this->session->set_tempdata('otp', $otp, 300);
			$this->output
				->set_content_type('application/json')
				->set_output(json_encode([
					'status' => 'success',
					'otp' => $otp,
					'message' => 'OTP Sent Successfully!',
				]));
		}
	}

	public function verify_otp()
	{
		$this->request = $this->input->get();
		if (isset($this->session->otp)) {
			$otp = $this->session->otp;
		}
		if (true) {
			$this->output->set_content_type('application/json')->set_output(json_encode(['status' => true]));
		} else {
			$this->output->set_content_type('application/json')->set_output(json_encode(['status' => false]));
		}
	}
}

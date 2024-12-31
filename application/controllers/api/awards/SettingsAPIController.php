<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingsAPIController extends CI_Controller
{
	private $request, $response, $data, $usersession;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');
		$this->encryption->initialize(
			array(
				'cipher' => 'aes-256',
				'mode' => 'ctr',
			)
		);

		$this->data = [];
		$this->usersession = $_SESSION['awards_panel_user'];
		$this->load->model('panel/EntriesModel');
	}

	public function forgot_pw_otp()
	{
		$this->request = $this->input->post();
		$user = json_decode($this->UserModel->get(null, ['useremail' => $this->request['useremail']]), true)[0];

		if (count($user) > 0) {
			$OTP = random_int(100000, 999999);
			$session = [
				'email' => $user['useremail'],
				'otp' => $OTP,
			];
			$this->session->set_tempdata('temp_otp', $session, 1000);
			$this->load->library('email/BrevoCURLMail');
			$recipients = [
				[
					"email" =>  $user['useremail'],
					"name" =>  "Registered User"
				]
			];
			$subject = APP_NAME . " - Resent Password";
			$body = "Hi, <br>Your OTP is as follows:<br>" .  $OTP;
			// $htmlbody = $this->load->view('panel/emails/participant_nomination_success', null, true);
			if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, null, $body)->send()) {
				$key = $this->encryption->encrypt($user['useremail']);
				redirect('forgot-password?key=' . $key);
			}
		}
	}

	public function forgot_pw()
	{
		$this->request = $this->input->post();

		$user = $this->UserModel->get(null, ['useremail' => $this->request['useremail']]);
		print_r($user);
		die;
		$this->load->library('email/BrevoCURLMail');
		$recipients = [
			[
				"email" =>  $this->request['useremail'],
				"name" =>  "Registered User"
			]
		];
		$subject = APP_NAME . " - Resent Password";
		$body = "Hi, <br>Your login Details are as follows:<br>Username:" . $this->request['email'] . "<br>Password:" . $this->request['email'] . "<br>Please <a href=" . base_url('login') . ">Login</a>";
		// $htmlbody = $this->load->view('panel/emails/participant_nomination_success', null, true);
		if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, null, $body)->send()) {
			redirect('login');
		}
	}

	public function password_reset()
	{
		$this->request = $this->input->post();

		$user = json_decode($this->UserModel->get(null, ['password' => hash('md5', hash('sha256', $this->request['password_curr'])), 'useremail' => $this->usersession['useremail']]), true)[0];
		$password = hash('md5', hash('sha256', $this->request['password']));
		if (count($user)) {
			$password = hash('md5', hash('sha256', $this->request['password']));
			if ($this->UserModel->update(['password' => $password, 'is_password_reset' => 1], ['id' => $user['id']])) {
				$session = [
					'status' => 'SUCCESS',
				];
			} else {
				$session = [
					'status' => 'ERROR',
				];
			}
		} else {
			$session = [
				'status' => 'WARNING',
			];
		}
		$this->session->set_flashdata('password_reset_status', $session);
		redirect('dashboard/my-profile');
	}
}

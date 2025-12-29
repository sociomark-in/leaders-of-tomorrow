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

	public function forgot_pw_resend()
	{
		$this->request = $this->input->post();

		$user = json_decode($this->UserModel->get(null, ['useremail' => $this->request['useremail']]), true)[0];

		if (!is_null($user) && count($user)) {
			$this->load->library('email/BrevoCURLMail');
			$recipients = [
				[
					"email" =>  $user['useremail'],
					"name" =>  $user['name'],
				]
			];
			$password = $user['contact'];
			$data['email'] = $user['email'];

			switch ($data['email']) {
				case 'savitri@leadersoftomorrow.co.in':
				case 'nilam@leadersoftomorrow.co.in':
					$data['password'] = '@Gency#1LOTS@12';

					break;
				case 'kunal@sociomark.in':
				// case 'hemant@sociomark.in':
				case 'business@sociomark.in':
				case 'admin@timesnetwork.com':
					$data['password'] = "Sociomark@0610";
					break;
				default:
					# code...
					$data['password'] = $password;
					break;
			}

			$email_data = [
				'user' => [
					"name" =>  $user['name'],
					'email' => $data['email'],
					'password' => $data['password'],
				]
			];

			if ($_SESSION['user_password_reset']) {
				$session['status'] = 'WARNING';
				$session['message'] = 'Too many requests! Please try again tomorrow!';
				$this->session->set_flashdata('user_login_status', $session);
				redirect('forgot-password');
			} else {
				$subject = APP_NAME . " - Resent Password";
				$body = "Hi, <br>Your login Details are as follows:<br>Username:" . $this->request['email'] . "<br>Password:" . $this->request['email'] . "<br>Please <a href=" . base_url('login') . ">Login</a>";
				$htmlbody = $this->load->view('panel/emails/participant_register_new', $email_data, true);
				if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
					$session['status'] = 'SUCCESS';
					$session['message'] = 'The Login Credentials has been sent to entered email address!';
					$this->session->set_flashdata('user_login_status', $session);
					$this->session->set_tempdata('user_password_reset', TRUE, 86000);
					redirect('login');
				}
			}
		} else {
			$session['status'] = 'ERROR';
			$session['message'] = 'Incorrect Credentials! User Not Found!';
			$this->session->set_flashdata('user_login_status', $session);
			redirect('forgot-password');
		}
	}
	public function forgot_pw()
	{
		$this->request = $this->input->post();

		$user = $this->UserModel->get(null, ['useremail' => $this->request['useremail']]);

		if (count($user)) {
			$this->load->library('email/BrevoCURLMail');
			$recipients = [
				[
					"email" =>  $user['useremail'],
					"name" =>  $user['name'],
				]
			];
			$subject = APP_NAME . " - Resent Password";
			$body = "Hi, <br>Your login Details are as follows:<br>Username:" . $this->request['email'] . "<br>Password:" . $this->request['email'] . "<br>Please <a href=" . base_url('login') . ">Login</a>";
			$htmlbody = $this->load->view('panel/emails/participant_nomination_success', null, true);
			if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
				redirect('login');
			}
		} else {
			$session['status'] = 'ERROR';
			$session['message'] = 'Incorrect Credentials! User Not Found!';
			$this->session->set_flashdata('user_login_status', $session);
			redirect('forgot-password');
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

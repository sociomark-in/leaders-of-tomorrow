<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VerificationAPIController extends CI_Controller
{
	private $request, $response, $data, $usersession, $email_client;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');
		
		$this->load->library('email/BrevoCURLMail');


		$this->data = [];
		$this->usersession = $_SESSION['awards_panel_user'];
		$this->load->model('panel/EntriesModel');
	}

	public function send($type)
	{
		$this->request = $this->input->post();
		switch ($type) {
			case 'email':
				$email = $this->request['email'];
				$user = json_decode($this->UserModel->get(null, ['useremail' => $email]), true)[0];
				if (count($user)) {
					/* Send Verification EMail */
					$token = hash('md5', hash('sha256', json_encode([
						'email' => $this->request['email'],
						'status' => true,
					])));
					$session = [
						'token_id' => $token,
						'dispose_after' => ''
					];
					$this->session->set_tempdata('email_verify_token', $session, 600);
					$verification_link = base_url() . 'api/v2/auth/verify/email/verify?token=' . $token;
					/* PHP Emailer Script */
					try {
						if (!is_null($email)) {
							$recipients = [
								[
									"email" =>  $user['email'],
									"name" =>  $user['name']
								]
							];
							$subject = APP_NAME . " - Registration!";
							$body = "Hi {$user['name']},<br>Please Click <a href='{$verification_link}'>This Link</a> to Verify Your Email Address";
							if ($this->brevocurlmail->_init_()->config_plaintext(null, $recipients, $subject, $body)->send()) {
								$session = [
									'status' => 'SUCCESS',
								];
							} else {
								$session = [
									'status' => 'ERROR',
								];
							}
						}
					} catch (Exception $th) {
						echo "Failed!! Mailer Error: {$this->email_client->ErrorInfo}";
					}
					/* Send Verification EMail */
				} else {
					$session = [
						'status' => 'ERROR',
					];
				}
				redirect($this->request['referer']);
				$this->session->set_flashdata('email_verification_status', $session);
				break;

			default:
				break;
		}
	}
	public function verify($type)
	{
		$this->request = $this->input->get();

		switch ($type) {
			case 'email':
				$user = json_decode($this->UserModel->get(null, ['useremail' => $this->usersession['useremail']]), true)[0];
				if ($this->UserModel->update(['is_email_verified' => 1], ['id' => $user['id']])) {
					$session = [
						'status' => 'SUCCESS',
					];
				} else {
					$session = [
						'status' => 'ERROR',
					];
				}
				redirect('dashboard');
				break;
			default:
				break;
		}
	}
}

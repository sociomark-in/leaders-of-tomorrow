<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VerificationAPIController extends CI_Controller
{
	private $request, $response, $data, $usersession;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');

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
						'token_id' => 
						'dispose_after'
					];
					$this->session->set_tempdata('email_verify_token', $session, 600);
					$verification_link = base_url('api/v2/auth/verify/email/verify?token=' . $token);

					/* PHP Emailer Script */
					if (true) {
						$session = [
							'status' => true,
						];
					} else {
						$session = [
							'status' => false,
						];
					}
					/* Send Verification EMail */
				} else {
					$session = [
						'status' => false,
					];
				}
				$this->session->set_flashdata('email_verify_session', $session);
				break;

			default:
				break;
		}
		redirect($this->request['referer']);
	}
	public function verify()
	{
		$this->request = $this->input->post();
		echo "<pre>";
		print_r($this->usersession);
		print_r($this->request);

		switch ($type) {
			case 'email':
				break;
				default:
				break;
				redirect($this->request['referer']);
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VerificationAPIController extends CI_Controller
{
	private $request, $response, $data, $usersession, $email_client;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');
		
		$this->load->library('email/GlobalMail');
		$this->email_client = new GlobalMail(true);


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
					$verification_link = base_url('api/v2/auth/verify/email/verify?token=' . $token);
					/* PHP Emailer Script */
					try {
						if (!is_null($email)) {
							$this->email_client->_init_();
							$this->email_client->create_pool(['name' => 'LOT Awards', 'email' => 'noreply@leadersoftomorrow.co.in'], [$email], 'response@timesnetwork.in');
							$this->email_client->data('Custom Subject', 'panel/emails/mail', null, 'This is the body in plain text for non-HTML mail clients');
							if ($this->email_client->send()) {
								echo "Success!!!";
								$session = [
									'status' => true,
								];
							} else {
								$session = [
									'status' => false,
								];
							}
						}
					} catch (Exception $th) {
						echo "Failed!! Mailer Error: {$this->email_client->ErrorInfo}";
					}
					/* Send Verification EMail */
				} else {
					$session = [
						'status' => false,
					];
				}
				redirect($this->request['referer']);
				$this->session->set_flashdata('emailverification_send_session', $session);
				break;

			default:
				break;
		}
	}
	public function verify($type)
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
		}
		redirect($this->request['referer']);
	}
}

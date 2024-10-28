<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . '/vendor/autoload.php';

use Google\Service\Oauth2;

class SSOAPIController extends CI_Controller
{
	private $request, $response, $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');
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

	public function participant_google_profile()
	{
		$this->load->library('googlelogin/GoogleOAuthClient');
		$google_user = $this->googleoauthclient->get_profile();
		if(is_object($google_user)){
			$session = [
				'status' => 'SUCCESS',
				'profile' => [
					'name' => $google_user->name,
					'email' => $google_user->email,
					'picture' => $google_user->picture,
					'is_email_verified' => $google_user->verifiedEmail,
				]
			];
		} else {
			$session = [
				'status' => 'ERROR',
				'code' => "Invalid_Request"
			];
		}
		$this->session->set_tempdata('googleuser', $session, 600);
		redirect('register');
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "controllers/BaseController.php";
class RegisterController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->library('googlelogin/GoogleOAuthClient');
		if ($this->session->has_userdata('googleuser')) {
			$this->data['googleusercontent'] = $_SESSION['googleuser'] ?? null;
		}
		$this->data['page'] = [
			'oauth_url' => [
				'google' => $this->googleoauthclient->get_login_url(),
				'facebook' => base_url()
			],
			'title' => "Register" . " • " . APP_NAME . " " . date('Y')
		];

		// echo "<pre>";
		// print_r($this->data);
		// die;
		$this->load->mini_view('register', $this->data);
	}

	public function agency_register($code)
	{
		$this->load->model('panel/AgentModel');
		$agent = json_decode($this->AgentModel->get(null, ['agent_id' => $code]), true);
		$f = false;
		if (count($agent) > 0) {
			$this->data['agency'] = $agent[0];
			$this->load->mini_view('agency_register', $this->data);
		} else {
			redirect(base_url('register'));
		}
	}
}

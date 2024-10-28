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
		if ($this->session->has_userdata('googleuser')){
			$this->data['googleusercontent'] = $_SESSION['googleuser']?? null;
		}
		$this->data['page'] = [
			'oauth_url' => [
				'google' => $this->googleoauthclient->get_login_url(),
				'facebook' => base_url()
			],
			'title' => "Register" . " • " . APP_NAME . " " . date('Y')
		];
		$this->load->mini_view('register', $this->data);
	}
}

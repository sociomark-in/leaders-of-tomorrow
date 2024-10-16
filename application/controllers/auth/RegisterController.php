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
		$this->load->library('googlelogin/googleoauthclient');
		$this->data['page'] = [
			'oauth_url' => $this->googleoauthclient->get_login_url(),
			'title' => "Register" . " • " . APP_NAME . " " . date('Y')
		];
		$this->load->mini_view('register', $this->data);

	}
}

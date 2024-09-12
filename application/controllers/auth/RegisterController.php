<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/BaseController.php";
class RegisterController extends BaseController{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->data['page'] =[
			'title' => "Register". " • " . APP_NAME . " " .date('Y')
		];
		$this->load->mini_view('register', $this->data);

		// include APPPATH.'libraries/google/vendor/autoload.php';
		// $google_client = new Google_Client();
		// $google_client->setClientId("449257910188-1kfmck8kh3t713cm6ogttevgsfhfg5to.apps.googleusercontent.com");
		// $google_client->setClientSecret("i1MJ3Nw7aU3OUqN7C2i4jLhW");
		// $google_client->setRedirectUri('https://sociomark.in/google_login/login');
		// $google_client->addScope('email');
		// $google_client->addScope('profile');
		// $this->data['redirect_url'] = $google_client->createAuthUrl();
	}
}


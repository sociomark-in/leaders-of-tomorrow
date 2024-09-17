<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/BaseController.php";
class LoginController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function single(){
		$this->data['page'] =[
			'title' => "Login"
		];
		$this->load->mini_view('login', $this->data);
	}

	public function multi(){
		$this->load->mini_view('multilogin');
	}

	public function logout(){
		unset($_SESSION['awards_panel_user']);
		redirect('login');
	}
}

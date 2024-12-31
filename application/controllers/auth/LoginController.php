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

	public function forgot_pw(){
		$get = $this->input->get('key');

		if(!isset($get)){
			$this->load->mini_view('forgot_pw_otp', $this->data);
		} else {
			$this->load->mini_view('forgot_pw_change', $this->data);
		}
	}

	public function multi(){
		$this->load->mini_view('multilogin');
	}

	public function logout(){
		unset($_SESSION['awards_panel_user']);
		redirect('login');
	}
}

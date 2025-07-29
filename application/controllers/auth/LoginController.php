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
		redirect($this->PANEL_URL . "/login");
	}

	public function forgot_pw(){
		$get = $this->input->get('key');
		$this->load->mini_view('forgot_pw_otp', $this->data);
	}

	public function multi(){
		$this->load->mini_view('multilogin');
	}

	public function logout(){
		unset($_SESSION['awards_panel_user']);
		redirect('login');
	}
}

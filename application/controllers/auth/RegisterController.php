<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/BaseController.php";
class RegisterController extends BaseController{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->data['page']['title'] = "Awards Registration" ." • " .  APP_NAME . " " .date('Y');
		$this->load->page('register', $this->data);
	}
}


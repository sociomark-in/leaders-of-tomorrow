<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "controllers/BaseController.php";
class AccountController extends BaseController
{
	public function index() {
		$this->load->panel_view('home');
	}
}

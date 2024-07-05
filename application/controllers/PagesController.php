<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class PagesController extends BaseController {

	public function index()
	{
		$this->load->page('home', $this->data);
	}
}

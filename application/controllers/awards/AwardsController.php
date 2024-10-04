<?php
require_once APPPATH . "controllers/BaseController.php";
class AwardsController extends BaseController{
	public function __construct()
	{
		parent::__construct();
	}
	public function home() {
		$this->load->award_page('home', $this->data);
	}
}

<?php
require_once APPPATH . "controllers/BaseController.php";
class AwardsController extends BaseController{
	public function __construct()
	{
		parent::__construct();
	}
	public function index() {
		$this->data['page'] = [
			'title' =>  APP_NAME . " Awards • " . APP_NAME,
			'description' => "",
		];
		$this->load->award_page('home', $this->data);
	}
}

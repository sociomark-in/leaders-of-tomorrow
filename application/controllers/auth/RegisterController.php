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
		redirect($this->PANEL_URL . "/register");
	}

	public function agency_register($code)
	{
		$this->load->model('panel/AgentModel');
		$agent = json_decode($this->AgentModel->get(null, ['agent_id' => $code]), true)[0];
		$f = false;
		if (count($agent) > 0) {
			redirect($this->PANEL_URL . "/register?utm_source=" . $agent['agent_id'] . "&utm_medium=agency_referral");
		} else {
			redirect($this->PANEL_URL . "/register?utm_source=direct");
		}
	}
}

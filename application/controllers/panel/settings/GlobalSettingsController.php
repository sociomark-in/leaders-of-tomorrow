<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class GlobalSettingsController extends PanelController
{
	private $user_session, $result;
	public function __construct()
	{
		parent::__construct();
		$this->user_session = $_SESSION['awards_panel_user'];
		$this->load->model('panel/ConfigModel');
		$this->load->model('event/awards/CategoryModel');
	}
	public function index()
	{
		$config = [];
		$this->result = json_decode($this->ConfigModel->get(), true);
		foreach ($this->result as $key => $value) {
			$config[$value['config_key']] = $this->encryption->decrypt($value['value']);
		}
		echo "<pre>";
		print_r($config);
		die;
		$this->data['config'] = $config;
		$this->load->admin_view('settings/home', $this->data);
	}
}

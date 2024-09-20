<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class AccountController extends PanelController
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		switch ($_SESSION['awards_panel_user']['role']) {
			case 'admin':
				$this->load->admin_view('home');
				break;
			case 'jury':
				$this->load->moderator_view('home');
				break;
			default:
				$this->data['my_applications'] = [];
				$this->load->panel_view('home', $this->data);

				break;
		}
	}

	public function profile_setting_single($type)
	{
		switch ($type) {
			case 'reset-password':
				$this->load->panel_view('account/reset_pw');
				break;

			default:
				show_404();
				break;
		}
	}

	public function nominate()
	{
		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
		$this->load->page('register', $this->data);
	}
}

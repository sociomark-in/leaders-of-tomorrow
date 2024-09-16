<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class AccountController extends PanelController
{
	public function index()
	{
		switch ($_SESSION['user']['role']) {
			case 'admin':
				$this->load->admin_view('home');
				break;
			case 'moderator':
				$this->load->moderator_view('home');
				break;
			default:
				$this->load->panel_view('home');

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
		$this->data['user'] = $_SESSION['nomination_user'];
		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
		$this->load->page('register', $this->data);
	}
}

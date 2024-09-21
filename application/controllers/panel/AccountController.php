<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class AccountController extends PanelController
{
	private $user_session;
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->user_session = $_SESSION['awards_panel_user'];
		switch ($this->user_session['role']) {
			case 'admin':
				$this->load->admin_view('home');
				break;
			case 'jury':
				$this->load->moderator_view('home');
				break;
			default:
				$this->load->model('panel/EntriesModel');
				echo "<pre>";
				print_r([
						'individual' => json_decode($this->EntriesModel->get(null, ['created_by' => $this->user_session['id']], 'individual'), true), 
						'msme' => json_decode($this->EntriesModel->get(null, ['created_by' => $this->user_session['id']], 'msme'), true)
					]);
				die;
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

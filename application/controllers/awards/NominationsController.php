<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class NominationsController extends PanelController
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		switch ($_SESSION['user']['role']) {
			case 'admin':
				$this->load->admin_view('home');
				break;
			case 'moderator':
				break;
			default:
				$this->load->moderator_view('home');
				break;
		}
	}

	public function user_side()
	{
		$this->load->panel_view('my_applications');
	}
	public function single($slug)
	{
		$this->data['id'] = $slug;
		$this->load->panel_view('application_single', $this->data);
	}

	public function nominate()
	{
		$this->data['user'] = $_SESSION['nomination_user'];
		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
		$this->load->page('register', $this->data);
	}
}

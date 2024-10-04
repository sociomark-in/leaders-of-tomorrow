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

	public function nominate(){
		if(isset($_SESSION['nomination_user'])){
			$this->data['user'] = $_SESSION['nomination_user'];
		} else {
			redirect('login');
		}
		$this->data['page']['title'] = "Awards Registration" ." • " .  APP_NAME . " " .date('Y');
		$this->load->page('register', $this->data);
	}
}

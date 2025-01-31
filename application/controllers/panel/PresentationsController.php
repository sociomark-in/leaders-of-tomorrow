<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
require_once APPPATH . "vendor/autoload.php";

class PresentationsController extends PanelController
{
	public $user_session;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event/awards/CategoryModel');
		$this->load->model('panel/EntriesModel');
		$this->load->model('panel/AgentModel');
		$this->user_session = $_SESSION['awards_panel_user'];
	}

	public function index()
	{
		switch ($this->user_session['role']) {
			case 'participant':
				$this->load->panel_view('presentations/home', $this->data);
				# code...
				break;

			default:
				# code...
				break;
		}
	}

	/**
	 * single
	 *
	 * ### Single Presentation View
	 * 
	 * 
	 * @return void
	 */
	public function single($slug)
	{
		$this->load->panel_view('presentations/single', $this->data);
	}
}

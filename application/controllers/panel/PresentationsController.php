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
		$presentations = [];
		switch ($this->user_session['role']) {
			case 'participant':

				$this->load->panel_view('presentations/home', $this->data);
				# code...
				break;
			case 'jury':
			case 'admin':
			case 'super-admin':
				$this->data['all_applications'] = $presentations;

				$this->load->moderator_view('presentations/home', $this->data);
				break;

			default:
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
		$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug]), true)[0];
		$category_details = json_decode($this->CategoryModel->get(null, ['type' => $application['category_id']]), true)[0];
		$this->data['application'] = $application;
		$this->data['category'] = $category_details;
		$this->load->panel_view('presentations/single', $this->data);
	}
}

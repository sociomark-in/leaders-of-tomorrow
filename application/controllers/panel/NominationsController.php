<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class NominationsController extends PanelController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event/awards/CategoryModel');
		$this->data['user'] = $_SESSION['awards_panel_user'];
	}
	public function index()
	{
		$this->load->moderator_view('applications');
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

	public function nominate($code)
	{
		$category_details = array_merge(
			json_decode($this->CategoryModel->get_individual(null, ['code' => $code]), true),
			json_decode($this->CategoryModel->get_msme(null, ['code' => $code]), true)
		);

		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
		$this->data['category']['code'] = $code;
		$this->data['nomination']['stage'] = $this->input->get('stage');
		if (false) {
			// First View
			$this->load->panel_view('register', $this->data);
		} else {
			// Stepped View
			$this->load->panel_view('register', $this->data);
		}
	}
}

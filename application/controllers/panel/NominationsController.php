<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class NominationsController extends PanelController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event/awards/CategoryModel');
		$this->load->model('panel/EntriesModel');
		$this->data['user'] = $_SESSION['awards_panel_user'];
	}
	public function index()
	{
		$this->load->moderator_view('applications');
	}

	public function user_side()
	{
		$this->data['my_applications'] = [];
		$this->load->panel_view('my_applications', $this->data);
	}

	public function single($slug)
	{
		$this->data['id'] = $slug;
		$application = array_merge(
			json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug], 'individual'), true),
			json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug], 'msme'), true),
		)[0];


		$c = explode("_", $application['category_id']);
		if ($c[1] == 'Individual') {
			$category_details = json_decode($this->CategoryModel->get_individual(null, ['id' => $c[0]]), true)[0];
		} elseif ($c[1] == 'MSME') {
			$category_details = json_decode($this->CategoryModel->get_msme(null, ['id' => $c[0]]), true)[0];
		}
		$this->data['category'] = $category_details;

		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
		$this->data['nomination']['stage'] = $this->input->get('stage');
		$this->data['application']['id'] = $slug;

		$this->load->panel_view('application_single', $this->data);
	}

	public function nominate($code)
	{
		$category_details = array_merge(
			json_decode($this->CategoryModel->get_individual(null, ['code' => $code]), true),
			json_decode($this->CategoryModel->get_msme(null, ['code' => $code]), true)
		);
		$this->data['category'] = $category_details[0];

		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
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

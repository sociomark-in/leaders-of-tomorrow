<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class NominationsController extends PanelController
{
	public $user_session;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event/awards/CategoryModel');
		$this->load->model('panel/EntriesModel');
		$this->user_session = $_SESSION['awards_panel_user'];
	}
	public function index()
	{
		$applications = [
			'individual' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'id_74529', 'id_74530', 'id_74531', 'organization_url', 'linkedin_url', 'created_by', 'stage_status', 'created_at', 'updated_at', 'status'], null, 'individual'), true),
			'msme' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'id_75534', 'id_75535', 'id_75536', 'organization_url', 'linkedin_url', 'created_by', 'stage_status', 'created_at', 'updated_at', 'status'], null, 'msme'), true)
		];
		if (count($applications['individual']) > 0) {
			for ($i = 0; $i < count($applications['individual']); $i++) {
				$applications['individual'][$i]['category'] = json_decode($this->CategoryModel->get_individual(null, ['id' => $applications['individual'][$i]['category_id']]), true)[0];
				$s = $applications['individual'][$i]['status'];
				switch ($s) {
					case '0':
						$s = '<span class="badge bg-danger">Rejected</span>';
						break;
					case '1':
						$s = '<span class="badge bg-success">Accepted</span>';
						break;
					case '2':
						$s = '<span class="badge bg-dark">Unlocked</span>';
						break;
					case '3':
						$s = '<span class="badge bg-warning">Complete & In Review</span>';
						break;
					default:
						$s = '<span class="badge bg-secondary">Draft</span>';
						# code...
						break;
				}
				$applications['individual'][$i]['status_text'] = $s;
			}
		}
		if (count($applications['msme']) > 0) {
			for ($i = 0; $i < count($applications['msme']); $i++) {
				$applications['msme'][$i]['category'] = json_decode($this->CategoryModel->get_msme(null, ['id' => $applications['msme'][$i]['category_id']]), true)[0];
				$s = $applications['msme'][$i]['status'];
				switch ($s) {
					case '0':
						$s = '<span class="badge bg-danger">Rejected</span>';
						break;
					case '1':
						$s = '<span class="badge bg-success">Accepted</span>';
						break;
					case '2':
						$s = '<span class="badge bg-dark">Unlocked</span>';
						break;
					case '3':
						$s = '<span class="badge bg-warning">Complete & In Review</span>';
						break;
					default:
						$s = '<span class="badge bg-secondary">Draft</span>';
						# code...
						break;
				}
				$applications['msme'][$i]['status_text'] = $s;
			}
		}
		$this->data['all_applications'] = $applications;
		$this->load->moderator_view('applications/home', $this->data);
	}

	public function user_side()
	{
		$this->data['my_applications'] = [];
		$applications = [
			'individual' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'stage_status', 'created_at', 'updated_at', 'status'], ['created_by' => $this->user_session['id']], 'individual'), true),
			'msme' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'stage_status', 'created_at', 'updated_at', 'status'], ['created_by' => $this->user_session['id']], 'msme'), true)
		];
		if (count($applications['individual']) > 0) {
			for ($i = 0; $i < count($applications['individual']); $i++) {
				$applications['individual'][$i]['category'] = json_decode($this->CategoryModel->get_individual(null, ['id' => $applications['individual'][$i]['category_id']]), true)[0];
				$s = $applications['individual'][$i]['status'];
				switch ($s) {
					case '0':
						$s = 'Rejected';
						break;
					case '1':
						$s = 'Accepted';
						break;
					case '2':
						$s = 'In Review';
						break;
					case '3':
						$s = 'Complete';
						break;
					default:
						$s = 'Draft';
						# code...
						break;
				}
				$applications['individual'][$i]['status_text'] = $s;
			}
		}
		if (count($applications['msme']) > 0) {
			for ($i = 0; $i < count($applications['msme']); $i++) {
				$applications['msme'][$i]['category'] = json_decode($this->CategoryModel->get_msme(null, ['id' => $applications['msme'][$i]['category_id']]), true)[0];
				$s = $applications['msme'][$i]['status'];
				switch ($s) {
					case '0':
						$s = 'Rejected';
						break;
					case '1':
						$s = 'Accepted';
						break;
					case '2':
						$s = 'In Review';
						break;
					case '3':
						$s = 'Complete';
						break;
					default:
						$s = 'Draft';
						# code...
						break;
				}
				$applications['msme'][$i]['status_text'] = $s;
			}
		}
		$this->data['my_applications'] = $applications;
		$this->load->panel_view('my_applications', $this->data);
	}

	public function user_edit($slug)
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
		$this->data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug]), true)[0];
		// echo "<pre>";
		// print_r($this->data);
		$this->load->panel_view('categories_bulk/'  . strtolower($category_details['type']), $this->data);
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


		$this->user_session = $_SESSION['awards_panel_user'];
		switch ($this->user_session['role']) {
			case 'participant':
				$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
				$this->data['nomination']['stage'] = $this->input->get('stage');
				$this->data['application']['id'] = $slug;
				$this->load->panel_view('application_single', $this->data);
				break;
			case 'jury':
				$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
				$this->data['nomination']['stage'] = $this->input->get('stage');
				$this->data['application'] = array_merge(
					json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug, 'status' => 3, 'stage_status' => 5], 'msme'), true),
					json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug, 'status' => 3, 'stage_status' => 5], 'individual'), true),
				)[0];
				$this->load->moderator_view('applications/single', $this->data);
				break;
			default:
				break;
		}
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

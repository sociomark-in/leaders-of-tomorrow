<?php

use Clegginabox\PDFMerger\PDFMerger;

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
require_once APPPATH . "vendor/autoload.php";
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
			'msme' => json_decode($this->EntriesModel->get(["nomination_id", "category_id", "name", "email", "designation", "organization_name", "organization_state", "organization_city", "organization_url", "created_by", "stage_status", "created_at", "updated_at", "status"], ['status <=' => 3], 'msme'), true)
		];
		if (count($applications['msme']) > 0) {
			for ($i = 0; $i < count($applications['msme']); $i++) {
				$applications['msme'][$i]['category'] = json_decode($this->CategoryModel->get(null, ['type' => $applications['msme'][$i]['category_id']]), true)[0];
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
						$s = '<span class="badge bg-warning">Complete & Under Review</span>';
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

		$categories['msme'] = json_decode($this->CategoryModel->get(null, ['valid_until >' => date("Y-m-d H:i:s")]), true);
		$this->data['categories'] = $categories;
		$applications = [
			'msme' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'stage_status', 'created_at', 'updated_at', 'status'], ['created_by' => $this->user_session['id']]), true)
		];
		if (count($applications['msme']) > 0) {

			for ($i=0; $i < count($applications['msme']); $i++) { 
				# code...
				$application = $applications['msme'][$i];
				$application['category'] = json_decode($this->CategoryModel->get(null, ['type' => $application['category_id']]), true)[0];
				$application['created_at'] = date_format(date_create_from_format("Y-m-d H:i:s", $application['created_at']), 'F j, Y');
				$s = $application['status'];
				if ($s > 0) {
					foreach ($categories['msme'] as $key => $category) {
						if ($application['category']['type'] == $category['type']) {
							unset($categories['msme'][$key]);
						} 
					}
				}
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
						$s = '<span class="badge bg-warning">Complete & Under Review</span>';
						break;
					default:
						$s = '<span class="badge bg-secondary">Draft</span>';
						# code...
						break;
				}
				$application['status_text'] = $s;
				$applications['msme'][$i] = $application;
			}
		}

		$this->data['my_applications'] = $applications;
		$this->data['rest_categories'] = $categories;

		$this->load->panel_view('applications/home', $this->data);
	}

	public function user_edit($slug)
	{
		$this->load->model('panel/CommentModel');

		$this->load->model('data/StateModel');
		$this->load->model('data/CityModel');
		
		$this->data['locations']['states'] = json_decode($this->StateModel->get(), true);

		$this->data['id'] = $slug;
		$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug]), true)[0];


		$c = explode("_", $application['category_id']);
		$category_details = json_decode($this->CategoryModel->get(null, ['type' => $application['category_id']]), true)[0];

		$comments = json_decode($this->CommentModel->get(null, ['nomination_id' => $slug]), true);

		for ($i = 0; $i < count($comments); $i++) {
			$comments[$i]['created_by'] = json_decode($this->UserModel->get(null, ['id' => $comments[$i]['created_by']]), true)[0];
			$comments[$i]['created_at'] = date_format(date_create_from_format('Y-m-d H:i:s', $comments[$i]['created_at']), 'F j, Y');
		}

		$this->data['category'] = $category_details;
		$this->data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug], strtolower($c[1])), true)[0];
		$this->data['comments'] = $comments;
		$this->load->panel_view('applications/edit', $this->data);
	}

	public function single($slug)
	{
		$this->data['id'] = $slug;
		
		$this->load->model('data/StateModel');
		$this->load->model('data/CityModel');
		
		$this->data['locations']['states'] = json_decode($this->StateModel->get(), true);
		$this->data['locations']['cities'] = json_decode($this->CityModel->get(), true);

		$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug]), true)[0];

		$category_details = json_decode($this->CategoryModel->get(null, ['type' => $application['category_id']]), true)[0];
		$this->data['category'] = $category_details;

		$this->user_session = $_SESSION['awards_panel_user'];
		$stage = $this->input->get('stage');
		switch ($this->user_session['role']) {
			case 'participant':
				$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
				$this->data['nomination']['stage'] = $stage;
				if ($stage <= 6) {
					$this->data['application'] = $application;
					$this->session->set_tempdata('application_temp', $this->data['application'], 600);
				} else {
				}

				$this->load->panel_view('applications/single', $this->data);

				break;
			case 'jury':
			case 'admin':
			case 'super-admin':
				$this->load->model('panel/CommentModel');
				$comments = json_decode($this->CommentModel->get(null, ['nomination_id' => $slug]), true);

				for ($i = 0; $i < count($comments); $i++) {
					$comments[$i]['created_by'] = json_decode($this->UserModel->get(null, ['id' => $comments[$i]['created_by']]), true)[0];
					$comments[$i]['created_at'] = date_format(date_create_from_format('Y-m-d H:i:s', $comments[$i]['created_at']), 'F j, Y');
				}
				$this->data['comments'] = $comments;
				$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
				$this->data['nomination']['stage'] = $stage;
				$this->data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug, 'status !=' => 4]), true)[0];

				$this->load->moderator_view('applications/single', $this->data);
				break;
			default:
				break;
		}
	}

	public function nominate($code)
	{
		$category = json_decode($this->CategoryModel->get(null, ['valid_until >' => date("Y-m-d H:i:s"), 'code' => $code]), true)[0];
		$this->data['category'] = $category;
		
		$this->load->model('data/StateModel');
		$this->load->model('data/CityModel');
		$this->data['locations']['states'] = json_decode($this->StateModel->get(), true);
		$this->data['locations']['cities'] = json_decode($this->CityModel->get(), true);

		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
		$this->data['nomination']['stage'] = $this->input->get('stage');
		$this->load->panel_view('register', $this->data);
	}

	public function download($slug)
	{
		$id = $this->encryption->decrypt($this->input->get("key"));
		$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug]), true)[0];
		$category = $application['category_id'];

		# Get All Files
		$files = [
			$application['id_255401'],
			$application['id_255402'],
			$application['id_255403'],
			$application['id_255404'],
			$application['id_255405'],
			$application['id_255406'],
		];
		# Sanitize Files
		$temp = [];
		foreach ($files as $key => $file) {
			if (is_null($file)) {
				unset($files[$key]);
			} else {
				$temp[$key] = FCPATH . $files[$key];
			}
		}

		if (!file_exists(FCPATH . 'uploads/' . $application['nomination_id'])) {
			mkdir(FCPATH . 'uploads/' . $application['nomination_id'], 0777, true);
		}
		$categories = json_decode($this->CategoryModel->get(['id', 'code', 'type'], null), true);
		if (in_array($this->user_session['role'], ['jury', 'admin'])) {
			$this->load->library('pdflib/MakeDocket');
			foreach ($categories as $key => $value) {
				if ($application['category_id'] == $value['type']) {
					$category_details = json_decode($this->CategoryModel->get(null, ['type' => $application['category_id']]), true)[0];
					// echo "<pre>";
					// print_r($application);
					$this->makedocket->init('P', 'mm', 'A4')->load($application, 'docket_1_digital')->generate('F', FCPATH . 'uploads/' . $application['nomination_id'] . '/docket_page.pdf');
					break;
				} else {
					continue;
				}
			}

			$pdf = new PDFMerger;
			$filename = "LOTS12_" . $category_details['code']  . "_" . $application['nomination_id'] . ".pdf";
			$pdf->addPDF(FCPATH . 'uploads/' . $application['nomination_id'] . '/docket_page.pdf');
			foreach ($temp as $key => $file) {
				$pdf->addPDF($file);
			}
			$pdf->merge('browser', $filename);
		} else {
			redirect('dashboard');
		}
	}
}

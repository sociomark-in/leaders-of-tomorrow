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
			'individual' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'id_74529', 'id_74530', 'id_74531', 'organization_url', 'linkedin_url', 'created_by', 'stage_status', 'created_at', 'updated_at', 'status'], ['status <=' => 3], 'individual'), true),
			'msme' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'id_75534', 'id_75535', 'id_75536', 'organization_url', 'linkedin_url', 'created_by', 'stage_status', 'created_at', 'updated_at', 'status'], ['status <=' => 3], 'msme'), true)
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
						$s = '<span class="badge bg-warning">Complete & Under Review</span>';
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
		$categories = [
			'msme' => json_decode($this->CategoryModel->get_msme(null, ['valid_until >' => date("Y-m-d H:i:s")]), true),
			// 'individual' => json_decode($this->CategoryModel->get_individual(), true),
		];
		$this->data['categories'] = $categories;
		$applications = [
			'individual' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'stage_status', 'created_at', 'updated_at', 'status'], ['created_by' => $this->user_session['id']], 'individual'), true),
			'msme' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'stage_status', 'created_at', 'updated_at', 'status'], ['created_by' => $this->user_session['id']], 'msme'), true)
		];
		if (count($applications['individual']) > 0) {
			for ($i = 0; $i < count($applications['individual']); $i++) {
				$applications['individual'][$i]['category'] = json_decode($this->CategoryModel->get_individual(null, ['id' => $applications['individual'][$i]['category_id']]), true)[0];
				$applications['individual'][$i]['created_at'] = date_format(date_create_from_format("Y-m-d H:i:s", $applications['individual'][$i]['created_at']), 'F j, Y');
				$s = $applications['individual'][$i]['status'];
				if ($s > 0) {
					if ($applications['individual'][$i]['category']['id'] == $categories['individual'][$i]['id']) {
						unset($categories['individual'][$i]);
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
				$applications['individual'][$i]['status_text'] = $s;
			}
		}
		if (count($applications['msme']) > 0) {
			for ($i = 0; $i < count($applications['msme']); $i++) {
				$applications['msme'][$i]['category'] = json_decode($this->CategoryModel->get_msme(null, ['id' => $applications['msme'][$i]['category_id']]), true)[0];
				$applications['msme'][$i]['created_at'] = date_format(date_create_from_format("Y-m-d H:i:s", $applications['msme'][$i]['created_at']), 'F j, Y');
				$s = $applications['msme'][$i]['status'];
				if ($s > 0) {
					if ($applications['msme'][$i]['category']['id'] == $categories['msme'][$i]['id']) {
						unset($categories['msme'][$i]);
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
				$applications['msme'][$i]['status_text'] = $s;
			}
		}

		$this->data['my_applications'] = $applications;
		$this->data['rest_categories'] = $categories;
		$this->load->panel_view('applications/home', $this->data);
	}

	public function user_edit($slug)
	{
		$this->load->model('panel/CommentModel');
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

		$comments = json_decode($this->CommentModel->get(null, ['nomination_id' => $slug]), true);

		for ($i = 0; $i < count($comments); $i++) {
			$comments[$i]['created_by'] = json_decode($this->UserModel->get(null, ['id' => $comments[$i]['created_by']]), true)[0];
			$comments[$i]['created_at'] = date_format(date_create_from_format('Y-m-d H:i:s', $comments[$i]['created_at']), 'F j, Y');
		}

		$this->data['category'] = $category_details;
		$this->data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug], strtolower($c[1])), true)[0];
		$this->data['comments'] = $comments;
		$this->load->panel_view('applications/edit/'  . strtolower($category_details['type']), $this->data);
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
		$stage = $this->input->get('stage');
		switch ($this->user_session['role']) {
			case 'participant':
				$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
				$this->data['nomination']['stage'] = $stage;
				if ($stage <= 6) {
					$this->data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug], strtolower($c[1])), true)[0];
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
				$this->data['application'] = array_merge(
					json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug, 'status !=' => 4], 'msme'), true),
					json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug, 'status !=' => 4], 'individual'), true),
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
		$this->load->panel_view('register', $this->data);
		// if ($this->data['user']['is_email_verified'] && $this->data['user']['is_contact_verified'] && $this->data['user']['is_password_reset']) {
		// 	// First View
		// } else {
		// 	$session = [
		// 		'is_verified' => [
		// 			'status' => false,
		// 		]
		// 	];
		// 	$this->session->set_tempdata('temp_session', $session);
		// 	redirect(base_url('dashboard/my-profile'));
		// }
	}

	public function download($slug)
	{
		$id = $this->encryption->decrypt($this->input->get("key"));
		$application = array_merge(
			json_decode($this->EntriesModel->get(null, ['nomination_id' => $id], 'individual'), true),
			json_decode($this->EntriesModel->get(null, ['nomination_id' => $id], 'msme'), true)
		)[0];
		
		$category = strtolower(explode('_', $application['category_id'])[1]);
		if ($category == 'msme') {
			$files = [
				$application['id_75530'],
				$application['id_75531'],
				$application['id_75532'],
				$application['id_75533'],
			];
		} elseif ($category == 'individual') {
			$files = [
				$application['id_74525'],
				$application['id_74526'],
				$application['id_74527'],
				$application['id_74528'],
			];
		}
		$temp = [];
		for ($i = 0; $i < count($files); $i++) {
			$temp[$i] = FCPATH . $files[$i];
		}

		if (!file_exists(FCPATH . 'uploads/' . $application['nomination_id'])) {
			mkdir(FCPATH . 'uploads/' . $application['nomination_id'], 0777, true);
		}

		if (in_array($this->user_session['role'], ['jury', 'admin'])) {
			$this->load->library('pdflib/MakeDocket');
			switch ($category) {
				case 'msme':
					$category_details = json_decode($this->CategoryModel->get_msme(null, ['id' => strtolower(explode('_', $application['category_id'])[0])]), true)[0];
					# code...
					$this->makedocket->init('P', 'mm', 'A4')->load($application, 'stage_1_msme_layout_2')->generate('F', FCPATH . 'uploads/' . $application['nomination_id'] . '/docket_page.pdf');
					break;
				
				default:
					# code...
					break;
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

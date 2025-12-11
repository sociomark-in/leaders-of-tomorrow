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
		$this->load->model('panel/AgentModel');
		$this->user_session = $_SESSION['awards_panel_user'];
	}
	public function index()
	{
		$applications = [
			'msme' => json_decode($this->EntriesModel->get(null, ['status <=' => 3], 'msme'), true)
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
						$s = '<span class="badge bg-success">Approved</span>';
						break;
					case '2':
						$s = '<span class="badge bg-dark">Need Improvements</span>';
						break;
					case '3':
						$s = '<span class="badge bg-warning">Under Review</span>';
						break;
					default:
						$s = '<span class="badge bg-secondary">Draft</span>';
						# code...
						break;
				}
				$applications['msme'][$i]['status_text'] = $s;
				if ($applications['msme'][$i]['status_2']) {
					# code...
					$s = $applications['msme'][$i]['status_2'];
					switch ($s) {
						case '0':
							$s = '<span class="badge bg-danger">Rejected</span>';
							break;
						case '1':
							$s = '<span class="badge bg-success">Approved</span>';
							break;
						case '2':
							$s = '<span class="badge bg-dark">Need Improvements</span>';
							break;
						case '3':
							$s = '<span class="badge bg-warning">Under Review</span>';
							break;
						case '4':
							$s = '<span class="badge bg-secondary">Draft</span>';
							# code...
							break;
						default:
							$s = NULL;
							# code...
							break;
					}
				}

				$agent = json_decode($this->AgentModel->get(['name'], ['agent_id' => $applications['msme'][$i]['agent_name']]), true) ?? [];
				$applications['msme'][$i]['status_2_text'] = $s;
				$applications['msme'][$i]['agent_name'] = $agent['name'] ?? NULL;
			}
		}
		switch ($this->user_session['role']) {
			case 'participant':

				break;
			case 'jury':
			case 'admin':
			case 'super-admin':
				$this->data['all_applications'] = $applications;

				$this->load->moderator_view('applications/home', $this->data);
				break;

			default:
				break;
		}
	}

	public function user_side()
	{
		$this->data['my_applications'] = [];

		$categories['msme'] = json_decode($this->CategoryModel->get(null, ['valid_until >' => date("Y-m-d H:i:s")]), true);
		$this->data['categories'] = $categories;
		$applications = [
			'msme' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'stage_status', 'created_at', 'updated_at', 'status', 'status_2'], ['created_by' => $this->user_session['id']]), true),
			'stage_2_applications' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'stage_status', 'created_at', 'updated_at', 'status', 'status_2'], ['created_by' => $this->user_session['id'], 'status' => 1]), true)
		];
		if (count($applications['msme']) > 0) {

			for ($i = 0; $i < count($applications['msme']); $i++) {
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
						$s = '<span class="badge bg-success">Approved</span>';
						break;
					case '2':
						$s = '<span class="badge bg-dark">Need Improvements</span>';
						break;
					case '3':
						$s = '<span class="badge bg-warning">Under Review</span>';
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
		$this->data['locations']['cities'] = json_decode($this->CityModel->get(), true);

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
		$this->load->model('panel/LeadsModel');

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
				$this->data['application'] = $application;
				if ($stage < 6) {
					$this->session->set_tempdata('application_temp', $this->data['application'], 600);
				} elseif ($stage == 6) {
					$this->session->set_tempdata('application_temp', $this->data['application'], 600);
					$lead = json_decode($this->LeadsModel->get(null, ['email' => $this->user_session['useremail']]), true)[0];
					$this->data['lead'] = $lead;
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

			$category_details = json_decode($this->CategoryModel->get(null, ['type' => $application['category_id']]), true)[0];
			$application['category'] = $category_details;
			$docketname =  'uploads/' . $application['nomination_id'] . '/docket_page.pdf';
			if (file_exists($docketname)) {
				unlink(FCPATH . $docketname);
			}

			switch ($application['category_id']) {
				case '1_INDIVIDUAL':
					$this->makedocket->init('P', 'mm', 'A4')->load($application, 'docket_1_individual')->generate('F', FCPATH . $docketname);
					break;
				case '2_INDIVIDUAL':
					$this->makedocket->init('P', 'mm', 'A4')->load($application, 'docket_2_individual')->generate('F', FCPATH . $docketname);
					break;
				case '1_GLOBAL':
					$this->makedocket->init('P', 'mm', 'A4')->load($application, 'docket_1_global')->generate('F', FCPATH . $docketname);
					break;
				case '1_FAMILY':
					$this->makedocket->init('P', 'mm', 'A4')->load($application, 'docket_1_family')->generate('F', FCPATH . $docketname);
					break;
				case '1_DIGITAL':
					$this->makedocket->init('P', 'mm', 'A4')->load($application, 'docket_1_digital')->generate('F', FCPATH . $docketname);
					break;
				default:
					switch (explode('_', $application['category_id'])[1]) {
						case 'IDFC':
							$this->makedocket->init('P', 'mm', 'A4')->load($application, 'docket_idfc')->generate('F', FCPATH . $docketname);
							break;

						default:
							$this->makedocket->init('P', 'mm', 'A4')->load($application, 'docket_msme')->generate('F', FCPATH . $docketname);
							break;
					}
					break;
			}

			$filename = "LOTS12_" . $category_details['code']  . "_" . $application['nomination_id'] . ".pdf";

			$attachments = [];
			array_push($attachments, FCPATH . 'uploads/' . $application['nomination_id'] . '/docket_page.pdf');
			foreach ($temp as $key => $file) {
				array_push($attachments, $file);
			}

			// 			if (!file_exists('uploads/' . $application['nomination_id'] . "/" . $filename)) {
			//     			$this->load->library('pdflib/MergePDF');
			//     			$this->mergepdf->config()->merge(
			//     				$attachments,
			//     				FCPATH . 'uploads/' . $application['nomination_id'],
			//     				$filename
			//     			);
			// 			}

			if (file_exists('uploads/' . $application['nomination_id'] . "/" . $filename)) {
				unlink(FCPATH . 'uploads/' . $application['nomination_id'] . "/" . $filename);
			}

			$this->load->library('pdflib/MergePDF');
			$this->mergepdf->config()->merge(
				$attachments,
				FCPATH . 'uploads/' . $application['nomination_id'],
				$filename
			);

			redirect(base_url('uploads/' . $application['nomination_id'] . "/" . $filename));

			// $zip = new ZipArchive;
			// if (file_exists('uploads/' . $application['nomination_id'] . '/' . "LOTS12_" . $category_details['code']  . "_" . $application['nomination_id'] . '_docket.zip')) {
			// 	unlink(FCPATH . 'uploads/' . $application['nomination_id'] . '/' . $application['nomination_id'] . '_docket.zip');
			// } elseif ($zip->open('uploads/' . $application['nomination_id'] . '/' . $application['nomination_id'] . '_docket.zip', ZipArchive::CREATE) === TRUE) {

			// 	$zip->addFile('uploads/' . $application['nomination_id'] . '/docket_page.pdf', 'docket_page.pdf');
			// 	foreach ($temp as $key => $file) {
			// 		$zip->addFile($file, explode('uploads/' . $application['nomination_id'], $file)[1]);
			// 	}
			// 	$zip->close();
			// }
		} else {
			redirect('');
		}
	}
}

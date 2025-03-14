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
		$this->load->model('panel/PresentationsModel');
		$this->load->model('panel/AgentModel');
		$this->user_session = $_SESSION['awards_panel_user'];
	}

	public function index()
	{
		switch ($this->user_session['role']) {
			case 'participant':
				$presentations = json_decode($this->PresentationsModel->get(null, ['created_by' => $this->user_session['id']]), true);
				for ($i = 0; $i < count($presentations); $i++) {
					# code...
					$presentation = $presentations[$i];
					$presentation['category'] = json_decode($this->CategoryModel->get(null, ['type' => $presentation['category_id']]), true)[0];
					$presentation['created_at'] = date_format(date_create_from_format("Y-m-d H:i:s", $presentation['created_at']), 'F j, Y');
					$s = $presentation['status'];

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
					$presentation['status_text'] = $s;
					$presentations[$i] = $presentation;
				}
				$this->data['my_presentations'] = $presentations;
				$this->load->panel_view('presentations/home', $this->data);
				# code...
				break;
			case 'jury':
			case 'admin':
			case 'super-admin':
				$presentations = json_decode($this->PresentationsModel->get(), true);
				if (count($presentations) > 0) {
					for ($i = 0; $i < count($presentations); $i++) {
						$presentations[$i]['category'] = json_decode($this->CategoryModel->get(null, ['type' => $presentations[$i]['category_id']]), true)[0];
						$s = $presentations[$i]['status'];
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
						$presentations[$i]['status_text'] = $s;
						$presentations[$i]['agent_name'] = json_decode($this->AgentModel->get(['name'], ['agent_id' => $presentations[$i]['agent_name']]), true)[0]['name'];
					}
				}
				$this->data['all_applications'] = $presentations;

				$this->load->moderator_view('presentations/home', $this->data);
				break;

			default:
				break;
		}
	}

	/**
	 * new_presentation
	 *
	 * ### Single Presentation View
	 * 
	 * 
	 * @return void
	 */
	public function new_presentation($slug)
	{
		$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug]), true)[0];
		$category_details = json_decode($this->CategoryModel->get(null, ['type' => $application['category_id']]), true)[0];
		$presentation_id = date('U') . "-" . random_string('numeric', 5);
		$this->data['application'] = $application;
		$this->data['presentation_id'] = $presentation_id;
		$this->data['category'] = $category_details;
		$this->load->panel_view('presentations/single', $this->data);
	}

	public function single($slug)
	{
		$presentation = json_decode($this->PresentationsModel->get(null, ['presentation_id' => $slug]), true)[0];
		switch ($this->user_session['role']) {
			case 'participant':
				break;
			case 'jury':
			case 'admin':
			case 'super-admin':
				$presentation['category'] = json_decode($this->CategoryModel->get(['name'], ["type" => $presentation['category_id']]), true)[0];
				break;

			default:
				# code...
				break;
		}
		$this->data['application'] = $presentation;
		$this->load->moderator_view('presentations/single', $this->data);
	}


	public function download($slug)
	{
		$this->load->library('pdflib/MakePresentation');

		
		$presentation = json_decode($this->PresentationsModel->get(null, ['presentation_id' => $slug]), true)[0];
		$presentation['category'] = json_decode($this->CategoryModel->get(['name'], ['type' => $presentation['category_id']]), true)[0];

		$filename = "LOTS12_" . $presentation['category']['code']  . "_" . $presentation['presentation_id'] . ".pdf";
		
		// echo "<pre>"; print_r($presentation);die;
		switch ($presentation['category_id']) {
			case '1_INDIVIDUAL':
				$this->makepresentation->init('L', 'mm', ['350', '200'])->load($presentation, 'stage_2_social_entrepreneur')->generate('I', $filename);
				break;
			case '2_INDIVIDUAL':
				$this->makepresentation->init('L', 'mm', ['350', '200'])->load($presentation, 'stage_2_young_entrepreneur')->generate('I', $filename);
				break;
			case '1_GLOBAL':
				$this->makepresentation->init('L', 'mm', ['350', '200'])->load($presentation, 'stage_2_global')->generate('I', $filename);
				break;
			case '1_DIGITAL':
				$this->makepresentation->init('L', 'mm', ['350', '200'])->load($presentation, 'stage_2_digital')->generate('I', $filename);
				break;
			case '1_FAMILY':
				$this->makepresentation->init('L', 'mm', ['350', '200'])->load($presentation, 'stage_2_family')->generate('I', $filename);
				break;
			default:
				$this->makepresentation->init('L', 'mm', ['350', '200'])->load($presentation, 'stage_2_msme')->generate('I', $filename);
				break;
		}
	}

	public function edit($slug) {
		$presentation = json_decode($this->PresentationsModel->get(null, ['presentation_id' => $slug]), true)[0];
		$presentation['category'] = json_decode($this->CategoryModel->get(null, ['type' => $presentation['category_id']]), true)[0];
		$this->data['presentation'] = $presentation;
		$this->load->panel_view('presentations/edit', $this->data);
	}
}

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
		$applications = [
			'msme' => json_decode($this->EntriesModel->get(["nomination_id", "category_id", "name", "email", "designation", "organization_name", "organization_state", "organization_city", "organization_url", "agent_referral", "agent_name", "created_by", "stage_status", "created_at", "updated_at", "status"], ['status <=' => 3], 'msme'), true)
		];
		switch ($this->user_session['role']) {
			case 'participant':
				
				$this->load->panel_view('presentations/home', $this->data);
				# code...
				break;
				case 'jury':
					case 'admin':
						case 'super-admin':
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
									$applications['msme'][$i]['agent_name'] = json_decode($this->AgentModel->get(['name'], ['agent_id' => $applications['msme'][$i]['agent_name']]), true)[0]['name'];
								}
							}
							$this->data['all_applications'] = $applications;

							$this->load->moderator_view('presentation/home', $this->data);
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

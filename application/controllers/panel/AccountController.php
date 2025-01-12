<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class AccountController extends PanelController
{
	private $user_session;
	public function __construct()
	{
		parent::__construct();
		$this->user_session = $_SESSION['awards_panel_user'];
	}
	public function index()
	{
		$this->load->model('panel/EntriesModel');
		$this->load->model('event/awards/CategoryModel');
		
		$categories['msme'] = json_decode($this->CategoryModel->get(), true);
		$this->data['categories'] = $categories;

		$applications_count = [
			'uncategorized' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['status' => '2']), true)),
			'approved' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['status' => '1']), true)),
			'rejected' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['status' => '0']), true)),
			'under_review' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['status' => '3']), true)),
		];
		$applications_count['all'] = $applications_count['uncategorized'] + $applications_count['approved'] + $applications_count['rejected'] + $applications_count['under_review'];
		$this->data['applications_count'] = $applications_count;
		switch ($this->user_session['role']) {
			case 'super-admin':
				$this->load->superadmin_view('home', $this->data);
				break;
			case 'admin':
				$this->load->admin_view('home', $this->data);
				break;
			case 'super-admin':
				$this->load->admin_view('home', $this->data);
				break;
			case 'jury':
				$this->load->moderator_view('home', $this->data);
				break;
			default:
				$applications['msme'] = json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'stage_status', 'created_at', 'updated_at', 'status'], ['created_by' => $this->user_session['id']]), true);

				if (count($applications['msme']) > 0) {
					for ($i = 0; $i < count($applications['msme']); $i++) {
						$applications['msme'][$i]['category'] = json_decode($this->CategoryModel->get(null, ['type' => $applications['msme'][$i]['category_id']]), true)[0];
						$applications['msme'][$i]['created_at'] = date_format(date_create_from_format("Y-m-d H:i:s", $applications['msme'][$i]['created_at']), 'Y-m-d');
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
				
				$this->data['my_applications'] = $applications;
				$this->data['rest_categories'] = $categories;

				$this->load->panel_view('home', $this->data);
				break;
		}
	}

	public function profile()
	{
		redirect('dashboard');
		exit;
		$this->load->panel_view('account/profile', $this->data);
	}


	public function profile_verify()
	{
		$this->load->panel_view('account/verify', $this->data);
	}


	public function profile_setting_single($type)
	{
		switch ($type) {
			case 'reset-password':
				$this->load->panel_view('account/reset_pw', $this->data);
				break;

			default:
				show_404();
				break;
		}
	}

	public function all_agents()
	{
		$this->load->model('panel/AgentModel');
		$this->data['agents'] = json_decode($this->AgentModel->get(), true);
		switch ($this->user_session['role']) {
			case 'super-admin':
				$this->load->admin_view('agents/home', $this->data);
				break;
			case 'admin':
				$this->load->admin_view('agents/home', $this->data);
				break;
			default:
				// show_404();
				break;
		}
	}

	public function agent_single($agent_id)
	{
		$this->load->model('panel/AgentModel');
		switch ($agent_id) {
			case 'value':
				# code...
				break;

			default:
				$this->data['agency'] = json_decode($this->AgentModel->get(null, ['agent_id' => $agent_id]), true)[0];
				break;
		}
		// print_r($this->data);die;
		$this->load->admin_view('agents/single', $this->data);
	}

	public function nominate()
	{
		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
		$this->load->page('register', $this->data);
	}
}

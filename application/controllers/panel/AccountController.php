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
			case 'agency':
				$agent_id = null;
				switch ($this->user_session['useremail']) {
					case 'savitri@leadersoftomorrow.co.in':
						$agent_id = '5167681127';
						# code...
						break;
					case 'nilam@leadersoftomorrow.co.in':
						$agent_id = '1595014714';
						# code...
						break;
					case 'idfcuser01@leadersoftomorrow.co.in':
						$agent_id = '9475208163';
						# code...
						break;

					default:
						# code...
						break;
				}
				$this->load->model('panel/AgentModel');
				$this->load->model('panel/LeadsModel');
				$this->load->model('event/awards/CategoryModel');
				$this->load->model('panel/EntriesModel');
				$agent = json_decode($this->AgentModel->get(null, ['agent_id' => $agent_id]), true)[0];
				$agent_entries['users'] = json_decode($this->LeadsModel->get(null, ['created_by' => $agent_id]), true);
				$agent_entries['entries'] =
					[
						'all' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id]), true),
						'uncategorized' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id, 'status' => '2']), true),
						'approved' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id, 'status' => '1']), true),
						'rejected' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id, 'status' => '0']), true),
						'under_review' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id, 'status' => '3']), true),
					];

				foreach ($agent_entries['entries']['all'] as $key => $application) {
					$agent_entries['entries']['all'][$key]['category'] = json_decode($this->CategoryModel->get(['name'], ['type' => $application['category_id']]), true)[0];

					$status = "Draft";
					switch ($application['status']) {
						case '0':
							$status = 'Rejected';
							break;
						case '1':
							$status = 'Approved';
							break;
						case '2':
							$status = 'Need Improvements';
							break;
						case '3':
							$status = 'Under Review';
							break;
						default:
							$status = 'Draft';
							# code...
							break;
					}
					$agent_entries['entries']['all'][$key]['status']  = $status;
				}

				$agency['details'] = $agent;
				$agency['data'] = $agent_entries;

				switch ($agent_id) {
					case 'value':
						# code...
						break;

					default:
						$this->data['agency'] = $agency;
						break;
				}
				$this->load->agency_view('home', $this->data);
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
		$this->load->model('panel/LeadsModel');
		$this->load->model('panel/EntriesModel');
		$agents = json_decode($this->AgentModel->get(), true);
		$agent_entries = [];
		foreach ($agents as $key => $agent) {
			$agent_entries[$key]['agency'] = $agent;
			$agent_entries[$key]['entries'] =
				[
					'all' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'yes', 'agent_name' => $agent['agent_id']]), true)),
					'uncategorized' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'yes', 'agent_name' => $agent['agent_id'], 'status' => '2']), true)),
					'approved' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'yes', 'agent_name' => $agent['agent_id'], 'status' => '1']), true)),
					'rejected' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'yes', 'agent_name' => $agent['agent_id'], 'status' => '0']), true)),
					'under_review' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'yes', 'agent_name' => $agent['agent_id'], 'status' => '3']), true)),
				];
		}
		$agent_entries['direct']['entries'] = [
			'all' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'no']), true)),
			'uncategorized' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'no', 'status' => '2']), true)),
			'approved' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'no', 'status' => '1']), true)),
			'rejected' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'no', 'status' => '0']), true)),
			'under_review' => count(json_decode($this->EntriesModel->get(['nomination_id'], ['agent_referral' => 'no', 'status' => '3']), true)),
		];
		$this->data['agents'] = $agents;
		$this->data['applications'] = $agent_entries;
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
		$this->load->model('panel/LeadsModel');
		$this->load->model('event/awards/CategoryModel');
		$this->load->model('panel/EntriesModel');

		$agent = json_decode($this->AgentModel->get(null, ['agent_id' => $agent_id]), true)[0];
		$agent_entries['users'] = json_decode($this->LeadsModel->get(null, ['created_by' => $agent_id]), true);
		$agent_entries['entries'] =
			[
				'all' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id]), true),
				'uncategorized' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id, 'status' => '2']), true),
				'approved' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id, 'status' => '1']), true),
				'rejected' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id, 'status' => '0']), true),
				'under_review' => json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'email', 'designation', 'organization_name', 'organization_state', 'organization_city', 'organization_url', 'status', 'created_at'], ['agent_referral' => 'yes', 'agent_name' => $agent_id, 'status' => '3']), true),
			];

		foreach ($agent_entries['entries']['all'] as $key => $application) {
			$agent_entries['entries']['all'][$key]['category'] = json_decode($this->CategoryModel->get(['name'], ['type' => $application['category_id']]), true)[0];

			$status = "Draft";
			switch ($application['status']) {
				case '0':
					$status = 'Rejected';
					break;
				case '1':
					$status = 'Approved';
					break;
				case '2':
					$status = 'Need Improvements';
					break;
				case '3':
					$status = 'Under Review';
					break;
				default:
					$status = 'Draft';
					# code...
					break;
			}
			$agent_entries['entries']['all'][$key]['status']  = $status;
		}

		$agency['details'] = $agent;
		$agency['data'] = $agent_entries;

		$this->data['agency'] = $agency;

		$this->load->admin_view('agents/single', $this->data);
	}

	public function nominate()
	{
		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
		$this->load->page('register', $this->data);
	}
}

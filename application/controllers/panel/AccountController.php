<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
class AccountController extends PanelController
{
	private $user_session;
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->model('panel/EntriesModel');
		$this->load->model('event/awards/CategoryModel');

		$this->user_session = $_SESSION['awards_panel_user'];
		switch ($this->user_session['role']) {
			case 'admin':
				$this->load->admin_view('home');
				break;
			case 'jury':
				$this->load->moderator_view('home');
				break;
			default:
				$categories = [
					'msme' => json_decode($this->CategoryModel->get_msme(), true),
					'individual' => json_decode($this->CategoryModel->get_individual(), true),
				];
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
						for ($c = 0; $c < count($categories['individual']); $c++) {
							if ($applications['individual'][$i]['category']['id'] == $categories['individual'][$c]['id']) {
								unset($categories['individual'][$c]);
							}
						}
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
						for ($c = 0; $c < count($categories['msme']); $c++) {
							if ($applications['msme'][$i]['category']['id'] == $categories['msme'][$c]['id']) {
								unset($categories['msme'][$c]);
							}
						}
					}
				}
				$this->data['my_applications'] = $applications;
				$this->data['rest_categories'] = $categories;

				// echo "<pre>";
				// print_r($this->data['my_applications']);
				// die;

				$this->load->panel_view('home', $this->data);
				break;
		}
	}

	public function profile_setting_single($type)
	{
		switch ($type) {
			case 'reset-password':
				$this->load->panel_view('account/reset_pw');
				break;

			default:
				show_404();
				break;
		}
	}

	public function nominate()
	{
		$this->data['page']['title'] = "Awards Registration" . " • " .  APP_NAME . " " . date('Y');
		$this->load->page('register', $this->data);
	}
}

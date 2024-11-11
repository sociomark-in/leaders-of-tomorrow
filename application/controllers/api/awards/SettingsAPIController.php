<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SettingsAPIController extends CI_Controller
{
	private $request, $response, $data, $usersession;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');

		$this->data = [];
		$this->usersession = $_SESSION['awards_panel_user'];
		$this->load->model('panel/EntriesModel');
	}

	public function password_reset(){
		$this->request = $this->input->post();

		$user = json_decode($this->UserModel->get(null, ['password' => hash('md5', hash('sha256', $this->request['password_curr']))]), true)[0];
		if (count($user)) {
			$password = hash('md5', hash('sha256', $this->request['password']));
			if($this->UserModel->update(['password' => $password, 'is_password_reset' => 1], ['id' => $user['id']])){
				$session = [
					'status' => true,
				];
			}
			else {
				$session = [
					'status' => false,
				];
			}
		} else {
			$session = [
				'status' => false,
			];
		}
		$this->session->set_flashdata('password_reset_session', $session);
		redirect('dashboard/my-profile');

	}
}

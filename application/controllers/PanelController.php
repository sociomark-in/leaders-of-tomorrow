<?php

class PanelController extends CI_Controller
{
	public $data;
	public function __construct()
	{
		parent::__construct();
		$session = [
			'role' => 'participant'
		];
		$this->data['user_session'] = $session;
		$this->session->set_userdata('awards_panel_user', $session);
		if (!isset($_SESSION['awards_panel_user'])) {
			redirect('login');
		}
	}
}

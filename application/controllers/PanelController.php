<?php

class PanelController extends CI_Controller
{
	public $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');
		$this->encryption->initialize(
			array(
				'cipher' => 'aes-256',
				'mode' => 'ctr',
			)
		);
		if (!isset($_SESSION['awards_panel_user'])) {
			redirect('login');
		} else {
			$this->data['user'] = $_SESSION['awards_panel_user'];
		}
	}
}

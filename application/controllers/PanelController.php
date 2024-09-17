<?php

class PanelController extends CI_Controller
{
	public $data;
	public function __construct()
	{
		parent::__construct();
		if (!isset($_SESSION['awards_panel_user'])) {
			redirect('login');
		} else {
			$this->data['user'] = $_SESSION['nomination_user'];
		}
	}
}

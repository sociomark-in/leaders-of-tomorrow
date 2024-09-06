<?php

class PanelController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$session = [
			'role' => 'admin'
		];
		$this->session->set_userdata('user', $session);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SSOController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function participant_login() {
		redirect('account/' . random_string('alnum', 16));
	}
}

?>

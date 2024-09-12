<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SSOController extends CI_Controller
{
	private $request, $response, $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/User');
	}

	public function participant_login() {
		redirect('profile/' . random_string('alnum', 16));
	}

	public function is_unique($field){
		$value = $this->input->get('value');
		if(count($this->User->get([$field => $value])) > 0){
			return true;
		} else {
			return false;
		}
	}

	public function participant_register() {
		$this->request = $this->input->post();
		$data = $this->request;
		if($this->User->insert($this->request)){
			$this->session->set_userdata('nomination_user', $data);
			echo "<pre>";
			print_r($data);
		}
	}
}

?>

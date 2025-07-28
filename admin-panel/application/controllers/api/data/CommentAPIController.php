<?php

class CommentAPIController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/CommentModel');
		$this->output
			->set_header('Cache-Control: no-store, no-cache')
			->set_content_type('application/json');
	}
	public function get_comment_for_application(){
		$data = $this->input->post();
		$result = json_decode($this->CommentModel->get(null, ['nomination_id' => $data['application_id']]), true);
		$this->output->set_output(json_encode($result));
	}
}

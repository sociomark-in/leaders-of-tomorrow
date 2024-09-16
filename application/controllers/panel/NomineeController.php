<?php

class NomineeController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function add()
	{
		$config['upload_path'] = FCPATH . '/uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '100';

		foreach ($_FILES as $key => $file) {
			$new_name = time() ."_" . random_string(). "_" . $file['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload($key)) {
				$this->upload->display_errors();
			}
		}
	}
}

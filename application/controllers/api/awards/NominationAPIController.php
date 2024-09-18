<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NominationAPIController extends CI_Controller
{
	private $request, $response, $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');
	}

	public function new_single()
	{
		$this->request = $this->input->post();
		$stage = $this->input->post('stage');
		$category_id = $this->input->post('category_id');
		if ($stage === "") {
			// Insert
			$this->request['application_id'] = '';
			/* 
			$this->data = [
				'applicant_name' => $this->request['applicant']['name'],
				'applicant_designation' => $this->request['applicant']['designation'],
				'applicant_dob' => $this->request['applicant']['dob'],
				'applicant_experience' => $this->request['applicant']['experience'],
				
				'organization_name' => $this->request['organization']['name'],
				'organization_type' => $this->request['organization']['type'],
				'organization_experience' => $this->request['organization']['experience'],
				'organization_segment' => $this->request['organization']['segment'],
				'organization_inc_date' => $this->request['organization']['inc_date'],
				'organization_size' => $this->request['organization']['size'],
				'organization_website' => $this->request['organization']['website'],
				'organization_linkedin' => $this->request['organization']['linkedin'],
				
				'contact_person_name' => $this->request['contact_person']['name'],
				'contact_person_email' => $this->request['contact_person']['email'],
				'contact_person_contact' => $this->request['contact_person']['contact'],
			]; 
			*/
			redirect('dashboard/category/' . $category_id . '/nominate?stage=1');
		} elseif ($stage === '4') {
			echo "<pre>";
			$config['upload_path'] = FCPATH . '/uploads/';
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '250';

			if (!file_exists($config['upload_path'])) {
				mkdir($config['upload_path'], 0777);
			}

			foreach ($_FILES as $key => $file) {
				$new_name = time() . "_" . random_string() . "_" . $file['name'];
				$config['file_name'] = $new_name;

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload($key)) {
					// An error occurred
					echo "Error: " . $this->upload->display_errors();
				} else {
					// File uploaded successfully
					echo "Success: File uploaded as " . $new_name;
				}
			}
			die;
			// Upload
			redirect('dashboard/category/' . $category_id . '/nominate/complete');
		} else {
			// Update
			redirect('dashboard/category/' . $category_id . '/nominate?stage=' . ++$stage);
		}
	}
}

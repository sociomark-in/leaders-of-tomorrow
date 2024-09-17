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
			echo "<pre>";
			print_r($this->request);

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

			die;
			redirect('dashboard/category/' . $category_id . '/nominate?stage=1');
		} elseif ($stage === '4') {
			// Upload
			redirect('dashboard/category/' . $category_id . '/nominate/complete');
		} else {
			// Update
			redirect('dashboard/category/' . $category_id . '/nominate?stage=' . ++$stage);
		}
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Clegginabox\PDFMerger\PDFMerger;

require_once APPPATH . "vendor/autoload.php";

class NominationAPIController extends CI_Controller
{
	private $request, $response, $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');
		$this->load->model('panel/EntriesModel');
	}

	public function new_single()
	{
		$this->request = $this->input->post();
		$this->load->model('event/awards/CategoryModel');
		$category = array_merge(
			json_decode($this->CategoryModel->get_individual(null, ['code' => $this->input->post('category_id')]), true),
			json_decode($this->CategoryModel->get_msme(null, ['code' => $this->input->post('category_id')]), true)
		)[0];
		$stage = $this->input->post('stage') ?? "0";
		$category_id = $this->input->post('category_id');
		if ($stage == "") {
			$this->request['stage'] = (int)$stage + 1;
			$this->data = [
				"category_id" => $category['id'],
				"nomination_id" => $this->request['application_id'],
				"name" => $this->request['applicant']['name'],
				"designation" => $this->request['applicant']['designation'],
				"dob" => $this->request['applicant']['dob'],
				"total_experience" => $this->request['applicant']['experience'],
				"email" => $_SESSION['awards_panel_user']['useremail'],
				"organization_name" => $this->request['organization']['name'],
				"organization_maxsize" => $this->request['organization']['size'],
				"organization_industry" => $this->request['organization']['type'],
				"organization_segment" => $this->request['organization']['segment'],
				"organization_experience" => $this->request['organization']['experience'],
				"organization_inc_date" => $this->request['organization']['inc_date'],
				"organization_url" => $this->request['organization']['website'],
				"linkedin_url" => $this->request['organization']['linkedin'],
				"cp_name" => $this->request['contact_person']['name'],
				"cp_email" => $this->request['contact_person']['email'],
				"cp_contact" => $this->request['contact_person']['contact'],
				"stage_status" => $this->request['stage'],
				"created_by" =>  $_SESSION['awards_panel_user']['id'],
			];
			echo "<pre>";
			if ($this->EntriesModel->insert($this->data)) {
				redirect('dashboard/category/' . $category_id . '/nominate?stage=' . ++$stage);
			};
		} elseif ($stage === '4') {
			echo "<pre>";
			$config['upload_path'] = FCPATH . '/uploads/applications/' . $this->request['application_id'];
			$config['allowed_types'] = 'pdf';
			$config['max_size'] = '250';

			if (!file_exists($config['upload_path'])) {
				mkdir($config['upload_path'], 0777);
			}

			$pdf = new PDFMerger;
			foreach ($_FILES as $key => $file) {
				$new_name = time() . "_" . random_string() . "_" . $file['name'];
				$config['file_name'] = $new_name;

				// print_r($file['tmp_name']);
				$tmp = $file['tmp_name'];
				// shell_exec("gswin32 -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile=" . $tmp . " " . $tmp . "");
				$pdf->addPDF($tmp);
				// $this->load->library('upload', $config);

				// if (!$this->upload->do_upload($key)) {
				// 	// An error occurred
				// 	echo "Error: " . $this->upload->display_errors();
				// } else {
				// 	// File uploaded successfully
				// 	echo "Success: File uploaded as " . $new_name;
				// }
			}
			$pdf->merge('file',  FCPATH . 'uploads/TEST2.pdf', 'P');
			die;
			// Upload
			redirect('dashboard/category/' . $category_id . '/nominate/complete');
		} else {
			// Update
			redirect('dashboard/category/' . $category_id . '/nominate?stage=' . ++$stage);
		}
	}
}

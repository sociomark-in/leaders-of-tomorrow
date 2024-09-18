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
	}

	public function new_single()
	{
		$this->request = $this->input->post();
		$stage = $this->input->post('stage');
		$category_id = $this->input->post('category_id');
		if ($stage === "") {
			// Insert
			$this->request['application_id'] = '';
			
			redirect('dashboard/category/' . $category_id . '/nominate?stage=1');
		} elseif ($stage === '4') {
			echo "<pre>";
			$config['upload_path'] = FCPATH . '/uploads/';
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

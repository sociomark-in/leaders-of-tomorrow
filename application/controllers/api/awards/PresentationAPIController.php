<?php

class PresentationAPIController extends CI_Controller
{
	private $request, $response, $data, $usersession;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/UserModel');
		// 		$this->load->model('panel/EmailModel');

		$this->data = [];
		$this->usersession = $_SESSION['awards_panel_user'];
		$this->load->model('panel/EntriesModel');
		$this->load->model('event/awards/CategoryModel');
		$this->load->library('email/BrevoCURLMail');
	}

	/**
	 * _document_uploads
	 * 
	 * ### Description: 
	 * **Scope**: Applicant
	 * 
	 * A Helper Function To Upload the $_FILES as per $presentation_id and $category_id
	 *
	 * @param  mixed $_files $_FILES Object
	 * @param  mixed $category_id
	 * @param  mixed $presentation_id
	 * @return void
	 */
	public function _document_uploads($_files, $presentation_id)
	{
		$response = [];

		$folder_path = FCPATH . 'attachments/' .  $presentation_id;
		
		/* Document Upload Folder Exists Script */
		if (!file_exists($folder_path)) {
			mkdir($folder_path, 0777);
		} else {
			delete_files($folder_path);
		}

		/* Set Uploads Config */
		$config['upload_path'] = $folder_path;
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '5000';


		// $pdf = new PDFMerger;
		$i = 0;
		$this->load->library('upload', $config);
		foreach ($_files as $key => $file) {
			$r = random_string('numeric', 5);
			$new_name = time() . "_" . $r . "_" . $file['name'];
			$config['file_name'] = $new_name;

			/* File Upload Script */
			$this->upload->initialize($config);
			if (!$this->upload->do_upload($key)) {
				// An error occurred
				echo "Error: " . $this->upload->display_errors();
			} else {
				/* No Error - File Upload Script */
				/* Data Upload */
				$response[$key] =  explode(FCPATH, $config['upload_path'])[1] . '/' . $this->upload->data('file_name');
				$i++;
			}
		}
		return $response;
	}

	public function new_presentation()
	{
		$this->request = $this->input->post();
		$presentation_id = $this->request['presentation_id'];
		$application = $this->EntriesModel->get(null, ['nomination_id' => $this->request['nomination_id']]);
		$f = 1;
		foreach ($_FILES as $key => $file) {
			if ($file['size'] == 0) {
				$f = 0;
				break;
			}
		}
		if ($f) {
			$response = $this->_document_uploads($_FILES, $presentation_id);
		}
		echo "<pre>";
		print_r(array_merge($response, $this->request));
	}
}

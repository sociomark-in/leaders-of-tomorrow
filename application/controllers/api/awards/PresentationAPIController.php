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
		$this->load->model('panel/PresentationsModel');
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
		$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $this->request['nomination_id']]), true)[0];

		$f = 1;
		foreach ($_FILES as $key => $file) {
			if ($file['size'] == 0) {
				$f = 0;
				break;
			}
		}
		$response = [];
		if ($f) {
			$response = $this->_document_uploads($_FILES, $presentation_id);
		}

		$this->data = [
			'category_id' => $application['category_id'],
			'nomination_id' => $this->request['nomination_id'],
			'presentation_id' => $this->request['presentation_id'],
			'organization_name' => $this->request['organization']['name'],
			'id_255004' => $this->request['organization']['business'],
			'id_255201' => $this->request['organization']['size'],
			'id_255002' => $this->request['organization']['inc_date'],
			'name' => $this->request['name'],
			'id_255101' => $this->request['organization_revenue_2'],
			'id_255102' => $this->request['organization_revenue_1'],
			'id_255103' => $this->request['organization_growth_2'],
			'id_255104' => $this->request['organization_growth_1'],
			'id_255105' => $this->request['organization_profit'],
			'id_255106' => $this->request['organization_valuation'],
			'id_255107' => $this->request['organization_der_23'],
			'id_255201' => $this->request['case_study_1'] ?? "",
			'id_255202' => $this->request['case_study_2'] ?? "",
			'id_255203' => $this->request['case_study_3'] ?? "",
			'id_255204' => $this->request['case_study_4'] ?? "",
			'id_255205' => $this->request['case_study_5'] ?? "",
			'id_255206' => $this->request['case_study_6'] ?? "",
			'id_255207' => $this->request['case_study_7'] ?? "",
			'id_255208' => $this->request['case_study_8'] ?? "",

			'logo_image' => $response['logoimg'] ?? "",
			'id_255401' => $response['doc1'] ?? "",
			'id_255402' => $response['doc2'] ?? "",
			'id_255403' => $response['doc3'] ?? "",
			'id_255404' => $response['doc4'] ?? "",
			'id_255405' => $response['doc5'] ?? "",
			'id_255406' => $response['doc6'] ?? "",
			'id_255407' => $response['doc7'] ?? "",
			'created_by' => $this->usersession['id'],
			'created_at' => date('Y-m-d H:i:s'), 
		];

		if ($this->PresentationsModel->insert($this->data)) {
			if($this->EntriesModel->update(['status_2' => 3], ['nomination_id' => $this->data['nomination_id']])){
				redirect('dashboard');
			} else {
				echo "Unknown Error!";
			}
		} else {
			echo "Insertion Error!";
		}
	}
}

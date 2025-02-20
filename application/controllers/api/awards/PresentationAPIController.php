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
			'designation' => $this->request['designation'],
			'name' => $this->request['name'],

			'id_255002' => $this->request['organization']['inc_date'],
			'id_255006' => $this->request['experience']['total'],
			'id_255007' => $this->request['experience']['current'],
			'id_255008' => $this->request['organization']['size'],

			'id_255101' => $this->request['organization_revenue_24'],
			'id_255102' => $this->request['organization_revenue_23'],
			'id_255103' => $this->request['organization_growth_24'],
			'id_255104' => $this->request['organization_growth_23'],
			'id_255105' => $this->request['organization_profit_24'],
			'id_255106' => $this->request['organization_profit_23'],
			'id_255107' => $this->request['organization_roa_24'],
			'id_255108' => $this->request['organization_roa_23'],
			'id_255109' => $this->request['organization_der_24'],
			'id_255110' => $this->request['organization_der_23'],

			'id_255201' => $this->request['case_study_1'] ?? "",
			'id_255202' => $this->request['case_study_2'] ?? "",
			'id_255203' => $this->request['case_study_3'] ?? "",
			'id_255204' => $this->request['case_study_4'] ?? "",
			'id_255205' => $this->request['case_study_5'] ?? "",
			'id_255206' => $this->request['case_study_6'] ?? "",
			'id_255207' => $this->request['case_study_7'] ?? "",
			'id_255208' => $this->request['case_study_8'] ?? "",
			'id_255209' => $this->request['case_study_9'] ?? "",
			'id_255210' => $this->request['case_study_10'] ?? "",

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

		switch (explode('_', $application['category_id'])[1]) {
			case 'FAMILY':
				$this->data['id_255004'] = $this->request['organization']['beneficiary'];
				$this->data['id_255009'] = $this->request['organization']['size_global'];
				$this->data['id_255010'] = $this->request['organization']['members'];
				$this->data['id_255011'] = $this->request['organization']['generation'];
				break;
			case 'GLOBAL':
				$this->data['id_255009'] = $this->request['organization']['size_global'];
				$this->data['id_255004'] = $this->request['organization']['beneficiary'];
				break;

			default:
				break;
		}

		if ($this->PresentationsModel->insert($this->data)) {
			if ($this->EntriesModel->update(['status_2' => 3], ['nomination_id' => $this->data['nomination_id']])) {
				redirect('dashboard');
			} else {
				echo "Unknown Error!";
			}
		} else {
			echo "Insertion Error!";
		}
	}

	public function accept()
	{
		$this->load->model('panel/CommentModel');
		$this->request = $this->input->post();

		switch ($this->usersession['role']) {
			case 'jury':
			case 'admin':
			case 'super-admin':

				$presentation = json_decode($this->PresentationsModel->get(['nomination_id', 'presentation_id', 'category_id', 'name', 'organization_name', 'status', 'stage_status', 'created_by'], ['presentation_id' => $this->request['presentation_id']]), true)[0] ?? [];
				$nomination = json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'organization_name', 'email', 'status', 'stage_status', 'created_by'], ['nomination_id' => $this->request['nomination_id']]), true)[0] ?? [];
				$applicant = json_decode($this->UserModel->get(null, ['id' => $presentation['created_by']]), true)[0];
				$category = json_decode($this->CategoryModel->get(['name'], ['type' => $presentation['category_id']]), true)[0];

				$pr_data = [
					'status' => 1,
				];
				$nom_data = [
					'status_2' => 1,
				];
				if ($this->PresentationsModel->update($pr_data, ['presentation_id' => $presentation['presentation_id']]) && $this->EntriesModel->update($nom_data, ['nomination_id' => $presentation['nomination_id']])) {
					$recipients = [
						[
							"email" =>  $applicant['email'],
							"name" =>  $applicant['name']
						]
					];
					$subject = "Your Nomination Has Been Accepted - " . APP_NAME . " Awards 2025!";
					$body = "Hi " .  $applicant['name'] . ", your application [#" . $presentation['nomination_id'] . "] is Accepted! Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";

					$email_data['application'] = $presentation;
					$email_data['application']['category']['name'] = $category['name'];
					$email_data['applicant'] = [
						'name' => $applicant['name'],
						'email' => $applicant['email'],
						'contact' => $applicant['contact'],
					];

					$htmlbody = $this->load->view('panel/emails/participant_nomination_success', $email_data, true);

					$u = [
						'is_nominated' => 1
					];
					if ($this->UserModel->update($u, ['id' => $applicant['id']])) {
						if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
							redirect('dashboard/presentations');
						}
					}
				}
				break;

			default:
				# code...
				break;
		}
	}

	public function comment_and_reject()
	{
		$this->load->model('panel/CommentModel');
		$this->request = $this->input->post();

		switch ($this->usersession['role']) {
			case 'jury':
			case 'admin':
			case 'super-admin':
				$data = [
					'comment' => $this->request['comment'],
					'nomination_id' => $this->request['nomination_id'],
					'created_by' => $this->usersession['id'],
				];
				$presentation = json_decode($this->PresentationsModel->get(['nomination_id', 'presentation_id', 'category_id', 'name', 'organization_name', 'status', 'stage_status', 'created_by'], ['presentation_id' => $this->request['presentation_id']]), true)[0] ?? [];
				$nomination = json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'organization_name', 'email', 'status', 'stage_status', 'created_by'], ['nomination_id' => $this->request['nomination_id']]), true)[0] ?? [];
				$applicant = json_decode($this->UserModel->get(null, ['id' => $presentation['created_by']]), true)[0];
				$category = json_decode($this->CategoryModel->get(['name'], ['type' => $presentation['category_id']]), true)[0];

				$email_data['application'] = $presentation;
				$email_data['application']['category']['name'] = $category['name'];
				$email_data['applicant'] = [
					'name' => $applicant['name'],
					'email' => $applicant['email'],
					'contact' => $applicant['contact'],
				];
				if ($this->CommentModel->insert($data)) {
					$pr_data = [
						'status' => '0',
					];
					$nom_data = [
						'status_2' => '0',
					];
					if ($this->PresentationsModel->update($pr_data, ['presentation_id' => $presentation['presentation_id']]) && $this->EntriesModel->update($nom_data, ['nomination_id' => $presentation['nomination_id']])) {
						$recipients = [
							[
								"email" =>  $applicant['email'],
								"name" =>  $applicant['name']
							]
						];

						$subject = "Update on Your Nomination - " . APP_NAME . " Awards 2025!";
						$body = "Hi " .  $applicant['name'] . ", your application [#" . $presentation['nomination_id'] . "] is Rejected with comment - <br> " . $data['comment'] . "<br>Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
						$htmlbody = $this->load->view('panel/emails/participant_nomination_reject', $email_data, true);
						if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
							redirect('dashboard/presentations');
						}
					}
				}
				# code...
				break;
			default:
				break;
		}
	}

	public function comment_and_unlock()
	{
		$this->load->model('panel/CommentModel');
		$this->request = $this->input->post();

		switch ($this->usersession['role']) {
			case 'jury':
			case 'admin':
			case 'super-admin':
				$data = [
					'comment' => $this->request['comment'],
					'nomination_id' => $this->request['presentation_id'],
					'created_by' => $this->usersession['id'],
				];

				$presentation = json_decode($this->PresentationsModel->get(['nomination_id', 'presentation_id', 'category_id', 'name', 'organization_name', 'status', 'stage_status', 'created_by'], ['presentation_id' => $this->request['presentation_id']]), true)[0] ?? [];
				$nomination = json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'organization_name', 'email', 'status', 'stage_status', 'created_by'], ['nomination_id' => $this->request['nomination_id']]), true)[0] ?? [];
				$applicant = json_decode($this->UserModel->get(null, ['id' => $presentation['created_by']]), true)[0];
				$category = json_decode($this->CategoryModel->get(['name'], ['type' => $presentation['category_id']]), true)[0];

				$email_data['application'] = $presentation;
				$email_data['application']['category']['name'] = $category['name'];
				$email_data['applicant'] = [
					'name' => $applicant['name'],
					'email' => $applicant['email'],
					'contact' => $applicant['contact'],
				];

				if ($this->CommentModel->insert($data)) {
					$pr_data = [
						'status' => '2',
					];
					$nom_data = [
						'status_2' => '2',
					];
					if ($this->PresentationsModel->update($pr_data, ['presentation_id' => $presentation['presentation_id']]) && $this->EntriesModel->update($nom_data, ['nomination_id' => $presentation['nomination_id']])) {
						$recipients = [
							[
								"email" =>  $applicant['email'],
								"name" =>  $applicant['name']
							]
						];
						$subject = "Action Required - Update Your Submission for " . APP_NAME . " Awards 2025!";
						$body = "Hi " .  $applicant['name'] . ", your application [#" . $presentation['nomination_id'] . "] requires improvements. <br>Please check comments - <br> " . $data['comment'] . "<br>Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
						$htmlbody = $this->load->view('panel/emails/participant_nomination_update', $email_data, true);
						if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
							redirect('dashboard/presentations');
						}
					}
				}
				break;
			default:
				break;
		}
	}

	public function bulk_edit()
	{
		$data = [];
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

		switch (explode('_', $application['category_id'])[1]) {
			case 'INDIVIDUAL':
				$this->data = [
					'category_id' => $application['category_id'],
					'nomination_id' => $this->request['nomination_id'],
					'presentation_id' => $this->request['presentation_id'],
					'organization_name' => $this->request['organization']['name'],
					'designation' => $this->request['designation'],
					'id_255004' => $this->request['organization']['business'],
					'id_255108' => $this->request['organization']['size'],
					'id_255002' => $this->request['organization']['inc_date'],
					'name' => $this->request['name'],

					'id_255006' => $this->request['experience']['total'],
					'id_255007' => $this->request['experience']['current'],

					'id_255101' => $this->request['organization_revenue_2'],
					'id_255102' => $this->request['organization_revenue_1'],
					'id_255103' => $this->request['organization_growth_2'],
					'id_255104' => $this->request['organization_growth_1'],
					'id_255105' => $this->request['organization_profit'],

					'id_255201' => $this->request['case_study_1'] ?? "",
					'id_255202' => $this->request['case_study_2'] ?? "",
					'id_255203' => $this->request['case_study_3'] ?? "",
					'id_255204' => $this->request['case_study_4'] ?? "",
					'id_255205' => $this->request['case_study_5'] ?? "",
					'id_255206' => $this->request['case_study_6'] ?? "",
					'id_255207' => $this->request['case_study_7'] ?? "",
					'id_255208' => $this->request['case_study_8'] ?? "",
					'id_255209' => $this->request['case_study_9'] ?? "",
					'id_255210' => $this->request['case_study_10'] ?? "",

					'created_by' => $this->usersession['id'],
					'created_at' => date('Y-m-d H:i:s'),
				];
				if (count($response) > 0) {
					$this->data['logo_image'] = $response['logoimg'];
					$this->data['id_255401'] = $response['doc1'];
					$this->data['id_255402'] = $response['doc2'];
					$this->data['id_255403'] = $response['doc3'];
					$this->data['id_255404'] = $response['doc4'];
					$this->data['id_255405'] = $response['doc5'];
					$this->data['id_255406'] = $response['doc6'];
					$this->data['id_255407'] = $response['doc7'];
				}
				break;


			default:
				$this->data = [
					'category_id' => $application['category_id'],
					'nomination_id' => $this->request['nomination_id'],
					'presentation_id' => $this->request['presentation_id'],
					'organization_name' => $this->request['organization']['name'],
					'designation' => $this->request['designation'],
					'id_255004' => $this->request['organization']['business'],
					'id_255108' => $this->request['organization']['size'],
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

					'created_by' => $this->usersession['id'],
					'created_at' => date('Y-m-d H:i:s'),
				];

				if (count($response) > 0) {
					$this->data['logo_image'] = $response['logoimg'];
					$this->data['id_255401'] = $response['doc1'];
					$this->data['id_255402'] = $response['doc2'];
					$this->data['id_255403'] = $response['doc3'];
					$this->data['id_255404'] = $response['doc4'];
					$this->data['id_255405'] = $response['doc5'];
					$this->data['id_255406'] = $response['doc6'];
					$this->data['id_255407'] = $response['doc7'];
				}
				break;
		}
		$this->data['status'] = '3';
		// echo "<pre>";
		// print_r($this->data);
		// die;

		if ($this->PresentationsModel->update($this->data, ['presentation_id' => $presentation_id])) {
			if ($this->EntriesModel->update(['status_2' => 3], ['nomination_id' => $this->data['nomination_id']])) {
				redirect('dashboard');
			} else {
				echo "Unknown Error!";
			}
		} else {
			echo "Insertion Error!";
		}
	}
}

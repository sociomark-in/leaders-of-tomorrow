<?php
defined('BASEPATH') or exit('No direct script access allowed');

// use Clegginabox\PDFMerger\PDFMerger;

require_once APPPATH . "vendor/autoload.php";

class NominationAPIController extends CI_Controller
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
	 * A Helper Function To Upload the $_FILES as per $application_id and $category_id
	 *
	 * @param  mixed $_files $_FILES Object
	 * @param  mixed $category_id
	 * @param  mixed $application_id
	 * @return void
	 */
	public function _document_uploads($_files, $category_id, $application_id)
	{
		$response = [];

		/* Set Docket Name */
		$docket_name = FCPATH . 'uploads/dockets/' . $category_id . '_' . $application_id . '_' . time() . '.pdf';

		/* Set Uploads Config */
		$config['upload_path'] = FCPATH . 'uploads/' .  $application_id;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '5000';


		/* PDFMerger Docket File Exists Script */
		if (!file_exists(FCPATH . 'uploads/dockets/')) {
			mkdir(FCPATH . 'uploads/dockets/', 0777);
		} else {
			delete_files(FCPATH . 'uploads/dockets/');
		}

		/* Document Upload Folder Exists Script */
		if (!file_exists($config['upload_path'])) {
			mkdir($config['upload_path'], 0777);
		} else {
			delete_files($config['upload_path']);
		}

		// $pdf = new PDFMerger;
		$i = 0;
		$r = random_string();
		$this->load->library('upload', $config);
		foreach ($_files as $key => $file) {
			$new_name = time() . "_" . $r . "_" . $file['name'];
			$config['file_name'] = $new_name;

			/* PDF Merger Script */
			// $tmp = $file['tmp_name'];
			// $pdf->addPDF($tmp);
			// shell_exec("gswin32 -sDEVICE=pdfwrite -dCompatibilityLevel=1.4 -dNOPAUSE -dQUIET -dBATCH -sOutputFile=" . $tmp . " " . $tmp . "");
			/* PDF Merger Script */

			/* File Upload Script */
			$this->upload->initialize($config);
			if (!$this->upload->do_upload($key)) {
				// An error occurred
				echo "Error: " . $this->upload->display_errors();
			} else {
				/* No Error - File Upload Script */
				/* Data Upload */
				$response[$i] =  explode(FCPATH, $config['upload_path'])[1] . '/' . $this->upload->data('file_name');
				$i++;
			}
		}
		// $pdf->merge('file', $docket_name, 'P');
		return $response;
	}

	public function isPdfCompressed($pdfPath)
	{
		// Read the PDF file header (first few bytes)
		$fp = fopen($pdfPath, 'rb');
		if (!$fp) {
			return false; // Error opening file
		}
		$header = fread($fp, 5);
		fclose($fp);

		// Check for PDF header
		if ($header != '%PDF-') {
			return false; // Not a PDF file
		}

		// **Important:** Assume compression by default
		$isCompressed = true;

		// Basic check: Look for common compression filters (not guaranteed)
		$content = file_get_contents($pdfPath);
		if (
			strpos($content, '/Filter /FlateDecode') === false &&
			strpos($content, '/Filter /LZWDecode') === false &&
			strpos($content, '/Filter /DCTDecode') === false
		) {
			// If none of the specific filters are found, 
			// consider it potentially uncompressed 
			$isCompressed = false;
		}

		return $isCompressed;
		/* // Example usage
		$pdfFilePath  = "./et.pdf";
		if (isPdfCompressed($pdfFilePath)) {
			echo "The PDF file is likely compressed.\n";
		} else {
			echo "The PDF file is potentially uncompressed.\n"; 
		} */
	}

	/**
	 * new_nomination
	 * 
	 * ### Description: 
	 * **Scope**: Applicant
	 * 
	 * To let the Applicant to apply to any category in the 14 Categories of Awards
	 * ### To Do:
	 *  - [x] Insert stage-wise all Data
	 *  - [x] Back Traveling
	 *  - [x] Email Hit after Submit
	 * @return void
	 */
	public function new_nomination()
	{
		/* Get Application Data */
		$this->load->helper('file');
		$this->load->helper('directory');

		$this->request = $this->input->post();

		$this->load->model('event/awards/CategoryModel');
		$stage = $this->input->post('stage') ?? 0;

		$category = json_decode($this->CategoryModel->get(null, ['type' => $this->input->post('category_id')]), true)[0];

		$this->request['stage'] = $stage;

		$application_id = $this->request['application_id'];

		if ($stage == 6) {
			$this->session->unset_userdata('temp_application_session');
		} else {
			$temp_application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true);
			$this->session->set_userdata('temp_application_session', $temp_application);
		}
		$s = $stage + 1;

		switch ($category['type']) {
			case '1_GLOBAL':
				switch ($stage) {
					case 0: # ☑ Personal Information

						$certifications = [];
						if (isset($this->request['organization']['certifications'])) {
							for ($i = 0; $i < count($this->request['organization']['certifications']); $i++) {
								if ($this->request['organization']['certifications'][$i] == 'Other') {
									$certifications[] = "Other - (" . $this->request['organization']['certifications_other'] . ")";
								} else {
									$certifications[] = $this->request['organization']['certifications'][$i];
								}
							}
						}
						$data = [
							"nomination_id" => $this->request['application_id'],
							"category_id" => $category['type'],
							"name" => 	$this->request['name'],
							"email" => $this->request['contact_person']['email'] ?? null,
							"designation" => 	$this->request['designation'],
							"organization_name" => 	$this->request['organization']['name'],
							"organization_url" => $this->request['organization']['url'],
							"organization_city" => $this->request['organization']['address']['city'],
							"organization_state" => $this->request['organization']['address']['state'],
							"id_255901" => $this->request['contact_person']['name'],
							"id_255902" => $this->request['contact_person']['email'],
							"id_255903" => $this->request['contact_person']['contact'],
							"stage_status" => $s,
							"status" => '4',
							"created_by" => $this->usersession['id'],

							"id_255001" => json_encode([
								$this->request['organization']['address']['line_1'],
								$this->request['organization']['address']['line_2'],
								$this->request['organization']['address']['line_3'],
							]),
							'id_255000'	=> $this->request['organization']['industry'],
							'id_255002'	=> $this->request['organization']['inc_date'],
							'id_255003'	=> $this->request['organization']['segment'],
							'id_255004'	=> json_encode($this->request['partner']),
							'id_255005'	=> $this->request['organization']['ownership'],

							'id_255007'	=> $this->request['gender'],							//date_of_birth
							'id_255008'	=> $this->request['dob'],							//date_of_birth

							'id_255009'	=> $this->request['organization']['iec_code'],
							'id_255010'	=> $this->request['organization']['epc'],
							'id_255011'	=> json_encode($certifications),
						];
						$this->data['data'] = $data;

						if ($this->EntriesModel->insert($this->data['data'])) {
							redirect(base_url('nomination/' . $application_id) . '?stage=' . ++$stage);
						};
						break;
					case 1: # ☑ Organization Details
						$data = [
							'id_255101' => $this->request["financial_1_2"],
							'id_255102' => $this->request["financial_1_1"],
							'id_255103' => $this->request["financial_2_2"],
							'id_255104' => $this->request["financial_2_1"],
							'id_255105' => $this->request["financial_3_2"],
							'id_255106' => $this->request["financial_3_1"],
							'id_255107' => $this->request["financial_4_2"],
							'id_255108' => $this->request["financial_4_1"],
							'id_255109' => $this->request["financial_5_1"],
							'id_255201' => $this->request["organization"]['size'],
							'id_255202' => $this->request["organization_overview"],
							'id_255203' => $this->request["organization_services"],
							'id_255204' => $this->request["organization"]['domestic'],
							'id_255205' => $this->request["organization"]['international'],
							'id_255206' => $this->request["organization"]['size_global'],
							'id_255207' => $this->request["organization_collaborations"],
							'stage_status' => $s
						];
						$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect($this->request['referrer'] . '?stage=' . ++$stage);
						}
						break;

					case 2: # ☑ Case Studies
						$data = [
							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],
							'id_255304' => $this->request['case_study_4'],

							'stage_status' => $s,
						];
						$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect($this->request['referrer'] . '?stage=' . ++$stage);
						}
						break;

					case 3: # ☑ Individual Category
						$data = [
							'id_255601' => $this->request['alt_category_id'],
							'id_255602' => $this->request['case_study_individual'],

							'stage_status' => $s,
						];

						$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect($this->request['referrer'] . '?stage=' . ++$stage);
						}
						break;

					case 4: # ☑ Upload Files
						$category_id = $this->input->post('category_id');
						$f = 1;
						foreach ($_FILES as $key => $file) {
							if ($file['size'] == 0) {
								$f = 0;
								break;
							}
						}
						if ($f) {
							$response = $this->_document_uploads($_FILES, $category_id, $application_id);
							$data = [
								'stage_status' => $s,

								'id_255401' =>  $response[0],
								'id_255402' =>  $response[1],
								'id_255403' =>  $response[2],
								'id_255404' =>  $response[3],
								'id_255405' =>  $response[4],
								'id_255406' =>  $response[5],
								'id_255407' =>  $response[6],
							];
							$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
							if ($rows == 0) {
								redirect($this->request['referrer'] . '?stage=' . $stage);
							} else {
								redirect('nomination/' . $application_id . '?stage=' . ++$stage);
							}
						} else {
							redirect('nomination/' . $application_id . '?stage=' . ++$stage);
						}
						break;


					case 5:	# ☑ Review Application
						/* Change Application Status */

						$category_id = $this->input->post('category_id');
						$f = 1;
						foreach ($_FILES as $key => $file) {
							if ($file['size'] == 0) {
								$f = 0;
								break;
							}
						}

						$certifications = [];
						if (isset($this->request['organization']['certifications'])) {
							for ($i = 0; $i < count($this->request['organization']['certifications']); $i++) {
								if ($this->request['organization']['certifications'][$i] == 'Other') {
									$certifications[] = "Other - (" . $this->request['organization']['certifications_other'] . ")";
								} else {
									$certifications[] = $this->request['organization']['certifications'][$i];
								}
							}
						}



						$data = [
							"name" => 	$this->request['name'],
							"email" => $this->request['contact_person']['email'] ?? null,
							"designation" => 	$this->request['designation'],
							"organization_name" => 	$this->request['organization']['name'],
							"organization_url" => $this->request['organization']['url'],
							"organization_city" => $this->request['organization']['address']['city'],
							"organization_state" => $this->request['organization']['address']['state'],
							"id_255901" => $this->request['contact_person']['name'],
							"id_255902" => $this->request['contact_person']['email'],
							"id_255903" => $this->request['contact_person']['contact'],
							"stage_status" => $s,
							"status" => '4',
							"created_by" => $this->usersession['id'],

							"id_255001" => json_encode([
								$this->request['organization']['address']['line_1'],
								$this->request['organization']['address']['line_2'],
								$this->request['organization']['address']['line_3'],
							]),
							'id_255000'	=> $this->request['organization']['industry'],
							'id_255002'	=> $this->request['organization']['inc_date'],
							'id_255003'	=> $this->request['organization']['segment'],
							'id_255004'	=> json_encode($this->request['partner']),
							'id_255005'	=> $this->request['organization']['ownership'],

							'id_255007'	=> $this->request['gender'],							//date_of_birth
							'id_255008'	=> $this->request['dob'],							//date_of_birth

							'id_255009'	=> $this->request['organization']['iec_code'],
							'id_255010'	=> $this->request['organization']['epc'],
							'id_255011'	=> json_encode($certifications),

							'id_255101' => $this->request["financial_1_2"],
							'id_255102' => $this->request["financial_1_1"],
							'id_255103' => $this->request["financial_2_2"],
							'id_255104' => $this->request["financial_2_1"],
							'id_255105' => $this->request["financial_3_2"],
							'id_255106' => $this->request["financial_3_1"],
							'id_255107' => $this->request["financial_4_2"],
							'id_255108' => $this->request["financial_4_1"],
							'id_255109' => $this->request["financial_5_1"],
							'id_255201' => $this->request["organization"]['size'],
							'id_255202' => $this->request["organization_overview"],
							'id_255203' => $this->request["organization_services"],
							'id_255204' => $this->request["organization"]['domestic'],
							'id_255205' => $this->request["organization"]['international'],
							'id_255206' => $this->request["organization"]['size_global'],
							'id_255207' => $this->request["organization_collaborations"],

							'id_255601' => $this->request['alt_category_id'],
							'id_255602' => $this->request['case_study_individual'],

							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],
							'id_255304' => $this->request['case_study_4'],

							'status' =>  3,
						];
						if ($f) {
							$response = $this->_document_uploads($_FILES, $category_id, $application_id);
							$data = [
								'stage_status' => $s,

								'id_255401' =>  $response[0],
								'id_255402' =>  $response[1],
								'id_255403' =>  $response[2],
								'id_255404' =>  $response[3],
								'id_255405' =>  $response[4],
								'id_255406' =>  $response[5],
								'id_255407' =>  $response[6],
							];
						}

						// Sanitize $data Array for DB Insert
						foreach ($data as $key => $value) {
							# code...
							if ($value == "" || $value == null) {
								unset($data[$key]);
							}
						}
						$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id], strtolower($c[1]));
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect('nomination/' . $application_id . '?stage=' . ++$stage);
						}
						break;
					case 6:	# ☑ Alternating Application, Success & Email Send
						/* Change Application Status */

						$this->request = $this->input->post();
						$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];


						/**
						 * Duplicate Application Data for Individual Category
						 * ===================================
						 * 		Application Data
						 * 		Uploads Data
						 */

						/**
						 * ☑ Send Email Functionality
						 */
						$email_data['application'] = $application;
						$email_data['application']['category']['name'] = $category['name'];
						$email_data['applicant'] = [
							'name' => $this->usersession['name'],
							'email' => $this->usersession['email'],
							'contact' => $this->usersession['contact'],
						];
						$this->load->model('panel/AgentModel');
						$agents = json_decode($this->AgentModel->get(), true);

						foreach ($agents as $key => $agent) {
						}
						$data = [
							// 'is_idfc_customer' => $this->request['is_idfc_customer'],
							// 'agent_referral' => $this->request['agent_referrer'],
							// 'agent_name' => $this->request['agent_name'],
							'created_at' => date('Y-m-d H:i:s'),
							'status' => 3
						];

						if ($this->request['last_winner']['status'] == 'yes') {
							$data['id_255603'] = $this->request['last_winner']['year'];
							$data['id_255604'] = $this->request['last_winner']['category'];
						}

						$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows > 0) {
							$recipients = [
								[
									"email" =>  $this->usersession['email'],
									"name" =>  $this->usersession['name']
								]
							];
							$subject = "Submission Received for " .  APP_NAME .  " Awards 2025";
							$body = "Hi " .  $this->usersession['name'] . ", your application [#" . $application_id . "] for " . $category['name'] . " is in review! Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
							$htmlbody = $this->load->view('panel/emails/participant_nomination_review', $email_data, true);
							if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
								redirect('my-nominations');
							}
						} else {
							redirect('nomination/' . $application_id . '?stage=' . $stage);
						}

						break;

					default:
						# code...
						break;
				}
				break;
			case '1_FAMILY':
				switch ($stage) {
					case 0: #  	 Personal Information
						$data = [
							"nomination_id" => $this->request['application_id'],
							"category_id" => $category['type'],
							"name" => 	$this->request['name'],
							"email" => $this->request['contact_person']['email'] ?? null,
							"designation" => 	$this->request['designation'],
							"organization_name" => 	$this->request['organization']['name'],
							"organization_url" => $this->request['organization']['url'],
							"organization_city" => $this->request['organization']['address']['city'],
							"organization_state" => $this->request['organization']['address']['state'],

							"id_255901" => $this->request['contact_person']['name'],
							"id_255902" => $this->request['contact_person']['email'],
							"id_255903" => $this->request['contact_person']['contact'],
							"stage_status" => $s,
							"status" => '4',
							"created_by" => $this->usersession['id'],

							"id_255001" => json_encode([
								$this->request['organization']['address']['line_1'],
								$this->request['organization']['address']['line_2'],
								$this->request['organization']['address']['line_3'],
							]),

							"id_255000" => $this->request['organization']['industry'],
							'id_255002'	=> $this->request['organization']['inc_date'],
							'id_255003'	=> $this->request['organization']['segment'],
							'id_255004'	=> json_encode($this->request['partner']),
							'id_255005'	=> $this->request['organization']['ownership'],
							'id_255006'	=> $this->request['organization']['leading'],
							'id_255010'	=> $this->request['founder_relation'],

							'id_255007'	=> $this->request['gender'],							//date_of_birth
							'id_255008'	=> $this->request['dob'],							//date_of_birth
						];
						$this->data['data'] = $data;

						// echo "<pre>";
						// print_r($this->request);
						// die;

						if ($this->EntriesModel->insert($this->data['data'])) {
							redirect(base_url('nomination/' . $application_id) . '?stage=' . ++$stage);
						};
						break;
					case 1: # 	 Organization Details
						$data = [
							'id_255101' => $this->request["financial_1_1"],
							'id_255102' => $this->request["financial_1_2"],
							'id_255103' => $this->request["financial_2_1"],
							'id_255104' => $this->request["financial_2_2"],
							'id_255105' => $this->request["financial_3_1"],
							'id_255106' => $this->request["financial_3_2"],
							'id_255107' => $this->request["financial_4_1"],
							'id_255108' => $this->request["financial_4_2"],
							'id_255109' => $this->request["financial_5_1"],
							'id_255110' => $this->request["financial_6_1"],

							'id_255201' => $this->request["organization"]['size'],
							'id_255202' => $this->request["organization_overview"],
							'id_255203' => $this->request["organization_services"],

							'id_255204' => $this->request["organization"]['domestic'],
							'id_255205' => $this->request["organization"]['international'],

							'id_255204' => $this->request["organization"]['beneficiary'],
							'id_255205' => $this->request["organization"]['members'],
							'id_255206' => implode('-', $this->request["organization"]['investment']),
							'id_255207' => $this->request["organization_family"],

							'stage_status' => $s

						];
						$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect($this->request['referrer'] . '?stage=' . ++$stage);
						}
						break;

					case 2: # ☑ Case Studies I
						$data = [
							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],

							'stage_status' => $s,
						];
						$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect($this->request['referrer'] . '?stage=' . ++$stage);
						}
						break;

					case 3: # ☑ Individual Category
						$data = [
							'id_255601' => $this->request['alt_category_id'],
							'id_255602' => $this->request['case_study_individual'],

							'stage_status' => $s,
						];

						$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect($this->request['referrer'] . '?stage=' . ++$stage);
						}
						break;

					case 4: # ☑ Upload Files
						$category_id = $this->input->post('category_id');
						$f = 1;
						foreach ($_FILES as $key => $file) {
							if ($file['size'] == 0) {
								$f = 0;
								break;
							}
						}
						if ($f) {
							$response = $this->_document_uploads($_FILES, $category_id, $application_id);
							$data = [
								'stage_status' => $s,

								'id_255401' =>  $response[0],
								'id_255402' =>  $response[1],
								'id_255403' =>  $response[2],
								'id_255404' =>  $response[3],
								'id_255405' =>  $response[4],
							];
							$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
							if ($rows == 0) {
								redirect($this->request['referrer'] . '?stage=' . $stage);
							} else {
								redirect('nomination/' . $application_id . '?stage=' . ++$stage);
							}
						} else {
							redirect('nomination/' . $application_id . '?stage=' . ++$stage);
						}
						break;

					case 5: #	 Review Application
						/* Change Application Status */

						$category_id = $this->input->post('category_id');
						$f = 1;
						foreach ($_FILES as $key => $file) {
							if ($file['size'] == 0) {
								$f = 0;
								break;
							}
						}

						$data = [
							'stage_status' => $s,

							"name" => 	$this->request['name'],
							"email" => $this->request['contact_person']['email'] ?? null,
							"designation" => 	$this->request['designation'],
							"organization_name" => 	$this->request['organization']['name'],
							"organization_url" => $this->request['organization']['url'],
							"organization_city" => $this->request['organization']['address']['city'],
							"organization_state" => $this->request['organization']['address']['state'],

							"id_255901" => $this->request['contact_person']['name'],
							"id_255902" => $this->request['contact_person']['email'],
							"id_255903" => $this->request['contact_person']['contact'],
							"stage_status" => $s,
							"status" => '4',
							"created_by" => $this->usersession['id'],

							"id_255001" => json_encode([
								$this->request['organization']['address']['line_1'],
								$this->request['organization']['address']['line_2'],
								$this->request['organization']['address']['line_3'],
							]),

							"id_255000" => $this->request['organization']['industry'],
							'id_255002'	=> $this->request['organization']['inc_date'],
							'id_255003'	=> $this->request['organization']['segment'],
							'id_255004'	=> json_encode($this->request['partner']),
							'id_255005'	=> $this->request['organization']['ownership'],
							'id_255006'	=> $this->request['organization']['leading'],
							'id_255010'	=> $this->request['founder_relation'],

							'id_255007'	=> $this->request['gender'],							//date_of_birth
							'id_255008'	=> $this->request['dob'],							//date_of_birth

							'id_255101' => $this->request["financial_1_1"],
							'id_255102' => $this->request["financial_1_2"],
							'id_255103' => $this->request["financial_2_1"],
							'id_255104' => $this->request["financial_2_2"],
							'id_255105' => $this->request["financial_3_1"],
							'id_255106' => $this->request["financial_3_2"],
							'id_255107' => $this->request["financial_4_1"],
							'id_255108' => $this->request["financial_4_2"],
							'id_255109' => $this->request["financial_5_1"],
							'id_255110' => $this->request["financial_6_1"],

							'id_255201' => $this->request["organization"]['size'],
							'id_255202' => $this->request["organization_overview"],
							'id_255203' => $this->request["organization_services"],

							'id_255204' => $this->request["organization"]['domestic'],
							'id_255205' => $this->request["organization"]['international'],

							'id_255204' => $this->request["organization"]['beneficiary'],
							'id_255205' => $this->request["organization"]['members'],
							'id_255206' => implode('-', $this->request["organization"]['investment']),
							'id_255207' => $this->request["organization_family"],

							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],

							'id_255601' => $this->request['alt_category_id'],
							'id_255602' => $this->request['case_study_individual'],

							'status' =>  3,
						];

						if ($f) {
							$response = $this->_document_uploads($_FILES, $category_id, $application_id);

							$data['id_255401'] =  $response[0];
							$data['id_255402'] =  $response[1];
							$data['id_255403'] =  $response[2];
							$data['id_255404'] =  $response[3];
							$data['id_255405'] =  $response[4];
						}
						// Sanitize $data Array for DB Insert
						foreach ($data as $key => $value) {
							# code...
							if ($value == "" || $value == null) {
								unset($data[$key]);
							}
						}
						$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id], strtolower($c[1]));
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect('nomination/' . $application_id . '?stage=' . ++$stage);
						}
						break;
					case 6:	# ☑ Alternating Application, Success & Email Send
						/* Change Application Status */

						$this->request = $this->input->post();
						$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];


						/**
						 * Duplicate Application Data for Individual Category
						 * ===================================
						 * 		Application Data
						 * 		Uploads Data
						 */

						/**
						 * ☑ Send Email Functionality
						 */
						$email_data['application'] = $application;
						$email_data['application']['category']['name'] = $category['name'];
						$email_data['applicant'] = [
							'name' => $this->usersession['name'],
							'email' => $this->usersession['email'],
							'contact' => $this->usersession['contact'],
						];
						$this->load->model('panel/AgentModel');
						$agents = json_decode($this->AgentModel->get(), true);

						foreach ($agents as $key => $agent) {
						}
						$data = [
							// 'is_idfc_customer' => $this->request['is_idfc_customer'],
							// 'agent_referral' => $this->request['agent_referrer'],
							// 'agent_name' => $this->request['agent_name'],
							'created_at' => date('Y-m-d H:i:s'),
							'status' => 3
						];

						if ($this->request['last_winner']['status'] == 'yes') {
							$data['id_255603'] = $this->request['last_winner']['year'];
							$data['id_255604'] = $this->request['last_winner']['category'];
						}

						$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows > 0) {
							$recipients = [
								[
									"email" =>  $this->usersession['email'],
									"name" =>  $this->usersession['name']
								]
							];
							$subject = "Submission Received for " .  APP_NAME .  " Awards 2025";
							$body = "Hi " .  $this->usersession['name'] . ", your application [#" . $application_id . "] for " . $category['name'] . " is in review! Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
							$htmlbody = $this->load->view('panel/emails/participant_nomination_review', $email_data, true);
							if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
								redirect('my-nominations');
							}
						} else {
							redirect('nomination/' . $application_id . '?stage=' . $stage);
						}

						break;
					default:
						# code...
						break;
				}
				break;

			default:
				switch (explode('_', $category['type'])[1]) {
					case 'IDFC':
						break;

					default: # ☑ Working & Tested
						switch ($stage) {
							case 0: 	# ☑ Personal Information
								$data = [
									"nomination_id" => $this->request['application_id'],
									"category_id" => $category['type'],
									"name" => 	$this->request['name'],
									"email" => $this->request['contact_person']['email'] ?? null,
									"designation" => 	$this->request['designation'],
									"organization_name" => 	$this->request['organization']['name'],
									"organization_url" => $this->request['organization']['url'],
									"organization_city" => $this->request['organization']['address']['city'],
									"organization_state" => $this->request['organization']['address']['state'],
									"id_255901" => $this->request['contact_person']['name'],
									"id_255902" => $this->request['contact_person']['email'],
									"id_255903" => $this->request['contact_person']['contact'],
									"stage_status" => $s,
									"status" => '4',
									"created_by" => $this->usersession['id'],

									"id_255001" => json_encode([
										$this->request['organization']['address']['line_1'],
										$this->request['organization']['address']['line_2'],
										$this->request['organization']['address']['line_3'],
									]),
									'id_255002'	=> $this->request['organization']['inc_date'],
									'id_255003'	=> $this->request['organization']['segment'],
									'id_255004'	=> json_encode($this->request['partner']),
									'id_255005'	=> $this->request['organization']['ownership'],

									'id_255007'	=> $this->request['gender'],							//date_of_birth
									'id_255008'	=> $this->request['dob'],							//date_of_birth
								];
								$this->data['data'] = $data;

								if ($this->EntriesModel->insert($this->data['data'])) {
									redirect(base_url('nomination/' . $application_id) . '?stage=' . ++$stage);
								};
								break;
							case 1: 	# ☑ Organization Details							
								$data = [
									'id_255101' => $this->request["financial_1_1"],
									'id_255102' => $this->request["financial_1_2"],
									'id_255103' => $this->request["financial_2_1"],
									'id_255104' => $this->request["financial_2_2"],
									'id_255105' => $this->request["financial_3_1"],
									'id_255106' => $this->request["financial_3_2"],
									'id_255107' => $this->request["financial_4_1"],
									'id_255108' => $this->request["financial_4_2"],
									'id_255109' => $this->request["financial_5_1"],
									'id_255110' => $this->request["financial_6_1"],

									'id_255201' => $this->request["organization"]['size'],
									'id_255202' => $this->request["organization_overview"],
									'id_255203' => $this->request["organization_services"],

									'id_255204' => $this->request["organization"]['domestic'],
									'id_255205' => $this->request["organization"]['international'],

									'stage_status' => $s

								];

								$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
								if ($rows == 0) {
									redirect($this->request['referrer'] . '?stage=' . $stage);
								} else {
									redirect($this->request['referrer'] . '?stage=' . ++$stage);
								}
								break;
							case 2: 	# ☑ Case Studies I
								$data = [
									'id_255301' => $this->request['case_study_1'],
									'id_255302' => $this->request['case_study_2'],
									'id_255303' => $this->request['case_study_3'],

									'stage_status' => $s,
								];

								$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
								if ($rows == 0) {
									redirect($this->request['referrer'] . '?stage=' . $stage);
								} else {
									redirect($this->request['referrer'] . '?stage=' . ++$stage);
								}
								break;
							case 3: 	# ☑ Individual Category
								$data = [
									'id_255601' => $this->request['alt_category_id'],
									'id_255602' => $this->request['case_study_individual'],

									'stage_status' => $s,
								];

								$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
								if ($rows == 0) {
									redirect($this->request['referrer'] . '?stage=' . $stage);
								} else {
									redirect($this->request['referrer'] . '?stage=' . ++$stage);
								}
								break;
							case 4: 	# ☑ Upload Files
								$category_id = $this->input->post('category_id');
								$f = 1;
								foreach ($_FILES as $key => $file) {
									if ($file['size'] == 0) {
										$f = 0;
										break;
									}
								}
								if ($f) {
									$response = $this->_document_uploads($_FILES, $category_id, $application_id);
									$data = [
										'stage_status' => $s,

										'id_255401' =>  $response[0],
										'id_255402' =>  $response[1],
										'id_255403' =>  $response[2],
										'id_255404' =>  $response[3],
										'id_255405' =>  $response[4],
									];
									$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
									if ($rows == 0) {
										redirect($this->request['referrer'] . '?stage=' . $stage);
									} else {
										redirect('nomination/' . $application_id . '?stage=' . ++$stage);
									}
								} else {
									redirect('nomination/' . $application_id . '?stage=' . ++$stage);
								}
								break;
							case 5:		# ☑ Review Application
								$category_id = $this->input->post('category_id');
								$f = 1;
								foreach ($_FILES as $key => $file) {
									if ($file['size'] == 0) {
										$f = 0;
										break;
									}
								}

								$data = [
									'stage_status' => $s,

									"name" => 	$this->request['name'],
									"email" => $this->request['contact_person']['email'] ?? null,
									"designation" => 	$this->request['designation'],
									"organization_name" => 	$this->request['organization']['name'],
									"organization_url" => $this->request['organization']['url'],
									"organization_city" => $this->request['organization']['address']['city'],
									"organization_state" => $this->request['organization']['address']['state'],
									"id_255901" => $this->request['contact_person']['name'],
									"id_255902" => $this->request['contact_person']['email'],
									"id_255903" => $this->request['contact_person']['contact'],

									"id_255001" => json_encode([
										$this->request['organization']['address']['line_1'],
										$this->request['organization']['address']['line_2'],
										$this->request['organization']['address']['line_3'],
									]),
									'id_255002'	=> $this->request['organization']['inc_date'],
									'id_255003'	=> $this->request['organization']['segment'],
									'id_255004'	=> json_encode($this->request['partner']),
									'id_255005'	=> $this->request['organization']['ownership'],

									'id_255007'	=> $this->request['gender'],							//date_of_birth
									'id_255008'	=> $this->request['dob'],							//date_of_birth

									'id_255101' => $this->request["financial_1_1"],
									'id_255102' => $this->request["financial_1_2"],
									'id_255103' => $this->request["financial_2_1"],
									'id_255104' => $this->request["financial_2_2"],
									'id_255105' => $this->request["financial_3_1"],
									'id_255106' => $this->request["financial_3_2"],
									'id_255107' => $this->request["financial_4_1"],
									'id_255108' => $this->request["financial_4_2"],
									'id_255109' => $this->request["financial_5_1"],
									'id_255110' => $this->request["financial_6_1"],

									'id_255201' => $this->request["organization"]['size'],
									'id_255202' => $this->request["organization_overview"],
									'id_255203' => $this->request["organization_services"],

									'id_255204' => $this->request["organization"]['domestic'],
									'id_255205' => $this->request["organization"]['international'],

									'id_255301' => $this->request['case_study_1'],
									'id_255302' => $this->request['case_study_2'],
									'id_255303' => $this->request['case_study_3'],

									'id_255601' => $this->request['alt_category_id'],
									'id_255602' => $this->request['case_study_individual'],

									'status' =>  4,
								];

								if ($f) {
									$response = $this->_document_uploads($_FILES, $category_id, $application_id);

									$data['id_255401'] =  $response[0];
									$data['id_255402'] =  $response[1];
									$data['id_255403'] =  $response[2];
									$data['id_255404'] =  $response[3];
									$data['id_255405'] =  $response[4];
								}

								// Sanitize $data Array for DB Insert
								foreach ($data as $key => $value) {
									# code...
									if ($value == "" || $value == null) {
										unset($data[$key]);
									}
								}


								$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
								if ($rows == 0) {
									redirect($this->request['referrer'] . '?stage=' . $stage);
								} else {
									redirect('nomination/' . $application_id . '?stage=' . ++$stage);
								}
								break;
							case 6:		# ☑ Alternating Application, Success & Email Send
								/* Change Application Status */

								$this->request = $this->input->post();
								$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];


								/**
								 * Duplicate Application Data for Individual Category
								 * ===================================
								 * 		Application Data
								 * 		Uploads Data
								 */

								/**
								 * ☑ Send Email Functionality
								 */
								$email_data['application'] = $application;
								$email_data['application']['category']['name'] = $category['name'];
								$email_data['applicant'] = [
									'name' => $this->usersession['name'],
									'email' => $this->usersession['email'],
									'contact' => $this->usersession['contact'],
								];
								$this->load->model('panel/AgentModel');
								$agents = json_decode($this->AgentModel->get(), true);

								foreach ($agents as $key => $agent) {
								}
								$data = [
									// 'is_idfc_customer' => $this->request['is_idfc_customer'],
									// 'agent_referral' => $this->request['agent_referrer'],
									// 'agent_name' => $this->request['agent_name'],
									'created_at' => date('Y-m-d H:i:s'),
									'status' => 3
								];

								if ($this->request['last_winner']['status'] == 'yes') {
									$data['id_255603'] = $this->request['last_winner']['year'];
									$data['id_255604'] = $this->request['last_winner']['category'];
								}

								$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
								if ($rows > 0) {
									$recipients = [
										[
											"email" =>  $this->usersession['email'],
											"name" =>  $this->usersession['name']
										]
									];
									$subject = "Submission Received for " .  APP_NAME .  " Awards 2025";
									$body = "Hi " .  $this->usersession['name'] . ", your application [#" . $application_id . "] for " . $category['name'] . " is in review! Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
									$htmlbody = $this->load->view('panel/emails/participant_nomination_review', $email_data, true);
									if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
										redirect('my-nominations');
									}
								} else {
									redirect('nomination/' . $application_id . '?stage=' . $stage);
								}

								break;

							default:
								redirect('dashboard');
								break;
						}
						break;
				}
				break;
		}
	}

	/**
	 * bulk_edit
	 * 
	 * ### Description: 
	 * **Scope**: Applicant
	 * 
	 * To let the Applicant Edit the Unloocked Application & Lock again.
	 * 
	 * ### To Do:
	 *  - [x] Edit with all Data MSME
	 *  - [ ] Edit with all Data Individual
	 *  - [ ] Edit with all $_FILES MSME
	 *  - [ ] Edit with all $_FILES Individual
	 *  - [ ] Edit with any single $_FILES MSME
	 *  - [ ] Edit with any single $_FILES Individual
	 * @return void
	 */
	public function bulk_edit()
	{
		$this->request = $this->input->post();
		$this->load->model('event/awards/CategoryModel');
		$category_id = $this->request['category_id'];
		$c = explode("_", $category_id);
		$application_id = $this->request['application_id'];



		# ☑ Check if $_FILES Exists
		$f = 1;
		foreach ($_FILES as $key => $file) {
			if ($file['size'] == 0) {
				$f = 0;
				break;
			}
		}
		$data = [];
		$category = json_decode($this->CategoryModel->get(null, ['type' => $category_id]), true)[0];
		switch ($category['type']) {
			case '1_GLOBAL':
				$certifications = [];
				if (isset($this->request['organization']['certifications'])) {
					for ($i = 0; $i < count($this->request['organization']['certifications']); $i++) {
						if ($this->request['organization']['certifications'][$i] == 'Other') {
							$certifications[] = "Other - (" . $this->request['organization']['certifications_other'] . ")";
						} else {
							$certifications[] = $this->request['organization']['certifications'][$i];
						}
					}
				}
				$data = [
					'stage_status' => 6,

					"name" => 	$this->request['name'],
					"email" => $this->request['contact_person']['email'] ?? null,
					"designation" => 	$this->request['designation'],
					"organization_name" => 	$this->request['organization']['name'],
					"organization_url" => $this->request['organization']['url'],
					"organization_city" => $this->request['organization']['address']['city'],
					"organization_state" => $this->request['organization']['address']['state'],
					"id_255901" => $this->request['contact_person']['name'],
					"id_255902" => $this->request['contact_person']['email'],
					"id_255903" => $this->request['contact_person']['contact'],
					"created_by" => $this->usersession['id'],

					"id_255001" => json_encode([
						$this->request['organization']['address']['line_1'],
						$this->request['organization']['address']['line_2'],
						$this->request['organization']['address']['line_3'],
					]),
					'id_255000'	=> $this->request['organization']['industry'],
					'id_255002'	=> $this->request['organization']['inc_date'],
					'id_255003'	=> $this->request['organization']['segment'],
					'id_255004'	=> json_encode($this->request['partner']),
					'id_255005'	=> $this->request['organization']['ownership'],

					'id_255007'	=> $this->request['gender'],							//date_of_birth
					'id_255008'	=> $this->request['dob'],							//date_of_birth

					'id_255009'	=> $this->request['organization']['iec_code'],
					'id_255010'	=> $this->request['organization']['epc'],
					'id_255011'	=> json_encode($certifications),

					'id_255101' => $this->request["financial_1_2"],
					'id_255102' => $this->request["financial_1_1"],
					'id_255103' => $this->request["financial_2_2"],
					'id_255104' => $this->request["financial_2_1"],
					'id_255105' => $this->request["financial_3_2"],
					'id_255106' => $this->request["financial_3_1"],
					'id_255107' => $this->request["financial_4_2"],
					'id_255108' => $this->request["financial_4_1"],
					'id_255109' => $this->request["financial_5_1"],
					'id_255201' => $this->request["organization"]['size'],
					'id_255202' => $this->request["organization_overview"],
					'id_255203' => $this->request["organization_services"],
					'id_255204' => $this->request["organization"]['domestic'],
					'id_255205' => $this->request["organization"]['international'],
					'id_255206' => $this->request["organization"]['size_global'],
					'id_255207' => $this->request["organization_collaborations"],

					'id_255601' => $this->request['alt_category_id'],
					'id_255602' => $this->request['case_study_individual'],

					'id_255301' => $this->request['case_study_1'],
					'id_255302' => $this->request['case_study_2'],
					'id_255303' => $this->request['case_study_3'],
					'id_255304' => $this->request['case_study_4'],

					'status' =>  3,
				];
				# ☑ If $_FILES Exists then Upload and get $response.
				if ($f) {
					$response = $this->_document_uploads($_FILES, $category_id, $application_id);
					$data['id_255401'] = $response[0];
					$data['id_255402'] = $response[1];
					$data['id_255403'] = $response[2];
					$data['id_255404'] = $response[3];
					$data['id_255405'] = $response[4];
				}
				break;
			case '1_FAMILY':
				$data = [
					'stage_status' => 6,

					"name" => 	$this->request['name'],
					"email" => $this->request['contact_person']['email'] ?? null,
					"designation" => 	$this->request['designation'],
					"organization_name" => 	$this->request['organization']['name'],
					"organization_url" => $this->request['organization']['url'],
					"organization_city" => $this->request['organization']['address']['city'],
					"organization_state" => $this->request['organization']['address']['state'],

					"id_255901" => $this->request['contact_person']['name'],
					"id_255902" => $this->request['contact_person']['email'],
					"id_255903" => $this->request['contact_person']['contact'],

					"id_255001" => json_encode([
						$this->request['organization']['address']['line_1'],
						$this->request['organization']['address']['line_2'],
						$this->request['organization']['address']['line_3'],
					]),
					'id_255002'	=> $this->request['organization']['inc_date'],		//organization_inc_date
					'id_255003'	=> $this->request['organization']['segment'],		//organization_inc_date
					'id_255004'	=> $this->request['organization']['business'],		//organization_inc_date
					'id_255005'	=> $this->request['organization']['ownership'],		//organization_inc_date

					'id_255006'	=> $this->request['experience']['total'],			//organization_inc_date
					'id_255007'	=> $this->request['experience']['current'],			//organization_inc_date
					'id_255008'	=> $this->request['dob'],							//date_of_birth

					'id_255101' => $this->request["organization_revenue_2"],
					'id_255102' => $this->request["organization_revenue_1"],
					'id_255103' => $this->request["organization_growth_2"],
					'id_255104' => $this->request["organization_growth_1"],
					'id_255105' => $this->request["organization_profit"],

					'id_255106' => $this->request["organization_assets"],
					'id_255107' => $this->request["organization_der_23"],

					'id_255201' => $this->request["organization"]['size'],
					'id_255202' => $this->request["organization_overview"],
					'id_255203' => $this->request["organization_services"],
					'id_255204' => $this->request["organization"]['domestic'],
					'id_255205' => $this->request["organization"]['international'],
					'id_255206' => implode('-', [
						$this->request["organization"]['investment']['family'],
						$this->request["organization"]['investment']['investors'],
						$this->request["organization"]['investment']['others'],
					]),
					'id_255207' => $this->request["organization"]['generation'],

					'id_255301' => $this->request['case_study_1'],
					'id_255302' => $this->request['case_study_2'],
					'id_255303' => $this->request['case_study_3'],
					'id_255304' => $this->request['case_study_4'],
					'id_255305' => $this->request['case_study_5'],

					'status' =>  3,
				];
				# ☑ If $_FILES Exists then Upload and get $response.
				if ($f) {
					$response = $this->_document_uploads($_FILES, $category_id, $application_id);
					$data['id_255401'] = $response[0];
					$data['id_255402'] = $response[1];
					$data['id_255403'] = $response[2];
					$data['id_255404'] = $response[3];
					$data['id_255405'] = $response[4];
				}
				break;

			default:
				switch (explode('_', $category['type'])[1]) {
					case 'IDFC':

						break;
					default:
						# ☑ Set Data for DB Insert
						$data = [
							"name" => 	$this->request['name'],
							"email" => $this->request['contact_person']['email'] ?? null,
							"designation" => 	$this->request['designation'],
							"organization_name" => 	$this->request['organization']['name'],
							"organization_url" => $this->request['organization']['url'],
							"organization_city" => $this->request['organization']['address']['city'],
							"organization_state" => $this->request['organization']['address']['state'],
							"id_255901" => $this->request['contact_person']['name'],
							"id_255902" => $this->request['contact_person']['email'],
							"id_255903" => $this->request['contact_person']['contact'],

							"id_255001" => json_encode([
								$this->request['organization']['address']['line_1'],
								$this->request['organization']['address']['line_2'],
								$this->request['organization']['address']['line_3'],
							]),
							'id_255002'	=> $this->request['organization']['inc_date'],
							'id_255003'	=> $this->request['organization']['segment'],
							'id_255004'	=> json_encode($this->request['partner']),
							'id_255005'	=> $this->request['organization']['ownership'],

							'id_255007'	=> $this->request['gender'],							//date_of_birth
							'id_255008'	=> $this->request['dob'],							//date_of_birth

							'id_255101' => $this->request["financial_1_1"],
							'id_255102' => $this->request["financial_1_2"],
							'id_255103' => $this->request["financial_2_1"],
							'id_255104' => $this->request["financial_2_2"],
							'id_255105' => $this->request["financial_3_1"],
							'id_255106' => $this->request["financial_3_2"],
							'id_255107' => $this->request["financial_4_1"],
							'id_255108' => $this->request["financial_4_2"],
							'id_255109' => $this->request["financial_5_1"],
							'id_255110' => $this->request["financial_6_1"],

							'id_255201' => $this->request["organization"]['size'],
							'id_255202' => $this->request["organization_overview"],
							'id_255203' => $this->request["organization_services"],

							'id_255204' => $this->request["organization"]['domestic'],
							'id_255205' => $this->request["organization"]['international'],

							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],

							'id_255601' => $this->request['alt_category_id'],
							'id_255602' => $this->request['case_study_individual'],

							'status' =>  4,
						];

						# ☑ If $_FILES Exists then Upload and get $response.
						if ($f) {
							$response = $this->_document_uploads($_FILES, $category_id, $application_id);
							$data['id_255401'] = $response[0];
							$data['id_255402'] = $response[1];
							$data['id_255403'] = $response[2];
							$data['id_255404'] = $response[3];
							$data['id_255405'] = $response[4];
						}
						break;
				}
		}
		# ☑ Sanitize Data for DB Insert
		foreach ($data as $key => $value) {
			# code...
			if ($value == "" || $value == null) {
				unset($data[$key]);
			}
		}
		$data['stage_status'] = '5';
		$data['status'] = '3';

		# ☑ DB Insert
		$this->data = $data;
		$c = explode('_', $this->request['category_id']);

		$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id], strtolower($c[1]));
		if ($rows > 0) {
			redirect(base_url('my-nominations'));
		} else {
			redirect('nomination/' . $application_id . '/edit');
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
				$data = [
					'status' => '1',
				];

				$nomination = json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'organization_name', 'email', 'status', 'stage_status', 'created_by'], ['nomination_id' => $this->request['application_id']]), true)[0] ?? [];
				$applicant = json_decode($this->UserModel->get(null, ['id' => $nomination['created_by']]), true)[0];
				$category = json_decode($this->CategoryModel->get(['name'], ['type' => $nomination['category_id']]), true)[0];


				if ($this->EntriesModel->update($data, ['nomination_id' => $nomination['nomination_id']])) {
					$recipients = [
						[
							"email" =>  $applicant['email'],
							"name" =>  $applicant['name']
						]
					];
					$subject = "Congratulations! Your Entry for 'IDFC FIRST Bank Presents ET NOW Leaders of Tomorrow Awards' has Been qualified for the Grand Jury evaluation!";
					$body = "Hi " .  $applicant['name'] . ", your application [#" . $nomination['nomination_id'] . "] is Accepted! Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";

					$email_data['application'] = $nomination;
					$email_data['application']['category']['name'] = $category['name'];
					$email_data['applicant'] = [
						'name' => $applicant['name'],
						'email' => $applicant['email'],
						'contact' => $applicant['contact'],
					];
					$htmlbody = $this->load->view('panel/emails/participant_nomination_success', $email_data, true);
					$f = 0;
					if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
						$u = [
							'is_nominated' => 1
						];
						if ($this->UserModel->update($u, ['id' => $applicant['id']])) {
							redirect('nominations');
						}
					}
				}
				break;

			default:
				# code...
				break;
		}
	}

	public function reject_default_comment($application_id)
	{
		$this->load->model('panel/CommentModel');
		switch ($this->usersession['role']) {
			case 'jury':
			case 'admin':
			case 'super-admin':
				$data = [
					'comment' => "Rejected",
					'nomination_id' => $application_id,
					'created_by' => $this->usersession['id'],
				];

				$nomination = json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'organization_name', 'email', 'status', 'stage_status', 'created_by'], ['nomination_id' => $application_id]), true)[0] ?? [];
				$applicant = json_decode($this->UserModel->get(null, ['id' => $nomination['created_by']]), true)[0];
				$category = json_decode($this->CategoryModel->get(['name'], ['type' => $nomination['category_id']]), true)[0];
				$email_data['application'] = $nomination;
				$email_data['application']['category']['name'] = $category['name'];
				$email_data['applicant'] = [
					'name' => $applicant['name'],
					'email' => $applicant['email'],
					'contact' => $applicant['contact'],
				];
				if ($this->CommentModel->insert($data)) {
					$data = [
						'status' => '0',
					];
					if ($this->EntriesModel->update($data, ['nomination_id' => $application_id], strtolower(explode('_', $nomination['category_id'])[1]))) {
						$recipients = [
							[
								"email" =>  $applicant['email'],
								"name" =>  $applicant['name']
							]
						];

						$subject = "Thank You for Your Participation in " . APP_NAME . " Awards 2025!";
						$body = "Hi " .  $applicant['name'] . ", your application [#" . $nomination['nomination_id'] . "] is Rejected with comment - <br> " . $data['comment'] . "<br>Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
						$htmlbody = $this->load->view('panel/emails/participant_nomination_reject', $email_data, true);
						if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
							redirect('nominations');
						}
					}
				}
				break;
			default:
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
					'nomination_id' => $this->request['application_id'],
					'created_by' => $this->usersession['id'],
				];
				$nomination = json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'organization_name', 'email', 'status', 'stage_status', 'created_by'], ['nomination_id' => $this->request['application_id']]), true)[0] ?? [];
				$applicant = json_decode($this->UserModel->get(null, ['id' => $nomination['created_by']]), true)[0];
				$category = json_decode($this->CategoryModel->get(['name'], ['type' => $nomination['category_id']]), true)[0];

				$email_data['application'] = $nomination;
				$email_data['application']['category']['name'] = $category['name'];
				$email_data['applicant'] = [
					'name' => $applicant['name'],
					'email' => $applicant['email'],
					'contact' => $applicant['contact'],
				];
				if ($this->CommentModel->insert($data)) {
					$data = [
						'status' => '0',
					];
					if ($this->EntriesModel->update($data, ['nomination_id' => $this->request['application_id']], strtolower(explode('_', $nomination['category_id'])[1]))) {
						$recipients = [
							[
								"email" =>  $applicant['email'],
								"name" =>  $applicant['name']
							]
						];

						$subject = "Thank You for Your Participation in " . APP_NAME . " Awards 2025!";
						$body = "Hi " .  $applicant['name'] . ", your application [#" . $nomination['nomination_id'] . "] is Rejected with comment - <br> " . $data['comment'] . "<br>Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
						$htmlbody = $this->load->view('panel/emails/participant_nomination_reject', $email_data, true);
						if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
							redirect('nominations');
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
					'nomination_id' => $this->request['application_id'],
					'created_by' => $this->usersession['id'],
				];

				$nomination = json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'name', 'organization_name', 'email', 'status', 'stage_status', 'created_by'], ['nomination_id' => $this->request['application_id']]), true)[0] ?? [];
				$applicant = json_decode($this->UserModel->get(null, ['id' => $nomination['created_by']]), true)[0];
				$category = json_decode($this->CategoryModel->get(['name'], ['type' => $nomination['category_id']]), true)[0];

				$email_data['application'] = $nomination;
				$email_data['application']['category']['name'] = $category['name'];
				$email_data['applicant'] = [
					'name' => $applicant['name'],
					'email' => $applicant['email'],
					'contact' => $applicant['contact'],
				];

				if ($this->CommentModel->insert($data)) {
					$data = [
						'status' => '2',
						'stage_status' => '2'
					];
					if ($this->EntriesModel->update($data, ['nomination_id' => $this->request['application_id']], strtolower(explode('_', $nomination['category_id'])[1]))) {
						$recipients = [
							[
								"email" =>  $applicant['email'],
								"name" =>  $applicant['name']
							]
						];
						$subject = "Action Required - Update Your Submission for " . APP_NAME . " Awards 2025!";
						$body = "Hi " .  $applicant['name'] . ", your application [#" . $nomination['nomination_id'] . "] requires improvements. <br>Please check comments - <br> " . $data['comment'] . "<br>Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
						$htmlbody = $this->load->view('panel/emails/participant_nomination_update', $email_data, true);
						if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
							redirect('nominations');
						}
					}
				}
				break;
			default:
				break;
		}
	}

	public function download_docket()
	{
		// $this->load->library('pdflib/makedocket');
		// $this->makedocket->init('P', 'mm', 'A4')->load($data = null, 'stage_1_digital_1')->generate();


		// if($this->isPdfCompressed(FCPATH . "uploads/1736004999-20673/1736161690_E8zIUuSO_1735895661_IKW8HRBG_screenlot2.pdf")){
		if ($this->isPdfCompressed(FCPATH . "uploads/1736003081-51962/1736161690_E8zIUuSO_1735895661_IKW8HRBG_screenlot2.pdf")) {
			echo "Compressed!";
		} else {
			echo "Not Compressed!";
		}
	}
}

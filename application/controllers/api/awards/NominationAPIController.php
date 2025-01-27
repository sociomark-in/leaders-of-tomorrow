<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Clegginabox\PDFMerger\PDFMerger;

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

		$pdf = new PDFMerger;
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
			case '1_INDIVIDUAL':
				switch ($stage) {
					case 0: # ☑ Personal Information
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
							'id_255002'	=> $this->request['organization']['inc_date'],		//organization_inc_date
							'id_255003'	=> $this->request['organization']['segment'],		//organization_inc_date
							'id_255004'	=> $this->request['organization']['business'],		//organization_inc_date
							'id_255005'	=> $this->request['organization']['ownership'],		//organization_inc_date

							'id_255006'	=> $this->request['experience']['total'],			//organization_inc_date
							'id_255007'	=> $this->request['experience']['current'],			//organization_inc_date
							'id_255008'	=> $this->request['dob'],							//date_of_birth
						];
						$this->data['data'] = $data;

						if ($this->EntriesModel->insert($this->data['data'])) {
							redirect(base_url('dashboard/application/' . $application_id) . '?stage=' . ++$stage);
						};
						break;
					case 1: # ☑ Organization Details
						$data = [
							'id_255101' => $this->request["organization_revenue_2"],
							'id_255102' => $this->request["organization_revenue_1"],
							'id_255103' => $this->request["organization_growth_2"],
							'id_255104' => $this->request["organization_growth_1"],
							'id_255105' => $this->request["organization_profit"],
							'id_255106' => $this->request["organization_assets"],
							'id_255107' => $this->request["organization_der_23"],
							'id_255108' => $this->request["organization_involvement"],

							'id_255201' => $this->request["organization"]["reach"],
							'id_255202' => $this->request["organization"]['size'],
							'id_255203' => $this->request["organization_overview"],
							'id_255204' => $this->request["organization_services"],
							'id_255205' => $this->request["organization"]['beneficiary'],
							'id_255206' => $this->request["organization"]['community_impact'],
							'id_255207' => $this->request["organization"]['investment'],
							'id_255208' => $this->request["organization"]['regions'],

							'stage_status' => $s
						];
						// echo "<pre>";
						// print_r($data);die;
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

					case 3: # ☑ Case Studies II
						$data = [
							'id_255304' => $this->request['case_study_4'],
							'id_255305' => $this->request['case_study_5'],

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
							];
							$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
							if ($rows == 0) {
								redirect($this->request['referrer'] . '?stage=' . $stage);
							} else {
								redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
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

						if ($f) {
							$response = $this->_document_uploads($_FILES, $category_id, $application_id);
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
							'id_255108' => $this->request["organization_involvement"],

							'id_255201' => $this->request["organization"]["reach"],
							'id_255202' => $this->request["organization"]['size'],
							'id_255203' => $this->request["organization_overview"],
							'id_255204' => $this->request["organization_services"],
							'id_255205' => $this->request["organization"]['beneficiary'],
							'id_255206' => $this->request["organization"]['community_impact'],
							'id_255207' => $this->request["organization"]['investment'],
							'id_255208' => $this->request["organization"]['regions'],

							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],
							'id_255304' => $this->request['case_study_4'],
							'id_255305' => $this->request['case_study_5'],

							'id_255401' =>  $response[0],
							'id_255402' =>  $response[1],
							'id_255403' =>  $response[2],
							'id_255404' =>  $response[3],
							'id_255405' =>  $response[4],

							'id_255401' =>  $response[0],
							'id_255402' =>  $response[1],
							'id_255403' =>  $response[2],
							'id_255404' =>  $response[3],
							'id_255405' =>  $response[4],
							'id_255406' =>  $response[5],

							'status' =>  3,
						];

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
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
						break;
					case 6:	# ☑ Success & Email Send
						$this->request = $this->input->post();

						$email_data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];
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
							'is_idfc_customer' => $this->request['is_idfc_customer'],
							'agent_referral' => $this->request['agent_referrer'],
							'status' => '3'
						];

						if ($this->request['agent_referrer'] == 'yes') {
							# code...
							switch ($this->request['agent_name']) {
								case 'Nilam':
									$agent_code = '1595014714';
									break;

								default:
									$agent_code = '5167681127';
									# code...
									break;
							}
							$data['agent_name'] = $agent_code;
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
								redirect('dashboard/my-applications');
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . $stage);
						}

						break;
					default:
						# code...
						break;
				}
				break;
			case '2_INDIVIDUAL':
				switch ($stage) {
					case 0: # ☑ Personal Information
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
							'id_255002'	=> $this->request['organization']['inc_date'],		//organization_inc_date
							'id_255003'	=> $this->request['organization']['segment'],		//organization_inc_date
							'id_255004'	=> $this->request['organization']['business'],		//organization_inc_date
							'id_255005'	=> $this->request['organization']['ownership'],		//organization_inc_date

							'id_255006'	=> $this->request['experience']['total'],			//organization_inc_date
							'id_255007'	=> $this->request['experience']['current'],			//organization_inc_date
							'id_255008'	=> $this->request['dob'],							//date_of_birth
						];
						$this->data['data'] = $data;

						if ($this->EntriesModel->insert($this->data['data'])) {
							redirect(base_url('dashboard/application/' . $application_id) . '?stage=' . ++$stage);
						};
						break;
					case 1: # ☑ Organization Details
						$data = [
							'id_255101' => $this->request["organization_revenue_2"],
							'id_255102' => $this->request["organization_revenue_1"],
							'id_255103' => $this->request["organization_growth_2"],
							'id_255104' => $this->request["organization_growth_1"],
							'id_255105' => $this->request["organization_profit"],
							'id_255106' => $this->request["organization_assets"],
							'id_255107' => $this->request["organization_ratio"],
							'id_255108' => $this->request["organization_involvement"],

							'id_255201' => $this->request["organization"]["reach"],
							'id_255202' => $this->request["organization"]['size'],
							'id_255203' => $this->request["organization_overview"],
							'id_255204' => $this->request["organization_services"],

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

					case 3: # ☑ Case Studies II
						$data = [
							'id_255304' => $this->request['case_study_4'],
							'id_255305' => $this->request['case_study_5'],

							'stage_status' => $s,
						];
						// echo "<pre>";
						// print_r($data);
						// die;
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
							];
							$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
							if ($rows == 0) {
								redirect($this->request['referrer'] . '?stage=' . $stage);
							} else {
								redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
						break;

					case 5: # ☑ Review Application
						/* Change Application Status */

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
							'id_255107' => $this->request["organization_ratio"],
							'id_255108' => $this->request["organization_involvement"],

							'id_255201' => $this->request["organization"]["reach"],
							'id_255202' => $this->request["organization"]['size'],
							'id_255203' => $this->request["organization_overview"],
							'id_255204' => $this->request["organization_services"],

							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],
							'id_255304' => $this->request['case_study_4'],
							'id_255305' => $this->request['case_study_5'],

							'id_255401' =>  $response[0],
							'id_255402' =>  $response[1],
							'id_255403' =>  $response[2],
							'id_255404' =>  $response[3],
							'id_255405' =>  $response[4],
							'id_255406' =>  $response[5],

							'status' =>  3,
						];

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
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
						break;
					case 6:	# ☑ Success & Email Send
						$this->request = $this->input->post();

						$email_data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];
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
							'is_idfc_customer' => $this->request['is_idfc_customer'],
							'agent_referral' => $this->request['agent_referrer'],
							'status' => '3'
						];

						if ($this->request['agent_referrer'] == 'yes') {
							# code...
							switch ($this->request['agent_name']) {
								case 'Nilam':
									$agent_code = '1595014714';
									break;

								default:
									$agent_code = '5167681127';
									# code...
									break;
							}
							$data['agent_name'] = $agent_code;
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
								redirect('dashboard/my-applications');
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . $stage);
						}

						break;
					default:
						# code...
						break;
				}
				break;
			case '1_GLOBAL':
				switch ($stage) {
					case 0: # ☑ Personal Information
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
							'id_255002'	=> $this->request['organization']['inc_date'],		//organization_inc_date
							'id_255003'	=> $this->request['organization']['segment'],		//organization_inc_date
							'id_255004'	=> $this->request['organization']['business'],		//organization_inc_date
							'id_255005'	=> $this->request['organization']['ownership'],		//organization_inc_date

							'id_255006'	=> $this->request['experience']['total'],			//organization_inc_date
							'id_255007'	=> $this->request['experience']['current'],			//organization_inc_date
							'id_255008'	=> $this->request['dob'],							//date_of_birth
						];
						$this->data['data'] = $data;

						if ($this->EntriesModel->insert($this->data['data'])) {
							redirect(base_url('dashboard/application/' . $application_id) . '?stage=' . ++$stage);
						};
						break;
					case 1: # ☑ Organization Details
						$data = [
							'id_255101' => $this->request["organization_revenue_2"],
							'id_255102' => $this->request["organization_revenue_1"],
							'id_255103' => $this->request["organization_growth_2"],
							'id_255104' => $this->request["organization_growth_1"],
							'id_255105' => $this->request["organization_profit"],

							'id_255201' => $this->request["organization"]['size'],
							'id_255202' => $this->request["organization"]['global_size'],
							'id_255203' => $this->request["organization_presence"],
							'id_255204' => $this->request["organization_operation"],
							'id_255205' => $this->request["organization_collabs"],
							'id_255206' => $this->request["organization_expansion"],
							'id_255207' => $this->request["organization_overview"],
							'id_255208' => $this->request["organization_services"],
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

							'stage_status' => $s,
						];
						$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect($this->request['referrer'] . '?stage=' . ++$stage);
						}
						break;

					case 3: # ☑ Case Studies II
						$data = [
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
								redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
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

						if ($f) {
							$response = $this->_document_uploads($_FILES, $category_id, $application_id);
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

							'id_255201' => $this->request["organization"]['size'],
							'id_255202' => $this->request["organization"]['global_size'],
							'id_255203' => $this->request["organization_presence"],
							'id_255204' => $this->request["organization_operation"],
							'id_255205' => $this->request["organization_collabs"],
							'id_255206' => $this->request["organization_expansion"],
							'id_255207' => $this->request["organization_overview"],
							'id_255208' => $this->request["organization_services"],

							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],
							'id_255304' => $this->request['case_study_4'],

							'id_255401' =>  $response[0],
							'id_255402' =>  $response[1],
							'id_255403' =>  $response[2],
							'id_255404' =>  $response[3],
							'id_255405' =>  $response[4],

							'status' =>  3,
						];

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
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
						break;
					case 6:	# ☑ Success & Email Send
						$this->request = $this->input->post();

						$email_data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];
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
							'is_idfc_customer' => $this->request['is_idfc_customer'],
							'agent_referral' => $this->request['agent_referrer'],
							'status' => '3'
						];

						if ($this->request['agent_referrer'] == 'yes') {
							# code...
							switch ($this->request['agent_name']) {
								case 'Nilam':
									$agent_code = '1595014714';
									break;

								default:
									$agent_code = '5167681127';
									# code...
									break;
							}
							$data['agent_name'] = $agent_code;
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
								redirect('dashboard/my-applications');
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . $stage);
						}

						break;
					default:
						# code...
						break;
				}
				break;
			case '1_FAMILY':
				switch ($stage) {
					case 0: # ☑ Personal Information
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
							'id_255002'	=> $this->request['organization']['inc_date'],		//organization_inc_date
							'id_255003'	=> $this->request['organization']['segment'],		//organization_inc_date
							'id_255004'	=> $this->request['organization']['business'],		//organization_inc_date
							'id_255005'	=> $this->request['organization']['ownership'],		//organization_inc_date

							'id_255006'	=> $this->request['experience']['total'],			//organization_inc_date
							'id_255007'	=> $this->request['experience']['current'],			//organization_inc_date
							'id_255008'	=> $this->request['dob'],							//date_of_birth
						];
						$this->data['data'] = $data;

						if ($this->EntriesModel->insert($this->data['data'])) {
							redirect(base_url('dashboard/application/' . $application_id) . '?stage=' . ++$stage);
						};
						break;
					case 1: # ☑ Organization Details
						$data = [
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
							'id_255204' => $this->request["organization"]['beneficiary'],
							'id_255205' => $this->request["organization"]['members'],
							'id_255206' => implode('-', [
								$this->request["organization"]['investment']['family'],
								$this->request["organization"]['investment']['investors'],
								$this->request["organization"]['investment']['others'],
							]),
							'id_255207' => $this->request["organization"]['generation'],

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

							'stage_status' => $s,
						];
						$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect($this->request['referrer'] . '?stage=' . ++$stage);
						}
						break;

					case 3: # ☑ Case Studies II
						$data = [
							'id_255303' => $this->request['case_study_3'],
							'id_255304' => $this->request['case_study_4'],
							'id_255305' => $this->request['case_study_5'],

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
								'id_255405' =>  $response[4],
							];
							$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
							if ($rows == 0) {
								redirect($this->request['referrer'] . '?stage=' . $stage);
							} else {
								redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
						break;

					case 5: # ☑ Review Application
						/* Change Application Status */

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
							'id_255204' => $this->request["organization"]['beneficiary'],
							'id_255205' => $this->request["organization"]['members'],
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

							'id_255401' =>  $response[0],
							'id_255402' =>  $response[1],
							'id_255403' =>  $response[2],
							'id_255404' =>  $response[3],
							'id_255405' =>  $response[4],

							'status' =>  3,
						];

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
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
						break;
					case 6:	# ☑ Success & Email Send
						$this->request = $this->input->post();

						$email_data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];
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
							'is_idfc_customer' => $this->request['is_idfc_customer'],
							'agent_referral' => $this->request['agent_referrer'],
							'status' => '3'
						];

						if ($this->request['agent_referrer'] == 'yes') {
							# code...
							switch ($this->request['agent_name']) {
								case 'Nilam':
									$agent_code = '1595014714';
									break;

								default:
									$agent_code = '5167681127';
									# code...
									break;
							}
							$data['agent_name'] = $agent_code;
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
								redirect('dashboard/my-applications');
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . $stage);
						}

						break;
					default:
						# code...
						break;
				}
				break;
			case '1_DIGITAL':
				switch ($stage) {
					case 0: # ☑ Personal Information
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
							'id_255002'	=> $this->request['organization']['inc_date'],		//organization_inc_date
							'id_255003'	=> $this->request['organization']['segment'],		//organization_inc_date
							'id_255004'	=> $this->request['organization']['business'],		//organization_inc_date
							'id_255005'	=> $this->request['organization']['ownership'],		//organization_inc_date

							'id_255006'	=> $this->request['experience']['total'],			//organization_inc_date
							'id_255007'	=> $this->request['experience']['current'],			//organization_inc_date
							'id_255008'	=> $this->request['dob'],							//date_of_birth
						];
						$this->data['data'] = $data;

						if ($this->EntriesModel->insert($this->data['data'])) {
							redirect(base_url('dashboard/application/' . $application_id) . '?stage=' . ++$stage);
						};
						break;
					case 1: # ☑ Organization Details
						$data = [
							'id_255101' => $this->request["organization_revenue_2"],
							'id_255102' => $this->request["organization_revenue_1"],
							'id_255103' => $this->request["organization_growth_2"],
							'id_255104' => $this->request["organization_growth_1"],
							'id_255105' => $this->request["organization_profit"],
							'id_255106' => $this->request["organization_assets"],
							'id_255107' => $this->request["organization_der_23"],

							'id_255201' => $this->request["organization"]['size'],
							'id_255202' => $this->request["organization"]['process'],
							'id_255203' => $this->request["organization"]['adoption'],
							'id_255204' => $this->request["organization_overview"],
							'id_255205' => $this->request["organization_services"],

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

							'stage_status' => $s,
						];
						$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect($this->request['referrer'] . '?stage=' . ++$stage);
						}
						break;

					case 3: # ☑ Case Studies II
						$data = [
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
								redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
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

						if ($f) {
							$response = $this->_document_uploads($_FILES, $category_id, $application_id);
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
							'id_255202' => $this->request["organization"]['process'],
							'id_255203' => $this->request["organization"]['adoption'],
							'id_255204' => $this->request["organization_overview"],
							'id_255205' => $this->request["organization_services"],

							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],
							'id_255304' => $this->request['case_study_4'],

							'id_255401' =>  $response[0],
							'id_255402' =>  $response[1],
							'id_255403' =>  $response[2],
							'id_255404' =>  $response[3],
							'id_255405' =>  $response[4],

							'status' =>  3,
						];

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
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
						break;
					case 6:	# ☑ Success & Email Send
						$this->request = $this->input->post();

						$email_data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];
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
							'is_idfc_customer' => $this->request['is_idfc_customer'],
							'agent_referral' => $this->request['agent_referrer'],
							'status' => '3'
						];

						if ($this->request['agent_referrer'] == 'yes') {
							# code...
							switch ($this->request['agent_name']) {
								case 'Nilam':
									$agent_code = '1595014714';
									break;

								default:
									$agent_code = '5167681127';
									# code...
									break;
							}
							$data['agent_name'] = $agent_code;
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
								redirect('dashboard/my-applications');
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . $stage);
						}

						break;

					default:
						# code...
						break;
				}
				break;

			default:
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
							'id_255002'	=> $this->request['organization']['inc_date'],		//organization_inc_date
							'id_255003'	=> $this->request['organization']['segment'],		//organization_inc_date
							'id_255004'	=> $this->request['organization']['business'],		//organization_inc_date
							'id_255005'	=> $this->request['organization']['ownership'],		//organization_inc_date

							'id_255006'	=> $this->request['experience']['total'],			//organization_inc_date
							'id_255007'	=> $this->request['experience']['current'],			//organization_inc_date
							'id_255008'	=> $this->request['dob'],							//date_of_birth
						];
						$this->data['data'] = $data;

						if ($this->EntriesModel->insert($this->data['data'])) {
							redirect(base_url('dashboard/application/' . $application_id) . '?stage=' . ++$stage);
						};
						break;
					case 1: 	# ☑ Organization Details							
						$data = [
							'id_255101' => $this->request["organization_revenue_2"],
							'id_255102' => $this->request["organization_revenue_1"],
							'id_255103' => $this->request["organization_growth_2"],
							'id_255104' => $this->request["organization_growth_1"],
							'id_255105' => $this->request["organization_profit"],
							'id_255106' => $this->request["organization_assets"],
							'id_255107' => $this->request["organization_der_23"],

							'id_255201' => $this->request["organization"]['size'],
							'id_255202' => $this->request["organization"]['members'],
							'id_255203' => $this->request["organization_overview"],
							'id_255204' => $this->request["organization_services"],

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
					case 3: 	# ☑ Case Studies II
						$data = [
							'id_255304' => $this->request['case_study_4'],
							'id_255305' => $this->request['case_study_5'],

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
								redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
						break;
					case 5:		# ☑ Review Application
						/* Change Application Status */

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
							'id_255202' => $this->request["organization"]['members'],
							'id_255203' => $this->request["organization_overview"],
							'id_255204' => $this->request["organization_services"],

							'id_255301' => $this->request['case_study_1'],
							'id_255302' => $this->request['case_study_2'],
							'id_255303' => $this->request['case_study_3'],
							'id_255304' => $this->request['case_study_4'],
							'id_255305' => $this->request['case_study_5'],

							'id_255401' =>  $response[0],
							'id_255402' =>  $response[1],
							'id_255403' =>  $response[2],
							'id_255404' =>  $response[3],
							'id_255405' =>  $response[4],

							'status' =>  3,
						];

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
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
						break;
					case 6:		# ☑ Success & Email Send
						$this->request = $this->input->post();

						$email_data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];
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
							'is_idfc_customer' => $this->request['is_idfc_customer'],
							'agent_referral' => $this->request['agent_referrer'],
							'status' => '3'
						];

						if ($this->request['agent_referrer'] == 'yes') {
							# code...
							switch ($this->request['agent_name']) {
								case 'Nilam':
									$agent_code = '1595014714';
									break;

								default:
									$agent_code = '5167681127';
									# code...
									break;
							}
							$data['agent_name'] = $agent_code;
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
								redirect('dashboard/my-applications');
							}
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . $stage);
						}

						break;

					default:
						redirect('dashboard');
						break;
				}
				break;
		}
	}


	/**
	 * new_single
	 * 
	 * ### Description: 
	 * **Scope**: Applicant
	 * 
	 * To let the Applicant to apply to any category in the Awards
	 * ### To Do:
	 *  - [x] Insert stage-wise all Data MSME
	 *  - [x] Insert stage-wise all Data Individual
	 *  - [x] Back Traveling MSME
	 *  - [x] Back Traveling Individual
	 *  - [x] Email Hit after Submit MSME
	 *  - [x] Email Hit after Submit Individual
	 * @return void
	 */
	public function new_single()
	{
		/* Get Application Data */
		$this->load->helper('file');
		$this->load->helper('directory');

		$this->request = $this->input->post();

		$this->load->model('event/awards/CategoryModel');
		$stage = $this->input->post('stage') ?? 0;
		$category_id = $this->input->post('category_id');

		$c = explode("_", $category_id);
		if ($c[1] == 'Individual') {
			$category = json_decode($this->CategoryModel->get_individual(null, ['id' => $c[0]]), true)[0];
		} elseif ($c[1] == 'MSME') {
			$category = json_decode($this->CategoryModel->get_msme(null, ['id' => $c[0]]), true)[0];
		}

		$this->request['stage'] = $stage;

		$common = [
			"nomination_id" => $this->request['application_id'],
			"category_id" => implode('_', [$category['id'], $category['type']]),
			"organization_name" => 	$this->request['organization']['name'],
			"organization_url" => $this->request['organization']['website'],
			"linkedin_url" => $this->request['organization']['linkedin'],
			"stage_status" => $this->request['stage'],
			"status" => '4',
			"created_by" => $this->usersession['id'],
		];


		$application_id = $this->request['application_id'];
		$temp_application = $common;

		if ($stage == 6) {
			$this->session->unset_userdata('temp_application_session');
		} else {
			$temp_application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true);
			$this->session->set_userdata('temp_application_session', $temp_application);
		}
		if ($category['type'] == 'MSME') {
			switch ($stage) {
				case 0: 	# ☑ Personal Information
					$data = [
						"name" => $this->request['organization']['name'],
						"email" => $this->request['contact_person']['email'],
						'id_75501'	=> $this->request['organization']['size'],			//organization_maxsize
						'id_75504'	=> $this->request['organization']['website'],		//organization_address	
						'id_75505 ' => $this->request['organization']['segment'],		///organization_segment
						'id_75506'	=> $this->request['organization']['funding'],		//organization_funding	
						'id_75507'	=> $this->request['organization']['inc_date'],		//organization_inc_date
						'id_75534'	=> $this->request['contact_person']['name'],		//organization_inc_date
						'id_75535'	=> $this->request['contact_person']['email'],		//organization_inc_date
						'id_75536'	=> $this->request['contact_person']['contact'],		//organization_inc_date
					];
					$this->data['category'] =  $category;
					$this->data['data'] = array_merge($data, $common);

					if ($this->EntriesModel->insert($this->data['data'])) {
						// $this->session->set_userdata('application_stage', ++$stage);
						// redirect($this->request['referrer'] . '?stage=' . ++$stage);
						redirect(base_url('dashboard/application/' . $application_id) . '?stage=' . ++$stage);
					};
					break;
				case 1: 	# ☑ Organization Details				
					$data = [
						'id_75502'	=> $this->request['organization_industry'],					//organization_industry
						'id_75503'	=> $this->request['organization_overview'],					//organization_overview	
						'id_75508'	=> $this->request['organization_mission_vision'],			//organization_mission_vision	
						'id_75509'	=> $this->request['organization_services'],					//organization_services	
						'id_75510'	=> $this->request['organization_revenue_23'],				//organization_revenue	
						'id_75511'	=> $this->request['organization_revenue_22'],				//organization_revenue	
						'id_75512'	=> $this->request['organization_growth_23'],				//organization_growth	
						'id_75513'	=> $this->request['organization_growth_22'],				//organization_growth	
						'id_75514'	=> $this->request['organization_profit_23'],				//organization_profit	
						'id_75515'	=> $this->request['organization_profit_22'],				//organization_profit	
						'id_75516'	=> $this->request['organization_assets_23'],				//organization_assets	
						'id_75517'	=> $this->request['organization_assets_22'],				//organization_assets	
						'id_75518'	=> $this->request['organization_der_23'],					//organization_der	
						'id_75519'	=> $this->request['organization_der_22'],					//organization_der
					];

					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case 2: 	# ☑ Case Studies I

					$category_id = explode('_', $this->request['category_id']);
					$data = [
						'id_75520'	=> $this->request['initiative_name'],
						'id_75521'	=> $this->request['initiative_start_date'],
						'id_75522'	=> $this->request['initiative_end_date'],
						'id_75523'	=> $this->request['initiative_desc'],
						'id_75524'	=> $this->request['initiative_challenges'],
						'id_75525'	=> $this->request['initiative_strategy'],
						'stage_status' => $stage
					];

					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case 3: 	# ☑ Case Studies II

					$category_id = explode('_', $this->request['category_id']);
					$data = [
						'id_75526'	=> $this->request['initiative_tech'],
						'id_75527'	=> $this->request['initiative_impact'],
						'id_75528'	=> $this->request['initiative_scalability'],
						'id_75529'	=> $this->request['initiative_info'],
						'stage_status' => $stage
					];

					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id]);
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case 4:	# ☑ Upload Files
					/* Get Application Data */

					$c = explode('_', $this->input->post('category_id'));

					$f = 1;
					foreach ($_FILES as $key => $file) {
						if ($file['size'] == 0) {
							$f = 0;
							break;
						}
					}
					if ($f) {
						$response = $this->_document_uploads($_FILES, $category_id, $application_id);
						$data['id_75530'] = $response[0];
						$data['id_75531'] = $response[1];
						$data['id_75532'] = $response[2];
						$data['id_75533'] = $response[3];
						$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id], strtolower($c[1]));
						if ($rows == 0) {
							redirect($this->request['referrer'] . '?stage=' . $stage);
						} else {
							redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
						}
					} else {
						redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
					}

					break;
				case 5:	# ☑ Review Application
					/* Change Application Status */

					$c = explode('_', $this->input->post('category_id'));
					$f = 1;
					foreach ($_FILES as $key => $file) {
						if ($file['size'] == 0) {
							$f = 0;
							break;
						}
					}
					$data = [
						'id_75502'	=> $this->request['organization']['industry'] ?? null,					//organization_industry
						'id_75503'	=> $this->request['organization']['overview'] ?? null,					//organization_overview	
						'id_75508'	=> $this->request['organization']['mission_stmt'] ?? null,			//organization_mission_vision	
						'id_75509'	=> $this->request['organization']['services_stmt'] ?? null,					//organization_services	
						'id_75510'	=> $this->request['organization']['revenue_23'] ?? null,				//organization_revenue	
						'id_75511'	=> $this->request['organization']['revenue_22'] ?? null,				//organization_revenue	
						'id_75512'	=> $this->request['organization']['growth_23'] ?? null,				//organization_growth	
						'id_75513'	=> $this->request['organization']['growth_22'] ?? null,				//organization_growth	
						'id_75514'	=> $this->request['organization']['profit_23'] ?? null,				//organization_profit	
						'id_75515'	=> $this->request['organization']['profit_22'] ?? null,				//organization_profit	
						'id_75516'	=> $this->request['organization']['assets_23'] ?? null,				//organization_assets	
						'id_75517'	=> $this->request['organization']['assets_22'] ?? null,				//organization_assets	
						'id_75518'	=> $this->request['organization']['der_23'] ?? null,					//organization_der	
						'id_75519'	=> $this->request['organization']['der_22'] ?? null,					//organization_der

						'id_75520'	=> $this->request['initiative']['name'] ?? null,
						'id_75521'	=> $this->request['initiative']['start_date'] ?? null,
						'id_75522'	=> $this->request['initiative']['end_date'] ?? null,
						'id_75523'	=> $this->request['initiative']['description'] ?? null,
						'id_75524'	=> $this->request['initiative']['challenges'] ?? null,
						'id_75525'	=> $this->request['initiative']['strategy'] ?? null,

						'id_75526'	=> $this->request['initiative']['technology'] ?? null,
						'id_75527'	=> $this->request['initiative']['impact'] ?? null,
						'id_75528'	=> $this->request['initiative']['scalability'] ?? null,
						'id_75529'	=> $this->request['initiative']['additional'] ?? null,
					];

					if ($f) {
						$response = $this->_document_uploads($_FILES, $category_id, $application_id);
						$data['id_75530'] = $response[0];
						$data['id_75531'] = $response[1];
						$data['id_75532'] = $response[2];
						$data['id_75533'] = $response[3];
					}

					$data['status'] = 3;
					$data['stage_status'] = 5;

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
						redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
					}
					break;
				case 6:	# ☑ Success & Email Send
					$this->request = $this->input->post();
					$data['application'] = json_decode($this->EntriesModel->get(null, ['nomination_id' => $application_id], strtolower($category['type'])), true)[0];
					$data['category'] = $category['name'];
					$data['applicant'] = [
						'name' => $this->usersession['name'],
						'email' => $this->usersession['email'],
						'contact' => $this->usersession['contact'],
					];

					$recipients = [
						[
							"email" =>  $this->usersession['email'],
							"name" =>  $this->usersession['name']
						]
					];
					$subject = "Submission Received for " .  APP_NAME .  " Awards 2025";
					$body = "Hi " .  $this->usersession['name'] . ", your application [#" . $application_id . "] for " . $category['name'] . " is in review! Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
					$htmlbody = $this->load->view('panel/emails/participant_nomination_review', $data, true);
					if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
						redirect('dashboard/my-applications');
					}
					break;
				default:
					redirect('dashboard');
					break;
			}
		} elseif ($category['type'] == 'Individual') {
			switch ($stage) {
				case '': 	# ☑ Personal Information
					# code...
					$data = [
						"name" => $this->request['applicant']['name'],
						"email" => $this->request['contact_person']['email'],
						'organization_url'	=> $this->request['organization']['website'],
						'linkedin_url'	=> $this->request['organization']['linkedin'],
						'id_74501'	=> $this->request['applicant']['dob'],
						'id_74502'	=> $this->request['applicant']['designation'],
						'id_74503'	=> $this->request['applicant']['experience'],
						'id_74504'	=> $this->request['organization']['size'],
						'id_74505 ' => $this->request['organization']['type'],
						'id_74506 ' => $this->request['organization']['segment'],
						'id_74507'	=> $this->request['organization']['inc_date'],
						'id_74508'	=> $this->request['organization']['experience'],
						"id_74529" => $this->request['contact_person']['name'],
						"id_74530" => $this->request['contact_person']['email'],
						"id_74531" => $this->request['contact_person']['contact'],
					];
					$this->data['category'] =  $category;
					$this->data['data'] = array_merge($data, $common);
					if ($this->EntriesModel->insert($this->data['data'])) {
						redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
					};
					break;
				case '1':	# ☑ Organization Details
					$category_id = explode('_', $this->request['category_id']);
					$data = [
						'id_74509'	=> $this->request['organization']['overview'],			//organization_overview	
						'id_74510'	=> $this->request['organization']['mission_stmt'],		//organization_mission_vision	
						'id_74511'	=> $this->request['organization']['services_stmt'],		//organization_services	
						'id_74512'	=> $this->request['finance']['turnover_24'],			//organization_reveue	
						'id_74513'	=> $this->request['finance']['turnover_23'],			//organization_reveue	
						'id_74514'	=> $this->request['finance']['growth_24'],				//organization_growth	
						'id_74515'	=> $this->request['finance']['growth_23'],				//organization_growth	
						'stage_status' => $stage
					];
					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id], 'individual');
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case '2':	# ☑ Case Studies I
					$category_id = explode('_', $this->request['category_id']);
					$data = [
						'id_74516'	=> $this->request['case_study_1'],
						'id_74517'	=> $this->request['case_study_2'] ?? null,
						'id_74518'	=> $this->request['case_study_3'],
						'id_74519'	=> $this->request['case_study_4'],
						'stage_status' => $stage
					];
					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id], 'individual');
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case '3':	# ☑ Case Studies II	
					$category_id = explode('_', $this->request['category_id']);
					$data = [
						'id_74520'	=> $this->request['case_study_5'],		//organization_mission_vision	
						'id_74521'	=> $this->request['case_study_6'],		//organization_services		
						'id_74522'	=> $this->request['case_study_7'],		//organization_services		
						'id_74523'	=> $this->request['case_study_8'],		//organization_services	
						'id_74524'	=> $this->request['case_study_9'],		//organization_services	
						'stage_status' => $stage
					];
					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $application_id], 'individual');
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case '4':	# ☑ Upload Files
					/* Get Application Data */

					$c = explode('_', $this->input->post('category_id'));
					$f = 1;
					foreach ($_FILES as $key => $file) {
						if ($file['size'] == 0) {
							$f = 0;
							break;
						}
					}
					if ($f) {
						$response = $this->_document_uploads($_FILES, $category_id, $application_id);
						$data['id_74525'] = $response[0];
						$data['id_74526'] = $response[1];
						$data['id_74527'] = $response[2];
						$data['id_74528'] = $response[3];
					}

					$data['stage_status'] = $stage;
					$rows = $this->EntriesModel->update($data, ['nomination_id' => $application_id], strtolower($c[1]));
					if ($rows == 0) {
						redirect('dashboard/application/' . $application_id . '?stage=' . $stage);
					} else {
						redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
					}
					break;
				case '5':	# ☑ Review Application

					$c = explode('_', $this->input->post('category_id'));
					$f = 1;
					foreach ($_FILES as $key => $file) {
						if ($file['size'] == 0) {
							$f = 0;
							break;
						}
					}

					$data = [
						'id_74509'	=> $this->request['organization']['overview'] ?? null,
						'id_74510'	=> $this->request['organization']['mission_stmt'] ?? null,
						'id_74511'	=> $this->request['organization']['services_stmt'] ?? null,
						'id_74512'	=> $this->request['finance']['turnover_24'] ?? null,
						'id_74513'	=> $this->request['finance']['turnover_23'] ?? null,
						'id_74514'	=> $this->request['finance']['growth_24'] ?? null,
						'id_74515'	=> $this->request['finance']['growth_23'] ?? null,
						'id_74516'	=> $this->request['case_study_1'] ?? null,				//organization_growth	
						'id_74517'	=> $this->request['case_study_2'] ?? null,				//organization_profit	
						'id_74518'	=> $this->request['case_study_3'] ?? null,				//organization_profit	
						'id_74519'	=> $this->request['case_study_4'] ?? null,				//organization_assets	
						'id_74520'	=> $this->request['case_study_5'] ?? null,				//organization_assets	
						'id_74521'	=> $this->request['case_study_6'] ?? null,				//organization_der	
						'id_74522'	=> $this->request['case_study_7'] ?? null,				//organization_der
						'id_74523'	=> $this->request['case_study_8'] ?? null,
						'id_74524'	=> $this->request['case_study_9'] ?? null,
					];

					if ($f) {
						$response = $this->_document_uploads($_FILES, $category_id, $application_id);
						$data['id_74525'] = $response[0];
						$data['id_74526'] = $response[1];
						$data['id_74527'] = $response[2];
						$data['id_74528'] = $response[3];
					}

					$data['status'] = 3;
					$data['stage_status'] = 5;

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
						redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
					}
					die;
					/* Change Application Status */

					$c = explode('_', $this->input->post('category_id'));
					$f = 1;
					foreach ($_FILES as $key => $file) {
						if ($file['size'] == 0) {
							$f = 0;
							break;
						}
					}
					$data = [
						'id_74509'	=> $this->request['organization']['overview'],
						'id_74510'	=> $this->request['organization']['mission_stmt'],
						'id_74511'	=> $this->request['organization']['services_stmt'],
						'id_74512'	=> $this->request['finance']['turnover_24'],
						'id_74513'	=> $this->request['finance']['turnover_23'],
						'id_74514'	=> $this->request['finance']['growth_24'],
						'id_74515'	=> $this->request['finance']['growth_23'],
						'id_74516'	=> $this->request['case_study_1'],
						'id_74517'	=> $this->request['case_study_2'] ?? null,
						'id_74518'	=> $this->request['case_study_3'],
						'id_74519'	=> $this->request['case_study_4'],
						'id_74520'	=> $this->request['case_study_5'],
						'id_74521'	=> $this->request['case_study_6'],
						'id_74522'	=> $this->request['case_study_7'],
						'id_74523'	=> $this->request['case_study_8'],
						'id_74524'	=> $this->request['case_study_9'],
					];

					if ($f) {
						$response = $this->_document_uploads($_FILES, $category_id, $application_id);
						$data['id_74525'] = $response[0];
						$data['id_74526'] = $response[1];
						$data['id_74527'] = $response[2];
						$data['id_74528'] = $response[3];
					}

					$data['status'] = 3;
					$data['stage_status'] = 5;

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
						redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
					}
					break;
				case '6':	# ☑ Success & Email Send
					$this->request = $this->input->post();
					$data['application'] = json_decode($this->EntriesModel->get(['created_at'], ['nomination_id' => $application_id], strtolower($category['type'])), true);
					$data['category'] = $category['name'];
					$data['user'] = [
						'name' => $this->usersession['name'],
						'email' => $this->usersession['email'],
						'contact' => $this->usersession['contact'],
					];

					$recipients = [
						[
							"email" =>  $this->usersession['email'],
							"name" =>  $this->usersession['name']
						]
					];
					$subject = "Submission Received for " .  APP_NAME .  " Awards 2025";
					$body = "Hi " .  $this->usersession['name'] . ", your application [#" . $application_id . "] for " . $category['name'] . " is in review! Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
					if ($this->brevocurlmail->_init_()->config_plaintext(null, $recipients, $subject, $body)->send()) {
						redirect('dashboard');
					}
					break;
				default:
					redirect('dashboard');
					break;
			}
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
		if ($c[1] == 'MSME') {
			$category = json_decode($this->CategoryModel->get_msme(null, ['id' => $c[0]]), true);

			# ☑ Set Data for DB Insert
			$data = [
				'id_75502'	=> $this->request['organization']['industry'],					//organization_industry
				'id_75503'	=> $this->request['organization']['overview'],					//organization_overview	
				'id_75508'	=> $this->request['organization']['mission_stmt'],			//organization_mission_vision	
				'id_75509'	=> $this->request['organization']['services_stmt'],					//organization_services	
				'id_75510'	=> $this->request['organization']['revenue_23'],				//organization_revenue	
				'id_75511'	=> $this->request['organization']['revenue_22'],				//organization_revenue	
				'id_75512'	=> $this->request['organization']['growth_23'],				//organization_growth	
				'id_75513'	=> $this->request['organization']['growth_22'],				//organization_growth	
				'id_75514'	=> $this->request['organization']['profit_23'],				//organization_profit	
				'id_75515'	=> $this->request['organization']['profit_22'],				//organization_profit	
				'id_75516'	=> $this->request['organization']['assets_23'],				//organization_assets	
				'id_75517'	=> $this->request['organization']['assets_22'],				//organization_assets	
				'id_75518'	=> $this->request['organization']['der_23'],					//organization_der	
				'id_75519'	=> $this->request['organization']['der_22'],					//organization_der

				'id_75520'	=> $this->request['initiative']['name'],
				'id_75521'	=> $this->request['initiative']['start_date'],
				'id_75522'	=> $this->request['initiative']['end_date'],
				'id_75523'	=> $this->request['initiative']['description'],
				'id_75524'	=> $this->request['initiative']['challenges'],
				'id_75525'	=> $this->request['initiative']['strategy'],

				'id_75526'	=> $this->request['initiative']['technology'],
				'id_75527'	=> $this->request['initiative']['impact'],
				'id_75528'	=> $this->request['initiative']['scalability'],
				'id_75529'	=> $this->request['initiative']['additional'],
			];

			# ☑ If $_FILES Exists then Upload and get $response.
			if ($f) {
				$response = $this->_document_uploads($_FILES, $category_id, $application_id);
				$data['id_75530'] = $response[0];
				$data['id_75531'] = $response[1];
				$data['id_75532'] = $response[2];
				$data['id_75533'] = $response[3];
			}
		} elseif ($c[1] == "Individual") {
			$category = json_decode($this->CategoryModel->get_individual(null, ['id' => $c[0]]), true);

			# Set Data for DB Insert


			# ☑ If $_FILES Exists then Upload and get $response.
			if ($f) {
				$response = $this->_document_uploads($_FILES, $category_id, $application_id);
				$data['id_74525'] = $response[0];
				$data['id_74526'] = $response[1];
				$data['id_74527'] = $response[2];
				$data['id_74528'] = $response[3];
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
			redirect(base_url('dashboard/my-applications'));
		} else {
			redirect('dashboard/application/' . $application_id . '/edit');
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
					$subject = "Your Nomination Has Been Accepted - " . APP_NAME . " Awards 2025!";
					$body = "Hi " .  $applicant['name'] . ", your application [#" . $nomination['nomination_id'] . "] is Accepted! Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";

					$email_data['application'] = $nomination;
					$email_data['application']['category']['name'] = $category['name'];
					$email_data['applicant'] = [
						'name' => $applicant['name'],
						'email' => $applicant['email'],
						'contact' => $applicant['contact'],
					];
					$htmlbody = $this->load->view('panel/emails/participant_nomination_success', $email_data, true);
					if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
						redirect('dashboard/applications');
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

						$subject = "Update on Your Nomination - " . APP_NAME . " Awards 2025!";
						$body = "Hi " .  $applicant['name'] . ", your application [#" . $nomination['nomination_id'] . "] is Rejected with comment - <br> " . $data['comment'] . "<br>Please <a href=" . base_url('dashboard') . ">Visit Dashboard</a>";
						$htmlbody = $this->load->view('panel/emails/participant_nomination_reject', $email_data, true);
						if ($this->brevocurlmail->_init_()->config_email(null, $recipients, $subject, $htmlbody, $body)->send()) {
							redirect('dashboard/applications');
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
				$applicant = json_decode($this->UserModel->get(null, ['id'=> $nomination['created_by']]), true)[0];
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
							redirect('dashboard/applications');
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

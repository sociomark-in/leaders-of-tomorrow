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
	}

	public function new_single()
	{
		$this->request = $this->input->post();

		$this->load->model('event/awards/CategoryModel');
		$stage = $this->input->post('stage') ?? "0";
		$category_id = $this->input->post('category_id');

		$c = explode("_", $category_id);
		if ($c[1] == 'Individual') {
			$category = json_decode($this->CategoryModel->get_individual(null, ['id' => $c[0]]), true)[0];
		} elseif ($c[1] == 'MSME') {
			$category = json_decode($this->CategoryModel->get_msme(null, ['id' => $c[0]]), true)[0];
		}

		$this->request['stage'] = (int)$stage + 1;

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
		if ($category['type'] == 'MSME') {
			switch ($stage) {
				case '':
					# code...
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
						redirect(base_url('dashboard/application/' . $this->request['application_id']) . '?stage=' . ++$stage);
					};
					break;
				case '1':
					$nomination_id =  $this->request['application_id'];
					$data = [
						'id_75502'	=> $this->request['organization_industry'],					//organization_industry
						'id_75503'	=> $this->request['organization_overview'],					//organization_overview	
						'id_75508'	=> $this->request['organization_mission_vision'],			//organization_mission_vision	
						'id_75509'	=> $this->request['organization_services'],					//organization_services	
						'id_75510'	=> $this->request['organization_reveue_23'],				//organization_reveue	
						'id_75511'	=> $this->request['organization_reveue_22'],				//organization_reveue	
						'id_75512'	=> $this->request['organization_growth_23'],				//organization_growth	
						'id_75513'	=> $this->request['organization_growth_22'],				//organization_growth	
						'id_75514'	=> $this->request['organization_profit_23'],				//organization_profit	
						'id_75515'	=> $this->request['organization_profit_22'],				//organization_profit	
						'id_75516'	=> $this->request['organization_assets_23'],				//organization_assets	
						'id_75517'	=> $this->request['organization_assets_22'],				//organization_assets	
						'id_75518'	=> $this->request['organization_der_23'],					//organization_der	
						'id_75519'	=> $this->request['organization_der_22'],					//organization_der
					];
					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $nomination_id], 'msme');
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case '2':
					$nomination_id = $this->request['application_id'];
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
					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $nomination_id], 'msme');
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case '3':
					$nomination_id = $this->request['application_id'];
					$category_id = explode('_', $this->request['category_id']);
					$data = [
						'id_75526'	=> $this->request['initiative_tech'],
						'id_75527'	=> $this->request['initiative_impact'],
						'id_75528'	=> $this->request['initiative_scalability'],
						'id_75529'	=> $this->request['initiative_info'],
						'stage_status' => $stage
					];
					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $nomination_id], 'msme');
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case '4':
					/* Get Application Data */
					$application_id = $this->input->post('application_id');
					$c = explode('_', $this->input->post('category_id'));

					/* Change Application Status */

					/* Set Docket Name */
					$docket_name = FCPATH . 'uploads/dockets/' . $this->input->post('category_id') . '_' . $this->input->post('application_id') . '_' . time() . '.pdf';

					/* Set Uploads Config */
					$config['upload_path'] = FCPATH . 'uploads/' .  $application_id;
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '250';


					/* PDFMerger Docket File Exists Script */
					if (!file_exists(FCPATH . 'uploads/dockets/')) {
						mkdir(FCPATH . 'uploads/dockets/', 0777);
					}

					/* Document Upload Folder Exists Script */
					if (!file_exists($config['upload_path'])) {
						mkdir($config['upload_path'], 0777);
					}

					$update_data = [];

					$pdf = new PDFMerger;
					$i = 0;
					$r = random_string();
					$this->load->library('upload', $config);
					foreach ($_FILES as $key => $file) {
						$new_name = time() . "_" . $r . "_" . $file['name'];
						$config['file_name'] = $new_name;

						/* PDF Merger Script */
						$tmp = $file['tmp_name'];
						$pdf->addPDF($tmp);
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
							$update_data['id_7553' . $i] =  explode(FCPATH, $config['upload_path'])[1] . '/' . $this->upload->data('file_name');
							$i++;
						}
					}

					$update_data['status'] = 3;
					$update_data['stage_status'] = 5;
					$rows = $this->EntriesModel->update($update_data, ['nomination_id' => $application_id], strtolower($c[1]));


					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						/* PDF Merger Script */
						$pdf->merge('file', $docket_name, 'P');

						redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
					}
					break;
				case '5':
					# Success & Email Send
					break;
				default:
					break;
			}
		} elseif ($category['type'] == 'Individual') {
			switch ($stage) {
				case '':
					# code...
					$application_id = $this->input->post('application_id');
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
				case '1':
					$nomination_id = $this->request['application_id'];
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
					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $nomination_id], 'individual');
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case '2':
					$nomination_id = $this->request['application_id'];
					$category_id = explode('_', $this->request['category_id']);
					$data = [
						'id_74516'	=> $this->request['case_study_1'],
						'id_74518'	=> $this->request['case_study_3'],
						'id_74519'	=> $this->request['case_study_4'],
						'stage_status' => $stage
					];
					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $nomination_id], 'individual');
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case '3':
					$nomination_id = $this->request['application_id'];
					$category_id = explode('_', $this->request['category_id']);
					$data = [
						'id_74520'	=> $this->request['case_study_5'],		//organization_mission_vision	
						'id_74521'	=> $this->request['case_study_6'],		//organization_services		
						'id_74522'	=> $this->request['case_study_7'],		//organization_services		
						'id_74523'	=> $this->request['case_study_8'],		//organization_services	
						'id_74524'	=> $this->request['case_study_9'],		//organization_services	
						'stage_status' => $stage
					];
					$rows  = $this->EntriesModel->update($data, ['nomination_id' => $nomination_id], 'individual');
					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						redirect($this->request['referrer'] . '?stage=' . ++$stage);
					}
					break;
				case '4':
					/* Get Application Data */
					$application_id = $this->input->post('application_id');
					$c = explode('_', $this->input->post('category_id'));

					/* Change Application Status */

					/* Set Docket Name */
					$docket_name = FCPATH . 'uploads/dockets/' . $this->input->post('category_id') . '_' . $this->input->post('application_id') . '_' . time() . '.pdf';

					/* Set Uploads Config */
					$config['upload_path'] = FCPATH . 'uploads/' .  $application_id;
					$config['allowed_types'] = 'pdf';
					$config['max_size'] = '250';


					/* PDFMerger Docket File Exists Script */
					if (!file_exists(FCPATH . 'uploads/dockets/')) {
						mkdir(FCPATH . 'uploads/dockets/', 0777);
					}

					/* Document Upload Folder Exists Script */
					if (!file_exists($config['upload_path'])) {
						mkdir($config['upload_path'], 0777);
					}

					$update_data = [];

					$pdf = new PDFMerger;
					$i = 0;
					$c = [
						'id_74525',
						'id_74526',
						'id_74527',
						'id_74528',
					];
					$r = random_string();
					$this->load->library('upload', $config);
					foreach ($_FILES as $key => $file) {
						$new_name = time() . "_" . $r . "_" . $file['name'];
						$config['file_name'] = $new_name;

						/* PDF Merger Script */
						$tmp = $file['tmp_name'];
						$pdf->addPDF($tmp);
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
							$update_data[$c[$i]] =  base_url(explode(FCPATH, $config['upload_path'])[1] . '/' . $this->upload->data('file_name'));
							$i++;
						}
					}

					$update_data['status'] = 3;
					$update_data['stage_status'] = 4;
					$rows = $this->EntriesModel->update($update_data, ['nomination_id' => $application_id], strtolower($c[1]));


					if ($rows == 0) {
						redirect($this->request['referrer'] . '?stage=' . $stage);
					} else {
						/* PDF Merger Script */
						$pdf->merge('file', $docket_name, 'P');

						redirect('dashboard/application/' . $application_id . '?stage=' . ++$stage);
					}
					break;

				case '5':
					# Success & Email Send
					break;
				default:
					break;
			}
		}
	}

	public function new_bulk() {}

	public function bulk_edit()
	{
		$this->request = $this->input->post();
		$this->load->model('event/awards/CategoryModel');
		$category_id = $this->input->post('category_id');
		$category = array_merge(
			json_decode($this->CategoryModel->get_individual(null, ['code' => $category_id]), true),
			json_decode($this->CategoryModel->get_msme(null, ['code' => $category_id]), true)
		)[0];
		$application_id = $this->request['application_id'];
		$common = [];
		if ($category['type'] == 'MSME') {
			$data = [
				'id_75503'	=> $this->request['organization']['overview'],
				'id_75505 ' => $this->request['organization']['industry'],
				'id_75508'	=> $this->request['organization']['mission_stmt'],
				'id_75509'	=> $this->request['organization']['services_stmt'],
				'id_75520'	=> $this->request['initiative']['name'],
				'id_75521'	=> $this->request['initiative']['start_date'],
				'id_75522'	=> $this->request['initiative']['end_date'],
				'id_75523'	=> $this->request['initiative']['description'],
				'id_75524'	=> $this->request['initiative']['challenges'],
				'id_75525'	=> $this->request['initiative']['strategy'],
				'id_75526'	=> $this->request['initiative']['technology'],
				'id_75527'	=> $this->request['initiative']['impact'],
				'id_75528'	=> $this->request['initiative']['scalalbility'],
				'id_75529'	=> $this->request['initiative']['additional'],
				'status'	=> '3',
			];
		} elseif ($category['type'] == "Individual") {
		}

		$data['stage_status'] = '5';

		/* Set Docket Name */
		$docket_name = FCPATH . 'uploads/dockets/' . $this->input->post('category_id') . '_' . $this->input->post('application_id') . '_' . time() . '.pdf';

		/* Set Uploads Config */
		$config['upload_path'] = FCPATH . 'uploads/' .  $application_id;
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = '250';


		/* PDFMerger Docket File Exists Script */
		if (!file_exists(FCPATH . 'uploads/dockets/')) {
			mkdir(FCPATH . 'uploads/dockets/', 0777);
		}

		/* Document Upload Folder Exists Script */
		if (file_exists($config['upload_path'])) {
			rmdir($config['upload_path']);
			mkdir($config['upload_path'], 0777);
		}

		$update_data = [];

		$pdf = new PDFMerger;
		$i = 0;
		$c = [
			'id_75530',
			'id_75531',
			'id_75532',
			'id_75533',
		];
		$r = random_string();

		$this->load->library('upload', $config);
		foreach ($_FILES as $key => $file) {
			if ($file['size'] != 0) {
				$new_name = time() . "_" . $r . "_" . $file['name'];
				$config['file_name'] = $new_name;

				/* PDF Merger Script */
				$tmp = $file['tmp_name'];
				$pdf->addPDF($tmp);
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
					$update_data[$c[$i]] =  base_url(explode(FCPATH, $config['upload_path'])[1] . '/' . $this->upload->data('file_name'));
					$i++;
				}
				/* File Upload Script */
			}
		}

		$this->data = array_merge($data, $common, $update_data);
		if ($this->EntriesModel->update($this->data, ['nomination_id' => $application_id], strtolower($category['type']))) {
			redirect(base_url('dashboard/my-applications'));
		} else {
			echo "Failed";
			echo "<pre>";
			print_r($this->data);
		}
	}

	public function accept()
	{
		$this->load->model('panel/CommentModel');
		$this->request = $this->input->post();

		if ($this->usersession['role'] == 'jury') {
			$data = [
				'status' => '1',
			];
			$nomination = array_merge(
				json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'email', 'status', 'stage_status'], ['nomination_id' => $this->request['application_id']], 'individual'), true)[0] ?? [],
				json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'email', 'status', 'stage_status'], ['nomination_id' => $this->request['application_id']], 'msme'), true)[0],
			);
			if ($this->EntriesModel->update($data, ['nomination_id' => $this->request['application_id']], strtolower(explode('_', $nomination['category_id'])[1]))) {
				redirect('dashboard/applications');
			}
		}
	}

	public function download_docket()
	{
		$this->request = $this->input->post();
		$application = $this->EntriesModel->get(null, ['nomination_id' => $this->request['application_id']], strtolower(explode('_', $category['name'])[1]));
		$this->load->library('pdflib/makepdf');
		$this->makepdf->init('P', 'mm', 'A4')->load('layout-2', $data = null)->generate();
	}

	public function comment_and_reject()
	{
		$this->load->model('panel/CommentModel');
		$this->request = $this->input->post();

		if ($this->usersession['role'] == 'jury') {
			$data = [
				'comment' => $this->request['comment'],
				'nomination_id' => $this->request['application_id'],
				'created_by' => $this->usersession['id'],
			];
			if ($this->CommentModel->insert($data)) {
				$data = [
					'status' => '0',
				];
				$nomination = array_merge(
					json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'email', 'status', 'stage_status'], ['nomination_id' => $this->request['application_id']], 'individual'), true)[0] ?? [],
					json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'email', 'status', 'stage_status'], ['nomination_id' => $this->request['application_id']], 'msme'), true)[0],
				);
				if ($this->EntriesModel->update($data, ['nomination_id' => $this->request['application_id']], strtolower(explode('_', $nomination['category_id'])[1]))) {
					redirect('dashboard/applications');
				}
			}
		}
	}
	public function comment_and_unlock()
	{
		$this->load->model('panel/CommentModel');
		$this->request = $this->input->post();

		if ($this->usersession['role'] == 'jury') {
			$data = [
				'comment' => $this->request['comment'],
				'nomination_id' => $this->request['application_id'],
				'created_by' => $this->usersession['id'],
			];
			if ($this->CommentModel->insert($data)) {
				$data = [
					'status' => '2',
					'stage_status' => '2'
				];
				$nomination = array_merge(
					json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'email', 'status', 'stage_status'], ['nomination_id' => $this->request['application_id']], 'individual'), true)[0] ?? [],
					json_decode($this->EntriesModel->get(['nomination_id', 'category_id', 'email', 'status', 'stage_status'], ['nomination_id' => $this->request['application_id']], 'msme'), true)[0] ?? [],
				);
				if ($this->EntriesModel->update($data, ['nomination_id' => $this->request['application_id']], strtolower(explode('_', $nomination['category_id'])[1]))) {
					redirect('dashboard/applications');
				}
			}
		}
	}
}

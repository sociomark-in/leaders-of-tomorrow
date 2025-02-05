<?php

defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/PanelController.php";
require_once APPPATH . "vendor/autoload.php";

class PresentationsController extends PanelController
{
	public $user_session;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event/awards/CategoryModel');
		$this->load->model('panel/EntriesModel');
		$this->load->model('panel/AgentModel');
		$this->user_session = $_SESSION['awards_panel_user'];
	}

	public function index()
	{
		$presentations = [];
		switch ($this->user_session['role']) {
			case 'participant':

				$this->load->panel_view('presentations/home', $this->data);
				# code...
				break;
			case 'jury':
			case 'admin':
			case 'super-admin':
				$this->data['all_applications'] = $presentations;

				$this->load->moderator_view('presentations/home', $this->data);
				break;

			default:
				break;
		}
	}

	/**
	 * single
	 *
	 * ### Single Presentation View
	 * 
	 * 
	 * @return void
	 */
	public function new_presentation($slug)
	{
		$application = json_decode($this->EntriesModel->get(null, ['nomination_id' => $slug]), true)[0];
		$category_details = json_decode($this->CategoryModel->get(null, ['type' => $application['category_id']]), true)[0];
		$this->data['application'] = $application;
		$this->data['category'] = $category_details;
		$this->load->panel_view('presentations/single', $this->data);
	}


	public function download($slug)
	{
		$this->load->library('pdflib/MakePresentation');
		$presentation = [
			'attachments' => 
				[
					'logoimg' => 'attachments/1738755385-41862/1738755515_57216_favicon.png',
					'doc1' => 'attachments/1738755385-41862/1738755515_02164_favicon.png',
					'doc2' => 'attachments/1738755385-41862/1738755515_20451_favicon.png',
					'doc3' => 'attachments/1738755385-41862/1738755515_45936_favicon.png',
					'doc4' => 'attachments/1738755385-41862/1738755515_03246_favicon.png',
					'doc5' => 'attachments/1738755385-41862/1738755515_95836_favicon.png',
					'doc6' => 'attachments/1738755385-41862/1738755515_45169_favicon.png',
				],		
			'nomination_id' => '1736226536-92108',
			'presentation_id' => '1738755385-41862',
			'organization_name' => 'Sociomark Digital Marketing Agency',
					'id_255004' => 'Manufacturing',
					'size' => 'Less than 50',
					'id_255002' => '20/06/2021',
			'name' => 'Hemant Developer',
			'organization_revenue_2' => '5 - 24',
			'organization_revenue_1' => '5 - 24',
			'organization_growth_2' => '< 5%',
			'organization_growth_1' => '6% - 15%',
			'organization_profit' => '< 10%',
			'organization_valuation' => '50 - 100',
			'organization_der_23' => '1.6 - 2.0',
			'case_study_1' => 'Background about your organization/institute. Highlight the challenges you are aiming to solve through the initiative.',
			'case_study_2' => 'Geographical area where the organization works. Few Success Stories (If Applicable)',
			'case_study_3' => 'What are unique offerings that differentiates you from the existing competitiors in the market?',
			'case_study_4' => 'Describe the initiatives taken by your organizations in last year (April 2023 - March 2024)',
			'case_study_5' => 'Describe the impact created by the initiatives in the last year on the business growth and other stakeholders. i.e. Customers Employees, Industry, etc',
			'case_study_6' => 'Based on the current economic conditions describe key risk management initiatives implemented by your organization to mitigate these risks and how technology has played a role in it
		(Examples of risks are financial uncertainty, legal liabilities, strategic management of errors, IT Security threats, data-related risks etc.)',
			'case_study_7' => 'Elaborate on the Sustainability and/or Scalability plan of your organization for the next 2-3 years.',
			'case_study_8' => 'List any awards/achievements won in the last 2 years or any other additional information for the jury.'
		];
		$this->makepresentation->init('L', 'mm', ['350', '210'])->load($presentation, 'stage_2_layout_1')->generate();
	}
}

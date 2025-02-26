<?php
require_once APPPATH . "controllers/BaseController.php";
class AwardsController extends BaseController{
	public function __construct()
	{
		parent::__construct();
	}
	public function home() {
		$this->data['grand_juries'] = [
			[
				'photo' => "Amit_Jain.png",
				'name' => "Amit Jain",
				'description' => "Co-Founder & CEO,CarDekho Group",
			],
			[
				'photo' => "Shauravi_Malik.png",
				'name' => "Shauravi Malik",
				'description' => "Co-Founder, Wholsum Foods (Slurrp Farm and Mille)",
			],
			[
				'photo' => "Anisha_Singh.png",
				'name' => "Anisha Singh",
				'description' => "Founder, She Capital",
			],
			[
				'photo' => "Prashant_Tandon.png",
				'name' => "Prashant Tandon",
				'description' => "CEO & Co-Founder, Tata 1mg",
			],
			[
				'photo' => "Vivek_Gambhir.png",
				'name' => "Vivek Gambhir",
				'description' => "Venture Partner, Lightspeed India",
			],
			[
				'photo' => "CP_Gurnani.png",
				'name' => "CP Gurnani",
				'description' => "CEO & Co-Founder, AIonOS",
			],
			[
				'photo' => "A_Velumani.png",
				'name' => "Dr A Velumani",
				'description' => "Creator, Thyrocare",
			],
			[
				'photo' => "Padmaja_Ruparel.png",
				'name' => "Padmaja Ruparel",
				'description' => "Co-Founder, IAN Group",
			],
			[
				'photo' => "Abhinandan_Lodha.png",
				'name' => "Abhinandan Lodha",
				'description' => "Chairman, The House of Abhinandan Lodha, HoABL Group",
			],
			[
				'photo' => "Sahil_Malik.png",
				'name' => "Sahil Malik",
				'description' => "MD & CEO, Da Milano & Rosso Brunello",
			],
			[
				'photo' => "Hiroshi_Nishijima.png",
				'name' => "Hiroshi Nishijima",
				'description' => "CEO, Zoomcar",
			],
			[
				'photo' => "Vinod_Kumar.png",
				'name' => "Vinod Kumar Wuthoo",
				'description' => "President, India SME Forum",
			],
			// [
			// 	'photo' => "",
			// 	'name' => "",
			// 	'description' => "",
			// ],
		];
		print_r($this->data);die;
		// $this->load->award_page('home', $this->data);
	}
}

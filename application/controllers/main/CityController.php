<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class CityController extends BaseController
{
	public $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('directory');
	}
	public function index()
	{
		$this->data['page'] = [
			'title' => "All Springboards" . " • " . APP_NAME . " " .date('Y'),
		];
		$this->load->page('city/home', $this->data);
	}

	public function city_single($city)
	{
		$this->data['city']['gallery'] = directory_map('./assets/images/cities/' . $city . '/gallery/');
		switch ($city) {
			case 'mumbai':
				$this->data['page'] = [
					'title' => "Mumbai Springboard" . " • " . APP_NAME . " " .date('Y'),
				];
				$this->data['city'] = [
					'name' => "Mumbai",
					'guests' => [
						[
							'photo' => "Devendra_Fadnavis.png",
							'name' => "Devendra Fadnavis",
							'description' => "Deputy Chief Minister, Maharashtra",
						],
					],
					'speakers' => [
						[
							'photo' => "Chinmay_Dhoble.png",
							'name' => "Chinmay Dhoble",
							'description' => "Head, Retail Liabilities & Branch Banking, IDFC FIRST Bank",
						],
						[
							'photo' => "Dr_A_Velumani.png",
							'name' => "Dr. A Velumani",
							'description' => "Creator, Thyrocare ",
						],
						[
							'photo' => "Ajay_Thakur.png",
							'name' => "Ajay Thakur",
							'description' => "CEO & Managing Partner , TGI SME Capital Advisors LLP",
						],
						[
							'photo' => "Amisha_Vora.png",
							'name' => "Amisha Vora",
							'description' => "Chairperson & MD, PL Capital",
						],
						[
							'photo' => "Aisshwarya_DKS_Hegde.png",
							'name' => "Aisshwarya DKS Hegde",
							'description' => "Edupreneur, Trustee Secretary, National Education Foundation",
						],
						[
							'photo' => "Sushma_Morthania.png",
							'name' => "Sushma Morthania",
							'description' => "Director General, India SME Forum",
						],
						[
							'photo' => "Pankaj_Mathpal.png",
							'name' => "Pankaj Mathpal",
							'description' => "Founder & MD, Optima Money Managers",
						],
					]
				];
				$this->load->city_view('mumbai', $this->data);
				break;
			case 'lucknow':
				$this->data['page'] = [
					'title' => "Lucknow Springboard" . " • " . APP_NAME . " " .date('Y'),
				];
				$this->data['city'] = [
					'name' => "Lucknow",
					'guests' => [
						[
							'photo' => "Devendra_Fadnavis.png",
							'name' => "Devendra Fadnavis",
							'description' => "Deputy Chief Minister, Maharashtra",
						],
					],
					'speakers' => [
						[
							'photo' => "Chinmay_Dhoble.png",
							'name' => "Chinmay Dhoble",
							'description' => "Head, Retail Liabilities & Branch Banking, IDFC FIRST Bank",
						],
						[
							'photo' => "Dr_A_Velumani.png",
							'name' => "Dr. A Velumani",
							'description' => "Creator, Thyrocare ",
						],
						[
							'photo' => "Ajay_Thakur.png",
							'name' => "Ajay Thakur",
							'description' => "CEO & Managing Partner , TGI SME Capital Advisors LLP",
						],
						[
							'photo' => "Amisha_Vora.png",
							'name' => "Amisha Vora",
							'description' => "Chairperson & MD, PL Capital",
						],
						[
							'photo' => "Aisshwarya_DKS_Hegde.png",
							'name' => "Aisshwarya DKS Hegde",
							'description' => "Edupreneur, Trustee Secretary, National Education Foundation",
						],
						[
							'photo' => "Sushma_Morthania.png",
							'name' => "Sushma Morthania",
							'description' => "Director General, India SME Forum",
						],
						[
							'photo' => "Pankaj_Mathpal.png",
							'name' => "Pankaj Mathpal",
							'description' => "Founder & MD, Optima Money Managers",
						],
					]
				];
				$this->load->city_view('lucknow', $this->data);
				break;


			default:
				redirect('all-cities');
				break;
		}
	}
	public function city_gallery($city)
	{

		$this->data['city']['gallery'] = directory_map('./assets/images/cities/' . $city . '/gallery/');
		switch ($city) {
			case 'mumbai':
				$this->data['page'] = [
					'title' => "Mumbai Springboard Gallery" . " • " . APP_NAME . " " .date('Y'),
				];
				$this->data['city']['name'] = "Mumbai";
				$this->load->city_view('gallery', $this->data);
				break;
			/* case 'lucknow':
				$this->data['page'] = [
					'title' => "Lucknow Springboard Gallery" . " • " . APP_NAME . " " .date('Y'),
				];
				$this->data['city']['name'] = "Lucknow";
				$this->load->city_view('gallery', $this->data);
				break; */


			default:
				redirect('all-cities');
				break;
		}
	}
	public function registration($city)
	{
		foreach ($this->springboards as $key => $sb) {
			$status = 0;
			if (strtolower($sb['name']) == $city) {
				$status = 1;
				$this->data['city'] = $sb;
				break;
			}
		}
		if ($status) {
			$this->data['city'] = $sb;
			$this->data['page'] = [
				'title' => $sb['name'] . " Springboard Registrations" . " • " . APP_NAME . " " .date('Y'),
			];
			$this->load->city_view('register', $this->data);
		} else {
			redirect('city/' . $city);
		}
	}
	public function rsvp_thankyou($city)
	{
		foreach ($this->springboards as $key => $sb) {
			if (strtolower($sb['name']) == $city) {
				$this->data['city'] = $sb;
				$this->data['page'] = [
					'title' => "Thank You for Registering to " . $sb['name'] . " Springboard" . " • " . APP_NAME . " " .date('Y'),
				];
				$this->load->city_view('thankyou', $this->data);
				break;
			} else {
				redirect('city/' . $city);
			}
		}
	}
}

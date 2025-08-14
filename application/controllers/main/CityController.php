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

		$this->data['springboards'] = [
			[
				'name' => 'Mumbai',
				'date' => '2025-08-21',
				'image' => 'mumbai.jpg',
				'status' => 1,
			],
			[
				'name' => 'Bengaluru',
				'date' => '2025-08-31',
				'image' => 'bengaluru.jpg',
				'status' => 0,
			],
			[
				'name' => 'Chandigarh',
				'image' => 'delhi.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Chennai',
				'image' => 'chennai.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Coimbatore',
				'image' => 'coimbatore.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Delhi',
				'image' => 'delhi.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Goa',
				'image' => 'goa.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Hyderabad',
				'image' => 'hyderabad.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Indore',
				'image' => 'indore.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Jaipur',
				'image' => 'jaipur.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Kolkata',
				'image' => 'kolkata.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Lucknow',
				'image' => 'lucknow.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Nagpur',
				'image' => 'nagpur.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			[
				'name' => 'Pune',
				'image' => 'pune.jpg',
				'date' => '2025-08-31',
				'status' => 0,
			],
			
		];
	}
	public function index()
	{
		$this->data['past_springboards'][] = NULL;
		$this->data['live_springboard'] = NULL;
		$this->data['upcoming_springboards'][] = NULL;
		for ($i = 0; $i < count($this->data['springboards']); $i++) {
			$springboard = $this->data['springboards'][$i];
			$date = DateTime::createFromFormat('Y-m-d', $springboard['date']);
			$today = new DateTime();
			if ($date->format('Y-m-d') < $today->format('Y-m-d')) {
				$this->data['past_springboards'][] = $springboard ?? NULL;
			} elseif ($date->format('Y-m-d') == $today->format('Y-m-d')) {
				$this->data['live_springboard'] = $springboard ?? NULL;
			} else {
				$this->data['upcoming_springboards'][] = $springboard ?? NULL;
			}
		}


		$this->data['page'] = [
			'title' => "All Springboards" . " • " . APP_NAME . " " . date('Y'),
		];
		$this->load->page('city/home', $this->data);
	}

	public function city_single($city)
	{
		$gallery = directory_map('./assets/images/cities/' . $city . '/gallery/');
		if (is_array($gallery)) {
			foreach ($gallery as $key => $element) {
				if (is_array($element)) {
					unset($gallery[$key]);
				}
			}
			$this->data['city']['gallery'] = $gallery;
		}
		switch (str_replace(' ', '-', $city)) {
			case 'mumbai':
				$this->data['page'] = [
					'title' => "Mumbai Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Mumbai",
					'theme' =>[
						'title' => "Springboard 2025",
						'description' => "Empowering Entrepreneurs for a Sustainable Future",
						'embed' => "https://www.youtube.com/embed/1a2b3c4d5e6f",
					],
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
				break;
			default:
				redirect('all-cities');
				break;
		}
		$this->load->city_view('single', $this->data);
	}

	public function city_gallery($city)
	{
		$gallery = directory_map('./assets/images/cities/' . $city . '/gallery/');
		foreach ($gallery as $key => $element) {
			if (is_array($element)) {
				unset($gallery[$key]);
			}
		}
		$this->data['city']['gallery'] = $gallery;
		switch ($city) {
			case 'mumbai':
				$this->data['page'] = [
					'title' => "Mumbai Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Mumbai";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'lucknow':
				$this->data['page'] = [
					'title' => "Lucknow Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Lucknow";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'chandigarh':
				$this->data['page'] = [
					'title' => "Chandigarh Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Chandigarh";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'chennai':
				$this->data['page'] = [
					'title' => "Chennai Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Chennai";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'jaipur':
				$this->data['page'] = [
					'title' => "Jaipur Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['partners'] = [
					[
						'text' => 'Hospitality Partner',
						'logo' => 'Pride.png',
						'url' => ""
					],
				];
				$this->data['city']['name'] = "Jaipur";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'coimbatore':
				$this->data['page'] = [
					'title' => "Coimbatore Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Coimbatore";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'pune':
				$this->data['page'] = [
					'title' => "Pune Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Pune";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'hyderabad':
				$this->data['page'] = [
					'title' => "Hyderabad Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Hyderabad";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'indore':
				$this->data['page'] = [
					'title' => "Indore Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Indore";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'delhi':
				$this->data['page'] = [
					'title' => "Delhi Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Delhi";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'bengaluru':
				$this->data['page'] = [
					'title' => "Bengaluru Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Bengaluru";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'goa':
				$this->data['city']['partners'] = [
					[
						'text' => 'Hospitality Partner',
						'logo' => 'Pride.png',
						'url' => ""
					],
				];
				break;

			default:
				redirect('city/' . $city);
				break;
		}
	}

	public function registration($city)
	{
		foreach ($this->springboards as $key => $sb) {
			$status = 0;
			if (str_replace(" ", "-", strtolower($sb['name'])) == $city && $city == 'ahmedabad') {
				$status = 1;
				$this->data['city'] = $sb;
				break;
			}
		}
		if ($status) {
			$this->data['city'] = $sb;
			switch ($city) {
				case 'pune':
				case 'jaipur':
				case 'goa':
				case 'ahmedabad':
					$this->data['city']['partners'] = [
						[
							'text' => 'Hospitality Partner',
							'logo' => 'Pride.png',
							'url' => ""
						],
					];
					break;

				default:
					# code...
					break;
			}
			$this->data['page'] = [
				'title' => $sb['name'] . " Springboard Registrations" . " • " . APP_NAME . " " . date('Y'),
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
					'title' => "Thank You for Registering to " . $sb['name'] . " Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->load->city_view('thankyou', $this->data);
				break;
			}
		}
	}
}

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
			'title' => "All Springboards" . " • " . APP_NAME . " " . date('Y'),
		];
		$this->load->page('city/home', $this->data);
	}

	public function city_single($city)
	{
		$this->data['city']['gallery'] = directory_map('./assets/images/cities/' . $city . '/gallery/');
		switch ($city) {
			case 'mumbai':
				$this->data['page'] = [
					'title' => "Mumbai Springboard" . " • " . APP_NAME . " " . date('Y'),
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
					'title' => "Lucknow Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Lucknow",
					'speakers' => [
						[
							'photo' => "Bhavesh_Jatania.png",
							'name' => "Bhavesh Jatania",
							'description' => "Head - Startup Banking, IDFC FIRST Bank",
						],
						[
							'photo' => "Jayant_Krishna.png",
							'name' => "Jayant Krishna",
							'description' => "Senior Fellow & Former CEO, CSIS, National Skill Development Corporation",
						],
						[
							'photo' => "Vinamra_Agarwal.png",
							'name' => "Vinamra Agarwal",
							'description' => "Joint MD, Technical Associates",
						],
						[
							'photo' => "Jyotsna_Kaur_Habibullah.png",
							'name' => "Jyotsna Kaur Habibullah",
							'description' => "CEO, Lucknow Farmers Market",
						],
						[
							'photo' => "Anuj_Agarwal.png",
							'name' => "Anuj Agarwal",
							'description' => "MD, Gyan Dairy",
						],
						[
							'photo' => "Aditya_Sharma.png",
							'name' => "Aditya Sharma",
							'description' => "Founder, Capital Tree",
						],
					]
				];
				$this->load->city_view('lucknow', $this->data);
				break;
			case 'chandigarh':
				$this->data['page'] = [
					'title' => "Chandigarh Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Chandigarh",
					'guests' => [
						[
							'photo' => "Satya_Jain.png",
							'name' => "Satya Pal Jain",
							'description' => "Additional Solicitor General of India & Former Member of Lok Sabha Chandigarh",
						],
					],
					'speakers' => [
						[
							'photo' => "Rohit_Saoji.png",
							'name' => "Rohit Jagdish Saoji",
							'description' => "Head, Commercial Banking, IDFC FIRST Bank",
						],
						[
							'photo' => "Naveen_Manglani.png",
							'name' => "Naveen Manglani",
							'description' => "President, Chamber of Chandigarh Industries",
						],
						[
							'photo' => "Heena_Kataria.png",
							'name' => "Heena Kataria",
							'description' => "Founder & CEO, MerakiAds",
						],
						[
							'photo' => "Vineet_Khurana.png",
							'name' => "Vineet Khurana",
							'description' => "CEO, SACC India",
						],
						[
							'photo' => "Isha_Taneja.png",
							'name' => "Isha Taneja",
							'description' => "Chair, TiE Chandigarh Women",
						],
					]
				];
				$this->load->city_view('chandigarh', $this->data);
				break;

			case 'hyderabad':
				$this->data['page'] = [
					'title' => "Hyderabad Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Hyderabad",
					'speakers' => [
						// [
						// 	'photo' => "Bhavesh_Jatania.png",
						// 	'name' => "Bhavesh Jatania",
						// 	'description' => "Head - Startup Banking, IDFC FIRST Bank",
						// ],
						[
							'photo' => "Rama_Devi_Lanka.png",
							'name' => "Rama Devi Lanka",
							'description' => "Director - Emerging Technologies, Government of Telangana",
						],
						[
							'photo' => "K_Rama_Devi.png",
							'name' => "K Rama Devi",
							'description' => "Founder & President, Association of Lady Entrepreneurs of India (ALEAP)",
						],
						[
							'photo' => "Ramesh_Loganathan.png",
							'name' => "Ramesh Loganathan",
							'description' => "Professor & Head Research Outreach, IIIT - Hyderabad",
						],
						[
							'photo' => "Lion_Dr_Kiran.png",
							'name' => "Lion Dr Kiron",
							'description' => "Managing Director, SuchirIndia Group",
						],
					]
				];
				$this->load->city_view('hyderabad', $this->data);
				break;
			case 'chennai':
				$this->data['page'] = [
					'title' => "Chennai Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Chennai",
					'speakers' => [
						[
							'photo' => "Anto_Alan.png",
							'name' => "Anto Alan",
							'description' => "Business Head, Business Banking & Agri, IDFC FIRST Bank",
						],
						[
							'photo' => "Dr_Srimathy.png",
							'name' => "Dr Srimathy Kesan",
							'description' => "Founder & CEO, Space Kidz India",
						],
						[
							'photo' => "CK_Mohan.png",
							'name' => "CK Mohan",
							'description' => "President, Tamil Nadu Small & Tiny Industries Association",
						],
						[
							'photo' => "Divya_Abhishek.png",
							'name' => "Divya Abhishek",
							'description' => "Chairperson, FICCI FLO, Chennai",
						],
						[
							'photo' => "Dayal_Nathan.png",
							'name' => " Dayal Nathan",
							'description' => "Founder & CEO, Energyly",
						],
						// [
						// 	'photo' => "",
						// 	'name' => "",
						// 	'description' => "",
						// ],
					]
				];
				$this->load->city_view('chennai', $this->data);
				break;
			case 'coimbatore':
				$this->data['page'] = [
					'title' => "Coimbatore Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Coimbatore",
					'partners' => [
						[
							'text' => 'Associate Partner',
							'logo' => 'TEA.png',
						],
						[
							'text' => 'Associate Partner',
							'logo' => 'GSquare.png',
						],
					],
					'speakers' => [
						[
							'photo' => "Anto_Alan.png",
							'name' => "Anto Alan",
							'description' => "Business Head, Business Banking & Agri, IDFC FIRST Bank",
						],
						// [
						// 	'photo' => "",
						// 	'name' => "Anto Alan",
						// 	'description' => "Business Head, Business Banking & Agri, IDFC FIRST Bank",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "Dr Srimathy Kesan",
						// 	'description' => "Founder & CEO, Space Kidz India",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "CK Mohan",
						// 	'description' => "President, Tamil Nadu Small & Tiny Industries Association ",
						// ],						
						[
							'photo' => "A_Sakthivel.png",
							'name' => " Padma Shri Dr. A. Sakthivel",
							'description' => "Honorary Chairman, Tirupur Exporters Association",
						],
						[
							'photo' => "KM_Subramanian.png",
							'name' => "KM Subramanian",
							'description' => "President, Tirupur Exporters Association",
						],
						[
							'photo' => "M_Karthikeyan.png",
							'name' => " M. Karthikeyan",
							'description' => "President, Codissia",
						],
						// [
						// 	'photo' => "",
						// 	'name' => "Dr Manimekalai Mohan",
						// 	'description' => "Founder & Managing Trustee, SSVM Group of Institutions",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "Junaith Baba",
						// 	'description' => "COO, G SQUARE",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "G Radhakrishnan",
						// 	'description' => "Chairman, CII Coimbatore Zone",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "",
						// 	'description' => "",
						// ],
					]
				];
				$this->load->city_view('coimbatore', $this->data);
				break;

			case 'coimbatore':
				$this->data['page'] = [
					'title' => "Coimbatore Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Coimbatore",
					'partners' => [
						[
							'text' => 'Associate Partner',
							'logo' => 'TEA.png',
						],
						[
							'text' => 'Associate Partner',
							'logo' => 'GSquare.png',
						],
					],
					'speakers' => [
						[
							'photo' => "Anto_Alan.png",
							'name' => "Anto Alan",
							'description' => "Business Head, Business Banking & Agri, IDFC FIRST Bank",
						],
						// [
						// 	'photo' => "",
						// 	'name' => "Anto Alan",
						// 	'description' => "Business Head, Business Banking & Agri, IDFC FIRST Bank",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "Dr Srimathy Kesan",
						// 	'description' => "Founder & CEO, Space Kidz India",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "CK Mohan",
						// 	'description' => "President, Tamil Nadu Small & Tiny Industries Association ",
						// ],						
						[
							'photo' => "A_Sakthivel.png",
							'name' => " Padma Shri Dr. A. Sakthivel",
							'description' => "Honorary Chairman, Tirupur Exporters Association",
						],
						[
							'photo' => "KM_Subramanian.png",
							'name' => "KM Subramanian",
							'description' => "President, Tirupur Exporters Association",
						],
						[
							'photo' => "M_Karthikeyan.png",
							'name' => " M. Karthikeyan",
							'description' => "President, Codissia",
						],
						// [
						// 	'photo' => "",
						// 	'name' => "Dr Manimekalai Mohan",
						// 	'description' => "Founder & Managing Trustee, SSVM Group of Institutions",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "Junaith Baba",
						// 	'description' => "COO, G SQUARE",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "G Radhakrishnan",
						// 	'description' => "Chairman, CII Coimbatore Zone",
						// ],
						// [
						// 	'photo' => "",
						// 	'name' => "",
						// 	'description' => "",
						// ],
					]
				];
				$this->load->city_view('coimbatore', $this->data);
				break;
			case 'test':
				$this->data['page'] = [
					'title' => "Lucknow Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Lucknow",
					'speakers' => [
						[
							'photo' => "Bhavesh_Jatania.png",
							'name' => "Bhavesh Jatania",
							'description' => "Head - Startup Banking, IDFC FIRST Bank",
						],
						[
							'photo' => "Jayant_Krishna.png",
							'name' => "Jayant Krishna",
							'description' => "Senior Fellow & Former CEO, CSIS, National Skill Development Corporation",
						],
						[
							'photo' => "Vinamra_Agarwal.png",
							'name' => "Vinamra Agarwal",
							'description' => "Joint MD, Technical Associates",
						],
						[
							'photo' => "Jyotsna_Kaur_Habibullah.png",
							'name' => "Jyotsna Kaur Habibullah",
							'description' => "CEO, Lucknow Farmers Market",
						],
						[
							'photo' => "Anuj_Agarwal.png",
							'name' => "Anuj Agarwal",
							'description' => "MD, Gyan Dairy",
						],
						[
							'photo' => "Aditya_Sharma.png",
							'name' => "Aditya Sharma",
							'description' => "Founder, Capital Tree",
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

			default:
				redirect('all-cities');
				break;
		}
	}

	public function registration($city)
	{
		foreach ($this->springboards as $key => $sb) {
			$status = 0;
			if (strtolower($sb['name']) == $city && $city == 'coimbatore') {
				$status = 1;
				$this->data['city'] = $sb;
				break;
			}
		}
		if ($status) {
			$this->data['city'] = $sb;
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

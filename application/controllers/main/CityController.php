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
		$gallery = directory_map('./assets/images/cities/' . $city . '/gallery/');
		if(is_array($gallery)){
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
							'url' => "https://www.tea-india.org/"
						],
						[
							'text' => 'Associate Partner',
							'logo' => 'GSquare.png',
							'url' => "https://www.gsquarehousing.com/"
						],
					],
					'speakers' => [
						[
							'photo' => "Kranthi_Kumar_Pati.png",
							'name' => "Kranthi Kumar Pati",
							'description' => " IAS, District Collector, Coimbatore",
						],
						[
							'photo' => "Anto_Alan.png",
							'name' => "Anto Alan",
							'description' => "Business Head, Business Banking & Agri, IDFC FIRST Bank",
						],
						[
							'photo' => "A_Sakthivel.png",
							'name' => "Padma Shri Dr. A. Sakthivel",
							'description' => "Honorary Chairman, Tiruppur Exporters Association",
						],
						[
							'photo' => "KM_Subramanian.png",
							'name' => "KM Subramanian",
							'description' => "President, Tiruppur Exporters Association",
						],
						[
							'photo' => "Junaith_Baba.png",
							'name' => "Junaith Babu",
							'description' => "COO, G SQUARE",
						],
						[
							'photo' => "CA_Meena.png",
							'name' => "CA Meena Swaminathan",
							'description' => "Chairperson, FICCI Ladies Organisation, Coimbatore Chapter",
						],
						// [
						// 	'photo' => "M_Karthikeyan.png",
						// 	'name' => " M. Karthikeyan",
						// 	'description' => "President, Codissia",
						// ],
						[
							'photo' => "Junaith_Baba.png",
							'name' => "Junaith Babu",
							'description' => "COO, G SQUARE",
						],
						[
							'photo' => "CA_Meena.png",
							'name' => "CA Meena Swaminathan",
							'description' => "Chairperson, FICCI Ladies Organisation, Coimbatore Chapter",
						],
						[
							'photo' => "M_Karthikeyan.png",
							'name' => " M. Karthikeyan",
							'description' => "President, Codissia",
						],
						[
							'photo' => "G_Radhakrishnan.png",
							'name' => "G Radhakrishnan",
							'description' => "Chairman, CII Coimbatore Zone",
						],
						[
							'photo' => "K_Illango.png",
							'name' => "K. Ilango",
							'description' => "Managing Director, RSM Autokast",
						],

						// [
						// 	'photo' => "",
						// 	'name' => "",
						// 	'description' => "",
						// ],
					]
				];
				$this->load->city_view('coimbatore', $this->data);
				break;

			case 'jaipur':
				$this->data['page'] = [
					'title' => "Jaipur Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Jaipur",
					'speakers' => [
						[
							'photo' => "Bhavesh_Jatania.png",
							'name' => "Bhavesh Jatania",
							'description' => "Head – Startup Banking, IDFC FIRST Bank",
						],
						[
							'photo' => "Kuldeep_Singh_Chandela.png",
							'name' => "Kuldeep Singh Chandela",
							'description' => "President, Federation of Hospitality & Tourism of Rajasthan (FHTR)",
						],
						[
							'photo' => "Tarun_Kumar_Bansal.png",
							'name' => "Tarun Kumar Bansal",
							'description' => "President, Hotel & Restaurants Association of Rajasthan (HRAR)",
						],
						[
							'photo' => "Chitra_Gurnani_Daga.png",
							'name' => "Chitra Gurnani Daga",
							'description' => "CEO & Co-Founder, Thrillophilia",
						],
						[
							'photo' => "Angad_Mandawa.png",
							'name' => "Angad deo Mandawa",
							'description' => "Director & Member, Hotel Castle Mandawa & Federation of Hospitality and Tourism of Rajasthan (FHTR)",
						],
						[
							'photo' => "Hemant_Beniwal.png",
							'name' => "Hemant Beniwal",
							'description' => "Certified Financial Planner & Director, Ark Primary Advisors",
						],
					],
					'partners' => [
						[
							'text' => 'Hospitality Partner',
							'logo' => 'Pride.png',
							'url' => ""
						],
					],
				];
				$this->load->city_view('jaipur', $this->data);
				break;
			case 'pune':
				$this->data['page'] = [
					'title' => "Pune Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Pune",
					'speakers' => [
						[
							'photo' => "Rohit_Saoji.png",
							'name' => "Rohit Saoji",
							'description' => "Head-Commercial Banking, IDFC FIRST Bank",
						],
						[
							'photo' => "Dr_Raman.png",
							'name' => "Dr Ramakrishnan Raman",
							'description' => "Vice Chancellor, Symbiosis International (Deemed University)",
						],
						[
							'photo' => "Uma_Ganesh.png",
							'name' => "Dr Uma Ganesh",
							'description' => "Co-Founder, Global Talent Track (GTT) Foundation",
						],
						[
							'photo' => "Nikhil_Kurele.png",
							'name' => "Nikhil Kurele",
							'description' => " Co-Founder & CEO, Noccarc Robotics",
						],
						[
							'photo' => "Balvir_Chawla.png",
							'name' => "Balvir Chawla",
							'description' => "Director, Finnovators Services",
						],
					],
					'partners' => [
						[
							'text' => 'Hospitality Partner',
							'logo' => 'Pride.png',
							'url' => ""
						],
					],
				];
				$this->load->city_view('pune', $this->data);
				break;
			case 'indore':
				$this->data['page'] = [
					'title' => "Indore Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Indore",
					'speakers' => [
						[
							'photo' => "Madhukar_Pant.png",
							'name' => "Madhukar Pant",
							'description' => "Business Head-Loan Against Property, IDFC FIRST Bank",
						],
						[
							'photo' => "Atul_Bharat.png",
							'name' => "Atul Bharat",
							'description' => "Founder, Indore Entrepreneurs Network ",
						],
						[
							'photo' => "Pratap_Nair.png",
							'name' => "Pratap Nair",
							'description' => "Co Founder, Inspaze & Indore Entrepreneurs  Network",
						],
						[
							'photo' => "Abhishek_Mishra.png",
							'name' => "Abhishek Mishra",
							'description' => "Professor, Indian Institute of Management (IIM), Indore",
						],
						[
							'photo' => "Navneet_Dhawan.png",
							'name' => "Navneet Dhawan",
							'description' => "Certified Financial Planner",
						],
					],
					'partners' => [
						[
							'text' => 'Hospitality Partner',
							'logo' => 'Pride.png',
							'url' => ""
						],
					],
				];
				$this->load->city_view('indore', $this->data);
				break;
			case 'delhi':
				$this->data['page'] = [
					'title' => "Delhi Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Delhi",
					'speakers' => [
						// [
						// 	'photo' => "Bharat_Goyal.png",
						// 	'name' => "Bharat Goyal",
						// 	'description' => "Zonal Head-North, IDFC FIRST Bank",
						// ],
						[
							'photo' => "Vivek_Gambhir.png",
							'name' => "Vivek Gambhir",
							'description' => "Venture Partner, Lightspeed India",
						],
						[
							'photo' => "Deepak_Gupta.png",
							'name' => "Deepak Gupta",
							'description' => " Co-founder & COO, Bombay Shaving Company",
						],
						[
							'photo' => "Apeksha_Jain.png",
							'name' => "Apeksha Jain",
							'description' => "Founder & CEO, The Gourmet Jar",
						],
						[
							'photo' => "Nikita_Bose.png",
							'name' => "Nikita Bose",
							'description' => "Business Mentor, Former Program Expert, Startup India, MSME Ministry",
						],
					]
				];
				$this->data['city']['partners'] = [
					[
						'text' => 'Hospitality Partner',
						'logo' => 'Pride.png',
						'url' => ""
					],
				];
				$this->load->city_view('delhi', $this->data);
				break;
			case 'bengaluru':
				$this->data['page'] = [
					'title' => "Bengaluru Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Bengaluru",
					'speakers' => [
						[
							'name' => "Anto Alan",
							'photo' => "Anto_Alan.png",
							'description' => "Business Head – Business Banking & Agri, IDFC FIRST Bank",
						],
						[
							'name' => "Swapna Bapat",
							'photo' => "Swapna_Bapat.png",
							'description' => "Vice President & Managing Director, India & SAARC, Palo Alto Networks",
						],
						[
							'name' => "Sahar Mansoor",
							'photo' => "Sahar_Mansoor.png",
							'description' => "Founder & CEO, Bare Necessities",
						],
						[
							'name' => "Kamal Karanth",
							'photo' => "Kamal_Karanth.png",
							'description' => "Co-Founder, Xpheno",
						],
						[
							'name' => "Tanuj Choudhry",
							'photo' => "Tanuj_Choudhry.png",
							'description' => "Co-Founder & COO, HomeLane",
						],
					]
				];
				$this->data['city']['partners'] = [
					[
						'text' => 'Hospitality Partner',
						'logo' => 'Pride.png',
						'url' => ""
					],
				];
				$this->load->city_view('bengaluru', $this->data);
				break;
			case 'goa':
				$this->data['page'] = [
					'title' => "Goa Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Goa",
					'speakers' => [
						[
							'name' => "Pooja Bedi",
							'photo' => "Pooja_Bedi.png",
							'description' => "Actor & Founder, Happy Soul",
						],
						[
							'name' => "Tej Naik",
							'photo' => "Tej_Naik.png",
							'description' => "Co-founder & MD, Powerland ATV",
						],
						[
							'name' => "Jack Ajit Sukhija",
							'photo' => "Jack_Ajit.png",
							'description' => "President, Travel & Tourism Association of Goa",
						],
						[
							'name' => "Lalit Saraswat",
							'photo' => "Lalit_Saraswat.png",
							'description' => "Past Chairman, CII Goa & CEO, Sancoale Technologies",
						],
						[
							'name' => "Sachin Mehta",
							'photo' => "Sachin_Mehta.png",
							'description' => "Head-Branch Banking & Corporate Salary, IDFC FIRST Bank",
						],
						// [
						// 	'name' => "Snigdha Manchanda",
						// 	'photo' => "Snigdha_Manchanda.png",
						// 	'description' => "Founder & CEO, Tea Trunk",
						// ],
					]
				];
				$this->data['city']['partners'] = [
					[
						'text' => 'Hospitality Partner',
						'logo' => 'Pride.png',
						'url' => ""
					],
				];
				$this->load->city_view('goa', $this->data);
				break;
			
			case 'ahmedabad':
				$this->data['page'] = [
					'title' => "Ahmedabad Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Ahmedabad",
					'speakers' => [
						[
							'photo' => "Anto_Alan.png",
							'name' => "Anto Alan",
							'description' => "Business Head, Business Banking & Agri, IDFC FIRST Bank",
						],
						[
							'photo' => "Sunil_Parekh.png",
							'name' => "Dr. Sunil R Parekh",
							'description' => "Industry veteran, Founding Curator , AGS @WEF Geneva",
						],
						// [
						// 	'photo' => "Ashish_Desai.png",
						// 	'name' => "Ashish Desai",
						// 	'description' => "Senior Member, PHDCCI, Gujarat Chapter & Head - Corporate Affairs, NIRMA Ltd",
						// ],
						[
							'photo' => "Arnav_Patel.png",
							'name' => "Arnav Patel",
							'description' => "Director, Paypoint",
						],
						// [
						// 	'photo' => "Mayank_Patel.png",
						// 	'name' => "Dr. Mayank Patel",
						// 	'description' => "Head of Advisory Services, IBGrid",
						// ],
					]
				];
				$this->data['city']['partners'] = [
					[
						'text' => 'Hospitality Partner',
						'logo' => 'Pride.png',
						'url' => ""
					],
				];
				$this->load->city_view('ahmedabad', $this->data);
				break;
			case 'kolkata':
				$this->data['page'] = [
					'title' => "Kolkata Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Kolkata",
					'speakers' => [
						[
							'photo' => "Anto_Alan.png",
							'name' => "Anto Alan",
							'description' => "Business Head, Business Banking & Agri, IDFC FIRST Bank",
						],
						[
							'photo' => "Sunil_Parekh.png",
							'name' => "Dr. Sunil R Parekh",
							'description' => "Industry veteran, Founding Curator , AGS @WEF Geneva",
						],
						// [
						// 	'photo' => "Ashish_Desai.png",
						// 	'name' => "Ashish Desai",
						// 	'description' => "Senior Member, PHDCCI, Gujarat Chapter & Head - Corporate Affairs, NIRMA Ltd",
						// ],
						[
							'photo' => "Arnav_Patel.png",
							'name' => "Arnav Patel",
							'description' => "Director, Paypoint",
						],
						// [
						// 	'photo' => "Mayank_Patel.png",
						// 	'name' => "Dr. Mayank Patel",
						// 	'description' => "Head of Advisory Services, IBGrid",
						// ],
					]
				];
				$this->data['city']['partners'] = [
					[
						'text' => 'Hospitality Partner',
						'logo' => 'Pride.png',
						'url' => ""
					],
				];
				$this->load->city_view('kolkata', $this->data);
				break;
			case 'nagpur':
				$this->data['page'] = [
					'title' => "Nagpur Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Nagpur",
					'speakers' => [
						[
							'photo' => "Anto_Alan.png",
							'name' => "Anto Alan",
							'description' => "Business Head, Business Banking & Agri, IDFC FIRST Bank",
						],
						[
							'photo' => "Sunil_Parekh.png",
							'name' => "Dr. Sunil R Parekh",
							'description' => "Industry veteran, Founding Curator , AGS @WEF Geneva",
						],
						// [
						// 	'photo' => "Ashish_Desai.png",
						// 	'name' => "Ashish Desai",
						// 	'description' => "Senior Member, PHDCCI, Gujarat Chapter & Head - Corporate Affairs, NIRMA Ltd",
						// ],
						[
							'photo' => "Arnav_Patel.png",
							'name' => "Arnav Patel",
							'description' => "Director, Paypoint",
						],
						// [
						// 	'photo' => "Mayank_Patel.png",
						// 	'name' => "Dr. Mayank Patel",
						// 	'description' => "Head of Advisory Services, IBGrid",
						// ],
					]
				];
				$this->data['city']['partners'] = [
					[
						'text' => 'Hospitality Partner',
						'logo' => 'Pride.png',
						'url' => ""
					],
				];
				$this->load->city_view('nagpur', $this->data);
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
				$this->load->city_view('jaipur', $this->data);
				break;


			default:
				redirect('all-cities');
				break;
		}
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

<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class HistoryController extends BaseController
{
	public $data;
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->data['page'] = [
			'title' => "All Previous Seasons" . " • " . APP_NAME,
		];
		$this->load->page('history/home', $this->data);
	}

	public function season_single($number)
	{
		$this->data['season'] = $number;
		$this->data['page'] = [
			'title' => "Season " . $number . " • " . APP_NAME,
		];
		switch ($number) {
			case '12':
				$this->data['partners'] = [
					[
						'text' => "Presenting Partner",
						'logo' => "idfc.png",
						'url' => null,
					],
					[
						'text' => "Associate Partner",
						'logo' => "adani.png",
						'url' => null,
					],
					[
						'text' => "Education Partner",
						'logo' => "bennett.png",
						'url' => null,
					],
				];
				$this->data['cities'] = [
					"Mumbai",
					"Lucknow",
					"Chandigarh",
					"Hyderabad",
					"Chennai",
					"Coimbatore",
					"Jaipur",
					"Pune",
					"Indore",
					"Delhi",
					"Bengaluru",
					"Goa",
					"Ahmedabad",
					"Nagpur",
					"Kolkata",
				];

				$city = $this->input->get('city') ?? "Mumbai";
				switch ($city) {
					case 'Mumbai':
						$this->data['page'] = [
							'title' => "Mumbai Springboard" . " • " . APP_NAME . " " . date('Y'),
							'date' => '2024-08-29 17:00:00',
							'venue' =>	"Taj Lands End, Mumbai",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Galvanizing India’s MSMEs to Seize Global Opportunities",
						];
						$this->data['springboard'] = [
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
						break;
					case 'Lucknow':
						$this->data['page'] = [
							'date' => '2024-09-13 17:00:00',
							'venue' =>	"Hilton Garden Inn",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Charting Uttar Pradesh’s Trillion-Dollar Journey ",
						];
						$this->data['springboard'] = [
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
						break;
					case 'Chandigarh':
						$this->data['page'] = [
							'date' => '2024-09-27 17:00:00',
							'venue' =>	"Hometel, Chandigarh",
							'promo' => "JhaCnMvPW-k",
							'theme' => "A Case Study For Ease Of Doing Business",
						];
						$this->data['springboard'] = [
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
						break;

					case 'Hyderabad':
						$this->data['page'] = [
							'date' => '2024-10-10 17:00:00',
							'venue' =>	"Radisson Blu Plaza Hotel Hyderabad Banjara Hills",
							'promo' => "JhaCnMvPW-k",
							'theme' => "India's Manufacturing Hotbed & SEZ Capital ",
						];
						$this->data['springboard'] = [
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
						break;
					case 'Chennai':
						$this->data['page'] = [
							'date' => '2024-10-25 17:00:00',
							'venue' =>	"Regenta Central RS, Chennai",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Driving Global Blueprint for Industrial Excellence",
						];
						$this->data['springboard'] = [
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
						break;
					case 'Coimbatore':
						$this->data['page'] = [
							'date' => '2024-11-22 17:00:00',
							'venue' =>	"Le Méridien, Coimbatore",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Crafting Futures, Empowering Growth",
						];
						$this->data['springboard'] = [
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
						break;

					case 'Jaipur':
						$this->data['page'] = [
							'date' => '2024-11-29 17:00:00',
							'venue' =>	"Pride Amber Vilas Resort & Convention Centre",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Powering Rajasthan's Global Tourism Vision",
						];
						$this->data['springboard'] = [
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
						break;
					case 'Pune':
						$this->data['page'] = [
							'date' => '2024-12-20 17:00:00',
							'venue' =>	"The Pride Hotel, Pune",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Building a Future-Ready Workforce ",
						];
						$this->data['springboard'] = [
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
						break;
					case 'Indore':
						$this->data['page'] = [
							'date' => '2024-12-27 17:00:00',
							'venue' =>	"Pride Hotel & Convention Centre, Indore",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Setting the Benchmark for India's Sustainability Vision",
						];
						$this->data['springboard'] = [
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
						break;
					case 'Delhi':
						$this->data['page'] = [
							'date' => '2025-01-10 17:00:00',
							'venue' =>	"Pride Hotel, Aerocity, New Delhi",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Spotlight on India’s Startup Capital ",
						];
						$this->data['springboard'] = [
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
						$this->data['springboard']['partners'] = [
							[
								'text' => 'Hospitality Partner',
								'logo' => 'Pride.png',
								'url' => ""
							],
						];
						break;
					case 'Bengaluru':
						$this->data['page'] = [
							'date' => '2025-01-24 17:00:00',
							'venue' =>	"The Pride Hotel, Bangalore",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Mastering Business, Leadership & Gender Equity",
						];
						$this->data['springboard'] = [
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
						$this->data['springboard']['partners'] = [
							[
								'text' => 'Hospitality Partner',
								'logo' => 'Pride.png',
								'url' => ""
							],
						];
						break;
					case 'Goa':
						$this->data['page'] = [
							'date' => '2025-02-13 17:00:00',
							'venue' =>	"Pride Sun Village Resort And Spa, Goa",
							'promo' => "JhaCnMvPW-k",
							'theme' => "An Economy Evolving Beyond Tourism",
						];
						$this->data['springboard'] = [
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
						$this->data['springboard']['partners'] = [
							[
								'text' => 'Hospitality Partner',
								'logo' => 'Pride.png',
								'url' => ""
							],
						];
						break;

					case 'Ahmedabad':
						$this->data['page'] = [
							'date' => '2025-03-21 17:00:00',
							'venue' =>	"Pride Plaza Hotel, Ahmedabad",
							'promo' => "JhaCnMvPW-k",
							'theme' => "The Gateway to India’s Shanghai Dream",
						];
						$this->data['springboard'] = [
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
						$this->data['springboard']['partners'] = [
							[
								'text' => 'Hospitality Partner',
								'logo' => 'Pride.png',
								'url' => ""
							],
						];
						break;
					case 'Kolkata':
						$this->data['page'] = [
							'date' => '2025-04-04 00:00:00',
							'venue' =>	"Pride Plaza Hotel, Kolkata",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Bridging Tradition, Commerce & Innovation",
						];
						$this->data['springboard'] = [
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
						$this->data['springboard']['partners'] = [
							[
								'text' => 'Hospitality Partner',
								'logo' => 'Pride.png',
								'url' => ""
							],
						];
						break;
					case 'Nagpur':
						$this->data['page'] = [
							'date' => '2025-04-25 00:00:00',
							'venue' =>	"Pride Hotel, Nagpur",
							'promo' => "JhaCnMvPW-k",
							'theme' => "Leading Maharashtra’s Industrial Excellence",
						];
						$this->data['springboard'] = [
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
						$this->data['springboard']['partners'] = [
							[
								'text' => 'Hospitality Partner',
								'logo' => 'Pride.png',
								'url' => ""
							],
						];
						break;
					default:

						break;
				}

				$gallery = directory_map('./assets/images/history/' . $number . '/springboards/' . strtolower($city) . '/gallery/');
				if (is_array($gallery) && count($gallery) > 0) {
					foreach ($gallery as $key => $element) {
						if (is_array($element)) {
							unset($gallery[$key]);
						}
					}
				} else {
					$gallery = null;
				}

				$this->data['page']['name'] = $city;
				$this->data['page']['title'] = $city . " Springboard" . " • " . APP_NAME . "- Season " . $number;
				$this->data['springboard']['gallery'] = $gallery;

				$this->data['awards']['live'] = "ou5PFIuEoQ0?si=KnukaxaixoF4Gi3W";

				// echo "<pre>";
				// print_r($this->data);
				// die;
				$this->load->page('history/12/home', $this->data);
				break;
			case '11':
				$this->data['partners'] = [
					[
						'text' => "Presenting Partner",
						'logo' => "idfc.png",
						'url' => null,
					],
					[
						'text' => "Associate Partner",
						'logo' => "adani.png",
						'url' => null,
					],
					[
						'text' => "Education Partner",
						'logo' => "bennett.png",
						'url' => null,
					],
				];
				$this->data['hcities'] = [
					[
						'name' => "Delhi",
						'date'	=> '20th February 2023',
						'venue' =>	"ITC Maurya, New Delhi.",
						'promo' => "sYe3B8D79lI",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "The Leaders of Tomorrow Season 11 'Springboard' is a thought leadership conclave that will provide a space for inclusive dialogue with some of India's brightest minds in attendance. With an eye on setting the context for what lies next in the country's entrepreneurial landscape, Springboard will have Policymakers, Industrialists, Economists & Entrepreneurs driving the agenda centred around India's Growth Engines- it's SME and MSME sectors",
					],
					[
						'name' => "Surat",
						'date'	=> '28th April 2023',
						'venue' =>	"Le Meridien, Surat.",
						'promo' => "Z7thkF-SdUY",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm-SdUY",
						'text' => "Inspite of rising raw material costs, inflationary pressure and fluctuating domestic and overseas demand, the City of Surat continues to steadily weave the way from fibre to fashion. To hear directly from the experts as to the role the country's textile capital is playing in building an Atma Nirbhar India, join the Leaders of Tomorrow Surat Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Chennai",
						'date'	=> '24th March 2023',
						'venue' =>	"Crowne Plaza Chennai Adyar Park, Chennai.",
						'promo' => "OKBws2TE-EU",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm-EU",
						'text' => "With the emergence of electric vehicles, and the dominance of digital technology, mobility has taken on a new meaning. Seemingly every aspect of an automobile has undergone a metamorphosis, from fuel to form factor. And amidst the competing dynamics engulfing the automotive industry, be it cost sensitivity on the one hand, and improved efficiency on the other, or the fight for market share vis a vis the prioritization of profitability, the City of Chennai has emerged as an unsung hero in this space. To explore how Chennai is powering India's automotive growth engine, join the Leaders of Tomorrow Chennai Springboard - one pitstop on our pan India roadshow series, only on ET Now",
					],
					[
						'name' => "Hyderabad",
						'date'	=> '14th April 2023',
						'venue' =>	"Radisson Blu Plaza, Hyderabad.",
						'promo' => "5TPNODJdBtE",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Hyderabad is famed for its rich heritage and we aim to unravel the latest trends prevailing in the jewellery space. To hear from experts how they are reinventing themselves in a rapidly evolving world and embodying the entrepreneurial spirit, join the Leaders of Tomorrow Hyderabad Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Ranchi",
						'date'	=> '12th May 2023',
						'venue' =>	"Chanakya BNR Hotel, Ranchi.",
						'promo' => "IhMT-L_XRzM",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm-L_XRzM",
						'text' => "Ranchi has historically been among the highest employment generating Tier-III cities in India in large part due to the strength of its industrial landscape and the steady spurts of growth across its service sector. To participate in a focused dialogue around how Ranchi is reinvigorating its service-driven economy, why it matters, and what it means for SMEs --join the Leaders of Tomorrow Ranchi Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Pune",
						'date'	=> '9th June 2023',
						'venue' =>	"The Pride Hotel, Pune.",
						'promo' => "r3cQzIgNyeA",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Pune is known for its state-of-the-art manufacturing prowess that spans across sectors. To decode how the city's small businesses can leverage large-scale and world-class manufacturing units to create a big business impact, join the Leaders of Tomorrow Pune Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Bengaluru",
						'date'	=> '23rd June 2023',
						'venue' =>	"The Pride Hotel, Bengaluru.",
						'promo' => "b8i0GBfttmc",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Bengaluru, once known as the 'back office' of the world courtesy of its prominence in the global IT outsourcing industry, has transformed into a vibrant hub of innovation, entrepreneurship, & startup culture, with emphasis on cutting-edge technologies like artificial intelligence, blockchain, and the Internet of Things. This tectonic shift has substantiated the city's reputation as the hotspot for quality tech talent and investment, heralding a new chapter in India's economic & technological evolution, one where we aren't the back office but the front runners to be global power players",
					],
					[
						'name' => "Udaipur",
						'date'	=> '30th June, 2023',
						'venue' =>	"juSTa Ssatva Resort & Convention Centre, Udaipur.",
						'promo' => "1w4l2V3PqkA",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Udaipur hospitality industry is valued at upwards of Rs 1,000 crores, employing over ten thousand professionals, with over one thousand hotels, resorts, guest houses and homestays sprinkled across the City. However, Udaipur's tourism landscape is gradually shifting its focus from its historic royal heritage to a new tech-savvy flavour of ecotourism. For an overview of how Udaipur is changing the narrative of Indian tourism, join the Leaders of Tomorrow Udaipur Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Ahmedabad",
						'date'	=> '7th July, 2023',
						'venue' =>	"Pride Plaza Hotel, Ahmedabad.",
						'promo' => "Dx6mBV2k1aU",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Ahmedabad is fast gaining traction as India's Growth Powerhouse, thanks to the city's strategic location, business-friendly policies & emphasis on innovation & technology. Furthermore, FDIs worth $10 Billion & the Gujarat International Finance Tec-City (GIFT City) have positioned the city as a financial catalyst of global relevance. The Leaders of Tomorrow's Ahmedabad Springboard will bring together industry experts to discuss & decipher the city that is accelerating India's exponential rise in the new world order",
					],
					[
						'name' => "Coimbatore",
						'date'	=> '21st July, 2023',
						'venue' =>	"Gokulam Park, Coimbatore.",
						'promo' => "cNMtHIdXL4k",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Coimbatore, Tamil Nadu's second largest city by GDP, is now home to in excess of 50,000 engineering units thanks to its deeply diversified multi-disciplinary manufacturing sector. Attend the Leaders of Tomorrow Coimbatore Springboard to witness experts weigh in on how the City has transformed from a textile capital to a multi-sector engineering mecca.",
					],
					[
						'name' => "Nagpur",
						'date'	=> '4th August, 2023',
						'venue' =>	"Pride Hotel, Sonegaon, Nagpur.",
						'promo' => "opUr4lM_r4w",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Nagpur, the Orange City, has always been celebrated as the country's food processing and food manufacturing capital. However, the zero miles city, which marks the country's geographic centerpoint, is now capitalising on its rapidly maturing infrastructure to trim logistics costs and facilitate ease of exports. To learn more about how The City is leveraging location to its advantage to become a logistics capital, join the Leaders of Tomorrow Nagpur Springboard-- one pitstop on our pan India roadshow series, only on ET NOW.",
					],
					[
						'name' => "Goa",
						'date'	=> '18th Aug, 2023',
						'venue' =>	"Pride Sun Village Resort and Spa Goa Saquwadi, Goa.",
						'promo' => "pRY0iWSaFEE",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Goa has always been among India's most desirable tourist destinations, with staycation culture now encouraging property buyers to make a beeline for second homes across the state. The recent launch of the airport in North Goa has dramatically improved accessibility and only added to its cache, with the demand for high-end holiday homes now at an all time high. To decode the supply-demand dynamics in this market, and hear from the experts on why stakeholders across the real estate ecosystem are setting their sights on Goa, join the Leaders of Tomorrow Goa Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Thiruvanathapuram",
						'date'	=> '8th Sept 2023',
						'venue' =>	"Hotel Residency Tower,	Thiruvananthapuram.",
						'promo' => "4dzIMsjWDEI",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Thiruvananthapuram, often referred to as the 'Evergreen City of India' has earned its reputation not only for its scenic locales but also for its prudence in nurturing skills & developing quality talent. The city with its thriving economy & rich demographic dividend, embraces sectors ranging from Aerospace and IT to Tourism & Tea Production & has become a case study for skill development. Joining us at the Leaders of Tomorrow's Thiruvananthapuram Springboard are the trailblazers shaping the Kerala Success Story.  This thrilling event is just one stop on our incredible pan India roadshow series. So, get ready and join us for this exhilarating journey only on ET NOW.
						",
					],
					[
						'name' => "Guwahati",
						'date'	=> '15th September 2023',
						'venue' =>	"The Lily Hotel, Guwahati.",
						'promo' => "DF3pz9f8mVY",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Assam is one of the highest tea-producing areas in the world, responsible for over 80% of India's tea export basket. Guwahati has since made significant strides in diversifying its economy and creating new frontiers for growth, in the retail, manufacturing, and tourism verticals specifically. The gateway to the north east has always leveraged location to its advantage, with trade and transportation contributing a growing lion's share of the state's economy. To discover how Guwahati is championing a series of sunrise sectors emerging across the North East, join us for the Leaders of Tomorrow Guwahati Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Dehradun",
						'date'	=> '29th September 2023',
						'venue' =>	"Seyfert Sarovar Premiere, Dehradun.",
						'promo' => "YGXQE8uN-Hw",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm-Hw",
						'text' => "Nestled amidst the Himalayas, Dehradun is emerging as a dynamic catalyst in Uttarakhand's flourishing startup ecosystem. More than just a gateway to the mountains, this picturesque city embodies innovation & entrepreneurship. Ranging from technological marvels that enhance daily life to eco-conscious initiatives that resonate with sustainability at its core, Uttarakhand's startups are crafting a daring and motivating vision of what can be achieved. Join us at Leaders of Tomorrow's Dehradun Springboard, where we engage with the trailblazing minds that drive Uttarakhand's Startup Ecosystem. As an exciting segment of our expansive pan-India roadshow series, brace yourself and be a part of this exhilarating journey, exclusively on ET NOW.",
					],
					[
						'name' => "Kolkata",
						'date'	=> '5th October 2023',
						'venue' =>	"Hotel Hindustan International (HHI), Kolkata.",
						'promo' => "5VfyhBdEnI4",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Kolkata's role as the rising hub of India-ASEAN connectivity holds immense promise for businesses and regional development. The trilateral highway connecting Kolkata to Bangkok is set to promote economic ties, foster tourism, potentially leading to increased investment and economic growth in the area. With improved accessibility and economic collaboration, there is likely to be immense potential for growth, trade and cultural exchange. As Kolkata emerges as the focal point of this strategic endeavor, businesses are expected to reap substantial benefits such more efficient trade routes, reduced transportation costs, and expanded market access.",
						'text' => "Kolkata's role as the rising hub of India-ASEAN connectivity holds immense promise for businesses and regional development. The trilateral highway connecting Kolkata to Bangkok is episodesto promote economic PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm, foster tourism, potentially leading to increased investment and economic growth in the area. With improved accessibility and economic collaboration, there is likely to be immense potential for growth, trade and cultural exchange. As Kolkata emerges as the focal point of this strategic endeavor, businesses are expected to reap substantial benefits such more efficient trade routes, reduced transportation costs, and expanded market access.",
					],
					[
						'name' => "Bhubaneswar",
						'date'	=> '13th October 2023',
						'venue' =>	"Pal Heights Jayadev Vihar, Bhubaneswar.",
						'promo' => "_kXAaNHuK0k",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Bhubaneswar, often referred to as the \"Temple City of India,\" combines a rich cultural heritage with a rapidly growing economy, making it an ideal destination for entrepreneurs and small business owners. Odisha's business friendly government initiatives, such as Make in Odisha & Startup Odisha have created a conducive ecosystem for entrepreneurs to establish and grow their ventures. Join us at the Leaders of Tomorrow’s Bhubaneswar Springboard as we put the spotlight on the city becoming the Eastern Hub for Small Businesses and engage with the key players driving sustainable economic growth. ",
					],
					[
						'name' => "Bhopal",
						'date'	=> '27th October 2023',
						'venue' =>	"32/7, Lalita Nagar, Bhopal.",
						'promo' => "kHJLmg4n8ek",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "With the government of Madhya Pradesh heavily incentivising homegrown manufacturing, Bhopal has emerged as the state's leading industrial hub, drawing exponential investment across its pharmaceutical, automobile, textile and electrical goods sectors. To shed more light on how the city is enticing investors to partake in MP's industrial transformation -- join the Leaders of Tomorrow Bhopal Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Lucknow",
						'date'	=> '3rd November 2023',
						'venue' =>	"Golden Tulip, Lucknow.",
						'promo' => "dm9ZoN4caAY",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Lucknow is emerging as a pivotal player in shaping the Smart City vision of the region as Uttar Pradesh sets its eyes on becoming a $1 trillion dollar economy. With its deep-rooted historical significance and a harmonious blend of modern development, Lucknow is poised to become a model for other cities as it aims to create an interconnected urban ecosystem. To uncover the role Lucknow's rapidly maturing infrastructural and industrial landscape will play in enhancing ease of doing business alongside promoting cross-sector growth, join the Leaders of Tomorrow Lucknow Springboard-- one pitstop on our pan India roadshow series, only on ET NOW.",
					],
					[
						'name' => "Mumbai",
						'date'	=> '21st December 2023',
						'venue' =>	"Taj Lands End, Mumbai.",
						'promo' => "sYe3B8D79lI",
						'episodes' => "PL51KTBvlQFEEU9-fHg0Sa5tIjhlAfnHEm",
						'text' => "Exploring Mumbai's dynamic landscape as the gateway to opportunities, we highlight the city's booming finance, corporate and startup industries while spotlighting how inter-city infrastructure developments are set to redefine Mumbai's future.",
					],
				];
				$this->data['awards']["winners"] = [
					[
						'name' => "Iotechworld Avigation",
						'category' => "Technology – IT/ITES & Telecommunication"
					],
					[
						'name' => "Rotex Automation",
						'category' => "Automobiles & OEM"
					],
					[
						'category' => "Health, Wellness and Ayurveda",
						'name' => "Orthotech India",
					],
					[
						'category' => "Packaging Products & Solutions",
						'name' => "Ecolastic Products",
					],
					[
						'category' => "Travel and Hospitality",
						'name' => "Prasanna Purple Mobility Solutions",
					],
					[
						'category' => "Home & Décor",
						'name' => "Dileep Essentials",
					],
					[
						'category' => "Construction & Real Estate",
						'name' => "Tvasta Manufacturing Solutions",
					],
					[
						'category' => "EdTech and Skill Development",
						'name' => "Ascorb Technologies",
					],
					[
						'category' => "Electrical & Electronics",
						'name' => "Tsecond Generation Technology",
					],
					[
						'category' => "Logistics & Service Delivery",
						'name' => "Gujarat Logistics",
					],
					[
						'category' => "Green Solutions provider of the Year",
						'name' => "Freyr Energy Services",
					],
					[
						'category' => "Green Solutions provider of the Year",
						'name' => "Hasiru Dala Innovations",
					],
					[
						'category' => "Fashion Jewellery & Lifestyle",
						'name' => "SAP Jewels",
					],
					[
						'category' => "Manufacturing",
						'name' => "JS Technochem",
					],
					[
						'category' => "Organic Products",
						'name' => "Vaninfosys Technologies",
					],
					[
						'category' => "Personal care & Hygiene Products",
						'name' => "Navashya Consumer Products (Superbottoms)",
					],
					[
						'category' => "Restaurants and F&B",
						'name' => "Pagariya Food Products",
					],
					[
						'category' => "Young Entrepreneur of the Year",
						'name' => "Mohd Hamza, MD, Engineering & Environmental Solutions",
					],
					[
						'category' => "Women Entrepreneur of the Year",
						'name' => "Smt. Jayashree Nair, MD, BDH Industries",
					],
					[
						'category' => "Entrepreneur of the Year",
						'name' => "Mr. Swarup Bose, Founder & CEO, Celcius Logistics Solutions",
					],
				];
				$this->data['awards']['live'] = "gF5_3m-rS2A?si=7__x3paYx0udxCkk";

				$this->load->page('history/11/home', $this->data);
				break;

			default:
				redirect('history');
				break;
		}
	}

	public function season_awards($number)
	{
		$this->data['season'] = $number;
		switch ($number) {
			case '12':
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
					[
						'photo' => "Nilesh_Lele.png",
						'name' => "Nilesh Lele",
						'description' => "President, Chamber for Advancement of Small & Medium Businesses",
					],
					[
						'photo' => "Prashant_Naigaonkar.png",
						'name' => "Prashant Naigaonkar",
						'description' => "Startup Mentor and SME Advisor",
					],
				];
				$this->data['chief_guest'] = [
					[
						'photo' => "Anurag_Thakur.png",
						'name' => "Anurag Singh Thakur",
						'description' => "Former Union Minister, Chairman, Parliamentary Standing Committee on Coal, Mines & Steel",
					],
				];
				$this->data['speakers'] = [
					[
						'photo' => "Aman_Gupta.png",
						'name' => "Aman Gupta",
						'description' => "Co-Founder & CMO, boAt Lifestyle",
					],
					[
						'photo' => "Ashishkumar_Chauhan.png",
						'name' => "Ashishkumar Chauhan",
						'description' => "MD & CEO, NSE",
					],
					[
						'photo' => "Akis_Evangelidis.png",
						'name' => "Akis Evangelidis",
						'description' => "Co-Founder & India President, Nothing",
					],
					[
						'photo' => "Padmaja_Ruparel.png",
						'name' => "Padmaja Ruparel",
						'description' => "Co-Founder, IAN Group",
					],
					[
						'photo' => "A_Velumani.png",
						'name' => "Dr A Velumani",
						'description' => "Creator, Thyrocare",
					],
					[
						'photo' => "Radha_Kirthivasan.png",
						'name' => "Radha Kirthivasan",
						'description' => "Head, Listing and SME, BSE",
					],
					[
						'photo' => "Vivek_Gambhir.png",
						'name' => "Vivek Gambhir",
						'description' => "Venture Partner, Lightspeed India",
					],
					[
						'photo' => "Anisha_Singh.png",
						'name' => "Anisha Singh",
						'description' => "Founder, She Capital",
					],
					[
						'photo' => "Bert_Mueller.png",
						'name' => "Bert Mueller",
						'description' => "Founder, California Burrito",
					],
					[
						'photo' => "Spencer_Schneier.png",
						'name' => "Spencer Schneier",
						'description' => "Founder, Commenda",
					],
					// [
					// 	'photo' => "Anand_Mane.png",
					// 	'name' => "Anand Mane",
					// 	'description' => "Founder, Joul",
					// ],
				];
				$this->data['live'] = "gF5_3m-rS2A?si=7__x3paYx0udxCkk";
				$this->data['partners'] = [
					[
						'text' => "Presenting Partner",
						'logo' => "idfc.png",
						'url' => null,
					],
					[
						'text' => "Associate Partner",
						'logo' => "adani.png",
						'url' => null,
					],
					[
						'text' => "Education Partner",
						'logo' => "bennett.png",
						'url' => null,
					],
				];
				$this->data['winners'] = [
					[
						'organization' => "Plant Remedies",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in Agri-Tech and Allied Services",
						'gallery' => [
							'main' => "PlantRemedies.jpg",
							'thumb' => "thumbs/PlantRemedies.jpg"
						]
					],
					[
						'organization' => "Synnova Gears And Transmissions",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in Automobiles & Electric Vehicle",
						'gallery' => [
							'main' => "Synnova.jpg",
							'thumb' => "thumbs/Synnova.jpg"
						]
					],
					[
						'organization' => "Razzmatazz Design",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in Lifestyle and Consumer Products",
						'gallery' => [
							'main' => "Razzmatazz.jpg",
							'thumb' => "thumbs/Razzmatazz.jpg"
						]
					],
					[
						'organization' => "Pluckk",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in Food Processing & Packaging",
						'gallery' => [
							'main' => "Pluckk.jpg",
							'thumb' => "thumbs/Pluckk.jpg"
						]
					],
					[
						'organization' => "Jeevitam Livelihood Tech Solutions",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in EdTech and Skill Development",
						'gallery' => [
							'main' => "Jeevitam.jpg",
							'thumb' => "thumbs/Jeevitam.jpg"
						]
					],
					[
						'organization' => "Autosys Industrial Solutions",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in Manufacturing",
						'gallery' => [
							'main' => "Autosys.jpg",
							'thumb' => "thumbs/Autosys.jpg"
						]
					],
					[
						'organization' => "Global Engineers",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in Family Business Leadership",
						'gallery' => [
							'main' => "Global.jpg",
							'thumb' => "thumbs/Global.jpg"
						]
					],
					[
						'organization' => "Starkenn Technologies",
						'organization' => "Whiteklay Technologies",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in IT/ITES and Electronics",
						'gallery' => [
							'main' => "Whiteklay.jpg",
							'thumb' => "thumbs/Whiteklay.jpg"
						]
					],
					[
						'organization' => "Vipragen Biosciences",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in Health, Wellness & Ayurveda",
						'gallery' => [
							'main' => "Vipragen.jpg",
							'thumb' => "thumbs/Vipragen.jpg"
						]
					],
					[
						'organization' => "Enerture Technologies",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in Digital Transformation",
						'gallery' => [
							'main' => "Enerture.jpg",
							'thumb' => "thumbs/Enerture.jpg"
						]
					],
					[
						'organization' => "Microlit",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Global Business Leadership Award",
						'gallery' => NULL
					],
					[
						'organization' => "Swachh Sustainable Solutions",
						'type' => 'INDIVIDUAL',
						'person' => "Rahul Nainani",
						'designation' => "CEO & Co-Founder",
						'category' => "Social Impact Entrepreneur of the Year",
						'gallery' => [
							'main' => "Swachh.jpg",
							'thumb' => "thumbs/Swachh.jpg"
						]
					],
					[
						'organization' => "AWL India",
						'type' => 'INDIVIDUAL',
						'person' => "Rahul Mehra",
						'designation' => "Founder & CEO",
						'category' => "Entrepreneur of the Year",
						'gallery' => [
							'main' => "AWL.jpg",
							'thumb' => "thumbs/AWL.jpg"
						]
					],

					[
						'organization' => "Urban Monk",
						'type' => 'INDIVIDUAL',
						'person' => "Ruchika Bhuwalka",
						'designation' => "Founder",
						'category' => "Women Entrepreneur of the Year",
						'gallery' => [
							'main' => "UrbanMonk.jpg",
							'thumb' => "thumbs/UrbanMonk.jpg"
						]
					],
					[
						'organization' => "Prathibha Biotech",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "Excellence in Green Revolution",
						'gallery' => [
							'main' => "Prathibha.jpg",
							'thumb' => "thumbs/Prathibha.jpg"
						]
					],
					[
						'organization' => "KAMA International Organic",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "IDFC FIRST Bank Rising Star",
						'gallery' => [
							'main' => "KAMA.jpg",
							'thumb' => "thumbs/KAMA.jpg"
						]
					],
					[
						'organization' => "Manjha Technologies",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "IDFC FIRST Bank Rising Star",
						'gallery' => [
							'main' => "Manjha.jpg",
							'thumb' => "thumbs/Manjha.jpg"
						]
					],
					[
						'organization' => "Ayurveda House",
						'type' => 'MSME',
						'person' =>  NULL,
						'designation' =>  NULL,
						'category' => "IDFC FIRST Bank Rising Star",
						'gallery' => [
							'main' => "Ayurveda.jpg",
							'thumb' => "thumbs/Ayurveda.jpg"
						]
					],
				];

				$this->load->model('event/awards/CategoryModel');
				$this->data['categories']['all'] = [
					[
						'id' => 1,
						'name' => 'Excellence in IT/ITES and Electronics',
						'code' => 2881,
						'type' => '1_MSME',
					],
					[
						'id' => 2,
						'name' => 'Excellence in Automobiles & Electric Vehicle',
						'code' => 2882,
						'type' => '2_MSME',
					],
					[
						'id' => 3,
						'name' => 'Excellence in Health, Wellness and Ayurveda',
						'code' => 2883,
						'type' => '3_MSME',
					],
					[
						'id' => 4,
						'name' => 'Excellence in Food Processing & Packaging',
						'code' => 2884,
						'type' => '4_MSME',
					],
					[
						'id' => 5,
						'name' => 'Excellence in Manufacturing',
						'code' => 2885,
						'type' => '5_MSME',
					],
					[
						'id' => 6,
						'name' => 'Excellence in Lifestyle and Consumer Products',
						'code' => 2886,
						'type' => '6_MSME',
					],
					[
						'id' => 7,
						'name' => 'Excellence in E-Commerce and Service Delivery',
						'code' => 2887,
						'type' => '7_MSME',
					],
					[
						'id' => 8,
						'name' => 'Excellence in EdTech and Skill Development',
						'code' => 2888,
						'type' => '8_MSME',
					],
					[
						'id' => 9,
						'name' => 'Excellence in Agri-Tech and Allied Services',
						'code' => 2889,
						'type' => '9_MSME',
					],
					[
						'id' => 10,
						'name' => 'Excellence in Digital Transformation',
						'code' => 2900,
						'type' => '1_DIGITAL',
					],
					[
						'id' => 11,
						'name' => 'Excellence in Family Business Leadership',
						'code' => 2911,
						'type' => '1_FAMILY',
					],
					[
						'id' => 12,
						'name' => 'Global Business Leadership Award',
						'code' => 2921,
						'type' => '1_GLOBAL',
					],
					[
						'id' => 13,
						'name' => 'Social Impact Entrepreneur of The Year',
						'code' => 2931,
						'type' => '1_INDIVIDUAL',
					],
					[
						'id' => 14,
						'name' => 'Young Entrepreneur of The Year',
						'code' => 2932,
						'type' => '2_INDIVIDUAL',
					],
				];
				// echo "<pre>";
				// print_r($this->data);
				// die;
				$this->load->page('history/12/awards', $this->data);
				break;

			default:
				redirect('history/season-' . $number);
				break;
		}
	}
}

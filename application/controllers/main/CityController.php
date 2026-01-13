<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class CityController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('directory');
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
					'banner' => true,

					'gallery' => true,
					'date' => "2025-08-22 19:00:00",
					'venue' => 'Mumbai',
					'theme' => [
						'title' => 'Mumbai: Purpose, Progress & Prosperity',
						'description' => "Bold thinkers, visionary leaders & emerging changemakers come together in Mumbai to explore the future of finance, innovation & leadership. In the heart of India's financial capital, we reimagine growth - not just as an economic goal, but as a mission driven by purpose. From scaling ambition to navigating disruption, join us at our first <strong class='text-red'>Leaders of Tomorrow Season 13 Springboard</strong> in the city of Mumbai.",
						'embed' => 'https://www.youtube.com/embed/dnMJ5hLuEtA?si=Y0fdaLqpGQ1rRCJw',
					],
					'partners' => [
						[
							'text' => 'Powered By',
							'logo' => 'tata-tele.png',
							'url' => "https://www.tatatelebusiness.com/"
						]
					],
					'guests' => [
						[
							'photo' => "Mangal_Lodha.png",
							'name' => "Mangalprabhat Lodha",
							'description' => "Minister Skills, Employment, Entrepreneurship & Innovation, Maharashtra",
						],
					],
					'speakers' => [
						[
							'photo' => "Ashish_Singh.png",
							'name' => "Ashish Singh",
							'description' => "Head, Retail Liabilities, IDFC FIRST Bank",
						],
						[
							'photo' => "Harjit_Singh.png",
							'name' => "Harjit Singh",
							'description' => "Managing Director, Tata Teleservices",
						],
						[
							'photo' => "Naiyya_Saggi.png",
							'name' => "Naiyya Saggi",
							'description' => "Founder, Edition",
						],
						[
							'photo' => "RS_Subramanian.png",
							'name' => "RS Subramanian",
							'description' => "SVP, South Asia, DHL Express",
						],
						[
							'photo' => "Vishal_Rally.png",
							'name' => "Vishal Rally",
							'description' => "President & Chief Revenue Officer, Tata Teleservices",
						],
						[
							'photo' => "Ashutosh_Limaye.png",
							'name' => "Ashutosh Limaye",
							'description' => "Director & Co-Head, Anarock Property Consultants",
						],
						[
							'photo' => "Neha_Motwani.png",
							'name' => "Neha Motwani",
							'description' => "CEO & Founder, Luma Fertility",
						],
						[
							'photo' => "Radhika_Bajoria.png",
							'name' => "Radhika Bajoria",
							'description' => "Founder, Radically Yours ",
						],

					],
					// 	'register' => "btn_cf43dc552efc"
				];

				break;
			case 'gurugram':
				$this->data['page'] = [
					'title' => "Gurugram Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Gurugram",
					'banner' => true,
					// 	'agenda' => true,
					// 	'register' => "btn_56a27aa9652e",
					'gallery' => true,
					'date' => "2025-09-05 19:00:00",
					'venue' => 'Gurugram',
					'theme' => [
						'title' => "Gurugram: India's New-Age Startup Capital",
						'description' => 'Gurugram is emerging as India’s new-age startup capital, to shape the next chapter of Indian economic growth. From IT and EV to D2C and quick commerce, the city is powering some of India’s fastest-growing sectors. Join us as we explore how ambition, technology and resilience are building world-class businesses at <strong class="text-red">Leaders of Tomorrow Season 13 Springboard in Gurugram</strong> -  a pivotal stop on our pan-India roadshow series, only on ET NOW',
						'embed' => 'https://www.youtube.com/embed/lEWIgpAzKks?si=h_ckUSjBbvb2xJ6F',
					],

					'speakers' => [
						[
							'photo' => "Bharat_Goyal.png",
							'name' => "Bharat Goyal",
							'description' => "Zonal Head-North, IDFC FIRST Bank",
						],
						[
							'photo' => "Swati_Bhargava.png",
							'name' => " Swati Bhargava",
							'description' => "Co-Founder, CashKaro & EarnKaro",
						],
						// [
						// 	'photo' => "Vinod_Khandelwal.png",
						// 	'name' => "Vinod Khandelwal",
						// 	'description' => "State President, Haryana Chamber of Commerce & Industry",
						// ],
						[
							'photo' => "Pranav_Poddar.png",
							'name' => "Pranav Poddar",
							'description' => "Senior Member, Young Business Leader Forum, PHDCCI",
						],
						[
							'photo' => "Aviral_Gupta.png",
							'name' => "Aviral Gupta",
							'description' => "Group CEO, Zostel & Zo",
						],
						[
							'photo' => "Nikhil_Sareen.png",
							'name' => "Nikhil Sareen",
							'description' => "Co-Founder, Qubo",
						],
					],
				];
				break;
			case 'hyderabad':
				$this->data['page'] = [
					'title' => "Hyderabad Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Hyderabad",
					'date' => "2025-09-19 19:00:00",
					'venue' => 'Hyderabad',
					'banner' => true,
					'gallery' => true,
					'theme' => [
						'title' => 'Hyderabad: Booming Real Estate in Cyberabad',
						'description' => "An unprecedented real estate surge is emerging in Hyderabad, driven by the thriving IT industry, bringing an influx of talent to the city’s urban landscape. <br>
                                            Join <strong class='text-red'>ET NOW #LeadersOfTomorrow Springboard</strong> to explore how Hyderabad has become a tech-driven property powerhouse and top destination for real estate investors globally.",
						'embed' => 'https://www.youtube.com/embed/5t7q9cYlLys?si=ZkyzgWnzKxAtbxmN',
					],
					'partners' => [
						[
							'text' => 'Powered By',
							'logo' => 'tata-tele.png',
							'url' => "https://www.tatatelebusiness.com/"
						]
					],
					'speakers' => [
						[
							'photo' => "Nirish_Lalan.png",
							'name' => "Nirish Lalan",
							'description' => "Zonal Head – South, IDFC FIRST Bank",
						],
						[
							'photo' => "Vishal_Rally.png",
							'name' => "Vishal Rally",
							'description' => "President & Chief Revenue Officer, Tata Teleservices",
						],
						[
							'photo' => "Prathibha_Kunda.png",
							'name' => "Prathibha Kunda",
							'description' => "Chairperson, FICCI FLO Hyderabad",
						],
						[
							'photo' => "Sandip_Patnaik.png",
							'name' => "Sandip Patnaik",
							'description' => "Sr. Managing Director & Board of Director, JLL India",
						],
						[
							'photo' => "Aravindbabu_Ramaraju.png",
							'name' => "Aravind Babu Ramaraju",
							'description' => "Head - Real Estate, Workplace Services (India), LTIMindtree",
						],

					],
				];
				break;
			case 'pune':
				$this->data['page'] = [
					'title' => "Pune Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Pune",
					'date' => "2025-10-15 19:00:00",
					'venue' => 'Hotel Novotel, Pune',
					'banner' => true,
					'gallery' => true,
					// 	'agenda' => true,
					'partners' => [
						[
							'text' => 'Powered By',
							'logo' => 'tata-tele.png'
						]
					],
					'theme' => [
						'title' => "Pune: At the Forefront of skilled growth & innovation",
						'description' => 'Pune stands at the forefront of skilling, innovation, and growth, powered by one of the highest employability rates in the country. With a thriving IT, manufacturing, and startup ecosystem, the city is shaping the future of work and enterprise.<br>
 							To explore how this city is redefining India’s urban landscape, join <strong class="text-red">Leaders of Tomorrow Pune Springboard</strong>.',
						'embed' => 'https://www.youtube.com/embed/t-k3m8_fvY8',
					],
					// 	'register' => "btn_d1f982455c9c",
					'speakers' => [
						[
							'photo' => "Vishal_Rally.png",
							'name' => "Vishal Rally",
							'description' => "Chief Revenue Officer, Tata Teleservices",
						],
						[
							'photo' => "Ramakrishnan_Raman.png",
							'name' => "Dr. Ramakrishnan Raman",
							'description' => "Vice Chancellor, Symbiosis International (Deemed University)",
						],
						[
							'photo' => "Ganesh_Natarajan.png",
							'name' => "Ganesh Natarajan",
							'description' => "Chairman, 5F World & Honeywell Automation",
						],
						[
							'photo' => "Payal_Rajpal.png",
							'name' => "Payal Rajpal",
							'description' => "Director, Robotex India",
						],
						[
							'photo' => "Shazia_Khan.png",
							'name' => "Shazia Khan",
							'description' => "Zonal Head- West, IDFC FIRST Bank",
						],
					],
				];
				break;
			case 'lucknow':
				$this->data['page'] = [
					'title' => "Lucknow Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Lucknow",
					'date' => "2025-10-31 19:00:00",
					'venue' => 'Golden Tulip, Lucknow',
					'theme' => [
						'title' => "Lucknow: Engine of Growth & Governance in the Heart of UP",
						'description' => 'Lucknow is emerging as the engine of growth and governance in the heart of Uttar Pradesh, driven by strong infrastructure, administrative efficiency and a growing business ecosystem. With strategic government initiatives, improved connectivity and skilled workforce, the city is attracting investments across sectors. To understand how Lucknow is shaping the future of entrepreneurship in the state, join <strong class="text-red">Leaders of Tomorrow Lucknow Springboard</strong>. - one pit stop on our pan-India roadshow series, only on ET NOW.',
						'embed' => 'https://www.youtube.com/embed/DH3aOptcmu0?si=ZW15NRGNXPGm_s0F'
					],
					// 	'register' => "btn_7481017a2494",
					'banner' => true,
					// 	'agenda' => true,
					'gallery' => true,
					'speakers' => [
						[
							'photo' => "Madhukar_Pant.png",
							'name' => "Madhukar Pant",
							'description' => "Business Head-Loan Against Property, IDFC FIRST Bank"
						],
						[
							'photo' => "Jayant_Krishna.png",
							'name' => "Jayant Krishna",
							'description' => "Former CEO, NSDC | Senior Fellow, Chair in US-India Policy Studies, CSIS"
						],
						[
							'photo' => "Dinesh_Goyal.png",
							'name' => "Dinesh Goyal",
							'description' => "President, Indian Industries Association"
						],
						[
							'photo' => "Prateek_Rastogi.png",
							'name' => "Prateek Rastogi",
							'description' => "Founder & CEO, Better Nutrition & Greenday"
						],
						[
							'photo' => "Bhaavya_Kapur.png",
							'name' => "Bhaavya Kapur",
							'description' => "Founder, BK Makeup Studio and Academy"
						],
					],
				];
				break;
			case 'chennai':
				$this->data['page'] = [
					'title' => "Chennai Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Chennai",
					'date' => "2025-11-14 19:00:00",
					'venue' => 'Chennai',
					'partners' => [
						[
							'text' => 'Powered By',
							'logo' => 'tata-tele.png',
							'url' => "https://www.tatatelebusiness.com/"
						]
					],
					'theme' => [
						'title' => "Chennai: The Industrial Powerhouse Of South India ",
						'description' => 'Chennai is gearing up to showcase why it’s hailed as South India’s industrial powerhouse! From automotive to electronics and aerospace, the city continues to set the pace for India’s manufacturing future. Catch the <strong class="text-red">Leaders of Tomorrow Chennai Springboard on 14th November</strong> — mark your calendars',
						'embed' => 'https://www.youtube.com/embed/Uttx8h4NUKk?si=LGz8bqRIYTBNsAp-'
					],
					// 	'register' => "btn_f2b8650f63e7",
					'banner' => true,
					// 	'agenda' => true,
					'gallery' => true,
					'speakers' => [
						[
							'photo' => "Prakash_Venkatrao.png",
							'name' => "Prakash Venkatrao",
							'description' => "Head Client Coverage-South, IDFC FIRST Bank",
						],
						[
							'photo' => "Anvize_Rodrigues.png",
							'name' => "Anvize Rodrigues",
							'description' => "Chief Information Officer, Tata Teleservices",
						],
						[
							'photo' => "Vikram_Srinivas.png",
							'name' => "Vikram Srinivas",
							'description' => "Office Managing Partner-Chennai, KPMG in India",
						],
						[
							'photo' => "Dr_Arunkumar.png",
							'name' => "Dr. Arunkumar Govindarajan",
							'description' => "ED & Radiologist, Aarthi Scans & Labs",
						],
						[
							'photo' => "AS_Keshav.png",
							'name' => "AS Keshav",
							'description' => "CEO & Co-Founder, KS Smart Solutions",
						],
					]
				];
				break;
			case 'indore':
				$this->data['page'] = [
					'title' => "Indore Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Indore",
					// 	'agenda' => true,
					'gallery' => true,
					'date' => "2025-11-28 19:00:00",
					'venue' => 'Sheraton Grand Palace',
					'theme' => [
						'title' => "Indore: Building Businesses in the Heart of India",
						'description' => 'Indore, the commercial capital of Madhya Pradesh, thrives as a hub of manufacturing, textiles, pharmaceuticals, and emerging startups. With a strong focus on sustainability, cleanliness, and innovation, Indore is redefining what it means to build businesses in the heart of India. To explore how Indore is powering Central India’s growth story, join <strong class="text-red">Leaders of Tomorrow Indore Springboard</strong> - one pitstop on our pan-India roadshow series, only <strong class="text-red">on 28th of November, 2025</strong>',
						'embed' => 'https://www.youtube.com/embed/0KTi1KiRwvM'
					],
					'speakers' => [
						[
							'photo' => "Sumeer_Raina.png",
							'name' => "Sumeer Raina",
							'description' => "Business Head, Business Loans & SEPL, IDFC FIRST Bank",
						],
						[
							'photo' => "Punyashlok_Dwibedy.png",
							'name' => "Dr. Punyashlok Dwibedy",
							'description' => "Assistant Professor, Strategic Management & Chairperson, IIO, IIM Indore",
						],
						[
							'photo' => "Yugansh_Soni.png",
							'name' => "Yugansh Soni",
							'description' => "Founder, Laabham group",
						],
						// 		[
						// 			'photo' => "Anupama_Modi.png",
						// 			'name' => "Anupama Modi",
						// 			'description' => "COO, AIIH Foundation",
						// 		],
						[
							'photo' => "Shweta_Agarwal.png",
							'name' => "Shweta Agarwal",
							'description' => "Chairperson, FICCI FLO Indore",
						],

					],
					'banner' => true,
					// 	'register' => "btn_064b0b816ca1",
				];
				break;
			case 'bengaluru':
				$this->data['page'] = [
					'title' => "Bengaluru Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Bengaluru",
					// 	'agenda' => true,
					'date' => "2025-12-10 19:00:00",
					'venue' => 'The Zuri Whitefield, Bengaluru',
					'gallery' => true,
					'theme' => [
						'title' => "Bengaluru: Shaping India’s Global Tech Identity",
						'description' => 'Bengaluru’s innovation story takes centre stage as we bring the Springboard to the heart of India’s tech hub on <strong class="text-red">10th December </strong>. Join us for insights, conversations, and growth opportunities for MSMEs. Mark your calendars.',
						'embed' => 'https://www.youtube.com/embed/-WAC9WgjzJk'
					],
					'speakers' => [
						// 		[
						// 			'photo' => "Girish_Malhotra.png",
						// 			'name' => "Girish Malhotra",
						// 			'description' => "Head New Economy Group, IDFC FIRST Bank",
						// 		],
						[
							'photo' => "Pravir_Dahiya.png",
							'name' => "Pravir Dahiya",
							'description' => "Chief Technology Officer, Tata Teleservices",
						],
						[
							'photo' => "Madan_Padaki.png",
							'name' => "Madan Padaki",
							'description' => "President, TiE Bengaluru",
						],
						[
							'photo' => "Sahmita_R.png",
							'name' => "Sahmita R",
							'description' => "Founding CEO, Resilience AI",
						],
						[
							'photo' => "Bhaskar_Verma.png",
							'name' => "Bhaskar Verma",
							'description' => "Regional Director, Board Member, Nasscom, Karnataka Digital Economy Mission ",
						],

					],
					'banner' => true,
					'register' => "btn_159777224b9b",
					'partners' => [
						[
							'text' => 'Powered By',
							'logo' => 'tata-tele.png'
						]
					],

				];
				break;
			case 'coimbatore':
				$this->data['page'] = [
					'title' => "Coimbatore Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Coimbatore",
					'agenda' => true,
					'banner' => true,
					'gallery' => true,
					'date' => "2025-12-19 19:00:00",
					'venue' => 'Le Meridian, Coimbatore',
					'theme' => [
						'title' => "Coimbatore: India’s China Plus One MSME Hub",
						'description' => 'Once a textile mill town, Coimbatore has transformed into Tamil Nadus second-largest city and an industrial powerhouse in just ten years. Fueled by an 84% literacy rate and diverse manufacturing capabilities, this rising hub now attracts US and European companies seeking a compelling alternative to China for their production needs. To discover how MSMEs can capitalise this momentum, join us at the <strong class="text-red">Coimbatore Springboard – one pitstop on our pan India roadshow series </strong>, <strong class="text-red">on the 19th of December 2025</strong>',
						'embed' => 'https://www.youtube.com/embed/EPJ-yMm9V_A',
					],
					'speakers' => [
						[
							'photo' => "Anto_Alan.png",
							'name' => "Anto Alan",
							'description' => "Head - Business Banking & Agri, IDFC FIRST Bank",
						],
						[
							'photo' => "Aparna_Sunku.png",
							'name' => "Aparna Sunku",
							'description' => "Chairperson,Federation of Indian Chambers of Commerce & Industry Ladies Organisation (FICCI FLO), Coimbatore Chapter",
						],
						[
							'photo' => "Rajiv_Sundar.png",
							'name' => "Rajiv Sundar",
							'description' => "Partner, Deloitte India",
						],
						[
							'photo' => "S_Manikandan.png",
							'name' => "S Manikandan",
							'description' => "Board Member & Chair,Southern India Chamber of Commerce and Industry (SICCI)",
						],
						[
							'photo' => "M_Karthikeyan.png",
							'name' => "M Karthikeyan",
							'description' => "President , CODISSIA",
						],

					],
					'register' => "btn_702175a4b3d4",
				];
				break;
			case 'delhi':
				$this->data['page'] = [
					'title' => "Delhi Springboard" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city'] = [
					'name' => "Delhi",
					// 	'agenda' => true,
					'banner' => true,
					'date' => "2026-01-09 19:00:00",
					'venue' => 'Taj Palace, Panchi Bagh, Chanakyapuri',
					// 	'theme' => [
					// 					'title' => "Delhi: Where Policy Meets Progress",
					// 					'description' => '',
					// 					'embed' => '',
					// 				],
					'speakers' => [
						[
							'photo' => "Harjit_Singh.png",
							'name' => "Harjit Singh",
							'description' => "Managing Director, Tata Teleservices",
						],
						[
							'photo' => "Roopak_Jain.png",
							'name' => "Roopak Jain",
							'description' => "Head Corporate Coverage, IDFC FIRST Bank",
						],
						[
							'photo' => "Lalit_Agarwal.png",
							'name' => "Lalit Agarwal",
							'description' => "Founder & MD, V- Mart Retail & Co-Chair, FICCI Retail & Internal Trade Committee",
						],
						[
							'photo' => "Manish_Singhal.png",
							'name' => "Manish Singhal",
							'description' => "Secretary General, ASSOCHAM",
						],
						[
							'photo' => "Rajiv_Chawla.png",
							'name' => "Rajiv K Chawla",
							'description' => " Chairman, IamSMEofIndia & JaiRaj Group",
						],
					],
					'partners' => [
						[
							'text' => 'Powered By',
							'logo' => 'tata-tele.png'
						]
					],
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
				$this->data['city']['partners'] = [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png',
						'url' => "https://www.tatatelebusiness.com/"
					]
				];
				$this->load->city_view('gallery', $this->data);
				break;
			case 'gurugram':
				$this->data['page'] = [
					'title' => "Gurugram Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Gurugram";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'hyderabad':
				$this->data['page'] = [
					'title' => "Hyderabad Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Hyderabad";
				$this->data['city']['partners'] = [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png',
						'url' => "https://www.tatatelebusiness.com/"
					]
				];
				$this->load->city_view('gallery', $this->data);
				break;
			case 'pune':
				$this->data['page'] = [
					'title' => "Pune Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Pune";
				$this->data['city']['partners'] = [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png',
						'url' => "https://www.tatatelebusiness.com/"
					]
				];
				$this->load->city_view('gallery', $this->data);
				break;
			case 'chennai':
				$this->data['page'] = [
					'title' => "Chennai Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Chennai";
				$this->data['city']['partners'] = [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png',
						'url' => "https://www.tatatelebusiness.com/"
					]
				];
				$this->load->city_view('gallery', $this->data);
				break;
			case 'lucknow':
				$this->data['page'] = [
					'title' => "Lucknow Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Lucknow";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'indore':
				$this->data['page'] = [
					'title' => "Indore Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Indore";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'bengaluru':
				$this->data['page'] = [
					'title' => "Bengaluru Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Bengaluru";
				$this->load->city_view('gallery', $this->data);
				break;
			case 'coimbatore':
				$this->data['page'] = [
					'title' => "Coimbatore Springboard Gallery" . " • " . APP_NAME . " " . date('Y'),
				];
				$this->data['city']['name'] = "Coimbatore";
				$this->load->city_view('gallery', $this->data);
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

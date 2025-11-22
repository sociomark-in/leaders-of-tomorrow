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
					// 	'agenda' => true,
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
					'theme' => [
						'title' => "Pune: At the Forefront of skilled growth & innovation",
						'description' => 'Pune stands at the forefront of skilling, innovation, and growth, powered by one of the highest employability rates in the country. With a thriving IT, manufacturing, and startup ecosystem, the city is shaping the future of work and enterprise.<br>
 							To explore how this city is redefining India’s urban landscape, join <strong class="text-red">Leaders of Tomorrow Pune Springboard</strong>.',
						// 	'embed' => '',
					],
					// 	'agenda' => true,
					'register' => "btn_d1f982455c9c",
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
						// [
						// 	'photo' => "Shazia_Khan.png",
						// 	'name' => "Shazia Khan",
						// 	'description' => "Zonal Head- West, IDFC FIRST Bank",
						// ],
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
				$this->data['city']['partners'] = [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png',
						'url' => "https://www.tatatelebusiness.com/"
					]
				];
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
				$this->data['city'] = [
					'name' => "Pune",
					'partners' => [
						[
							'text' => 'Powered By',
							'logo' => 'tata-tele.png',
							'url' => "https://www.tatatelebusiness.com/"
						]
					],
				];
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

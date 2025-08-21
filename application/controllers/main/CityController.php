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
					'agenda' => true,
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
					'register' => "btn_cf43dc552efc"
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

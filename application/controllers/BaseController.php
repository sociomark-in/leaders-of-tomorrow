<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BaseController extends CI_Controller
{
	public $cities, $data, $PANEL_URL;
	public function __construct()
	{
		parent::__construct();
		$this->PANEL_URL = "admin-panel";
		$this->springboards = [
			[
				'name' => "Mumbai",
				'theme' => "Galvanizing India's MSMEs to Seize Global Opportunities",
				'date' => '2024-08-29 17:00:00',
				'venue' => "Taj Lands End, Mumbai"
			],
			[
				'name' => "Lucknow",
				'theme' => "Charting Uttar Pradesh's Trillion-Dollar Journey",
				'date' => '2024-09-13 17:00:00',
				'venue' => "Hilton Garden Inn, Lucknow"
			],
			[
				'name' => "Chandigarh",
				'theme' => "A Case Study For Ease Of Doing Business",
				'date' => '2024-09-27 17:00:00',
				'venue' => "Hometel, Industrial Area Phase 1, Chandigarh"
			],
			[
				'name' => "Hyderabad",
				'theme' => "Hyderabad: India's Manufacturing Hotbed & SEZ Capital",
				'date' => '2024-10-10 17:00:00',
				'venue' => "Radisson Blu Plaza Hotel, Hyderabad"
			],
			[
				'name' => "Chennai",
				'theme' => "Chennai: Driving Global Blueprint for Industrial Excellence",
				'date' => '2024-10-25 17:00:00',
				'venue' => "Regenta Central RS, Chennai"
			],
			[
				'name' => "Coimbatore",
				'theme' => "Coimbatore: Crafting Futures, Empowering Growth",
				'date' => '2024-11-22 17:00:00',
				'venue' => "Le Méridien Coimbatore"
			],
			[
				'name' => "Jaipur",
				'theme' => "Jaipur: Powering Rajasthan's Global Tourism Vision",
				'date' => '2024-11-29 17:00:00',
				'venue' => "Pride Amber Vilas Resort & Convention Centre"
			],
			[
				'name' => "Pune",
				'theme' => "Building a Future-Ready Workforce ",
				'date' => '2024-12-20 17:00:00',
				'venue' => "The Pride Hotel, Shivajinagar, Pune"
			],
			[
				'name' => "Indore",
				'theme' => "Indore: Setting the Benchmark for India's Sustainability Vision",
				'date' => '2024-12-27 17:00:00',
				'venue' => "Pride Hotel & Convention Centre, Indore"
			],
			[
				'name' => "Delhi",
				'theme' => "Delhi: Spotlight on India's New Startup Capital",
				'date' => '2025-01-10 17:00:00',
				'venue' => " Hotel Pride Plaza, New Delhi."
			],
			[
				'name' => "Bengaluru",
				'theme' => "Mastering Business, Gender and Leadership",
				'date' => '2025-01-24 17:00:00',
				'venue' => "The Pride Hotel Bengaluru"
			],
			[
				'name' => "Goa",
				'theme' => "Goa: An Economy Evolving Beyond Tourism",
				'date' => '2025-02-13 17:00:00',
				'venue' => "Pride Sun Village Resort And Spa"
			],
			[
				'name' => "Ahmedabad",
				'theme' => "Ahmedabad: The Gateway to India's Shanghai Dream",
				'date' => '2025-03-21 17:00:00',
				'venue' => "Pride Plaza Hotel Ahmedabad"
			],
			[
				'name' => "Kolkata",
				'theme' => "Kolkata: Bridging Tradition, Commerce & Innovation",
				'date' => '2025-04-04',
				'venue' => ""
			],
			[
				'name' => "Nagpur",
				'theme' => "Nagpur: Leading Maharashtra's Industrial Excellence",
				'date' => '2025-04-25',
				'venue' => ""
			],
		];
		$this->data['cities'] = $this->cities;
		// $this->data['sb_themes'] = $this->sb_themes;
		$this->data['springboards'] = $this->springboards;
	}
}

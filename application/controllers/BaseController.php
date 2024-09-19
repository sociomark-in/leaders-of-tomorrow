<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BaseController extends CI_Controller
{
	public $cities, $data;
	public function __construct()
	{
		parent::__construct();
		$this->springboards = [
			[
				'name' => "Mumbai",
				'theme' => "Galvanizing India’s MSMEs to Seize Global Opportunities",
				'date' => '2024-08-29 17:00:00',
				'venue' => "Taj Lands End, Mumbai"
			],
			[
				'name' => "Lucknow",
				'theme' => "Charting Uttar Pradesh’s Trillion-Dollar Journey",
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
				'name' => "Delhi NCR",
				'theme' => "Delhi: Spotlight on India's Startup Capital",
				'date' => '2024-10-18',
				'venue' => ""
			],
			[
				'name' => "Ahmedabad",
				'theme' => "Ahmedabad: The Gateway to India's Shanghai Dream",
				'date' => '2024-11-08',
				'venue' => ""
			],
			[
				'name' => "Bengaluru",
				'theme' => "Mastering Business, Gender and Leadership",
				'date' => '2024-11-22',
				'venue' => ""
			],
			[
				'name' => "Chennai",
				'theme' => "Chennai: Driving Global Blueprint for Industrial Excellence",
				'date' => '2024-12-06',
				'venue' => ""
			],
			[
				'name' => "Pune",
				'theme' => "Pune: Building a Future-Ready Workforce",
				'date' => '2024-12-20',
				'venue' => ""
			],
			[
				'name' => "Kolkata",
				'theme' => "Kolkata: Bridging Tradition, Commerce & Innovation",
				'date' => '2025-01-17',
				'venue' => ""
			],
			[
				'name' => "Kochi",
				'theme' => "Kerala: Spotlight on Kerala's Knowledge Economy",
				'date' => '2025-01-31',
				'venue' => ""
			],
			[
				'name' => "Hyderabad",
				'theme' => "Hyderabad: India's Manufacturing Hotbed & SEZ Capital",
				'date' => '2025-02-14',
				'venue' => ""
			],
			[
				'name' => "Nagpur",
				'theme' => "Nagpur: Leading Maharashtra's Industrial Excellence",
				'date' => '2025-02-28',
				'venue' => ""
			],
			[
				'name' => "Jaipur",
				'theme' => "Jaipur: Powering Rajasthan's Global Tourism Vision",
				'date' => '2025-03-21',
				'venue' => ""
			],
			[
				'name' => "Goa",
				'theme' => "Goa: Evolving economy beyond tourist footfall",
				'date' => '2025-04-04',
				'venue' => ""
			],
			[
				'name' => "Indore",
				'theme' => "Indore: Setting the Benchmark for India's Sustainability Vision",
				'date' => '2025-04-25',
				'venue' => ""
			],
		];
		$this->data['cities'] = $this->cities;
		$this->data['sb_themes'] = $this->sb_themes;
		$this->data['springboards'] = $this->springboards;
	}
}

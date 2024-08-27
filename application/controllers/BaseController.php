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
			],
			[
				'name' => "Lucknow",
				'theme' => "Lucknow: Charting Uttar Pradesh’s Trillion-Dollar Journey",
				'date' => '2024-08-24',
			],
			[
				'name' => "Chandigarh",
				'theme' => "Chandigarh: A Case Study For Ease Of Doing Business",
				'date' => '2024-08-24',
			],
			[
				'name' => "Delhi NCR",
				'theme' => "Delhi: Spotlight on India's Startup Capital",
				'date' => '2024-08-24',
			],
			[
				'name' => "Ahmedabad",
				'theme' => "Ahmedabad: The Gateway to India's Shanghai Dream",
				'date' => '2024-08-24',
			],
			[
				'name' => "Bengaluru",
				'theme' => "Mastering Business, Gender and Leadership",
				'date' => '2024-08-24',
			],
			[
				'name' => "Chennai",
				'theme' => "Chennai: Driving Global Blueprint for Industrial Excellence",
				'date' => '2024-08-24',
			],
			[
				'name' => "Pune",
				'theme' => "Pune: Building a Future-Ready Workforce",
				'date' => '2024-08-24',
			],
			[
				'name' => "Kolkata",
				'theme' => "Kolkata: Bridging Tradition, Commerce & Innovation",
				'date' => '2024-08-24',
			],
			[
				'name' => "Kochi",
				'theme' => "Kerala: Spotlight on Kerala's Knowledge Economy",
				'date' => '2024-08-24',
			],
			[
				'name' => "Hyderabad",
				'theme' => "Hyderabad: India's Manufacturing Hotbed & SEZ Capital",
				'date' => '2024-08-24',
			],
			[
				'name' => "Nagpur",
				'theme' => "Nagpur: Leading Maharashtra's Industrial Excellence",
				'date' => '2024-08-24',
			],
			[
				'name' => "Jaipur",
				'theme' => "Jaipur: Powering Rajasthan's Global Tourism Vision",
				'date' => '2024-08-24',
			],
			[
				'name' => "Goa",
				'theme' => "Goa: Evolving economy beyond tourist footfall",
				'date' => '2024-08-24',
			],
			[
				'name' => "Indore",
				'theme' => "Indore: Setting the Benchmark for India's Sustainability Vision",
				'date' => '2024-08-24',
			],
		];
		$this->data['cities'] = $this->cities;
		$this->data['sb_themes'] = $this->sb_themes;
		$this->data['springboards'] = $this->springboards;
	}
}

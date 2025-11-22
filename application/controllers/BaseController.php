<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BaseController extends CI_Controller
{
	public $cities, $data, $PANEL_URL;
	public function __construct()
	{
		parent::__construct();
		$this->PANEL_URL = "admin-panel";
		$this->springboards = null;
		$this->data['springboards'] = [
			[
				'name' => 'Mumbai',
				'date' => '2025-08-22',
				'image' => 'mumbai.png',
				'status' => 1,
			],
			[
				'name' => 'Gurugram',
				'date' => '2025-09-05',
				'image' => 'gaziabad.png',
				'status' => 1,
			],
			[
				'name' => 'Hyderabad',
				'image' => 'hyderabad.png',
				'date' => '2025-09-19',
				'status' => 1,
			],
			[
				'name' => 'Pune',
				'image' => 'pune.png',
				'date' => '2026-03-20',
				'theme' => [
					'title' => "Pune: At the Forefront of skilled growth & innovation",
					'description' => '',
					'embed' => '',
				],
				'partners' => [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png'
					]
				],
				'status' => 1,
			],
			[
				'name' => 'Chennai',
				'image' => 'chennai.png',
				'date' => '2025-10-31',
				'theme' => [
					'title' => "Chennai: The Industrial Powerhouse of South India",
					'description' => '',
					'embed' => '',
				],
				'partners' => [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png'
					]
				],
				'status' => 0,
			],
			[
				'name' => 'Ghaziabad',
				'image' => 'gaziabad.png',
				'date' => '2025-11-14',
				'theme' => [
					'title' => "Ghaziabad: Forging NCR's Industrial Backbone",
					'description' => '',
					'embed' => '',
				],
				'status' => 0,
			],
			[
				'name' => 'Coimbatore',
				'image' => 'coimbatore.png',
				'date' => '2025-11-28',
				'theme' => [
					'title' => "Coimbatore: India's China Plus One MSME Hub",
					'description' => '',
					'embed' => '',
				],
				'status' => 0,
			],
			[
				'name' => 'Lucknow',
				'image' => 'lucknow.png',
				'date' => '2025-12-05',
				'theme' => [
					'title' => "Lucknow: Engine of Growth & Governance in the Heart of UP",
					'description' => '',
					'embed' => '',
				],
				'status' => 0,
			],
			[
				'name' => 'Vijaywada',
				'image' => 'vijaywada.png',
				'date' => '2025-12-19',
				'theme' => [
					'title' => "Vijaywada: Engine of Growth & Governance in the Heart of UP",
					'description' => '',
					'embed' => '',
				],
				'status' => 0,
			],
			[
				'name' => 'Delhi',
				'image' => 'delhi.png',
				'theme' => [
					'title' => "Delhi: Where Policy Meets Progress",
					'description' => '',
					'embed' => '',
				],
				'date' => '2026-01-09',
				'partners' => [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png'
					]
				],
				'status' => 0,
			],
			[
				'name' => 'Indore',
				'image' => 'indore.png',
				'date' => '2026-01-23',
				'theme' => [
					'title' => "Indore: Building Businesses in the heart of India",
					'description' => '',
					'embed' => '',
				],
				'status' => 0,
			],
			[
				'name' => 'Kolkata',
				'image' => 'kolkata.png',
				'date' => '2026-02-06',
				'theme' => [
					'title' => "Kolkata: Gateway to Eastern India’s economic growth",
					'description' => '',
					'embed' => '',
				],
				'partners' => [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png'
					]
				],
				'status' => 0,
			],
			[
				'name' => 'Ahmedabad',
				'image' => 'ahmedabad.png',
				'date' => '2026-02-20',
				'theme' => [
					'title' => "Ahmedabad: Building India’s next financial nerve centre",
					'description' => '',
					'embed' => '',
				],
				'partners' => [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png'
					]
				],
				'status' => 0,
			],
			[
				'name' => 'Bengaluru',
				'image' => 'bengaluru.png',
				'date' => '2025-10-10',
				'partners' => [
					[
						'text' => 'Powered By',
						'logo' => 'tata-tele.png'
					]
				],
				'status' => 0,
			],
			[
				'name' => 'Jaipur',
				'image' => 'jaipur.png',
				'date' => '2026-03-27',
				'theme' => [
					'title' => "Jaipur: India's Crown Jewel In The Hospitality Sector",
					'description' => '',
					'embed' => '',
				],
				'status' => 0,
			],
			
		];
	}
}

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
				'date' => '2025-10-15',
				'status' => 1,
			],
			[
				'name' => 'Lucknow',
				'image' => 'lucknow.png',
				'date' => '2025-10-31',
				'status' => 1,
			],
			[
				'name' => 'Chennai',
				'image' => 'chennai.png',
				'date' => '2025-11-14',
				'status' => 1,
			],
			[
				'name' => 'Indore',
				'image' => 'indore.png',
				'date' => '2025-11-28',
				'status' => 1,
			],
			[
				'name' => 'Bengaluru',
				'image' => 'bengaluru.png',
				'date' => '2025-12-10',
				'status' => 1,
			],
				[
				'name' => 'Coimbatore',
				'image' => 'coimbatore.png',
				'date' => '2025-12-19',
				'status' => 1,
			],
			[
				'name' => 'Delhi',
				'date' => '2026-01-09',
				'image' => 'delhi.png',
				'status' => 1,
			],
			[
				'name' => 'Ahmedabad',
				'image' => 'ahmedabad.png',
				'date' => '2026-01-23',
				'status' => 1,
			],
			[
				'name' => 'Jaipur',
				'image' => 'jaipur.png',
				'date' => '2026-02-06',
				'status' => 1,
			],
			[
				'name' => 'Ghaziabad',
				'image' => 'gaziabad.png',
				'date' => '2026-02-18',
				'status' => 1,
			],
		
			[
				'name' => 'Kolkata',
				'image' => 'kolkata.png',
				'date' => '2026-03-18',
				'status' => 1,
			],
			[
				'name' => 'Vijaywada',
				'image' => 'vijaywada.png',
				'date' => '2026-03-25',
				'status' => 1,
			],
			
		];
	}
}

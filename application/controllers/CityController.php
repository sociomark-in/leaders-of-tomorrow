<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class CityController extends BaseController
{
	public $data;
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->page('city/home', $this->data);
	}

	public function city_single($city)
	{
		switch ($city) {
			case 'mumbai':
				$this->data['city'] = [
					'name' => "Mumbai"
				];
				$this->load->city_view('mumbai', $this->data);
				break;

			default:
				redirect('all-cities');
				break;
		}
	}
	public function registration($city)
	{
		foreach ($this->springboards as $key => $sb) {
			if (strtolower($sb['name']) == $city) {
				$this->data['city'] = $sb;
				$this->load->city_view('register', $this->data);
				break;
			} else {
				redirect('all-cities');
			}
		}
	}
}

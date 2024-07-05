<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
		$this->load->page('cities/home', $this->data);
	}

	public function season_single($number)
	{
		switch ($number) {
			case 'mumbai':
				$this->load->page('cities/mumbai', $this->data);
				break;

			default:
				redirect('cities');
				break;
		}
	}
}

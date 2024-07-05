<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BaseController extends CI_Controller
{
	public $cities, $data;
	public function __construct()
	{
		parent::__construct();
		$this->cities = [
			"Delhi",
			"Surat",
			"Chennai",
			"Hyderabad",
			"Ranchi",
			"Pune",
			"Bengaluru",
			"Udaipur",
			"Ahmedabad",
			"Coimbatore",
			"Nagpur",
			"Goa",
			"Thiruvanathapuram",
			"Guwahati",
			"Dehradun",
			"Kolkata",
			"Bhubaneswar",
			"Bhopal",
			"Lucknow",
			"Mumbai",
		];
		$this->data['cities'] = $this->cities;
	}
}

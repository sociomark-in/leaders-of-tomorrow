<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attendee extends CI_Model
{
	private $data, $table;
	public function __construct()
	{
		parent::__construct();
		$this->table['categories'] = "";
	}

	/*
	Technology – IT/ITES & Telecommunication
	Automobiles & OEM
	Health, Wellness and Ayurveda
	Packaging Products & Solutions
	Travel and Hospitality
	Home & Décor
	Construction & Real Estate
	EdTech and Skill Development
	Electrical & Electronics
	Logistics & Service Delivery
	Green Solutions provider of the Year
	Fashion Jewellery & Lifestyle
	Manufacturing
	Organic Products
	Personal care & Hygiene Products
	Restaurants and F&B
	Young Entrepreneur of the Year
	Women Entrepreneur of the Year
	Entrepreneur of the Year 
	*/

	public function get() {}
}

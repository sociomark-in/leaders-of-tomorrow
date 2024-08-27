<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attendee extends CI_Model
{
	private $data, $table;
	public function __construct()
	{
		parent::__construct();
		$this->table['attendees'] = "";
	}

	public function new_konfhub_entry($request)
	{
		$this->load->library('Konfhub');

		/*
		 $event_id will be different for different cities.
		 $api_key and $ticket_id will also change according to $event_id
		*/

		$event_id = $request['event_id'];

		switch ($event_id) {
			// Test
			case '2cf62526-7adc-405d-b7c6-ea84eb6cb11c':
				$ticket_id = "21520";
				$api_key = "c6538023-bdfc-4a68-94a1-8c29b61ceeb3";
				break;
			// Mumbai
			case 'f08c5088-2794-4f27-923c-2058132e1b28':
				$ticket_id = "21340";
				$api_key = "b514a532-f75c-4080-a63c-dfd54eb98bf5";
				break;

			default:
				# code...
				break;
		}

		$this->data = [
			"event_id" => $event_id,
			"registration_tz" => "Asia/Kolkata",
			"utm" => [
				"utm_source" => "Website",
				"utm_medium" => "Google",
				"utm_campaign" => "Direct%20Search"
			],
			"registration_details" => [
				$ticket_id => [
					$request["registration_details"]
				]
			]
		];
		return $this->konfhub->new_attendee($api_key, $this->data);
	}

	public function new_ticket($request){
		return true;
		// if($this->db->insert($this->table['attendees'], $request)){
		// 	return true;
		// } else {
		// 	return false;
		// }
	}
}

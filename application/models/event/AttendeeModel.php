<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AttendeeModel extends CI_Model
{
	private $data, $table;
	public function __construct()
	{
		parent::__construct();
		$this->table['attendees'] = "";
	}

	public function new_konfhub_entry($request)
	{
		$this->load->library('konfhub');

		/*
		 $event_id will be different for different cities.
		 $api_key and $ticket_id will also change according to $event_id
		*/

		$event_id = $request['event_id'];

		switch ($event_id) {
			case '2cf62526-7adc-405d-b7c6-ea84eb6cb11c':
				$ticket_id = "21520";
				$api_key = "c6538023-bdfc-4a68-94a1-8c29b61ceeb3";
				break;
				// Mumbai
			case 'f08c5088-2794-4f27-923c-2058132e1b28':
				$ticket_id = "21340";
				$api_key = "b514a532-f75c-4080-a63c-dfd54eb98bf5";
				break;
				// Lucknow
			case '4f18fda6-f8a7-4da4-a6a2-4d77c04b85bd':
				$ticket_id = "21758";
				$api_key = "2c0b2539-3941-4d00-b52d-27b22b2850e2";
				break;
				// Chandigarh
			case '372237d7-c945-4548-b444-3725309b7bd2':
				$ticket_id = "22744";
				$api_key = "1cf7f49b-36d1-4c90-a1d1-4b5b01b69563";
				break;
				// Hyderabad
			case '1f858d77-9498-4c57-a6f2-0afa69b20e8d':
				$ticket_id = "24318";
				$api_key = "f05dfc61-4af7-447e-96ec-2080ce633a0b";
				break;
				// Chennai
			case '8404655b-ffb0-494a-ae29-bcabcd24d2b6':
				$ticket_id = "25515";
				$api_key = "46fe979f-e144-4bdf-a055-670830dacb2b";
				break;
				// Coimbatore
			case '0a27f103-f22c-4c17-841f-0d6cced80347':
				$ticket_id = "26736";
				$api_key = "77fcb563-b37d-4d7b-be5d-a8a077b74fe3";
				break;

			default:
				# code...
				break;
		}

		/* 
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
		 */
		$this->data = [
			"ticket_id" => (int)$ticket_id,
			"registration_tz" => "Asia/Kolkata",
			"waitlist_details" => $request["registration_details"]
		];
		// print_r(json_encode($this->data));die;
		return $this->konfhub->waitlist_attendee($api_key, $event_id, $this->data);
	}

	public function new_ticket($request)
	{
		return true;
		// if($this->db->insert($this->table['attendees'], $request)){
		// 	return true;
		// } else {
		// 	return false;
		// }
	}
}

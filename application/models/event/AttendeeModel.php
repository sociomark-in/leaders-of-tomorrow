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
				// Jaipur
			case '0550c724-d075-4dd6-821a-185a477b1b95':
				$ticket_id = "28027";
				$api_key = "17159e3f-40aa-47e2-8580-92a4e9d775e4";
				break;
				// Pune
			case 'ba68bb33-f10c-4edd-b7de-e333a754b31e':
				$ticket_id = "28713";
				$api_key = "004c5d82-c390-4723-9193-ad20f47b27a6";
				break;
				// Indore
			case '31e500d4-c82f-4b48-8d68-1cfb6860d176':
				$ticket_id = "28720";
				$api_key = "fadc03a5-04ae-4424-a492-9b76383ff6ee";
				break;
				// Delhi
			case 'c586b583-38a1-4985-92a6-a94daf8023c8':
				$ticket_id = "28721";
				$api_key = "f6500a0a-9540-4a87-9660-542a3e326fbd";
				break;
				// Bangalore
			case '7d5dc078-858d-43f0-b8ff-e538a2c73cbe':
				$ticket_id = "29111";
				$api_key = "110e396e-210b-4c87-a210-826bff978855";
				break;
				// Goa
			case '151b0d88-279a-4d6f-b36c-c0046775c7ed':
				$ticket_id = "31812";
				$api_key = "323f3b4c-9c71-4385-8569-31af98ec9907";
				break;
				// Ahmedabad
			case '48cac1a6-11c9-4ac7-8d7a-957e2ca2a945':
				$ticket_id = "34127";
				$api_key = "fc5e8e6e-e54b-4514-8105-7ab404ba17c5";
				break;

				// Awards
			case 'b15f16a3-db1e-41d9-b135-472b02bf263c':
				$ticket_id = "33427";
				$api_key = "4cbffeef-4639-4741-ac12-b203409c0d0c";
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

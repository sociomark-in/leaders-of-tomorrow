<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegistrationAPI extends CI_Controller
{
	private $request, $data, $db_data, $response, $events, $e;
	public function __construct()
	{
		parent::__construct();
		$this->events = [
			"mumbai" => "f08c5088-2794-4f27-923c-2058132e1b28",
			"lucknow" => "4f18fda6-f8a7-4da4-a6a2-4d77c04b85bd",
			"chandigarh" => "372237d7-c945-4548-b444-3725309b7bd2",
			"hyderabad" => "1f858d77-9498-4c57-a6f2-0afa69b20e8d",
			"chennai" => "8404655b-ffb0-494a-ae29-bcabcd24d2b6",
			"coimbatore" => "0a27f103-f22c-4c17-841f-0d6cced80347",
			"jaipur" => "0550c724-d075-4dd6-821a-185a477b1b95",
			"pune" => "ba68bb33-f10c-4edd-b7de-e333a754b31e",
			"indore" => "31e500d4-c82f-4b48-8d68-1cfb6860d176",
		];
		$this->load->model('event/AttendeeModel', 'AttendeeModel');
	}

	public function new_waitlist()
	{
		$this->request = $this->input->post();

		foreach ($this->events as $city => $key) {
			if (strtolower($this->request['event_city']) == $city) {
				$this->e = [
					'city' => $city,
					'key' => $key,
				];
				$data['event_id'] = $key;
				break;
			}
		}

		$utm = json_decode($this->request['utm'] ?? "", true);

		$data['registration_details'] = [
			"utm" => [
				"utm_source" => $utm['utm_source'] ?? "",
				"utm_medium" => $utm['utm_medium'] ?? "",
				"utm_campaign" => $utm['utm_campaign'] ?? ""
			],
			"name" => $this->request['name'],
			"email_id" => $this->request['email'],
			"organisation" => $this->request['organization']['name'],
			"designation" => $this->request['organization']['designation'],
			"phone_number" => $this->request['contact'],
			"whatsapp_number" => $this->request['whatsapp'],
			"linkedin_url" => $this->request['linkedin'],
			"dial_code" => "+91",
			"country_code" => "in",
			"wa_dial_code" => "+91",
			"wa_country_code" => "in",
			"whatsapp_consent" => ($this->request['whatsapp_consent'] == 'on') ? true : false,
			"email_verification_status" => 1,
			"phone_number_verified" => 4,
			"is_subscriber" => true,
			"consent" => ($this->request['consent'] == 'on') ? true : false,
		];
		/*
		"58470": "https://www.google.com",
		"58478": "Marketing",
		"58479": "Below 20 Cr",
		"58480": "Textile",
		"58481": "Swift"
		*/

		$data['registration_details']["custom_forms"] = [
			"58478" => $this->request['organization']['department'],
			"58479" => $this->request['organization']['turnover'],
			"58480" => $this->request['organization']['industry'],
			"58470" => $this->request['website'],
			"58481" => $this->request['message'],
		];

		$this->response = json_decode($this->AttendeeModel->new_konfhub_entry($data), true);
		// print_r($this->response);die;

		if (!array_key_exists('error', $this->response)) {
			$data = [
				"name" => $this->request['name'],
				"email_id" => $this->request['email'],
				"contact_number" => $this->request['contact'],
				"organization_name" => $this->request['organization']['name'],
				"organization_designation" => $this->request['organization']['designation'],
				"organization_size" => $this->request['organization']['size'],
				"organization_department" => $this->request['organization']['department'],
				"organization_turnover" => $this->request['organization']['turnover'],
				"organization_industry" => $this->request['organization']['industry'],
				"event_id" => $this->e['key'],
				"event_city" => $this->e['city'],
				"utm_source" => $utm['utm_source'] ?? "",
				"utm_medium" => $utm['utm_medium'] ?? "",
				"utm_campaign" => $utm['utm_campaign'] ?? "",
			];
			if ($this->AttendeeModel->new_ticket($data)) {

				$this->session->set_tempdata(['lot_rsvp_status' => $this->response], NULL, 300);
				/* 
				{"title": "All set, see you at Test event for Hemant", "message": "We have sent registration confirmation & ticket details to the registered participants via email. Emails would have been sent from response@timesnetwork.in. You can even access your tickets from Profile", "type": "('single',)_('free',)_('offline',)", "booking_id": ["03cc91b4"], "url": {"zip": "https://files.konfhub.com/2cf62526-7adc-405d-b7c6-ea84eb6cb11c/zip_files/Test-event-for-Hemant-2024-08-26 13-10-26.zip", "bulk_invoice": null, "03cc91b4": {"name": "John Doe", "ticket_name": "Web Delegate", "ticket": "https://files.konfhub.com/2cf62526-7adc-405d-b7c6-ea84eb6cb11c/tickets/03cc91b4_ticket.pdf"}}}
					*/
				redirect('city/' . strtolower($this->request['event_city']) . '/rsvp/thank-you');
			}
		} else {
			print_r($this->response);
			die;
			// $this->session->set_tempdata(['lot_rsvp_status' => $this->response], NULL, 300);
			// {"error": {"error_code": "CPTR-4", "error_message": "Duplicate Registration Found", "duplicate_registrations": {"21520": []}, "duplicate_count": 1}}
			redirect('city/' . strtolower($this->request['event_city']) . '/register');
		}
	}
	public function new_registration()
	{
		$this->request = $this->input->post();

		foreach ($this->events as $city => $key) {
			if (strtolower($this->request['event_city']) == $city) {
				$this->e = [
					'city' => $city,
					'key' => $key,
				];
				$data['event_id'] = $key;
				break;
			}
		}

		$data['registration_details'] = [
			"name" => $this->request['name'],
			"email_id" => $this->request['email'],
			"custom_forms" => [
				"45681" => $this->request['organization']['name'],
				"45682" => $this->request['organization']['designation'],
				"46261" => $this->request['organization']['size'],
				"46262" => $this->request['organization']['department'],
				"46263" => $this->request['organization']['turnover'],
				"46264" => $this->request['organization']['industry'],
				"46678" => $this->request['message'],
			],
			"whatsapp_number" => $this->request['contact'],
			"wa_dial_code" => "+91",
			"wa_country_code" => "in",
			"whatsapp_consent" => true
		];

		$this->response = json_decode($this->AttendeeModel->new_konfhub_entry($data), true);

		if (!array_key_exists('error', $this->response)) {
			$data = [
				"name" => $this->request['name'],
				"email_id" => $this->request['email'],
				"contact_number" => $this->request['contact'],
				"organization_name" => $this->request['organization']['name'],
				"organization_designation" => $this->request['organization']['designation'],
				"organization_size" => $this->request['organization']['size'],
				"organization_department" => $this->request['organization']['department'],
				"organization_turnover" => $this->request['organization']['turnover'],
				"organization_industry" => $this->request['organization']['industry'],
				"event_id" => $this->e['key'],
				"event_city" => $this->e['city'],
				"booking_id" => $this->response['booking_id'][0],
				"ticket_url" => $this->response['url'][$this->response['booking_id'][0]]['ticket'],
			];
			if ($this->AttendeeModel->new_ticket($data)) {

				$this->session->set_tempdata(['lot_rsvp_status' => $this->response], NULL, 300);

				// {"title": "All set, see you at Test event for Hemant", "message": "We have sent registration confirmation & ticket details to the registered participants via email. Emails would have been sent from response@timesnetwork.in. You can even access your tickets from Profile", "type": "('single',)_('free',)_('offline',)", "booking_id": ["03cc91b4"], "url": {"zip": "https://files.konfhub.com/2cf62526-7adc-405d-b7c6-ea84eb6cb11c/zip_files/Test-event-for-Hemant-2024-08-26 13-10-26.zip", "bulk_invoice": null, "03cc91b4": {"name": "John Doe", "ticket_name": "Web Delegate", "ticket": "https://files.konfhub.com/2cf62526-7adc-405d-b7c6-ea84eb6cb11c/tickets/03cc91b4_ticket.pdf"}}}
				redirect('city/' . strtolower($this->request['event_city']) . '/rsvp/thank-you');
			}
		} else {
			$this->session->set_tempdata(['lot_rsvp_status' => $this->response], NULL, 300);
			// {"error": {"error_code": "CPTR-4", "error_message": "Duplicate Registration Found", "duplicate_registrations": {"21520": []}, "duplicate_count": 1}}

			redirect('city/' . strtolower($this->request['event_city']) . '/register');
		}
	}
}

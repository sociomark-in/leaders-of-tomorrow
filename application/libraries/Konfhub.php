<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konfhub
{
	private $request, $response;

	public function __construct()
	{
// 		echo "KonfHub API Loaded";
	}

	public function new_attendee($api_key, $data)
	{
		$curl = curl_init();

		$this->request = $data;

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.konfhub.com/event/capture/v2',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($this->request),
			CURLOPT_HTTPHEADER => array(
				'x-api-key: ' . $api_key,
				'Content-Type: application/json'
			),
		));

		$this->response = curl_exec($curl);

		curl_close($curl);
		return $this->response;
	}

	public function waitlist_attendee($api_key, $event_id, $data) {
		$curl = curl_init();

		$this->request = $data;

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://api.konfhub.com/event/'. $event_id .'/waitlist?is_waitlist=true',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => json_encode($this->request),
			CURLOPT_HTTPHEADER => array(
				'x-api-key: ' . $api_key,
				'Content-Type: application/json'
			),
		));

		$this->response = curl_exec($curl);

		curl_close($curl);
		return $this->response;
	}
}

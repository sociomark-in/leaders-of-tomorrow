<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "controllers/BaseController.php";
class RegisterController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->data['page'] = [
			'title' => "Register" . " • " . APP_NAME . " " . date('Y')
		];
		$this->load->mini_view('register', $this->data);

		// include APPPATH.'libraries/google/vendor/autoload.php';
		// $google_client = new Google_Client();
		// $google_client->setClientId("449257910188-1kfmck8kh3t713cm6ogttevgsfhfg5to.apps.googleusercontent.com");
		// $google_client->setClientSecret("i1MJ3Nw7aU3OUqN7C2i4jLhW");
		// $google_client->setRedirectUri('https://sociomark.in/google_login/login');
		// $google_client->addScope('email');
		// $google_client->addScope('profile');
		// $this->data['redirect_url'] = $google_client->createAuthUrl();

		/*
		<?php

		require 'vendor/autoload.php';

		use Google\Client;
		use Google_Service_People;

		// Replace 'path/to/your/credentials.json' with the path to your JSON key file
		$client = new Client();
		$client->setAuthConfig('path/to/your/credentials.json');
		$client->setScopes(['https://www.googleapis.com/auth/contacts.readonly']);
		$client->addScope(Google_Service_People::CONTACTS_READONLY);

		// Create a Google People service object
		$peopleService = new Google_Service_People($client);

		// Get the authenticated user's profile
		$me = $peopleService->people->get('me', ['personFields' => 'names,emailAddresses,phoneNumbers']);

		// Extract the name, email, and contact number
		$name = $me->getName()->getDisplayName();
		$email = $me->getEmailAddresses()[0]->getValue();
		$contactNumber = $me->getPhoneNumbers()[0]->getValue();

		// Print the results
		echo "Name: $name\n";
		echo "Email: $email\n";
		echo "Contact Number: $contactNumber\n"; 
		*/
	}
}

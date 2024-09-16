<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . '/vendor/autoload.php';

use Google\Service\Oauth2;

class SSOController extends CI_Controller
{
	private $request, $response, $data;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('panel/User');
	}

	public function participant_login()
	{
		redirect('profile/' . random_string('alnum', 16));
	}

	public function validate()
	{
		$this->request = $this->input->get();
		foreach ($this->request as $key => $value) {
			switch ($key) {
				case 'email':
					if (filter_var($value, FILTER_VALIDATE_EMAIL) && checkdnsrr('sociomark.in')) {
						if (count($this->User->get([$key => $value])) >= 0) {
							$this->output->set_content_type('application/json')->set_output("false");
						} else {
							$this->output->set_content_type('application/json')->set_output("true");
						}
					} else {
						$this->output->set_content_type('application/json')->set_output("false");
					}
					break;

				default:
					$this->output->set_content_type('application/json')->set_output("false");
					break;
			}
		}
	}

	public function participant_register()
	{
		$this->request = $this->input->post();
		$data = $this->request;
		if ($this->User->insert($this->request)) {
			$this->session->set_userdata('awards_panel_user', $data);
			echo "<pre>";
			print_r($data);
		}
	}

	public function participant_google_login()
	{
		// $this->load->library('googlelogin/googleoauthclient');
		// $this->googleoauthclient->get_login_url();

		$result = $this->db->select(['config_key', 'value'])
			->where(['config_key' => 'google_client_id'])
			->or_where(['config_key' => 'google_client_secret'])
			->get('app_config')->result_array();

		foreach ($result as $key => $row) {
			$keys[$row['config_key']] = $row['value'];
		}
		// init configuration

		$redirectUri = current_url();

		// create Client Request to access Google API
		$client = new Google_Client();
		$client->setClientId($keys['google_client_id'] . ".apps.googleusercontent.com");
		$client->setClientSecret($keys['google_client_secret']);


		$client->setRedirectUri($redirectUri);
		$client->addScope("email");
		$client->addScope("profile");

		// authenticate code from Google OAuth Flow
		if (isset($_GET['code'])) {
			$token = $client->fetchAccessTokenWithAuthCode($_GET['code']); 
			echo "<pre>";
			if (!isset($token["error"])) {
				$client->setAccessToken($token['access_token']);

				// get profile info
				$google_oauth = new Oauth2($client);
				$google_account_info = $google_oauth->userinfo->get();
				$userinfo = [
					'email' => $google_account_info['email'],
					'first_name' => $google_account_info['givenName'],
					'last_name' => $google_account_info['familyName'],
					'gender' => $google_account_info['gender'],
					'full_name' => $google_account_info['name'],
					'picture' => $google_account_info['picture'],
					'contact' => $google_account_info['contact_number'] ?? null,
					'verifiedEmail' => $google_account_info['verifiedEmail'],
					'token' => $google_account_info['id'],
				  ];

				print_r($userinfo);
			}

			// now you can use this profile info to create account in your website and make user logged in.
		} else {
			echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";
		}
	}
}

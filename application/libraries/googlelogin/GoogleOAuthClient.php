<?php

require_once APPPATH . '/vendor/autoload.php';
use Google\Service\Oauth2;
class GoogleOAuthClient extends Google_Client
{
	private $CI;
	public function __construct()
	{
		echo "Loaded";
		$this->CI = &get_instance();
		$keys = [];
		$result = $this->CI->db->select(['config_key', 'value'])
		->where(['config_key'=>'google_client_id'])
		->or_where(['config_key'=>'google_client_secret'])
		->get('app_config')->result_array();
	
		foreach ($result as $key => $row) {
			$keys[$row['config_key']] = $row['value'];
		}
		// init configuration
	
		$redirectUri = current_url();
		
		$this->setClientId( $keys['google_client_id'] . ".apps.googleusercontent.com");
		$this->setClientSecret($keys['google_client_secret']);
		$this->setRedirectUri($redirectUri);
		$this->addScope("email");
		$this->addScope("profile");
	}

	public function init(){
		return $this;
	}

	function get_login_url() {
		// authenticate code from Google OAuth Flow
		$result = $this->CI->db->select(['config_key', 'value'])
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

		return $client->createAuthUrl();
	}
}




<?php

require_once APPPATH . '/vendor/autoload.php';
use Google\Service\Oauth2;
class GoogleOAuthClient
{
	private $CI, $keys, $client;
	public function __construct()
	{
		$this->CI = &get_instance();
		$this->keys = [];
		$result = $this->CI->db->select(['config_key', 'value'])->get('app_config')->result_array();
		
		foreach ($result as $key => $row) {
			$this->keys[$row['config_key']] = $row['value'];
		}
		// init configuration
		$redirectUri = base_url('api/v2/oauth/googleuser');
		
		$this->client = new Google_Client();
		$this->client->setClientId( $this->keys['googleclient_id'] . ".apps.googleusercontent.com");
		$this->client->setClientSecret($this->keys['googleclient_secret']);
		$this->client->setRedirectUri($redirectUri);
		
		log_message('notice', 'GoogleOAuth Library Loaded');
		
	}
	
	function get_login_url() {
		$this->client->addScope('email');
		$this->client->addScope('profile');
		return $this->client->createAuthUrl();
	}

	function get_profile() {

		$code = $this->CI->input->get('code');
		if(is_null($code)){
			echo "Login Failed!";
		} else {
			$token = $this->client->fetchAccessTokenWithAuthCode($code);
			$this->client->setAccessToken($token['access_token']);

			$oauth2 = new Oauth2($this->client);
			$userinfo = $oauth2->userinfo->get();
		}

		return $userinfo;
	}
}




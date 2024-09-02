<?php

//Include Google Client Library for PHP autoload file

function load()
{
	require_once __DIR__ . '/vendor/autoload.php';
	$client = new Google\Client();
	$client->setAuthConfig('client_secrets.json');
	$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php');
	$client->addScope('email');
	$client->addScope('profile');

	if (!isset($_GET['code'])) {
		$auth_url = $client->createAuthUrl();
		header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
	} else {
		$client->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $client->getAccessToken();
		$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
		header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
	}
}

function home()
{
	require_once __DIR__ . '/vendor/autoload.php';

	session_start();

	$client = new Google\Client();
	$client->setAuthConfig('client_secrets.json');
	$client->addScope('email');
	$client->addScope('profile');

	if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
		$client->setAccessToken($_SESSION['access_token']);
		// $google_service = new Google($client);
		$data = $google_service->userinfo->get();
		echo json_encode($data);
	} else {
		$redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/oauth2callback.php';
		header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
	}
}


//Make object of Google API Client for call Google API
$client = new Google_Client();

//Set the OAuth 2.0 Client Config
$client->setAuthConfig(APPPATH . 'libraries/googlelogin/client_secret.json');

//Set the OAuth 2.0 Redirect URI
$client->setRedirectUri('Your exact location where you want the code to be run');

// to get the email and profile 
$client->addScope('email');
$client->addScope('profile');

$client->setIncludeGrantedScopes(true);

$login_button = '';


if (isset($_GET["code"])) {

	$token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);


	if (!isset($token['error'])) {

		$client->setAccessToken($token['access_token']);


		$_SESSION['access_token'] = $token['access_token'];


		$google_service = new Google($client);


		$data = $google_service->userinfo->get();


		if (!empty($data['given_name'])) {
			$_SESSION['user_first_name'] = $data['given_name'];
		}

		if (!empty($data['family_name'])) {
			$_SESSION['user_last_name'] = $data['family_name'];
		}

		if (!empty($data['email'])) {
			$_SESSION['user_email_address'] = $data['email'];
		}

		if (!empty($data['gender'])) {
			$_SESSION['user_gender'] = $data['gender'];
		}

		if (!empty($data['picture'])) {
			$_SESSION['user_image'] = $data['picture'];
		}
	}
}


if (!isset($_SESSION['access_token'])) {

	$login_button = '<a href="' . $client->createAuthUrl() . '">Login With Google</a>';
}

?>
<html>

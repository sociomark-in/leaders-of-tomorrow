<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

require_once APPPATH . 'vendor/autoload.php';

final class GlobalMail extends PHPMailer
{
	public $mail, $CI;

	public function __construct()
	{
		parent::__construct();
		$this->CI = &get_instance();
	}

	public function _init_() {
		$this->SMTPDebug = SMTP::DEBUG_SERVER;
		$this->isSMTP();
		$this->Host = $this->CI->config->item('mail_host');
		$this->SMTPAuth = true;
		$this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

		return $this;
	}

	public function _config_($username, $password, $port){
		$this->Username = $username;
		$this->Password = $password;
		$this->Port = $port;
	}

	public function recipients($from, $to, $replyto, $cc = null, $bcc = null){
		$this->setFrom($from['email']. $from['name']);
		foreach ($to as $key => $address) {
			$this->addAddress($address);
		}
		if(!is_null($cc)){
			foreach ($cc as $key => $address) {
				$this->addCC($address);
			}
		}
		if(!is_null($bcc)){
			foreach ($bcc as $key => $address) {
				$this->addBCC($address);
			}
		}

		return $this;
	}


}

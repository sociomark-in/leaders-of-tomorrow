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

	public function _init_()
	{
		// $this->SMTPDebug = SMTP::DEBUG_SERVER;
		$this->isSMTP();
		$this->Host = $this->CI->config->item('mail_host');

		$this->SMTPAuth = true;
		// $this->SMTPDebug = SMTP::DEBUG_SERVER;
		$this->isSMTP();
		$this->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
		$this->Host = "smtp-relay.brevo.com";
		$this->Username = "67e9cf002@smtp-brevo.com";
		$this->Password = "tsUr4W8c6Xy2pnvf";
		$this->Port = 587;

		return $this;
	}

	public function create_pool($from, $to, $replyto, $cc = null, $bcc = null)
	{
		$this->setFrom($from['email'], $from['name']);

		if (gettype($to)) {
			foreach ($to as $key => $address) {
				$this->addAddress($address);
			}
		} else {
			$this->addAddress($to);
		}
		if (!is_null($cc)) {
			foreach ($cc as $key => $address) {
				$this->addCC($address);
			}
		}
		if (!is_null($replyto)) {
			$this->addReplyTo($replyto);
		}
		if (!is_null($bcc)) {
			foreach ($bcc as $key => $address) {
				$this->addBCC($address);
			}
		}
		return $this;
	}

	public function data($subject, $template, $data = null,  $alt = null)
	{
		if (!is_null($subject)) {
			$this->Subject = $subject;
		}
		$this->Body = $this->CI->load->view($template, $data, true);
		if (!is_null($alt)) {
			$this->AltBody = $alt;
		}
	}

	public function text_data($subject, $template, $data = null,  $alt = null)
	{
		if (!is_null($subject)) {
			$this->Subject = $subject;
		}
		$this->Body = $this->CI->load->view($template, $data, true);
		if (!is_null($alt)) {
			$this->AltBody = $alt;
		}
	}
	
}

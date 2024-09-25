<?php

class BrevoMail extends CI_Email
{
	private $CI;
	public function __construct()
	{
		$this->CI = &get_instance();
	}
	public function init()
	{
		$config['smtp_host'] = $this->CI->config->item('brevo_smtp');
		$config['smtp_user'] = $this->CI->config->item('brevo_login');
		$config['smtp_pass'] = $this->CI->config->item('brevo_password');
		$config['newline'] = "\r\n";
		$config['protocol'] = 'smtp';
		$config['mailtype'] = 'html';
		$config['smtp_crypto'] = 'tls';
		$config['smtp_port'] = $this->CI->config->item('brevo_port');
		$config['charset'] = 'iso-8859-1';

		$this->initialize($config);

		return $this;
	}

	public function send_simple($subject, $message, $from, $to, $cc = null, $bcc = null)
	{
		$this->from($from['email'], $from['name'], $from['return_path'] = NULL);
		$this->to($to);
		if (!is_null($cc)) {
			$this->cc($cc);
		}
		if (!is_null($bcc)) {
			$this->bcc($bcc);
		}

		$this->subject($subject);
		$this->message($message);

		if (!$this->send()) {
			echo $this->print_debugger();
		} else {
			return true;
		}
	}

	public function clear_buffer()
	{
		$this->clear(TRUE);
	}
}

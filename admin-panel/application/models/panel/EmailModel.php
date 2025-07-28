<?php

class EmailModel extends CI_Model
{

	private $response;
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email/brevomail');
		$this->brevomail->init();
	}

	public function send($to, $subject, $message, $cc = null, $bcc = null)
	{
		$this->config->load('brevo_email');
		$this->load->library('email/BrevoMail');
		$this->BrevoMail->init();

		$this->brevomail->from('business@sociomark.in', 'Sociomark');
		$this->brevomail->to($to);

		if(!is_null($cc)){
			$this->brevomail->cc($cc);
		}
		if(!is_null($bcc)){
			$this->brevomail->bcc($bcc);
		}

		$this->brevomail->subject($subject);
		$this->brevomail->message($message);

		$status = false;
		if ($this->brevomail->send()) {
			$status = true;
			$this->response['status'] = true;
			$this->response['message'] = 'Email Sent Successfully!';
		} else {
			$status = false;
			$this->response['status'] = false;
			$this->response['message'] = $this->brevomail->print_debugger();
		}

		if ($status) {
			return json_encode($this->response);
		}
	}


	public function __destruct()
	{
		$this->brevomail->clear(TRUE);
	}
}

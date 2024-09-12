<?php

class TestController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->config->load('brevo_email');
	}

	public function send()
	{
		$config['smtp_host'] = $this->config->item('brevo_smtp');
		$config['smtp_user'] = $this->config->item('brevo_login');
		$config['smtp_pass'] = $this->config->item('brevo_password');
		$config['newline'] = "\r\n";
		$config['protocol'] = 'smtp';
		$config['mailtype'] = 'html';
		$config['smtp_crypto'] = 'tls';
		$config['smtp_port'] = $this->config->item('brevo_port');
		$config['charset'] = 'iso-8859-1';

		$this->load->library('email');
		$this->email->initialize($config);

		$this->email->from('business@sociomark.in', 'Sociomark');
		$this->email->to('hemant@sociomark.in');

		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		if (!$this->email->send()) {
			echo $this->email->print_debugger();
		} else {
			echo "Success!";
		}
		$this->email->clear(TRUE);
	}
}

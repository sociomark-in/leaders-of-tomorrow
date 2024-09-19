<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "vendor/autoload.php";

class TestController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->config->load('brevo_email');
		
	}

	public function pdf()
	{
		$this->load->library('pdflib/makepdf');
		$this->makepdf->init('P', 'mm', 'A4')->load('layout-2')->generate();
	}

	public function send()
	{
		$this->load->library('email/brevomail');
		$this->brevomail->init();

		$this->brevomail->from('business@sociomark.in', 'Sociomark');
		$this->brevomail->to('hemant@sociomark.in');

		$this->brevomail->subject('Email Test');
		$this->brevomail->message('Testing the brevomail class.');

		if (!$this->brevomail->send()) {
			echo $this->brevomail->print_debugger();
		} else {
			echo "Success!";
		}
		$this->brevomail->clear(TRUE);
	}
}

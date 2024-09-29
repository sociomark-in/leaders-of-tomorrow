<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . "vendor/autoload.php";

class TestController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function pdf()
	{
		$this->load->library('pdflib/makepdf');
		$this->makepdf->init('P', 'mm', 'A4')->load('layout-2')->generate();
	}

	public function csv()
	{
		$this->load->dbutil();

		$query = $this->db->query("SELECT * FROM users");
		$this->load->helper('file');

		$data = $this->dbutil->csv_from_result($query);
		if (!write_file('.\file.csv', $data, 'wb')) {
			echo 'Unable to write the file';
		} else {
			echo 'File written!';
		}
	}

	public function send()
	{
		$this->config->load('brevo_email');
		$this->load->library('email/BrevoMail');
		$this->brevomail->init();

		$this->brevomail->from('business@sociomark.in', 'Sociomark');
		$this->brevomail->to('test-57zx7etee@srv1.mail-tester.com');

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

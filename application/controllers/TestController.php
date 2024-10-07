<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

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

	function mailer()
	{
		$mail = new PHPMailer(true);

		try {
			$mail->SMTPAuth = true;
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();
			$mail->Host = "smtp-relay.brevo.com";
			$mail->Username = "67e9cf002@smtp-brevo.com";
			$mail->Password = "tsUr4W8c6Xy2pnvf";
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port = 587;

			$mail->setFrom('noreply@leadersoftomorrow.co.in', 'LOT Awards');
			$mail->addAddress('hemant@sociomark.in');
			$mail->AddReplyTo('response@timesnetwork.in');
			
			$mail->isHTML(true);
			$mail->Subject = 'Here is the subject';
			$mail->Body    = $this->load->view('panel/emails/participant_register_new', null, true);
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			$mail->send();
			echo "Success!!!";
		} catch (Exception $th) {
			echo "Failed!! Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function send()
	{
		$this->config->load('brevo_email');
		$this->load->library('email/BrevoMail');
		$this->brevomail->init();

		$this->brevomail->from('response@timesnetwork.in', 'LOT Awards');
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

	public function email_view()
	{
		$this->data['application'] = [
			'name' => 'Sociomark'
		];
		$this->load->view('panel/emails/participant_register_update', $this->data);
	}

	public function sms()
	{
		$this->load->library('twilio/smsclient');
		$response = $this->smsclient->send();
		echo "<pre>";
		print_r($response->sid);
	}

	public function verify()
	{
		$code = $this->input->get('code');
		$number = $this->input->get('number');
		$this->load->library('twilio/smsclient');
		$response = $this->smsclient->verify($code, $number);
		echo "<pre>";
		print_r($response);
	}
}

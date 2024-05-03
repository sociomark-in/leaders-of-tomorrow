<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PagesController extends CI_Controller {

	public $data;
	public function index()
	{
		$this->load->page('home', $this->data);
	}
}

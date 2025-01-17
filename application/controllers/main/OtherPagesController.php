<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class OtherPagesController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function misc($type)
	{
		switch ($type) {
			case 'disclaimer':
				$this->load->page('legal/disclaimer');
				break;
			case 'terms-of-use':
				$this->load->page('legal/terms_use');
				break;
			case 'privacy-policy':
				$this->load->page('legal/privacy');
				break;

			default:
				show_404();
				break;
		}
	}

	public function sitemap() {
		$this->load->view('sitemap');
	}
}

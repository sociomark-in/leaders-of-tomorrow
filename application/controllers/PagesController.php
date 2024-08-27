<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class PagesController extends BaseController
{

	public function index()
	{
		$this->data['articles'] = [
			[
				'thumb' => "",
				'title' => "",
				'redirect' => "https://www.timesnownews.com/india/leaders-of-tomorrow-season-12-empowering-indian-entrepreneurs-for-global-success-article-112835531"
			]
		];
		$this->load->page('home', $this->data);
	}
}

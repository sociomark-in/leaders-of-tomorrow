<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class PagesController extends BaseController
{

	public function index()
	{
		$this->data['articles'] = [
			[
				'thumb' => "https://static.tnn.in/thumb/msid-112835531,thumbsize-164428,width-1280,height-720,resizemode-75/112835531.jpg?quality=100",
				'title' => "Leaders of Tomorrow Season 12: Empowering Indian Entrepreneurs for Global Success",
				'redirect' => "https://www.timesnownews.com/india/leaders-of-tomorrow-season-12-empowering-indian-entrepreneurs-for-global-success-article-112835531"
			]
		];
		$this->load->page('home', $this->data);
	}
}

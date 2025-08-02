<?php
defined('BASEPATH') or exit('No direct script access allowed');
class BaseController extends CI_Controller
{
	public $cities, $data, $PANEL_URL;
	public function __construct()
	{
		parent::__construct();
		$this->PANEL_URL = "admin-panel";
		$this->springboards = null;
		$this->data['cities'] = $this->cities;
		// $this->data['sb_themes'] = $this->sb_themes;
		$this->data['springboards'] = $this->springboards;
	}
}

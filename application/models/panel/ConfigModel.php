<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "models/BaseMOdel.php";
class ConfigModel extends BaseModel
{
	public function __construct()
	{
		$this->table = "app_config";
	}
}

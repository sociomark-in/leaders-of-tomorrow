<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert($data){
		return true;
	}
}

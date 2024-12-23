<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LeadsModel extends CI_Model
{
	private $table;
	public function __construct()
	{
		parent::__construct();
		$this->table['user'] = 'users';
		/*
		Roles:
		participant		(default)
		jury
		admin
		super-admin

		*/
	}

	public function insert($data)
	{
		if ($this->db->insert($this->table['agency_leads'], $data)) {
			return true;
		} else {
			return false;
		}
	}
}

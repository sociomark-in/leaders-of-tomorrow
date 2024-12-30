<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserModel extends CI_Model
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
		if ($this->db->insert($this->table['user'], $data)) {
			return true;
		} else {
			return false;
		}
	}

	public function get($select = null, $where = null)
	{
		if (!is_null($select)) {
			$this->db->select($select);
		}
		if (!is_null($where)) {
			$this->db->where($where);
		}
		return json_encode($this->db->get($this->table['user'])->result_array());
	}

	public function update($data, $where = null)
	{
		// $this->db->set();
		$this->db->set($data);
		if (!is_null($where)) {
			$this->db->where($where);
		}
		$affected_rows = $this->db->update($this->table['user']);
		if ($affected_rows > 0) {
			return $affected_rows;
		} else {
			return false;
		}
	}
}

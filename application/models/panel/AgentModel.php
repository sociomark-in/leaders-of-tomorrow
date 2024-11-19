<?php

class AgentModel extends CI_Model
{
	public $request, $response, $data, $table;

	public function __construct()
	{
		parent::__construct();
		$this->table = 'agents';
	}
	
	public function get($select = null, $where = null)
	{
		if (!is_null($select)) {
			$this->db->select($select);
		}
		if (!is_null($where)) {
			$this->db->where($where);
		}
		$this->db->order_by('created_at DESC');
		return json_encode($this->db->get($this->table)->result_array());
	}

	public function insert($data) {

		if ($this->db->insert($this->table, $data)) {
			return true;
		} else {
			return false;
		}
	}
}

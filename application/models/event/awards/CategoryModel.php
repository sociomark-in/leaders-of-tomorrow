<?php

class CategoryModel extends CI_Model
{
	private $table;
	public function __construct()
	{
		parent::__construct();
		$this->table['msme'] = 'msme_categories';
		$this->table['individual'] = 'individual_categories';
	}

	public function get_msme($select = null, $where = null) {
		if(!is_null($select)){
			$this->db->select($select);
		}
		if(!is_null($where)){
			$this->db->where($where);
		}
		return json_encode($this->db->get($this->table['msme'])->result_array());
	}
	public function get_individual($select = null, $where = null) {
		if(!is_null($select)){
			$this->db->select($select);
		}
		if(!is_null($where)){
			$this->db->where($where);
		}
		return json_encode($this->db->get($this->table['individual'])->result_array());
	}
}

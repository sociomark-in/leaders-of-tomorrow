<?php

class CityModel extends CI_Model
{

	private $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = 'cities';
	}

	/**
	 * get
	 *
	 * Conditionally Get the collection of Data in the form of JSON string. (Strictly)
	 * 
	 * @param  mixed $select
	 * @param  mixed $where
	 * @return void
	 */
	public function get($select = null, $where = null)
	{
		
		if (!is_null($select)) {
			$this->db->select($select);
		}
		if (!is_null($where)) {
			$this->db->where($where);
		}
		$this->db->order_by('city_name', 'ASC');
		return json_encode($this->db->get($this->table)->result_array());
	}
}

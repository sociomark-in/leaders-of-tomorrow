<?php

class StateModel extends CI_Model
{

	private $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = 'cities_megadata';
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
		// $this->db->where(['country' => 1]);
		$this->db->select('city_state')->distinct();
		if (!is_null($select)) {
			$this->db->select($select);
		}
		if (!is_null($where)) {
			$this->db->where($where);
		}
		$this->db->order_by('city_state', "ASC");
		return json_encode($this->db->get($this->table)->result_array());
	}
}

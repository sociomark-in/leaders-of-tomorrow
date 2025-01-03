<?php

class NominationModel extends CI_Model
{
	public $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = 'award_entries';
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
		return json_encode($this->db->get($this->table)->result_array());
	}

	/**
	 * insert
	 * 
	 * Insert a new Entry of the Applicant. Only Applicable for Stage i of Application form.
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function insert($data)
	{
		$this->load->model('event/awards/CategoryModel');
		if ($this->db->insert($this->table, $data)) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * update
	 *
	 * Conditionally Update the values of the Entry of Applicant. Applicable from Stage II onwards of the Application Form.
	 * Returns No. of Rows Affected or false which can be tested against an if...else statement. 
	 * 
	 * Also can be used against temporary deleting a record by setting status = 0.
	 * 
	 * @param  mixed $data
	 * @param  mixed $where
	 * @return void
	 */
	public function update($data, $where)
	{
		// $this->db->set();
		$this->db->set($data);
		if (!is_null($where)) {
			$this->db->where($where);
		}
		$affected_rows = $this->db->update($this->table);
		if ($affected_rows > 0) {
			return $affected_rows;
		} else {
			return false;
		}
	}
}

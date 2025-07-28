<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * BaseModel
 * 
 * Get, Insert, Update, Delete (Not Exactly, Mod_Update) Framework for Other Models to Extend
 */
class BaseModel extends CI_Model
{
	protected $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = "";
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
	public function get($select = null, $where = null) {
		
		if(!is_null($select)){
			$this->db->select($select);
		}
		if(!is_null($where)){
			$this->db->where($where);
		}
		return json_encode($this->db->get($this->table)->result_array());
	}
	
	/**
	 * insert
	 * 
	 * Insert a new Entry.
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function insert($data)
	{
		if ($this->db->insert($this->table, $data)) {
			return true;
		} else {
			return false;
		}
	}
	
	/**
	 * update
	 *
	 * Conditionally Update the values. 
	 * 
	 * Also can be used against temporary deleting a record by setting status = 0.
	 * 
	 * @param  mixed $data
	 * @param  mixed $where
	 * @return void
	 */
	public function update($data, $where) {
		// $this->db->set();
		if(!is_null($where)){
			$this->db->where($where);
		}
		$affected_rows = $this->db->update_batch($this->table, $data);
		if($affected_rows > 0){
			return $affected_rows;
		} else {
			return false;
		}
	}
}

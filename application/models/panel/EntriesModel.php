<?php

/* 

Full texts
id	
nomination_id	
name	
email	
organization_name	
organization_maxsize	
organization_industry	
organization_url	
organization_overview	
organization_mission_vission	
organization_services	
organization_reveue_23	
organization_reveue_22	
organization_growth_23	
organization_growth_22	
linkedin_url	
case_study_1	
case_study_2	
case_study_3	
case_study_4	
case_study_5	
case_study_6	
case_study_7	
case_study_8	
case_study_9	
document_1	
document_2	
document_3	
document_4	
cp_name	
cp_email	
cp_contact	
stage_status	
status	
created_by	
updated_at	
created_at
*/


/**
 * EntriesModel
 * 
 * Get, Insert, Update, Delete (Not Exactly, Mod_Update) the Entries of the Applicant/s
 */
class EntriesModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->table['nominations'] = "";
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
		return json_encode($this->db->get($this->table['nominations'])->result_array());
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
		$category = array_merge(
			json_decode($this->CategoryModel->get_individual(null, ['id' => $data['category_id']]), true),
			json_decode($this->CategoryModel->get_msme(null, ['id' => $data['category_id']]), true)
		)[0];
		if ($category['type'] == "Individual") {
			$table = "individual_entries";
		} else {
			$table = "msme_entries";
		}

		if ($this->db->insert($table, $data)) {
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
		if (!is_null($where)) {
			$this->db->where($where);
		}
		$affected_rows = $this->db->update_batch($this->table['nominations'], $data);
		if ($affected_rows > 0) {
			return $affected_rows;
		} else {
			return false;
		}
	}
}

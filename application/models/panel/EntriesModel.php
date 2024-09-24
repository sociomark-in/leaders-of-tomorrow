<?php

/* 
id	
nomination_id	
category_id
name	
email	
organization_name	
organization_url	
linkedin_url	
stage_status	
status	
created_by	
updated_at	
created_at


MSME

75501	organization_maxsize
75502	organization_industry
75503	organization_overview	
75504	organization_address	
75505 	organization_segment
75506	organization_funding	
75507	organization_inc_date
75508	organization_mission_vision	
75509	organization_services	
75510	organization_reveue_23	
75511	organization_reveue_22	
75512	organization_growth_23	
75513	organization_growth_22	
75514	organization_profit_23	
75515	organization_profit_22	
75516	organization_assets_23	
75517	organization_assets_22	
75518	organization_der_23	
75519	organization_der_22
75520	initiative_name	
75521	initiative_start_date	
75522	initiative_end_date	
75523	initiative_desc	
75524	initiative_challenges	
75525	initiative_strategy	
75526	initiative_tech	
75527	initiative_impact	
75528	initiative_scalability	
75529	initiative_info	
75530	document_1
75531	document_2
75532	document_3
75533	document_4
75534	cp_name	
75535	cp_email	
75536	cp_contact	


INDIVIDUAL

74501 dob
74502 designation
74503 total_experience
74504 organization_maxsize
74505 organization_industry
74506 organization_segment
74507 organization_inc_date
74508 organization_experience
74509 organization_overview
74510 organization_mission_vission
74511 organization_services
74512 organization_reveue_23
74513 organization_reveue_22
74514 organization_growth_23
74515 organization_growth_22
74516 case_study_1
74517 case_study_2
74518 case_study_3
74519 case_study_4
74520 case_study_5
74521 case_study_6
74522 case_study_7
74523 case_study_8
74524 case_study_9
74525 document_1
74526 document_2
74527 document_3
74528 document_4
74529 cp_name
74530 cp_email
74531 cp_contact

*/

/*
status
0	Rejected
1	Accepted
2	In Review
3	Complete
4	Draft 
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
	public function get($select = null, $where = null, $table = 'individual')
	{
		switch ($table) {
			case 'individual':
				$table = 'individual_entries';
				break;

			case 'msme':
				$table = 'msme_entries';
				break;

			default:
				$table = 'individual_entries';
				break;
		}
		if (!is_null($select)) {
			$this->db->select($select);
		}
		if (!is_null($where)) {
			$this->db->where($where);
		}
		return json_encode($this->db->get($table)->result_array());
	}

	/**
	 * insert
	 * 
	 * Insert a new Entry of the Applicant. Only Applicable for Stage i of Application form.
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function insert($data, $table = 'individual')
	{
		$this->load->model('event/awards/CategoryModel');
		$c = explode('_', $data['category_id']);
		switch ($c[1]) {
			case 'MSME':
				$category = json_decode($this->CategoryModel->get_msme(null, ['id' => $c[0]]), true)[0];
				break;
			case 'Individual':
				$category = json_decode($this->CategoryModel->get_individual(null, ['id' => $c[0]]), true)[0];
				break;
				
			default:
				$category = [];
				# code...
				break;
		}
		switch (strtolower($category['type'])) {
			case 'individual':
				$table = 'individual_entries';
				break;

			case 'msme':
				$table = 'msme_entries';
				break;

			default:
				$table = 'individual_entries';
				break;
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
	public function update($data, $where, $type = 'individual')
	{
		// $this->db->set();
		$this->db->set($data);
		if (!is_null($where)) {
			$this->db->where($where);
		}
		switch (strtolower($type)) {
			case 'individual':
				$table = 'individual_entries';
				break;

			case 'msme':
				$table = 'msme_entries';
				break;

			default:
				$table = 'individual_entries';
				break;
		}
		$affected_rows = $this->db->update($table);
		if ($affected_rows > 0) {
			return $affected_rows;
		} else {
			return false;
		}
	}
}

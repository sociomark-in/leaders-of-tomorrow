<?php

class ChartsDataAPIController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	
	/**
	 * agent_participants
	 * ### Description: 
	 * **Scope**: Global
	 * 
	 * AJAX  API to fill the Chart with Data Agents x Participants
	 * ### To Do:
	 *  - [ ] Get Agents and Participants Data
	 *  - [ ] Get Chart Type
	 *  - [ ] Get Data Duration - default: null
	 * @return void
	 */
	public function agent_participants(){
		$get = $this->input->get();
		/*
		type = Type of the Chart	default: bar
		duration 
		*/
	}
}

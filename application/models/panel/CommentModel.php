<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommentModel extends CI_Model
{
	public $table;
	public function __construct()
	{
		parent::__construct();
		$this->table = 'comments_log';
	}
	public function insert($data) {

		if ($this->db->insert($this->table, $data)) {
			return true;
		} else {
			return false;
		}
	}	
}

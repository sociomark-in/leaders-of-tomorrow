<?php
class TestController extends CI_Controller
{
	public function index()
	{
		echo "TestController is working!";
	}

	public function encrypt()
	{

		$this->result = $this->db->select(['config_key', 'value'])->get('app_config')->result_array();

		$this->encryption->initialize(
			array(
				'cipher' => 'aes-256',
				'mode' => 'ctr',
			)
		);

		foreach ($this->result as $key => $row) {
			$this->keys[$row['config_key']] = $this->encryption->decrypt($row['value']);
		}
		echo "<pre>";
		print_r($this->keys);
	}
}

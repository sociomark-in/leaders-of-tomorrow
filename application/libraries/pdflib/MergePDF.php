<?php
require_once APPPATH . "vendor/autoload.php";

use Ilovepdf\Ilovepdf;

class MergePDF
{
	private $CI, $keys, $pdf;
	public function __construct()
	{
		$this->CI = &get_instance();
		$this->keys = [];

		$this->CI->encryption->initialize(
			array(
				'cipher' => 'aes-256',
				'mode' => 'ctr',
			)
		);

		$result = $this->CI->db->select(['config_key', 'value'])->get('app_config')->result_array();
		$en = $this->CI->encryption->encrypt("8d03f94b9478e01a85944af052fcb428_QfsaF5c27251f1c8f287f996356815002c83d");
		echo "<pre>";
		print_r($result);
		foreach ($result as $key => $row) {
			$this->keys[$row['config_key']] = $this->CI->encryption->decrypt($row['value']);
		}
		
		print_r($this->keys);

		// [ilovepdf_public_key] => 8d03f94b9478e01a85944af052fcb428_QfsaF5c27251f1c8f287f996356815002c83d
    	// [ilovepdf_secret_key] => e56e32170ceb262c0cd2c2cb64e8badb_ShJMv360d9cb0476b2dd1b8607747c366ea98
		// $this->pdf = new Ilovepdf("project_public_" . $this->keys['ilovepdf_public_key'], "secret_key_" . $this->keys['ilovepdf_secret_key']);
	}

	public function merge($files, $filename) {
		// $task = $this->pdf->newTask('merge');
		foreach ($files as $key => $file) {
			// $task->addFile($file);
			print_r($file);
			echo "<br>";
		}
		// $task->execute();
		// $task->download($filename);
	}
}

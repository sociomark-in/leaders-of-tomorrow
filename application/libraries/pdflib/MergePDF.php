<?php

use Ilovepdf\Ilovepdf;

require_once APPPATH . '/vendor/autoload.php';

class MergePDF
{
	private $CI, $key, $pdf;
	public function __construct()
	{
		$this->CI = &get_instance();
		$this->key = [];

		$this->CI->encryption->initialize(
			array(
				'cipher' => 'aes-256',
				'mode' => 'ctr',
			)
		);
	}

	public function config()
	{
		foreach ($result as $key => $row) {
	        $i = 0;
            if($i<=5){
                if($row['config_key'] == 'ilovepdf_public_key_00'. $i){
                    if($row['usage_count'] < ILOVEPDF_API_REQUEST_LIMIT){
                        $this->key['name'] = $row['config_key'];
                        $value = json_decode($row['value'], true);
                        $this->key['public_key'] = $this->CI->encryption->decrypt($value[0]);
                        $this->key['secret_key'] = $this->CI->encryption->decrypt($value[1]);
                        return $this;
                    } else {
						break;
                    }
                }
                $i++;
            }
	   }
	}

	public function merge($files, $destination_folder, $filename)
	{
		if (!file_exists($destination_folder)) {
			mkdir($destination_folder, 0777, true);
		}
		$this->pdf = new Ilovepdf("project_public_" . $this->key['public_key'], "secret_key_" . $this->key['secret_key']);
		$task = $this->pdf->newTask('merge');
		foreach ($files as $key => $file) {
			$task->addFile($file);
		}
		$task->setOutputFilename($filename);
		$task->execute();
		$task->download($destination_folder);
		$this->CI->db->set('usage_count', 'usage_count+1', FALSE)->where('config_key', $this->key['name'])->update('app_config');
	}
}

<?php
class TestController extends CI_Controller
{
    public $keys;
	public function index()
	{
		echo "TestController is working!";
	}

	public function test(){
		print_r(hash('md5', hash('sha256', "8980940833")));
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
		    if(str_contains($row['config_key'], "ilovepdf")){
		        echo $key . "<br>";
		        $j = json_decode($row['value'], true);
		        $k = [];
		        if(!is_null($j)){
		            $k = [];
    		        foreach($j as $a => $m){
    		            $k[$a] = $this->encryption->decrypt($m);
    		        }
    			    $this->keys[$row['config_key']] = $k;
		        }
		    }
		}
		echo "<pre>";
		print_r($this->keys);
	}
}

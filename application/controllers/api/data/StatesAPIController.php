<?php

class StatesAPIController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->output
			->set_header('Cache-Control: no-store, no-cache')
			->set_content_type('application/json');
	}

	public function get_all_states()
	{
		$sample = [
			'Value 1',
			'Value 2',
			'Value 3',
			'Value 4',
			'Value 5',
			'Value 6',
		];

		foreach ($sample as $key => $value) {
			$data [] = [
				'id' => $key,
				'text' => $value,
			];
		}



		$this->output->set_output(json_encode($data));
	}
}

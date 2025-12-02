<?php 

class CategoryAPIController extends CI_Controller
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
		$this->load->model('event/awards/CategoryModel');
		
		$data['category'] = json_decode($this->Category->get(), true);

		// foreach ($data['states'] as $key => $state) {
		// 	$data['states'][$key]['cities'] => $this->CityModel->get(null, [''])
		// }


		$this->output->set_output(json_encode($data));
	}


	public function get_category_by_code(){
		$this->load->model('event/awards/CategoryModel');
		$data = $this->input->get('category');
		$category = json_decode($this->CategoryModel->get(null, ['code' => $data]), true)[0];
		$this->output->set_output(json_encode($category));
	}
}


?>

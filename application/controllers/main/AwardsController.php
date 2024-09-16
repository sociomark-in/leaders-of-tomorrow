<?php
require_once APPPATH . "controllers/BaseController.php";
class AwardsController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('event/awards/CategoryModel');
	}
	public function index()
	{
		$this->data['categories']['msme'] = json_decode($this->CategoryModel->get_msme(['name', 'code']), true);
		$this->data['categories']['individual'] = json_decode($this->CategoryModel->get_individual(['name', 'code']), true);
		$this->data['page'] = [
			'title' =>  APP_NAME . " Awards • " . APP_NAME,
			'description' => "",
		];

		$this->load->award_page('home', $this->data);
	}

	public function category_single($slug)
	{
		$category_details = array_merge(
			json_decode($this->CategoryModel->get_individual(null, ['code' => $slug]), true),
			json_decode($this->CategoryModel->get_msme(null, ['code' => $slug]), true)
		);

		$this->data['category'] = $category_details[0];

		$this->data['page'] = [
			'title' =>  $category_details[0]['name'] . " • " . APP_NAME . " Awards",
			'description' => "",
		];

		$this->load->award_page('detail', $this->data);
	}

	public function category_nominate($code)
	{
		$category_details = array_merge(
			json_decode($this->CategoryModel->get_individual(null, ['code' => $code]), true),
			json_decode($this->CategoryModel->get_msme(null, ['code' => $code]), true)
		);
		if (!isset($_SESSION['awards_panel_user'])) {
			redirect('login');
		} else {
			redirect('dashboard/category/' . $category_details[0]['code'] . '/nominate');
		}

		// $this->data['category'] = $category_details[0];
		// $this->data['page'] = [
		// 	'title' =>  $category_details[0]['name'] . " • " . APP_NAME . " Awards",
		// 	'description' => "",
		// ];
		// $this->load->award_page('nominate', $this->data);
	}
}

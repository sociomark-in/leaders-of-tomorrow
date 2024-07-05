<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class HistoryController extends BaseController
{
	public $data;
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->page('history/home', $this->data);
	}

	public function season_single($number)
	{
		switch ($number) {
			case '11':
				$this->data['partners'] = [
					[
						'text' => "Knowledge Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "NGO Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Research Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "An Initiative By",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Associate Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Green State Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Education Partner",
						'logo' => "times.png",
						'url' => null,
					],
				];
				$this->load->page('history/11', $this->data);
				break;
			case '10':
				$this->data['partners'] = [
					[
						'text' => "Green State Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "An Initiative By",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Associate Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Education Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Knowledge Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "NGO Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Research Partner",
						'logo' => "times.png",
						'url' => null,
					],
				];
				$this->load->page('history/10', $this->data);
				break;
			case '9':
				$this->data['partners'] = [
					[
						'text' => "An Initiative By",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Education Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Knowledge Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "NGO Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Associate Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Green State Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Research Partner",
						'logo' => "times.png",
						'url' => null,
					],
				];
				$this->load->page('history/9', $this->data);
				break;
			case '8':
				$this->data['partners'] = [
					[
						'text' => "An Initiative By",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Associate Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Green State Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Education Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Knowledge Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "NGO Partner",
						'logo' => "times.png",
						'url' => null,
					],
					[
						'text' => "Research Partner",
						'logo' => "times.png",
						'url' => null,
					],
				];
				$this->load->page('history/8', $this->data);
				break;
			case '7':
			case '6':
			case '5':
			case '4':
			case '3':
			case '2':
			case '1':
				$this->load->page('history/single', $this->data);
				break;

			default:
				redirect('history');
				break;
		}
	}
}

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
		$this->data['categories']['msme'] = json_decode($this->CategoryModel->get(['name', 'code']), true);

		$this->data['page'] = [
			'title' =>  APP_NAME . " Awards • " . APP_NAME,
			'description' => "",
		];

		$this->load->award_page('home', $this->data);
	}

	public function categories()
	{
		$this->data['categories']['msme'] = json_decode($this->CategoryModel->get(['name', 'code']), true);

		$this->data['page'] = [
			'title' =>  "All Categories" . " • " . APP_NAME . " Awards",
			'description' => "",
		];

		$this->load->award_page('categories', $this->data);
	}

	public function category_single($slug)
	{
		$categories = json_decode($this->CategoryModel->get(['name', 'code']), true);
		$category_details = json_decode($this->CategoryModel->get(null, ['code' => $slug]), true)[0];

		$this->data['category'] = $category_details;

		$this->data['page'] = [
			'title' =>  $category_details['name'] . " • " . APP_NAME . " Awards",
		];

		$content = [];
		switch ($slug) {
			case '2881':
				$content['description'] = "Recognizes MSMEs driving innovation in IT services, electronics, or software development contributing to technological advancements and digital transformation across industries.";
				break;

			case '2882':
				$content['description'] = "Recognizes MSMEs excelling in automobile components manufacturing, innovations in vehicle technologies, or OEM partnerships or EV manufacturing, charging infrastructure, or battery solutions";
				break;

			case '2883':
				$content['description'] = "This award honors MSMEs excelling in healthcare, wellness, or Ayurveda, creating affordable and innovative solutions that promote holistic well-being";
				break;

			case '2884':
				$content['description'] = "Recognizes MSMEs that bring innovation to food processing, packaging, and preservation, enhancing product quality and shelf life.";
				break;

			case '2885':
				$content['description'] = "Recognizes MSMEs organizations that demonstrate outstanding efficiency, innovation, and excellence in manufacturing practices, setting benchmarks for the industry. These will include industry such as textiles, apparels, industrial tools, specialized equipment’s, pharmaceuticals, chemicals, leather, footwear, furniture, plastic, polymer products, metal and fabrication, construction, infrastructure, and related sectors";
				break;

			case '2886':
				$content['description'] = "This award honors MSMEs excelling in creating innovative, sustainable, and market-leading lifestyle or consumer products, including fashion, home décor, personal care, and sustainable products";
				break;

			case '2887':
				$content['description'] = "Recognizes MSMEs offering last-mile delivery services for small e-commerce businesses and solving challenges in logistics and supply chain management through innovation.";
				break;

			case '2888':
				$content['description'] = "Recognizes MSMEs addressing the need for quality education and skill development through innovative tech-based solutions.";
				break;

			case '2889':
				$content['description'] = "Recognizes MSMEs that leverage technology and innovative practices to transform agriculture and allied services such as dairy, fisheries, or Agri-logistics.";
				break;

			case '2900':
				$content['description'] = "Recognizes MSMEs that have successfully integrated digital technologies to transform their operations, customer experience, or business models. This will include technologies like AI and IoT are being used to optimize supply chains, enhance customer experiences, and improve product quality";
				break;

			case '2911':
				$content['description'] = "Recognizes family-owned MSMEs that have demonstrated excellence in managing and growing their business while balancing tradition, innovation, and sustainability.";
				break;

			case '2921':
				$content['description'] = "Recognizes organizations or individuals who demonstrate exceptional leadership, innovation, and impact in global markets. Eligible businesses must have a presence in a minimum of five countries outside India, with representation in at least two countries from different continents. This category celebrates achievements in expanding international reach, fostering cross-border collaborations, and driving global business excellence across diverse industries";
				break;

			case '2931':
				$content['description'] = "Recognizes entrepreneurs who are making significant contributions to society, environment and social causes through their business practices or innovations.";
				break;

			case '2932':
				$content['description'] = "The Young Entrepreneur of the Year award recognizes individuals between the ages of 18 and 24 as of March 31, 2024, who have demonstrated exceptional entrepreneurial spirit and success by founding or co-founding a start-up or MSME. This award celebrates their vision, innovation, leadership, and commitment to creating a positive market and societal impact while navigating challenges and driving growth in their respective fields.";
				break;

			default:
				$content['description'] = "";
				break;
		}


		$this->data['content'] = $content;

		$this->load->award_page('single/' . $slug, $this->data);
	}

	public function category_nominate($code)
	{
		$category_details = json_decode($this->CategoryModel->get(null, ['code' => $code]), true)[0];
		if (!isset($_SESSION['awards_panel_user'])) {
			redirect('login');
		} else {
			redirect('dashboard/category/' . $category_details['code'] . '/nominate');
		}
	}

	public function terms_conditions()
	{
		$this->data['page'] = [
			'title' =>  APP_NAME . " Awards • " . APP_NAME,
			'description' => "",
		];

		$this->load->award_page('terms_conditions', $this->data);
	}
}

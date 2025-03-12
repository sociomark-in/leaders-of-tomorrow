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
		$this->data['grand_juries'] = [
			[
				'photo' => "Amit_Jain.png",
				'name' => "Amit Jain",
				'description' => "Co-Founder & CEO,CarDekho Group",
			],
			[
				'photo' => "Shauravi_Malik.png",
				'name' => "Shauravi Malik",
				'description' => "Co-Founder, Wholsum Foods (Slurrp Farm and Mille)",
			],
			[
				'photo' => "Anisha_Singh.png",
				'name' => "Anisha Singh",
				'description' => "Founder, She Capital",
			],
			[
				'photo' => "Prashant_Tandon.png",
				'name' => "Prashant Tandon",
				'description' => "CEO & Co-Founder, Tata 1mg",
			],
			[
				'photo' => "Vivek_Gambhir.png",
				'name' => "Vivek Gambhir",
				'description' => "Venture Partner, Lightspeed India",
			],
			[
				'photo' => "CP_Gurnani.png",
				'name' => "CP Gurnani",
				'description' => "CEO & Co-Founder, AIonOS",
			],
			[
				'photo' => "A_Velumani.png",
				'name' => "Dr A Velumani",
				'description' => "Creator, Thyrocare",
			],
			[
				'photo' => "Padmaja_Ruparel.png",
				'name' => "Padmaja Ruparel",
				'description' => "Co-Founder, IAN Group",
			],
			[
				'photo' => "Abhinandan_Lodha.png",
				'name' => "Abhinandan Lodha",
				'description' => "Chairman, The House of Abhinandan Lodha, HoABL Group",
			],
			[
				'photo' => "Sahil_Malik.png",
				'name' => "Sahil Malik",
				'description' => "MD & CEO, Da Milano & Rosso Brunello",
			],
			[
				'photo' => "Hiroshi_Nishijima.png",
				'name' => "Hiroshi Nishijima",
				'description' => "CEO, Zoomcar",
			],
			[
				'photo' => "Vinod_Kumar.png",
				'name' => "Vinod Kumar Wuthoo",
				'description' => "President, India SME Forum",
			],
			[
				'photo' => "Nilesh_Lele.png",
				'name' => "Nilesh Lele",
				'description' => "President, Chamber for Advancement of Small & Medium Businesses",
			],
			[
				'photo' => "Prashant_Naigaonkar.png",
				'name' => "Prashant Naigaonkar",
				'description' => "Startup Mentor and SME Advisor",
			],
			// [
			// 	'photo' => "",
			// 	'name' => "",
			// 	'description' => "",
			// ],
		];
		$this->data['chief_guest'] = [
			// [
			// 	'photo' => "Jayant_Chaudhary.png",
			// 	'name' => "Jayant Chaudhary",
			// 	'description' => "Minister, (I/C) Skill Development and Entrepreneurship & Minister of State for Education, Government of India",
			// ],
			[
				'photo' => "Anurag_Thakur.png",
				'name' => "Anurag Singh Thakur",
				'description' => "Former Union Minister, Chairman, Parliamentary Standing Committee on Coal, Mines & Steel",
			],
		];
		$this->data['speakers'] = [
			// [
			// 	'photo' => "V_Vaidyanathan.png",
			// 	'name' => "V Vaidyanathan",
			// 	'description' => "MD & CEO, IDFC FIRST Bank",
			// ],
			[
				'photo' => "Aman_Gupta.png",
				'name' => "Aman Gupta",
				'description' => "Co-Founder & CMO, boAt Lifestyle",
			],
			[
				'photo' => "Ashishkumar_Chauhan.png",
				'name' => "Ashishkumar Chauhan",
				'description' => "MD & CEO, NSE",
			],
			[
				'photo' => "Akis_Evangelidis.png",
				'name' => "Akis Evangelidis",
				'description' => "Co-Founder & India President, Nothing",
			],
			[
				'photo' => "Padmaja_Ruparel.png",
				'name' => "Padmaja Ruparel",
				'description' => "Co-Founder, IAN Group",
			],
			[
				'photo' => "A_Velumani.png",
				'name' => "Dr A Velumani",
				'description' => "Creator, Thyrocare",
			],
			[
				'photo' => "Radha_Kirthivasan.png",
				'name' => "Radha Kirthivasan",
				'description' => "Head, Listing and SME, BSE",
			],
			[
				'photo' => "Vivek_Gambhir.png",
				'name' => "Vivek Gambhir",
				'description' => "Venture Partner, Lightspeed India",
			],
			[
				'photo' => "Anisha_Singh.png",
				'name' => "Anisha Singh",
				'description' => "Founder, She Capital",
			],
			[
				'photo' => "Bert_Mueller.png",
				'name' => "Bert Mueller",
				'description' => "Founder, California Burrito",
			],
			[
				'photo' => "Spencer_Schneier.png",
				'name' => "Spencer Schneier",
				'description' => "Founder, Commenda",
			],
			// [
			// 	'photo' => "Anand_Mane.png",
			// 	'name' => "Anand Mane",
			// 	'description' => "Founder, Joul",
			// ],
		];
		
		$this->data['winners'] = [
			[
				'organization' => "Plant Remedies",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in Agri-Tech and Allied Services",
				'gallery' => [
					'main' => "assets/images/galleries/12/PlantRemedies.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/PlantRemedies.jpg"
				]
			],
			[
				'organization' => "Synnova Gears And Transmissions",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in Automobiles & Electric Vehicle",
				'gallery' => [
					'main' => "assets/images/galleries/12/Synnova.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Synnova.jpg"
				]
			],
			[
				'organization' => "Razzmatazz Design",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in Lifestyle and Consumer Products",
				'gallery' => [
					'main' => "assets/images/galleries/12/Razzmatazz.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Razzmatazz.jpg"
				]
			],
			[
				'organization' => "Pluckk",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in Food Processing & Packaging",
				'gallery' => [
					'main' => "assets/images/galleries/12/Pluckk.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Pluckk.jpg"
				]
			],
			[
				'organization' => "Jeevitam Livelihood Tech Solutions",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in EdTech and Skill Development",
				'gallery' => [
					'main' => "assets/images/galleries/12/Jeevitam.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Jeevitam.jpg"
				]
			],
			[
				'organization' => "Autosys Industrial Solutions",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in Manufacturing",
				'gallery' => [
					'main' => "assets/images/galleries/12/Autosys.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Autosys.jpg"
				]
			],
			[
				'organization' => "Global Engineers",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in Family Business Leadership",
				'gallery' => [
					'main' => "assets/images/galleries/12/Global.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Global.jpg"
				]
			],
			[
				'organization' => "Starkenn Technologies",
				'organization' => "Whiteklay Technologies",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in IT/ITES and Electronics",
				'gallery' => [
					'main' => "assets/images/galleries/12/Whiteklay.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Whiteklay.jpg"
				]
			],
			[
				'organization' => "Vipragen Biosciences",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in Health, Wellness & Ayurveda",
				'gallery' => [
					'main' => "assets/images/galleries/12/Vipragen.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Vipragen.jpg"
				]
			],
			[
				'organization' => "Enerture Technologies",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in Digital Transformation",
				'gallery' => [
					'main' => "assets/images/galleries/12/Enerture.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Enerture.jpg"
				]
			],
			[
				'organization' => "Microlit",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Global Business Leadership Award",
				'gallery' => NULL
			],
			[
				'organization' => "Swachh Sustainable Solutions",
				'type' => 'INDIVIDUAL',
				'person' => "Rahul Nainani",
				'designation' => "CEO & Co-Founder",
				'category' => "Social Impact Entrepreneur of the Year",
				'gallery' => [
					'main' => "assets/images/galleries/12/Swachh.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Swachh.jpg"
				]
			],
			[
				'organization' => "AWL India",
				'type' => 'INDIVIDUAL',
				'person' => "Rahul Mehra",
				'designation' => "Founder & CEO",
				'category' => "Entrepreneur of the Year",
				'gallery' => [
					'main' => "assets/images/galleries/12/AWL.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/AWL.jpg"
				]
			],
// 			// [
// 			// 	'organization' => "Jeevitam Livelihood Tech Solution",
// 			// 	'type' => 'INDIVIDUAL',
// 			// 	'person' => "Munish Chawla",
// 			// 	'designation' => "Co Founder and Chief Happiness Officer",
// 			// 	'category' => "Social Impact Entrepreneur of the year",
// 			// ],
			[
				'organization' => "Urban Monk",
				'type' => 'INDIVIDUAL',
				'person' => "Ruchika Bhuwalka",
				'designation' => "Founder",
				'category' => "Women Entrepreneur of the Year",
				'gallery' => [
					'main' => "assets/images/galleries/12/UrbanMonk.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/UrbanMonk.jpg"
				]
			],
			[
				'organization' => "Prathibha Biotech",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "Excellence in Green Revolution",
				'gallery' => [
					'main' => "assets/images/galleries/12/Prathibha.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Prathibha.jpg"
				]
			],
			[
				'organization' => "KAMA International Organic",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "IDFC FIRST Bank Rising Star",
				'gallery' => [
					'main' => "assets/images/galleries/12/KAMA.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/KAMA.jpg"
				]
			],
			[
				'organization' => "Manjha Technologies",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "IDFC FIRST Bank Rising Star",
				'gallery' => [
					'main' => "assets/images/galleries/12/Manjha.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Manjha.jpg"
				]
			],
			[
				'organization' => "Ayurveda House",
				'type' => 'MSME',
				'person' =>  NULL,
				'designation' =>  NULL,
				'category' => "IDFC FIRST Bank Rising Star",
				'gallery' => [
					'main' => "assets/images/galleries/12/Ayurveda.jpg",
					'thumb' => "assets/images/galleries/12/thumbs/Ayurveda.jpg"
				]
			],
		];
		$utm = NULL;
		if(!is_null($this->input->get('utm_source'))){
			$utm = [
				'utm_source' 	=> $this->input->get('utm_source'),
				'utm_medium' 	=> $this->input->get('utm_medium'),
				'utm_content' 	=> $this->input->get('utm_content'),
			];
			$this->session->set_tempdata('utm_lead', $utm, 300);
		}


		$this->data['categories']['active'] = json_decode($this->CategoryModel->get(null, ['valid_until >' => date("Y-m-d H:i:s")]), true);
		$this->data['categories']['all'] = json_decode($this->CategoryModel->get(null, ['id <=' => 14]), true);

		$this->data['page'] = [
			'title' => "IDFC FIRST Bank presents ET NOW " .  APP_NAME . " Awards 2025",
			'description' => "The Awards by ET NOW Leaders of Tomorrow recognize exceptional individuals and businesses making a significant impact across industries. This prestigious platform celebrates innovation, leadership, and excellence, honoring visionaries shaping the future. Join us in acknowledging the leaders of tomorrow, driving change and inspiring success.",
			'thumb' => base_url("assets/images/banners/awards_banner_h.jpg"),
		];

		$this->load->award_page('home', $this->data);
	}

	public function gallery(){
		$this->data['gallery'] = directory_map('assets/images/galleries/12/thumbs/');
		$this->load->award_page('gallery', $this->data);
	}

	public function categories()
	{
		$this->data['categories']['active'] = json_decode($this->CategoryModel->get(null, ['valid_until >' => date("Y-m-d H:i:s")]), true);
		$this->data['categories']['all'] = json_decode($this->CategoryModel->get(), true);

		$this->data['page'] = [
			'title' =>  "All Categories" . " • " . APP_NAME . " Awards",
			'description' => "",
		];

		$this->load->award_page('categories', $this->data);
	}

	public function category_single($slug)
	{
		$categories = json_decode($this->CategoryModel->get(null, ['valid_until >' => date("Y-m-d H:i:s")]), true);
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

			case '3001':
				$content['description'] = "Recognizes MSMEs driving innovation in IT services, electronics, or software development contributing to technological advancements and digital transformation across industries.";
				break;

			case '3002':
				$content['description'] = "Recognizes MSMEs excelling in automobile components manufacturing, innovations in vehicle technologies, or OEM partnerships or EV manufacturing, charging infrastructure, or battery solutions";
				break;

			case '3003':
				$content['description'] = "This award honors MSMEs excelling in healthcare, wellness, or Ayurveda, creating affordable and innovative solutions that promote holistic well-being";
				break;

			case '3004':
				$content['description'] = "Recognizes MSMEs that bring innovation to food processing, packaging, and preservation, enhancing product quality and shelf life.";
				break;

			case '3005':
				$content['description'] = "Recognizes MSMEs organizations that demonstrate outstanding efficiency, innovation, and excellence in manufacturing practices, setting benchmarks for the industry. These will include industry such as textiles, apparels, industrial tools, specialized equipment’s, pharmaceuticals, chemicals, leather, footwear, furniture, plastic, polymer products, metal and fabrication, construction, infrastructure, and related sectors";
				break;

			case '3006':
				$content['description'] = "This award honors MSMEs excelling in creating innovative, sustainable, and market-leading lifestyle or consumer products, including fashion, home décor, personal care, and sustainable products";
				break;

			case '3007':
				$content['description'] = "Recognizes MSMEs offering last-mile delivery services for small e-commerce businesses and solving challenges in logistics and supply chain management through innovation.";
				break;

			case '3008':
				$content['description'] = "Recognizes MSMEs addressing the need for quality education and skill development through innovative tech-based solutions.";
				break;

			case '3009':
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

		// $this->load->award_page('single/' . $slug, $this->data);
		$this->load->award_page('single', $this->data);
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

	public function attendee_register() {
		$this->data['award_event'] = [
			'date' => '2025-03-10 16:00:00',
			'venue' => "Taj Hotel, Delhi"
		];
		$this->load->award_page('attendee_register', $this->data);
	}

	public function rsvp_thankyou()
	{
		$this->load->award_page('thankyou', $this->data);
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

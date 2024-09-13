<?php
defined('BASEPATH') or exit('No direct script access allowed');
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
		$this->data['page'] = [
			'title' => "All Previous Seasons" . " • " . APP_NAME,
		];
		$this->load->page('history/home', $this->data);
	}

	public function season_single($number)
	{
		$this->data['season'] = $number;
		$this->data['page'] = [
			'title' => "Season " . $number . " • " . APP_NAME,
		];
		switch ($number) {
			case '11':
				$this->data['partners'] = [
					[
						'text' => "Associate Partner",
						'logo' => "idfc.png",
						'url' => null,
					],
				];
				$this->data['hcities'] = [
					[
						'name' => "Delhi",
						'date'	=> '20th February 2023',
						'venue' =>	"ITC Maurya, New Delhi.",
						'promo' => "sYe3B8D79lI",
						'text' => "The Leaders of Tomorrow Season 11 'Springboard' is a thought leadership conclave that will provide a space for inclusive dialogue with some of India's brightest minds in attendance. With an eye on setting the context for what lies next in the country's entrepreneurial landscape, Springboard will have Policymakers, Industrialists, Economists & Entrepreneurs driving the agenda centred around India's Growth Engines- it's SME and MSME sectors",
					],
					[
						'name' => "Surat",
						'date'	=> '28th April 2023',
						'venue' =>	"Le Meridien, Surat.",
						'promo' => "Z7thkF-SdUY",
						'text' => "Inspite of rising raw material costs, inflationary pressure and fluctuating domestic and overseas demand, the City of Surat continues to steadily weave the way from fibre to fashion. To hear directly from the experts as to the role the country's textile capital is playing in building an Atma Nirbhar India, join the Leaders of Tomorrow Surat Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Chennai",
						'date'	=> '24th March 2023',
						'venue' =>	"Crowne Plaza Chennai Adyar Park, Chennai.",
						'promo' => "OKBws2TE-EU",
						'text' => "With the emergence of electric vehicles, and the dominance of digital technology, mobility has taken on a new meaning. Seemingly every aspect of an automobile has undergone a metamorphosis, from fuel to form factor. And amidst the competing dynamics engulfing the automotive industry, be it cost sensitivity on the one hand, and improved efficiency on the other, or the fight for market share vis a vis the prioritization of profitability, the City of Chennai has emerged as an unsung hero in this space. To explore how Chennai is powering India's automotive growth engine, join the Leaders of Tomorrow Chennai Springboard - one pitstop on our pan India roadshow series, only on ET Now",
					],
					[
						'name' => "Hyderabad",
						'date'	=> '14th April 2023',
						'venue' =>	"Radisson Blu Plaza, Hyderabad.",
						'promo' => "5TPNODJdBtE",
						'text' => "Hyderabad is famed for its rich heritage and we aim to unravel the latest trends prevailing in the jewellery space. To hear from experts how they are reinventing themselves in a rapidly evolving world and embodying the entrepreneurial spirit, join the Leaders of Tomorrow Hyderabad Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Ranchi",
						'date'	=> '12th May 2023',
						'venue' =>	"Chanakya BNR Hotel, Ranchi.",
						'promo' => "IhMT-L_XRzM",
						'text' => "Ranchi has historically been among the highest employment generating Tier-III cities in India in large part due to the strength of its industrial landscape and the steady spurts of growth across its service sector. To participate in a focused dialogue around how Ranchi is reinvigorating its service-driven economy, why it matters, and what it means for SMEs --join the Leaders of Tomorrow Ranchi Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Pune",
						'date'	=> '9th June 2023',
						'venue' =>	"The Pride Hotel, Pune.",
						'promo' => "r3cQzIgNyeA",
						'text' => "Pune is known for its state-of-the-art manufacturing prowess that spans across sectors. To decode how the city's small businesses can leverage large-scale and world-class manufacturing units to create a big business impact, join the Leaders of Tomorrow Pune Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Bengaluru",
						'date'	=> '23rd June 2023',
						'venue' =>	"The Pride Hotel, Bengaluru.",
						'promo' => "b8i0GBfttmc",
						'text' => "Bengaluru, once known as the 'back office' of the world courtesy of its prominence in the global IT outsourcing industry, has transformed into a vibrant hub of innovation, entrepreneurship, & startup culture, with emphasis on cutting-edge technologies like artificial intelligence, blockchain, and the Internet of Things. This tectonic shift has substantiated the city's reputation as the hotspot for quality tech talent and investment, heralding a new chapter in India's economic & technological evolution, one where we aren't the back office but the front runners to be global power players",
					],
					[
						'name' => "Udaipur",
						'date'	=> '30th June, 2023',
						'venue' =>	"juSTa Ssatva Resort & Convention Centre, Udaipur.",
						'promo' => "1w4l2V3PqkA",
						'text' => "Udaipur hospitality industry is valued at upwards of Rs 1,000 crores, employing over ten thousand professionals, with over one thousand hotels, resorts, guest houses and homestays sprinkled across the City. However, Udaipur's tourism landscape is gradually shifting its focus from its historic royal heritage to a new tech-savvy flavour of ecotourism. For an overview of how Udaipur is changing the narrative of Indian tourism, join the Leaders of Tomorrow Udaipur Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Ahmedabad",
						'date'	=> '7th July, 2023',
						'venue' =>	"Pride Plaza Hotel, Ahmedabad.",
						'promo' => "Dx6mBV2k1aU",
						'text' => "Ahmedabad is fast gaining traction as India's Growth Powerhouse, thanks to the city's strategic location, business-friendly policies & emphasis on innovation & technology. Furthermore, FDIs worth $10 Billion & the Gujarat International Finance Tec-City (GIFT City) have positioned the city as a financial catalyst of global relevance. The Leaders of Tomorrow's Ahmedabad Springboard will bring together industry experts to discuss & decipher the city that is accelerating India's exponential rise in the new world order",
					],
					[
						'name' => "Coimbatore",
						'date'	=> '21st July, 2023',
						'venue' =>	"Gokulam Park, Coimbatore.",
						'promo' => "cNMtHIdXL4k",
						'text' => "Coimbatore, Tamil Nadu's second largest city by GDP, is now home to in excess of 50,000 engineering units thanks to its deeply diversified multi-disciplinary manufacturing sector. Attend the Leaders of Tomorrow Coimbatore Springboard to witness experts weigh in on how the City has transformed from a textile capital to a multi-sector engineering mecca.",
					],
					[
						'name' => "Nagpur",
						'date'	=> '4th August, 2023',
						'venue' =>	"Pride Hotel, Sonegaon, Nagpur.",
						'promo' => "opUr4lM_r4w",
						'text' => "Nagpur, the Orange City, has always been celebrated as the country's food processing and food manufacturing capital. However, the zero miles city, which marks the country's geographic centerpoint, is now capitalising on its rapidly maturing infrastructure to trim logistics costs and facilitate ease of exports. To learn more about how The City is leveraging location to its advantage to become a logistics capital, join the Leaders of Tomorrow Nagpur Springboard-- one pitstop on our pan India roadshow series, only on ET NOW.",
					],
					[
						'name' => "Goa",
						'date'	=> '18th Aug, 2023',
						'venue' =>	"Pride Sun Village Resort and Spa Goa Saquwadi, Goa.",
						'promo' => "pRY0iWSaFEE",
						'text' => "Goa has always been among India's most desirable tourist destinations, with staycation culture now encouraging property buyers to make a beeline for second homes across the state. The recent launch of the airport in North Goa has dramatically improved accessibility and only added to its cache, with the demand for high-end holiday homes now at an all time high. To decode the supply-demand dynamics in this market, and hear from the experts on why stakeholders across the real estate ecosystem are setting their sights on Goa, join the Leaders of Tomorrow Goa Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Thiruvanathapuram",
						'date'	=> '8th Sept 2023',
						'venue' =>	"Hotel Residency Tower,	Thiruvananthapuram.",
						'promo' => "4dzIMsjWDEI",
						'text' => "Thiruvananthapuram, often referred to as the 'Evergreen City of India' has earned its reputation not only for its scenic locales but also for its prudence in nurturing skills & developing quality talent. The city with its thriving economy & rich demographic dividend, embraces sectors ranging from Aerospace and IT to Tourism & Tea Production & has become a case study for skill development. Joining us at the Leaders of Tomorrow's Thiruvananthapuram Springboard are the trailblazers shaping the Kerala Success Story.  This thrilling event is just one stop on our incredible pan India roadshow series. So, get ready and join us for this exhilarating journey only on ET NOW.
						",
					],
					[
						'name' => "Guwahati",
						'date'	=> '15th September 2023',
						'venue' =>	"The Lily Hotel, Guwahati.",
						'promo' => "DF3pz9f8mVY",
						'text' => "Assam is one of the highest tea-producing areas in the world, responsible for over 80% of India's tea export basket. Guwahati has since made significant strides in diversifying its economy and creating new frontiers for growth, in the retail, manufacturing, and tourism verticals specifically. The gateway to the north east has always leveraged location to its advantage, with trade and transportation contributing a growing lion's share of the state's economy. To discover how Guwahati is championing a series of sunrise sectors emerging across the North East, join us for the Leaders of Tomorrow Guwahati Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Dehradun",
						'date'	=> '29th September 2023',
						'venue' =>	"Seyfert Sarovar Premiere, Dehradun.",
						'promo' => "YGXQE8uN-Hw",
						'text' => "Nestled amidst the Himalayas, Dehradun is emerging as a dynamic catalyst in Uttarakhand's flourishing startup ecosystem. More than just a gateway to the mountains, this picturesque city embodies innovation & entrepreneurship. Ranging from technological marvels that enhance daily life to eco-conscious initiatives that resonate with sustainability at its core, Uttarakhand's startups are crafting a daring and motivating vision of what can be achieved. Join us at Leaders of Tomorrow's Dehradun Springboard, where we engage with the trailblazing minds that drive Uttarakhand's Startup Ecosystem. As an exciting segment of our expansive pan-India roadshow series, brace yourself and be a part of this exhilarating journey, exclusively on ET NOW.",
					],
					[
						'name' => "Kolkata",
						'date'	=> '5th October 2023',
						'venue' =>	"Hotel Hindustan International (HHI), Kolkata.",
						'promo' => "5VfyhBdEnI4",
						'text' => "Kolkata's role as the rising hub of India-ASEAN connectivity holds immense promise for businesses and regional development. The trilateral highway connecting Kolkata to Bangkok is set to promote economic ties, foster tourism, potentially leading to increased investment and economic growth in the area. With improved accessibility and economic collaboration, there is likely to be immense potential for growth, trade and cultural exchange. As Kolkata emerges as the focal point of this strategic endeavor, businesses are expected to reap substantial benefits such more efficient trade routes, reduced transportation costs, and expanded market access.",
					],
					[
						'name' => "Bhubaneswar",
						'date'	=> '13th October 2023',
						'venue' =>	"Pal Heights Jayadev Vihar, Bhubaneswar.",
						'promo' => "_kXAaNHuK0k",
						'text' => "Bhubaneswar, often referred to as the \"Temple City of India,\" combines a rich cultural heritage with a rapidly growing economy, making it an ideal destination for entrepreneurs and small business owners. Odisha's business friendly government initiatives, such as Make in Odisha & Startup Odisha have created a conducive ecosystem for entrepreneurs to establish and grow their ventures. Join us at the Leaders of Tomorrow’s Bhubaneswar Springboard as we put the spotlight on the city becoming the Eastern Hub for Small Businesses and engage with the key players driving sustainable economic growth. ",
					],
					[
						'name' => "Bhopal",
						'date'	=> '27th October 2023',
						'venue' =>	"32/7, Lalita Nagar, Bhopal.",
						'promo' => "kHJLmg4n8ek",
						'text' => "With the government of Madhya Pradesh heavily incentivising homegrown manufacturing, Bhopal has emerged as the state's leading industrial hub, drawing exponential investment across its pharmaceutical, automobile, textile and electrical goods sectors. To shed more light on how the city is enticing investors to partake in MP's industrial transformation -- join the Leaders of Tomorrow Bhopal Springboard - one pitstop on our pan India roadshow series, only on ET Now.",
					],
					[
						'name' => "Lucknow",
						'date'	=> '3rd November 2023',
						'venue' =>	"Golden Tulip, Lucknow.",
						'promo' => "dm9ZoN4caAY",
						'text' => "Lucknow is emerging as a pivotal player in shaping the Smart City vision of the region as Uttar Pradesh sets its eyes on becoming a $1 trillion dollar economy. With its deep-rooted historical significance and a harmonious blend of modern development, Lucknow is poised to become a model for other cities as it aims to create an interconnected urban ecosystem. To uncover the role Lucknow's rapidly maturing infrastructural and industrial landscape will play in enhancing ease of doing business alongside promoting cross-sector growth, join the Leaders of Tomorrow Lucknow Springboard-- one pitstop on our pan India roadshow series, only on ET NOW.",
					],
					[
						'name' => "Mumbai",
						'date'	=> '21st December 2023',
						'venue' =>	"Taj Lands End, Mumbai.",
						'promo' => "sYe3B8D79lI",
						'text' => "Exploring Mumbai's dynamic landscape as the gateway to opportunities, we highlight the city's booming finance, corporate and startup industries while spotlighting how inter-city infrastructure developments are set to redefine Mumbai's future.",
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

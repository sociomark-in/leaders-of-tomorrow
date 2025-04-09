<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class PagesController extends BaseController
{

	public function index()
	{
		$this->data['articles'] = [
			[
				'thumb' => "https://static.tnn.in/thumb/msid-119465723,thumbsize-164428,width-1280,height-720,resizemode-75/119465723.jpg?quality=100",
				'title' => "Former Union Minister Anurag Thakur backs MSMEs & startup growth",
				'redirect' => "https://www.timesnownews.com/web-stories/india/lot-awards-s12-anurag-singh-thakur-address-article-119465723"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-118914566,thumbsize-164428,width-1280,height-720,resizemode-75/118914566.jpg?quality=100",
				'title' => "ET NOW Leaders of Tomorrow Awards Season 12: भारत के टॉप MSMEs और Startups सम्मानित",
				'redirect' => "https://hindi.etnownews.com/news/indias-top-msmes-and-startups-honoured-at-et-now-leaders-of-tomorrow-awards-season-12-powering-entrepreneurs-for-the-global-stage-article-118914566"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-118903544,thumbsize-164428,width-1280,height-720,resizemode-75/118903544.jpg?quality=100",
				'title' => "India’s Top MSMEs and Startups Honoured at ET NOW Leaders of Tomorrow Awards",
				'redirect' => "https://www.etnownews.com/news/indias-top-msmes-startups-honoured-at-et-now-leaders-of-tomorrow-awards-season-12-powering-entrepreneurs-for-the-global-stage-article-118903544"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-118845436,thumbsize-164428,width-1280,height-720,resizemode-75/118845436.jpg?quality=100",
				'title' => "देखें LIVE: IDFC FIRST Bank द्वारा प्रस्तुत ईटी नाउ लीडर्स ऑफ टुमॉरो अवार्ड्स सीजन 12 | स्ट्रीमिंग",
				'redirect' => "https://hindi.etnownews.com/news/watch-live-idfc-first-bank-presents-et-now-leaders-of-tomorrow-awards-season-12-streaming-direct-link-article-118845436"
			],
		    [
				'thumb' => "https://static.tnn.in/thumb/msid-118788243,thumbsize-164428,width-1280,height-720,resizemode-75/118788243.jpg?quality=100",
				'title' => "IDFC Bank Presents ET NOW Leaders of Tomorrow Awards Season 12",
				'redirect' => "https://www.etnownews.com/news/idfc-bank-presents-et-now-leaders-of-tomorrow-awards-season-12-recognizing-indias-trailblazing-entrepreneurs-article-118788243"
			],
		    [
				'thumb' => "https://static.tnn.in/thumb/msid-118787847,thumbsize-164428,width-1280,height-720,resizemode-75/118787847.jpg?quality=100",
				'title' => "ET NOW Leaders of Tomorrow Awards Season 12: भारत के उभरते उद्यमियों को किया जाएगा सम्मानित",
				'redirect' => "https://hindi.etnownews.com/news/idfc-bank-presents-et-now-leaders-of-tomorrow-awards-season-12-recognizing-indias-emerging-entrepreneurs-article-118787847"
			],
		    [
				'thumb' => "https://static.tnn.in/thumb/msid-118596760,thumbsize-164428,width-1280,height-720,resizemode-75/118596760.jpg?quality=100",
				'title' => "Leaders of Tomorrow Season 12 Awards: Honouring India’s Entrepreneurial Excellence",
				'redirect' => "https://www.etnownews.com/news/leaders-of-tomorrow-season-12-awards-honouring-indias-entrepreneurial-excellence-article-118595838"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-118107565,thumbsize-164428,width-1280,height-720,resizemode-75/118107565.jpg?quality=100",
				'title' => "Charting India’s Growth Story: 3 Visionary Insights from Nadir Godrej",
				'redirect' => "https://www.etnownews.com/news/charting-indias-growth-story-3-visionary-insights-from-nadir-godrej-article-118107565"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-118003029,thumbsize-164428,width-1280,height-720,resizemode-75/118003029.jpg?quality=100",
				'title' => "Navigating Intellectual Property Rights: A Wakeup Call for Entrepreneurs",
				'redirect' => "https://www.etnownews.com/news/navigating-intellectual-property-rights-a-wake-up-call-for-entrepreneurs-article-118003029"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-117979686,thumbsize-164428,width-1280,height-720,resizemode-75/117979686.jpg?quality=100",
				'title' => "MSMEs Shooting for the Stars in India's Space Sector",
				'redirect' => "https://www.etnownews.com/news/msmes-shooting-for-the-stars-in-indias-space-sector-article-117979686"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-117671584,thumbsize-164428,width-1280,height-720,resizemode-75/117671584.jpg?quality=100",
				'title' => "Relevance & Longevity: 4 Lessons from Bharat Floorings & Tiles",
				'redirect' => "https://www.etnownews.com/news/relevance-longevity-4-lessons-from-bharat-floorings-tiles-article-117671584"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-117392504,thumbsize-164428,width-1280,height-720,resizemode-75/117392504.jpg?quality=100",
				'title' => "Mastering Tomorrow: Skill Surge for MSMEs in the Workforce",
				'redirect' => "https://www.etnownews.com/news/mastering-tomorrow-skill-surge-for-msmes-in-the-workforce-article-117392504"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-117191517,thumbsize-164428,width-1280,height-720,resizemode-75/117191517.jpg?quality=100",
				'title' => "3 Key Takeaways from Neeta Lulla on India's Handloom Sector",
				'redirect' => "https://www.etnownews.com/news/3-key-takeaways-from-neeta-lulla-on-indias-handloom-sector-article-117191517"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-116983014,thumbsize-164428,width-1280,height-720,resizemode-75/116983014.jpg?quality=100",
				'title' => "From Fields to Fortune: The Thriving Potential of Rural Entrepreneurship",
				'redirect' => "https://www.etnownews.com/news/from-fields-to-fortune-the-thriving-potential-of-rural-entrepreneurship-article-116983014"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-112835556,thumbsize-164428,width-1280,height-720,resizemode-75/112835556.jpg?quality=100",
				'title' => "Leaders of Tomorrow Season 12: Empowering Indian Entrepreneurs for Global",
				'redirect' => "https://www.timesnownews.com/india/leaders-of-tomorrow-season-12-empowering-indian-entrepreneurs-for-global-success-article-112835531"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-114681918,thumbsize-164428,width-1280,height-720,resizemode-75/114681918.jpg?quality=100",
				'title' => "ET Now Leaders of Tomorrow Unveils a Festive Week Special",
				'redirect' => "https://www.timesnownews.com/leaders-of-tomorrow/et-now-leaders-of-tomorrow-unveils-a-festive-week-special-article-114681918"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-116427400,thumbsize-164428,width-1280,height-720,resizemode-75/116427400.jpg?quality=100",
				'title' => "6 Entrepreneurial Lessons to Learn from Ankur Warikoo",
				'redirect' => "https://www.etnownews.com/news/6-entrepreneurial-lessons-to-learn-from-ankur-warikoo-article-116427400"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-110893211,thumbsize-164428,width-1280,height-720,resizemode-75/110893211.jpg?quality=100",
				'title' => "Chennai's Startup Ecosystem Thrives Across Asia, Secures 18th Rank",
				'redirect' => "https://www.timesnownews.com/chennai/chennais-startup-ecosystem-thrives-across-asia-city-secures-18th-rank-among-30-cities-article-110893211"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-111183451,thumbsize-164428,width-1280,height-720,resizemode-75/111183451.jpg?quality=100",
				'title' => "Entrepreneur Returns to India After 7 Years, Prefers Bengaluru Over San Francisco",
				'redirect' => "https://www.timesnownews.com/bengaluru/entrepreneur-returns-to-india-after-7-years-prefers-bengaluru-over-san-francisco-know-why-article-111183451/amp"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-112765801,thumbsize-164428,width-1280,height-720,resizemode-75/112765801.jpg?quality=100",
				'title' => "India’s Startup Ecosystem Raises $265 Million Across 16 Deals This Week - Details",
				'redirect' => "https://www.timesnownews.com/business-economy/industry/indias-startup-ecosystem-raises-265-million-across-16-deals-this-week-details-article-112765801/amp"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-112846900,thumbsize-164428,width-1280,height-720,resizemode-75/112846900.jpg?quality=100",
				'title' => "Reflect Orbital: The California Startup Aiming To Sell Sunlight At Night",
				'redirect' => "https://www.timesnownews.com/world/us/us-news/reflect-orbital-the-california-startup-aiming-to-sell-sunlight-at-night-article-112846900/amp"
			],
			[
				'thumb' => "https://static.tnn.in/thumb/msid-111535432,thumbsize-164428,width-1280,height-720,resizemode-75/111535432.jpg?quality=100",
				'title' => "Budget Bonanza or Business Blues? What MSMEs Expect from Budget 2024-25",
				'redirect' => "https://www.timesnownews.com/business-economy/budget/budget-bonanza-or-business-blues-what-msmes-expect-from-budget-2024-25-article-111535432/amp"
			],

			[
				'thumb' => "https://etstatic.tnn.in/photo/msid-111950960,updatedat-1721717126400,width-200,height-200,resizemode-75/111950960.jpg",
				'title' => "Budget 2024 for MSMEs, MUDRA loans, small businesses, e-commerce",
				'redirect' => "https://www.etnownews.com/budget/budget-2024-for-msmes-mudra-loans-small-businesses-e-commerce-article-111950960"
			],
			[
				'thumb' => "https://etstatic.tnn.in/photo/msid-112591406,updatedat-1721717126400,width-200,height-200,resizemode-75/112591406.jpg",
				'title' => "India's Women Entrepreneurs Driving The Future In MSMEs | Stories Of Resilience &...",
				'redirect' => "https://www.etnownews.com/videos/indias-women-entrepreneurs-driving-the-future-in-msmes-stories-of-resilience-success-et-now-video-112591406"
			],
			[
				'thumb' => "https://etstatic.tnn.in/thumb/msid-108934365,updatedat-1711951340343,width-390,height-200,resizemode-75/108934365.jpg",
				'title' => "What Are The 45 Day MSME Payment Rules And What Should You Be Aware Of?...",
				'redirect' => "https://www.etnownews.com/videos/what-are-the-45-day-msme-payment-rules-and-what-should-you-be-aware-of-tp-ostwal-ashok-singhal-video-108934365"
			],
		];
		$this->data['page'] = [
			'title' => APP_NAME . " " . date('Y') . " • " . "Powering Entrepreneurs for the Global Stage",
		];
		$this->load->page('home', $this->data);
	}
}

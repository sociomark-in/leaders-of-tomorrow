<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once APPPATH . "controllers/BaseController.php";
class PagesController extends BaseController
{

	public function index()
	{
		$this->data['articles'] = [
			[
				'thumb' => "https://static.tnn.in/thumb/msid-112835531,thumbsize-164428,width-1280,height-720,resizemode-75/112835531.jpg?quality=100",
				'title' => "Leaders of Tomorrow Season 12: Empowering Indian Entrepreneurs for Global",
				'redirect' => "https://www.timesnownews.com/india/leaders-of-tomorrow-season-12-empowering-indian-entrepreneurs-for-global-success-article-112835531"
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
			'title' => APP_NAME . " " .date('Y'). " • " . "Powering Entrepreneurs for the Global Stage",
		];
		$this->load->page('home', $this->data);
	}
}

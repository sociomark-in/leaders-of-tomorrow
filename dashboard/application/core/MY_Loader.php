<?php

class MY_Loader extends CI_Loader
{
	public function __construct()
	{
		parent::__construct();
		$CI = &get_instance();
		$CI->load = $this;
	}
	

	public function mini_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_mini', $vars);
		$this->view('panel/' . $view, $vars);
		$this->view('layout/_2_mini', $vars);
	}

	public function panel_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_panel', $vars);
		// $this->view('panel/participant/' . $view, $vars);
		$this->view('layout/_2_panel', $vars);
	}
	
	public function admin_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_mini', $vars);
		$this->view('panel/admin/' . $view, $vars);
		$this->view('layout/_2_mini', $vars);
	}
	public function moderator_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_mini', $vars);
		$this->view('panel/moderator/' . $view, $vars);
		$this->view('layout/_2_mini', $vars);
	}

	// public function error_view($view, $vars = array(), $return = FALSE){
	// 	$this->view('layout/_1_mini', $vars);
	// 	$this->view("error_pages/" . $view, $vars);
	// 	$this->view('layout/_2_mini', $vars);
	// }

	public function onboarding_view($view, $vars = array(), $return = FALSE)
	{
		$this->view('layout/_1', $vars);
		$this->view("onboarding/" . $view, $vars);
		$this->view('layout/_2', $vars);
	}

	public function mini_layout($view, $vars = array(), $return = FALSE)
	{
		$this->view('layout/_1_mini', $vars);
		$this->view($view, $vars);
		$this->view('layout/_2_mini', $vars);
	}

	public function error_view($view, $vars = array(), $return = FALSE)
	{
		$this->view('layout/_1_mini', $vars);
		$this->view("error_pages/" . $view, $vars);
		$this->view('layout/_2_mini', $vars);
	}
}

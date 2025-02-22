<?php

class MY_Loader extends CI_Loader
{
	public function __construct()
	{
		parent::__construct();
		$CI =& get_instance();
        $CI->load = $this;
	}
	public function page($view, $vars = array(), $return = FALSE)
	{
		$this->view('layout/_1', $vars);
		$this->view("main/" . $view, $vars);
		$this->view('layout/_2', $vars);
	}
	
	public function award_page($view, $vars = array(), $return = FALSE)
	{
		$this->view('layout/_1_awards', $vars);
		$this->view("awards/" . $view, $vars);
		$this->view('layout/_2_awards', $vars);
	}
	
	public function city_view($view, $vars = array(), $return = FALSE)
	{
		$this->view('layout/_1_sb', $vars);
		$this->view("main/city/" . $view, $vars);
		$this->view('layout/_2_sb', $vars);
	}

	public function panel_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_panel', $vars);
		$this->view('panel/participant/' . $view, $vars);
		$this->view('layout/_2_panel', $vars);
	}
	public function agency_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_panel', $vars);
		$this->view('panel/agency/' . $view, $vars);
		$this->view('layout/_2_panel', $vars);
	}
	public function admin_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_panel', $vars);
		$this->view('panel/admin/' . $view, $vars);
		$this->view('layout/_2_panel', $vars);
	}
	public function superadmin_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_panel', $vars);
		$this->view('panel/superadmin/' . $view, $vars);
		$this->view('layout/_2_panel', $vars);
	}
	public function moderator_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_panel', $vars);
		$this->view('panel/moderator/' . $view, $vars);
		$this->view('layout/_2_panel', $vars);
	}
	

	public function mini_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_mini', $vars);
		$this->view($view, $vars);
		$this->view('layout/_2_mini', $vars);
	}

	public function error_view($view, $vars = array(), $return = FALSE){
		$this->view('layout/_1_mini', $vars);
		$this->view("error_pages/" . $view, $vars);
		$this->view('layout/_2_mini', $vars);
	}
}

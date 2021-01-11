<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location_list extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Main_model', 'mainmodel');
		$this->load->library('Checklogin', 'checklogin');
	}
	
	function render_view($data)
	{
		$this->template->load('template', $data); //Display Page
	}

	public function index()
	{
		$check = $this->checklogin->check();
		if($check == true){
			$data = array(
				'content' 		=> 'page/location_list/v_location_list_index',
				'ribbon' 		=> '<li class="breadcrumb-item"><a href="'.base_url().'">Dashboard</a></li>
									<li class="breadcrumb-item">Location list</li>',
				'page_name' 	=> 'Location List',
				'css_file' 		=> 'page/location_list/css_location_list',
				'js_file' 		=> 'page/location_list/js_location_list',
			);
			$this->render_view($data);
		}else{
			redirect('../auth/login', 'refresh');
		}
	}

}

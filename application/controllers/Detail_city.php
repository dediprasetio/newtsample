<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_city extends CI_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('Main_model', 'mainmodel');
		$this->load->library('Checklogin', 'checklogin');
		$this->load->model('Main_query', 'm_mainquery');
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
				'ribbon' 		=> '<li class="active">Location List</li>',
				'page_name' 	=> 'Location List',
				'css_file' 		=> 'page/location_list/css_location_list',
				'js_file' 		=> 'page/location_list/js_location_list',
			);
			$this->render_view($data);
		}else{
			redirect('../auth/login', 'refresh');
		}
    }
    
    public function dki_jakarta()
	{
		$check = $this->checklogin->check();
		if($check == true){
            $mySite = $this->m_mainquery->getSite()->result_array();
			$data = array(
				'content' 		=> 'page/detail_dki_jakarta/v_detail_dki_jakarta_index',
				'ribbon' 		=> '<li class="active">Jabodetabek</li><li>DKI Jakarta</li><li class="active">All Chart</li><li class="active">Detail City</li>',
				'page_name' 	=> 'Location List',
				'css_file' 		=> 'page/detail_dki_jakarta/css_detail_dki_jakarta',
                'js_file' 		=> 'page/detail_dki_jakarta/js_detail_dki_jakarta',
                'mySite'        => $mySite
			);
			$this->render_view($data);
		}else{
			redirect('../auth/login', 'refresh');
		}
	}

}

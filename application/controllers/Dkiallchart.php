<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dkiallchart extends CI_Controller {

	function __construct()
    {
        parent::__construct();
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
				'content' 		=> 'page/dki_allchart/index',
				'ribbon' 		=> '<li class="active">All Chart</li>',
				'page_name' 	=> 'All Chart DKI Jakarta',
				'css_file' 		=> 'page/dki_allchart/css_dki_allchart',
				'js_file' 		=> 'page/dki_allchart/js_dki_allchart',
			);
			$this->render_view($data);
		}else{
			redirect('../auth/login', 'refresh');
		}
    }
}
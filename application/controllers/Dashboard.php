<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
				'content' 		=> 'page/dashboard/index',
				'ribbon' 		=> '<li class="active">Dashboard</li>',
				'page_name' 	=> 'Dashboard',
			);
			$this->render_view($data);
		}else{
			redirect('../auth/login', 'refresh');
		}
	}

}

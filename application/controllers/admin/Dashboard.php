<?php

class dashboard extends ci_controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('hakakses') == ''){
            redirect('login');
        }
		//$this->load->helper('suka_helper');
  		//backButtonHandle();
	}

	function index(){
		$data['title'] = 'Dashboard';
		$data['file']='admin/dashboard/index';
		$this->load->view('admin/main',$data);
	}
}
?>
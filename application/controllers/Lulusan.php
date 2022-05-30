<?php
class lulusan extends ci_controller{
	function __construct(){
		parent::__construct();
        //$this->load->helper('suka_helper');
  		//backButtonHandle();
        date_default_timezone_set('Asia/Jakarta');
	}
	
	function index(){

		$data['title'] = 'Data Alumni';
		$data['lulusan'] = $this->db->query("select * from alumni_biodata  order by nama asc")->result();
		$data['file']='lulusan';
		$this->load->view('main',$data);
	}
	
	
}
?>
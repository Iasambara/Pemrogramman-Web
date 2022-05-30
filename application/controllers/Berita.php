<?php
class berita extends ci_controller{
	function __construct(){
		parent::__construct();
        //$this->load->helper('suka_helper');
  		//backButtonHandle();
        date_default_timezone_set('Asia/Jakarta');
	}
	
	function index(){

		$data['title'] = 'Info BKK';
		$data['berita'] = $this->db->query("select * from tbl_kat order by id_kat desc")->result();
		$data['jmlindustri']=$this->db->get("t_industri")->num_rows();
//		$data['jmlaffiliate']=$this->db->get("t_affiliate")->num_rows();
		$data['jmlloker']=$this->db->get("t_loker")->num_rows();
		$data['jmllulusan']=$this->db->get("t_siswa")->num_rows();
		$data['file']='berita';
		$this->load->view('main',$data);
	}
	
	
}
?>
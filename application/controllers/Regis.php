<?php
class regis extends ci_controller{
	function __construct(){
		parent::__construct();
        $this->load->model('usernamecheck_model', 'um');
        //$this->load->helper('suka_helper');
  		//backButtonHandle();
        date_default_timezone_set('Asia/Jakarta');
	}
	function index(){
						
		$data['title'] = 'Registrasi Peserta';
		$data['data_jurusan']=$this->db->get("t_jurusan")->result();	
		$data['jmlindustri']=$this->db->get("t_industri")->num_rows();
		$data['jmlaffiliate']=$this->db->get("t_affiliate")->num_rows();
		$data['jmlloker']=$this->db->get("t_loker")->num_rows();
		$data['jmllulusan']=$this->db->get("t_siswa")->num_rows();	
		$data['file']='username';
		$this->load->view('main',$data);
	}

    function formulir_save()
    {
        $cek = $this->db->query("SELECT * FROM t_siswa where nik='".$this->input->post('username')."'")->num_rows();
	    if ($cek<=0) {
            $in['username'] = $this->input->post("username");
            $in['password'] = md5($this->input->post('username'));
            $in['hakakses'] = 'alumni';        
            $this->db->insert("t_user", $in);
            
            $this->db->where('username',null);
            $this->db->delete('t_user');

            $data=array(
                'nik' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'nohp' => $this->input->post('nohp'),
                'email' => $this->input->post('email'),
            );
            $this->db->insert('t_siswa',$data);
            
            $this->session->set_flashdata('message', 
				'<div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Data Berhasil di Tambah...!!!
                </div>');
            redirect("login");
        } else {
			$this->session->set_flashdata('message', 
				'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Mohon Maaf NIK sudah Terdaftar...!!!
                </div>');
			redirect('regis','refresh');
	    }
    
        /*$in['nisn'] = $this->input->post("nik");
        $in['nama'] = $this->input->post("nama");
                        
        $this->db->insert("tes", $in);
        $this->session->set_flashdata("success", "Berhasil melakukan pendaftaran");
        */
/*
        $in['username'] = $this->input->post("nik");
        $in['password'] = md5($this->input->post('nik'));
        $in['hakakses'] = 'alumni';
                        
        $this->db->insert("t_user", $in);

        $data=array(
            'nik' => $this->input->post('nik'),
            'nisn' => $this->input->post('nisn'),
            'nama' => $this->input->post('nama'),
            'asal_sekolah' => $this->input->post('sekolah_asal'),
            'id_jurusan' => $this->input->post('id_jurusan'),
            'tahun_keluar' => $this->input->post('tahun_keluar'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'agama' => $this->input->post('agama'),
            'jk' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat'),
            'nohp' => $this->input->post('nohp'),
            'nohp_alt' => $this->input->post('nohp_alt'),
            'email' => $this->input->post('email'),
        );
    
        $hasil=$this->db->insert('t_siswa',$data);
        $this->session->set_flashdata('alert', $hasil);
        redirect("login");
    */
    }

    function get_username_availability() {
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
			$results = $this->um->get_username($username);
			if ($results === TRUE) {
				echo '<span style="color:red;">Username unavailable</span>';
			} else {
				echo '<span style="color:green;">Username available</span>';
			}
		} else {
			echo '<span style="color:red;">Username is required field.</span>';
		}
	}
	
}
?>
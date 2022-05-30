<?php
class alumni extends ci_controller{
	function __construct(){
		parent::__construct();
        $this->load->model('usernamecheck_model', 'um'); 
		//$this->load->helper('suka_helper');
  		//backButtonHandle();  
        date_default_timezone_set('Asia/Jakarta');
	}
	/*function index(){
		$data['title'] = 'Data Alumni';
		$data['siswa'] = $this->db->query("select * from t_siswa order by nisn")->result();
		$data['file']='admin/siswa/index';
		$this->load->view('admin/main',$data);
	}*/
	
	function index(){
		if($this->input->post('username')){
			//hapus foto jika ada
			//delete_files('./assets/images/alumni/'.,TRUE);
			//upload gambar
			$config['upload_path'] = './assets/images/alumni/';
				$config['allowed_types'] = '*';
				$config['file_name']=$this->input->post('username');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('foto')){
					$message='Tidak Berhasil : '.$this->upload->display_errors();
					$this->session->set_flashdata('alert', $message);
					redirect('alumni');
				}
				else{
					$file=$this->upload->data('foto');
					$foto = $file['file_name'];
					ini_set('memory_limit', '-1');
					ini_set('max_execution_time', 1000);
					ini_set('post_max_size', '128M');
					ini_set('upload_max_filesize', '128M');
					
				$data=array(
					'nik' => $this->input->post('username'),
					'nisn' => $this->input->post('nisn'),
					'nama' => $this->input->post('nama'),
					'jk' => $this->input->post('jk'),
					'tahun_keluar' => $this->input->post('tahun_keluar'),
					'status' => $this->input->post('status'),
					'id_jurusan' => $this->input->post('id_jurusan'),
					'alamat' => $this->input->post('alamat'),
					'nohp' => $this->input->post('nohp'),
					'perusahaan' => $this->input->post('perusahaan'),
					'pendidikan' => $this->input->post('pendidikan'),
					'perguruan_tinggi' => $this->input->post('perguruan_tinggi'),
					'fakultas' => $this->input->post('fakultas'),
					'foto' => $foto,
					);
			
			$hasil=$this->db->insert('t_siswa',$data);
			$this->session->set_flashdata('alert', $hasil);

			$in['username'] = $this->input->post("username");
            $in['password'] = md5($this->input->post('username'));
            $in['hakakses'] = 'alumni';        
            $this->db->insert("t_user", $in);
            $this->db->where('username',null);
            $this->db->delete('t_user');

			redirect('login');
		}
		}
		else{
			$data['title'] = 'Telusur Data Alumni';
			//$data['data_jurusan']=$this->db->get("t_jurusan")->result();	
            $data['jmlindustri']=$this->db->get("t_industri")->num_rows();
            $data['jmlaffiliate']=$this->db->get("t_affiliate")->num_rows();
            $data['jmlloker']=$this->db->get("t_loker")->num_rows();
            $data['jmllulusan']=$this->db->get("t_siswa")->num_rows();
            $data['data_jurusan']=$this->db->get("t_jurusan")->result();
			$data['file']='alumni';
		    $this->load->view('main',$data);
		}
	}
		
}
?>
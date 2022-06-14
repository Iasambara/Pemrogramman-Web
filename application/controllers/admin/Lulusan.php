<?php
class lulusan extends ci_controller{
	function __construct(){
		parent::__construct();
		$this->load->model(array('admin/m_user'));
		if($this->session->userdata('hakakses') == ''){
            redirect('login');
        }
		//$this->load->helper('suka_helper');
  		//backButtonHandle();
        date_default_timezone_set('Asia/Jakarta');
	}
	
	public function index($aksi='', $id='')
	{
//		$data['user']  		= $this->db->get_where('tbl_user', "username='$ceks'");
		$data['user'] = $this->m_user->getUser();

//		$this->db->order_by('id_kat', 'DESC');
		$data['lulusan']  = $this->db->query("select * from alumni_biodata ORDER BY nama ASC")->result();

		$data['title'] 	= "Data Alumni";
		$data['file']='admin/lulusan/index';
		$this->load->view('admin/main',$data);
	}
	
	function add_lulusan(){
		if($this->input->post('nama')){ // sudah terkirim / tbl simpan sdh diklik
		    $nama = $this->input->post('nama');
		    $tmplahir = $this->input->post('tempat_lahir');
		    $tgllahir = $this->input->post('tgl_lahir');
		    $jkel = $this->input->post('jkel');
		    $email = $this->input->post('email');
		    $alamat = $this->input->post('alamat');
		    $fakultas = $this->input->post('fakultas');
		    $akhiran_nama = date("dHi");
		    $namafilefoto = substr($this->input->post('nama'),0,3); // gunakan 3 huruf pertama nama sbagai nama file foto
			$config['upload_path'] = './assets/images/alumni/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048000';
			$config['file_name'] = $namafilefoto."_".$akhiran_nama;
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('fotoalumni')){
				$message='Tidak Berhasil : '.$this->upload->display_errors();
				$this->session->set_flashdata('alert', $message);
    			$data=array(
					'nama' => $nama,
					'tempat_lahir' => $tmplahir,
					'tgl_lahir' => $tgllahir,
					'jenis_kelamin' => $jkel,
					'email' => $email,
					'alamat' => $alamat,
					'id_fakultas' => $fakultas,
				);
//			echo "Tesgagal";
			}
			else {

			    $foto = $this->upload->data('file_name'); 
    			$data=array(
					'nama' => $nama,
					'tempat_lahir' => $tmplahir,
					'tgl_lahir' => $tgllahir,
					'jenis_kelamin' => $jkel,
					'email' => $email,
					'alamat' => $alamat,
					'id_fakultas' => $fakultas,
					'photo' => $foto,
				);
		
//			echo "Teslolos";
			}
			$hasil=$this->db->insert('alumni_biodata',$data);
			$this->session->set_flashdata('alert', "Data berhasil ditambahkan.");
			redirect('admin/lulusan');

		}  
		else{ // menampilkan form tambah data
			$data['title'] = 'Tambah Data Alumni';
			$data['file']='admin/lulusan/lulusan_form';
			$data['fakultas']=$this->db->query("select * from alumni_fakultas order by nama_fakultasy")->result();
			$this->load->view('admin/main',$data);
		}
	}
	

	function edit_berita($id){
		if($this->input->post('judul_kat') != NULL){
			
			//upload gambar
		    $waktu = date("Y-m-d H:i:s");
		    $posisi = strpos($this->input->post('judul_kat')," ");
		    if (!$posisi)  
		        $namafilefoto = $this->input->post('judul_kat');
		    else 
		        $namafilefoto = substr($this->input->post('judul_kat'),0,$posisi);
		    $akhiran_nama = date("dHis");
			$config['upload_path'] = './assets/images/info/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048000';
			$config['file_name'] = $namafilefoto."_".$akhiran_nama;
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('foto_kat')){
				$message='Tidak Berhasil : '.$this->upload->display_errors();
				$this->session->set_flashdata('alert', $message);
				$data=array(
					'nama_kat' => "berita",
					'judul_kat' => $this->input->post('judul_kat'),
					'ket_kat' => $this->input->post('isi_kat'),
//					'tgl_kat' => $waktu,
				);
			}
			else{
				$file=$this->upload->data('foto_kat');
				$foto = $file['file_name'];
			    $data=array(
					'nama_kat' => "berita",
					'judul_kat' => $this->input->post('judul_kat'),
					'ket_kat' => $this->input->post('isi_kat'),
//					'tgl_kat' => $waktu,
					'foto_kat' => $foto,
				);	
		    }
			//$hasil=$this->M_barang->ubah($data,$id);
			$this->db->where(array('id_kat'=>$this->input->post('id')));
			$hasil=$this->db->update('tbl_kat',$data);
			$this->session->set_flashdata('alert', "Data berhasil diperbaharui.");
			redirect('admin/berita');
		}
		else{
			if($id != null){
				$data['title'] = 'Edit Data Info';
				$cek = $this->db->get_where('tbl_kat',array('id_kat'=>$id));
				if($cek->num_rows() > 0 ){
					$data['v_kat'] = $cek->row();
					$data['file']='admin/berita/berita_form';
					$this->load->view('admin/main',$data);	
				}
				else{
					redirect('admin/berita');
				}
			}
			else redirect('admin/berita');
		}
	}

	function hapus_berita($id){
		if($id != null){
			$this->db->where(array('id_kat'=>$id));
			$hasil=$this->db->delete('tbl_kat');
		}
		$this->session->set_flashdata('alert',"Data berhasil dihapus!");
		redirect('admin/berita');
	}
	
}
?>
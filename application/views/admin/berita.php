<?php
class berita extends ci_controller{
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

		$this->db->order_by('id_kat', 'DESC');
		$data['v_kat']  = $this->db->query("select * from tbl_kat where nama_kat='berita' ORDER BY id_kat DESC")->result();

		$data['title'] 	= "Data Info BKK";
		$data['file']='admin/berita/index';
		$this->load->view('admin/main',$data);
	}
	
	function add_berita(){
		if($this->input->post('judul_kat')){
		    $waktu = date("Y-m-d H:i:s");
		    $posisi = strpos($this->input->post('judul_kat')," ");
		    if (!$posisi)  
		        $namafilefoto = $this->input->post('judul_kat');
		    else 
		        $namafilefoto = substr($this->input->post('judul_kat'),0,$posisi);
		    $akhiran_nama = date("dHis");
			$config['upload_path']          = './assets/images/info/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = '2048';
			$config['file_name'] = $namafilefoto."_".$akhiran_nama;
			$this->load->library('upload', $config);

			if(!$this->upload->do_upload('foto_kat')){
				$message='Tidak Berhasil : '.$this->upload->display_errors();
				$this->session->set_flashdata('alert', $message);
    			$data=array(
					'nama_kat' => "berita",
					'judul_kat' => $this->input->post('judul_kat'),
					'ket_kat' => $this->input->post('isi_kat'),
					'tgl_kat' => $waktu,
				);
				redirect('admin/berita');
			}
			else {
			    $foto = $this->upload->data('file_name'); 
    			$data=array(
					'nama_kat' => "berita",
					'judul_kat' => $this->input->post('judul_kat'),
					'ket_kat' => $this->input->post('isi_kat'),
					'tgl_kat' => $waktu,
					'foto_kat' => $foto,
				);
			}
			$hasil=$this->db->insert('tbl_kat',$data);
			$this->session->set_flashdata('alert', "Data berhasil ditambahkan.");
			redirect('admin/berita');

		}  
		else{
			$data['title'] = 'Tambah Data Info BKK';
			$data['file']='admin/berita/berita_form';
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
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = '2048000';
			$config['file_name'] = $namafilefoto."_".$akhiran_nama;
			$this->load->library('upload', $config);

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
			    $foto = $this->upload->data('file_name'); 
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
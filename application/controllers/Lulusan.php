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
		$data['lulusan'] = $this->db->query("SELECT a.*,f.nama_fakultasy FROM alumni_biodata  a,alumni_fakultas f WHERE a.id_fakultas=f.kode_fakultasy order by nama asc limit 50")->result();
		$data['file']='lulusan';
		$this->load->view('main',$data);
	}
	
	function add_lulusan(){
		if($this->input->post('nama')){
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
			$this->upload->initialize($config);
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
			}
			else {
				$file=$this->upload->data('fotoalumni');
				$foto = $file['file_name'];
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
			}
			$hasil=$this->db->insert('alumni_biodata',$data);
			$this->session->set_flashdata('alert', "Data berhasil ditambahkan.");
			redirect('admin/lulusan');
		}  
		else{
			$data['title'] = 'Tambah Data Alumni';
			$data['file']='admin/lulusan/lulusan_form';
			$data['fakultas']=$this->db->query("select * from alumni_fakultas order by nama_fakultasy")->result();
			$this->load->view('admin/main',$data);
		}
	}
	
}
?>
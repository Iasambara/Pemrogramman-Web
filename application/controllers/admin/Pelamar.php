<?php
class pelamar extends ci_controller{
	function __construct(){
		parent::__construct();
        
        if($this->session->userdata('hakakses') == ''){
            redirect('login');
        }
		//$this->load->helper('suka_helper');
  		//backButtonHandle();
        $this->load->model('posisi_model');
        date_default_timezone_set('Asia/Jakarta');
	}

	function index(){
		$data['title'] = 'Management Pelamar';
		$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where l.status='1'")->result();
		$data['file']='admin/pelamar/index';
		$this->load->view('admin/main',$data);
	}
	
	
	function kelola_pelamar($id){
		if($id != null){
			$data['title'] = 'Management Pelamar';
			$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where l.id_loker=".$id)->row();
			$data['pelamar']=$this->db->query("select p.*,s.*,p.status as status_pelamar from t_pelamar p inner join t_siswa s on p.nik=s.nik where p.id_loker='".$id."'")->result();
			$data['file']='admin/pelamar/pelamar_kelola';
			$hasil=true;
			$this->session->set_flashdata('alert', $hasil);
			$this->load->view('admin/main',$data);
		}else{
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/pelamar');
		}
	}

	function kelola_pelamar2(){
		$id=$this->input->post('id_loker');
		$id_posisi=$this->input->post('id_posisi');
		if($id != null){
			$data['title'] = 'Management Pelamar';
			//$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where l.id_loker=".$id)->row();
			$data['loker'] = $this->db->query("SELECT l.tgl_buka,l.tgl_tutup,l.id_loker,l.judul,ld.posisi,i.nama,ld.id_posisi FROM t_loker AS l INNER JOIN t_lokerdetail AS ld ON l.id_loker = ld.id_loker INNER JOIN t_industri AS i ON l.id_industri = i.id_industri WHERE l.id_loker = ".$id." AND ld.id_posisi = ".$id_posisi)->row();

			//$data['pelamar']=$this->db->query("select p.*,s.*,p.status as status_pelamar from t_pelamar p inner join t_siswa s on p.nik=s.nik where p.id_loker='".$id."'")->result();
			$data['pelamar']=$this->db->query("select p.*,s.*,p.status as status_pelamar from t_pelamar p inner join t_siswa s on p.nik=s.nik where p.id_loker='".$id."' AND p.id_posisi='".$id_posisi."'")->result();

			$data['file']='admin/pelamar/pelamar_kelola';
			$hasil=true;
			$this->session->set_flashdata('alert', $hasil);
			$this->load->view('admin/main',$data);
		}else{
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/pelamar');
		}
	}
	
	
	function delete_pelamar(){
		if($this->input->post('id_pelamar')){
			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->delete('t_pelamar');
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
		}
		
		redirect('admin/pelamar');
	}
	function add_pelamar($id_loker=null){
		if($this->input->post('nik')){
			$data=array(
					'id_loker' => $this->input->post('id_loker'),
					'id_posisi' => $this->input->post('id_posisi'),
					'nik' => $this->input->post('nik'),
					'tanggal_daftar' => date("Y-m-d"),
					'status' => '1',
				);
			$hasil=$this->db->insert('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
			redirect('admin/pelamar');
		}
		else{
			$data['title'] = 'Tambah Data pelamar';
			$data['siswa']=$this->db->get("t_siswa")->result();
			$data['id_loker']= $id_loker;
			$data['file']='admin/pelamar/pelamar_cari';
			$this->load->view('admin/main',$data);
		}
	}
	
	function edit_dokumen(){
		if($this->input->post('proses')){
			
			//upload gambar
			$config['upload_path'] = './assets/files/alumni/';
				$config['allowed_types'] = '*';
				$config['file_name']=$this->input->post('id_pelamar');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('dokumen')){
					$message='Tidak Berhasil : '.$this->upload->display_errors();
					$this->session->set_flashdata('alert', $message);
					$this->kelola_pelamar($this->input->post('id_loker'));
				}
				else{
					$file=$this->upload->data('dokumen');
					$dokumen = $file['file_name'];
					ini_set('memory_limit', '-1');
					ini_set('max_execution_time', 1000);
					ini_set('post_max_size', '128M');
					ini_set('upload_max_filesize', '128M');
					
				$data=array(
					'dokumen' => $dokumen,
					);
			

			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->update('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
		}
		}
		else{
				$data['title'] = 'Edit Data Pelamar';
				$cek = $this->db->get_where('t_siswa',array('nisn'=>$this->input->post('nisn')));
				$data['data_jurusan']=$this->db->get("t_jurusan")->result();
				if($cek->num_rows() > 0 ){
					$data['siswa'] = $cek->row();
					$data['id_loker']=$this->input->post('id_loker');
					$data['id_pelamar']=$this->input->post('id_pelamar');
					$data['file']='admin/pelamar/edit_dokumen';					
				}
			$this->load->view('admin/main',$data);	
		}
	}
	
	function edit_status(){
		if($this->input->post('proses')){
				$data=array(
					'status' => $this->input->post('status'),
				);
			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->update('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
		}
		else{
				$data['title'] = 'Ubah Status Lamaran';
				$cek = $this->db->get_where('t_siswa',array('nik'=>$this->input->post('nik')));
				$data['data_jurusan']=$this->db->get("t_jurusan")->result();
				$id_pelamar=$this->input->post('id_pelamar');
				$id_posisi=$this->input->post('id_posisi');
				if($cek->num_rows() > 0 ){
					$data['siswa'] = $cek->row();
					$data['id_loker']=$this->input->post('id_loker');
					$data['id_pelamar']=$this->input->post('id_pelamar');
					$data['status']=$this->db->query("select status from t_pelamar where id_pelamar='$id_pelamar'")->row()->status;
					$data['tgl_diterima']=$this->db->query("select tgl_diterima from t_pelamar where id_pelamar='$id_pelamar'")->row()->tgl_diterima;
					$data['file']='admin/pelamar/edit_status';					
				}
			$this->load->view('admin/main',$data);	
		}
	}

	function edit_status_lolos(){
		if($this->input->post('proses')){
				$data=array(
					'status' => $this->input->post('status'),
					'id_jadwal' => $this->input->post('id_jadwal'),
				);
			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->update('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
		}
		else{
				$data['title'] = 'Ubah Status Lamaran';
				$cek = $this->db->get_where('t_siswa',array('nik'=>$this->input->post('nik')));
				$data['data_jurusan']=$this->db->get("t_jurusan")->result();
				$id_pelamar=$this->input->post('id_pelamar');
				$id_loker=$this->input->post('id_loker');
				$id_posisi=$this->input->post('id_posisi');
				$data['data_jadwal']=$this->db->query("select * from t_jadwal where id_loker='$id_loker'")->result();
				if($cek->num_rows() > 0 ){
					$data['siswa'] = $cek->row();
					$data['id_loker']=$this->input->post('id_loker');
					$data['id_pelamar']=$this->input->post('id_pelamar');
					$data['status']=$this->db->query("select status from t_pelamar where id_pelamar='$id_pelamar'")->row()->status;
					$data['tgl_diterima']=$this->db->query("select tgl_diterima from t_pelamar where id_pelamar='$id_pelamar'")->row()->tgl_diterima;
					$data['file']='admin/pelamar/edit_status_lolos';					
				}
			$this->load->view('admin/main',$data);	
		}
	}

	function edit_status_diterima(){
		if($this->input->post('proses')){
				$data=array(
					'status' => $this->input->post('status'),
					'tgl_diterima' => $this->input->post('tgl_diterima'),
				);
			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->update('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
		}
		else{
				$data['title'] = 'Edit Lamaran Diterima';
				$cek = $this->db->get_where('t_siswa',array('nik'=>$this->input->post('nik')));
				$data['data_jurusan']=$this->db->get("t_jurusan")->result();
				$id_pelamar=$this->input->post('id_pelamar');
				if($cek->num_rows() > 0 ){
					$data['siswa'] = $cek->row();
					$data['id_loker']=$this->input->post('id_loker');
					$data['id_pelamar']=$this->input->post('id_pelamar');
					$data['status']=$this->db->query("select status from t_pelamar where id_pelamar='$id_pelamar'")->row()->status;
					$data['tgl_diterima']=$this->db->query("select tgl_diterima from t_pelamar where id_pelamar='$id_pelamar'")->row()->tgl_diterima;
					$data['file']='admin/pelamar/edit_status_diterima';					
				}
			$this->load->view('admin/main',$data);	
		}
	}
	
	function cari_loker(){
	if($this->input->post('cari')){	
		$cari=$this->input->post('cari');
		$data['title'] = 'Management Pelamar';
		$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where i.nama like '%".$cari."%' or l.judul like '%".$cari."%' order by l.id_loker desc")->result();
		$data['file']='admin/pelamar/index';
		$this->load->view('admin/main',$data);
	}else{
		redirect('admin/pelamar/index');
	}
	}
	
	function loker_pribadi($nik=null){
		$data['title'] = 'Loker yang diikuti';
		//$data['loker'] = $this->db->query("select l.*,i.nama,l.status as status_loker, p.status as status_lamaran,p.id_pelamar,p.dokumen from t_loker l inner join t_industri i on l.id_industri=i.id_industri inner join t_pelamar p on p.id_loker=l.id_loker where p.nik=".$nik." order by id_loker desc")->result();
		$data['loker'] = $this->db->query("SELECT p.tanggal_daftar,p.id_pelamar,p.nik,l.judul,ld.posisi,i.nama,l.gaji,l.tgl_buka,l.tgl_tutup,l.`status` AS status_loker,p.`status` AS status_lamaran,p.dokumen FROM t_pelamar AS p INNER JOIN t_loker AS l ON p.id_loker = l.id_loker INNER JOIN t_lokerdetail AS ld ON p.id_posisi = ld.id_posisi INNER JOIN t_industri AS i ON l.id_industri = i.id_industri WHERE p.nik = ".$nik." order by l.id_loker DESC")->result();
		$data['file']='admin/loker/loker_pribadi';
		$this->load->view('admin/main',$data);
	}
	
	function loker_pribadi_cari(){
		$cari='';
		if($this->input->post('cari')){	
			$cari=$this->input->post('cari');
		}
		$data['title'] = 'Cari Loker';
		$data['loker'] = $this->db->query("select l.*,i.nama from t_loker l inner join t_industri i on l.id_industri=i.id_industri where i.nama like '%".$cari."%' or l.judul like '%".$cari."%' order by l.id_loker desc")->result();
		$data['file']='admin/loker/loker_cari';
		$this->load->view('admin/main',$data);

	}
	
	function loker_pribadi_add($id_loker=null){
			$data=array(
					'id_loker' => $id_loker,
					'nik' => $this->session->userdata('username'),
					'tanggal_daftar' => date("Y-m-d"),
					'status' => '1',
				);
			$hasil=$this->db->insert('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/pelamar/loker_pribadi/'.$this->session->userdata('username'));
	}

	function loker_pribadi_add2(){
		$id_loker = $this->input->post('id_loker');
		$id_posisi = $this->input->post('id_posisi');
		$nik = $this->session->userdata('username');

		$cek = $this->db->query("SELECT * FROM t_pelamar where nik='".$nik."' AND id_loker='".$id_loker."' AND id_posisi='".$id_posisi."'")->num_rows();
	    if ($cek<=0){
			$data=array(
				'id_loker' => $id_loker,
				'id_posisi' => $id_posisi,
				'nik' => $nik,
				'tanggal_daftar' => date("Y-m-d"),
				'status' => '1',
			);
			$hasil=$this->db->insert('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			redirect('admin/pelamar/loker_pribadi/'.$this->session->userdata('username'));
		} else {
			$this->session->set_flashdata('alert', 
				'<div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    Anda Sudah Melamar Posisi Ini...!!!
                </div>');
			redirect('admin/pelamar/loker_pribadi/'.$this->session->userdata('username'));
	    }
		
	}

	function getPosisi($id_loker){
		$text="";
		if(!empty($t)){
			$cek=$this->db->query("select id_bidang from t_bidang where nama_bidang like '%".$t."%'");
			if($cek->num_rows()>0){
				$text=$cek->row()->id_bidang;
			}
		}
		return $text;
	}
	
	function loker_pribadi_delete($id_pelamar=null){
		$this->db->where(array('id_pelamar'=>$id_pelamar));
		$hasil=$this->db->delete('t_pelamar');
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/pelamar/loker_pribadi/'.$this->session->userdata('username'));
	}
	
	function loker_pribadi_upload_dokumenOLD(){
		if($this->input->post('dokumen')){
			
			//upload gambar
			$config['upload_path'] = './assets/files/alumni/';
				$config['allowed_types'] = '*';
				$config['file_name']=$this->session->userdata('username');
				$this->upload->initialize($config);
				if(!$this->upload->do_upload('userfile')){
					$message='Tidak Berhasil : '.$this->upload->display_errors();
					$this->session->set_flashdata('alert', $message);
					$this->kelola_pelamar($this->input->post('id_loker'));
				}
				else{
					$file=$this->upload->data('userfile');
					$dokumen = $file['file_name'];
					ini_set('memory_limit', '-1');
					ini_set('max_execution_time', 1000);
					ini_set('post_max_size', '128M');
					ini_set('upload_max_filesize', '128M');
					
				$data=array(
					'dokumen' => $dokumen,
					);
			

			$this->db->where(array('id_pelamar'=>$this->input->post('id_pelamar')));
			$hasil=$this->db->update('t_pelamar',$data);
			$this->session->set_flashdata('alert', $hasil);
			$this->kelola_pelamar($this->input->post('id_loker'));
			}
				
		}
				$data['title'] = 'Upload Berkas';
				$data['file']='admin/loker/loker_upload';					
				$this->load->view('admin/main',$data);	
	}

	function loker_pribadi_upload_dokumen($idL=null){
		// Check form submit or not 
        if($this->input->post('submit') != NULL ){ 
            $kode=$this->input->post('id_lamaran');
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'uploads/'; 
                $config['allowed_types'] = 'zip|rar'; 
                $config['max_size'] = '5120'; // max_size in kb (5 MB)
                //$config['file_name'] = $_FILES['file']['name'];
				$config['file_name']=$kode.'_'.$this->session->userdata('username');
				//$config['file_name']=$kode;

                // Load upload library 
                $this->load->library('upload',$config); 
 
                // File upload
                if($this->upload->do_upload('file')){ 
                    // Get data about the file
                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name'];

                    ## Extract the zip file ---- start
                    /*$zip = new ZipArchive;
                    $res = $zip->open("uploads/".$filename);
                    if ($res === TRUE) {

                        // Unzip path
                        $extractpath = "files/";

                        // Extract file
                        $zip->extractTo($extractpath);
                        $zip->close();

                        $this->session->set_flashdata('msg','Upload & Extract successfully.');
                    } else {
                        $this->session->set_flashdata('msg','Failed to extract.');
                    }
                    ## ---- end
					*/
					$data=array(
						'dokumen' => $filename,
					);
					
					$this->db->where(array('id_pelamar'=>$kode));
					$hasil=$this->db->update('t_pelamar',$data);
					$this->session->set_flashdata('alert', $hasil);
					//$this->kelola_pelamar($this->input->post('id_loker'));
                } else { 
                    $this->session->set_flashdata('msg','Failed to upload');
                } 
            } else { 
                $this->session->set_flashdata('msg','Failed to upload');
            } 
			redirect('admin/pelamar/loker_pribadi/'.$this->session->userdata('username'));
        }
		$data['title'] = 'Upload Berkas';
		$data['idl']=$idL;	
		$data['file']='admin/loker/loker_upload';					
		$this->load->view('admin/main',$data);	
	}

	function jadwal_pribadi($nik=null){
		$data['title'] = 'Jadwal Tes / Lolos Tes';
		//$data['jadwal'] = $this->db->query("select l.*,i.nama,l.status as status_loker, p.status as status_lamaran,p.id_pelamar from t_loker l inner join t_industri i on l.id_industri=i.id_industri inner join t_pelamar p on p.id_loker=l.id_loker where p.nik=".$nik." order by id_loker")->result();
		$data['jadwal'] = $this->db->query("SELECT
		p.id_pelamar,p.id_jadwal,
		p.id_loker,
		l.judul AS judul_loker,
		j.tgl_mulai,
		j.waktu,
		j.lokasi_alamat,
		ld.posisi,
		i.nama,
		j.judul AS judul_jadwal,
		p.konfirmasi_hadir 
	FROM
		t_pelamar AS p
		INNER JOIN t_loker AS l ON p.id_loker = l.id_loker
		INNER JOIN t_jadwal AS j ON p.id_jadwal = j.id_jadwal
		INNER JOIN t_lokerdetail AS ld ON j.id_posisi = ld.id_posisi
		INNER JOIN t_industri AS i ON l.id_industri = i.id_industri 
	WHERE
		p.`status` = 4 
		AND p.nik = ".$nik)->result();
		$data['file']='admin/jadwal/jadwal_pribadi';
		$this->load->view('admin/main',$data);
	}

	function konfirmasi_hadir($id=null){
		$data=array(
			'konfirmasi_hadir' => '2',
		);
		$this->db->where(array('id_pelamar'=>$id));
		$hasil=$this->db->update('t_pelamar',$data);
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/pelamar/jadwal_pribadi/'.$this->session->userdata('username'));
	}

	function konfirmasi_takhadir($id=null){
		$data=array(
			'konfirmasi_hadir' => '1',
		);
		$this->db->where(array('id_pelamar'=>$id));
		$hasil=$this->db->update('t_pelamar',$data);
		$this->session->set_flashdata('alert', $hasil);
		redirect('admin/pelamar/jadwal_pribadi/'.$this->session->userdata('username'));
	}
}
?>
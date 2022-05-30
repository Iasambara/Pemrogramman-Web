<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unzip extends CI_Controller {

    public function __construct(){
 
        parent::__construct();
        $this->load->helper('url');

        // Load session library 
        $this->load->library('session');

    }

    public function index(){
        // Load view
        $this->load->view('index_view');
    }   

    // Upload and Extract zip file
    public function extract(){
   
        // Check form submit or not 
        if($this->input->post('submit') != NULL ){ 
            
            if(!empty($_FILES['file']['name'])){ 
                // Set preference 
                $config['upload_path'] = 'uploads/'; 
                $config['allowed_types'] = 'zip'; 
                $config['max_size'] = '5120'; // max_size in kb (5 MB)
                $config['file_name'] = $_FILES['file']['name'];

                // Load upload library 
                $this->load->library('upload',$config); 
 
                // File upload
                if($this->upload->do_upload('file')){ 
                    // Get data about the file
                    $uploadData = $this->upload->data(); 
                    $filename = $uploadData['file_name'];

                    ## Extract the zip file ---- start
                    $zip = new ZipArchive;
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

                }else{ 
                    $this->session->set_flashdata('msg','Failed to upload');
                } 
            }else{ 
                $this->session->set_flashdata('msg','Failed to upload');
            } 
           
        }
        redirect('/');
    }

}
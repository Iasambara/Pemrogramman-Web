<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chart extends CI_Controller
{
    public function siswaPertahun()
    {
        $data["title"]      = "Grafik Siswa Lulus Per Tahun";
        $this->load->model("Model_chart", "Mchart"); // load Model_chart
        $data["chartSiswa"] = $this->Mchart->siswaPertahun(); // call method siswaPertahun di Model_chart
        $this->load->view('view_chart', $data); // passing data ke view_chart
    }
}


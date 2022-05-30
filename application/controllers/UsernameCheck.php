<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsernameCheck extends CI_Controller {

	function __construct() {
		parent::__construct();
		//$this->load->helper('suka_helper');
  		//backButtonHandle();
		$this->load->model('usernamecheck_model', 'um');
	}

	public function index() {
		$this->load->view('username');
	}

	function get_username_availability() {
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
			$results = $this->um->get_username($username);
			if ($results === TRUE) {
				echo '<span style="color:red;">NIK Sudah terdaftar</span>';
			} else {
				echo '<span style="color:green;">NIK belum terdaftar</span>';
			}
		} else {
			echo '<span style="color:red;">NIK Wajib diisi</span>';
		}
	}
}

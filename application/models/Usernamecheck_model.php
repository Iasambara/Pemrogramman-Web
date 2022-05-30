<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');

/**
* Description of UsernameCheck_Model
*
* @author https://www.roytuts.com
*/

class UsernameCheck_Model extends CI_Model {

	private $user = 't_siswa';

	function get_username($username) {
		$this->db->where('nik', $username);
		$this->db->limit(1);
		$query = $this->db->get($this->user);

		if ($query->num_rows() == 1) {
			return TRUE;
		}
		
		return FALSE;
	}

}

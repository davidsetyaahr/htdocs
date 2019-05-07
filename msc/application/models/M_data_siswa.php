<?php 
 
class M_data_siswa extends CI_Model{

	function tampil_data() {
		return $this->db->get('siswa');
	}
}

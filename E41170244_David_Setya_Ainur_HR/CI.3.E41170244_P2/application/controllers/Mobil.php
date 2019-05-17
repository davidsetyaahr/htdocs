<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mobil extends CI_Controller {
 
	public function warna(){
		$this->load->view("frontend/navbar");
		$this->load->view("frontend/uri");
		$this->load->view("frontend/footer");

	}
}
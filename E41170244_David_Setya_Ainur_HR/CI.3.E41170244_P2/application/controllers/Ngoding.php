<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Ngoding extends CI_Controller {
	
	function index(){
		$this->load->library('malasngoding');
		$this->load->view("frontend/navbar");
		$this->load->view("frontend/testlib");
		$this->load->view("frontend/footer");
	}
 
}
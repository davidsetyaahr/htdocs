<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Download extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->helper(array('url','download'));				
	}
 
	public function index(){		
		$this->load->view('frontend/navbar');
		$this->load->view('frontend/v_download');
		$this->load->view('frontend/footer');
	}
 
	public function lakukan_download(){				
		force_download('assets/img/polije.png',NULL);
	}	
 
}
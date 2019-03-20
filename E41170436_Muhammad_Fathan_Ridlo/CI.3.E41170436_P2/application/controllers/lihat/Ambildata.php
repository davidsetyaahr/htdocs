<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
 
 	class Ambildata extends CI_Controller
 	{
 		
 		function __construct()
 		{
 			parent::__construct();
 			$this->load->model('lihat_data');
 		}
 		function user(){
 			$data['user'] = $this->lihat_data->ambilData()->result();
 			$this->load->view('lihat', $data);
 		}
 	}
?>
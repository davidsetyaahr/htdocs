<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
	public function index()
	{
		$this->load->view('overview');
	}
	public function listBarang()
	{
		$this->load->view('admin/daftarbarang');
	}
}
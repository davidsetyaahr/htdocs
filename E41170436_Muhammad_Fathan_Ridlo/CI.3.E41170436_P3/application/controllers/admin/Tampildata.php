<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tampilData extends CI_Controller 
{    
    function __construct()
	{
        parent::__construct();
		$this->load->model('barang_model');
    }
    public function tampil(){
        $data['list'] = $this->barang_model->getAll()->result();
        $this->load->view('admin/daftarbarang', $data);
    }
}
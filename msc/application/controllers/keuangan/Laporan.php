<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
        $menu = array(
            "title" => $this->title,
		);

		$card['title'] = "Laporan <span>> List Laporan</span>";
       	// $data["data"] = $this->common->getData("*", "", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('keuangan/laporan_keuangan/list-laporan');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

	public function input_cicilan()
	{
		$card['title'] = "Laporan <span>> Tambah Cicilan </span>";
		//$data["data"] = $this->common->getData("*", "mapel", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/laporan_keuangan/tambah-laporan');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gaji extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
       	$menu = array(
            "title" => $this->title,
			"btnHref" => base_url()."keuangan/gaji/input_gaji",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		   );
		$card['title'] = "Gaji <span>> List Cicilan</span>";
       	// $data["data"] = $this->common->getData("*", "", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('keuangan/gaji/list-gaji-karyawan');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

	public function input_gaji()
	{
		$menu = array(
            "title" => $this->title,
			"btnHref" => base_url()."keuangan/gaji",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "List Data"
		   );
		$card['title'] = "Gaji <span>> Tambah Gaji </span>";
		//$data["data"] = $this->common->getData("*", "mapel", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/gaji/tambah-gaji');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cicilan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
       	$menu = array(
            "title" => $this->title,
			"btnHref" => base_url()."keuangan/cicilan/list-cicilan",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		   );
		$card['title'] = "Cicilan <span>> List Cicilan</span>";
       	// $data["data"] = $this->common->getData("*", "", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('keuangan/cicilan/list-cicilan');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

	public function input_cicilan()
	{
<<<<<<< HEAD
		$this->load->view('list-cicilan');
=======
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."keuangan/cicilan",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "List Cicilan"
		);
		$card['title'] = "Cicilan <span>> Input Cicilan </span>";
		//$data["data"] = $this->common->getData("*", "mapel", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/cicilan/tambah-cicilan');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
>>>>>>> 020b1242958f006ef2d59cdd07c63b6b5d99c870
    }
}

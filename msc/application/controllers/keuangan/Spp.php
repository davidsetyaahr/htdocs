<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}

	public function index()
	{
		$menu = array(
            "title" => $this->title,
			"btnHref" => base_url()."keuangan/spp/list-spp",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		);

		$card['title'] = "Spp <span>> List Spp</span>";
		// $data["data"] = $this->common->getData("*", "", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('keuangan/spp/list-spp');
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	
	}

	public function input_spp()
	{
		$this->load->view('list-spp');
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."keuangan/cicilan",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "List Cicilan"
		);
		$card['title'] = "Spp <span>> Edit SPP </span>";
		//$data["data"] = $this->common->getData("*", "mapel", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/spp/tambah-spp');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }
    }
}

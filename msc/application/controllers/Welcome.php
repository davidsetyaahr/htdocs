<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}
	/*
	public function index()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url(),
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Data"
		);
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card');
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
		*/
	public function index()
	{
        $page = array(
            "title" => "MSC Bondowoso | Dashboard",
        );
		$this->load->view("common/menu", $page);
		$this->load->view("dashboard");
		$this->load->view("common/footer");
	}
}
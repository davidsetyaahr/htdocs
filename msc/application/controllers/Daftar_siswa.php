<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_siswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
	}
	
	public function index()
	{
        $menu = array(
            "title" => $this->title,
			// "btnHref" => base_url()."daftar_siswa/tambah_daftar_siswa",
			// "btnBg" => "success",
			// "btnFa" => "keyboard",
			// "btnText" => "Tambah Siswa"
		);
		$card['title'] = "Pendafatran <span>> Daftar</span>";
        $data["data"] = $this->common->getData("*", "tentor", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('daftar_siswa/tambah-daftar-siswa', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
        
	}

	public function tambah_daftar_siswa()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."",
			"btnBg" => "primary","btnFa" => "keyboard",
		);
		$card['title'] = "Pendaftaran Siswa<span>> Input Pendaftaran Siswa</span>";
        // $msg = $this->session->flashdata("success");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('daftar_siswa/tambah-daftar-siswa');
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }
    public function insert_daftar()
    {
		$this->common->insert("daftar_siswa",$this->input->post());
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."data_siswa");
	}
	
}

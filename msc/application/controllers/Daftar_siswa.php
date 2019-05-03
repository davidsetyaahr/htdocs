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
		$data['group'] = $this->common->getData("*","group_siswa","","","");
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
    	echo "<pre>";
    	print_r($_POST);

    	$ortu = array(
    		"nama_ortu" => $_POST['nama_ortu'],
    		"no_hp" => $_POST['no_hp'],
    		"foto" => "default_ortu.png",
    	);
    	$this->common->insert("ortu",$ortu);
    	$getId = $this->common->getData("id_ortu",["ortu",1],"","",["id_ortu","desc"]);
    	$siswa = array(
    		"kode_siswa" => $_POST['kode_siswa'],
    		"nama_siswa" => $_POST['nama_siswa'],
    		"tgl_lahir" => $_POST['tgl_lahir'],
    		"jk" => $_POST['jk'],
    		"alamat" => $_POST['alamat'],
    		"foto" => "default_siswa.png",
    		"no_hp" => $_POST['no_hpsiswa'],
    		"kode_group" => $_POST['kode_group'],
    		"id_ortu" => $getId[0]['id_ortu'],
    		"tgl_daftar" => $_POST['tgl_daftar'],
    	);
    	$this->common->insert("siswa",$siswa);
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."data_siswa");
	}
	
}

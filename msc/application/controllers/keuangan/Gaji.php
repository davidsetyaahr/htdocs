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
		$data["data"] = $this->common->getData("nama_tentor, kode_tentor", "tentor", "", "", "");
		$this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('keuangan/gaji/tambah-gaji', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
    }

    public function insert_gaji()
	{
		$tgl = date("Y-m-d");
		$value = array(
			"kode_tentor" => $this->input->post("kode_tentor"),
			"bulan" => $this->input->post("bulan"),
			"tahun" => $this->input->post("tahun"),
			"nominal" => $this->input->post("nominal"),
			"tanggal_bayar" => $tgl
		);
		$this->common->insert("pembayaran_gaji", $value);
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."keuangan/gaji");
	}
}

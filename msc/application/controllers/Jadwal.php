<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
		if($this->session->userdata("status") != "login")
		{
			redirect(base_url()."login");
		}
		else if($this->session->userdata("hak_akses") != "Admin"){
			show_404();
		}
    }
    
    public function index()
    {
        $menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."jadwal/input_jadwal",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah Jadwal"
		);
		$card['title'] = "Jadwal <span>> List Jadwal</span>";
		$data["data"] = $this->common->getData("j.*, g.kode_group, g.nama_group, t.kode_tentor, t.nama_tentor, m.mata_pelajaran, ", "jadwal j", ["group_siswa g", "j.kode_group=g.kode_group", "mapel_tentor mt", "mt.id_mapel_tentor=j.id_mapel_tentor", "mapel m", "mt.id_mapel=m.id_mapel", "tentor t", "mt.kode_tentor=t.kode_tentor"], "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('jadwal/list-jadwal', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
    }

    public function input_jadwal()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."jadwal",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Jadwal <span>> Input Jadwal</span>";
		$data["group"] = $this->common->getData("kode_group, nama_group", "group_siswa", "", "", "");
		$data["mapelT"] = $this->common->getData("mt.id_mapel_tentor, mt.kode_tentor, t.nama_tentor, mt.id_mapel, m.mata_pelajaran", "mapel_tentor mt", ["tentor t", "mt.kode_tentor=t.kode_tentor", "mapel m", "mt.id_mapel=m.id_mapel"], "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('jadwal/input-jadwal', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
	
	public function insert_jadwal()
	{
		$post = $_POST;
		$post['hari_ke'] = $this->common_lib->hariKe($_POST['hari']);
		$post['hari'] = $this->common_lib->indoDay($_POST['hari']);
		$this->common->insert("jadwal", $post);
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."jadwal");
 	}
	
	public function edit_jadwal($kode)
	{
		$where = array("id_jadwal" => $kode);
		$data["jadwal"] = $this->common->getData("id_jadwal, kode_group, id_mapel_tentor, minggu_ke, hari, jam_mulai, jam_slesai", "jadwal", "", $where, "");
		$data["group"] = $this->common->getData("kode_group, nama_group", "group_siswa", "", "", "");
		$data["mapelT"] = $this->common->getData("mt.id_mapel_tentor, mt.kode_tentor, t.nama_tentor, mt.id_mapel, m.mata_pelajaran", "mapel_tentor mt", ["tentor t", "mt.kode_tentor=t.kode_tentor", "mapel m", "mt.id_mapel=m.id_mapel"], "", "");
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."jadwal",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "Tentor <span>> Edit Jadwal</span>";
        $this->load->view('common/menu', $menu);
        $this->load->view('common/card', $card);
		$this->load->view('jadwal/edit-jadwal', $data);
		$this->load->view('common/slash-card');
        $this->load->view('common/footer');
	}

	public function update_jadwal(){
		$filter = array("id_jadwal" => $this->input->post("id_jadwal"));
		$this->session->set_flashdata("success", "Berhasil Mengedit Data!!!");
		$this->common->update("jadwal", $this->input->post(), $filter);
		redirect(base_url()."jadwal");
	}

}
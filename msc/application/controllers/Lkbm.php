<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lkbm extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
        date_default_timezone_set("Asia/Jakarta");
    }
    
    // public function index()
    // {
    //     $menu = array(
	// 		"title" => $this->title,
	// 		"btnHref" => base_url()."lkbm/input_lkbm",
	// 		"btnBg" => "success",
	// 		"btnFa" => "keyboard",
	// 		"btnText" => "Tambah KBM"
	// 	);
	// 	$card['title'] = "Lampiran KBM <span>> List L-KBM</span>";
	// 	$data["data"] = $this->common->getData("l.id_lampiran, l.lampiran, l.caption, g.nama_group, t.nama_tentor, m.mata_pelajaran, j.jam_mulai, j.jam_slesai, j.minggu_ke", "lampiran_kbm l", ["jadwal j", "j.id_jadwal=l.id_jadwal", "group_siswa g", "g.kode_group=j.kode_group", "mapel_tentor mt", "mt.id_mapel_tentor=j.id_mapel_tentor", "tentor t", "mt.kode_tentor=t.kode_tentor", "mapel m", "m.id_mapel=mt.id_mapel"], "", "");
	// 	$this->load->view('common/menu', $menu);
	// 	$this->load->view('common/card', $card);
	// 	$this->load->view('lampiran-kbm/lampiran-kbm', $data);
	// 	$this->load->view('common/slash-card');
	// 	$this->load->view('common/footer');
    // }
    public function index()
    {
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."lkbm/input_lkbm",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah KBM"
		);
		$card['title'] = "Lampiran KBM <span>> List L-KBM</span>";
		$data["jadwal"] = $this->common->getData("j.*, g.kode_group, g.nama_group, t.kode_tentor, t.nama_tentor, m.mata_pelajaran, ", "jadwal j", ["group_siswa g", "j.kode_group=g.kode_group", "mapel_tentor mt", "mt.id_mapel_tentor=j.id_mapel_tentor", "mapel m", "mt.id_mapel=m.id_mapel", "tentor t", "mt.kode_tentor=t.kode_tentor"], "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('lampiran-kbm/list-jadwal', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
	
    public function kbm($id)
    {
		if(isset($_POST['pengumuman'])){
			$this->common->update("jadwal",$_POST,["id_jadwal" => $id]);
			$this->session->set_flashdata("success", "Berhasil Mengubah Pengumuman");
			redirect(base_url()."lkbm/kbm/$id");
		}
		else if(isset($_POST['inputlampiran'])){
			$config['upload_path']          = './assets/img/';
			$config['allowed_types']        = 'pdf|docx|doc';
			$config['max_size']             = 5000;

			$this->load->library('upload', $config);
			print_r($_FILES);
			
			$err = [];
			for($i=0;$i < count($_POST['caption']);$i++){
				if( ! $this->upload->do_upload('lampiran'.$i)){
					array_push($err, $this->upload->display_errors());
				}				
			}
			if(count($err)==0){
				for($i=0;$i < count($_POST['caption']);$i++){
					$insert = array(
						"lampiran" => $_FILES['lampiran'.$i]['name'],
						"caption" => $_POST['caption'][$i],
						"id_jadwal" => $id
					);
					$this->common->insert("lampiran_kbm",$insert);
				}
				$this->session->set_flashdata("success", "Berhasil Mengubah Pengumuman");
				redirect(base_url()."lkbm/kbm/$id");
			}
			else{
				$data['error'] = $err;
			}
		}
		$where = array("id_jadwal" => $id);
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."lkbm/input_lkbm",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah KBM"
		);
		$data['lampiran'] = $this->common->getData("*","lampiran_kbm","",["id_jadwal" => $id],["id_lampiran","desc"]);
		$card['title'] = "Lampiran KBM <span>> List L-KBM</span>";
		$data["jadwal"] = $this->common->getData("j.*, g.kode_group, g.nama_group, t.kode_tentor, t.nama_tentor, m.mata_pelajaran, ", "jadwal j", ["group_siswa g", "j.kode_group=g.kode_group", "mapel_tentor mt", "mt.id_mapel_tentor=j.id_mapel_tentor", "mapel m", "mt.id_mapel=m.id_mapel", "tentor t", "mt.kode_tentor=t.kode_tentor"], $where, "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('lampiran-kbm/kbm', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
    }

    public function input_lkbm()
	{
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."lkbm",
			"btnBg" => "primary","btnFa" => "keyboard",
			"btnText" => "Lihat Data"
		);
		$card['title'] = "KBM <span>> Input KBM</span>";
		$data["data"] = $this->common->getData("*", "lampiran_kbm", "", "", "");
		$data["jadwal"] = $this->common->getData("j.*, g.kode_group, g.nama_group, t.kode_tentor, t.nama_tentor, m.mata_pelajaran, ", "jadwal j", ["group_siswa g", "j.kode_group=g.kode_group", "mapel_tentor mt", "mt.id_mapel_tentor=j.id_mapel_tentor", "mapel m", "mt.id_mapel=m.id_mapel", "tentor t", "mt.kode_tentor=t.kode_tentor"], "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('lampiran-kbm/input-lkbm', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
	
	public function insert_jadwal()
	{
		$this->common->insert("jadwal", $this->input->post());
		$this->session->set_flashdata("success", "Berhasil Menambahkan Data!!!");
		redirect(base_url()."jadwal");
	}
	
	public function edit_jadwal($kode)
	{
		$where = array("id_jadwal" => $kode);
		$data["jadwal"] = $this->common->getData("id_jadwal, kode_group, id_mapel_tentor, minggu_ke, hari, jam_mulai, jam_slesai", "jadwal", "", "", "");
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
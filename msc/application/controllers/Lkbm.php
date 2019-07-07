<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lkbm extends CI_Controller {

    public function __construct()
		{
			parent::__construct();
			$this->title = $this->common_lib->getTitle();
			date_default_timezone_set("Asia/Jakarta");
			if($this->session->userdata("status") != "login")
			{
				redirect(base_url()."login");
			}
			else if($this->session->userdata("hak_akses") != "Tentor"){
				show_404();
			}
		}
    
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
		$cek = $this->common->getData("count(id_kbm) ttl","kbm","",["tanggal" => date("Y-m-d"),"id_jadwal" => $id],"");
		if($cek[0]['ttl']==0){
			$this->common->insert("kbm",["id_jadwal" => $id,"tanggal" => date("Y-m-d")]);	
		}
		if(isset($_POST['pengumuman'])){
			$this->common->update("kbm",$_POST,["id_kbm" => $_POST['id_kbm']]);
			$this->session->set_flashdata("success", "Berhasil Mengubah Pengumuman");
			redirect(base_url()."lkbm/kbm/$id");
		}
		else if(isset($_POST['inputlampiran'])){
			$this->load->helper("string");
			$config['upload_path']          = './assets/lampiran/';
			$config['allowed_types']        = 'pdf|docx|doc|png|jpg|jpeg|gif|xls|xlsx|ppt|pptx';
			$config['max_size']             = 5000;

			$this->load->library('upload', $config);
			
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
						"id_kbm" => $_POST['id_kbm']
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
		
		if(isset($_POST['absen'])){
			$cek = $this->common->getData("count(id_kbm) ttl","absensi","",["id_kbm" => $_POST['id_kbm']],"");
			if($cek[0]['ttl']==0){
				foreach($_POST['absen'] as $key => $val){
					$arr = array(
						"id_kbm" => $_POST['id_kbm'],
						"kode_siswa" => $key,
						"keterangan" => $val,
					);
					$this->common->insert("absensi", $arr);
				}
			}
			else{
				foreach($_POST['absen'] as $key => $val){
					
					$filter = array(
						"id_kbm" => $_POST['id_kbm'],
						"kode_siswa" => $key,
					);

					$arr = array(
						"keterangan" => $val,
					);
					$this->common->update("absensi", $arr,$filter);
				}

			}

			redirect(base_url()."lkbm/kbm/$id/absensi");
		}
		$where = array("id_jadwal" => $id);
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."lkbm/input_lkbm",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah KBM"
		);
		$card['title'] = "Lampiran KBM <span>> List L-KBM</span>";
		$data["jadwal"] = $this->common->getData("j.*, g.kode_group, g.nama_group, t.kode_tentor, t.nama_tentor, m.mata_pelajaran, ", "jadwal j", ["group_siswa g", "j.kode_group=g.kode_group", "mapel_tentor mt", "mt.id_mapel_tentor=j.id_mapel_tentor", "mapel m", "mt.id_mapel=m.id_mapel", "tentor t", "mt.kode_tentor=t.kode_tentor"], $where, "");
		$data['datakbm'] = $this->common->getData("id_kbm,pengumuman",	"kbm","",["id_jadwal" => $id,"tanggal" => date("Y-m-d")],"");
		$data['siswa'] = $this->common->getData("kode_siswa,nama_siswa","siswa","",["kode_group" => $data['jadwal'][0]['kode_group']],["kode_siswa","asc"]);
		$data['cek'] = count($this->common->getData("kode_siswa","absensi","",["id_kbm" => $data['datakbm'][0]['id_kbm']],""));
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
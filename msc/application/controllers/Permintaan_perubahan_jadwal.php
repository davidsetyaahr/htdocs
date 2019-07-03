<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_perubahan_jadwal extends CI_Controller {
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
    );
    $card['title'] = "Perubahan_jadwal <span>> List Perubahan Jadwal</span>";
    $data["req_jadwal"] = $this->common->req_jadwal();
    $this->load->view('common/menu', $menu);
    $this->load->view('common/card', $card);
    $this->load->view('jadwal/perubahan-jadwal', $data);
    $this->load->view('common/slash-card');
    $this->load->view('common/footer');
  }
  
  public function input_perubahan()
  {
      $card['title'] = "Jadwal <span>> perubahan jadwal </span>";
      $this->load->view('common/menu', $menu);
      $this->load->view('common/card', $card);
      $this->load->view('jadwal/perubahan-jadwal');
      $this->load->view('common/slash-card');
      $this->load->view('common/footer');
  }

  public function status($id,$status)
  {
      $where = array("id_req" => $id);
      $val = array("status" => $status);
      $this->common->update("req_perubahan_jadwal", $val, $where);
      redirect("permintaan_perubahan_jadwal");
    }
    
  public function edit_jadwal($where)
  {
    $data["req"] = $this->common->getData("r.id_req, r.ke_hari, r.ke_minggu, r.ke_jam, j.id_jadwal, r.status, j.jam_mulai, j.jam_slesai", "req_perubahan_jadwal r", ["jadwal j", "r.id_jadwal=j.id_jadwal"], ["id_req" => $where], "");
    $menu = array(
      "title" => $this->title,
      // "btnHref" => base_url()."jadwal",
      // "btnBg" => "primary","btnFa" => "keyboard",
      // "btnText" => "Lihat Data"
    );
    $card['title'] = "Tentor <span>> Edit Jadwal</span>";
    $this->load->view('common/menu', $menu);
    $this->load->view('common/card', $card);
    $this->load->view('jadwal/edit_jadwal_req_perubahan_jadwal', $data);
    $this->load->view('common/slash-card');
    $this->load->view('common/footer');
  }
  
  public function update_jadwal($id_req)
  {
    $where = array("id_jadwal" => $_POST["id_jadwal"]);
    $where_req = array("id_req" => $id_req);
    $val_req_jadwal = array("status" => "Diterima");
    $val = array(
      "hari" => $_POST["hari"],
      "minggu_ke" => $_POST["minggu_ke"],
      "jam_mulai" => $_POST["jam_mulai"],
      "jam_slesai" => $_POST["jam_slesai"]
    );
    $this->common->update("jadwal", $val, $where);
    $this->common->update("req_perubahan_jadwal", $val_req_jadwal, $where_req);
    redirect(base_url()."permintaan_perubahan_jadwal");
  }
  }
  
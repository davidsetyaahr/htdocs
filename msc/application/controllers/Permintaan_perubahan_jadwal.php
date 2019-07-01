<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan_perubahan_jadwal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->title = $this->common_lib->getTitle();
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

    public function status($id,$status,$id_jadwal)
    {
      if($status != "Ditolak"){
        $where = array("id_req" => $id);
        $val = array("status" => $status);
        $this->common->update("req_perubahan_jadwal", $val, $where);
        redirect("permintaan_perubahan_jadwal/edit_jadwal/$id_jadwal/$id");
      }
      else{
        redirect("permintaan_perubahan_jadwal");

      }
    }

    public function edit_jadwal($where, $id_req_jadwal)
    {
      $data["req"] = $this->common->getData("ke_hari, ke_minggu, ke_jam, status", "req_perubahan_jadwal", "", ["id_req" => $id_req_jadwal], "");
      $data["jadwal"] = $this->common->getData("id_jadwal, jam_mulai, jam_slesai", "jadwal", "", ["id_jadwal" => $where], "");
      $menu = array(
        "title" => $this->title,
        "btnHref" => base_url()."jadwal",
        "btnBg" => "primary","btnFa" => "keyboard",
        "btnText" => "Lihat Data"
      );
      $card['title'] = "Tentor <span>> Edit Jadwal</span>";
      $this->load->view('common/menu', $menu);
      $this->load->view('common/card', $card);
      $this->load->view('jadwal/edit_jadwal_req_perubahan_jadwal', $data);
      $this->load->view('common/slash-card');
      $this->load->view('common/footer');
    }

    public function edit(Type $var = null)
    {
      # code...
    }
}

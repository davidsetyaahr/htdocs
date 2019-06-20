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
      // $data["data"] = $this->common->getData("*", "", "", "", "");
      $this->load->view('common/menu', $menu);
      $this->load->view('common/card', $card);
      $this->load->view('jadwal/perubahan-jadwal');
      $this->load->view('common/slash-card');
      $this->load->view('common/footer');
    }

      public function input_perubahan()
      {
      $card['title'] = "Jadwal <span>> perubahan jadwal </span>";
      //$data["data"] = $this->common->getData("*", "mapel", "", "", "");
      $this->load->view('common/menu', $menu);
          $this->load->view('common/card', $card);
      $this->load->view('jadwal/perubahan-jadwal');
      $this->load->view('common/slash-card');
          $this->load->view('common/footer');
      }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
		{
			parent::__construct();
			$this->title = $this->common_lib->getTitle();
			if($this->session->userdata("status") != "login")
			{
				redirect(base_url()."login");
			}
			else if($this->session->userdata("hak_akses") != "Owner")
			{
				show_404();
			}
    }
    
    public function index()
    {
		$menu = array(
			"title" => $this->title,
			"btnHref" => base_url()."user/input_user",
			"btnBg" => "success",
			"btnFa" => "keyboard",
			"btnText" => "Tambah User"
		);
		$card['title'] = "User <span>> List User</span>";
		$data["user"] = $this->common->getData("*", "user", "", "", "");
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('user/list-user', $data);
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
	}
    
    public function input_user()
    {
		$menu = array(
			"title" => $this->title,
			"btnFa" => "keyboard",
			"btnHref" => base_url()."user",
			"btnBg" => "success",
			"btnText" => "List User"
		);
		$card['title'] = "User <span>> Input user</span>";
		$this->load->view('common/menu', $menu);
		$this->load->view('common/card', $card);
		$this->load->view('user/input-user');
		$this->load->view('common/slash-card');
		$this->load->view('common/footer');
		
	}
}
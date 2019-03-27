<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view("login");
	}
	public function login()
	{
		$user = $this->BarangModel->getwhere("users",["email" => $_POST['email'], "password" => md5($_POST['password'])]);
		if(count($user)>0){
			$this->session->set_userdata(["fullname" => $user[0]['fullname'], "avatar" => $user[0]['avatar']]);
			redirect(base_url()."index.php/admin");
		}
		else{
			redirect(base_url());
		}
	}
	public function logout()
	{
		$this->session->unset_userdata(["fullname" => "", "avatar" => ""]);
		redirect(base_url());
	}
}

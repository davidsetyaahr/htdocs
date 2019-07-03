<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
        parent::__construct();
        
    }

    public function index()
    {
        $this->load->view("auth/login");
    }
    public function aksi_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $cek = $this->common->getData("count(id_user) id, nama_pengguna, hak_akses, id_child" ,"user", "", ["username" => $username, "password" => $password], "");
        if($cek[0]['id'] > 0)
        {    
            $data_session = array(
                'nama' => $cek[0]["nama_pengguna"],
                'hak_akses' => $cek[0]["hak_akses"],
                'kode' => $cek[0]["id_child"],
                'status' => "login"
            );
            
            $this->session->set_userdata($data_session);
            print_r($cek);
            redirect(base_url()."welcome");
        }
        else
        {
            $this->session->set_flashdata("msg", "Username atau Password Salah!");
            redirect(base_url()."login");
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));    
    }
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
    }
    
    public function index()
    {
        $this->form_validation->set_rules('username', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required');
        $this->form_validation->set_rules('nama_belakang', 'Nama Belakang', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('phoneNumber', 'Nomor HP', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Register');
        } else {
           $data_user = array(
               'email' => set_value('email') ,
               'password' => set_value('password') ,
               'nama_depan' => set_value('nama_depan') , 
               'nama_belakang' => set_value('nama_belakang') ,
               'jenis_kelamin' => set_value('jenis_kelamin') ,
               'nomor_handphone' => set_value('phoneNumber') ,
               'username' => set_value('username') ,
               'tanggal_lahir' => set_value('tanggal_lahir') ,
               'jabatan' => 'Member' 
            );

            $this->model->register($data_user);
            
            redirect('/Login');
        }
        
        
    }
}
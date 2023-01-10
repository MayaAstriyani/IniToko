<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Login');
		} else {
			$this->load->model('model');
			$valid_user = $this->model->checkCredential();

			if ($valid_user == FALSE) {
				
				$this->session->flashdata('error', 'Wrong Email/Password');
				
				redirect('/login');
			} else {
				
				$user_data = array(
					'id' => $valid_user->user_id,
					'email' => $valid_user->email,
					'username' => $valid_user->username,
					'nama_depan' => $valid_user->nama_depan,
					'nama_belakang' => $valid_user->nama_belakang,
					'tanggal_lahir' => $valid_user->tanggal_lahir,
					'jenis_kelamin' => $valid_user->jenis_kelamin,
					'negara' => $valid_user->negara,
					'provinsi' => $valid_user->provinsi,
					'kabupaten' => $valid_user->kabupaten,
					'kecamatan' => $valid_user->kecamatan,
					'alamat' => $valid_user->alamat,
					'nomor_handphone' => $valid_user->nomor_handphone,
					'jabatan' => $valid_user->jabatan
				);
				
				$this->session->set_userdata($user_data);

				switch ($valid_user->jabatan) {
					case 'Admin':
						redirect('/Admin');
						break;
					case 'Member':
						redirect(base_url());
						break;
					
					default:
						# code...
						break;
				}
				
			}
		}
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('/login');
	}
}
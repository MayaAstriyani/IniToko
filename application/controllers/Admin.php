<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('model');
	}

	public function index()
	{
		$this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('Dashboard');
	}

	public function show_admin()
	{
		$this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('show_admin');
	}

	public function show_user()
	{
		$this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('show_user');
	}

	public function show_product()
	{
		$this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('show_product');
	}

	public function show_order()
	{
		$this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('show_order');
	}

	public function show_order_dibayar()
	{
		$this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('show_order_dibayar');
	}

	public function show_order_dikonfirmasi()
	{
		$this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('show_order_dikonfirmasi');
	}

	public function show_order_dikirim()
	{
		$this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('show_order_dikirim');
	}

	public function show_order_terkirim()
	{
		$this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('show_order_terkirim');
	}

	public function kirimBarang()
	{
		$this->load->view('kirim_barang');
	}

	public function inputResi($id)
	{
		// $this->form_validation->set_rules('inputResi', 'required');

		// if ($this->form_validation->run() == FALSE) 
		// {
		// 	$this->session->flashdata('error', 'Wrong Email/Password');

        //     redirect('/Initoko/info?info=gagalResi');
		// } 
		
		// else 
		// {
			$nomorResi = set_value('inputResi');
			$this->model->inputResi($id, $nomorResi);
			redirect('/Admin/show_order_dikonfirmasi');
		// }

	}

	public function add_product()
	{
        $this->load->view('Head-profile');
        $this->load->view('Head-side-admin');
		$this->load->view('Add-product');
	}
	
	public function add_product_process()
	{
		$this->form_validation->set_rules('nama', 'Nama Produk', 'required');
        $this->form_validation->set_rules('desc', 'Deskripsi', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis Barang', 'required');
		$this->form_validation->set_rules('kategori_satu', 'Kategori Masa', 'required');
		$this->form_validation->set_rules('kategori_dua', 'Kategori Gender', 'required');
		$this->form_validation->set_rules('kategori_tiga', 'Kategori Warna', 'required');
		//$this->form_validation->set_rules('img', 'Gambar Produk', 'required');
		$this->form_validation->set_rules('harga', 'Harga Produk', 'required');
        
        if ($this->form_validation->run() == FALSE) {
			$this->session->flashdata('error', 'Wrong Email/Password');

            $this->load->view('Login');
        } else {
			$config['upload_path']          = './assets/images/produk/';
        	$config['allowed_types']        = 'jpg|png';
        	$config['max_size']             = 10000;
        	$config['max_width']            = 10024;
			$config['max_height']           = 7068;
		
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('img')) {
				redirect('/Admin/add_product');
			} else {
				$gambar = $this->upload->data();
				$data_barang = array(
					'nama' => set_value('nama') ,
					'desc' => set_value('desc') ,
					'jenis' => set_value('jenis') , 
					'kategori_satu' => set_value('kategori_satu') ,
					'kategori_dua' => set_value('kategori_dua') ,
					'kategori_tiga' => set_value('kategori_tiga') ,
					'img' => $gambar['file_name'],
					'harga' => set_value('harga')
				);
 
				$this->model->add_product($data_barang);
			 
				redirect('/Admin');
			}
        }
		
	}
}